<!DOCTYPE html>
<html>

<head>
    <title>phpzag.com : Demo Import Excel File in Laravel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div role="navigation" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="http://www.phpzag.com" class="navbar-brand">PHPZAG.COM</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.phpzag.com">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <h2>Lista de Customer Data</h2>
        <br>
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección de Residencia</th>
                            <th>Saldo</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Documento de Identificación</th>
                            <th>Activo</th>
                            <th>Notas</th>
                            <th>Descripción</th>
                        </tr>
                        @foreach($customerData as $customer)
                        <tr>
                            <td>{{ $customer->nombre }}
                                <br>
                                <a href={{ route('generatePdf', $customer->id) }} class="btn btn-danger">Descargar
                                    PDF</a>
                            </td>
                            <td>{{ $customer->direccion }}</td>
                            <td>{{ $customer->saldo }}</td>
                            <td>{{ $customer->fechanacimiento }}</td>
                            <td>{{ $customer->documento }}</td>
                            <td>{{ $customer->activo == 1 ? 'Si' : 'No' }}</td>
                            <td>{{ $customer->notas }}</td>
                            <td>{{ $customer->descripcion }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>