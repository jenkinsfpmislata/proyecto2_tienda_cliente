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
                    url: 'phps/admin/clienteAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>#</td><td>Name</td><td>Nick</td><td>@</td><td>Image<td>Password</td><td>Role</td><td>Edit</td></tr>';
                        $.each(data, function(index) {
                            datos += '<tr>';
                            datos += '<td>' + data[index].idCliente + '<td>' + data[index].nombreCliente + '<td>' + data[index].nick + '<td>' + data[index].email + '<td>' + data[index].imagen + '<td>' + data[index].contrasenya + '<td>' + data[index].rol + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate(' + data[index].idCliente + ')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteCliente(' + data[index].idCliente + ')"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            });




            function refrescar() {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/clienteAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>#</td><td>Name</td><td>Nick</td><td>@</td><td>Imagen<td>Password</td><td>Role</td><td>Edit</td></tr>';
                        $.each(data, function(index) {
                            datos += '<tr>';
                            datos += '<td>' + data[index].idCliente + '<td>' + data[index].nombreCliente + '<td>' + data[index].nick + '<td>' + data[index].email + '<td>' + data[index].imagen + '<td>' + data[index].contrasenya + '<td>' + data[index].rol + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate(' + data[index].idCliente + ')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteCliente(' + data[index].idCliente + ')"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            }
            ;


            function deleteCliente(id) {
                $.ajax({
                    type: 'GET',
                    url: 'phps/admin/deleteIdCliente.php?id=' + id,
                    success: function() {
                        alert("Registro " + id + " Borrado");
                        refrescar();
                    }


                });
                
            }
            ;

            function insertar() {
                insertar = $('#insertarCliente').serialize();

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/insertCliente.php',
                    type: 'POST',
                    data: insertar,
                    success: function() {

                        alert("Cliente Insertado");
                        refrescar();

                    }
                });
                


            }
            ;
            function prepareUpdate(id) {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/selectClient.php?id=' + id,
                    type: 'GET',
                    success: function(data) {

                        index = 0;
                        datos = '<form id="updatar" class="form-horizontal"  ><input id="oculto" class="form-control" name="id" value="' + data[index].idCliente + '"></input>Name<input class="form-control" name="nombre" value="' + data[index].nombreCliente + '"  ></input>Nick<input class="form-control" name="nick" value="' + data[index].nick + '"></input>E-mail<input class="form-control" name="email" value="' + data[index].email + '"></input>Password<input class="form-control"  type="password" name="pass" value="' + data[index].contrasenya + '"></input>Client kind<select class="form-control"><option>Admin</option><option>User</option></select></div><a class="btn btn-success" href="javascript:update()">Update</a>   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></form>'
                        $('#updateDiv').html(datos);

                    }


                });


            }
            ;

            function update() {

                updatar = $('#updatar').serialize();

                $.ajax({
                    url: 'phps/admin/updateClient.php',
                    type: 'POST',
                    data: updatar,
                    success: function() {
                        alert("Registro " + id + " updated");
                        

                    }
                });
                refrescar();

            }
            ;
            function buscar() {
                busc = $('#searchForm').serialize();


                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/buscarCliente.php',
                    type: 'POST',
                    data: busc,
                    success: function(data) {
                        datos = '<tr id="primerTr"> <td>#</td><td>Name</td><td>Nick</td><td>@</td><td>Image<td>Password</td><td>Role</td><td>Edit</td></tr>';

                        $.each(data, function(index) {

                            datos += '<tr>';
                            datos += '<td>' + data[index].idCliente + '<td>' + data[index].nombreCliente + '<td>' + data[index].nick + '<td>' + data[index].email + '<td>' + data[index].imagen + '<td>' + data[index].contrasenya + '<td>' + data[index].rol + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate(' + data[index].idCliente + ')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteCliente(' + data[index].idCliente + ')"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });


            }
            ;
//alert("succes");

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
                        <a href="adminClient.php"  class="btn btn-success"><li>Clients</li></a>
                        <a href="adminProductos.php" class="btn btn-success"><li>Products</li></a>
                        <a href="#" class="btn btn-success"><li>Categories</li></a>
                    </ul>
                </div>
                <div id="colDerecha">
                    <h4>Administering clients</h4>

                    <div id="addSearch">
                        <div id="search" class="input-group input-group-sm">

                            <form id="searchForm">
                                <input type="text" class="form-control" name="nom" placeholder="Search...">
                            </form>

                            <span class="input-group-btn" >
                                <a href="javascript:buscar()"><button action="buscar()" class="btn btn-default" ><span class="glyphicon glyphicon-search"></span></button></a>
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
                                <form id="insertarCliente" class="form-horizontal" >
                                    Name<input class="form-control" name="nombre"></input>
                                    Nick<input class="form-control" name="nick"></input>
                                    E-mail<input class="form-control" name="email"></input>
                                    Password<input class="form-control"  type="password" name="pass"></input>
                                    Repeat Password<input class="form-control" type="password" name="repPass"></input>
                                    Client kind<select class="form-control"><option>Admin</option><option>User</option></select>
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
