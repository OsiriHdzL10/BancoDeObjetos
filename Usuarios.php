<?php

include("sesion/conexion.php");


//consulta para llenar la tabla de usuarios
$result = mysqli_query($conn, "select * from usuario");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->

    <title>Usuarios</title>
    <style type="text/css">

        * {
            margin: 0px;
            padding: 0px;
        }


    </style>
</head>
<?php require 'header.php'; ?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="contenido">
    <!--Boton para crear un nuevo usuario-->
    <!--<button class="btn btn-success registro-nuevo" type="button" name="button" onclick="swap();">Nuevo Usuario</button>-->
    <div class="fixed-action-btn">
        <a name="button" onclick="swap();" class="btn-floating btn-large tooltipped" data-position="left"
           data-delay="50" data-tooltip="Nuevo Usuario">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <div id="lista">

        <h1 align="center">Listado de Usuarios</h1>

        <div class="container" id="Tabla">
            <div class="input-group barra-busqueda col-xs-6">
                <!--Llamamos la funcion para realizar la busqueda de los usuarios que se encuentran en la tabla-->
                <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa lo  que deseas Buscar...">
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">

                    <!--Encabezados de la tabla de usuarios-->

                    <table id="listaD" class="table table-bordered text-center table-striped tablesorter" border="1">
                        <thead>
                        <tr class="cabecera">
                            <th>Accion</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Ap Paterno</th>
                            <th>Ap Materno</th>
                            <th>Departamento</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Tipo</th>
                        </tr>
                        </thead>
                        <tbody class="buscar">

                        <!--Llenamos la tabla de usuarios medianta la consulta de la parte superior del documento-->
                        <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $extraido = mysqli_fetch_array($result, MYSQLI_NUM);
                            ?>
                            <tr>
                                <td>
                                    <!--Botones que llaman las funciones respectivas de modificar y eliminar-->
                                    <button type="button" name="button" onclick="modificar(this)" class="btn-floating">
                                        <i class="small material-icons">mode_edit</i></button>
                                    <br>
                                    <button type="button" name="button" onclick="eliminar(this)" class="btn-floating"><i
                                                class="small material-icons">delete</i></button>
                                </td>
                                <!--Extraemos el resultado de nuestra consulta-->
                                <td style='display:none;' class="hidden"><?php echo $extraido[0] ?></td>
                                <td><?php echo $extraido[0] ?></td>
                                <td><?php echo $extraido[1] ?></td>

                                <td><?php echo $extraido[3] ?></td>
                                <td><?php echo $extraido[4] ?></td>
                                <td><?php echo $extraido[5] ?></td>
                                <td><?php echo $extraido[6] ?></td>
                                <td><?php echo $extraido[7] ?></td>
                                <td><?php echo $extraido[8] ?></td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input style='display:none;' name="id_usuario" value="" id="id_usuario"/>

                </div>
            </div>

            <!--Poder pasar de pagina en la tabla y uso de los iconos-->
            <div class="" id="paginador">
                <img src="js/tablesorter-master/addons/pager/icons/first.png" class="first">
                <img src="js/tablesorter-master/addons/pager/icons/prev.png" class="prev">
                <input class="pagedisplay" type="text">
                <img src="js/tablesorter-master/addons/pager/icons/next.png" class="next">
                <img src="js/tablesorter-master/addons/pager/icons/last.png" class="last">
                <select class="pagesize" id="opcionPag" autocomplete="off">
                    <option value="5">5</option>
                    <option value="50">50</option>
                    <option value="9999">Todo</option>
                </select>
            </div>

        </div>
    </div>

    <div style='display:none;' class="hidden" id="registro">
        <div class="row">
            <div align="center">

                <!--Formulario para registrar usuarios, al inicio esta oculto hasta que se presiona el boton de registro y se oculta la tabla general de consultas-->

                <h1 id="titulo_form">Registro de Servicio</h1>
            </div>
        </div>
        <br><br>
        <!--Se llama la funcion para insertar un nuevo usuario desde la carpeta de Accion-->
        <form id="formulario" action="Accion/insertarusuario.php" method="post" role="form" class="form-vertical"
              accept-charset="utf8">
            <input id="idusuario" name="idusuario" class="hidden" value="" style='display:none;'>

            <div class="container">
                <div class="panel panel-body">
                    <div class="col-xs-12 col-sm-4">

                        <!--Se crean los label e input para llenar el formulario con cada campo de la tabla-->
                        <div class="form-group">
                            <label>Matricula</label>
                            <input id="matricula" type="text" class="form-control" name="matricula"
                                   placeholder="8966523" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Jose"
                                   required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Ap Paterno</label>
                            <input id="apaterno" type="text" class="form-control" name="apaterno" placeholder="Tapia"
                                   required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Ap Materno</label>
                            <input id="amaterno" type="text" class="form-control" name="amaterno" placeholder="Perez"
                                   required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input id="contrasena" type="text" class="form-control" name="contrasena"
                                   placeholder="micumple" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Departamento</label>
                            <input id="departamento" type="text" class="form-control" name="departamento"
                                   placeholder="Sistemas" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="Monto">Telefono</label>
                            <input id="telefono" type="text" class="form-control" name="telefono"
                                   placeholder="446698563" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input id="mail" type="text" class="form-control" name="mail" placeholder="hola_s@gmail.com"
                                   required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="tipo">Tipo Usuario</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="1">Administrador</option>
                                <option value="2">Profesor</option>

                            </select>
                        </div>
                    </div>

                </div>
                <div class="botones-accion">
                    <!--boton para cancelar el registro del usuario-->
                    <a href="Usuarios.php" class="btn btn-primary">Regresar a la Lista</a>
                    <input type="submit" class="btn btn-success pull-right" id="enviar" value="Registrar"/>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Bootstrap Core -->
<!--  <script src="js/jquery.js" type="text/javascript"></script> -->
<!--  <script src="js/bootstrap.min.js"></script> -->
<!-- /Bootstrap Core -->

<!-- Paginador y Ordenador -->
<script type="text/javascript" src="js/tablesorter-master/js/jquery.tablesorter.js"></script>
<script src="js/tablesorter-master/addons/pager/jquery.tablesorter.pager.js" type="text/javascript"></script>
<script type="text/javascript" src="js/sortpag.js"></script>
<!-- Paginador y Ordenador -->

<script src="js/Usuario.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
</body>
</html>
