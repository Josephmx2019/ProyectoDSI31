<?php
	$Servidor="127.0.0.1";
	$Usuario="root";
	$Password="";
	$BD="ControlVehicular30";

	$Con=mysql_connect($Servidor, $Usuario, $Password, $BD);
	print_r($Con);

	
	$SQL="INSERT INTO OFICIALES VALUES('1','1','1','1','1');"
	mysqli_query($Con, $SQL);|
	
	$Result
?>