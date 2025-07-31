<?php
error_reporting(E_ALL ^ E_NOTICE);
$cedula = intval($_POST['cedulaC']);
$nombre = $_POST['nombreC'];
$telefono = intval($_POST['telefonoC']);
$email = $_POST['emailC'];
$tipo = $_POST['tipoC'];
if (!empty($_POST['carreraC'])) {
	$carrera = intval($_POST['carreraC']);
} else {
	$carrera = null;
}
$perIngreso = $_POST['perIngreso'];

if ($cedula && $nombre && $telefono && $email && $carrera && $perIngreso && $tipo) {
	include('connectDataBase.php');
	$sql = "SELECT * FROM estudiantes WHERE cedula=$cedula";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$row = mysqli_fetch_array($result);
	if ($cedula != $row['cedula']) {
		$sql = "INSERT INTO estudiantes (cedula, nombres, telefono, email, carrera, periodoIngreso, procedenciaPago) VALUES ($cedula, '$nombre', $telefono, '$email', $carrera, '$perIngreso', $tipo)";
		$result = $connect->query($sql);
		$mensaje = 'Se ha creado correctamente.';
		$color = "bg-success";
	} else {
		$mensaje = 'El estudiante ya esta creado.';
		$color = "bg-danger";
	}
} else {
	$mensaje = 'El verifique si todos los campos están llenos.';
	$color = "bg-danger";
}
header('Content-Type: application/json');
$data = ['error' => $mensaje, 'color' => $color];
echo json_encode($data, JSON_FORCE_OBJECT);
