<?php
    require_once('../Modelo/Conexion.php');
    require_once('../Modelo/Consultastareas.php');

    $msj = null;
    $consultas = new Consultas();

    $pkid = $_POST['id'];
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $hora= $_POST["hora"];
    $descripcion = $_POST["descripcion"];

    if(strlen($fecha) > 0 && strlen($hora) > 0 && strlen($nombre) > 0 && strlen($descripcion) > 0){
        $msj = $consultas ->actualizarTarea($pkid,$nombre, $fecha, $hora, $descripcion);//se crea un objeto de la clase consulta
        echo "full";
    }else{
        echo "error";
    }

?>