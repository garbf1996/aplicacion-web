<?php
require('../pdf/fpdf.php');
include_once '../config/bd.php';
$conexion=BD::crearInstancia();


function agregarTexto($pdf,$texto,$x,$y,$aling='L',$fuente,$size=10,$r=0,$g=0,$b=0){
    $pdf->SetFont($fuente,"",$size);	
    $pdf->SetXY($x,$y);
    $pdf->SetTextColor($r,$g,$b);
    $pdf->Cell(0,10,$texto,0,0,$aling);	
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

//print_r($cursosAlumno);
$pdf = new FPDF('L','mm',array(254,190));
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
AgregarImagen($pdf,'../img/certificado_.jpg', 0,0);
agregarTexto($pdf,"Garber",60,70,'L','Helvetica',30,0,84,115);
agregarTexto($pdf,"Sitio WEB",-190,115,'c','Helvetica',20,0,84,115);
agregarTexto($pdf,"01/01/2022",-190,155,'c','Helvetica',11,0,84,115);
$pdf->Output();



?>