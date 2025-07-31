<?php
error_reporting(0);
include("connectDataBase.php");
$cedula = intval($_POST['cedula']);
if (!empty($_POST['carrera'])) {
	$carrera = intval($_POST['carrera']);
} else {
	$carrera = null;
}
$periodo = $_POST['periodo'];
$materia1 = $_POST['m1I'];
$seccion1 = $_POST['s1'];
$materia2 = $_POST['m2I'];
$seccion2 = $_POST['s2'];
$materia3 = $_POST['m3I'];
$seccion3 = $_POST['s3'];
$materia4 = $_POST['m4I'];
$seccion4 = $_POST['s4'];
$materia5 = $_POST['m5I'];
$seccion5 = $_POST['s5'];
$materia6 = $_POST['m6I'];
$seccion6 = $_POST['s6'];
$materia7 = $_POST['m7I'];
$seccion7 = $_POST['s7'];
$materia8 = $_POST['m8I'];
$seccion8 = $_POST['s8'];

if ($cedula && $periodo && $carrera && $materia1) {
	$sql = "SELECT * FROM estudiantes WHERE cedula=$cedula AND periodo='".$periodo."'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	if(!($cedula == $row['cedula'] && $periodo == $row['periodo'])){
		$sql = "SELECT * FROM estudiantes WHERE cedula=$cedula";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if (($row = mysqli_fetch_array($result)) && ($row['cedula'] == $cedula)) {
			$sql = "INSERT INTO alumnoinscrito (cedula, carrera, periodo, materia1, seccion1, materia2, seccion2, materia3, seccion3, materia4, seccion4, materia5, seccion5, materia6, seccion6, materia7, seccion7, materia8, seccion8) VALUES ($cedula, $carrera, '$periodo', '$materia1', '$seccion1', '$materia2', '$seccion2', '$materia3', '$seccion3', '$materia4', '$seccion4', '$materia5', '$seccion5', '$materia6', '$seccion6', '$materia7', '$seccion7', '$materia8', '$seccion8')";
			$result = $connect->query($sql);
			$mensaje = 'El estudiante a sido inscrito correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'El estudiante no esta creado en el sistema.';
			$color = "bg-danger";
		}
	} else {
		$mensaje = 'El estudiante ya inscrito en el periodo ' . $periodo . '.';
		$color = "bg-danger";
	}
	
} else {
	$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
	$color = "bg-danger";
}
header('Content-Type: application/json');
$data = ['error' => $mensaje, 'color' => $color];
echo json_encode($data, JSON_FORCE_OBJECT);
