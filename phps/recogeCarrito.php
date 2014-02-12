<?php
$carrito=file.get.contents("php://input");
	$objCarrito=new stdClass();
        
        $objCarrito=json_decode($carrito);


	
        
        mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
        
        $objCarrito->idPedido;
        
        foreach ($objCarrito->listaproductos as $linea) {
        $linea->idProducto;
//	$linea->nombreProducto;
//	$linea->precio;
//	$linea->imagen;
//	$linea->stock;
        
	
	$SQL="INSERT INTO listapedido (idPedido, idProducto) VALUES ('$objCarrito->idPedido','$linea->idProducto','$Descripcion');";
	mysql_query($SQL) or die("Couldnt execute query");
        
        
        }	

	
?>