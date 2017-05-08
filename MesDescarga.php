<?php
 include ('sesion/conexion.php');
//rescibimos el parametro de Fecha2
$fecha= $_POST['Fecha2'];
$rol=$_POST['rol'];
$matricula=$_POST['matricula'];

//var_dump($_POST['Fecha2']);

//consulta para buscar la fecha de descargas, utilizamos un between para poder acompletar el paramtro del mes de un rango de 1 y 31
$sql = "SELECT * from registro where Fecha BETWEEN '$fecha-01' AND '$fecha-31' ";
echo $sql;

//verificamos que se haya hecho correctamente la consulta
if ($conn->query($sql)) {
   header("Location: MesDescargaspdf.php?Fecha2=$fecha&rol=$rol&matricula=$matricula");
	
} else {
  echo $conn->error;
}
?>
