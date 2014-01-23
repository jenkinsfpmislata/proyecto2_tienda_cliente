<?php
	
	$id=$_GET["id"];

	mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="SELECT * FROM producto WHERE idProducto=$id";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	$fila=mysql_fetch_array($resultado,MYSQL_ASSOC);
	
	$datos[0]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'precio'=>$fila["precio"],'Imagen'=>$fila["Imagen"],'marca'=>$fila["marca"]);
		header('Content-type: application/json');
	echo json_encode($datos);
	

	?>
	
	
	