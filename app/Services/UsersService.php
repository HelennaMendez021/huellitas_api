<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificaciones;
use Exception;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class UsersService
{
    public function login(Request $request)
    {
        try {
            $credenciales = $request->only('email', 'password');

            if (!Auth::attempt($credenciales)) {
                throw new Exception("Usuario o contraseña incorrectos.");
            }
            $user = Auth::user();

            if (is_null($user->email_verified_at)) {
                throw new Exception("Tu correo no ha sido confirmado. Por favor revisa tu bandeja de entrada.");
            }

            $token = $user->createToken(
                'userToken',
                ['default'],
                now()->addHours(2)
            )->plainTextToken;

            return $token;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {

            $token = $request->user();
            $token->tokens()->delete();
            return;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function registrar_usuario(Request $request)
    {
        try {
            $password = $request->password;
            $email = $request->email;
            $passwordHash = Hash::make($password);
            $nombre = $request->nombre;
            DB::statement(
                'call sp_registrar_usuario(?,?,?)',
                [
                    $email,
                    $passwordHash,
                    $nombre
                ]
            );
            $url_confirmacion = URL::temporarySignedRoute(
                'auth.confirmarEmail',
                Carbon::now()->addMinutes(60),
                ['email' => $email]
            );

            Mail::to($email)->send(new notificaciones($nombre, $email, $url_confirmacion));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function confirmar_email(Request $request)
    {
        try {
            $email = $request->email;
            DB::statement(
                'call sp_confirmar_email(?)',
                [
                    $email
                ]
            );

            return;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function reset_password(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;
            $passwordHash = Hash::make($password);
            DB::statement(
                'call sp_reset_password(?,?)',
                [
                    $email,
                    $passwordHash
                ]
            );
            return;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
