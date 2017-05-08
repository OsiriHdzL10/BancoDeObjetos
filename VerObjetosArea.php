<?php

include("sesion/conexion.php");

$valor = $_GET['bander'];


if ($valor == 1) {
    $area = $_GET['id'];
    $resultado = mysqli_query($conn, "select * from objetoaprendizaje where IDArea=$area");

} else {
    $id = $_POST['id'];
    $resultado = mysqli_query($conn, "select * from objetoaprendizaje where IDArea=$id");
}


?>


<html>
<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" href="estilo.css">-->
    <title>Menu Desplegable</title>
    <style type="text/css">

        * {
            margin: 0px;
            padding: 0px;
        }


    </style>
</head>
<?php require 'header.php'; ?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


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
                for ($i = 0; $i < $resultado->num_rows; $i++) {
                    $extraido = mysqli_fetch_array($resultado, MYSQLI_NUM);
                    ?>
                    <tr>
                        <td>
                            <!--Botones que llaman las funciones respectivas de modificar y eliminar-->

                            <!--Extraemos el resultado de nuestra consulta-->
                            <form action="VerObjeto.php" method="post">
                                <input style='display:none;' name="id" value="<?php echo $extraido[0] ?>" id="id"/>
                                <button type="submit" name="button" class="btn-floating tooltipped"
                                        data-position="bottom" data-delay="50" data-tooltip="Ver objeto"><i
                                            class="small material-icons">visibility</i></button>
                                <!--<button type="submit" name="button">Ver</button>-->
                            </form>

                        </td>
                        <td style='display:none;' class="hidden"><?php echo $extraido[0] ?></td>

                        <td><?php echo $extraido[1] ?></td>


                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <input style='display:none;' name="id_objeto" value="" id="id_objeto"/>

        </div>
    </div>
</div>


</body>
</html>