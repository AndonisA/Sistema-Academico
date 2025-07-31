<?php
error_reporting(E_ALL);
$cedula = intval($_POST['cedulaID']);
if (!empty($_POST['carreraID'])) {
	$carrera = intval($_POST['carreraID']);
} else {
	$carrera = null;
}
$periodo = $_POST['periodoPD'];
$materia1 = $_POST['m1IID'];
$seccion1 = intval($_POST['ms1']);
$materia2 = $_POST['m2IID'];
$seccion2 = intval($_POST['ms2']);
$materia3 = $_POST['m3IID'];
$seccion3 = intval($_POST['ms3']);
$materia4 = $_POST['m4IID'];
$seccion4 = intval($_POST['ms4']);
$materia5 = $_POST['m5IID'];
$seccion5 = intval($_POST['ms5']);
$materia6 = $_POST['m6IID'];
$seccion6 = intval($_POST['ms6']);
$materia7 = $_POST['m7IID'];
$seccion7 = intval($_POST['ms7']);
$materia8 = $_POST['m8IID'];
$seccion8 = intval($_POST['ms8']);
if ($cedula && $periodo && $carrera) {
	include("connectDataBase.php");
	$sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedula AND periodo='$periodo'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	if (($row = mysqli_fetch_array($result)) && ($row['cedula'] == $cedula)) {
		$sql = "UPDATE alumnoinscrito SET materia1='$materia1', seccion1=$seccion1, materia2='$materia2', seccion2=$seccion2, materia3='$materia3', seccion3=$seccion3, materia4='$materia4', seccion4=$seccion4, materia5='$materia5', seccion5=$seccion5, materia6='$materia6', seccion6=$seccion6, materia7='$materia7', seccion7=$seccion7, materia8='$materia8', seccion8=$seccion8 WHERE cedula=$cedula AND periodo='$periodo'";
		$result = $connect->query($sql);
		$mensaje = 'La planilla del estudiante a sido modificado correctamente.';
		$color = "bg-success";
	} else {
		$mensaje = 'El estudiante no esta ingresado en el sistema.';
		$color = "bg-danger";
	}
} else {
	$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
	$color = "bg-danger";
}
header('Content-Type: application/json');
$data = ['error' => $mensaje, 'color' => $color];
echo json_encode($data, JSON_FORCE_OBJECT);
