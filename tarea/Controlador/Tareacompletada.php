<?php
    require_once('../Modelo/Conexion.php');
    require_once('../Modelo/Consultastareas.php');

    $msj = null;
    $consultas = new Consultas();

    $pkid = $_POST['id'];
    
    $msj = $consultas ->tareaCompletada($pkid);//se crea un objeto de la clase consulta
    echo "full";
?>