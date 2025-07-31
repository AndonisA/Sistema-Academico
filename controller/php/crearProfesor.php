<?php
error_reporting(E_ALL ^ E_NOTICE);
	$cedula = intval($_POST['cedulaC']);
	$nombre = $_POST['nombreC'];
	$profesion = $_POST['profesionC'];
	$telefono = $_POST['telefonoC'];
	$correo = $_POST['correoC'];

	if($cedula && $nombre && $profesion && $telefono && $correo){
		include('connectDataBase.php');
		$sql = "SELECT * FROM profesores WHERE cedula = $cedula";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if($cedula != $row['cedula']){
			$sql = "INSERT INTO profesores (cedula, nombres, profesion, correo, telefono) VALUES ($cedula, '$nombre', '$profesion', '$correo','$telefono')";
			$result = $connect->query($sql);
			$mensaje = 'Se ha registrado correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'Ya este profesor esta registrado.';
			$color = "bg-danger";
		}
	} else {
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
?>