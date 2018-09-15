<!DOCTYPE html>
<html>
<head>
    <title>Dimerc</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <style>
        @media only screen and (min-width: 200px) and (max-width: 450px) {
        }
        @media only screen and (max-width: 768px) {
            .main-dv table {
                max-width: 600px;
                width: 100%;
                margin: 0 auto;
            }

            #main-tbl tr td {
                width: 100%;
                float: left;
            }

            #main-tbl tr .logo img {
                padding: 12px 0px 0 !important;
                margin-bottom: 15px;
                width: 100%;
                display: block;
                max-width: 100%;
                height: auto;
            }

            img {
                display: block;
                max-width: 100%;
                height: auto;
            }

            .padd-ltr {
                padding: 0 10px;
            }

            .fnt {
                font-size: 31px !important;
            }

            .foot1 {
                padding: 12px 0 0;
                width: 100%;
                display: block;
                text-align: center;
            }

            .foot2 {
                width: 100%;
                float: left;
            }

            .foot2 a img {
                width: 100%;
            }
        }
        a{
            text-decoration: none;
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
                                    Nuevas Lineas y
                                    </span>
                                        <img src="https://www.dimerc.cl/media/mailing/hed2.png" width="315">
                                    </td>
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
                            <table id="main-tbl" width="100%" align="center">
                                <tr>
                                    <td width="100%" align="left" class="logo">
                                        <p style="margin-left: 15%; margin-right: 15%; text-align: justify;">
                                            Estimado Cliente, su condición de pago es <strong>Depósito Previo</strong>, por ende, debe realizar el depósito o transferencia del valor total de tu compra.
                                        </p>
                                        <p style="margin-left: 15%; margin-right: 15%">
                                            Por favor realizar el pago en la siguiente cuenta bancaria:
                                        </p>
                                        <p style="margin-left: 15%;  margin-right: 15%;">
                                            <img src="http://www.dimerc.cl/media/mail/Logos_CH1.png" alt="Mountain View" style="width:auto;height:auto;"><br/>
                                            <font color="black"><b>Banco:</b>Banco de Chile
                                                <br/><b>Razón Social:</b> Dimerc S.A.
                                                <br/><b>RUT:</b> 96670840-9
                                                <br/><b>Cuenta Corriente:</b> 1680268604
                                                <br/><b>Comprobante de Pago:</b>ventasweb@dimerc.cl
                                                <br/><b>Número de Pedido Web:</b> {{ $numeropedido }}
                                            </font>
                                            <br/><br/>
                                        </p>
                                    </td>
                                    <td width="20%" align="center" cellspacing="0" cellpadding="0">
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" align="center">
                                <tr bgcolor="#cf1b2b">
                                    <td>
                                        <h2 style="text-align: center"><span style="color:#fff">Total a Pagar: ${{ number_format($monto, 0, ',', '.') }}</span></h2>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <p style="margin-left: 15%; margin-right: 15%">
                                            Envíenos el comprobante de pago a <a href="mailto:ventasweb@dimerc.cl">ventasweb@dimerc.cl</a> y su pedido sera procesado dentro de las siguientes 48 horas.<br/><br/>
                                            Más información al fono <a href="tel:+56223858308">(+562) 2385 8308</a> o a nuestro email.</font>
                                        </p>
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
                                            Christian Durán <br/>
                                            ventasweb@dimerc.cl <br/>
                                            Alberto Pepper 1784, Renca <br/>
                                            Santiago <br/>
                                            www.dimerc.cl <br/>
                                            Tel.: (+562) 2385 8308 <br/>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Logo Section -->
                    <tr width="700" bgcolor="">
                        <td width="100%" align="center">
                            <table width="675" align="center">
                                <tr>
                                    <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 20px 0px; width: 29%;"><img src="http://i.embluejet.com/ImagenesMoxie/3327/images/me_gusta_dimerc.png" alt="" width="100" height="37"></td>
                                    <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 20px 0px; width: 28%;"><img src="http://i.embluejet.com/ImagenesMoxie/3327/images/chat_en_linea.png" alt="" width="100" height="37"><br/></td>
                                    <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 20px 0px; width: 21.3223%;"><img src="http://i.embluejet.com/ImagenesMoxie/3327/images/compra_simple.png" alt="" width="100" height="38"></td>
                                    <td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0px; padding: 20px 0px; width: 26.6777%;"><img src="http://i.embluejet.com/ImagenesMoxie/3327/images/estado_del_pedido.png" alt="" width="100" height="37"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr width="700" bgcolor="#cf152d">
                        <td width="100%" align="center">
                            <table width="675" align="center">
                                <tr>
                                    <td class="foot1" width="295" align="left" style="padding: 25px 0 0;">
                                    <span style="font-size: 23px;color: #fff;font-weight: 100;">
                                    <b> TODO </b> PARA TU TRABAJO <br/>
                                    <b> EN UN SOLO LUGAR  ;) </b>
                                    </span>
                                    </td>
                                    <td class="foot2" width="405" align="right" valign="center">
                                        <a href="#">
                                            <img src="https://www.dimerc.cl/media/mailing/icons.png" width="400" style="margin: 22px 0 0;">
                                        </a>
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
                                        <img src="https://www.dimerc.cl/media/mailing/dotted.png" width="595" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr width="700" valign="top" align="center" bgcolor="#cf152d">
                        <td width="100%" align="center">
                            <table>
                                <tr>
                                    <td width="233" align="center">
                                        <a href="http://www.dimerc.cl">
                                            <span style="color: #fff; font-weight: 600; font-style: italic; font-size: 18px;">
                                                dimerc.cl
                                            </span>
                                        </a>
                                    </td>
                                    <td width="233" align="center">
                                        <a href="mailto:info@dimerc.cl">
                                            <img src="https://www.dimerc.cl/media/mailing/03.png" style="width: 25px;display: inline-block;"/><span style="color: #fff; font-weight: 600; font-style: italic; font-size: 18px;">
                                            info@dimerc.cl
                                            </span>
                                        </a>
                                    </td>
                                    <td width="233" align="center">
                                        <a href="tel:+56223858200">
                                            <img src="https://www.dimerc.cl/media/mailing/02.png" style="width: 25px;display: inline-block;"/><span style="color: #fff; font-weight: 600; font-style: italic; font-size: 18px;">
                                            2 2385 82 00
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