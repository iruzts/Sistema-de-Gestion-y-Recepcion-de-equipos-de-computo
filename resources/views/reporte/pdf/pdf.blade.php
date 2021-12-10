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
        body {
            margin: 0px;
        }

        p {
            font-size: x-small
        }
        .encabezado {
            width: 50%;
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="card-body">
        <center>
            <img src="dist/img/logo.png" alt="" height="70" width="200">
            <p>Barrio San Jose 2 Cuadras al sur de BanhCafe, esquina de la Escuela Piloto Luis Landa Morazan, Yoro
            <br> R.T.N. 18061979005430 *Cel: 9931-1592</p>
            <table class="table">
                <tr>
                    <td style="text-align:center" >Fecha Impresion de Reporte 
                        <?php date_default_timezone_set("America/Lima");
                        $fechaActual = date('d-m-Y'); 
                        echo $fechaActual;
                        ?> <br></td>
                    <td style="text-align:center">Reportes desde el {{$fechaInicio}} hasta {{$fechaFin}}</td>
                </tr>
            </table>
            
          </center>
    </div>
    <div class="row">
        <table id="recepcion1" class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Codigo</th>
                    <th>Tecnico</th>
                    <th>Cliente</th>
                    <th>Equipo</th>
                    <th>Total a Pagar</th>
                </tr>
            </thead>
            <tbody>
                @php
                $suma=0;
                @endphp
                @foreach ($Reporte as $Reporte)
                <tr>
                    <td>{{$Reporte->codigo}}</td>
                    <td>{{$Reporte->user->name}}</td>
                    <td>{{$Reporte->clientes->nombre}}</td>
                    <td>{{$Reporte->equipos->nombre }} / {{ $Reporte->marcas->nombre }} /
                        {{$Reporte->colors->nombre }} / {{ $Reporte->modelo }}</td>
                    <td>L.@php $Total=$Reporte->total; @endphp {{ number_format($Total, 2 ) }} </td>
                    @php
                    $suma+=$Reporte->total;
                    @endphp
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right">Total</td>
                    <td>L.{{ number_format($suma, 2 ) }}</td>
                </tr>
            </tfoot>

        </table>
    </div>
    </div>
</body>

</html>