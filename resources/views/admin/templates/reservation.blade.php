<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @font-face {
            font-family: 'Lato';
            src: url('{{ public_path('assets/fonts/Lato-Regular.ttf') }}') format('truetype');
            font-weight: normal;
        }
        @font-face {
            font-family: 'Lato';
            src: url('{{ public_path('assets/fonts/Lato-Bold.ttf') }}') format('truetype');
            font-weight: bold;
        }
        @font-face {
            font-family: 'Lato';
            src: url('{{ public_path('assets/fonts/Lato-Italic.ttf') }}') format('truetype');
            font-style: italic;
        }
        
        * {
            font-family: 'Lato'; /* Apply the Google Font */
        }
        body { border-top:1px solid #686d72; width:100%; color:#333333; padding:20px 0px 0px 0px; }
        h1 { font-size: 22px; }
        h2 { font-size:14pt; color:#333333; }
        h4 { margin-bottom:2px; margin-top:0px; font-weight:400; }
        table#info_cliente { width:100%; margin-bottom:30px; }
        table#info_cliente tr td table tr td { font-size:10pt; padding:0px 10px 0px 0px; }
        .texto_01 { color:#006C67; }
        .texto_02 { color:#EB7920; }
        table#detalle { width:100%; margin-top:0px; }
        table#detalle tr td { border-bottom:0px; padding:5px 0px; font-size:10pt; }
        table#detalle tr.border-none td { border-bottom:none; font-size:11pt; padding-bottom:3px; color:#333333; }
        table#detalle2 { width:100%; margin-top:50px; }
        table#detalle2 h3 { margin-top:2px; margin-bottom:2px; font-size:12px; }
        table#detalle2 tr td { font-size:10px; padding:0px 2px; }
        
        @page { margin: 120px 50px; border:1px solid #333333; }
        #header { position: absolute; top: -120px; left: 0px; width:100%; height:120px; padding:50px 0px 0px 0px; } 
        #footer { position: absolute; left: 0px; bottom: -245px; width:100%; height:205px; padding:0px; border-top:1px solid #686d72; }
        #footer ul { display:block; text-align:center; padding:0px; margin:0px; }
        #footer ul li { text-align:center; display:inline; padding:0px 20px; }
        #footer ul li a { font-size:9pt; color:#333333; text-decoration:none; }
        #footer p { margin:0px; font-size:10pt; color:#333333; text-align:center; }
        #footer-pre { position: absolute; left: 0px; bottom:-10px; width:100%; height:205px; text-align:center; }
        #footer-pre p { margin:0px; font-size:14px; font-weight:600; line-height:18px; padding:0px; }
        #header table { width:100%; }
        #header tr td { width:33%; }
        #header h1 { text-align:center; }
        #header table tr td table tr td { font-size:10pt; line-height:12px; }
    </style>
</head>
<body>

    <div id="header">
        <table border="0" cellspadding="0" cellspacing="0">
            <tr>
                <td valign="top" align="left">
                    <img src="{{ public_path('assets/img/logo-site.jpg') }}" width="180">
                </td>
                <td valign="top" align="center"></td>
                <td valign="top">
                    <table border="0" cellspadding="0" cellspacing="0" align="right">
                        <tr>
                            <td align="right" style="font-size:12px;">Orden No. {{ $prescription->id }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div id="content">
        <table border="0" cellspadding="0" cellspacing="0" id="info_cliente">
            <tr>
                <td valign="top" style="width:60%;">
                    <table border="0" cellspadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                            <td style="width:100%;"><h4><strong>Sr.(a):</strong> {{ $prescription->user->nombre }}</h4></td>
                        </tr>
                        <tr>
                            <td style="width:100%;"><h4><strong>Email:</strong> {{ $prescription->user->email }}</h4></td>
                        </tr>
                        <tr>
                            <td style="width:100%;"><h4><strong>Teléfono:</strong> {{ $prescription->user->telefono }}</h4></td>
                        </tr>
                        @if(!empty($prescription->user->direccion))
                            <tr>
                                <td style="width:100%;"><h4><strong>Dirección:</strong> {{ $prescription->user->direccion }}</h4></td>
                            </tr>
                        @endif
                        @if(!empty($prescription->user->comuna))
                            <tr>
                                <td style="width:100%;"><h4><strong>Comuna:</strong> {{ $prescription->user->comuna }}</h4></td>
                            </tr>
                        @endif
                    </table>
                </td>
                <td valign="top" style="width:40%;">
                    <table border="0" cellspadding="0" cellspacing="0">
                        <tr>
                            <td><strong>RUT:</strong></td>
                            <td>{{ $prescription->user->rut }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong></td>
                            <td>{{ now()->setTimezone('CEST')->format('d/m/y h:i A') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <h4>Rp.</h4>
        <table border="0" cellspadding="0" cellspacing="0" id="detalle">
            @foreach($detail as $detalle)
                <tr>
                    <td valign="top"><strong>{{ $detalle->medication?->titulo }} {{ $detalle->medicationDosage?->tipo }}:</strong> {{ $detalle->dosis}}</td>
                </tr>
            @endforeach
        </table>

        <table border="0" cellspadding="0" cellspacing="0" id="detalle2">
            <tr>
                <td valign="top" colspan="2" style="font-size:12px;">
                    <strong>Comentarios Adicionales:</strong> {{ $prescription->anotaciones }}
                </td>
            </tr>
        </table>
    </div>

    <div id="footer-pre">
        <p style="text-align:center;"><img src="{{ public_path('assets/img/firma_doc.jpg') }}" width="180" style="margin-right:-40px;"></p>
        <p>Dr. Agustín Ignacio Morán Villena</p>
        <p>18.226.242-0</p>
        <p>Médico - Cirujano</p>
        <p>RCM: 46658</p>
    </div>

    <div id="footer">
        <ul>
            <li><a href="mailto:cotacto@futuromed.cl">cotacto@futuromed.cl</a> - <a href="tel: +56928118298">+56928118298</a> - <a href="+56928118298">+56928118298</a></li>
        </ul>
        <p>www.futuromed.cl</p>
    </div>

</body>
</html>
