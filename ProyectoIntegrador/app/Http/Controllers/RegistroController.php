<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\ValidadorRegistro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidadorRegistro $request)
    {
        // Determinar el rol basado en el dominio del correo
        $rol = $this->determinarRol($request->input('correo'));

        DB::table('usuarios')->insert([
            "nombreUsuario"=>$request->input('nombreUsuario'),
            "nombre"=>$request->input('txtnombre'),
            "apellido"=>$request->input('txtapellido'),
            "correo"=>$request->input('correo'),
            "password" =>Hash::make($request->input('password')),
            "rol" => $rol,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        $usuario=$request->input('txtnombre');
        session()->flash('exito','Se guardó el usuario '.$usuario.' con rol: '.$rol);
        return to_route('login');
    }

    /**
     * Determinar el rol del usuario basado en el dominio del correo
     */
    private function determinarRol($correo)
    {
        $dominio = substr(strrchr($correo, "@"), 1);
        
        switch ($dominio) {
            case 'alumno':
                return 'alumno';
            case 'docente':
            case 'padre':
                return 'gestor';
            case 'admin':
                return 'admin';
            default:
                return 'alumno';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
