<?php
	$college = intval($_POST['valor']); 
	include('connectDataBase.php');
	$sql = "SELECT * FROM materias WHERE carrera=$college";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$matter = array();
	while($row=mysqli_fetch_array($result)){
		array_push($matter, $row);
	}
	echo json_encode($matter, JSON_UNESCAPED_UNICODE);
	ini_set('error_reporting', E_ALL);
?>