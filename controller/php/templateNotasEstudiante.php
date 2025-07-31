<?php
	//$correo = "osmanivanleal2010@hotmail.com";
	date_default_timezone_set('America/Caracas');
    $date = date('d-m-Y', time());
    $time = date('h:i:s a', time());
    /* function ve_date($d){
      date_default_timezone_set("America/Caracas");
      $t = time()-(1800);
      return date($d,$t);
      }
      echo ve_date('h:i A, d-m-Y'); */
	$cedula= $_GET['cedula'];
	$periodo= $_GET['periodo'];
	$num = 1;
	use Mpdf\Mpdf;
	require_once('../../vendor/autoload.php');
	require_once('../../model/template/templateNotaEstudiantePDF.php');
	$css = file_get_contents("../../style/css/stylePDF.css");
	$stylesheet = file_get_contents("../../style/css/styleReceipt .css");
	include('connectDataBase.php');
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 270]]);
	$sql = "SELECT * FROM notasestudiantes where cedula=".$cedula;
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result))){
		$testCorreo = $row['correo'];
	}  
	$sql = "SELECT * FROM notas where correo='$testCorreo'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	while(($row=mysqli_fetch_array($result))  && $num == 1){
		if($row['correo']== $testCorreo){
			$sqlE = "SELECT * FROM notasestudiantes WHERE correo='$testCorreo'";
			$resultE = $connect->query($sql);
			$rowE = $resultE->num_rows;
			while(($rowE=mysqli_fetch_array($resultE)) && $num == 1 ){
				$tempID = $rowE['cedula'];
				$tempName = $rowE['apellido']." ".$rowE['nombre'];
				$tempEmail = $rowE['correo'];
				$pdf = plantilla($testCorreo, $periodo);
				$nombre = "[".$tempEmail."]-[".$tempName."]-[".$periodo."].pdf";
				$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->WriteHTML($pdf, \Mpdf\HTMLParserMode::HTML_BODY);
				$mpdf->SetDisplayMode("fullpage");
				//echo $pdf;
				$mpdf->Output($nombre, "I");
				$num = 2;
				break;
			}
		}
	} 
	
	
