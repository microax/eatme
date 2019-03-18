<?php
require_once "../include/etc/session.php";
//require_once "../include/etc/dompdf/src/Dompdf.php";
use Dompdf\Dompdf;

siteSession();

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>