<?php
	error_reporting(-1);
	//Control_modificaciones_notas
	$datos;
	$datosT = "";
	$connect = mysqli_connect('212.107.19.4', 'u690648372_sistemunio', '7XhTc7gZ:', 'u690648372_SISTEMA') or die ("error");
	$connect -> set_charset("utf8");
	$fila = 1;
	if (($gestor = fopen("Control_modificaciones_notas.csv", "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor, 100, ",")) !== FALSE) {
			$numero = count($datos);
			//echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
			$fila++;
			for ($c=0; $c < $numero; $c++) {
				if($c < 9){
					//echo $datos[$c] . ",</br>";
					$datosT .= $datos[$c]. ",";


				}else if ($c == 9){
					//echo $datos[$c] . "</br>";
					$datosT .= $datos[$c];
				}
			}
			//echo $datosT."\n";
			$sql = "INSERT INTO Control_modificaciones_notas (id_cont_mod,id_periodo,id_alumno,id_materia,id_seccion,nota_mod,Nota_anterior,corte,cusuario,cfecha) VALUES ".$datosT;
			$result = $connect->query($sql);
			unset($datosT);
		}
		fclose($gestor);
	}
?>