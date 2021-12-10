<!-- Modal editar-->
<div class="modal fade" id="modaleditar{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
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
                <form action="/ordenes/{{ $orden->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">#</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" value="{{$orden->codigo}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="fecha" value="{{$orden->fecha_ingreso}}" disabled>
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
                                <input type="text" class="form-control" placeholder="Username" value="{{$orden->user->name}}" disabled>
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
                                        data-placeholder="Seleccione Cliente" style="width: 100%;" disabled >
                                        <option>{{$orden->clientes->nombre}}</option>
                                    </select>
                                    <span class="input-group-append">
                                        <button href="" type="button" class="btn btn-primary btn-flat"
                                            data-toggle="modal" data-target="#modalcrearcli"><i
                                                class="fas fa-plus"></button></i>
                                    </span>
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
                                <select id="inputmarca" name="equipo" class="form-control" disabled>
                                    <option >{{$orden->equipos->nombre}}</option>
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
                                <select id="inputmarca" name="marca" class="form-control" disabled>
                                    <option >{{$orden->marcas->nombre}}</option>
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
                                <select id="inputmarca" name="color" class="form-control" disabled>
                                    <option >{{$orden->colors->nombre}}</option>
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
                                <input value="{{$orden->modelo}}" name="modelo" type="text" class="form-control" placeholder="Modelo del Equipo" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input value="{{$orden->serie}}" name="serie" type="text" class="form-control" placeholder="Numero de Serie" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Estado</strong></span>
                                </div>
                                <select id="inputmarca" name="estado" class="form-control">
                                    <option value="Por Reparar">Por Reparar</option>
                                    <option value="Reparado">Reparado</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Entregado">Entregado</option>
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona Marca.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pendiente" {{$orden->estado_pago == 'Pendiente' ? 'checked' : ''}}>
                                    <label class="form-check-label" >Pendiente</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pagado" {{$orden->estado_pago == 'Pagado' ? 'checked' : ''}}>
                                    <label class="form-check-label" >Pagado</label>
                                </div>
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
                                <input value="{{$orden->claveequipo}}" name="password" type="text" class="form-control" placeholder="Contraseña" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="inputproblema">Sintomas Reportados</label>
                                <textarea id="inputproblema" name="problema" class="form-control" rows="3"
                                    placeholder="Detalles de problemas presentados"  disabled>{{$orden->problema}}</textarea>
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
                                    placeholder="accesorios dejados con el equipo" disabled>{{$orden->dignostico}}</textarea>
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
                                <input name="fecha-entrega" value="{{$orden->fecha_probable_entrega}}" type="date" class="form-control" placeholder="Username" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Garantia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input name="garantia" value="{{$orden->garantia}}" type="date" class="form-control" placeholder="Username" disabled>
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
                                <input name="repuesto" value="{{$orden->repuesto}}" type="text" class="form-control" placeholder="detalles repuesto" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="costo_repuesto" value="{{$orden->costo_repuesto}}" id="txt_campo_1" onchange="sumar();" type="text" class="form-control monto" placeholder="costo" disabled>
                            </div>
                        </div>
                    </div>
                    <p> <strong>Presupuesto</strong> </p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>L.</strong></span>
                                </div>
                                <input name="costo" value="{{$orden->costo}}" id="txt_campo_2" onchange="sumar();" type="number" class="form-control monto" placeholder="costo" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="abono" id="txt_campo_3" value="{{$orden->abono}}" disabled onchange="sumar();" type="number" class="form-control resta" placeholder="abono">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <strong>L.</strong></span>
                                </div>
                                <input name="total" id="total" value="{{$orden->total}}" disabled readonly class="form-control" placeholder="Total">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar Orden</button>
            </div>
        </form>

        </div>
    </div>
</div>