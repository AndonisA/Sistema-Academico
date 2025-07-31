<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$cedula = $_POST['cedulaI'];
	if (!empty($_POST['carreraC'])) {
		$carrera = intval($_POST['carreraC']);
	} else {
		$carrera = null;
	}
	$materia1 = $_POST['m1I'];
	$borrarMateria = $_POST['dM'];
	$periodo = $_POST['periodoM'];
	if(isset($cedula) && isset($carrera) && isset($materia1)){
		$cedula = intval($_POST['cedulaI']);
		$carrera = intval($_POST['carreraC']);
		include("connectDataBase.php");
		$sql = "SELECT * FROM profesores WHERE cedula=$cedula";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		$row=mysqli_fetch_array($result);
		if($cedula == $row['cedula']){
			if($borrarMateria == 1){
				$sql = "SELECT * FROM profmater WHERE cedulaProfesor=$cedula AND materia='$materia1' AND periodo='$periodo'";
				$result = $connect->query($sql);
				$row = $result->fetch_row();
				if(($cedula == $row[0]) && ($materia1 == $row[2])){
					$sql = "DELETE FROM profmater WHERE cedulaProfesor=$cedula AND materia='$materia1'";
					$result = $connect->query($sql);
					$mensaje = "La materia fue retirada del profesor.";
					$color = "bg-success";
				} else {
					$mensaje = "La materia no esta registrada al profesor.";
					$color = "bg-danger";
				}
			} else {
				$sql = "INSERT INTO profmater (cedulaProfesor, carrera, materia, periodo) VALUES ($cedula, '$carrera', '$materia1', '$periodo')";
				$mensaje = "El registro de las materias se ha realizado correctamente. creado";
				$color = "bg-success";
				$result = $connect->query($sql);
			}
		}else{
			$mensaje = "Profesor no esta registrado en el sistema.";
			$color = "bg-danger";
		}
	}else{
		$mensaje = "Verifique que todos los campos están completos.";
		$color = "bg-danger";
	}
	
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
