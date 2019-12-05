<?php
	$db_server = "localhost"; //512 3307 3306 3305
	$db_user = "root";
	$db_password = "";
	$db = "motorG";
	$conexion = mysqli_connect($db_server, $db_user, $db_password, $db);
	
	mysqli_set_charset($conexion, "utf8");	
?>