<?php

include("sesion/conexion.php");

//consulta para llenar la tabla de areas de conocimiento
$result = mysqli_query($conn, "select * from areaconocimiento");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->

    <title>Areas</title>
</head>
<?php require 'header.php'; ?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="contenido">

    <!--Boton para crear una nueva area-->
    <!--<button class="btn btn-success registro-nuevo" type="button" name="button" onclick="swap();">Nueva Area</button>-->
    <!-- Boton flotante para agregar un nuevo objeto -->
    <div class="fixed-action-btn">
        <a name="button" onclick="swap();" class="btn-floating btn-large tooltipped registro-nuevo" data-position="left"
           data-delay="50" data-tooltip="Nueva Area">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <div id="lista">

        <h1 align="center">Listado de Areas</h1>

        <div class="container" id="Tabla">
            <div class="input-group barra-busqueda col-xs-6">
                <!--Llamamos la funcion para realizar la busqueda de los usuario que se encuentran en la tabla-->
                <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa lo  que deseas Buscar...">
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">

                    <!--Encabezados de la tabla de area de conocimiento-->
                    <table id="listaD" class="table table-bordered text-center table-striped tablesorter" border="1">
                        <thead>
                        <tr class="cabecera">
                            <th>Accion</th>
                            <th>ID Area</th>
                            <th>Nombre del Area</th>

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


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input style='display:none;' class="hidden" name="id_area" value="" id="id_area"/>

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

    <!--Formulario para registrar areas, al inicio esta oculto hasta que se presiona el boton de registro y
    se oculta la tabla general de consultas-->
    <div style='display:none;' class="hidden" id="registro">
        <div class="row">
            <div align="center">
                <h1 id="titulo_form">Registro de Area</h1>
            </div>
        </div>
        <br><br>
        <!--Se llama la funcion para insertar una nueva area de conocimiento desde la carpeta de Accion-->
        <form id="formulario" action="Accion/insertarArea.php" method="post" role="form" class="form-vertical"
              accept-charset="utf8">

            <input style='display:none;' id="idarea" name="idarea" class="hidden" value="">
            <div class="container">
                <div class="panel panel-body">
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <!--Se crean el label e input para llenar el formulario para el nomnbre del Area-->
                            <label>Nombre del Area</label>
                            <input id="area" type="text" class="form-control" name="area" placeholder="POO" required/>
                        </div>
                    </div>


                </div>
                <!--boton para cancelar el registro de la area-->
                <div class="botones-accion">
                    <a href="AreasConocimiento.php" class="btn btn-primary">Regresar a la Lista</a>
                    <input type="submit" class="btn btn-success pull-right" id="enviar" value="Registrar"/>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Bootstrap Core -->
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core -->

<!-- Paginador y Ordenador -->
<script type="text/javascript" src="js/tablesorter-master/js/jquery.tablesorter.js"></script>
<script src="js/tablesorter-master/addons/pager/jquery.tablesorter.pager.js" type="text/javascript"></script>
<script type="text/javascript" src="js/sortpag.js"></script>
<!-- Paginador y Ordenador -->

<script src="js/Area.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
</body>
</html>
