<?php

function cargar(){
    $consultas = new Consultas();
    $filas = $consultas -> cargartarea();//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Id</th>
     <th>Nombre</th>
     <th>Fecha</th>
     <th>Hora</th>
     <th>Descripcion</th>
     <th>Estado</th>
      
      
      
    </tr>";
    
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['pkid_tarea']."</td>";
        echo "<td>".$fila['nombre_tarea']."</td>";
        echo "<td>".$fila['fecha_tarea']."</td>";
        echo "<td>".$fila['hora_tarea']."</td>";
        echo "<td>".$fila['descripcion_tarea']."</td>";
        echo "<td>".$fila['estado']."</td>";
     

        echo "<td><a href='Controlador/Modificartarea.php?pkid_tarea=".$fila['pkid_tarea']."'>Modificar</td>";
        echo "<td><a href='Controlador/Eliminartarea.php?pkid_tarea=".$fila['pkid_tarea']."'>Eliminar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
function buscar($Observaciones){
    $consultas = new Consultas();
    $filas = $consultas -> buscartarea($Observaciones);//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Id</th>
     <th>Nombre</th>
     <th>Fecha</th>
     <th>Hora</th>
     <th>Descripcion</th>
     <th>Estado</th>
      
      
      
    </tr>";
    
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['pkid_tarea']."</td>";
        echo "<td>".$fila['nombre_tarea']."</td>";
        echo "<td>".$fila['fecha_tarea']."</td>";
        echo "<td>".$fila['hora_tarea']."</td>";
        echo "<td>".$fila['descripcion_tarea']."</td>";
        echo "<td>".$fila['estado']."</td>";
     

        echo "<td><a href='Controlador/Modificartarea.php?pkid_tarea=".$fila['pkid_tarea']."'>Modificar</td>";
        echo "<td><a href='Controlador/Eliminartarea.php?pkid_tarea=".$fila['pkid_tarea']."'>Eliminar</td>";
        echo "</tr>";
        
    
    }
    echo "</table>";
}

?>