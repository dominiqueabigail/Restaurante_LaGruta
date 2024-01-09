<?php

$html = file_get_contents('reporte.html');

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');

echo $html;

?>