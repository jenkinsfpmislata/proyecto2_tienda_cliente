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
        <link href="css/admin.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="css/skitter.styles.css" media="all" rel="stylesheet" />

        <script type="text/javascript" language="javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

        <script type="text/javascript" language="javascript">


            


            $(document).ready(function() {
            
            $.ajax({
                dataType: 'json',
                url: 'phps/clienteAdmin.php',
                success: function(data) {
				 var datos = '<tr>';
                   $.each(data, function(index) {
					datos += '<td>'+ data[index].idCliente + '<td>'+ data[index].nombreCliente +'<td>'+data[index].Nombre+'<br>'+ data[index].Descripcion +'</p></div><a  ><div class="carrito" onclick="descripcion('+data[index].idProducto+')" data-toggle="modal" data-target="#myModalDescripcion"><img src="imagenes/imagenesStatic/carro.png"></div></a></div>';
                    datos += '</tr>';
				   });
                    $('#listaProducto').html(datos);
                }
            });
        });

        </script>
    </head>
    <body>
        <div id="topbar">
            <div id="logotopbar"></div>
            <div id="menutopbar">
                <ul>
                    <li id="inicio"></li>
                    <li id="perfil">
                </ul>
            </div>
        </div>
        <div id="cabecera">
            <div id="logo"><img src="imagenes/logo2.png"></div>
            <div id="sublogo"><h1><img src="imagenes/subLogo.png"></h1></div>
        </div>
        <div id="menu">


        </div>

        <div id="contenido">

            <div id="contenedor">
                <div id="colTitulo">
                    <h3>Admin panel</h3>
                </div>
                <div class="clear"></div>
                <div id="colIzquierda">
                    <ul>
                        <a href="#" class="btn btn-success"><li>Clients</li></a>
                        <a href="#" class="btn btn-success"><li>Articles</li></a>
                        <a href="#" class="btn btn-success"><li>Categories</li></a>
                    </ul>
                </div>
                <div id="colDerecha">
                    <h4>Administer clients</h4>
                    <div id="addSearch">
                        <div id="search" class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default""><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                        <div id="add">
                            <a class="btn btn-success btn-sm" href="#"><span class="glyphicon glyphicon-plus"></span> Add</a> 
                        </div>
                    </div>
                    <div id="contieneTabla">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td><td>Name</td><td>Nick</td><td>@</td><td>Password</td><td>Role</td><td>Edit</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jaime Lopez</td>
                                    <td>JaiLo</td>
                                    <td>Jaime_Lo@gmail.com</td>
                                    <td>123456</td>
                                    <td>User</td>
                                    <td>
                                        <a class="btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            </tbody>
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
