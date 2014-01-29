<?php
	
	$categoria=$_GET["categoria"];
	
	$db=mysql_connect("192.168.59.106","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL="DELETE FROM categoria WHERE categoria LIKE '$categoria';";
	
	$resultado=mysql_query($SQL) or die("Couldnt execute query");
	
	mysql_close($con);
	
	
	
	?>
