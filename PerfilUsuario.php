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
            <link href="css/perfil.css" rel="stylesheet" type="text/css" />


            <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />
            <script type="text/javascript" language="javascript" src="js/jquery-1.6.3.min.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
            <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

            <script type="text/javascript" language="javascript">


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




                $(document).ready(function() {

                    id = "<?php echo $_SESSION["idCliente"]; ?>";
                    $.ajax({
                        dataType: 'json',
                        url: 'phps/admin/selectClient.php?id=' + id,
                        type: 'GET',
                        success: function(data) {
                            index = 0;
                            datos = '<img id = "imagenPerfil" src = "imagenes/perfil/' + data[index].imagen + '"><p class = "perfilConstante"> Name: </p> <p class = "perfilVariable">' + data[index].nombreCliente + '<img class="perfilIcon" src = "imagenes/icons/ojo.png"></p><p class = "perfilConstante" >Nick:</p><p class = "perfilVariable">' + data[index].nick + '</p><p class = "perfilConstante" > E - mail: </p><p class = "perfilVariable">' + data[index].email + '<img class = "perfilIcon" src = "imagenes/icons/ojo.png"> </p><p class = "perfilConstante" id = "descripcion"> Description: </p><input class = "form-control"> </input>';

                            $('#perfilContenido').html(datos);

                        }
                    });
                });




                function productoCategoria(categoria) {
                    window.location = "productsLogeado.php?categoria=" + categoria;
                }

    //-----------------------------------------------------
                function salir() {
                    $.ajax({
                        url: 'phps/salir.php',
                        success: function() {

                            window.location = "index.php";
                        }
                    });
                }

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

                        <a href="javascript:salir()"><li id="salir"></li></a>
                    </ul>
                </div>
            </div>

            <div id="buscador">

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
                        <div id="perfilContenedor">
                            <div id="perfilNavegador">
                                <a href="#" class="activoP">Profile</a><a href="mensajes.php">Messages</a>

                            </div>

                            <div id="perfilContenido">


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

            </div>
        </body>
    </html>
    <?php
} else {
    echo("acceso denegado");
};
?>