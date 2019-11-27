<?php
function seleccionar(){
    if(isset($_GET['pkid_tarea'])){
$consultas = new Consultas();
$PkId = $_GET['pkid_tarea'];
$filas = $consultas->cargartarea($PkId);

foreach($filas as $fila){
    echo '
    <div class="container">
   <label for="exampleFormControlSelect2" class="col text-center">Modificar Tarea</label>
    <form method="post" action="Modificartarea2.php">
  <div class="form-group">   
    <input name="nombre" class="form-control"  placeholder="Nombre Tarea" value="'.$fila['nombre_tarea'].'">   
  </div>  
   <div class="form-group"> 
   <label class="col-md-6 text-left">Fecha de tarea</label>   
    <input name="fecha" type="date"  class="form-control"  value="'.$fila['fecha_tarea'].'">
  </div>
  <div class="form-group"> 
   <label class="col-md-6 text-left">Hora de la tarea</label>   
    <input name="hora" type="time"  class="form-control"  value="'.$fila['hora_tarea'].'">
  </div> 

  
   <div class="form-group">    
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion de la tarea" name="descripcion"></textarea>
  </div>
   <div class="form-group"> 
  <td>&nbsp;</td>
    <input type="hidden" name="estado"  class="form-control"   value="completado">
    <input type="hidden" name="pkid_tarea"  class="form-control"   value="'.$PkId.'">
  </div> 
  </div>
  <div>
  <center>
      <button type="submit" class="btn btn-primary">Modificar</button>
      <a class="btn btn-primary" href="../verTarea.php">Volver</a>
  </center>
  </div>
</form>
   </div>

';
    
}


    }
}

?>