<!DOCTYPE html>
<html>
<head>
    <title>Dimerc</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <style>
        @media only screen and (min-width: 200px) and (max-width: 450px){
        }
        @media only screen and (max-width: 768px){
            .main-dv table{
                max-width: 600px;
                width: 100%;
                margin: 0 auto;
            }
            #main-tbl tr td{
                width: 100%;
                float: left;
            }
            #main-tbl tr .logo img{
                padding: 12px 0px 0 !important;
                margin-bottom: 15px;
                width: 100%;
                display: block;
                max-width: 100%;
                height: auto;
            }
            img{
                display: block;
                max-width: 100%;
                height: auto;
            }
            .padd-ltr{
                padding: 0 10px;
            }
            .fnt{
                font-size: 31px !important;
            }
            .foot1{
                padding: 12px 0 0;
                width: 100%;
                display: block;
                text-align: center;
            }
            .foot2{
                width: 100%;
                float: left;
            }
            .foot2 a img{
                width: 100%;
            }
        }
        a {
            text-decoration: none;
        }

        /*Nuevos estilos*/
        .mi-tabla table  {
            border-collapse: collapse;
            width: 100%;
        }

        .mi-tabla th, .mi-tabla td {
            text-align: left;
            padding: 8px;
        }

        .mi-tabla tr:nth-child(even){
            background-color: #f20d17
        }

        .mi-tabla th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: 'Open Sans', sans-serif;width: 100%;height: 100%;" >
<div class="main-dv">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f1f1f1">
        <tr>
            <td align="center" valign="top">
                <table width="700" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid rgba(220, 220, 220, 0.62);background: #fff;">
                    <tr width="700" valign="top">
                        <td width="100%" align="left">
                            <table id="main-tbl" width="100%" align="center">
                                <tr>
                                    <td width="50%" align="left" class="logo">
                                        <img src="https://www.dimerc.cl/media/mailing/bg1.png" width="290" style="padding: 18px 18px 0;">
                                    </td>
                                    <td width="50%" align="center" cellspacing="0" cellpadding="0">
                                    <span style="font-size: 23px;font-weight: 700; margin-bottom: 6px;display: block;">
                                    Notificaciones Automáticas Dimerc Labs.
                                    </span>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Logo Section -->
                    <tr>
                        <td height="20"></td>
                    </tr>
                    <tr width="700" valign="top" align="center">
                        <td width="100%" align="left">
                        </td>
                    </tr>
                    <tr width="700" valign="top" align="center">
                    </tr>
                    <tr width="700" valign="top">
                        <td width="100%" align="left">
                            <table id="main-tbl" width="100%" align="center" class="mi-tabla">
                                <tr>
                                    <td width="80%" align="left" class="logo">
                                        <p style="margin-left: 20%; text-align: justify;">
                                            Estimado(a) {{ $usuario }} <br/>
                                            Usted acaba de crear <strong>{{ $cantidad_ok }} Productos Fulfillmente</strong> (de {{ $cantidad }}) a través del sitio <a href="http://10.10.201.110/portal_bi">Portal BI</a>.<br/>
                                        </p>

                                        <div style="margin-left: 20%; text-align: justify;">
                                            Los productos creados fueron:
                                            <table>
                                                <thead>
                                                <th>RUT Proveedor</th>
                                                <th>Código del producto</th>
                                                <th>Código del proveedor</th>
                                                <th>Descripción producto</th>
                                                </thead>
                                                <tbody>
                                                @foreach($productos as $producto)
                                                    <td>{{ $producto->rut_proveedor }}</td>
                                                    <td>{{ $producto->codigo_producto }}</td>
                                                    <td>{{ $producto->codigo_proveedor }}</td>
                                                    <td>{{ $producto->descripcion_producto }}</td>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </td>
                                    <td width="20%" align="center" cellspacing="0" cellpadding="0">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Logo Section -->
                    <tr width="700" valign="top">
                        <td width="100%" align="left">
                            <table id="main-tbl" width="100%" align="center">
                                <tr>
                                    <td width="80%" align="left" class="logo">
                                        <p style="margin-left: 20%">
                                            Estamos a su disposición. No dude contactarnos para resolver sus dudas y necesidades. Sin otro particular,
                                        </p>
                                    </td>
                                    <td width="20%" align="center" cellspacing="0" cellpadding="0">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Logo Section -->
                    <tr width="700" valign="top">
                        <td width="100%" align="left">
                            <table id="main-tbl" width="100%" align="center">
                                <tr>
                                    <td width="80%" align="right" class="logo">
                                        <p style="margin-right: 20%">
                                            Felipe Burgos O.<br/>
                                            fburgos@dimerclabs.com
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr width="700" valign="top" align="center" bgcolor="#cf152d">
                        <td width="100%" align="center">
                            <table>
                                <tr>
                                    <td width="700" align="center">
                                        <img src="https://www.dimerc.cl/media/mailing/dotted.png" width="595">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr width="700" valign="top" align="center" bgcolor="#cf152d">
                        <td width="100%" align="center">
                            <table>
                                <tr>
                                    <td width="349" align="center">
                                        <a href="http://www.dimerc.cl">
                                    <span style="color: #fff; font-weight: 600; font-style: italic; font-size: 18px;">
                                    dimerc.cl
                                    </span>
                                        </a>
                                    </td>
                                    <td width="349" align="center">
                                        <a href="mailto:info@dimerc.cl">
                                            <img src="https://www.dimerc.cl/media/mailing/03.png" style="width: 25px;display: inline-block;"/><span style="color: #fff; font-weight: 600; font-style: italic; font-size: 18px;">
                                    fburgos@dimerclabs.com
                                    </span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>