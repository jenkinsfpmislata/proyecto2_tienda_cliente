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
                    url: 'phps/mensajes.php?idCliente='+id,
                    type: 'GET',
                    success: function(data) {
                        
                    $.each(data, function(index) {
                  
                         datos = '<div class="mensaje2"><table class="table"><tr><td></p>'+   data[index].nick  +'</p></td><td > <a class="collapsed" href="#demo'+ + data[index].idMensaje  + '"data-toggle="collapse"><div class="elipsis">' + + data[index].mensaje  + '</div></a></td><td>' +  data[index].fecha  + '</td></tr></table><tr><div id="demo' + data[index].idMensaje + '" class="panel-collapse collapse"><p>'+ data[index].mensaje  +'</p></div></tr></div>';

                        $('#tablaMensajes').html(datos);  
                    });
                    }
                    });
           } );

            function productoCategoria(categoria) {
                window.location = "products.php?categoria=" + categoria;
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

                </div>


                <div id="perfilContenedor">
                    <div id="perfilNavegador">
                        <a href="PerfilUsuario.php" >Profile</a><a href="#" class="activoP">Messages</a>

                    </div>

                    <div id="tablaMensajes">
                        
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
    echo("acceso denegado");
};
?>