<?php require 'header.php';
$Matricula= $_SESSION['matricula'];
$Matricula2= $_SESSION['rol'];
?>
<html>
  <head>
  <meta charset="UTF-8">
  <!--<link rel="stylesheet" href="estilo.css">-->
    <title>Menu Desplegable</title>
   <style type="text/css">
      
      * {
        margin:0px;
        padding:0px;
      }
      
      /*#header {
        margin:auto;
        width:px;
        font-family:Arial, Helvetica, sans-serif;
      }
      */
      
    </style>
  </head>

  <!--<body BACKGROUND="Imagenes/fon.jpg">-->
  
  <h1 align="center">Reporte de Descargas</h1>
  
  <div class="container" id="Tabla">
    
    <div class="panel panel-body">
      <div class="table-responsive">

<!--Se crea la tabla para las 2 opciones de reportes de mes y dia-->
    <table id="listaD" class="table table-bordered text-center table-striped tablesorter" border="1">
      <thead>
        <tr class="cabecera">
         <th>Accion</th>
         
          <th>Tipo de Reporte</th>
               
        </tr>
      </thead>
      <tr>
        <td>
<!--Se Manda llamar la funcion de Mes de visitas y mando el parametro de Fecha 2, esta fecha la escogen por medio del input typo month que te permite escoger mes y año-->
        <form action="MesDescarga.php" method="post">
        <input type="month" name="Fecha2" id="Fecha2">
              <input style='display:none;' class="hidden" name="rol" value="<?php echo $Matricula2; ?>" id="rol"/>  
              <input style='display:none;' class="hidden" name="matricula" value="<?php echo $Matricula; ?>" id="matricula"/>                
            <button type="submit" name="button">Ver</button>
        </form>           
                 
         </td>
         <td>Por Mes</td>
       </tr>

<!--Se manda llamar la funcion de dia de visitas y mando el parametro de Fecha, esta fecha la escogen por medio del input typo date que te permite dia, mes y año-->
       <tr>
         <td>           
            <form action="DiaDescargas.php" method="post" >
              <input type="date" name="Fecha" id="Fecha" >
              <input style='display:none;' class="hidden" name="rol" value="<?php echo $Matricula2; ?>" id="rol"/>  
              <input style='display:none;' class="hidden" name="matricula" value="<?php echo $Matricula; ?>" id="matricula"/>   
            <button type="submit" name="button">Ver</button>
        </form>   
                 
         </td>      
      <td>Por Dia</td>
      </tr>

    </table>
     <input style='display:none;' class="hidden" name="id_area" value="" id="id_area"/>

    </div>
    </div>
    </div>

  
  </body>
</html>