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
                    url: 'phps/admin/productoAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>#</td><td>Name</td><td>Description</td><td>Image</td><td>Searched<td>Sold</td><td>Fav.</td><td>Brand</td><td>Price</td><td>Edit</td></tr>';
                        $.each(data, function(index) {
                            datos += '<tr>';
                            datos += '<td>' + data[index].idProducto + '<td>' + data[index].Nombre + '<td>' + data[index].Descripcion + '<td>' + data[index].Imagen + '<td>' + data[index].vecesBuscado + '<td>' + data[index].vecesVendido + '<td>' + data[index].vecesFavorito + '<td>' + data[index].marca + '<td>' + data[index].precio + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteProducto(' + data[index].idProducto + ')"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            });




            function refrescar() {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/productoAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>#</td><td>Name</td><td>Description</td><td>Image</td><td>Searched<td>Sold</td><td>Fav.</td><td>manufacturer</td><td>price</td></tr>';
                        $.each(data, function(index) {
                            datos += '<tr>';
                            datos += '<td>' + data[index].idProducto + '<td>' + data[index].Nombre + '<td>' + data[index].Descripcion + '<td>' + data[index].Imagen + '<td>' + data[index].vecesBuscado + '<td>' + data[index].vecesVendido + '<td>' + data[index].vecesFavorito + '<td>' + data[index].marca + '<td>' + data[index].precio + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate(' + data[index].idProducto + ')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteProducto(' + data[index].idProducto + ')"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            }
            ;


            function deleteProducto(id) {
                $.ajax({
                    type: 'GET',
                    url: 'phps/admin/deleteIdProducto.php?id=' + id,
                    success: function() {
                        alert("Registro " + id + " Borrado");
                        refrescar();
                    }


                });
            }
            ;

            function insertar() {
                insertar = $('#insertarProducto').serialize();

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/insertProducto.php',
                    type: 'POST',
                    data: insertar,
                    success: function(data) {
                        alert("Producto Insertado");
                        refrescar();

                    }
                });


            }
            ;
            function prepareUpdate(id) {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/selectProducto.php?id=' + id,
                    type: 'GET',
                    success: function(data) {

                        index = 0;
                        datos = '<form id="updatar" class="form-horizontal"  ><input id="oculto" class="form-control" name="idProducto" value="' + data[index].idProducto + '"></input>Name<input class="form-control" name="Nombre" value="' + data[index].Nombre + '"  ></input>Description<input class="form-control" name="Descripcion" value="' + data[index].Descripcion + '"></input>Image<input class="form-control" name="Imagen" value="' + data[index].Imagen + '"></input>Searched<input class="form-control"  name="vecesBuscado" value="' + data[index].vecesBuscado + '">Sold<input class="form-control" name="vecesVendido" value="' + data[index].vecesVendido + '"  ></input>Fav.<input class="form-control" name="vecesFavorito" value="' + data[index].vecesFavorito + '"  ></input>Brand<input class="form-control" name="marca" value="' + data[index].marca + '"  ></input>Price<input class="form-control" name="precio" value="' + data[index].precio + '"  ></input></input></div><a class="btn btn-success" href="javascript:update()">Update</a>   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></form>'
                        $('#updateDiv').html(datos);

                    }


                });


            }
            ;

            function update() {

                updatar = $('#updatar').serialize();

                $.ajax({
                    url: 'phps/admin/updateProducto.php',
                    type: 'POST',
                    data: updatar,
                    success: function() {
                        alert("Registro " + id + " updated");
                        refrescar();

                    }
                });

            }
            ;


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
                        <a href="#" class="btn btn-success"><li>Products</li></a>
                        <a href="#" class="btn btn-success"><li>Categories</li></a>
                    </ul>
                </div>
                <div id="colDerecha">
                    <h4>Administering products</h4>
                    <div id="addSearch">
                        <div id="search" class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default""><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                        <div id="add">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" href="#"><span class="glyphicon glyphicon-plus"></span> Add</a> 
                        </div>
                    </div>
                    <div id="contieneTabla">
                        <table class="table" id="tabla">
                            <thead>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div id="modalDesc" class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        <div id="descrip">
                            <div class="form-group"  >
                                <form id="insertarProducto" class="form-horizontal" >
                                    
                                    Nombre<input class="form-control" name="Nombre"></input>
                                    Descripcion<input class="form-control" name="Descripcion"></input>
                                    Imagen<input class="form-control"  name="Imagen"></input>
                                    
                                    
                                    
                                    marca<input class="form-control" name="marca"></input>
                                    precio<input class="form-control" name="precio"></input>
                            </div>
                            <a class="btn btn-success" href="javascript:insertar()"  >Insert</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div id="modalDesc" class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        <div id="updateDiv">
                            <!--TODA LA DESCRIPCION DEL PRODUCTO-->
                        </div>

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
