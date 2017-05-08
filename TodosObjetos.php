<?php require 'header.php'; ?>
<?php

include("sesion/conexion.php");
$mail = $_SESSION['email'];
$matri = $_SESSION['matricula'];
//consulta para llenar la tabla de objeto de aprendizajes
$result = mysqli_query($conn, "select * from objetoaprendizaje");
$result1 = mysqli_query($conn, "select * from areaconocimiento");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--<link rel="stylesheet" href="estilo.css">-->

    <title>Usuarios</title>
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
                            <th>Comentarios de este objeto</th>

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
                                    <button type="button" name="button" onclick="modificar(this)" class="btn-floating">
                                        <i class="small material-icons">mode_edit</i></button>
                                    <br>
                                    <button type="button" name="button" onclick="eliminar(this)" class="btn-floating"><i
                                                class="small material-icons">delete</i></button>
                                    <br>
                                    <!--Extraemos el resultado de nuestra consulta-->
                                    <form action="VerObjeto.php" method="post">
                                        <input style='display:none;' name="id" value="<?php echo $extraido[0] ?>"
                                               id="id"/>
                                        <button type="submit" name="button" class="btn-floating tooltipped"
                                                data-position="bottom" data-delay="50" data-tooltip="Ver objeto"><i
                                                    class="small material-icons">visibility</i></button>
                                        <!--<button type="submit" name="button">Ver</button>-->
                                    </form>

                                </td>
                                <td style='display:none;' class="hidden"><?php echo $extraido[0] ?></td>
                                <td style='display:none;'><?php echo $extraido[4] ?></td>
                                <td style='display:none;'><?php echo $extraido[5] ?></td>

                                <td><?php echo $extraido[1] ?></td>
                                <td style='display:none;'><?php echo $extraido[6] ?></td>
                                <td>
                                    <!--<form action="Comentario.php?idobj=<?php echo $extraido[0] ?>" method="post">-->
                                    <a href="Comentario.php?idobj=<?php echo $extraido[0] ?>" name="button" class="btn-floating tooltipped"
                                       data-position="bottom" data-delay="50" data-tooltip="Ver comentarios"><i
                                                class="small material-icons">visibility</i></a>
                                    <!--<button type="submit" name="button">Ver</button>
                                    </form>-->


                                </td>


                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                    <input style='display:none;' name="id_objeto" value="" id="id_objeto"/>
                    <input style='display:none;' name="email" value="" id="email"/>

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
                <!--Formulario para registrar objetos, al inicio esta oculto hasta que se presiona el boton de registro y se oculta la tabla general de consultas-->
                <h1 id="titulo_form">Subir nuevo Objeto</h1>
            </div>
        </div>
        <br><br>
        <!--Se llama la funcion para insertar un nuevo objeto desde la carpeta de Accion-->
        <form enctype="multipart/form-data" id="formulario" action="Accion/SubirArchivo.php" method="post" role="form"
              class="form-vertical" accept-charset="utf8">
            <input style='display:none;' id="idobjeto" name="idobjeto" class="hidden" value="">
            <input style='display:none;' id="matricula" type="text" class="form-control" name="matricula"
                   value="<?php echo $matri ?>"/>


            <div class="container">
                <div class="panel panel-body">
                    <!--Se crean los label e input para llenar el formulario con cada campo de la tabla-->
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Nombre Del Objeto</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Gantt"
                                   required/>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <br>
                            <textarea name="descripcion" id="descripcion" class="form-control"
                                      placeholder="Objeto para aprender diagramas de Gantt" rows="10" cols="40"
                                      required></textarea>


                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Etiquetas </label>
                            <br>
                            <textarea name="etiquetas" id="etiquetas" class="form-control"
                                      placeholder="Separadas por coma" rows="10" cols="40" required></textarea>


                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="tipo">Area</label>
                            <select class="form-control" id="tipo" name="tipo">

                                <?php
                                for ($i = 0; $i < $result1->num_rows; $i++) {
                                    $extraido = mysqli_fetch_array($result1, MYSQLI_NUM);
                                    ?>
                                    <option value="<?php echo $extraido[0] ?>"><?php echo $extraido[1] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="tipo" id="archivo">Seleccionar Archivo</label>
                            <input enctype="multipart/form-data" type="file" name="file" id="file"/>


                        </div>
                    </div>


                </div>
                <div class="botones-accion">
                    <!--boton para cancelar el registro del usuario-->
                    <a href="TodosObjetos.php" class="btn btn-primary">Regresar a la Lista</a>
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

<script src="js/MisObjetos.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
</body>
</html>
