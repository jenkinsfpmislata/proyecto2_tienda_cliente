<?php

	$varNom=$_POST["nom"];

  mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
    
	$SQL = "SELECT * FROM cliente WHERE nombreCliente LIKE '%$varNom%';"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.");
	
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idCliente'=>$fila["idCliente"],'nombreCliente'=>$fila["nombreCliente"],'nick'=>$fila["nick"],'email'=>$fila["email"],'imagen'=>$fila["imagen"],'contrasenya'=>$fila["contrasenya"],'rol'=>$fila["rol"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>
