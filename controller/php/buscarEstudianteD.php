<?php
	$cedulaBD = $_POST['buscarCedulaD'];
	include('connectDataBase.php');
	$sql = "SELECT * FROM estudiantes WHERE cedula=$cedulaBD";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
		/* if($row['cedula'] == $cedulaBM) */
		$cedula = $row['cedula'];
		$nombre = $row['nombres'];
		$telefono = $row['telefono'];
		$email = $row['email'];
		$procedencia = $row['procedencia'];
		$carrera = $row['carrera'];
		$perIngreso = $row['periodoIngreso'];
	}
	header('Content-Type: application/json');
	$data = [
	'cedula' => $cedula,
	'nombre' => $nombre,
	'telefono' => $telefono,
	'email' => $email,
	'procedencia' => $procedencia,
	'carrera' => $carrera,
	'perIngreso' => $perIngreso	
	];
	echo json_encode($data, JSON_FORCE_OBJECT);
?>