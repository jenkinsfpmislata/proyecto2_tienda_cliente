<?php
session_start();

if (isset($_SESSION["idCliente"])) {
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

            <title>ShopWeb</title>
            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/tiendaCSS.css" rel="stylesheet" type="text/css" />
            <link href="css/perfil.css" rel="stylesheet" type="text/css" />
            <link href="css/estilo.css" rel="stylesheet" type="text/css" />
            <link href="css/carrito.css" rel="stylesheet" type="text/css" />

            <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />
            <script type="text/javascript" language="javascript" src="js/jquery-1.6.3.min.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

            <script type="text/javascript" language="javascript">
                var precioTotal = 0;

                $(document).ready(function() {
                    $(".box_skitter_large").css({width: 820, height: 298}).skitter({numbers: false});
                });

                $(document).ready(function() {

                    id = "<?php echo $_SESSION["idCliente"]; ?>";

                    $.ajax({
                        dataType: 'json',
                        url: 'phps/carritoPhp.php',
                        type: 'POST',
                        data: "id=" + id,
                        success: function(data) {
                            index = 0;
                            var datos = '<table class="table"><thead><tr><td class="col-xs-2"></td><td class="col-xs-3">Product</td><td class="col-xs-1">Quantity</td><td class="col-xs-3">Price</td><td class="col-xs-3">Delete</td><tbody>';
                            $.each(data, function(index) {
                                datos += '<tr><td><img src="imagenes/imagenesProductos/' + data[index].imagen + '.jpg" /></td><td>' + data[index].nombreProducto + ' <span class="glyphicon glyphicon-euro"></span></td><td>  <a  class="btn btn-default btn-sm">-</a>1<a  class="btn btn-default btn-sm">+</a></td><td>' + data[index].precio + ' <span class="glyphicon glyphicon-euro"></span></td><td><div id="dalete"><img src="imagenes/icons/delete.png"></div></td></tr>';
                                precioProducto = parseFloat(data[index].precio);
                                precioTotal = Math.round((precioTotal + precioProducto) * 100) / 100;


                            });
                            datos += '</tbody><tfoot><tr><td colspan="4">Total: '+precioTotal+'<span class="glyphicon glyphicon-euro"></span></td><td><button class="btn btn-default btn-sm">Continue</button></td></tr></tfoot></table>';

                            $('#carritoDetalles').html(datos);

                        }
                    });
                })
                        ;






                //--------categoria
                $(document).ready(function() {
                    $.ajax({
                        dataType: 'json',
                        url: 'phps/admin/categoriaAdmin.php',
                        success: function(data) {
                            var datos = '<ul>';
                            $.each(data, function(index) {
                                datos += '<li class="btn btn-success" onclick="productoCategoria(' + "'" + data[index].Categoria + "'" + ')">' + data[index].Categoria + '</li>';
                            });
                            datos += '</ul>';
                            $('#MPrincipal').html(datos);
                        }});
                });


                function productoCategoria(categoria) {
                    window.location = "productsLogeado.php?categoria=" + categoria;
                }
                //-----fin categoria

            </script>




        </head>


        <body>
            <div id="topbar">
                <div id="logotopbar"></div>

                <div id="menutopbar">

                    <ul>
                        <a href="indexLogeado.php"><li id="inicio" ></li></a>
                        <a href="PerfilUsuario.php" ><li id="perfil"></li></a>

                        <a href="mensajes.php"> <li id="mensajes"></li></a>
                        <a href="carrito.php"><li id="carrito"></li></a>

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



            <div id="cabecera">

                <div id="logo"><img src="imagenes/logo2.png"></div>
                <div id="sublogo"><h1><img src="imagenes/subLogo.png"></h1></div>

            </div>


            <div id="menu">


            </div>

            <div id="contenido">

                <div id="contenidoTop">
                    <div id="MPrincipal">

                    </div>
                    <div id="contieneCarrito">
                        <div id="opcionesCarrito">
                            <ul class="list-inline">
                                <li>Cart</li>
                                <li>Login</li>
                                <li>Purchase</li>
                                <li>Confirm</li>
                            </ul>                 
                        </div>
                        <div id="carritoDetalles">


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
    <?php
} else {
    echo("Acceso denegado");
};
?>
