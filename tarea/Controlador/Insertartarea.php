<?php
    require_once('../Modelo/Conexion.php');
    require_once('../Modelo/Consultastareas.php');


    $mensaje = null;
    //capturamos las variables
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $hora= $_POST["hora"];

    if(strlen($nombre) > 0 && strlen($fecha) > 0 && strlen($hora) > 0 ){
        $consultas = new Consultas();//se crea un objeto de la clase consulta
        $mensaje = $consultas ->insertartarea($nombre, $fecha, $hora);//pasamos el resultado de la consulta
        echo "full";
    }else{
        echo "error";
    }
?>