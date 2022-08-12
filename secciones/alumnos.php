<?php
include_once '../config/bd.php';

$conexionBD = BD::crearInstancia();

$id=isset($_POST["id"])?$_POST["id"]:'';

$nombre=isset($_POST["nombre"])?$_POST["nombre"]:'';

$apellido=isset($_POST["apellido"])?$_POST["apellido"]:'';

$curso=isset($_POST["cursos"])?$_POST["cursos"]:'';

$accion=isset($_POST["accion"])?$_POST["accion"]:'';



if($accion!==''){
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO alumnos (idalumnos,nombre,apellido) VALUES (NULL,:nombre,:apellido)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre',$nombre);
            $consulta->bindParam(':apellido',$apellido);
            $consulta->execute();   
            $idAlumno=$conexionBD->lastInsertId();

            foreach ($curso as $curso) {
                $sql="INSERT INTO alumno_cursos (idalumnos,idcurso) VALUES (:idalumno,:idcurso)";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno',$idAlumno);
                $consulta->bindParam(':idcurso',$curso);
                $consulta->execute();
            }
            break;
        case 'editar':
            $sql="UPDATE alumnos SET nombre=:nombre, apellido=:apellido WHERE idalumnos=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre',$nombre);
            $consulta->bindParam(':apellido',$apellido);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
              
            if(!empty($curso)){
                $sql="DELETE FROM alumno_cursos WHERE idalumnos=:id";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':id',$id);
                $consulta->execute();
                
                foreach ($curso as $curso) {
                    $sql="INSERT INTO alumno_cursos (idalumnos,idcurso) VALUES (:idalumno,:idcurso)";
                    $consulta=$conexionBD->prepare($sql);
                    $consulta->bindParam(':idalumno',$id);
                    $consulta->bindParam(':idcurso',$curso);
                    $consulta->execute();
                }

            }

            break;
        case 'borrar':
            $sql="DELETE FROM alumnos WHERE idalumnos=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();

           
            break;
        case 'Seleccionar':
            $sql="SELECT * FROM alumnos WHERE idalumnos=$id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->execute();
            $alumno=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre=$alumno['nombre'];
            $apellido=$alumno['apellido'];
         
            $sql="SELECT cursos.idcurso FROM 
            alumno_cursos INNER JOIN 
            cursos ON cursos.idcurso=alumno_cursos.idcurso 
            WHERE alumno_cursos.idalumnos=:idalumno";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':idalumno',$id);
            $consulta->execute();
            $cursosAlumnos=$consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach($cursosAlumnos  as $curso){
                $cursos[]=$curso['idcurso'];
              
            }


            break;
            
    }
}



$sql = "SELECT * FROM alumnos";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$listaAlumnos = $consulta->fetchAll();

foreach($listaAlumnos as $clave=> $alumno){
    $sql = "SELECT * From cursos WHERE idcurso IN (SELECT idcurso FROM alumno_cursos  WHERE idalumnos=$alumno[idalumnos])";
    $consulta = $conexionBD->prepare($sql);
    $consulta->execute();
    $listaCursos = $consulta->fetchAll();
    $listaAlumnos[$clave]['cursos']=$listaCursos;

}

$qls = "SELECT * FROM cursos";
$consulta = $conexionBD->query($qls);
$consulta->execute();
$listaCursos = $consulta->fetchAll();




?>