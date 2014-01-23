<?php

    $db = mysql_connect("localhost","root","") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto2_tienda") or die("Error conecting to db.");
    
	$SQL = "SELECT * from producto;"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	//$datos[];
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'precio'=>$fila["precio"],'Imagen'=>$fila["Imagen"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>