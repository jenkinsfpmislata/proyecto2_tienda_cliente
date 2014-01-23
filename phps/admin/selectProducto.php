<?php

	$id=$_GET["id"];

	mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	
	
	$SQL="SELECT * FROM cliente WHERE idCliente=$id;";
	$result = mysql_query( $SQL ) or die("Couldnt execute query.");
	
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	
	$datos[0]=array('idCliente'=>$fila["idCliente"],'nombreCliente'=>$fila["nombreCliente"],'nick'=>$fila["nick"],'email'=>$fila["email"],'imagen'=>$fila["imagen"],'contrasenya'=>$fila["contrasenya"],'rol'=>$fila["rol"]);
		
		
	
	echo json_encode($datos);
	
	
	
	?>