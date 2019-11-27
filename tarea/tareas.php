<?php 
    require_once('Modelo/Conexion.php');
    require_once('Modelo/Consultastareas.php');
    require_once('Controlador/Cargartareas.php');
    
    $consultas = new Consultas();
    $conta = $consultas -> haytareas();

    if ( $conta > 0 ) {
        if(isset($_GET['buscar'])){
            buscar($_GET['buscar']);
        }else{
            cargar();
        }
    } else {
        echo 
        '<div>
            <h2 class="text-center">No hay tareas</h2>
        </div>';
    }
?>