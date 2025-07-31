<?php
	$cedula = intval($_POST['cedulaD']);
	include('connectDataBase.php');
	if ($cedula){
		$sql = "SELECT * FROM estudiantes WHERE cedula=$cedula";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedula)){
			$sql = "DELETE FROM estudiantes WHERE cedula=$cedula";
			$result = $connect->query($sql);
			$sql = "DELETE FROM notasestudiante WHERE cedulaEstudiante=$cedula";
			$result = $connect->query($sql);
			$sql = "DELETE FROM alumnoinscrito WHERE cedula=$cedula";
			$result = $connect->query($sql);
			$mensaje = 'El estudiante fue eliminado correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'Error a realizar la operación';
			$color = "bg-danger";
		}
	} else {
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
