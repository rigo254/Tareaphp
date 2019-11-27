<?php
    require_once "../Modelo/Conexion.php";
    require_once "../Modelo/Consultastareas.php";
    
    $consultas = new Consultas();
    $filas = $consultas -> cargarTareas();//recibe todas las filas de la consulta 
    $cont=0;
    while($fila = $filas->fetch()){
        $cont++;
        $json[] = array(
            'nombre' => $fila['nombre_tarea'],
            'fecha' => $fila['fecha_tarea'],
            'hora' =>$fila['hora_tarea'],
            'descripcion' => $fila['descripcion_tarea'],
            'estado' => $fila['estado'],
            'id' => $fila['pkid_tarea'],
            'type' => 'full'
        );
    }
    if ($cont == 0){
        $json[] = array(
            'type' => 'error'
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
?>