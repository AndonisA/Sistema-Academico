<?php
	$cedulaBM = $_POST['cedula'];
	if($cedulaBM){
		include('connectDataBase.php');
		$sql = "SELECT * FROM notasestudiantes WHERE cedula=$cedulaBM";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		$row=mysqli_fetch_array($result);
		if ($row['cedula'] == $cedulaBM){
			$cedula = $row['cedula'];
			$nombre = $row['apellido']." ".$row['nombre'];
			$email = $row['correo'];
			$mensaje = 'Los datos se han obtenido correctamente.';
			$color = "bg-success";
			$data = [
			'cedula' => $cedula,
			'nombre' => $nombre,
			'email' => $email,
			'error' => $mensaje,
			'color' => $color	
			];
		} else {
			$mensaje = 'El estudiante no esta registrado en el sistema.';
			$color = "bg-danger";
			$data = [
				'error' => $mensaje, 
				'color' => $color
			];
		}
	} else{
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
		$data = [
			'error' => $mensaje, 
			'color' => $color
		];
	}
	header('Content-Type: application/json');
	echo json_encode($data, JSON_FORCE_OBJECT);
?>