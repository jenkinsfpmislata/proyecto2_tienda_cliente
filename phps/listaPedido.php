<?php

	session_start();

	$nick=$_POST["nick"];
	$pass=$_POST["pass"];
	
	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="SELECT idCliente FROM cliente WHERE nick LIKE '$nick' AND contrasenya LIKE '$pass'";
	
	$result=mysql_query($SQL) or die("Couldnt execute query");
	$numRows=mysql_num_rows($result);
	
	if($numRows==1){
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	$_SESSION["idCliente"]=$fila["idCliente"];
	
	echo "indexLogeado.php";
	
	}
	else{
	
	};
	
	?>
	