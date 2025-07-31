<?php
	$cedulaBM = intval($_POST['cedula']);
	if($cedulaBM){
		include('connectDataBase.php');
		$sql = "SELECT * FROM profesores WHERE cedula=$cedulaBM";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if($result){
			while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBM)){
				$cedula = $row['cedula'];
				$nombre = $row['nombres'];
				$profesion = $row['profesion'];
				$telefono = $row['telefono'];
				$correo = $row['correo'];
			} 
			$mensaje = 'Los datos fueron obtenidos exitosamente.';
			$color = 'bg-success';
			header('Content-Type: application/json');
			$data = [
			'cedula' => $cedula,
			'nombre' => $nombre,
			'telefono' => $telefono,
			'correo' => $correo,
			'profesion' => $profesion, 
			'error' => $mensaje,
			'color' => $color
			];
			echo json_encode($data, JSON_FORCE_OBJECT);
		} else{
			$mensaje = 'Error al realizar la consulta.';
			$color = 'bg-danger';
			$data = ['error' => $mensaje, 'color' => $color];
			echo json_encode($data, JSON_FORCE_OBJECT);
		}
	} else {
		$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
		$color = "bg-danger";
		$data = ['error' => $mensaje, 'color' => $color];
		echo json_encode($data, JSON_FORCE_OBJECT);
	}
?>