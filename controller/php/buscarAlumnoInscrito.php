<?php
//error_reporting(E_ALL);
$cedulaBD = $_POST['cedula'];
$cdl = '';
//$cedulaBD = 5;
if ($cedulaBD) {
	include('connectDataBase.php');
	$sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedulaBD";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$periodo = array();
	if ($result) {
		//$row = mysqli_fetch_array($result);
		while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
			  array_push($periodo, $row);
			  $cdl = $row['cedula'];
		}
		if ($cdl == $cedulaBD) {
			$mensaje = 'Periodo del estudiante encontrado.';
			$color = "bg-success";
			echo json_encode($periodo, JSON_UNESCAPED_UNICODE);
		} else {
			$mensaje = 'El estudiante no esta inscrito.';
			$color = "bg-danger";

			$data = ['error' => $mensaje, 'color' => $color];
			echo json_encode($data, JSON_FORCE_OBJECT);
		}
	} else {
		$mensaje = 'Error a realizar la búsqueda.';
		$color = "bg-danger";

		$data = ['error' => $mensaje, 'color' => $color];
		echo json_encode($data, JSON_FORCE_OBJECT);
	}
} else {
	$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
	$color = "bg-danger";

	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
}
