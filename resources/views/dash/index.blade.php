@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    @php
                    $suma=0;
                    @endphp
                    @foreach ($ordenes as $ordene)
                    @if ($ordene->estado_pago =='Pagado')
                    @php
                    $suma+=$ordene->total;
                    @endphp
                    @endif
                    @endforeach
                    <div class="inner">
                        <h3>L. {{ number_format($suma, 2 ) }}</h3>
                        <p>Ingresos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    @can('reportes')
                        <a href="ingresos" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$terminados}}</h3>
                        <p>Terminados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    @can('reportes')
                    <a href="terminados" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$pendientes}}</h3>
                        <p>Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    @can('reportes')
                    <a href="pendientes" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                    @endcan
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <h1>Equipos Listo para su entrega</h1>
                    </center>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-hover">
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
                                <input type="hidden" name="estado" value="Pagado">
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
</section>
<!-- /.content -->
@stop

@section('js')
<script>
    $(document).ready(function() {
            $('#table1').DataTable({
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
<script>
    (function() {
            'use strict'
            //debemos crear la clase formEliminar dentro del form del boton borrar
            //recordar que cada registro a eliminar esta contenido en un form  
            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: '¿Esta seguro que quiere entregar el equipo?',
                            text: 'Este Proceso solo sepuede ser realizado una ves',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#20c997',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.value) {
                                this.submit();
                            }
                        })
                    }, false)
                })
        })();
</script>
@stop