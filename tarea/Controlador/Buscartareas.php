<?php
    require_once "../Modelo/Conexion.php";
    require_once "../Modelo/Consultastareas.php";

    $json = array();
    $consultas = new Consultas();
    $search = $_POST['buscar'];
    $rows = $consultas -> buscartarea($search);//recibe todas las filas de la consulta 
    $cont = 0;
    while($row = $rows->fetch()){
        $cont++;
        $json[] = array(
            'nombre' => $row['nombre_tarea'],
            'fecha' => $row['fecha_tarea'],
            'hora' =>$row['hora_tarea'],
            'descripcion' => $row['descripcion_tarea'],
            'estado' => $row['estado'],
            'id' => $row['pkid_tarea'],
            'type' => 'full'
        );
    }
    if($cont == 0){
        $json[] = array(
            'type' => 'error'
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>
