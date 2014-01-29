<?php

	$categoria=$_GET["categoria"];

	mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	
	$SQL="SELECT Categoria FROM categoria WHERE Categoria LIKE '$categoria';";
	$result = mysql_query( $SQL ) or die("Couldnt execute query.");
	
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	
	$datos[0]=array('Categoria'=>$fila["Categoria"]);
		
		
	
	echo json_encode($datos);
	
	
	
	?>