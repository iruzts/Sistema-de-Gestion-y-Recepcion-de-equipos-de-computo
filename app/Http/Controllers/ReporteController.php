<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordene;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reporte = Ordene::all();
        return view('reporte.index',compact('reporte'));
    }
    public function terminados()
    {
        $ordenes = Ordene::all();
        return view('reporte.terminados',compact('ordenes'));
    }
    public function terminadospdf()
    {
        $ordenes = Ordene::all();
        $pdf=PDF::loadView('reporte.pdf.pdf-terminados',['ordenes'=>$ordenes]);
        return $pdf->stream();
    }
    
    public function pendientes()
    {
        $ordenes = Ordene::all();
        return view('reporte.pendientes',compact('ordenes'));
    }
    public function pendientespdf()
    {
        $ordenes = Ordene::all();
        $pdf=PDF::loadView('reporte.pdf.pdf-pendientes',['ordenes'=>$ordenes]);
        return $pdf->stream();
    }
    public function ingresos()
    {
        $ordenes = Ordene::all();
        return view('reporte.ingresos',compact('ordenes'));
    }
    public function ingresospdf()
    {
        $ordenes = Ordene::all();
        $pdf=PDF::loadView('reporte.pdf.pdf-ingresos',['ordenes'=>$ordenes]);
        return $pdf->stream();
    }
    public function cancelados()
    {
        $ordenes = Ordene::all();
        return view('reporte.cancelado',compact('ordenes'));
    }
    public function canceladospdf()
    {
        $ordenes = Ordene::all();
        $pdf=PDF::loadView('reporte.pdf.pdf-cancelado',['ordenes'=>$ordenes]);
        return $pdf->stream();
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
       $fechaInicio=$request->get('fechaInicio');
       $fechaFin=$request->get('fechaFinal');
       $Reporte=Ordene::whereBetween('fecha_ingreso', [$fechaInicio,$fechaFin])->get();
       $pdf=PDF::loadView('reporte.pdf.pdf',['Reporte'=>$Reporte,'fechaInicio'=>$fechaInicio,'fechaFin'=>$fechaFin]);
       //$pdf->loadHTML('<h1>Test<h1>');
       return $pdf->setPaper('a4','landscape')->stream();
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
