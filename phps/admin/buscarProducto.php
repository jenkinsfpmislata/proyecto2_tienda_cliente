<?php

	$varNom=$_POST["Nombre"];

  mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
    
	$SQL = "SELECT * FROM producto WHERE Nombre LIKE '%$varNom%';"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.");
	
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'Imagen'=>$fila["Imagen"],'vecesBuscado'=>$fila["vecesBuscado"],'vecesVendido'=>$fila["vecesVendido"],'vecesFavorito'=>$fila["vecesFavorito"],'marca'=>$fila["marca"],'precio'=>$fila["precio"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>
