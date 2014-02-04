<?php
	
	
	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	
	
	
	echo json_encode($datos);
	
		
	?>
	
	
	