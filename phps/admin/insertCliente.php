<?php

	
	$nom=$_POST["nombre"];
	$nick=$_POST["nick"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$repPass=$_POST["repPass"];
	
	if($pass==$repPass){
	
	

	mysql_connect("192.168.59.106","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="INSERT INTO cliente (idCliente, nombreCliente, nick, email, imagen,contrasenya,rol,Conectado) VALUES (NULL,'$nom','$nick','$email','perfil1.jpg','$pass', 'user','true');";
	mysql_query($SQL) or die("Couldnt execute query");
	
	$SQL2="SELECT idCliente FROM cliente WHERE nick LIKE '$nick' AND contrasenya LIKE '$pass'";
	$resultado2=mysql_query($SQL2) or die("Couldnt execute query");
	
	
	if($fila=mysql_fetch_array($resultado2,MYSQL_ASSOC)){
		echo $fila["idCliente"];
	}
	}
	
	else{
	echo "las contraseñas deben coincidir";
	die;
	}
	
	
	
	?>