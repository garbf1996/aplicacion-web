<?php
include_once '../config/bd.php';
$conexionBD = BD::crearInstancia();
print_r($_POST);

$consulta=$conexionBD->prepare("SELECT * FROM cursos");
//ejecutar consulta
$consulta->execute();
//Retornar datos 
$listaCurso=$consulta->fetchAll();

print_r($listaCurso);

?>