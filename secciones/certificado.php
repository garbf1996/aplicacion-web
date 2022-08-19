<?php
require('../pdf/fpdf.php');
include_once '../config/bd.php';
$conexion=BD::crearInstancia();

//duncion para fuentes
function agregarTexto($pdf,$texto,$x,$y,$size=10,$fuente,$salign='L',$sr=0,$g=0,$b=0){
    $pdf->SetFont($fuente,$size,$salign);
    $pdf->SetXY($x,$y);
    $pdf->SetTextColor($sr,$g,$b);
    $pdf->MultiCell(0,10,$texto,0,0,$salign);
   //$pdf->Text($x,$y,$texto);
}

function agregarImagen($pdf,$image,$x,$y){
    $pdf->Image($image,$x,$y,0);
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

$pdf = new FPDF("L","mm","A4",array(254,194));
$pdf->AddPage();
$pdf->SetFont('arial','B',16);
$pdf->Output();

?>