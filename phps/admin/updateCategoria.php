<?php
	$Categoria=$_POST["Categoria"];
	
	
	
	$db=mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="UPDATE Categoria
	SET Categoria='$categoria' WHERE Categoria=$Categoria; ";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>