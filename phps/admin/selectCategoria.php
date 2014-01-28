<?php

	$categoria=$_GET["categoria"];

	mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	
	$SQL="SELECT * FROM categoria WHERE categoria LIKE '$categoria';";
	$result = mysql_query( $SQL ) or die("Couldnt execute query.");
	
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	
	$datos[0]=array('categoria'=>$fila["categoria"]);
		
		
	
	echo json_encode($datos);
	
	
	
	?>