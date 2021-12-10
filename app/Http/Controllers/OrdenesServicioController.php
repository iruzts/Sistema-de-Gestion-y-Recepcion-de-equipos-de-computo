<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Ordene;
use Carbon\Carbon;
use PDF;


class OrdenesServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   date_default_timezone_set("America/Lima");
        $fecha_actual = Carbon::now();
        $fecha=$fecha_actual->format('d-m-Y');
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $colores = Color::all();
        $marcas = Marca::all();
        $numero = Ordene::count('codigo');
        $ordenes = Ordene::all();
        return view('orden-de-servicio.index',compact('clientes','equipos','colores','marcas','fecha','numero','ordenes'));
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
        date_default_timezone_set("America/Lima");
        $fechaI = Carbon::now();
        $recepcion = new Ordene();
        $recepcion->codigo=$request->get('codigo');
        $recepcion->modelo=$request->get('modelo');
        $recepcion->serie=$request->get('serie');
        $recepcion->claveequipo=$request->get('password');
        $recepcion->problema=$request->get('problema');
        $recepcion->dignostico=$request->get('dignostico');
        $recepcion->fecha_probable_entrega=$request->get('fecha-entrega');
        $recepcion->fecha_ingreso=$fechaI;
        $recepcion->garantia=$request->get('garantia');
        $recepcion->estado='Por Reparar';
        $recepcion->estado_pago=$request->get('radio1');
        $recepcion->repuesto=$request->get('repuesto');
        $recepcion->costo_repuesto=$request->get('costo_repuesto');
        $recepcion->costo=$request->get('costo');
        $recepcion->abono=$request->get('abono');
        $recepcion->total=$request->get('total');
        $recepcion->usuario_id=auth()->id();
        $recepcion->cliente_id=$request->get('Ncliente');
        $recepcion->equipos_id=$request->get('equipo');
        $recepcion->marca_id=$request->get('marca');
        $recepcion->color_id=$request->get('color');
       
        //echo $recepcion;
        $recepcion->save();
        return redirect('/ordenes')->with('success', 'Orden Creada Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Reporte=Ordene::whereDate('created_at', '2021-01-17')->get();
       echo $reporte;

    }
    public function pdf($id){
        $tiket = Ordene::find($id);

        $pdf=PDF::loadView('orden-de-servicio.pdf',['tiket'=>$tiket]);
        //$pdf->loadHTML('<h1>Test<h1>');
        return $pdf->stream();
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
        $estado->estado_pago=$request->get('radio1');

        $estado->save();

        return redirect('/ordenes')->with('success', 'Datos Actualizados Correctamente');
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
            $orden = Ordene::findOrFail($id);
            $orden->delete();
            return redirect('/ordenes')->with('success', 'Registro Eliminado Correctamente');
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect('/ordenes')->with('danger', 'No se pueden eliminar datos con registros activos');
          };
    }
}
