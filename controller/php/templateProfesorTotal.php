<!-- Sistema desarrollado por el ingeniero ANDONIS HARIN AYALA AVILA-->
<?php
	$periodoActual = $_GET['prd'];
	//$periodoActual = 'LAR-II-2020';
	use Mpdf\Mpdf;
	require_once('../../vendor/autoload.php');
	require_once('../../model/template/templateProfTotalPDF.php');
	$css = file_get_contents("../../style/css/stylePDF.css");
	$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
	include('connectDataBase.php');
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270]]);
	$nombre = "lista de pago de profesores periodo ".$periodoActual.".pdf";
	$sql = "SELECT * FROM profmater WHERE periodo='$periodoActual'";
    $result = $connect->query($sql);
	$row = $result->num_rows;
	$tempPeriodo = "";
    while(($row=mysqli_fetch_array($result)) && ($row['periodo'] == $periodoActual)){
      $tempPeriodo = $row['periodo'];
	} 
	if($periodoActual == $tempPeriodo){
		$pdf = plantilla($tempPeriodo);
		$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($pdf, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->SetDisplayMode("fullpage");
		//echo $pdf;
		$mpdf->Output($nombre, "I");
		exit; 
	}else{
		header('Content-Type: application/json');
		if($cdl == null) $data = "Ingrese una cedula valida";
		if($prdA == null) $data = "Seleccione un periodo académico";
		echo json_encode($data, JSON_FORCE_OBJECT);
	}
