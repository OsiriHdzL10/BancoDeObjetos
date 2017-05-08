<?php
session_start();

$ses = (isset($_SESSION['email'])) ? "si" : "no";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <!--<meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, miminum-scale=1, user-scalable=no">-->
    <meta http-equiv="Content-type" content="text/html">
    <!--<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">-->
    <script src="jquery.js"></script>
    <!--<script src="index_proyecto.js"></script>
    <link href="css/estilo.css" rel="stylesheet">-->
    <title></title>
    <style type="text/css">
        * {

            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<!--<header class="h">
    <div><IMG src="Imagenes/Itmorelia.png" width="100" height="100" align="left"/></div>
    <div class="Titulo"><h1>El Rincon del Tec </h1></div>

    <form action="sesion/iniciar_sesion.php" id="formulario2" method="post">
        <div class="login">
            <?php
if (isset($_SESSION['email'])) {
    echo '<label class="session">Bienvenido</label><br>';
    echo '<label class="session">' . $_SESSION['nombre'] . '</label><br><br>';
    echo '<a href="sesion/cerrar_sesion.php" class="btn btn-info">Cerrar sesion</a>';


} else {
    echo '<label>Iniciar Sesión</label>';
    echo '<div><input type="email" placeholder="Correo electrónico" id="email" name="email" ><br></div>';
    echo '<div><input type="password" placeholder="Contraseña" id="pass" name="pass"><br></div>';
    echo '<input type="submit" id="enviar" name="enviar"  value="Entrar" >';
}
?>
        </div>
    </form>

</header>

<div class="header" id="header">

    <ul class="nav">
        <li>
            <a href="index.php">Inicio</a>

        </li>
        <li><a href="TodasLasAreas.php">Areas de conocimiento</a>
            <ul>
                <?php include('sesion/conexion.php');
$contador = 0;
$query1 = "select * from areaconocimiento";
$result1 = mysqli_query($conn, $query1) or die('Consulta fallida: ' . mysqli_error($conn));
while ($contador != 3) {
    $fila = mysqli_fetch_array($result1, MYSQLI_BOTH);
    $contador += 1;

    ?>
                    <li><a href="VerObjetosArea.php?id=<?php echo $fila[0]; ?>&bander=1"><?php echo $fila[1]; ?></a>
                    </li>
                    <?php
}//Cierre del while
mysqli_close($conn);
//echo $red;
?>
                <li><a href="TodasLasAreas.php">Ver Todos</a></li>
            </ul>

        </li>
        <li><a href="index.php">Información</a>
            <ul>
                <li><a href="Objeto.php">¿Qué es un Objeto de Aprendizaje?</a></li>
                <li><a href="Banco.php">¿Qué es un Banco de Objetos?</a></li>
                <li><a href="SirveObjeto.php">¿Para qué sirve un Objeto de Aprendizaje?</a></li>
            </ul>
        </li>

        <?php
if (isset($_SESSION['email'])) {
?>  <!--Verificamos que haya una sesion activa para que aparezca el campo siguiente-->

<!--<li><a href="">Reportes</a>
    <ul>
        <li><a href="ReporteVisitas.php">Más visitadas</a></li>
        <li><a href="ReporteDescargas.php">Más descargadas</a></li>
    </ul>
</li>-->

<?php

}
?>

<?php
if (isset($_SESSION['rol'])) {

    if ($_SESSION['rol'] == 1) {
        ?> <!--Verificamos que haya una sesion de administrador  activa para que aparezca el campo siguiente-->

        <!--<li><a href="index.php">Consultas</a>
            <ul>
                <li><a href="Usuarios.php">Usuarios</a></li>
                <li><a href="TodosObjetos.php">Todo los Objetos</a></li>
                <li><a href="AreasConocimiento.php">Areas de Conocimiento</a></li>

            </ul>
        </li>-->

        <?php
    }
}
?>




<?php
if (isset($_SESSION['email'])) {
    ?>

    <!--<li><a href="MiObjeto.php">Mis Objetos</a>
        <ul>

            <li><a href="MiObjeto.php">Ver mis objetos</a></li>
            <li><a href="TodosComentarios.php">Todos los comentarios</a></li>
        </ul>
    </li>-->


    <?php

}
?>

<!--<li>

    <a>
        <form action="Metadatos.php" method="post">
            <input id="buscar" type="text" class="form-control" name="buscar" placeholder="gantt" required/>

            <button type="submit" name="button">Buscar</button>
        </form>
    </a>


</li>


</ul>

</div>-->

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <?php include('sesion/conexion.php');
    $contador = 0;
    $query1 = "select * from areaconocimiento";
    $result1 = mysqli_query($conn, $query1) or die('Consulta fallida: ' . mysqli_error($conn));
    while ($contador != 3) {
        $fila = mysqli_fetch_array($result1, MYSQLI_BOTH);
        $contador += 1;

        ?>
        <li><a href="VerObjetosArea.php?id=<?php echo $fila[0]; ?>&bander=1"><?php echo $fila[1]; ?></a>
        </li>
        <?php
    }//Cierre del while
    mysqli_close($conn);
    //echo $red;
    ?>
    <li><a href="TodasLasAreas.php">Ver Todos</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="Objeto.php">¿Qué es un Objeto de Aprendizaje?</a></li>
    <li><a href="Banco.php">¿Qué es un Banco de Objetos?</a></li>
    <li><a href="SirveObjeto.php">¿Para qué sirve un Objeto de Aprendizaje?</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
    <?php include('sesion/conexion.php');
    $contador = 0;
    $query1 = "select * from areaconocimiento";
    $result1 = mysqli_query($conn, $query1) or die('Consulta fallida: ' . mysqli_error($conn));
    while ($contador != 3) {
        $fila = mysqli_fetch_array($result1, MYSQLI_BOTH);
        $contador += 1;

        ?>
        <li><a href="VerObjetosArea.php?id=<?php echo $fila[0]; ?>&bander=1"><?php echo $fila[1]; ?></a>
        </li>
        <?php
    }//Cierre del while
    mysqli_close($conn);
    //echo $red;
    ?>
    <li><a href="TodasLasAreas.php">Ver Todos</a></li>
</ul>
<ul id="dropdown4" class="dropdown-content">
    <li><a href="Objeto.php">¿Qué es un Objeto de Aprendizaje?</a></li>
    <li><a href="Banco.php">¿Qué es un Banco de Objetos?</a></li>
    <li><a href="SirveObjeto.php">¿Para qué sirve un Objeto de Aprendizaje?</a></li>
</ul>
<ul id="dropdown5" class="dropdown-content">
    <li><a href="ReporteVisitas.php">Más visitadas</a></li>
    <li><a href="ReporteDescargas.php">Más descargadas</a></li>
</ul>
<ul id="dropdown6" class="dropdown-content">
    <li><a href="ReporteVisitas.php">Más visitadas</a></li>
    <li><a href="ReporteDescargas.php">Más descargadas</a></li>
</ul>
<ul id="dropdown7" class="dropdown-content">
    <li><a href="Usuarios.php">Usuarios</a></li>
    <li><a href="TodosObjetos.php">Todo los Objetos</a></li>
    <li><a href="AreasConocimiento.php">Areas de Conocimiento</a></li>
</ul>
<ul id="dropdown8" class="dropdown-content">
    <li><a href="Usuarios.php">Usuarios</a></li>
    <li><a href="TodosObjetos.php">Todo los Objetos</a></li>
    <li><a href="AreasConocimiento.php">Areas de Conocimiento</a></li>
</ul>
<ul id="dropdown9" class="dropdown-content">
    <li><a href="MiObjeto.php">Ver mis objetos</a></li>
    <li><a href="TodosComentarios.php">Todos los comentarios</a></li>
</ul>
<ul id="dropdown10" class="dropdown-content">
    <li><a href="MiObjeto.php">Ver mis objetos</a></li>
    <li><a href="TodosComentarios.php">Todos los comentarios</a></li>
</ul>
<ul id="dropdown11" class="dropdown-content">
    <li><center>Usuario: <b><?= $_SESSION['nombre']?></b></center></li>
    <li><a href="sesion/cerrar_sesion.php">Cerrar sesion</a></li>
</ul>
<!-- NavBar -->
<nav class="cyan darken-1">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo"><IMG src="Imagenes/Itmorelia.png" width="55" height="55" align="left" style="opacity: 0.4"/>El
            Rincon del Tec</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <!-- Dropdown Trigger -->
            <li><a href="index.php">Inicio</a></li>
            <li><a class="dropdown-button" data-activates="dropdown1" href="#!" data-beloworigin="true">Areas de conocimiento<i
                            class="material-icons right">arrow_drop_down</i></a></li>
            <?php
            if (!isset($_SESSION['email'])) {
            ?>
                <li><a class="dropdown-button" data-activates="dropdown2" data-beloworigin="true">Información<i class="material-icons right">arrow_drop_down</i></a></li>
            <?php
            }
            if (isset($_SESSION['email'])) {
                ?>  <!--Verificamos que haya una sesion activa para que aparezca el campo siguiente-->
                <li><a class="dropdown-button" data-activates="dropdown5" data-beloworigin="true">Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php
            }
            if (isset($_SESSION['rol'])) {

                if ($_SESSION['rol'] == 1) {
                    ?> <!--Verificamos que haya una sesion de administrador  activa para que aparezca el campo siguiente-->
                    <li><a class="dropdown-button" data-activates="dropdown7" data-beloworigin="true">Consultas<i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php
                }
            }
            if (isset($_SESSION['email'])) {
                ?>
                <li><a class="dropdown-button" data-activates="dropdown9" data-beloworigin="true">Mis Objetos<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php
            }
            if (isset($_SESSION['email'])) {
                ?>
                <li><a class="dropdown-button" data-activates="dropdown11" data-beloworigin="true"><i class="material-icons" data-beloworigin="true">settings_power</i></a></li>
                <!--<label class="white-text">Bienvenido <b><?= $_SESSION['nombre']?></b> </label>
                <a href="sesion/cerrar_sesion.php" class="btn">Cerrar sesion</a>-->
                <?php
            } else {
                ?>
                <!-- Modal Trigger -->
                <li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Acceder</a></li>

                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <form action="sesion/iniciar_sesion.php" id="formulario2" method="post">
                        <div class="modal-content">
                            <h4 class="black-text">Iniciar Sesion</h4>
                            <label for="email" class="black-text">Correo electrónico</label>
                            <input id="email" name="email" type="email" class="validate black-text" required>
                            <label for="password" class="black-text">Contraseña</label>
                            <input id="pass" name="pass" type="password" class="validate black-text" required>
                            <!--<input type="submit" id="enviar" name="enviar"  value="Entrar" >-->
                        </div>
                        <div class="modal-footer">
                            <button class="waves-effect waves-green btn" type="submit"
                                    id="enviar" name="enviar">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
                <?php
            } ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <!-- Dropdown Trigger -->
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="Imagenes/fondo_login.png">
                    </div>
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <a href="#!user"><img class="circle" src="Imagenes/user.png"></a>
                        <a href="#!name"><span class="white-text name"><?= $_SESSION['nombre'] ?></span></a>
                        <a href="sesion/cerrar_sesion.php"><span class="white-text">Cerrar sesion</span></a>
                        <?php
                    } else {
                        ?>
                        <div style="height: 300px;">
                            <h6>Iniciar Sesion</h6>
                            <form action="sesion/iniciar_sesion.php" id="formulario2" method="post">
                                <label for="email">Correo electrónico</label>
                                <input id="email" name="email" type="email" class="validate" required>
                                <label for="password">Contraseña</label>
                                <input id="pass" name="pass" type="password" class="validate" required>
                                <button class="btn waves-effect waves-light" type="submit" id="enviar" name="enviar">
                                    Entrar
                                </button>
                                <!--<input type="submit" id="enviar" name="enviar"  value="Entrar" >-->
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </li>
            <li><a href="index.php">Inicio</a></li>
            <li><a class="dropdown-button" data-activates="dropdown3">Areas de conocimiento<i
                            class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" data-activates="dropdown4">Información<i class="material-icons right">arrow_drop_down</i></a></li>
            <?php if (isset($_SESSION['email'])) {
                ?>  <!--Verificamos que haya una sesion activa para que aparezca el campo siguiente-->
                <li><a class="dropdown-button" data-activates="dropdown6">Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php
            }
            if (isset($_SESSION['rol'])) {

                if ($_SESSION['rol'] == 1) {
                    ?> <!--Verificamos que haya una sesion de administrador  activa para que aparezca el campo siguiente-->
                    <li><a class="dropdown-button" data-activates="dropdown8">Consultas<i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php
                }
            }
            if (isset($_SESSION['email'])) {
                ?>
                <li><a class="dropdown-button" data-activates="dropdown10">Mis Objetos<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php
            } ?>
        </ul>
    </div>
</nav>
<div class="container">
    <form action="Metadatos.php" method="post">
        <div class="row">
            <div class="input-field col s3 offset-s3">
                <input placeholder="Gantt" id="buscar" name="buscar" type="text" class="validate">
                <label for="buscar">Buscar</label>
            </div>
            <div class="input-field col s3">
                <button class="btn-floating waves-effect waves-light" type="submit" name="button">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap Core -->
<script src="js/jquery.js" type="text/javascript"></script>
<!-- /Bootstrap Core -->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<!-- Paginador y Ordenador -->
<script type="text/javascript" src="js/tablesorter-master/js/jquery.tablesorter.js"></script>
<script src="js/tablesorter-master/addons/pager/jquery.tablesorter.pager.js" type="text/javascript"></script>
<script type="text/javascript" src="js/sortpag.js"></script>
<!-- Paginador y Ordenador -->
<script>
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });
</script>
<script>
    $(document).ready(function () {
        $(".button-collapse").sideNav();
        $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                hover: true, // Activate on hover
                belowOrigin: true, // Displays dropdown below the button
                alignment: 'right' // Displays dropdown with edge aligned to the left of button
            }
        );
    });
</script>

</html>