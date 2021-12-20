<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../dist/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <center>
              <img src="../../dist/img/logo.png" alt="" height="70" width="200">
            </center>
          </div>
          <div class="col-sm-4">
            <center>
              <p>Barrio San Jose 2 Cuadras al sur de BanhCafe, esquina de la Escuela Piloto Luis Landa
                Morazan, Yoro
                <br> R.T.N. 18061979005430 *Cel: 9931-1592
              </p>
            </center>
          </div>
          <div class="col-sm-4">
            <center>
              <h4>Ficha del Cliente</h4>
              <small>
                <b>Fecha de Impresion: </b>
                <?php
                        date_default_timezone_set("America/Lima");
                        $fechaActual = date('d-m-Y'); 
                         echo $fechaActual;
                        ?> <br>
                <b>Orden Nº: </b>{{$tiket->codigo}}
              </small>
            </center>
          </div>
        </div>
      </div>
      <div class="row">
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col" >Datos del Cliente</th>
              <th scope="col" >Datos del Equipo</th>
              <th scope="col">Presupuesto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b>Cliente:</b> {{$tiket->clientes->nombre}}<br>
                <b>Direccion:</b> {{$tiket->clientes->direccion}}<br>
                <b>Telefono:</b> {{$tiket->clientes->telefono}}
              </td>
              <td>
                <b>Equipo:</b> {{$tiket->equipos->nombre}}<br>
                <b>Marca:</b> {{$tiket->marcas->nombre}}<br>
                <b>Color:</b> {{$tiket->colors->nombre}}<br>
                <b>Modelo:</b> {{$tiket->modelo}}<br>
                <b>Serie:</b> {{$tiket->serie}}
              </td>
              <td>
                <b>Repuesto:</b> {{$tiket->repuesto}}<br>
                <b>Costo Repuesto:</b> L. {{$tiket->costo_repuesto}}<br>
                <b>Costo Mano de Obra:</b> L. {{$tiket->costo}}<br>
                <b>Anticipo:</b> L.{{$tiket->abono}}<br> 
                <b>Total:</b> L. {{$tiket->total}} <br>
                <b>Estado Pago: </b>{{$tiket->estado_pago}}
              </td>
            </tr>
            <tr>
              <td colspan="3"><b>Desperfecto: {{$tiket->problema}}</b></td>
            </tr>
            <tr>
              <td colspan="3"><b>Diagnostico: {{$tiket->dignostico}}</b></td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer">
         <center>
          <small>
            Términos y condiciones: 1) Para retirar el equipo es indispensable presentar esta orden de reparación.
            ¡Consérvala! 2) El equipo deberá ser retirado en un plazo
            máximo de 30 días, pasado dicho tiempo el cliente perderá todo derecho sobre el mismo. 3) Al dejar el equipo en
            reparación el cliente acepta estas condiciones.
          </small>
         </center>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <div class="card-header">
    <i class="fas fa-cut"></i>
    <hr>

  </div>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <center>
              <img src="../../dist/img/logo.png" alt="" height="70" width="200">
            </center>
          </div>
          <div class="col-sm-4">
            <center>
              <p>Barrio San Jose 2 Cuadras al sur de BanhCafe, esquina de la Escuela Piloto Luis Landa
                Morazan, Yoro
                <br> R.T.N. 18061979005430 *Cel: 9931-1592
              </p>
            </center>
          </div>
          <div class="col-sm-4">
            <center>
              <h4>Ficha del Cliente</h4>
              <small>
                <b>Fecha de Impresion: </b>
                <?php
                        date_default_timezone_set("America/Lima");
                        $fechaActual = date('d-m-Y'); 
                         echo $fechaActual;
                        ?> <br>
                <b>Orden Nº: </b>{{$tiket->codigo}}
              </small>
            </center>
          </div>
        </div>
      </div>
      <div class="row">
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col" >Datos del Cliente</th>
              <th scope="col" >Datos del Equipo</th>
              <th scope="col">Presupuesto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b>Cliente:</b> {{$tiket->clientes->nombre}}<br>
                <b>Direccion:</b> {{$tiket->clientes->direccion}}<br>
                <b>Telefono:</b> {{$tiket->clientes->telefono}}
              </td>
              <td>
                <b>Equipo:</b> {{$tiket->equipos->nombre}}<br>
                <b>Marca:</b> {{$tiket->marcas->nombre}}<br>
                <b>Color:</b> {{$tiket->colors->nombre}}<br>
                <b>Modelo:</b> {{$tiket->modelo}}<br>
                <b>Serie:</b> {{$tiket->serie}}
              </td>
              <td>
                <b>Repuesto:</b> {{$tiket->repuesto}}<br>
                <b>Costo Repuesto:</b> L. {{$tiket->costo_repuesto}}<br>
                <b>Costo Mano de Obra:</b> L. {{$tiket->costo}}<br>
                <b>Anticipo:</b> L.{{$tiket->abono}}<br> 
                <b>Total:</b> L. {{$tiket->total}} <br>
                <b>Estado Pago: </b>{{$tiket->estado_pago}}
              </td>
            </tr>
            <tr>
              <td colspan="3"><b>Desperfecto: {{$tiket->problema}}</b></td>
            </tr>
            <tr>
              <td colspan="3"><b>Diagnostico: {{$tiket->dignostico}}</b></td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer">
         <center>
          <small>
            Términos y condiciones: 1) Para retirar el equipo es indispensable presentar esta orden de reparación.
            ¡Consérvala! 2) El equipo deberá ser retirado en un plazo
            máximo de 30 días, pasado dicho tiempo el cliente perderá todo derecho sobre el mismo. 3) Al dejar el equipo en
            reparación el cliente acepta estas condiciones.
          </small>
         </center>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());
  </script>
</body>

</html>