<?php
	$idProducto=$_POST["idProducto"];
	$Nombre=$_POST["Nombre"];
	$Descripcion=$_POST["Descripcion"];
	$Imagen=$_POST["Imagen"];
	$vecesBuscado=$_POST["vecesBuscado"];
	$vecesVendido=$_POST["vecesVendido"];
	$vecesFavorito=$_POST["vecesFavorito"];
	$marca=$_POST["marca"];
	$precio=$_POST["precio"];
	
	
	$db=mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="UPDATE producto
	SET Nombre='$Nombre', Descripcion='$Descripcion', Imagen='$Imagen', vecesBuscado='$vecesBuscado', vecesVendido='$vecesVendido', vecesFavorito='$vecesFavorito', marca='$marca', precio='$precio'
	WHERE idProducto=$idProducto; ";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>
	
	
	