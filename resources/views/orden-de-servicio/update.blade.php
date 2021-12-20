@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i>
                    Editar Orden</h3>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                    <li class="breadcrumb-item active">Ordenes</li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card card-default">
    <div class="card-body">
        <form action="/ordenes/{{ $orden->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username"
                            value="{{$orden->codigo}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="fecha"
                            value="{{$orden->fecha_ingreso}}" disabled>
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
                            value="{{$orden->user->name}}" disabled>
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
                                data-placeholder="Seleccione Cliente" style="width: 100%;">
                                     <option >{{$orden->clientes->nombre}}</option>
                                @foreach ($clientes as $cliente)
                                @if ($cliente->id != $orden->cliente_id)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                Por favor selecciona cliente.
                            </div>
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
                        <select id="inputmarca" name="equipo" class="form-control" >
                            <option >{{$orden->equipos->nombre}}</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{$equipo->id}}" >{{$equipo->nombre}}</option>
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
                        <select id="inputmarca" name="marca" class="form-control" >
                            <option >{{$orden->marcas->nombre}}</option>
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
                        <select id="inputmarca" name="color" class="form-control" >
                            
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
                        <input value="{{$orden->modelo}}" name="modelo" type="text" class="form-control"
                            placeholder="Modelo del Equipo" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input value="{{$orden->serie}}" name="serie" type="text" class="form-control"
                            placeholder="Numero de Serie" >
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
                        <input value="{{$orden->claveequipo}}" name="password" type="text" class="form-control"
                            placeholder="Contraseña" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="inputproblema">Sintomas Reportados</label>
                        <textarea id="inputproblema" name="problema" class="form-control" rows="3"
                            placeholder="Detalles de problemas presentados"
                            >{{$orden->problema}}</textarea>
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
                            placeholder="diagnostico"
                            >{{$orden->dignostico}}</textarea>
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
                        <input name="fecha-entrega" value="{{$orden->fecha_probable_entrega}}" type="date"
                            class="form-control" placeholder="Username" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Garantia</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input name="garantia" value="{{$orden->garantia}}" type="date" class="form-control"
                            placeholder="Username" >
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
                        <input name="repuesto" value="{{$orden->repuesto}}" type="text" class="form-control"
                            placeholder="detalles repuesto">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>L.</strong></span>
                        </div>
                        <input name="costo_repuesto" value="{{$orden->costo_repuesto}}" id="costo_repuesto[]" onkeyup="sum();"
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
                        <input name="costo" id="costo[]" value="{{$orden->costo}}" onkeyup="sum();" type="text"
                            class="form-control monto" placeholder="costo">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>L.</strong></span>
                        </div>
                        <input name="abono" id="abono[]" value="{{$orden->abono}}" onkeyup="sum();" type="text"
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit2" class="btn btn-primary">Actualizar Orden</button>
            </div>
        </form>
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
    $(function() {
            $('.select2').select2()
        });
</script>
@stop
