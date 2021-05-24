<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recibo</title>
    <meta charset="utf-8">
    <style>
        body{
            font: 0.3em Times, sans-serif;
            padding-left: 2.5cm;
            margin-left: -2.5cm;
            background-image:url('{{ asset('img/naguila.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }
        #datos{
            font-size: 8pt;
        }
        #factura{
            font-size: 6pt;
        }
        #nota{
            padding-top: 12px;
            font-size: 5pt;
        }
        #aviso{
            font-size: 6.5pt;
            font-style: italic;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ asset('img/educacion.jpg') }}" height="75px" width="210px"></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td><img src="{{ asset('img/tecnm.jpg') }}" height="75px" width="100px"></td>
        </tr>
    </table>
    <h2>Tecnológico Nacional de México</h2>
    <h3>Instituto Tecnológico de Ensenada</h3>
    <h4>Ficha de depósito</h4>
    <table id="datos">
        <thead>
            <tr>
                <th colspan="2">Formato para ser pagado en Banamex</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ficha:</td>
                <td>{{ $ficha }}</td>
	    </tr>
	    <tr>
	       <td>Sucursal:</td>
	       <td>{{ $sucursal }}</td>
	    </tr>
	    <tr>
		<td>Cuenta:</td>
		<td>{{ $cuenta }}</td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td>{{ $appat }} {{ $apmat }} {{ $nombre }}</td>
            </tr>
            <tr>
                <td>Carrera: </td>
                <td>{{ $carrera }}</td>
            </tr>
            <tr>
                <td>Concepto: </td>
                <td>{{ $concepto }}</td>
            </tr>
            <tr>
                <td>Costo: </td>
                <td>{{ $costo }}</td>
            </tr>
            <tr>
                <td>Referencia</td>
                <td>{{ $linea }}</td>
            </tr>
            <tr>
                <td>Fecha límite de pago: </td>
                <td>{{ $flimite }}</td>
            </tr>
            <tr>
                <td>Clabe interbancaria: </td>
                <td>{{ $clabe }}</td>
            </tr>
        </tbody>
    </table>
    
    <div id="factura">
            <h4>En caso de requerir factura</h4>
            <p>Aspirante que requiera factura debe enviar un correo a facturacion@ite.edu.mx el mismo
                día que realizó el pago, con los siguientes datos: 
                <ul>
                    <li>Nombre del Aspirante.</li>
                    <li>Número de Ficha.</li>
                    <li>Fecha en que realizó el pago.</li>
                    <li>Nombre o Razón social.</li>
                    <li>RFC.</li>
                    <li>Domicilio Fiscal (Calle, Número, Colonia, CP, Ciudad y Estado).</li>
                    <li>Teléfono de Contacto.</li>
                    <li>Uso del CFDI.</li>
                    <li>Forma de pago.</li>
                </ul>
            </p>
    </div>
    <div id="aviso">
        <b> Es responsabilidad del aspirante el llenado y veracidad de la información; ya que, 
            en caso de detectarse documentación apócrifa y/o alterada, el Instituto Tecnológico
            de Ensenada podrá proceder conforme a las leyes vigentes y aplicables
        </b>
    </div>
    <p><strong>Una vez hecho el depósito, no hay devoluciones</strong></p>
    <div id="nota">
        Blvd Tecnológico #150 Col. Ex Ejido Chapultepec, C.P. 22785, Ensenada Baja California, México
        RFC: TNM140723GFA Tels: (646)177-5680 y 82
    </div>
</body>
</html>
