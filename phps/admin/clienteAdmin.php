<?php

  $db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
    
	$SQL = "SELECT * from cliente;"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	//$datos[];
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idCliente'=>$fila["idCliente"],'nombreCliente'=>$fila["nombreCliente"],'nick'=>$fila["nick"],'email'=>$fila["email"],'imagen'=>$fila["imagen"],'contrasenya'=>$fila["contrasenya"],'rol'=>$fila["rol"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>
