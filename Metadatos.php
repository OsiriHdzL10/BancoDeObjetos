<?php require 'header.php'; ?>
<?php

include("sesion/conexion.php");
$meta = $_POST['buscar'];

//consulta para llenar la tabla de objeto de aprendizajes

$result = mysqli_query($conn, "SELECT * FROM areaconocimiento INNER JOIN objetoaprendizaje on areaconocimiento.IDArea=objetoaprendizaje.IDArea inner JOIN usuario on objetoaprendizaje.MatriculaUsuario=usuario.Matricula where UPPER (Etiquetas) like UPPER('%$meta%') OR UPPER (usuario.Nombre) LIKE UPPER('%$meta%') OR UPPER(usuario.Matricula) LIKE UPPER('%$meta%') OR (usuario.ApPaterno) LIKE UPPER('%$meta%') OR (usuario.ApMaterno) LIKE UPPER('%$meta%') OR UPPER(areaconocimiento.NombreArea) LIKE UPPER('%$meta%') OR UPPER(objetoaprendizaje.NombreObjeto) LIKE UPPER('%$meta%')");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->

    <title>Busqueda</title>
</head>

<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="contenido">
    <!--Boton para crear un nuevo objeto-->


    <div id="lista">

        <h1 align="center">Listado de Objetos</h1>

        <div class="container" id="Tabla">
            <!--Llamamos la funcion para realizar la busqueda de los objetos que se encuentran en la tabla-->
            <div class="input-group barra-busqueda col-xs-6">
                <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa lo  que deseas Buscar...">
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">

                    <!--Encabezados de la tabla de objetos-->
                    <table id="listaD" class="table table-bordered text-center table-striped tablesorter" border="1">
                        <thead>
                        <tr class="cabecera">
                            <th>Accion</th>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody class="buscar">
                        <!--Llenamos la tabla de los objetos medianta la consulta de la parte superior del documento-->
                        <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $extraido = mysqli_fetch_array($result, MYSQLI_NUM);
                            ?>
                            <tr>
                                <td>
                                    <!--Botones que llaman las funciones respectivas de modificar y eliminar-->


                                    <!--Extraemos el resultado de nuestra consulta-->
                                    <form action="VerObjeto.php" method="post">
                                        <input style='display:none;' name="id" value="<?php echo $extraido[2] ?>"
                                               id="id"/>
                                        <button type="submit" name="button" class="btn-floating tooltipped"
                                                data-position="bottom" data-delay="50" data-tooltip="Ver objeto"><i
                                                    class="small material-icons">visibility</i></button>
                                        <!--<button type="submit" name="button">Ver</button>-->
                                    </form>

                                </td>
                                <td style='display:none;' class="hidden"><?php echo $extraido[0] ?></td>
                                <td><?php echo $extraido[3] ?></td>
                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                    <input style='display:none;' name="id_objeto" value="" id="id_objeto"/>


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

<script src="js/MisObjetos.js" type="text/javascript"></script>

</body>
</html>
