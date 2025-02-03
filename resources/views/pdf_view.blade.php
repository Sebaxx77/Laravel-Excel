<!DOCTYPE html>
<html>
<head>
    <title>Registro PDF</title>
</head>
<body>
    <h1>Registro del Cliente</h1>
    <p>Nombre: {{ $customerData->nombre }}</p>
    <p>Dirección: {{ $customerData->direccion }}</p>
    <p>Saldo: {{ $customerData->saldo }}</p>
    <p>Fecha de Nacimiento: {{ $customerData->fechanacimiento }}</p>
    <p>Documento: {{ $customerData->documento }}</p>
    <p>Activo: {{ $customerData->activo == 1 ? 'Si' : 'No' }}</p>
    <p>Notas: {{ $customerData->notas }}</p>
    <p>Descripción: {{ $customerData->descripcion }}</p>
</body>
</html>
