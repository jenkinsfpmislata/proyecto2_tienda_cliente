<?php
	
	$categoria=$_GET["categoria"];
	
	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="SELECT * FROM producto WHERE categoria LIKE '$categoria';";
	$result=mysql_query($SQL) or die("Couldnt execute query");
	
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
        
		$datos[$i]=array('idProducto'=>$fila["idProducto"],'Nombre'=>$fila["Nombre"],'Descripcion'=>$fila["Descripcion"],'Imagen'=>$fila["Imagen"],'vecesBuscado'=>$fila["vecesBuscado"],'vecesVendido'=>$fila["vecesVendido"],'vecesFavorito'=>$fila["vecesFavorito"],'marca'=>$fila["marca"],'precio'=>$fila["precio"]);
	$i++;	
	}
		
	
	
	echo json_encode($datos);
	
		
	?>
	
	
	