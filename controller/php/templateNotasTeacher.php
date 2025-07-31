<?php
	$materia = $_GET['cd'];
	$periodoActual = $_GET['prd'];
	//$materia = 'IC105';
	//$periodoActual = 'LAR-II-2020';
	use Mpdf\Mpdf;
	require_once('../../vendor/autoload.php');
	require_once('../../model/template/templateNotaTeacherPDF.php');
	$css = file_get_contents("../../style/css/stylePDF.css");
	$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
	include('connectDataBase.php');
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270], 'orientation' => 'L']);
	$nombre = "planilla de ";
	$sql = "SELECT * FROM notasestudiante WHERE materia='$materia' AND periodo='$periodoActual'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['materia'] == $materia)){
      $tempMatter = $row['materia'];
      $tempPeriod = $row['periodo'];
} 
	if(($materia == $tempMatter) && ($periodoActual == $tempPeriod)){
		$pdf = plantilla($tempMatter, $tempPeriod);
		$nombre .= $tempMatter." ".$periodoActual.".pdf";
		$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($pdf, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->SetDisplayMode("fullpage");
		//echo $pdf;
		$mpdf->Output($nombre, "I");
		exit; 
	}else{
		header('Content-Type: application/json');
		if($materia == null) $data = "Ingrese una cedula valida";
		if($periodoActual == null) $data = "Seleccione un periodo académico";
		echo json_encode($data, JSON_FORCE_OBJECT);
	}
