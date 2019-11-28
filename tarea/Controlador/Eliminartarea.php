<?php 
    require_once('../Modelo/Conexion.php');
    require_once('../Modelo/Consultastareas.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $consultas = new Consultas();
        $mensaje = $consultas->eliminarTarea($id);
        echo "full";
    }
?>