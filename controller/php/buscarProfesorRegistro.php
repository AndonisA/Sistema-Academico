<?php
	$cedulaBM = intval($_POST['cedula']);
	$carrera = intval($_POST['carrera']);
	include('connectDataBase.php');
	$sql = "SELECT * FROM profmater WHERE cedulaProfesor=$cedulaBM AND carrera=$carrera";
	$result = $connect->query($sql);
	$row = $result->num_rows;
	while(($row=mysqli_fetch_array($result)) && ($row['cedulaProfesor'] == $cedulaBM)){
		$materia1 = $row['materia1'];
		$materia2 = $row['materia2'];
		$materia3 = $row['materia3'];
		$materia4 = $row['materia4'];
		$materia5 = $row['materia5'];
		$materia6 = $row['materia6'];
		$materia7 = $row['materia7'];
		$materia8 = $row['materia8'];
	}
	header('Content-Type: application/json');
	$data = [
	'm1' => $materia1,
	'm2' => $materia2,
	'm3' => $materia3,
	'm4' => $materia4,
	'm5' => $materia5,
	'm6' => $materia6,
	'm7' => $materia7,
	'm8' => $materia8
	];
	echo json_encode($data, JSON_FORCE_OBJECT);
?>