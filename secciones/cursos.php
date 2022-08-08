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
            $sql="UPDATE cursos SET nombre_cursos=:nombre_cursos WHERE idcurso=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_cursos',$nombre_curso);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            break;
        case 'borrar':
            $sql="DELETE FROM cursos WHERE idcurso=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
           
            break;
        case 'Seleccionar':
            $sql="SELECT * FROM cursos WHERE idcurso=$id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->execute();
            $curso=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_curso=$curso['nombre_cursos'];
            break;
            
    }
}

$consulta=$conexionBD->prepare("SELECT * FROM cursos");
//ejecutar consulta
$consulta->execute();
//Retornar datos 
$listaCurso=$consulta->fetchAll();



?>