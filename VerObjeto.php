<?php

include("sesion/conexion.php");
$id = $_POST['id'];

//insercion de la visita 
$resu = mysqli_query($conn, "select * from registro where IDObjeto=$id AND Tipo='VISITA' ORDER BY Contador DESC limit 1");

$fecha = date("Y-m-d");
if ($resu->num_rows != 0) {

    $ext = mysqli_fetch_array($resu, MYSQLI_NUM);

    $numero = $ext[4] + 1;

    // $sql = "INSERT INTO registro (IDObjeto,Fecha,Tipo,Contador) VALUES ($id,'$fecha','VISITA',$numero)";

    $sql = "UPDATE registro set Contador=$numero where IDObjeto=$id and Tipo='VISITA'";

} else {
    $numero = 1;
    $sql = "INSERT INTO registro (IDObjeto,Fecha,Tipo,Contador) VALUES ($id,'$fecha','VISITA',1)";
}
$conn->query($sql);

//insercion de la visita
$resultado = mysqli_query($conn, "select * from objetoaprendizaje where IDObjeto=$id");

$extraer = mysqli_fetch_array($resultado, MYSQLI_NUM);

$area = $extraer[5];
$resultado1 = mysqli_query($conn, "select * from areaconocimiento where IDArea=$area");
$extraer2 = mysqli_fetch_array($resultado1, MYSQLI_NUM);


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
<div class="container">
    <div class="card medium">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="Imagenes/office.jpg">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4"><?= $extraer[1]; ?><i
                        class="material-icons right">more_vert</i></span>
            <p><a href="Accion/Descarga.php?archivo=<?= $id; ?>.zip&idObjeto=<?= $id; ?>">Descargar <?= $extraer[1]; ?>
                    .zip </a></p>
            <p>Numero de visitas de este objeto : <?= $numero ?></p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><?= $extraer[1]; ?><i
                        class="material-icons right">close</i></span>
            <p><?= $extraer[4]; ?></p>
            <div class="row">
                <div class="col s12 m6">
                    <h6><b>Area</b></h6>
                    <p><?= $extraer2[1]; ?></p>
                </div>
                <div class="col s12 m6">
                    <h6><b>Etiquetas</b></h6>
                    <p><?= $extraer[6]; ?></p>
                </div>
            </div>
            <div>
                <form action="Accion/InsertarComentario.php?id=<?php echo $id ?>" method="post">
                    <h5>Dejale un comentario al profesor</h5>
                    <label>Nombre</label>
                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Pedro"
                           required/>
                    <br>
                    <textarea name="comentario" id="comentario" class="form-control"
                              placeholder="Objeto para aprender diagramas de Gantt" rows="10" cols="40" required></textarea>
                    <div class="botones-accion">
                        <!--boton para cancelar el registro del usuario-->
                        <input type="submit" class="btn btn-success pull-right" id="enviar" value="Enviar"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<div id="Tabla">

    <br>
    <h2>Nombre</h2><br>
    <?php echo $extraer[1]; ?>

    <h2>Descarga</h2><br>
    <a href="Accion/Descarga.php?archivo=<?php echo $id; ?>.zip&idObjeto=<?php echo $id; ?>">Descargar <?php echo $extraer[1]; ?>.zip </a>

    <h2>Descripcion</h2><br>
    <div><p><?php echo $extraer[4]; ?></p></div>

    <h2>Area</h2><br>
    <div><p><?php echo $extraer2[1]; ?></p></div>
    <h2>Etiquetas</h2><br>
    <div><p><?php echo $extraer[6]; ?></p></div>


    <div>
        <form action="Accion/InsertarComentario.php?id=<?php echo $id ?>" method="post">


            <h2>Dejale un comentario al profesor</h2>
            <br>
            <label>Nombre</label><input id="nombre" type="text" class="form-control" name="nombre" placeholder="Pedro"
                                        required/>
            <br>
            <textarea name="comentario" id="comentario" class="form-control"
                      placeholder="Objeto para aprender diagramas de Gantt" rows="10" cols="40" required></textarea>
            <div class="botones-accion">
                <!--boton para cancelar el registro del usuario-->

<!--<input type="submit" class="btn btn-success pull-right" id="enviar" value="Enviar"/>
</div>
</form>

</div>


</div>-->

<!--<footer id="footer">
    Numero de visitas de este objeto : <?php echo $numero ?>

</footer>-->
</body>
</html>