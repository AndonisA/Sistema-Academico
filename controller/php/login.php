<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
	include('connectDataBase.php');
	$user = $_POST['usuario'];
	$password = $_POST['contra'];
	if($user && $password){
		$sql = "SELECT * FROM usuario WHERE user='$user'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($user == $row['user'])){
			if($user == $row['user']){
				if($password == $row['passw']){
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $user;
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (5*60);
					$mensaje = "Inicio de sesión exitosa";
					$color = "bg-success";
					header('Content-Type: application/json');
					$data = ['error' => $mensaje, 'color' => $color];
					echo json_encode($data, JSON_FORCE_OBJECT);
				} else {
					$mensaje = "Error la contraseña no coincide";
					$color = "bg-danger";
					header('Content-Type: application/json');
					$data = ['error' => $mensaje, 'color' => $color];
					echo json_encode($data, JSON_FORCE_OBJECT);
				}
			} else {
				$mensaje = "Error el usuario no coincide";
				$color = "bg-danger";
				header('Content-Type: application/json');
				$data = ['error' => $mensaje, 'color' => $color];
				echo json_encode($data, JSON_FORCE_OBJECT);
			}
		} else {
			$mensaje = "Error al realizar la consulta";
			$color = "bg-danger";
			header('Content-Type: application/json');
			$data = ['error' => $mensaje, 'color' => $color];
			echo json_encode($data, JSON_FORCE_OBJECT);
		}
	} else {
		$mensaje = 'Existe un campo vació, verifique y vuelva a intentarlo.';
		$color = "bg-danger";
		header('Content-Type: application/json');
		$data = ['error' => $mensaje, 'color' => $color];
		echo json_encode($data, JSON_FORCE_OBJECT);
	}
	

