<?php

    function cargar(){
        $consultas = new Consultas();
        $filas = $consultas -> cargartarea();//recibe todas las filas de la consulta 
        echo "<table class='table container text-center table-borderless'>
        <tr style='background: lightgray'>
            <th scope='col'>Nombre</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Hora</th>
            <th scope='col'>Descripcion</th>
            <th scope='col'>Estado</th>
            <th scope='col'>Acciones</th>
        </tr>";
        foreach ($filas as $fila){
            echo "<tr>";
            echo "<td scope='row'>".$fila['nombre_tarea']."</td>";
            echo "<td>".$fila['fecha_tarea']."</td>";
            echo "<td>".$fila['hora_tarea']."</td>";
            echo "<td>".$fila['descripcion_tarea']."</td>";
            echo "<td>".$fila['estado']."</td>";
            echo "<td class='d-flex justify-content-around'>";
            echo "<a href='Controlador/Modificartarea.php?pkid_tarea=".$fila['pkid_tarea']."' data-toggle='tooltip' data-placement='bottom' title='Modificar Tarea'>
                <span style='font-size: 1.5em; color: info;'>
                    <i class='fas fa-edit'></i>
                </span>
            </a>";
            echo "<a href='Controlador/Eliminartarea.php?pkid_tarea=".$fila['pkid_tarea']."' data-toggle='tooltip' data-placement='bottom' title='Eliminar Tarea'>
                <span style='font-size: 1.5em; color: red;'>
                    <i class='fas fa-trash-alt'></i>
                </span>
            </a>";
            echo "</td>";
            echo "</tr>";
            
        }
        echo "</table>";
    }

    function buscar($Observaciones){
        $consultas = new Consultas();
        $filas = $consultas -> buscartarea($Observaciones);//recibe todas las filas de la consulta 
        
        echo "<table class='table container text-center table-borderless'>
        <tr style='background: lightgray'>
            <th scope='col'>Nombre</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Hora</th>
            <th scope='col'>Descripcion</th>
            <th scope='col'>Estado</th>
            <th scope='col'>Acciones</th>
        </tr>";
        
        foreach ($filas as $fila){
            echo "<tr>";
            echo "<td scope='row'>".$fila['nombre_tarea']."</td>";
            echo "<td>".$fila['fecha_tarea']."</td>";
            echo "<td>".$fila['hora_tarea']."</td>";
            echo "<td>".$fila['descripcion_tarea']."</td>";
            echo "<td>".$fila['estado']."</td>";
            echo "<td class='d-flex justify-content-around'>";
            echo "<a href='Controlador/Modificartarea.php?pkid_tarea=".$fila['pkid_tarea']."' data-toggle='tooltip' data-placement='bottom' title='Modificar Tarea'>
                <span style='font-size: 1.5em; color: info;'>
                    <i class='fas fa-edit'></i>
                </span>
            </a>";
            echo "<a href='Controlador/Eliminartarea.php?pkid_tarea=".$fila['pkid_tarea']."' data-toggle='tooltip' data-placement='bottom' title='Eliminar Tarea'>
                <span style='font-size: 1.5em; color: red;'>
                    <i class='fas fa-trash-alt'></i>
                </span>
            </a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
?>