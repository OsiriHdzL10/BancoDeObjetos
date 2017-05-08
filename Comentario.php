<?php

include("sesion/conexion.php");
$idObj = $_GET['idobj'];
//consulta para llenar la tabla de las areas de conocimiento
$result = mysqli_query($conn, "select * from comentario where IDObjeto=$idObj");
$resultado2 = mysqli_query($conn, "select NombreObjeto from  objetoaprendizaje where IDObjeto=$idObj");
$extraido2 = mysqli_fetch_array($resultado2, MYSQLI_NUM);
$Name = $extraido2[0];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->
    <title>Areas</title>
</head>
<?php require 'header.php'; ?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="container">



        <h2 align="center">Listado de Comentarios del objeto "<?php echo $Name ?>"</h2>

        <div id="Tabla">
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
