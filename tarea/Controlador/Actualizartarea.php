<?php
    require_once('../Modelo/Conexion.php');
    require_once('../Modelo/Consultastareas.php');

    $msj = null;
    $consultas = new Consultas();
    $fecha = $_POST['fecha'];
    $pkid = $_POST['idTarea'];
    $hora = $_POST['hora'];
    $nombre = $_POST['nombre'];


    if(strlen($fecha) > 0 && strlen($hora) > 0 && strlen($nombre) > 0){
        $msj = $consultas ->actualizarTarea($nombre,$pkid);//se crea un objeto de la clase consulta
        echo "full";
    }else{
        echo "error";
    }

?>