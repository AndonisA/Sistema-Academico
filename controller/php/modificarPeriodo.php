<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$periodo = $_POST['periodo'];
	$ct1 = $_POST['ct1'];
	$ct2 = $_POST['ct2'];
	$ct3 = $_POST['ct3'];
	$ct4 = $_POST['ct4'];
	$UCD = $_POST['UCD'];
	$UCB = $_POST['UCB'];
	$UCBC = $_POST['UCBC'];
	$IC = $_POST['IUC'];
	$tempPeriodo = $_POST['tempPeriodo'];
	if ($periodo && $ct1 && $ct2 && $ct3){
		include('connectDataBase.php');
		$sql = "SELECT * FROM periodo WHERE idPeriodo='$tempPeriodo'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		$row=mysqli_fetch_array($result);
		if(($tempPeriodo == $row['idPeriodo']) && $tempPeriodo != ""){
			$sql = "UPDATE periodo SET idPeriodo='$periodo', cuota1='$ct1', cuota2='$ct2', cuota3='$ct3', cuota4='$ct4', UCB=$UCB, IC=$IC WHERE idPeriodo='$tempPeriodo'";
			$result = $connect->query($sql);
			$mensaje = 'Se ha modificado correctamente.';
			$color = "bg-success";
		} else {
			$sql = "INSERT INTO periodo (idPeriodo, cuota1, cuota2, cuota3, cuota4, UCB, IC) VALUES ('$periodo', '$ct1', '$ct2', '$ct3', '$ct4', $UCB, $IC)";
			$result = $connect->query($sql);
			$mensaje = 'Se ha creado correctamente.';
			$color = "bg-success";
		}
	} else{
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
	}
	$data = [
		'error' => $mensaje, 
		'color' => $color
	];
	include('connectDataBase.php');
	echo json_encode($data, JSON_FORCE_OBJECT);
