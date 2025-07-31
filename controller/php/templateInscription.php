<?php
	$cedulaBD = intval($_GET['cd']);
	$periodo = $_GET['prd'];
	$pdfName = "";
	use Mpdf\Mpdf;
	require_once('../../vendor/autoload.php');
	require_once('../../model/template/templateInsPDF.php');
	$css = file_get_contents("../../style/css/stylePDF.css");
	$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
	include('connectDataBase.php');
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270]]);
	$pdfName = "PLANILLA DE";
	$sql = "SELECT * FROM estudiantes WHERE cedula=$cedulaBD";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
	  $cdl = $row['cedula'];
      $nombre = $row['nombres'];
	  
	} 
	if($cdl == $cedulaBD){
		$pdf = plantilla($cedulaBD, $periodo);
		$pdfName .= " ".strtoupper($nombre)." ".$periodo.".pdf";
		$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($pdf, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->SetDisplayMode("fullpage");
		//echo $pdf;
		$mpdf->Output($pdfName, "I");
		exit;
	}else{
		header('Content-Type: application/json');
		if($cdl == null) $data = "Ingrese una cedula valida";
		if($prdA == null) $data = "Seleccione un periodo académico";
		echo json_encode($data, JSON_FORCE_OBJECT);
	}

?>