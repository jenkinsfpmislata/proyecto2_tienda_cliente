<?php
	
	$nick=$_POST["nick"];
	$pass=$_POST["pass"];
	
	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="SELECT idCliente FROM cliente WHERE nick LIKE '$nick' AND contrasenya LIKE '$pass'";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	$fila=mysql_fetch_array($resultado,MYSQL_ASSOC);
		
	$datos[0]=array('idCliente'=>$fila["idCliente"]);
	
	echo json_encode($datos);
	
		
	?>
	
	
	