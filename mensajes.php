<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <title>ShopWeb</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/tiendaCSS.css" rel="stylesheet" type="text/css" />
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />
        <link href="css/perfil.css" rel="stylesheet" type="text/css" />
        <link href="css/mensajes.css" rel="stylesheet" type="text/css" />

        <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />

        <script type="text/javascript" language="javascript" src="js/transition.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

        <script type="text/javascript" language="javascript">


            $(document).ready(function() {
                $(".box_skitter_large").css({width: 820, height: 298}).skitter({numbers: false});
            });

        </script>




    </head>


    <body>




        <div id="topbar">
            <div id="logotopbar"></div>

            <div id="menutopbar">

                <ul>
                    <a href="indexLogeado.php"><li id="inicio" ></li></a>
                    <a href="PerfilUsuario.php" ><li id="perfil"></li></a>

                    <a href="mensajes.php"> <li id="mensajes"><span class="cantidadProducto">0</span></li></a>
                    <a href="carrito.php"><li id="carrito"><span class="cantidadProducto">0</span></li></a>

                </ul>
            </div>
            <div id="menutopbar2">
                <ul>

                    <a href="index.php"><li id="salir"></li></a>
                </ul>
            </div>


            <div id="buscador">
                <img src="imagenes/imagenesStatic/imgBusc.png">
                <input name="buscador" type="text">
            </div>
        </div>



        <div id="carroRightbar">
            <div class="carrito"><img src="imagenes/imagenesStatic/carro.png"><p id="cantidad">3</p></div>

            <div id="precioTotal">  <p> Total: 3562.87&euro;</p> </div>
            <div id="listaCarro">



                <!---------productos comprados-->
                <div class="producto" >
                    <div id="cerrar"><img  src="imagenes/imagenesStatic/close.png" onclick="">		</div>
                    <img src="imagenes/imagenesProductos/art6.jpg">

                    <div id="descripcion">
                        <p id="precioLista">2999.99&euro;</p>
                        <p>This is other example from webpage...</p>
                    </div>

                </div>

                <div class="producto" >
                    <div id="cerrar"><img  src="imagenes/imagenesStatic/close.png" onclick="">		</div>
                    <img src="imagenes/imagenesProductos/art7.jpg">

                    <div id="descripcion">
                        <p id="precioLista">1250&euro;</p>
                        <p>This is other example from webpage...</p>

                    </div>
                </div>

                <div class="producto" >
                    <div id="cerrar"><img  src="imagenes/imagenesStatic/close.png" onclick="">		</div>
                    <img src="imagenes/imagenesProductos/art5.jpg">

                    <div id="descripcion">
                        <p id="precioLista">1250&euro;</p>
                        <p>This is other example from webpage...</p>

                    </div>
                </div>

                <!--------- fin productos comprados-->

            </div>
        </div>

        <div id="cabecera">

            <a href="index.php"><div id="logo"><img src="imagenes/logo2.png"></div></a>
            <div id="sublogo"><h1><img src="imagenes/subLogo.png"></h1></div>

        </div>


        <div id="menu">


        </div>

        <div id="contenido">

            <div id="contenidoTop">
                <div id="MPrincipal">
                    <ul>
                        <li class="btn btn-success" onclick="">PC</li>
                        <li class="btn btn-success" onclick="">Laptop</li>
                        <li class="btn btn-success" onclick="">Keyboards</li>
                        <li class="btn btn-success" onclick="">Cameras</li>
                        <li class="btn btn-success" onclick="">Memory</li>
                        <li class="btn btn-success" onclick="">Smart Phones</li>
                        <li class="btn btn-success" onclick="">Tardis</li>
                        <li class="btn btn-success" onclick="">Other Stuff</li>
                    </ul>
                </div>


                <div id="perfilContenedor">
                    <div id="perfilNavegador">
                        <a href="PerfilUsuario.php" >Profile</a><a href="#" class="activoP">Messages</a>

                    </div>

                    <div id="tablaMensajes">
                        <?php
                        $db = mysql_connect("localhost", "root", "") or die("Connection Error:");
                        mysql_select_db("proyecto2_tienda") or die("Error connecting db");

                        $SQL = "SELECT * FROM mensaje WHERE idRecibe=1 ORDER BY idMensaje DESC;";
                        $resultado = mysql_query($SQL) or die("Couldnt execute query1 ");

                        while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
                            $idMensaje = $fila['idMensaje'];
                            $SQL2 = "SELECT nick FROM cliente WHERE idCliente = (SELECT idEnvia FROM mensaje WHERE idMensaje='$idMensaje');";
                            $resultadoNombre = mysql_query($SQL2) or die("Couldnt execute query2");
                            $fila2 = mysql_fetch_array($resultadoNombre, MYSQL_ASSOC);

                            echo "<div class='mensaje2'><table class='table'><tr><td></p>" . $fila2['nick'] . "</p></td><td > <a class='collapsed' href='#demo" . $fila['idMensaje'] . "'  data-toggle='collapse'><div class='elipsis'>" . $fila['mensaje'] . "</div>
                                </a></td><td>" . $fila['fecha'] . "</td></tr></table><tr><div id='demo" . $fila['idMensaje'] . "' class='panel-collapse collapse'><p>" . $fila['mensaje'] . "</p></div></tr></div>";
                        }
                        ?>










                    </div>
                </div>


            </div>



        </div>





        <div id="pie">
            <div id="LegalStuff">
                <a href="">Legal Terms</a>
                <a href="">Security</a>
                <a href="">Privacy</a>
                <a href="">Rate</a>
                <a href="">Contact</a>
                <a href="">Web Map</a>
            </div>


            <div id="icons">
                <img class="icon-footer" src="imagenes/icons/facebook24.png">
                <img class="icon-footer" src="imagenes/icons/twitter14.png">
                <img class="icon-footer" src="imagenes/icons/google17.png">
                <img class="icon-footer" src="imagenes/icons/social68.png">
            </div>
            <div id="icons">
                &copy; PC Store 2013. Spain. All rights reserved.<br />
                Proyecto 2 - Tienda
            </div>
        </div>



    </body>
</html>
