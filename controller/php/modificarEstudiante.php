<?php
	$cedula = intval($_POST['cedulaM']);
	$cedulaO = intval($_POST['cedulaMO']);
	$nombre = $_POST['nombreM'];
	$telefono = intval($_POST['telefonoM']);
	$email = $_POST['emailM'];
	$tipoM = $_POST['tipoM'];
	if(!empty($_POST['carreraM'])){
		$carrera = intval($_POST['carreraM']);
	}else{
		$carrera = null;
	}
	$perIngreso = $_POST['perIngresoM'];
	
	include('connectDataBase.php');
	if($cedula && $nombre && $telefono && $email && $carrera && $perIngreso && $tipoM){	
		$sql = "SELECT * FROM estudiantes WHERE cedula=$cedulaO";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($cedulaO == $row['cedula'])){
			$sql = "UPDATE estudiantes SET cedula=$cedula, nombres='$nombre', telefono=$telefono, email='$email', carrera=$carrera, periodoIngreso='$perIngreso', procedenciaPago=$tipoM WHERE cedula=$cedulaO";
			$result = $connect->query($sql);
			$mensaje = 'El estudiante fue modificado correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'El estudiante no esta creado.';
			$color = "bg-danger";
		}
	} else {
		$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
