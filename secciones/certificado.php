<?php
require('../pdf/fpdf.php');
include_once '../config/bd.php';
$conexion=BD::crearInstancia();

function agregarTexto($pdf,$texto,$posicionHorizontal,$posicionVertical,$alineacion,$f,$t,$s,$r,$g,$b) 
{
    $pdf->SetFont($f,$t,$s);	
    $pdf->SetXY($posicionHorizontal,$posicionVertical);
    $pdf->SetTextColor($r,$g,$b);
    $pdf->Cell(0,10,$texto,0,0,$alineacion);	
}

function AgregarImagen($pdf, $imagen, $x, $y) {
$pdf->Image($imagen,$x,$y,0);	
}



$idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
$idalumno=isset($_GET['idalumnos'])?$_GET['idalumnos']:'';

$sql="SELECT alumnos.nombre, alumnos.apellido, cursos.nombre_cursos	FROM alumnos, cursos 
WHERE alumnos.idalumnos=:idalumnos AND cursos.idcurso=:idcurso
";
$stmt=$conexion->prepare($sql);
$stmt->bindParam(':idalumnos',$idalumno);
$stmt->bindParam(':idcurso',$idcurso);
$stmt->execute();
$alumno=$stmt->fetch(PDO::FETCH_ASSOC);

$pdf = new FPDF('L','mm',array(254,190));
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
AgregarImagen($pdf,'../img/certificado_.jpg', 0,0);


$pdf->Output();


?>