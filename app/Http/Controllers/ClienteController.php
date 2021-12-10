<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        return view('cliente.index')->with('clientes',$clientes);
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
        try{
            $clientes = new Cliente();
            $clientes->dni =$request->get('dni');
            $clientes->nombre =$request->get('nombre');
            $clientes->direccion =$request->get('direccion');
            $clientes->telefono =$request->get('telefono');
    
            $clientes->save();
            return redirect('/cliente')->with('success','Cliente Creado Correctamente'); 

        } catch (\Illuminate\Database\QueryException $ex){
            return redirect('/cliente')->with('danger','El Numero de Identidad ya Existe'); 
        }
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
        $cliente = Cliente::find($id);
        return view('cliente.modal.edit')->with('cliente',$cliente);
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
        $cliente = Cliente::find($id);
        $cliente->dni =$request->get('dni');
        $cliente->nombre =$request->get('nombre');
        $cliente->direccion =$request->get('direccion');
        $cliente->telefono =$request->get('telefono');

        $cliente->save();

        return redirect('/cliente')->with('success', 'Datos Actualizados Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return redirect()->route('cliente.index')->with('success', 'Registro Eliminado Correctamente');
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->route('cliente.index')->with('danger', 'No se pueden eliminar datos con registros activos');
          };
    }
}
