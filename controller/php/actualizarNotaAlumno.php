<?php
	$cedulaBD = $_POST['cedula'];
	$prd = $_POST['periodo'];
	//echo "[$cedulaBD][$prd]"; 	
	
	$materia1 = $_POST['materia1'];
	$m1n1 = $_POST['m1c1'];
	if($m1n1 == null || $m1n1 == "") $m1n1 = 0;
	$m1n2 = $_POST['m1c2'];
	if($m1n2 == null || $m1n2 == "") $m1n2 = 0;
	$m1n3 = $_POST['m1c3'];
	if($m1n3 == null || $m1n3 == "") $m1n3 = 0;
	
	$materia2 = $_POST['materia2'];
	$m2n1 = $_POST['m2c1'];
	if($m2n1 == null || $m2n1 == "") $m2n1 = 0;
	$m2n2 = $_POST['m2c2'];
	if($m2n2 == null || $m2n2 == "") $m2n2 = 0;
	$m2n3 = $_POST['m2c3'];
	if($m2n3 == null || $m2n3 == "") $m2n3 = 0;
	
	$materia3 = $_POST['materia3'];
	$m3n1 = $_POST['m3c1'];
	if($m3n1 == null || $m3n1 == "") $m3n1 = 0;
	$m3n2 = $_POST['m3c2'];
	if($m3n2 == null || $m3n2 == "") $m3n2 = 0;
	$m3n3 = $_POST['m3c3'];
	if($m3n3 == null || $m3n3 == "") $m3n3 = 0;
	
	$materia4 = $_POST['materia4'];
	$m4n1 = $_POST['m4c1'];
	if($m4n1 == null || $m4n1 == "") $m4n1 = 0;
	$m4n2 = $_POST['m4c2'];
	if($m4n2 == null || $m4n2 == "") $m4n2 = 0;
	$m4n3 = $_POST['m4c3'];
	if($m4n3 == null || $m4n3 == "") $m4n3 = 0;
	
	$materia5 = $_POST['materia5'];
	$m5n1 = $_POST['m5c1'];
	if($m5n1 == null || $m5n1 == "") $m5n1 = 0;
	$m5n2 = $_POST['m5c2'];
	if($m5n2 == null || $m5n2 == "") $m5n2 = 0;
	$m5n3 = $_POST['m5c3'];
	if($m5n3 == null || $m5n3 == "") $m5n3 = 0;
	
	$materia6 = $_POST['materia6'];
	$m6n1 = $_POST['m6c1'];
	if($m6n1 == null || $m6n1 == "") $m6n1 = 0;
	$m6n2 = $_POST['m6c2'];
	if($m6n2 == null || $m6n2 == "") $m6n2 = 0;
	$m6n3 = $_POST['m6c3'];
	if($m6n3 == null || $m6n3 == "") $m6n3 = 0;
	
	$materia7 = $_POST['materia7'];
	$m7n1 = $_POST['m7c1'];
	if($m7n1 == null || $m7n1 == "") $m7n1 = 0;
	$m7n2 = $_POST['m7c2'];
	if($m7n2 == null || $m7n2 == "") $m7n2 = 0;
	$m7n3 = $_POST['m7c3'];
	if($m7n3 == null || $m7n3 == "") $m7n3 = 0;
	
	$materia8 = $_POST['materia8'];
	$m8n1 = $_POST['m8c1'];
	if($m8n1 == null || $m8n1 == "") $m8n1 = 0;
	$m8n2 = $_POST['m8c2'];
	if($m8n2 == null || $m8n2 == "") $m8n2 = 0;
	$m8n3 = $_POST['m8c3'];
	if($m8n3 == null || $m8n3 == "") $m8n3 = 0;

	if($cedulaBD && $prd){
		include('connectDataBase.php');
		$sql = "SELECT * FROM notas WHERE correo='$cedulaBD' AND periodo='$prd'";
		$result = $connect->query($sql);
		$row = $result->num_rows;
		if(($row=mysqli_fetch_array($result)) && ($cedulaBD == $row['correo'])){
			if($materia1){
				$sql = "UPDATE notas SET corte1=$m1n1, corte2=$m1n2, corte3=$m1n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia1'";
				$result = $connect->query($sql);
			}
			if($materia2){
				$sql = "UPDATE notas SET corte1=$m2n1, corte2=$m2n2, corte3=$m2n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia2'";
				$result = $connect->query($sql);
			}
			if($materia3){
				$sql = "UPDATE notas SET corte1=$m3n1, corte2=$m3n2, corte3=$m3n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia3'";
				$result = $connect->query($sql);
			}
			if($materia4){
				$sql = "UPDATE notas SET corte1=$m4n1, corte2=$m4n2, corte3=$m4n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia4'";
				$result = $connect->query($sql);
			}
			if($materia5){
				$sql = "UPDATE notas SET corte1=$m5n1, corte2=$m5n2, corte3=$m5n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia5'";
				$result = $connect->query($sql);
			}
			if($materia6){
				$sql = "UPDATE notas SET corte1=$m6n1, corte2=$m6n2, corte3=$m6n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia6'";
				$result = $connect->query($sql);
			}
			if($materia7){
				$sql = "UPDATE notas SET corte1=$m7n1, corte2=$m7n2, corte3=$m7n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia7'";
				$result = $connect->query($sql);
			}
			if($materia8){
				$sql = "UPDATE notas SET corte1=$m8n1, corte2=$m8n2, corte3=$m8n3 WHERE correo='$cedulaBD' AND periodo='$prd' AND asignatura='$materia8'";
				$result = $connect->query($sql);
			}
			$mensaje = 'Se ha modificado correctamente.';
			$color = "bg-success";
		} else {
			$mensaje = 'El es no esta registrado.';
			$color = "bg-danger";

		}
	} else {
		$mensaje = 'El verifique si todos los campos están llenos.';
		$color = "bg-danger";
	}
	header('Content-Type: application/json');
	$data = ['error' => $mensaje, 'color' => $color];
	echo json_encode($data, JSON_FORCE_OBJECT);
