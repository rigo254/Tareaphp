<?php
    class Consultas{

        public function insertarTarea($arg_Nombre, $arg_fecha, $arg_hora, $arg_descripcion){
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "insert into  tbl_tarea( nombre_tarea, fecha_tarea, hora_tarea, descripcion_tarea ) values(:nombre, :fecha, :hora, :descripcion)";//se hace la consulta
            $statement = $conexion->prepare($sql);//preparar la consulta
            //se pasan con binparam para evitar el sqlinyeccion
            $statement ->bindParam(':nombre',$arg_Nombre);
            $statement ->bindParam(':fecha',$arg_fecha);
            $statement ->bindParam(':hora',$arg_hora);
            $statement ->bindParam(':descripcion',$arg_descripcion);
        
            //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
            if(!$statement){
                return "Error al crear la tarea";
            }else{
                $statement->execute();
                //header("location: ../Pacientes.php");
            }
            
        }
        
        public function cargarTareas(){
            $row = null;
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "SELECT * FROM tbl_tarea";//se hace consulta
            $statement = $conexion->prepare($sql);//preparar la consulta
            $statement->execute();//ejecutamos el statement
            
            return $statement;
        }
    
        public function buscarTareas($arg_nombre){
            $rows = null;
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $nombre = "%".$arg_nombre."%";//se lo pasamos por el formulario
            $sql = "select * from tbl_tarea where nombre_tarea like :nombre";//se hace consulta
            $statement = $conexion->prepare($sql);//preparar la consulta
            $statement -> bindParam(":nombre",$nombre);
            $statement->execute();//ejecutamos el statement
            //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
            
            return $statement;
        }
        
        public function cargarTarea($arg_pkid){
            $row = null;
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "SELECT * FROM tbl_tarea where pkid_tarea = :pkid";//se hace consulta
            $statement = $conexion->prepare($sql);//preparar la consulta
            $statement->bindParam(":pkid",$arg_pkid);
            $statement->execute();//ejecutamos el statement

            return $statement;
        }

        public function eliminarTarea($arg_id_tarea){
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "delete from tbl_tarea where pkid_tarea = :id_tarea";
            $statement = $conexion->prepare($sql);//preparar la consulta
            $statement->bindParam(":id_tarea",$arg_id_tarea);
            if(!$statement){
                return "erro al eliminar";
            }else{
                $statement->execute();

            }
        }
    
        public function actualizarTarea($arg_id, $arg_Nombre, $arg_fecha, $arg_hora, $arg_descripcion){
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "update tbl_tarea set nombre_tarea=:nombre, fecha_tarea=:fecha, hora_tarea=:hora, descripcion_tarea=:descripcion where pkid_tarea=:id";
            $statement = $conexion->prepare($sql);
            $statement ->bindParam(':nombre',$arg_Nombre);
            $statement ->bindParam(':fecha',$arg_fecha);
            $statement ->bindParam(':hora',$arg_hora);
            $statement ->bindParam(':descripcion',$arg_descripcion);
            $statement->bindParam(":id",$arg_id);
            if(!$statement){
                return "error al modificar";
            }else{
                $statement->execute();
                return "Modificado exitosamente";
            }
        }

        public function tareaCompletada($arg_id){
            //se crea un objeto de de la clase conexion
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
            $sql = "UPDATE tbl_tarea SET estado='Completado' WHERE  pkid_tarea=:id";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id",$arg_id);
            if(!$statement){
                return "error al modificar";
            }else{
                $statement->execute();
                return "Modificado exitosamente";
            }
        }
    }
?>