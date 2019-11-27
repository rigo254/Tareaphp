<?php
require_once('../Modelo/Conexion.php');
require_once('../Modelo/Consultastareas.php');

$msj = null;
$consultas = new Consultas();
$fecha = $_POST['fecha'];
$pkid = $_POST['pkid_tarea'];
$hora = $_POST['hora'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];


if(strlen($fecha) > 0 && strlen($hora) > 0 && strlen($nombre) > 0 && strlen($estado) > 0 && strlen($descripcion) > 0 ){
  $msj = $consultas ->modificartarea("fecha_tarea",$fecha,$pkid);//se crea un objeto de la clase consulta
  $msj = $consultas ->modificartarea("hora_tarea",$hora,$pkid);//se crea un objeto de la clase consulta
  $msj = $consultas ->modificartarea("nombre_tarea",$nombre,$pkid);//se crea un objeto de la clase consulta
  $msj = $consultas ->modificartarea("estado",$estado,$pkid);//se crea un objeto de la clase consulta
  $msj = $consultas ->modificartarea("descripcion_tarea",$descripcion,$pkid);//se crea un objeto de la clase consulta
  
  header("location: ../index.php");
  
}else{
  echo "por favor completa todos los campos";
  
}

echo $msj;

?>