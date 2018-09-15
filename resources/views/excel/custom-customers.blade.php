<html class="" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="m-home" data-scrolling-animations="false" data-equal-height=".b-auto__main-item">
<table name="tablita" id="tablita" class="table">
    <thead>
    <tr style="background-color: #000000; color: #FFFFFF;">
        <th>RUT Empresa</th>
        <th>Razon Social</th>
        <th>MAIL</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Región</th>
        <th>Comuna</th>
        <th>Fecha Creación</th>
        <th>Fecha primera compra</th>
        <th>Monto primera compra</th>
        <th>Grupo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($registros as $registro)
        <tr>
            <td>{{ $registro['rut_empresa'] }}</td>
            <td>{{ $registro['razon_social']}}</td>
            <td>{{ $registro['mail']}}</td>
            <td>{{ $registro['nombre']}}</td>
            <td>{{ $registro['apellido']}}</td>
            <td>{{ $registro['telefono']}}</td>
            <td>{{ $registro['direccion']}}</td>
            <td>{{ $registro['region']}}</td>
            <td>{{ $registro['comuna']}}</td>
            <td>{{ substr($registro['fecha_creacion'], 0, 10) }}</td>
            <td>{{ substr($registro['primera_compra_fecha'], 0, 10) }}</td>
            <td>${{ ($registro['primera_compra_monto']) ? number_format($registro['primera_compra_monto'], 0, ',', '.') : 0 }}</td>
            <td>{{ $registro['grupo']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>