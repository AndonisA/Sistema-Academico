<?php
	error_reporting(-1);
	$correoS = $_POST['correo'];
	include('connectDataBase.php');
	$sql = "SELECT * FROM notas WHERE correo='$correoS'";
    $result = $connect->query($sql);
	$row = $result->num_rows;
	$tempP = null;
	$periodoEstudiante = array();
    while(($row=mysqli_fetch_array($result)) && ($row['correo'] == $correoS)){
		if($tempP != $row['periodo']){
			array_push($periodoEstudiante, $row);
			$tempP = $row['periodo'];
		}
	}
	header('Content-Type: application/json');
	echo json_encode($periodoEstudiante, JSON_UNESCAPED_UNICODE);
?>