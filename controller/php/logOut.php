<?php
session_start();
session_unset();
session_destroy();
$color = 'bg-success';
header('Content-Type: application/json');
$data = ['color' => $color];
echo json_encode($data, JSON_FORCE_OBJECT);
?>