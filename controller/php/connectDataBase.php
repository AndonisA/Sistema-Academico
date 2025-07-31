<?php
	$connect = mysqli_connect('localhost', 'root', '', 'bdinscripcion') or die ("error");
	$connect -> set_charset("utf8");
	if (!$connect){
		die("Connection failed: ". mysqli_connect_error());
	}
?>