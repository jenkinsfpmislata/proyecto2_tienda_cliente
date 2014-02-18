<?php
$categoria = $_GET["categoria"];

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
            <link href="css/descriptionProducto.css" rel="stylesheet" type="text/css" />
            <link href="css/estilo.css" rel="stylesheet" type="text/css" />
            <link href="css/products.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />


            <script type="text/javascript" language="javascript" src="js/jquery-2.0.3.min.js">
            </script>
            <script type="text/javascript" language="javascript" src="js/bootstrap.min.js">
            </script>
            <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js">
            </script>
            <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js">
            </script>
            <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js">
            </script>

            <script type="text/javascript" language="javascript">


                var precioTotal = 0;
                var cantidad = 0;
                var datos = '';

                $(document).ready(function() {


                    categorias = "<?php echo $categoria ?>";


                    $.ajax({
                        dataType: 'json',
                        url: 'phps/productoCategoria/productoCategoria.php?categoria=' + categorias,
                        type: 'GET',
                        success: function(data) {
                            var datos = '<table>';

                            $.each(data, function(index) {
                                datos += '<div class="producto"  onclick=""><p id="precio">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div><a  ><div class="carrito" onclick="descripcion(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalDescripcion"><img src="imagenes/imagenesStatic/carro.png"></div></a></div>';

                            });
                            datos += '</table>';
                            $('#listaProducto').html(datos);
                        }
                    });
                });


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
                };

    //----------------------------------------------
                function descripcion(id) {

                    $.ajax({
                        dataType: 'json',
                        url: 'phps/descripcion.php?id=' + id,
                        type: 'GET',
                        success: function(data) {
                            index = 0;
                            var datos = '<div id="descripcionProductoNuevo"><h4 class="modeloProducto"><b>' + data[index].marca + ' ' + data[index].Nombre + '</b></h4><div class="productoTienda"><img src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"></div><div id="descripcionProducto"><h4><i><b>Description:</b></i></h5><p>' + data[index].Descripcion + '</p></div><div id="caracteristicas"></div><div id="precioProducto">' + data[index].precio + ' &euro;</div><a  href="javascript:anyadirCarrito(' + data[index].idProducto + ')"><div class="btn btn-success" id="anadirCarrito" ><img src="imagenes/imagenesStatic/carro.png"></div></a>                                 </div>';

                            $('#descrip').html(datos);
                        }
                    });
                }
                ;

                function anyadirCarrito(id) {

                    $.ajax({
                        dataType: 'json',
                        url: 'phps/descripcion.php?id=' + id,
                        type: 'GET',
                        success: function(data) {
                            index = 0;

                            datos = datos + '<div class="producto"><p id="precioLista">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div></div>';
                            precioProducto = parseFloat(data[index].precio);
                            precioTotal = precioTotal + precioProducto;
                            precio = '<p>Total: ' + precioTotal + ' &euro; </p>';
                            cantidad = cantidad + 1;
                            cantidadTotal = cantidad;
                            $('#listaCarro').html(datos);
                            $('#precioTotal').html(precio);
                            $('#cantidad').html(cantidadTotal);
                        }
                    });
                }
                ;



    //---------------------------------------------

                function salir(){
                $.ajax({
                    url: 'phps/salir.php',

                    success: function() {

                        window.location = "index.php";
                    }
                });
                }

//BUSCAR---PRODUCTOS-----------------------
            function buscar() {
                busc = $('#searchForm').serialize();


                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/buscarProducto.php',
                    type: 'POST',
                    data: busc,
                    success: function(data) {
                        dato = '<table>';
                        $.each(data, function(index) {
                            dato += '<div class="producto"  onclick=""><p id="precio">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div><a  ><div class="carrito" onclick="descripcion(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalDescripcion"><img src="imagenes/imagenesStatic/carro.png"></div></a></div>';
                            
                            dato += '</table>';
                        });
                        $('#listaProducto').html(dato);
                    }
                });
            }
            ;
