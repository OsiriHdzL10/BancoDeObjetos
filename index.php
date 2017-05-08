<?php

include("sesion/conexion.php");

//consulta para llenar la tabla de las areas de conocimiento
$Visitas = mysqli_query($conn, "SELECT * from objetoaprendizaje INNER JOIN registro on objetoaprendizaje.IDObjeto=registro.IDObjeto  where Tipo='VISITA' order by Contador DESC limit 5");
$Descargas = mysqli_query($conn, "SELECT * from objetoaprendizaje INNER JOIN registro on objetoaprendizaje.IDObjeto=registro.IDObjeto  where Tipo='DESCARGA' order by Contador DESC limit 5");


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

        /*#header {
            margin:auto;
            width:px;
            font-family:Arial, Helvetica, sans-serif;
        }
        */

    </style>
</head>
<?php require 'header.php'; ?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div id="lista">

    <h1 id=dog1 align="center">Top 5 Objetos Más Visitados</h1>

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
                        <th>Accion</th>
                        <th>Nombre Objeto</th>
                        <th>Matricula Profesor</th>
                        <th>Numero de Visitas</th>


                    </tr>
                    </thead>
                    <tbody class="buscar">
                    <?php
                    for ($i = 0; $i < $Visitas->num_rows; $i++) {
                        $extraido = mysqli_fetch_array($Visitas, MYSQLI_NUM);
                        ?>
                        <tr>
                            <td>
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
                            <td><?php echo $extraido[2] ?></td>
                            <td><?php echo $extraido[11] ?></td>


                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <input style='display:none;' class="hidden" name="id_area" value="" id="id_area"/>

            </div>
        </div>

    </div>
</div>


<div id="lista">

    <h1 align="center">Top 5 Objetos Más Descargados</h1>

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
                        <th>Accion</th>
                        <th>Nombre Objeto</th>
                        <th>Matricula Profesor</th>
                        <th>Numer de Descargas</th>


                    </tr>
                    </thead>
                    <tbody class="buscar">
                    <?php
                    for ($i = 0; $i < $Descargas->num_rows; $i++) {
                        $extraido2 = mysqli_fetch_array($Descargas, MYSQLI_NUM);
                        ?>
                        <tr>
                            <td>
                                <form action="VerObjeto.php" method="post">
                                    <input style='display:none;' name="id" value="<?php echo $extraido2[0] ?>" id="id"/>
                                    <button type="submit" name="button" class="btn-floating tooltipped"
                                            data-position="bottom" data-delay="50" data-tooltip="Ver objeto"><i
                                                class="small material-icons">visibility</i></button>
                                    <!--<button type="submit" name="button">Ver</button>-->
                                </form>
                            </td>
                            <td style='display:none;' class="hidden"><?php echo $extraido2[0] ?></td>

                            <td><?php echo $extraido2[1] ?></td>
                            <td><?php echo $extraido2[2] ?></td>
                            <td><?php echo $extraido2[11] ?></td>


                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <input style='display:none;' class="hidden" name="id_area" value="" id="id_area"/>

            </div>
        </div>

    </div>
</div>
</body>
</html>