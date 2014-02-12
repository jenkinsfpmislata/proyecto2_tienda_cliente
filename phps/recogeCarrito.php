<?php
$carrito=file.get.contents("php://input");
	$ocarrito=new stdClass();

$ocarrito=json_decode($carrito);


	$ocarrito->idPedido;
        
        foreach ($ocarrito->listaproductos as $linea) {
    

	echo $linea->nombreProducto;
	$linea->precio;
	$linea->imagen;
	$linea->stock;
        
}	

        echo $fila[""];


	
?>