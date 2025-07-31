<?php
	$cedula = intval($_POST['cedulaM']);
	$nombre = $_POST['nombreM'];
	$profesion = $_POST['profesionM'];
	$telefono = $_POST['telefonoM'];
	$correo = $_POST['correoM'];

	if($cedula && $nombre && $profesion && $telefono && $correo){
		include('connectDataBase.php');
		$sql = "SELECT * FROM profesores WHERE cedula=$cedula";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($cedula == $row['cedula'])){
			$sql = "UPDATE profesores SET cedula=$cedula, nombres='$nombre', profesion='$profesion', correo='$correo', telefono='$telefono' WHERE cedula=$cedula";
			$result = $connect->query($sql);
			$mensaje = 'Se ha modificado correctamente.';
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