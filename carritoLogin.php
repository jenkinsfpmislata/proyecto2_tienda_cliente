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



        <div id="cabecera">

            <div id="logo"><img src="imagenes/logo2.png"></div>
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
                <div id="contieneCarrito">
                    <div id="opcionesCarrito">
                        <ul class="list-inline">
                            <li>Cart</li>
                            <li>Login</li>
                            <li>Purchase</li>
                            <li>Confirm</li>
                        </ul>                 
                    </div>
                    <div id="carritoLogin">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="col-xs-8">Login</td>
                                    <td class="col-xs-4">New User</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="pass" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-lg">Create</a>
                                    </td>                                                              
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>-</td>
                                </tr>
                            </tfoot>
                        </table>

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
