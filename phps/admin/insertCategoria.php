<?php

	
	$idProducto=$_POST["idProducto"];
	$Categoria=$_POST["Categoria"];
	
	

	mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="INSERT INTO Categoria (idProducto, Categoria) VALUES ('$idProducto','$Categoria');";
	mysql_query($SQL) or die("Couldnt execute query");
	

	?>
