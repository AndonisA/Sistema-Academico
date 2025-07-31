<?php
	$code = $_POST['codigoD'];
	include('connectDataBase.php');
	$sql = "SELECT * FROM materias WHERE codigo='$code'";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	if(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $code)){
		$sql = "DELETE FROM materias WHERE codigo='$code'";
		$result = $connect->query($sql);
		$mensaje = 'Se ha eliminado correctamente.';
		$color = "bg-success";
	} else {
		$mensaje = 'Verifique que todos los campos están completos.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
?>