<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colores = Color::all();
        return view('color.index', compact('colores',$colores));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color ();
        $color -> nombre = $request -> get('nombrecolor');
        $color->save();
        return redirect('/color')->with('success','Color Creado Correctamente'); 
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
        $color = Color::find($id);
        $color->nombre =$request->get('nombrecolor');

        $color->save();

        return redirect('/color')->with('success', 'Datos Actualizados Correctamente');
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
            $color = Color::findOrFail($id);
            $color->delete();
            return redirect()->route('color.index')->with('success', 'Registro Eliminado Correctamente');
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->route('color.index')->with('danger', 'No se pueden eliminar datos con registros activos');
          };
    }
}
