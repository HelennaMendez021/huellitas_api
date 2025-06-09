<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\registrarCita;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\cita_aceptada;
use App\Mail\cita_rechazada;

class CitasService
{
    public function registrar_cita(Request $request)
    {
        try {
            DB::select('CALL sp_registrar_cita(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @id_cita)', [
                $request->nombre_mascota,
                $request->especie_mascota,
                $request->raza_mascota,
                $request->sexo_mascota,
                $request->peso_mascota,
                $request->nombre_cliente,
                $request->numero_cliente,
                $request->correo_cliente,
                $request->servicio_cita,
                $request->fecha_hora_cita,
            ]);

            $servicio_cita = DB::select('SELECT obtener_descripcion_servicio(?) as servicio_cita', [
                $request->servicio_cita
            ]);
            $servicio_cita = $servicio_cita[0]->servicio_cita;
            Mail::to($request->correo_cliente)->send(new registrarCita($request->nombre_cliente, $request->nombre_mascota, $servicio_cita, $request->fecha_hora_cita));
            return;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function gestionar_citas(Request $request)
    {
        try {

            DB::statement('call sp_gestionar_cita(?, ?, ?)', [
                $request->id_cita,
                $request->estado_cita,
                $request->fecha_hora_cita
            ]);

            $estado_cita = DB::select('SELECT obtener_descripcion_estado(?) as estado_cita', [
                $request->id_cita
            ]);
            $estado_cita = $estado_cita[0]->estado_cita;
            $correo_cliente = DB::select('SELECT obtener_correo_cliente(?) as correo_cliente', [
                $request->id_cita
            ]);
            $correo_cliente = $correo_cliente[0]->correo_cliente;
            $nombre_cliente = DB::select('SELECT obtener_nombre_cliente(?) as nombre_cliente', [
                $request->id_cita
            ]);
            $nombre_cliente = $nombre_cliente[0]->nombre_cliente;
            $nombre_mascota = DB::select('SELECT obtener_nombre_mascota(?) as nombre_mascota', [
                $request->id_cita
            ]);
            $nombre_mascota = $nombre_mascota[0]->nombre_mascota;
            $servicio_cita = DB::select('SELECT obtener_servicio(?) as servicio_cita', [
                $request->id_cita
            ]);
            $servicio_cita = $servicio_cita[0]->servicio_cita;
            $fecha_hora_cita = DB::select('SELECT obtener_fecha_hora_cita(?) as fecha_hora_cita', [
                $request->id_cita
            ]);
            $fecha_hora_cita = Carbon::parse($fecha_hora_cita[0]->fecha_hora_cita)->format('d-m-Y H:i:s');
            switch ($estado_cita) {
                case 'aceptada':
                    Mail::to($correo_cliente)->send(new cita_aceptada(
                        $nombre_cliente,
                        $nombre_mascota,
                        $servicio_cita,
                        $fecha_hora_cita
                    ));
                    return;
                case 'rechazada':
                    Mail::to($correo_cliente)->send(new cita_rechazada(
                        $nombre_cliente,
                        $fecha_hora_cita
                    ));
                    return;
            }
            return;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function fechas_disponibles(Request $request)
    {
        try {
            $fechas = DB::select('call sp_disponibilidad_citas(?)', [
                $request->fecha_cita
            ]);

            return $fechas;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function obtener_citas()
    {
        try {
            $citas = DB::select('call sp_obtener_citas()');

            return $citas;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function obtener_clientes()
    {
        try {
            $clientes = DB::select('call sp_obtener_clientes()');

            return $clientes;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    public function obtener_mascotas()
    {
        try {
            $mascotas = DB::select('call sp_obtener_mascotas()');

            return $mascotas;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    public function obtener_reporte_mascota(Request $request)
    {
        try {
            $reporte = DB::select('call sp_obtener_reporte_mascota(?)', [
                $request->id_mascota
            ]);

            return $reporte;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
