<?php

class Conexion{
    public function get_conexion(){
        //variables
        $user = "root";//usuario
        $pass = "";//coontraseña
        $host = "localhost";//hots al que nos conectamos
        $db = "tareas";//base de datos a la que nos conectamos
        $conexion = new PDO("mysql:host=$host;dbname=$db;",$user,$pass);//instacia de pdo
        return $conexion; //renotrnar la conexion
        
    }
}

?>