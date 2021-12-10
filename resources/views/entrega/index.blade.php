@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Equipos Listo para su entrega</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                    <li class="breadcrumb-item active">Ordenes</li>
                    <li class="breadcrumb-item active">Entrega</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                @if ($orden->estado=='Reparado')
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
                    <td>L. {{$orden->total}}</td>
                    <td>
                        <form action="{{ route('salida.update', $orden->id) }}" method="post"
                            style="display: inline-block" class="formEliminar">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="estado" value="Entregado">
                            <button type="submit" class="btn btn-success btn-sm mx-1">
                                    Entregar</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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