<?php
	$materia = $_GET['mt'];
	$periodoActual = $_GET['prd'];
	//$materia = 'II011';
	//$periodoActual = 'LAR-II-2020';
	use Mpdf\Mpdf;
	require_once('../../vendor/autoload.php');
	require_once('../../model/template/templateProfPDF.php');
	$css = file_get_contents("../../style/css/stylePDF.css");
	$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
	include('connectDataBase.php');
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270]]);
	$nombre = "lista de profesores de";
	$sql = "SELECT * FROM materias WHERE codigo='$materia'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $materia)){
      $tempMatter = $row['codigo'];
      $tempMatterName = $row['materia'];
	} 
	if($materia == $tempMatter){
		$pdf = plantilla($tempMatter, $periodoActual);
		$nombre .= " ".$tempMatterName.".pdf";
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
