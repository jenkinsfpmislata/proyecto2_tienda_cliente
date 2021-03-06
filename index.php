<?php
session_start();
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
        <!-- <link href="css/description.css" rel="stylesheet" type="text/css" /> -->
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
                $(".box_skitter_large").css({width: 820, height: 298}).skitter({numbers: false});
            });

//-----------------categorias-----------------
            function productoCategoria(categoria) {

                window.location = "products.php?categoria=" + categoria;
            }
            ;

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
//---------------------------------fin categorias

            $(document).ready(function() {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/productos.php',
                    success: function(data) {
                        var datos = '<table>';

                        $.each(data, function(index) {


                            if (index < 15) {

                                datos += '<div class="producto"><p id="precio">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div><a  ><div class="carrito" onclick="descripcion(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalDescripcion"><img src="imagenes/imagenesStatic/carro.png"></div></a></div>';
                                datos += '</table>';
                            }

                        });
                        $('#listaProducto').html(datos);
                    }
                });
            });


            function validar() {
                datosInicioSesion = $('#inicioForm').serialize();


                $.ajax({
                    url: 'phps/validacion.php',
                    type: 'POST',
                    data: datosInicioSesion,
                    success: function(url) {

                        window.location = url;
                    }
                });


            }
            ;
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

                        datos = datos + '<div class="producto"><div class="cerrar" onclick=""><span class="glyphicon glyphicon-remove"></span></div><p id="precioLista">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div></div>';
                        precioProducto = parseFloat(data[index].precio);
                        precioTotal = Math.round((precioTotal + precioProducto) * 100) / 100;
                        precio = '<p>Total: ' + precioTotal + ' &euro; </p>';
                        cantidad = cantidad + 1;
                        cantidadTotal = cantidad;
                        $('#listaCarro').html(datos);
                        $('#precioTotal').html(precio);
                        $('#cantidad').html(cantidadTotal);

                        addproducto(data[index].Nombre, data[index].precio, data[index].Imagen, id);

                    }
                });
            }
            ;



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
//-----------
            function pedido(idPedido) {
                this.idPedido = idPedido;
                this.total = 0;
                this.listaproductos = [];
            }

            pedido.prototype.nuevo = function(producto) {
                this.listaproductos[this.listaproductos.length] = producto;
                carrito = JSON.stringify(mipedido);


                $.ajax({
                    url: 'phps/listaPedido.php',
                    type: 'POST',
                    data: 'pedido=' + carrito,
                    success: function() {


                    }
                });



            }


            function producto(nombreProducto, precio, imagen, idProducto) {
                this.nombreProducto = nombreProducto;
                this.precio = precio;
                this.imagen = imagen;
                this.idProducto = idProducto;
                this.stock = 1;
            }
            producto.prototype.mostrar = function() {
                alert("nombreProducto: " + this.nombreProducto + " precio: " + this.precio + " imagen: " + this.imagen + " stock: " + this.stock)
            }
//            producto.prototype.comprar = function() {
//                this.stock++
//            }
//            producto.prototype.vender = function() {
//                this.stock--
//            }


            function addproducto(addNombre, addPrecio, addImagen, addIdProducto) {
                nombreProducto = addNombre;
                precio = addPrecio;
                imagen = addImagen;
                idProducto = addIdProducto;
                miproducto = new producto(nombreProducto, precio, imagen, idProducto);
                mipedido.nuevo(miproducto);




            }
            function verproducto() {
                miproducto.mostrar();
            }

            function venderproducto() {
                miproducto.vender();
            }

            function comprarproducto() {
                miproducto.comprar();
            }

            pedido.prototype.totalproductos = function() {
                alert(this.listaproductos.length);
            }

            function verproductos() {
                mipedido.verproductos();
            }

            pedido.prototype.verproductos = function() {
                productos = "Productos:";
                for (i = 0; i < this.listaproductos.length; i++) {
                    nombreProducto = this.listaproductos[i].nombreProducto;
                    precio = this.listaproductos[i].precio;
                    imagen = this.listaproductos[i].imagen;
                    stock = this.listaproductos[i].stock;
                    idProducto = this.listaproductos[i].idProducto;
                    productos += "\n Nombre Producto: " + nombreProducto + ", precio: " + precio + ", Imagen: " + imagen + ", idPRod: " + idProducto;
                }

                alert(productos);
            }


            $(document).ready(function() {
                mipedido = new pedido("DAW");
            });
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------	
            function noPuedesComprar() {
                alert("Debes estar registrado para poder comprar")
            }

        </script>
    </head>

    <body>
        <div id="topbar">
            <div id="logotopbar"></div>
            <div id="menutopbar">
                <ul>
                    <li id="inicio"></li>
                    <li id="perfil">
                        <form id="inicioForm" role="form"  >
                            <div class="form-group" id="inicioSesion">
                                <strong>Login</strong>
                                <p>Nick</p>
                                <input class="form-control" name="nick">
                                <p>Password</p>
                                <input class="form-control" type="password" name="pass">
                                <!--<button class="btn btn-success" onclick="validar()">login</button>-->
                                <a class="btn btn-success" href="javascript:validar()">login</a>

                                <button  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Account
                                </button>

                            </li></form></ul>
            </div>

            <div id="buscador">

                <img onclick="buscar()" src="imagenes/imagenesStatic/imgBusc.png">
                <form id="searchForm">
                    <input name="Nombre" type="text">
                </form>

            </div>
        </div>

        <div id="contenedor">




            <div id="carroRightbar">
                <div class="carrito"><img src="imagenes/imagenesStatic/carro.png"><div id="cantidad">0</div></div>

                <div id="precioTotal">  <p> Total: 0&euro;</p> </div>

                <div id="listaCarro">



                    <!---------productos comprados-->

                </div>
                <div id="indexComprar">  <button class="btn btn-success" onclick="noPuedesComprar()"> COMPRAR</button> </div>
            </div>
            <!--------- fin productos comprados-->
            <div id="cabecera">

                <div id="logo"><img src="imagenes/logo2.png"></div>
                <div id="sublogo"><h1><img src="imagenes/subLogo.png"></h1></div>

            </div>


            <div id="menu">


            </div>

            <div id="contenido">





                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Login</h4>
                            </div>
                            <div class="modal-body">


                                <div class="form-group" id="registro" >
                                    <form  class="form-horizontal" action="phps/insert.php" method="post">
                                        Name<input class="form-control" name="nombre"></input>
                                        Nick<input class="form-control" name="nick"></input>
                                        E-mail<input type="email" class="form-control" name="email"></input>
                                        Password<input class="form-control"  type="password" name="pass"></input>
                                        Repeat Password<input class="form-control" type="password" name="repPass"></input>
                                        
                                </div>
                                <input type="submit" class="btn btn-success" value="Login"></input>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



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


                <!--fin modal2-->


                <div id="contenidoTopIndex">
                    <div id="MPrincipal">

                    </div>


                    <div id="carrusel">
                        <div class="box_skitter box_skitter_large">
                            <ul>
                                <li>
                                    <a href="#"><img src="imagenes/slider/Slider1.jpg"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="imagenes/slider/Slider2.jpg"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="imagenes/slider/Slider3.jpg"></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div id="productoTitulo">
                    <p>Order:<select class="form-control">
                            <option>Searched</option>
                            <option>Favorites</option>
                            <option>Solds</option>
                        </select>
                    </p>
                </div>

                <div id="listaProducto">





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

        </div>

    </body>
</html>
