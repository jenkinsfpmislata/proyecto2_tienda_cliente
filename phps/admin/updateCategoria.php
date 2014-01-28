<?php
	$categoria=$_POST["Categoria"];
	$columna=$_POST["columna"];
	
		$db=mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="UPDATE categoria
	SET Categoria='$categoria' WHERE Categoria LIKE '$columna'; ";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>