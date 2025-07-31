<?php
	$cedulaBD = $_POST['cedula'];
	$prd = $_POST['periodo'];
	include('connectDataBase.php');
	if($cedulaBD && $prd){
		$sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedulaBD AND periodo='$prd'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
			$periodo = $row['periodo'];
			$carrera = $row['carrera'];
			$m1 = $row['materia1'];
			$s1 = $row['seccion1'];
			$m2 = $row['materia2'];
			$s2 = $row['seccion2'];
			$m3 = $row['materia3'];
			$s3 = $row['seccion3'];
			$m4 = $row['materia4'];
			$s4 = $row['seccion4'];
			$m5 = $row['materia5'];
			$s5 = $row['seccion5'];
			$m6 = $row['materia6'];
			$s6 = $row['seccion6'];
			$m7 = $row['materia7'];
			$s7 = $row['seccion7'];
			$m8 = $row['materia8'];
			$s8 = $row['seccion8'];
		}
	}
	header('Content-Type: application/json');
	$data = [
		'prd'=>$periodo,
		'm1'=>$m1,
		's1'=>$s1,
		'm2'=>$m2,
		's2'=>$s2,
		'm3'=>$m3,
		's3'=>$s3,
		'm4'=>$m4,
		's4'=>$s4,
		'm5'=>$m5,
		's5'=>$s5,
		'm6'=>$m6,
		's6'=>$s6,
		'm7'=>$m7,
		's7'=>$s7,
		'm8'=>$m8,
		's8'=>$s8,
		'carrera'=>$carrera
	];
	echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>