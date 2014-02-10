<?php

	session_start();
$pedido=file.get.contents("php://input");
	
	
	$_SESSION["pedido"]=$pedido;
	
	?>
	