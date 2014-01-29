<?php

  $db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
    
	$SQL = "SELECT * from producto;"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	//$datos[];
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'Imagen'=>$fila["Imagen"],'vecesBuscado'=>$fila["vecesBuscado"],'vecesVendido'=>$fila["vecesVendido"],'vecesFavorito'=>$fila["vecesFavorito"],'marca'=>$fila["marca"],'precio'=>$fila["precio"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>
