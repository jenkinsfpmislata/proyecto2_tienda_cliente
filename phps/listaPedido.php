<?php

	session_start();

	$pedido=$_GET["pedido"];
	
	$_SESSION["pedido"]=$pedido;
	
	?>
	