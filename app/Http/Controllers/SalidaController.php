<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Recepcion;
use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Color;
use App\Models\Marca;
use App\Models\EstadoEquipo;
use App\Models\Detalle_Reparacion;
use App\Models\Ordene;
use Carbon\Carbon;
use PDF;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("America/Lima");
        $fecha_actual = Carbon::now();
        $fecha=$fecha_actual->format('d-m-Y');
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $colores = Color::all();
        $marcas = Marca::all();
        $numero = Ordene::where('codigo', 1)->count();
        $ordenes = Ordene::all();
        return view('entrega.index',compact('clientes','equipos','colores','marcas','fecha','numero','ordenes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Reparacion::find($id);
        $recepcion = Recepcion::find($id);
        return view('entrega.show',compact('salida','recepcion',$salida,$recepcion));
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
        $estado = Ordene::find($id);
        $estado->estado =$request->get('estado');
        $estado->estado_pago =$request->get('Pagado');

        $estado->save();
        return redirect('/salida')->with('success', 'Datos Actualizados Correctamente');
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
