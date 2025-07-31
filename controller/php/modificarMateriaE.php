<?php
	$career = intval($_POST['carreraM']);
	$code = $_POST['codigoM'];
	$codeO = $_POST['codigoMO'];
	$matter = $_POST['nombreM'];
	$UC = intval($_POST['ucM']);
	$period = $_POST['periodoM'];
	if ($career && $code && $matter && $period){
		include('connectDataBase.php');
		$sql = "SELECT * FROM materias WHERE codigo='$codeO'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($codeO == $row['codigo'])){
			$sql = "UPDATE materias SET codigo='$code', materia='$matter', UC=$UC, periodo='$period', carrera=$career WHERE codigo='$codeO'";
			$result = $connect->query($sql);
			$mensaje = 'Se ha modificado correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'La materia no esta creada.';
			$color = "bg-danger";
		}
	} else{
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json; charset=utf-8');
	$data = [
		'error' => $mensaje, 
		'color' => $color
	];
	echo json_encode($data, JSON_FORCE_OBJECT);
?>