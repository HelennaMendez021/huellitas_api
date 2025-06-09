<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResponseApi;
use Exception;

class CitasController extends Controller
{
    protected $citasService;
    public function __construct()
    {
        $this->citasService = app('citas');
    }
    public function registrar_cita(Request $request)
    {
        try {

            $request->validate([
                'nombre_mascota' => 'required|string',
                'especie_mascota' => 'required|string',
                'raza_mascota' => 'required|string',
                'sexo_mascota' => 'required|integer',
                'peso_mascota' => 'required',
                'nombre_cliente' => 'required|string',
                'numero_cliente' => 'required|string',
                'correo_cliente' => 'required|email',
                'servicio_cita' => 'required|integer'
            ]);
            $this->citasService->registrar_cita($request);
            $response = new ResponseApi(
                success: true,
                message: 'Cita registrada correctamente',
                data: null
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al registrar la cita',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function gestionar_citas(Request $request)
    {
        try {
            $request->validate([
                'id_cita' => 'required|integer',
                'estado_cita' => 'required|integer',
                'fecha_hora_cita' => 'required'
            ]);
            $this->citasService->gestionar_citas($request);
            $response = new ResponseApi(
                success: true,
                message: 'Cita gestionada correctamente',
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al gestionar la cita',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function fechas_disponibles(Request $request)
    {
        try {
            $request->validate([
                'fecha_cita' => 'required'
            ]);
            $fechas = $this->citasService->fechas_disponibles($request);
            $response = new ResponseApi(
                success: true,
                message: 'Fechas disponibles obtenidas correctamente',
                data: $fechas
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al obtener las fechas disponibles',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function obtener_citas()
    {
        try {
            $citas = $this->citasService->obtener_citas();
            $response = new ResponseApi(
                success: true,
                message: 'Citas obtenidas correctamente',
                data: $citas
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al obtener las citas',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function obtener_clientes()
    {
        try {
            $clientes = $this->citasService->obtener_clientes();
            $response = new ResponseApi(
                success: true,
                message: 'Clientes obtenidos correctamente',
                data: $clientes
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al obtener los clientes',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function obtener_mascotas()
    {
        try {
            $mascotas = $this->citasService->obtener_mascotas();
            $response = new ResponseApi(
                success: true,
                message: 'Mascotas obtenidas correctamente',
                data: $mascotas
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al obtener las mascotas',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }

    public function obtener_reporte_mascota(Request $request)
    {
        try {
            $request->validate([
                'id_mascota' => 'required|integer',
            ]);
            $reporte = $this->citasService->obtener_reporte_mascota($request);
            $response = new ResponseApi(
                success: true,
                message: 'Reporte de mascota obtenido correctamente',
                data: $reporte
            );
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response = new ResponseApi(
                success: false,
                message: 'Error al obtener el reporte de mascota',
                errors: $ex->getMessage()
            );

            return response()->json($response, 500);
        }
    }
}
