<?php

	
	
	$Categoria=$_POST["categoria"];
	
	mysql_connect("192.168.59.106","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="INSERT INTO categoria (Categoria) VALUES ('$Categoria');";
	mysql_query($SQL) or die("Couldnt execute query");
	
die;
	?>
