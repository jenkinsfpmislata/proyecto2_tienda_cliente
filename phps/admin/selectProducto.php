<?php

	$idProducto=$_GET["idProducto"];

	mysql_connect("192.168.59.106","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	
	
	$SQL="SELECT * FROM producto WHERE idProducto=$idProducto;";
	$result = mysql_query( $SQL ) or die("Couldnt execute query.");
	
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	
	$datos[0]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'Imagen'=>$fila["Imagen"],'vecesBuscado'=>$fila["vecesBuscado"],'vecesVendido'=>$fila["vecesVendido"],'vecesFavorito'=>$fila["vecesFavorito"],'marca'=>$fila["marca"],'precio'=>$fila["precio"]);
		
		
	
	echo json_encode($datos);
	
	
	
	?>