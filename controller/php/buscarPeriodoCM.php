<?php
error_reporting(E_ALL ^ E_NOTICE);
$periodo = $_POST['periodo'];
include('connectDataBase.php');
if($periodo){
	$sql = "SELECT * FROM periodo WHERE idPeriodo='$periodo'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$row = mysqli_fetch_array($result);
	if (isset($result) && ($row['idPeriodo'] == $periodo)){
		$tempPeriodo = $row['idPeriodo'];
		$ct1 = $row['cuota1'];
		$ct2 = $row['cuota2'];
		$ct3 = $row['cuota3'];
		$ct4 = $row['cuota4'];
		$UCB = $row['UCB'];
		$inicial = $row['IC'];
		$mensaje = 'Los datos fueron obtenidos exitosamente.';
		$color = 'bg-success';
		$data = ['periodo' => $tempPeriodo, 'ct1' => $ct1, 'ct2' => $ct2,'ct3' => $ct3, 'ct4' => $ct4,'ucb' => $UCB, 'inicial' => $inicial,'error' => $mensaje, 'color' => $color];
	} else {
		$mensaje = 'Periodo académico no encontrado puede registrarlo.';
		$color = "bg-success";
		$data = ['periodo' => "", 'error' => $mensaje, 'color' => $color];
	}
} else {
	$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
	$color = "bg-danger";
	$data = ['error' => $mensaje, 'color' => $color];
}
echo json_encode($data, JSON_FORCE_OBJECT);
