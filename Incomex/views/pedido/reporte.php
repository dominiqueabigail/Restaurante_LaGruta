
<?php
$cliente = $_SESSION['identity']->nombre . '' . $_SESSION['identity']->apellidos ;
$remitente = "INCOMEX";
$web = "https://incomex.com";
$mensajePie = "Gracias por su compra";
$numero = 1;
$descuento = 0;
$porcentajeImpuestos = 14;
$fecha = date("Y-m-d");
$subtotal=0;
$subtotalConDescuento=0;
$impuestos=0;
$total=0;


    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $html="";
 

    if (isset($pedido)) {
        $html .= "<div id='reporte' class='container-fluid'>
    <div class='row'>
        <div class='col-xs-10 '>
            <h1>Factura</h1>
        </div>
        <div class='col-xs-2'>
            <img class='img img-responsive ' src='https://i.pinimg.com/564x/d0/cb/dd/d0cbdd64072b39bee998da3f214c52cf.jpg' alt='Logotipo'>
        </div>
    </div>
    <hr>
    <div class='row'>
        <div class='col-xs-10'>
            <h1 class='h6'>".$remitente."</h1>
            <h1 class='h6'>". $web ."</h1>
        </div>
        <div class='col-xs-2 text-center'>
            <strong>Fecha</strong>
            <br>".
            $fecha."
            <br>
            <strong>Factura No.</strong>
            <br>".
             $pedido->id ."
        </div>
    </div>
    <hr>
    <div class='row text-center' style='margin-bottom: 2rem;'>
        <div class='col-xs-6'>
            <h1 class='h2'>Cliente</h1>
            <strong>".$cliente ."</strong>
        </div>
        <div class='col-xs-6'>
            <h1 class='h2'>Remitente</h1>
            <strong>". $remitente ."</strong>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-12'>
            <table class='table table-condensed table-bordered table-striped'>
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th> 
                </tr>
                </thead>
                <tbody>";
        
                
                while ($producto = $productos->fetch_object()) {
                    $html .= "<tr>
                    
                        <td>
                            <a href='". base_url ."producto/ver&id=". $producto->id ."'>". $producto->nombre ."</a>
                        </td>
                        <td>". $producto->precio ."</td>
                        <td>". $producto->unidades ."</td>
                    </tr>";
                }

                $total = $pedido->coste;
                
                 $html .="</tbody>
                <tfoot>
                <tr>
                    <td colspan='3' class='text-right'>Subtotal</td>
                    <td>$". number_format($subtotal, 2) ."</td>
                </tr>
                <tr>
                    <td colspan='3' class='text-right'>Descuento</td>
                    <td>$".number_format($descuento, 2) ."</td>
                </tr>
                <tr>
                    <td colspan='3' class='text-right'>Subtotal con descuento</td>
                    <td>$".number_format($subtotalConDescuento, 2)."</td>
                </tr>
                <tr>
                    <td colspan='3' class='text-right'>Impuestos</td>
                    <td>$". number_format($impuestos, 2) ."</td>
                </tr>
                <tr>
                    <td colspan='3' class='text-right'>
                        <h4>Total</h4></td>
                    <td>
                        <h4>$". number_format($total, 2) ."</h4>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-12 text-center'>
            <p class='h5'>".$mensajePie ."</p>
        </div>
    </div>
</div>
";
    
    }
    echo $html;
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $contenido = $dompdf->output();
    $nombreDelDocumento = "Factura2.pdf";
    $bytes = file_put_contents($nombreDelDocumento, $contenido);


    /*
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $options->setIsHtml5ParserEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->loadHTML($html);
    
    $dompdf->setPaper('letter');
    //dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    ob_end_clean();
    //Attachment false es para que no se descargue, true es para descargar automaticamente
    $dompdf->stream("archivo_.pdf", array("Attachment" => false));
    */
?>
