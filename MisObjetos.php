<!DOCTYPE html>
<html lang="es">
<head>

    <title>Usuarios</title>
</head>
<?php require 'header.php'; ?>
<?php
include("sesion/conexion.php");
$MAIL = $_SESSION['email'];

$result = mysqli_query($conn, "select * from objetoaprendizaje a inner join usuario u on a.MatriculaUsuario=u.Matricula where Email='$MAIL'");
$matricula;
echo $MAIL;

?>
<!--<body BACKGROUND="Imagenes/fon.jpg">-->


<div class="container">

    <button class="btn btn-success registro-nuevo" type="button" name="button" onclick="swap();">Subir Objeto</button>

    <div id="lista">

        <h1 align="center">Listado de Objetos</h1>

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
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody class="buscar">
                        <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $extraido = mysqli_fetch_array($result, MYSQLI_NUM);
                            ?>
                            <tr>
                                <td>
                                    <button type="button" name="button" onclick="modificar(this)">Modificar</button>
                                    <br>
                                    <button type="button" name="button" onclick="eliminar(this)">Eliminar</button>
                                    <br>
                                    <button type="button" name="button" onclick="ver(this)">Ver</button>
                                </td>
                                <td style='display:none;' class="hidden"><?php echo $extraido[0]; ?></td>

                                <td><?php echo $extraido[1]; ?></td>

                            </tr>
                            <?php
                            $matricula = $extraido[2];
                        }

                        if ($i == 0) { ?> <h1>No se encontraron resultados</h1>  <?php }
                        ?>
                        </tbody>
                    </table>
                    <input style='display:none;' name="id_objeto" value="" id="id_objeto"/>

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

    <div style='display:none;' class="hidden" id="registro">
        <div class="row">
            <div align="center">
                <h1 id="titulo_form">Registro de Servicio</h1>
            </div>
        </div>
        <br><br>
        <form id="formulario" action="Accion/inserobjeto.php" method="post" role="form" class="form-vertical"
              accept-charset="utf8">
            <input style='display:none;' id="idobjeto" name="idobjeto" class="hidden" value="">

            <div class="container">
                <div class="panel panel-body">
                    <div class="col-xs-12 col-sm-4">


                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="nombre"
                                   placeholder="Diagrama de Gantt" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">

                            <label>Matricula</label>

                            <input id="matricula" type="text" class="form-control" name="matricula"
                                   value="<?php echo $matricula; ?>" required/>


                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input id="apaterno" type="text" class="form-control" name="apaterno" placeholder="Tapia"
                                   required/>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="tipo">Area De Conocimiento</label>
                            <select class="form-control" id="tipo" name="tipo">

                                <?php
                                include("sesion/conexion.php");
                                $result1 = mysqli_query($conn, "select * from areaconocimiento");
                                for ($a = 0; $a < $result1->num_rows; $a++) {
                                    $extraido2 = mysqli_fetch_array($result1, MYSQLI_NUM);

                                    ?>
                                    <option value="<?php echo $extraido2[0]; ?>"><?php echo $extraido2[1]; ?></option>
                                    <?php
                                }//Cierre del for
                                ?>

                            </select>
                        </div>
                    </div>

                </div>
                <div class="botones-accion">
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
<script src="js/MisObjetos.js" type="text/javascript"></script>


</body>
</html>
