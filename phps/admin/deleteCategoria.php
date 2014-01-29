<?php
	
	$categoria=$_GET["categoria"];
	
	$db=mysql_connect("localhost","root","")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="DELETE FROM categoria WHERE categoria LIKE '$categoria';";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>
