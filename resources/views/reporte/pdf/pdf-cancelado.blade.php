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
            <center><h4>Reporte Equipos Cancelados</h4></center>
            <table class="table">
                <tr>
                    <td style="text-align:center" >Fecha Impresion de Reporte 
                        <?php date_default_timezone_set("America/Lima");
                        $fechaActual = date('d-m-Y'); 
                        echo $fechaActual;
                        ?> <br></td>
                </tr>
            </table>
            
          </center>
    </div>
    <div class="row">
        <div class="card-body">
            <table id="recepcion1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Cliente</th>
                        <th>Equipo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenes as $orden)
                    @if ($orden->estado == 'Cancelado')
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
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
    
                    </tr>
                </tfoot>
    
            </table>
        </div>
    </div>
    </div>
</body>

</html>