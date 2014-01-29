<?php

  $db=mysql_connect("192.168.59.106","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
    
	$SQL = "SELECT * from categoria ORDER BY categoria;"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	//$datos[];
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('Categoria'=>$fila["Categoria"]);
		$i++;
	}
		
	
	echo json_encode($datos);
	
?>
