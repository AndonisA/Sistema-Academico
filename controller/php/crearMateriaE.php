<?php
error_reporting(0);
if(!empty($_POST['carreraC'])){
	$career = intval($_POST['carreraC']);
}else{
	$career = null;
}
$code = $_POST['codigoC'];
$matter = $_POST['nombreC'];
$UC = intval($_POST['ucC']);
$period = $_POST['periodoC'];
if ($code && $matter && $period && $career) {
	include('connectDataBase.php');
	$sql = "SELECT * FROM materias WHERE codigo='$code'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$row=mysqli_fetch_array($result);
	if ($code != $row['codigo']) {
		$sql = "INSERT INTO materias (codigo, materia, UC, periodo, carrera) VALUES ('$code', '$matter', $UC, '$period', $career)";
		$result = $connect->query($sql);
		$mensaje = 'Se ha creado correctamente.';
		$color = "bg-success";
	} else {
		$mensaje = 'La materia ya esta creada.';
		$color = "bg-danger";
	}
} else {
	$mensaje = 'El verifique si todos los campos están llenos.';
	$color = "bg-danger";
}
header('Content-Type: application/json');
$data = ['error' => $mensaje, 'color' => $color];
echo json_encode($data, JSON_FORCE_OBJECT);
