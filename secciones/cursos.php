<?php
include_once '../config/bd.php';
$conexionBD = BD::crearInstancia();


$id=isset($_POST["id"])?$_POST["id"]:'';
$nombre_curso=isset($_POST["nombre_curso"])?$_POST["nombre_curso"]:'';
$accion=isset($_POST["accion"])?$_POST["accion"]:'';

if($accion!==''){
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO cursos (idcurso,nombre_cursos) VALUES (NULL,:nombre_curso)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_curso',$nombre_curso);
            $consulta->execute();   
            break;
        case 'editar':
            $sql="UPDATE cursos SET nombre_cursos='$nombre_curso' WHERE idcurso=$id";
          
            break;
        case 'borrar':
            $sql="DELETE FROM cursos WHERE idcurso=$id";
           
            break;
    }
}

$consulta=$conexionBD->prepare("SELECT * FROM cursos");
//ejecutar consulta
$consulta->execute();
//Retornar datos 
$listaCurso=$consulta->fetchAll();



?>