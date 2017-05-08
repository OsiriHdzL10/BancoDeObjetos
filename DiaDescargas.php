<?php
 include ('sesion/conexion.php');

//recibimos el parametro de fecha y lo convertimos al fotmar yyyy-mm-dd por que es el formato que maneja mysql
$fecha=date('Y-m-d', strtotime($_POST['Fecha']));
$rol=$_POST['rol'];
$matricula=$_POST['matricula'];
//consulta para buscar la fecha de descargas

$sql = "SELECT * from registro where Fecha = '$fecha'";
$sql2 = "SELECT * from registro where Fecha = '$fecha'";
echo $sql;
//verificamos que se haya hecho correctamente la consulta


$jsondata = array();
$resultado=mysqli_query($conn, $sql2);
if ($resultado->num_rows>0){
	if ($conn->query($sql)) {
   		header("Location: DiaDescargaspdf.php?Fecha=$fecha&rol=$rol&matricula=$matricula");
	} else {
  	//	echo $conn->error;
	}
}else{
	echo "<script>alert('No hay registros')</script>";
    echo "<script>window.location.href='ReporteDescargas.php';</script>";
}
?> 