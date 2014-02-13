<?php
$id=$_POST["id"];

	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");

$SQL="SELECT * FROM listapedido WHERE idPedido=$id;";

$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idPedido'=>$fila["idPedido"],'idProducto'=>$fila["idProducto"],'nombreProducto'=>$fila["nombreProducto"],'precio'=>$fila["precio"],'imagen'=>$fila["imagen"]);
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
       
        ?>