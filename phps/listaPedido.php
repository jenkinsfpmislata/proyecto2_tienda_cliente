<?php

	session_start();

	$pedido=$_POST["pedido"];
	
	$_SESSION["pedido"]=$pedido;
	
	?>
	