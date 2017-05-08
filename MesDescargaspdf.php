<?php
require('/fpdf/fpdf.php');
require('sesion/conexion.php');

//recibimos la variable fecha2
$fecha= $_GET['Fecha2'];
$Matricula= $_GET['matricula'];
$Matricula2= $_GET['rol'];


//Damos formato al pdf
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('Imagenes/Itmorelia.png' , 10 ,8, 20 , 25,'PNG');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Ln(10);
$pdf->Cell(20, 8, '', 0);
$pdf->Cell(70, 8, 'Rincon del Tec', 0);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(65, 8, '', 0);
$pdf->Cell(10, 8, 'Reporte de Descargas por Mes', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
  $pdf->Cell(50, 8,'Area de Conocmiento', 0);
  $pdf->Cell(60, 8,'Objeto de Aprendizaje', 0); 
  $pdf->Cell(30, 8,'Fecha', 0);
  $pdf->Cell(30, 8,'Total de Visitas por dia', 0);
  

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA y hacemos funcion de nuestra variable fecha
if($Matricula2==1){
$query="SELECT NombreArea, NombreObjeto, Fecha, Contador from areaconocimiento a inner join objetoaprendizaje o on a.IDArea = o.IDArea inner join registro r on o.IDObjeto = r.IDObjeto where Fecha BETWEEN '$fecha-01' AND '$fecha-31' and Tipo = 'DESCARGA' order by Contador desc;";
}else{
	$query="SELECT NombreArea, NombreObjeto, Fecha, Contador from areaconocimiento a inner join objetoaprendizaje o on a.IDArea = o.IDArea inner join registro r on o.IDObjeto = r.IDObjeto where Fecha BETWEEN '$fecha-01' AND '$fecha-31' and Tipo = 'DESCARGA' and MatriculaUsuario='$Matricula' order by Contador desc";

}
$resultado=$conn->query($query);
$resultado2=mysqli_query($conn,$query);

while($docente2=mysqli_fetch_array($resultado2,MYSQLI_BOTH)){ 


  
  $pdf->Cell(50, 8,$docente2[0], 0);
  $pdf->Cell(60, 8,$docente2[1], 0);
  $pdf->Cell(30, 8,$docente2[2], 0);
  $pdf->Cell(30, 8,$docente2[3], 0);
  $pdf->Ln(5);

}
$pdf->Output();
?>