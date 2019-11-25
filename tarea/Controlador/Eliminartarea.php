<?php 
require_once('../Modelo/Conexion.php');
require_once('../Modelo/Consultastareas.php');

if(isset($_GET['pkid_tarea'])){
    $id = $_GET['pkid_tarea'];
    $consultas = new Consultas();
    $mensaje = $consultas->eliminartarea($id);
    echo $mensaje;
    echo "eliminado correctamente";
}
?>