@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3><i class="fas fa-print"></i>
                Ingresos Por reparaciones</h3>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                <li class="breadcrumb-item active">Reportes</li>
                <li class="breadcrumb-item active">Ingresos por reparaciones</li>
            </ol>
        </div>
        <div class="col-sm-6">
            <a type="button" class="btn btn-primary float-right btn-sm mr-1" href="{{ route('ingresospdf') }}" target="_blank">
                <i class="fas fa-print"></i> Imprimir
            </a>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="recepcion1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Equipo</th>
                    <th>Estado</th>
                    <th>Total a Pagar</th>
                </tr>
            </thead>
            <tbody>
                @php
                $suma=0;
                @endphp
                @foreach ($ordenes as $orden)
                @if ($orden->estado == 'Reparado' && $orden->estado_pago=='Pagado')
                <tr>
                    <td>{{$orden->codigo}}</td>
                    <td>{{$orden->clientes->nombre}}</td>
                    <td>{{ $orden->equipos->nombre }} / {{ $orden->marcas->nombre }} /
                        {{ $orden->colors->nombre }} / {{ $orden->modelo }}</td>
                    <td>@if ($orden->estado == 'Reparado')
                        <span class="badge badge-success">{{$orden->estado}}</span>
                        @elseif($orden->estado == 'Cancelado')
                        <span class="badge badge-danger">{{$orden->estado}}</span>
                        @elseif($orden->estado == 'Por Reparar')
                        <span class="badge badge-warning">{{$orden->estado}}</span>
                        @elseif($orden->estado == 'Entregado')
                        <span class="badge badge-info">{{$orden->estado}}</span>
                        @endif
                    </td>
                    <td>L.@php $Total=$orden->total; @endphp {{ number_format($Total, 2 ) }} </td>
                    @php
                    $suma+=$orden->total;
                    @endphp
                </tr>
                @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right">Total Ingresos</td>
                    <td>L.{{ number_format($suma, 2 ) }}</td>
                </tr>
            </tfoot>

        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(document).ready(function() {
                 $('#recepcion1').DataTable({
                     "language":{
                          "info":"_TOTAL_ registros",
                          "search":"Buscar",
                          "paginate":{
                            "next":"Siguiente",
                            "previous":"Anterior",
                    },
                    "lengthMenu":'Mostrar <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Precesando...",
                    "emptyTable":"No hay datos",
                    "zeroRecords":"No hay coincidencias",
                    "infoEmpty":"",
                    "infoFiltered":""
                     },
                });
            });
    </script>
@stop