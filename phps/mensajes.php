<?php
	$id=$_GET["id"];
	
	$db=mysql_connect("localhost","root","frodo2013")or die("Connection Error:");
	mysql_select_db("proyecto2_tienda")or die ("Error connecting db");
	
	$SQL = "SELECT * FROM mensaje WHERE idRecibe=$id ORDER BY idMensaje DESC;";
        $resultado = mysql_query($SQL) or die("Couldnt execute query1 ");
        $i=0;
        while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
            $idMensaje = $fila['idMensaje'];
            $SQL2 = "SELECT nick FROM cliente WHERE idCliente = (SELECT idEnvia FROM mensaje WHERE idMensaje='$idMensaje');";
            $resultadoNombre = mysql_query($SQL2) or die("Couldnt execute query2");
            $fila2 = mysql_fetch_array($resultadoNombre, MYSQL_ASSOC);
            
            $datos[$i]=array('nick'=>$fila2["nick"],'idMensaje'=>$fila["idMensaje"],'mensaje'=>$fila["menssaje"],'fecha'=>$fila["fecha"]);
$i++;
        }
	echo json_encode($datos);
	
		
	?>
	
	
	