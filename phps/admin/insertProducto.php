<?php

	
	$Nombre=$_POST["Nombre"];
	$Descripcion=$_POST["Descripcion"];
	$Imagen=$_POST["Imagen"];
	$vecesBuscado=$_POST["vecesBuscado"];
	$vecesVendido=$_POST["vecesVendido"];
	$vecesFavorito=$_POST["vecesFavorito"];
	$categoria=$_POST["categoria"];
	$marca=$_POST["marca"];
	$precio=$_POST["precio"];
	

	mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="INSERT INTO producto (idProducto, Nombre, Descripcion, Imagen, vecesBuscado, vecesVendido, vecesFavorito, marca, precio, categoria) VALUES (NULL,'$Nombre','$Descripcion','$Imagen','0','0','0', '$marca','$precio','$categoria');";
	mysql_query($SQL) or die("Couldnt execute query");
	

	?>