<?php
	$correoS = $_POST['cedula'];
	$prd = $_POST['periodo'];
	//echo "[$correoS $prd]";
	//$correoS = 'HARIANNEJORGISTA@GMAIL.COM';
	//$prd = 'LAR-II-2020';
	include('connectDataBase.php');
	$sql = "SELECT * FROM notas WHERE correo='$correoS' AND periodo='$prd'";
    $result = $connect->query($sql);
	$row = $result->num_rows;
	$notasEstudiante = array();
    while(($row=mysqli_fetch_array($result)) && ($row['correo'] == $correoS)){
		array_push($notasEstudiante, $row);
	}
	header('Content-Type: application/json');

	echo json_encode($notasEstudiante, JSON_UNESCAPED_UNICODE);
?>