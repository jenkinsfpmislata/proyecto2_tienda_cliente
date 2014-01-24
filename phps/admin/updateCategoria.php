<?php
	$id=$_POST["id"];
	$nom=$_POST["nombre"];
	$nick=$_POST["nick"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	
	
	$db=mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="UPDATE cliente
	SET nombreCliente='$nom', nick='$nick', email='$email', contrasenya='$pass'
	WHERE idCliente=$id; ";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>