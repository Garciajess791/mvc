<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/config/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'model/model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'model/clientes.php');
$con = ConectarBD();
$con->set_charset("utf8mb4");
//VARIABLES DE BASE DE DATOS
$DatosClientes = CargarDatosCliente($con);
$DatosPost = CargarDatosPostales($con);
$DatosProv = CargarDatosProv($con);
$DatosPais = CargarDatosPais($con);

if($_GET){
    if(isset($_GET['accion']) and !empty($_GET['accion']) and $_GET['accion'] == 'EDIT_CLIENTES'){ 
        if(isset($_GET['rowid'])){
            $rowid = $_GET['rowid']; 
            
            if(!empty($rowid)){
                $DatosCliente = CargarDatosClienteId($con,$rowid);
                $DPC = CargarDatosPoblacionCliente($con, $RHTTP, $rowid);           
                
                $proid = $DPC['provinciaid'];
                if(!empty($proid)){
                    $nombreprov = CargarDatosProvIdNombre($con,$DPC['paisid'],$proid);
                    foreach($nombreprov as $nombre);
                    $nombrepobla = CargarNombrePoblaCP($con,$DPC['zip']);
                    foreach($nombrepobla as $nompobla);      
                }
                if($DPC['paisid']=='ES'){ $selected ='selected';}else{ $selected="";   
            }
          
        }           
            
        }
        if(isset($_GET['rowid'])){
            
        }
    }
    if(isset($_GET['accion']) and !empty($_GET['accion']) and $_GET['accion'] == 'DELETE_CLIENT'){ 
        if(isset($_GET['rowid'])){
            $rowid = $_GET['rowid'];       
            BorrarDatosClientes($con,$RHTTP,$rowid); 
        }
    }
   
}
if($_POST){    
    if(isset($_POST['accion']) and !empty($_POST['accion']) and $_POST['accion'] == 'ADD_CLIENTES'){
         GuardarDatosClientes($con, $RHTTP, $_POST);    
    }
    
    if(isset($_POST['accion']) and !empty($_POST['accion']) and $_POST['accion'] == 'UPDATE_CLIENTES'){
           
        UpdateDatosClientes($con,$RHTTP,$_POST); 
        
    }
    if(isset($_POST['accion']) and !empty($_POST['accion']) and $_POST['accion'] == 'UPDATE_CLIENTES_DIR'){    
        $res = GuardarDatosClientesDir($con,$RHTTP, $_POST);
    }
}






?>