<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$codeS = $_POST['codigo'];
	if($codeS){
		include('connectDataBase.php');
		$sql = "SELECT * FROM materias WHERE codigo='$codeS'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		$row=mysqli_fetch_array($result);
		if ($row['codigo'] == $codeS){
			$code = $row['codigo'];
			$matter = $row['materia'];
			$UC = $row['UC'];
			$period = $row['periodo'];
			$career = $row['carrera'];
			$mensaje = 'Datos se han obtenido correctamente.';
			$color = "bg-success";
			$data = [
				'codigo' => $code,
				'materia' => $matter,
				'uc' => $UC,
				'periodo' => $period,
				'carrera' => $career,
				'error' => $mensaje, 
				'color' => $color
			];
		} else {
			$mensaje = 'La materia no esta creada.';
			$color = "bg-danger";
			$data = [
				'error' => $mensaje, 
				'color' => $color
			];
		}
	} else {
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
		$data = [
			'error' => $mensaje, 
			'color' => $color
		];
	}
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data, JSON_FORCE_OBJECT);
