<?php
require($_SERVER['DOCUMENT_ROOT'].'/'.'mvc/config/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'model/servicios.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'model/model.php');
$con = ConectarBD(); // CONECXION CON BD
$accion = "";
$msn = "";
$datosTabla = CargarDatosTablaTareas($con);
$datosTipo = CargarDatosTareaTipos($con);



//$datosTabla = CargarVista();
if($_GET){   
    if(isset($_GET['accion']) and !empty($_GET['accion'])){
        if($_GET['accion'] == 'ADD_TAREA'){                     
            $accion='ADD_TAREA';
        }
        if($_GET['accion'] == 'UPDATE_TAREA'){                     
            $accion='UPDATE_TAREA';
            $datosForm = CargarDatosTablaTareasId($con,$_GET['rowid']);
            foreach($datosForm as $d);
        }
        if($_GET['accion'] == 'DELETE_TAREA'){                     
            $res = BorrarDatosTareaId($con,$_GET['rowid']);
            if(is_string($res) || $res==1){        
                header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
            }else{
                header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
            }

            
        }
    }
}

if($_POST){
       
    if(isset($_POST['accion']) && !empty($_POST['accion'])){
        $accion = $_POST['accion'];
        if($accion == 'ADD_TAREA'){
            ProcesarDatos($con, $RHTTP, $RABS , $_POST);
        }
        if($accion == 'UPDATE_TAREA'){
            ActualizarDatos($con, $RHTTP, $RABS, $_POST);
        }
    }
}

function ProcesarDatos($con, $RHTTP, $RABS, $datos){  
   
    $dTabla['nombre'] = $datos['nombre'];
    $dTabla['tipo'] = $datos['tipo'];        
    $dTabla['fecha'] = $datos['fecha'];
    $dTabla['estado'] = $datos['estado'];        
   
    $res = GrabarDatosTareaBD($con, $dTabla);
 
    if(is_string($res) || $res==1){        
        header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
    }else{
        header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
    }
   
}
function ActualizarDatos($con, $RHTTP, $RABS, $datos){  
   
    $dTabla['rowid'] = $datos['rowid'];
    $dTabla['nombre'] = $datos['nombre'];
    $dTabla['tipo'] = $datos['tipo'];        
    $dTabla['fecha'] = $datos['fecha'];
    $dTabla['estado'] = $datos['estado'];        
   
    $res = UpdateDatosTareaBD($con, $dTabla);
    
    if(is_string($res) || $res==1){        
        header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
    }else{
        header( 'Location:'.$RHTTP.'index.php?vista=servicios&&msn='.$res);
    }
    
   
}
/*


function DatosTabla(){
    $file = fopen("datos/datos.txt", "r");
    $i=0;
    while(!feof($file)) {
        $datos[$i] = fgets($file). "<br />";
        $i++;
    }
    fclose($file);
    return $datos;
}



function LlenarSelectTipo(){
    $op = ['','Trabajo','Hogar','Personal','Festivo'];
    return $op;
}



function CargarVista($vista,$datosTabla,$msn){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    
    $ruta = $RHTTP."index.php?";
    $vista ='vista='.$vista;
    $msn = '&&msn='.$msn;    
    //$datos = '&&nombre='.$datosTabla['nombre'].'&&tipo='.$datosTabla[0]['tipo'].'&&fecha='.$datosTabla[0]['fecha'].'&&estado='.$datosTabla[0]['estado'].'&&msn='.$msn;
    header('location:'.$ruta.$vista.$msn);
    
}
*/
?>