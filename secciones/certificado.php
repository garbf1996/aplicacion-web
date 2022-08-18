<?php
require('../pdf/fpdf.php');
include_once '../config/bd.php';
$conexion=BD::crearInstancia();

$idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
$idalumno=isset($_GET['idalumnos'])?$_GET['idalumnos']:'';

print_r($_GET);
$sql="SELECT alumnos.nombre, alumnos.apellido, cursos.nombre_cursos	FROM alumnos, cursos 
WHERE alumnos.idalumnos=:idalumnos AND cursos.idcurso=:idcurso
";
$stmt=$conexion->prepare($sql);
$stmt->bindParam(':idalumnos',$idalumno);
$stmt->bindParam(':idcurso',$idcurso);
$stmt->execute();
$alumno=$stmt->fetch(PDO::FETCH_ASSOC);
print_r($alumno);






?>