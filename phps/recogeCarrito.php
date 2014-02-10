<?php
$carrito=file.get.contents("php://input");
	$ocarrito=new stdClass();

$ocarrito=json_decode($carrito);


	$ocarrito->idPedido;
        
        foreach ($ocarrito->listaproductos as $linea) {
    
}
	$nombreProducto->nombreProducto;
	$precio->precio;
	$imagen->imagen;
	$stock->stock;
	
	
	

	mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="INSERT INTO cliente (idCliente, nombreCliente, nick, email, imagen,contrasenya,rol,Conectado) VALUES (NULL,'$nom','$nick','$email','perfil1.jpg','$pass', 'user','true');";
	mysql_query($SQL) or die("Couldnt execute query");
	
	$SQL2="SELECT idCliente FROM cliente WHERE nick LIKE '$nick' AND contrasenya LIKE '$pass'";
	$resultado2=mysql_query($SQL2) or die("Couldnt execute query");
	
	
	if($fila=mysql_fetch_array($resultado2,MYSQL_ASSOC)){
		echo $fila["idCliente"];
	}


	
	
	
	?>