<?php

	
	$idCliente=$_GET["id"];
	
	mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="SELECT * FROM cliente WHERE idCliente=$idCliente";
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	
	$datos[0]=array('idCliente'=>$fila["idCliente"],'nombreCliente'=>$fila["nombreCliente"],'nick'=>$fila["nick"],'email'=>$fila["email"],'imagen'=>$fila["imagen"],'contrasenya'=>$fila["contrasenya"],'rol'=>$fila["rol"]);
		
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
	
	
	?>