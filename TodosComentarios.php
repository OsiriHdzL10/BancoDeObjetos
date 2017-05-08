<?php require 'header.php'; ?>
<?php
include("sesion/conexion.php");
$matricula = $_SESSION['matricula'];

$result = mysqli_query($conn, "SELECT * from comentario  inner join objetoaprendizaje  on objetoaprendizaje.IDObjeto=comentario.IDObjeto where MatriculaUsuario= '$matricula' ");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->
    <title>Areas</title>
</head>

<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="contenido">


    <div id="lista">

        <h1 align="center">Listado de Comentarios </h1>

        <div class="container" id="Tabla">
            <div class="input-group barra-busqueda col-xs-6">
                <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa lo  que deseas Buscar...">
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">


                    <table id="listaD" class="table table-bordered text-center table-striped tablesorter" border="1">
                        <thead>
                        <tr class="cabecera">
                            <th>Nombre</th>
                            <th>Comentario</th>
                            <th>Nombre del Objeto</th>

                        </tr>
                        </thead>
                        <tbody class="buscar">
                        <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $extraido = mysqli_fetch_array($result, MYSQLI_NUM);
                            ?>
                            <tr>

                                <td><?php echo $extraido[2] ?></td>

                                <td><?php echo $extraido[1] ?></td>


                                <td>
                                    <?php

                                    $idob = $extraido[3];
                                    include("sesion/conexion.php");
                                    $result2 = mysqli_query($conn, "select NombreObjeto from  objetoaprendizaje where IDObjeto=$idob");
                                    $extraido2 = mysqli_fetch_array($result2, MYSQLI_NUM);
                                    ?>

                                    <?php echo $extraido2[0] ?></td>


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input style='display:none;' class="hidden" name="id_area" value="" id="id_area"/>

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


</body>
</html>
