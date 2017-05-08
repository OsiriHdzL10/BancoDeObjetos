<?php

include("sesion/conexion.php");


$result = mysqli_query($conn, "select * from areaconocimiento");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, miminum-scale=1, user-scalable=no">
    <meta http-equiv="Content-type" content="text/html">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Areas</title>
</head>
<?php require 'header.php'; ?>
<body>


<div class="contenido">


    <div id="lista">

        <h1 align="center">Listado de Areas</h1>

        <div class="container">
            <div class="input-group barra-busqueda col-xs-6">
                <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa lo  que deseas Buscar...">
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">


                    <table id="listaD" class="table table-bordered text-center table-striped tablesorter">
                        <thead>
                        <tr class="cabecera">
                            <th>Accion</th>
                            <th>ID Area</th>
                            <th>Nommbre del Area</th>

                        </tr>
                        </thead>
                        <tbody class="buscar">
                        <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $extraido = mysqli_fetch_array($result, MYSQLI_NUM);
                            ?>
                            <tr>
                                <td>
                                    <div class="btn btn-info btn-sm">Entrar</div>

                                </td>
                                <td><?php echo $extraido[0] ?></td>
                                <td><?php echo $extraido[1] ?></td>


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input class="hidden" name="idarea" value="" id="idarea"/>

                </div>
            </div>

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

</body>
</html>
