<?php
/*
$sql = "INSERT INTO `tareas_tipo` (`rowid`, `tipo`) VALUES (NULL, 'Personal')";
$sql = "INSERT INTO `tareas_tipo` (`rowid`, `tipo`) VALUES (NULL, 'Trabajo'), (NULL, 'Ocio');";
*/
function CargarDatosTablaTareas($con){
    
    $sql = "SELECT * FROM `tareas`";
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        
        return $datos;
    }
    else
    {
        $msn = "No hay datos en la tabla de Tareas";
        return $msn;
    }

}
function CargarDatosTareaTipos($con){
    
    $sql = "SELECT * FROM `tareas_tipo`";
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        
        return $datos;
    }
    else
    {
        $msn = "No hay datos en la tabla de Tareas";
        return $msn;
    }

}

function CargarDatosTablaTareasId($con,$rowid){
    
    $sql = "SELECT * FROM `tareas` WHERE `rowid`=".$rowid;
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        
        return $datos;
    }
    else
    {
        $msn = "No hay datos en la tabla de Tareas";
        return $msn;
    }

}

function GrabarDatosTareaBD($con, $d){
    
    $sql = "INSERT INTO `tareas`(`rowid`,`nombre`,`tipo`,`fecha`,`estado`) VALUE (null,'".$d['nombre']."',".$d['tipo'].",'".$d['fecha']."',".$d['estado'].")";
    $res = $con->query($sql);
    if($res != 0){
        return $res;
    }
    else
    {
        $msn = "No se ha podido insertar una nueva tarea en la Base de Datos.";
        return $msn;
    }
}

function UpdateDatosTareaBD($con, $d){
    $sql = "UPDATE `tareas` SET `nombre`='".$d['nombre']."' , `tipo`=".$d['tipo']." , `fecha`='".$d['fecha']."' , `estado`=".$d['estado']." WHERE `rowid`=".$d['rowid'];
    
    $res = $con->query($sql);
    if($res != 0){
        $msn = "DATOS ACTUALIZADOS CORRECTAMENTE";
        return $msn;
    }
    else
    {
        $msn = "DATOS NO ACTUALIZADOS CORRECTAMENTE";
        return $msn;
    }
    
    

}

function  BorrarDatosTareaId($con,$rowid){
    $sql = "DELETE FROM `tareas` WHERE `rowid`=".$rowid;
    $res = $con->query($sql);
    if($res != 0){
        $msn = "TAREA BORRADA CORRECTAMENTE";
        return $msn;
    }
    else
    {
        $msn = "NO SE HA PODIDO BORRAR LA TAREA";
        return $msn;
    }

}

?>