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
                    url: 'phps/admin/categoriaAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>Category</td><td>Edit</td></tr>';
                        $.each(data, function(index) {
						
                            datos += '<tr>';
                            datos +=  '<td>' + data[index].Categoria + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate('+"'"+ data[index].Categoria + "'"+')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteCategoria('+"'"+ data[index].Categoria + "'"+')"><span class="glyphicon glyphicon-remove"></span></a>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            });




            function refrescar() {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/categoriaAdmin.php',
                    success: function(data) {
                        datos = '<tr id="primerTr"><td>Category</td><td>Edit</td></tr>';
                        $.each(data, function(index) {
						
                            datos += '<tr>';
                            datos +=  '<td>' + data[index].Categoria + '<td><div class="btn btn-default btn-sm" onclick="prepareUpdate('+"'"+ data[index].Categoria + "'"+')" data-toggle="modal" data-target="#myModalUpdate"><span class="glyphicon glyphicon-edit"></span></div><a class="btn btn-default btn-sm" href="javascript:deleteCategoria('+"'"+ data[index].Categoria + "'"+')"><span class="glyphicon glyphicon-remove"></span></a>';
                            datos += '</tr>';
                        });
                        $('#tabla').html(datos);
                    }
                });

            };


            function deleteCategoria(categoria) {
			
                $.ajax({
                    type: 'GET',
                    url: 'phps/admin/deleteCategoria.php?categoria=' + categoria,
                    success: function() {
                        alert("Registro " + categoria + " Borrado");
                        refrescar();
                    }


                });
            }
            ;

            function insertar() {
                insertar = $('#insertarCategoria').serialize();

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/insertCategoria.php',
                    type: 'POST',
                    data: insertar,
                    success: function() {
                        alert("Inserted Categorie");
                        refrescar();

                    }
                });
			refrescar();

            }
            ;
            function update() {

                updatar = $('#updatar').serialize();
			
                $.ajax({
                    url: 'phps/admin/updateCategoria.php',
                    type: 'POST',
                    data: updatar,
                    success: function() {
                        alert("Registro " + Categoria + " updated");
                        refrescar();

                    }
                });
                refrescar();
            };
			function prepareUpdate(categoria) {

                $.ajax({
                    dataType: 'json',
                    url: 'phps/admin/selectCategoria.php?categoria=' + categoria,
                    type: 'GET',
                    success: function(data) {

                        index = 0;
                        datos = '<form id="updatar" class="form-horizontal"  ><input id="oculto" class="form-control" name="columna" value="' + categoria + '"></input>Categoria<input class="form-control" name="Categoria" value="' + data[index].Categoria + '"></input><a class="btn btn-success" href="javascript:update()">Update</a>   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></form>'
						
                        $('#updateDiv').html(datos);

                    }


                });


            };


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
                    <a  href="javascript:salir()"><li id="inicio" ></li></a>
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
                        <a href="adminCategoria.php" class="btn btn-success"><li>Categories</li></a>
                    </ul>
                </div>
                <div id="colDerecha">
                    <h4>Administering Categories</h4>

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
                                <form id="insertarCategoria" class="form-horizontal" >
                                    
                                   Categoria<input class="form-control" name="categoria"></input>
                                    
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
                            <!--MODAL DEL UPDATE-->
							
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
 <?php
} else {
    echo("Acceso denegado");
};
?>