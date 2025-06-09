<?php

namespace App\Http\Controllers;

use App\Models\ResponseApi;
use Illuminate\Http\Request;
use Exception;
use App\Services\UsersService;

class UsersController extends Controller
{
    protected $usersService;

    public function __construct()
    {
        $this->usersService = app('usuarios');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|max:255',
            ]);
            $token = $this->usersService->login($request);
            $response = new ResponseApi(
                success: true,
                message: 'Login exitoso',
                data: $token
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al iniciar sesión: usuario o contraseña incorrectos',
                errors: $ex->getMessage()
            );
            return response()->json($response, 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->usersService->logout($request);
            $response = new ResponseApi(
                success: true,
                message: 'Logout exitoso'
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al cerrar sesión: ',
                errors: $ex->getMessage()
            );
            return response()->json($response, 500);
        }
    }

    public function registrar_usuario(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'nombre' => 'required|string|max:255',
            ]);
            $this->usersService->registrar_usuario($request);
            $response = new ResponseApi(
                success: true,
                message: 'Usuario registrado exitosamente'
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al registrar usuario',
                errors: $ex->getMessage()
            );
            return response()->json($response, 500);
        }
    }

    public function confirmar_email(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            $this->usersService->confirmar_email($request);
            return view('confirmacion');
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al confirmar el email',
                errors: $ex->getMessage()
            );
            return response()->json($response, 500);
        }
    }

    public function reset_password(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $this->usersService->reset_password($request);
            $response = new ResponseApi(
                success: true,
                message: 'Contraseña restablecida exitosamente'
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al restablecer la contraseña',
                errors: $ex->getMessage()
            );
            return response()->json($response, 500);
        }
    }
}
