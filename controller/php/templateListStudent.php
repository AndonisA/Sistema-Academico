<?php
$periodo = $_GET['prd'];
//$periodo = "";
if($periodo == "") $periodo = null;
use Mpdf\Mpdf;
date_default_timezone_set('America/Caracas');
$date = date('d/m/Y', time());
$time = date('h:i:s a', time());
/* 
function ve_date($d){
date_default_timezone_set("America/Caracas");
$t = time()-(1800);
return date($d,$t);
}
echo ve_date('h:i A, d-m-Y'); 
*/
require_once('../../vendor/autoload.php');
require_once('../../model/template/templateListStudentPDF.php');
$css = file_get_contents("../../style/css/stylePDF.css");
$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
include('connectDataBase.php');
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270]]);
$nombre = "Lista de estudiante [$date] [$time].pdf";
$pdf = plantilla($periodo);
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($pdf, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->SetDisplayMode("fullpage");
//echo $pdf;
$mpdf->Output($nombre, "I");
exit; 
