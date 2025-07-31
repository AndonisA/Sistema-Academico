<?php
	include('connectDataBase.php');
	$sql = "SELECT * FROM carrera ORDER BY nombre ASC";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	$numCarrera = array();
	while($row=mysqli_fetch_array($result)){
		array_push($numCarrera, $row);
	}
	echo json_encode($numCarrera);
	ini_set('error_reporting', E_ALL);
?>