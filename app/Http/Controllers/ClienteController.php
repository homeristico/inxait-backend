<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Exports\ClienteExport;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{

    public function exportarClientes(){
        return Excel::download(new ClienteExport, 'clientes.xlsx');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $longitud = Cliente::all();
        return response()->json([
            "res" => count($longitud),
            "ganador" => Cliente::find(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->cedula = $request->cedula;
        $cliente->celular = $request->celular;
        $cliente->ciudad = $request->ciudad;
        $cliente->departamento = $request->departamento['nombre'];
        $cliente->correo = $request->correo;
        $cliente->autorizacion = $request->autorizacion;
        
        if($cliente->save()){
            return response()->json([
                "status" => true,
                "usuario" => $cliente
            ]);    
        }



        return response()->json([
            "status" => false,
            "usuario" => $cliente
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
