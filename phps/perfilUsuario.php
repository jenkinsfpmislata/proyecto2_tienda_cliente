<?php
	
	$idCliente=$_GET["idCliente"];


	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	 $SQL = "SELECT * FROM cliente WHERE idCliente=1";

        $resultado = mysql_query($SQL) or die("Couldnt execute query");

	
	$fila=mysql_fetch_array($resultado,MYSQL_ASSOC);
	
	
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idCliente'=>$fila["idCliente"],'nombreCliente'=>$fila["nombreCliente"],'nick'=>$fila["nick"],'email'=>$fila["email"],'imagen'=>$fila["imagen"]);
		$i++;
	}
		
	
	
	echo json_encode($datos);
	
		
	?>
	
	
	