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
            <link href="css/estilo.css" rel="stylesheet" type="text/css" />
            <link href="css/descriptionProducto.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />

            <script type="text/javascript" language="javascript" src="js/jquery-2.0.3.min.js"></script>
            <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>

            <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>

            <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

            <?php
//session_start();

if (isset($_SESSION["pedido"])) {
    
    ?>
<script>

     alert("cualsevol cosa");
 
                    ped = <?php echo $_SESSION["pedido"]; ?>;
                    
                    alert(ped);
                    
                    //objPed = JSON.parse(ped);
                   // alert(objPed);
                    
              
                                </script>
                 <?php
    
} else {
    echo("No funciona");
};
?>
            
            <script type="text/javascript" language="javascript">

                var precioTotal = 0;
                var cantidad = 0;
                var datos = '';

                $(document).ready(function() {
                    $(".box_skitter_large").css({width: 820, height: 298}).skitter({numbers: false});
                });

                //--------------------------------


                $(document).ready(function() {
                    id = "<?php echo $_SESSION["idCliente"]; ?>";
                    
                    $.ajax({
                        dataType: 'json',
                        url: 'phps/admin/selectClient.php?id=' + id,
                        type: 'GET',
                        success: function(data) {

                            index = 0;
                            if (data[index].rol == "admin") {

                                datos = '<a href="adminClient.php"><li id="perfil"></li></a>';
                                $('#adminButton').html(datos);
                            }
                            else {
                            }
                            dato2 = '<a>' + data[index].nombreCliente + '</a>';
                            $('#nombreCliente').html(dato2);

                        }
                    });
                });
                
                
             
                
                
                       
                
                
                
                

                //mostrar productos---------------
                $(document).ready(function() {

                    $.ajax({
                        dataType: 'json',
                        url: 'phps/productos.php',
                        success: function(data) {
                            var datos = '<table>';
                            $.each(data, function(index) {

                                if (index < 15) {

                                    datos += '<div class="producto"  onclick=""><p id="precio">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div><a  ><div class="carrito" onclick="descripcion(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalDescripcion"><img src="imagenes/imagenesStatic/carro.png"></div></a></div>';
                                    datos += '</table>';
                                }
                            });
                            $('#listaProducto').html(datos);
                        }
                    });
                });
                //fin mostrar productos-------------------


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


                function anyadirCarrito(id) {

                    $.ajax({
                        dataType: 'json',
                        url: 'phps/descripcion.php?id=' + id,
                        type: 'GET',
                        success: function(data) {
                            index = 0;

                            datos = datos + '<div class="producto"><p id="precioLista">' + data[index].precio + ' &euro;</p><img id="imgProd" src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"><div id="descripcion"><p>' + data[index].Nombre + '<br>' + data[index].Descripcion + '</p></div></div>';
                            precioProducto = parseFloat(data[index].precio);
                            precioTotal = Math.round((precioTotal + precioProducto) * 100) / 100;
                            precio = '<p>Total: ' + precioTotal + ' &euro; </p>';
                            cantidad = cantidad + 1;
                            cantidadTotal = cantidad;
                            $('#listaCarro').html(datos);
                            $('#precioTotal').html(precio);
                            $('#cantidad').html(cantidadTotal);

                            addproducto(data[index].Nombre, data[index].precio, data[index].Imagen);
                        }
                    });
                }
                ;


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




    //FIN BUSCAR PRODUCTOS------------------
    //------------------------------------------------------------------------------

                function pedido(idPedido) {
                    this.idPedido = idPedido;
                    this.total = 0;
                    this.listaproductos = [];
                }

                pedido.prototype.nuevo = function(producto) {
                    this.listaproductos[this.listaproductos.length] = producto;
                }


                function producto(nombreProducto, precio, imagen) {
                    this.nombreProducto = nombreProducto;
                    this.precio = precio;
                    this.imagen = imagen;
                    this.stock = 1;
                }
                producto.prototype.mostrar = function() {
                    alert("nombreProducto: " + this.nombreProducto + " precio: " + this.precio + " imagen: " + this.imagen + " stock: " + this.stock);
                };
                producto.prototype.comprar = function() {
                    this.stock++;
                };
                producto.prototype.vender = function() {
                    this.stock--;
                };


                function addproducto(addNombre, addPrecio, addImagen) {
                    nombreProducto = addNombre;
                    precio = addPrecio;
                    imagen = addImagen;
                    miproducto = new producto(nombreProducto, precio, imagen);
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
                        productos += "" + mipedido.idPedido + "\n Nombre Producto: " + nombreProducto + ", precio: " + precio + ", Imagen: " + imagen + ", Stock: " + stock;
                        objeto = this.listaproductos[i];
                    }
                    //  mandar_carrito();
                    alert(productos);


                }


                window.onload = function() {
                    var mipedido = new pedido("<?php echo $_SESSION["idCliente"]; ?>");
             
             
             }


                function mandar_carrito() {
                    carrito = JSON.stringify(mipedido);
                    alCarrito(carrito);
                    alert(carrito);

                    //elObjeto=JSON.parse(elJson);  alert(elObjeto.laLista[0].elNombre);

                }
    //------------------------------------------------------------------------------
    //-------
                function alCarrito(carrito) {

                    $.ajax({
                        dataType: 'mipedidojson',
                        url: 'phps/pedido.php',
                        type: 'POST',
                        data: carrito,
                        success: function(data) {
                            index = 0;
                            var datos = '<div id="descripcionProductoNuevo"><h4 class="modeloProducto"><b>' + data[index].marca + ' ' + data[index].Nombre + '</b></h4><div class="productoTienda"><img src="imagenes/imagenesProductos/' + data[index].Imagen + '.jpg"></div><div id="descripcionProducto"><h4><i><b>Description:</b></i></h5><p>' + data[index].Descripcion + '</p></div><div id="caracteristicas"></div><div id="precioProducto">' + data[index].precio + ' &euro;</div><a  href="javascript:anyadirCarrito(' + data[index].idProducto + ')"><div class="btn btn-success" id="anadirCarrito" ><img src="imagenes/imagenesStatic/carro.png"></div></a>                                 </div>';

                            $('#descrip').html(datos);
                        }
                    });
                }
                ;

    //-----------------------------------------------------------------------
    //------------------------------------------------------------------------------	
    
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

                        <a href="index.php"><li id="salir"></li></a>
                        <div id="adminButton"></div>
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
                <div class="carrito"><img src="imagenes/imagenesStatic/carro.png"><div id="cantidad">0</div></div>

                <div id="precioTotal">  <p> Total: 0&euro;</p> </div>

                <div id="listaCarro">



                    <!---------productos comprados-->

                </div>
                <div id="indexComprar">  <button class="btn btn-success"> comprar</button> </div>
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

                                <form  class="form-horizontal">
                                    <div class="form-group" id="registro" >
                                        Name<input class="form-control"></input>
                                        Nick<input class="form-control"></input>
                                        E-mail<input class="form-control"></input>
                                        Password<input class="form-control"  type="password" data-toggle="popover" title="" data-content="And here's some amazing content. It's very engaging. right?" role="button" data-original-title="A Title"></input>
                                        Repeat Password<input class="form-control" type="password"></input>
                                        Client kind<select class="form-control"><option>Admin</option><option>User</option></select>


                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Login</button>
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
                    <input name="verpedido" type="button" onclick=verproductos() value="ver pedido">ver pedido
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
