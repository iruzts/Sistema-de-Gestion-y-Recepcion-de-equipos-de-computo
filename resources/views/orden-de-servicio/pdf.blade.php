<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="dist/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="dist/fontawesome-free/css/all.min.css" type="text/css">

  <title>Document</title>
  <style>
    @page {
        margin: 10px;
        padding: 10px;
    }
    body {
        margin: 0px;
    }
    p{
        font-size: x-small
    }
</style>
</head>

<body>
  <div class="card-body">
    <div class="row">
      <table>
        <thead>
          <tr>
            <th style=" width: 50px;" scope="col">
              <img src="dist/img/logo.png" alt="" height="70" width="200">
            </th>
            <th scope="col" class="text-center">
              <small style="font-size: x-small">Barrio San Jose 2 Cuadras al sur de BanhCafe, esquina de la Escuela Piloto Luis Landa
                Morazan, Yoro
                <br> R.T.N. 18061979005430 *Cel: 9931-1592
              </small>
            </th>
            <th  scope="col" style="text-align: right">
                <h4>Ficha del Cliente</h4>
                <small style="font-size: x-small" class="text-right">
                <b>Fecha de Impresion: </b><?php
                    date_default_timezone_set("America/Lima");
                    $fechaActual = date('d-m-Y'); 
                     echo $fechaActual;
                    ?> <br>
                <b>Orden Nº: </b>{{$tiket->codigo}}
              </small>
            </th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead class="thead-light" style="font-size: x-small">
          <tr>
            <th scope="col" style="font-size: x-small">Datos del Cliente</th>
            <th scope="col" style="font-size: x-small">Datos del Equipo</th>
            <th scope="col" style="font-size: x-small">Presupuesto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-size: x-small">
              <b>Cliente:</b> {{$tiket->clientes->nombre}}<br>
              <b>Direccion:</b> {{$tiket->clientes->direccion}}<br>
              <b>Telefono:</b> {{$tiket->clientes->telefono}}
            </td>
            <td style="font-size: x-small">
              <b>Equipo:</b> {{$tiket->equipos->nombre}}<br>
              <b>Marca:</b> {{$tiket->marcas->nombre}}<br>
              <b>Color:</b> {{$tiket->colors->nombre}}<br>
              <b>Modelo:</b> {{$tiket->modelo}}<br>
              <b>Serie:</b> {{$tiket->serie}}
            </td>
            <td style="font-size: x-small">
              <b>Repuesto:</b> {{$tiket->repuesto}}<br>
              <b>Costo Repuesto:</b> L. {{$tiket->costo_repuesto}}<br>
              <b>Costo Mano de Obra:</b> L. {{$tiket->costo}}<br>
              <b>Anticipo:</b> L.{{$tiket->abono}}<br> 
              <b>Total:</b> L. {{$tiket->total}} <br>
              <b>Estado Pago: </b>{{$tiket->estado_pago}}
            </td>
          </tr>
          <tr>
            <td colspan="3" style="font-size: x-small"><b>Desperfecto: {{$tiket->problema}}</b></td>
          </tr>
          <tr>
            <td colspan="3" style="font-size: x-small"><b>Diagnostico: {{$tiket->dignostico}}</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <small style="font-size: xx-small">
        Términos y condiciones: 1) Para retirar el equipo es indispensable presentar esta orden de reparación.
        ¡Consérvala! 2) El equipo deberá ser retirado en un plazo
        máximo de 30 días, pasado dicho tiempo el cliente perderá todo derecho sobre el mismo. 3) Al dejar el equipo en
        reparación el cliente acepta estas condiciones.
      </small>
    </div>
  </div>
  <div class="card-header">
    <i class="fas fa-cut"></i>
  </div>
  <div class="card-body">
    <div class="row">
      <table>
        <thead>
          <tr>
            <th style=" width: 50px;" scope="col">
              <img src="dist/img/logo.png" alt="" height="70" width="200">
            </th>
            <th scope="col" class="text-center">
              <small style="font-size: x-small">Barrio San Jose 2 Cuadras al sur de BanhCafe, esquina de la Escuela Piloto Luis Landa
                Morazan, Yoro
                <br> R.T.N. 18061979005430 *Cel: 9931-1592
              </small>
            </th>
            <th  scope="col" style="text-align: right">
                <h4>Ficha de la Empresa</h4>
                <small style="font-size: x-small" class="text-right">
                <b>Fecha de Impresion: </b><?php
                    date_default_timezone_set("America/Lima");
                    $fechaActual = date('d-m-Y'); 
                     echo $fechaActual;
                    ?> <br>
                <b>Orden Nº: </b>{{$tiket->codigo}}
              </small>
            </th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead class="thead-light" style="font-size: x-small">
          <tr>
            <th scope="col" style="font-size: x-small">Datos del Cliente</th>
            <th scope="col" style="font-size: x-small">Datos del Equipo</th>
            <th scope="col" style="font-size: x-small">Presupuesto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-size: x-small">
              <b>Cliente:</b> {{$tiket->clientes->nombre}}<br>
              <b>Direccion:</b> {{$tiket->clientes->direccion}}<br>
              <b>Telefono:</b> {{$tiket->clientes->telefono}}
            </td>
            <td style="font-size: x-small">
              <b>Equipo:</b> {{$tiket->equipos->nombre}}<br>
              <b>Marca:</b> {{$tiket->marcas->nombre}}<br>
              <b>Color:</b> {{$tiket->colors->nombre}}<br>
              <b>Modelo:</b> {{$tiket->modelo}}<br>
              <b>Serie:</b> {{$tiket->serie}}
            </td>
            <td style="font-size: x-small">
              <b>Repuesto:</b> {{$tiket->repuesto}}<br>
              <b>Costo Repuesto:</b> L. {{$tiket->costo_repuesto}}<br>
              <b>Costo Mano de Obra:</b> L. {{$tiket->costo}}<br>
              <b>Anticipo:</b> L.{{$tiket->abono}}<br> 
              <b>Total:</b> L. {{$tiket->total}} <br>
              <b>Estado Pago: </b>{{$tiket->estado_pago}}
            </td>
          </tr>
          <tr>
            <td colspan="3" style="font-size: x-small"><b>Desperfecto: {{$tiket->problema}}</b></td>
          </tr>
          <tr>
            <td colspan="3" style="font-size: x-small"><b>Diagnostico: {{$tiket->dignostico}}</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <small style="font-size: xx-small">
        Términos y condiciones: 1) Para retirar el equipo es indispensable presentar esta orden de reparación.
        ¡Consérvala! 2) El equipo deberá ser retirado en un plazo
        máximo de 30 días, pasado dicho tiempo el cliente perderá todo derecho sobre el mismo. 3) Al dejar el equipo en
        reparación el cliente acepta estas condiciones.
      </small>
    </div>
  </div>
</body>
</html>
