@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ordenes de Servicio</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="dash"><i class="fas fa-home"></i> Principal</a></li>
                    <li class="breadcrumb-item active">Ordenes</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary float-right btn-sm mr-1" data-toggle="modal"
                    data-target="#exampleModalLong">
                    <i class="fas fa-plus"> Nueva Orden </i>
                </button>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
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
                    <td>L. {{$orden->total}} @if ($orden->estado_pago == 'Pendiente')
                        <span class="badge badge-warning">{{$orden->estado_pago}}</span>
                        @elseif($orden->estado_pago == 'Pagado')
                        <span class="badge badge-success">{{$orden->estado_pago}}</span>
                        @endif
                    </td>
                    <td class="flex">
                        <a class="btn btn-primary btn-sm" rel="noopener" href="{{ url('/ordenes/printpdf/'.$orden->id) }}" target="_blank">
                            <i class="fas fa-print"></i>
                            Tiket
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ url('/ordenes/pdf/'.$orden->id) }}" target="_blank" title="Documento PDF">
                            <i class="fas fa-file-pdf"></i> </a>
                        <a class="btn btn-primary btn-sm"  href="{{route('ordenes.edit', $orden->id)}}"
                             title="editar">
                            <i class="fas fa-pencil-alt">
                            </i> </a>
                        <a class="btn btn-info btn-sm" data-toggle="modal" href=""
                            data-target="#modalestado{{$orden->id}}">
                            <i class="fas fa-info-circle"></i>
                            Estatus
                        </a>
                        @include('orden-de-servicio.estado')
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>

                </tr>
            </tfoot>

        </table>
    </div>
</div>

<!-- Modal Create-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva Orden</h5>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ordenes" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">#</span>
                                </div>
                                <input name="codigo" type="hidden" value="{{$numero+1}}">
                                <input type="text" class="form-control" value="{{$numero+1}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="fecha" value="{{$fecha}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Tecnico Responsable</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username"
                                    value="{{auth()->user()->name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="inputcliente">Datos del Cliente</label>
                                <div class="input-group-append">
                                    <select id="inputcliente" name="Ncliente" class="select2"
                                        data-placeholder="Seleccione Cliente" style="width: 100%;" required>
                                        <option selected disabled value="">seleccionar Cliente</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6><strong>Datos del Equipo</strong></h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                </div>
                                <select id="inputmarca" name="equipo" class="form-control" required>
                                    <option selected disabled value="">Seleccione Equipo</option>
                                    @foreach ($equipos as $equipo)
                                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona Marca.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                </div>
                                <select id="inputmarca" name="marca" class="form-control" required>
                                    <option selected disabled value="">Seleccione Marca</option>
                                    @foreach ($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona Marca.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tint"></i></span>
                                </div>
                                <select id="inputmarca" name="color" class="form-control" required>
                                    <option selected disabled value="">Seleccione color</option>
                                    @foreach ($colores as $color)
                                    <option value="{{$color->id}}">{{$color->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona Marca.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                </div>
                                <input name="modelo" type="text" class="form-control" placeholder="Modelo del Equipo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input name="serie" type="text" class="form-control" placeholder="Numero de Serie">
                            </div>
                        </div>
                    </div>
                    <p>En caso que el equipo posea seguridad exiga al cliente desactivarlo temporalmente o espesificar
                        una contraseña</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="password" type="text" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="inputproblema">Sintomas Reportados</label>
                                <textarea id="inputproblema" name="problema" class="form-control" rows="3"
                                    placeholder="Detalles de problemas presentados" required></textarea>
                                <div class="invalid-tooltip">
                                    Por favor detallar problema.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Acciones a Tomar para resolver falla</label>
                                <textarea name="dignostico" class="form-control" rows="3"
                                    placeholder="accesorios dejados con el equipo" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Fecha Probable de Entrega</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input name="fecha-entrega" type="date" class="form-control" placeholder="Username"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Garantia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input name="garantia" type="date" class="form-control" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <p> <strong>Repuesto</strong> </p>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                </div>
                                <input name="repuesto" type="text" class="form-control" placeholder="detalles repuesto">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="costo_repuesto" value="0" id="costo_repuesto[]" onkeyup="sum();"
                                    type="text" class="form-control monto" placeholder="costo">
                            </div>
                        </div>
                    </div>
                    <p> <strong>Presupuesto</strong> </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>L.</strong></span>
                                </div>
                                <input name="costo" id="costo[]" value="0" onkeyup="sum();" type="text"
                                    class="form-control monto" placeholder="costo">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="abono" id="abono[]" value="0" onkeyup="sum();" type="text"
                                    class="form-control resta" placeholder="abono">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="total" type="text" id="txt3" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pendiente">
                                    <label class="form-check-label">Pendiente</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pagado">
                                    <label class="form-check-label">Pagado</label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Orden</button>
            </div>
            </form>

        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
<script>
    $(function() {
            $('.select2').select2()
        });
</script>
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
<script>
    function sum() {
        var costo_repuesto = document.getElementById('costo_repuesto[]').value;
        var costo = document.getElementById('costo[]').value;
        var abono = document.getElementById('abono[]').value;

        var result = parseFloat(costo_repuesto) + (parseFloat(costo) - parseFloat(abono));
        
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
    }
    window.onload = function() {
        sum();
    }
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
                        title: '¿Confirma la eliminación del registro?',
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
    })()
</script>
@stop