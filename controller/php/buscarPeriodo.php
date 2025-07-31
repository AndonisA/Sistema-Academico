<?php
include('connectDataBase.php');
$sql = "SELECT * FROM periodo";
$result = $connect->query($sql);
$row = $result->num_rows;
$numPeriod = array();
while ($row = mysqli_fetch_array($result)) {
	array_push($numPeriod, $row);
}
echo json_encode($numPeriod);
