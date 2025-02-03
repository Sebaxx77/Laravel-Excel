<!DOCTYPE html>
<html>

<head>
    <title>Registro PDF</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            border: 1px solid #ffffff;
            border-radius: 10px;
            background-color: #ffffff;
        }

        h1 {
            color: #000000;
        }

        p {
            font-size: 18px;
            color: #222222;
        }

        .field {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registro del Cliente</h1>
        <p><span class="field">Nombre:</span> {{ $customerData->nombre }}</p>
        <p><span class="field">Dirección:</span> {{ $customerData->direccion }}</p>
        <p><span class="field">Saldo:</span> {{ $customerData->saldo }}</p>
        <p><span class="field">Fecha de Nacimiento:</span> {{ $customerData->fechanacimiento }}</p>
        <p><span class="field">Documento:</span> {{ $customerData->documento }}</p>
        <p><span class="field">Activo:</span> {{ $customerData->activo == 1 ? 'Si' : 'No' }}</p>
        <p><span class="field">Notas:</span> {{ $customerData->notas }}</p>
        <p><span class="field">Descripción:</span> {{ $customerData->descripcion }}</p>
    </div>
</body>

</html>