//FIN BUSCAR PRODUCTOS------------------
//------------------------------------------------------------------------------
            </script>




        </head>


        <body>
            <div id="topbar">
                <div id="logotopbar"></div>

                <div id="menutopbar">

                    <ul>
                        <a href="indexLogeado.php"><li id="inicio" ></li></a>
                        <a href="PerfilUsuario.php"><li id="perfil"></li></a>


                        <a href="mensajes.php"> <li id="mensajes"></li></a>
                        <a href="carrito.php"><li id="carrito"></li></a>

                        <a id="nombreCliente"></a>

                    </ul>
                </div>
                
            <div id="menutopbar2">
                <ul>

                    <a href="javascript:salir()"><li id="salir"></li></a>
                </ul>
            </div>


              <div id="buscador">
                <img onclick="buscar()" src="imagenes/imagenesStatic/imgBusc.png">
                <form id="searchForm">
                    <input name="Nombre" type="text">
                </form>
              </div>
            </div>



            <div id="carroRightbar">
                <div class="carrito"><img src="imagenes/imagenesStatic/carro.png"><p id="cantidad">0</p></div>

                <div id="precioTotal">  <p> Total: 0&euro;</p> </div>
                <div id="listaCarro">



                    <!---------productos comprados-->






                    <!--------- fin productos comprados-->
                </div>
            </div>

            <div id="cabecera">

                <div id="logo"><img src="imagenes/logo2.png"></div>
                <div id="sublogo"><h1><img src="imagenes/subLogo.png"></h1></div>

            </div>


            <div id="menu">


            </div>

            <div id="contenido">

                <!-- descripcion producto -->
                <div class="modal fade" id="myModalDescripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div id="modalDesc" class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-body">
                                <div id="descrip">
                                    <!--TODA LA DESCRIPCION DEL PRODUCTO-->
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- fin modal 2----------------------->



                <div id="contenidoTop">
                    <div id="MPrincipal">

                    </div>


                    <div >
                        <center><h1> The best products </h1></center>

                        <div class="productoB"  onclick="">
                            <p id="precioB">2999.99&euro;</p>
                            <a href="#"><img src="imagenes/imagenesProductos/art6.jpg"></a>

                            <div id="descripcionB">
                                <p>This is other example from webpage...</p>
                            </div>
                            <div class="carritoB"><img src="imagenes/imagenesStatic/carro.png"></div>
                        </div>
                        <div class="productoB"  onclick="">
                            <p id="precioB">249.99&euro;</p>
                            <a href="#"><img src="imagenes/imagenesProductos/art7.jpg"></a>

                            <div id="descripcionB">
                                <p>This is other example from webpage...</p>

                            </div><div class="carritoB"><img src="imagenes/imagenesStatic/carro.png"></div>
                        </div>

                        <div class="productoB"  onclick="">
                            <p id="precioB">2499&euro;</p>
                            <a href="#"><img src="imagenes/imagenesProductos/art2.jpg"></a>

                            <div id="descripcionB">
                                <p>This is other example from webpage...</p>

                            </div><div class="carritoB"><img src="imagenes/imagenesStatic/carro.png"></div>
                        </div>

                    </div>


                    <div id="listaProductoNuevo">
                        <div id="productoTitulo">


                            <p>Order:<select class="form-control">
                                    <option>Searched</option>
                                    <option>Favorites</option>
                                    <option>Solds</option>
                                </select></p>
                            <p>
                                Prize:<select class="form-control">
                                    <option>Highest</option>
                                    <option>Lowest</option>
                                </select>
                            </p>

                        </div>


                        <div id="listaProducto"><!-- caja donde se cargan los artículos -->




                        </div><!-- fin de la caja donde se cargan los artículos -->


<!--                        <a href="#"><img class="anteriorLista" src="imagenes/Gakuseisean-Ivista-Arrow-Right.ico" height="40" width="40"></a>
                        <a href="#"><img class="siguienteLista" src="imagenes/Gakuseisean-Ivista-Arrow-Right.ico" height="40" width="40"></a>-->

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
    echo("acceso denegado");
};
?>