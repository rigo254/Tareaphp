<?php
    require_once "../Modelo/Conexion.php";
    require_once "../Modelo/Consultastareas.php";

    $json = array();
    $consultas = new Consultas();
    $id = $_POST['id'];
    $rows = $consultas -> cargarTarea($id);//recibe todas las filas de la consulta 

    while($row = $rows->fetch()){
        $json[] = array(
            'nombre' => $row['nombre_tarea'],
            'fecha' => $row['fecha_tarea'],
            'hora' =>$row['hora_tarea'],
            'descripcion' => $row['descripcion_tarea'],
            'estado' => $row['estado'],
            'id' => $row['pkid_tarea']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

?>
