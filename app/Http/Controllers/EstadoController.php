<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoEquipo;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados= EstadoEquipo::all();
        return view('estadoequipo.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadoequipo.modal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado= new EstadoEquipo();
        $estado->nombre=$request->get('nombre_estado');
        $estado->save();
        
        return redirect('/estado')->with('success','Estado Creada Correctamente');
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
        $estado = EstadoEquipo::find($id);
        return view('estadoequipo.edit')->with('estado',$estado);
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
        $estado = EstadoEquipo::find($id);
        $estado->nombre =$request->get('nombre_estado');
        $estado->save();

        return redirect('/estado')->with('success','Estado Actualizada Correctamente'); ;
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
            $estado = EstadoEquipo::findOrFail($id);
            $estado->delete();
            return redirect()->route('estado.index')->with('success', 'Registro Eliminado Correctamente');
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->route('estado.index')->with('danger', 'No se pueden eliminar datos con registros activos');
          };
    }
}
