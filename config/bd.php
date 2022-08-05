<?php

class BD {
    // Distancia de conexiones
    public static $instancia = null;
    // Metodo instancia
    public static function crearInstancia(){
        //Preguntamos si la instancia tiene algo
        if(   !isset (self::$instancia)){
           // Conexion de base de datos
            $opciones [PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '', $opciones);
            echo "Conectado a la base de datos";
        }

        return self::$instancia;
    
    }

}

?>