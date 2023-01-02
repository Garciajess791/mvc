<?php
require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');

require_once($RABS.'model/usuarios.php');
$dUsers = CargarDatosUsuario();

$total = mysqli_num_rows($dUsers);
$tipoform = 'ADD_USERS';
$tipouser = ["","Admin","Editor","Invitado"];




if($_GET){
    if(isset($_GET['accion']) and !empty($_GET['accion'])){
        if($_GET['accion'] == 'EDIT_USERS'){
            $datos = $_GET;
            $DatosU = CargarDatosUsuariosIdBD($datos['rowid']);
            $DatosUD = CargarDatosUsuariosDteIdBD($datos['rowid']);


           
            
            foreach($DatosU as $DatosUser);
            foreach($DatosUD as $dto_dte);
            
            
            $tipoform = $_GET['accion'];
            
        }
        if($_GET['accion'] == 'DELETE_USERS'){
            $datos = $_GET;
            $DatosU = BorrarDatosUsuariosBD($datos['rowid']);            
        }
    }    
}
if($_POST){
    if(isset($_POST['accion']) and !empty($_POST['accion'])){
        if($_POST['accion'] == 'REG_USERS'){                               
                $datos['nombre'] = $_POST['nombre'];
                $validar = BuscarUsuarioCoincidente($_POST['user']);
                if($validar == false){
                    $datos['user'] = $_POST['user'];
                }
                else
                {
                    $msn = "Este usuario ya existe, elija otro nombre de usuario";
                    header('Location:'.$RHTTP.'index.php?vista=home&&msn='.$msn);
                    
                }
                $datos['falta'] = BuscarFechaHoy();
                $datos['pass'] = md5($_POST['pass']);
                $datos['mail'] = $_POST['mail'];
                $datos['nif'] = $_POST['nif'];
                $datos['accion'] = $_POST['accion'];
                $datos['legal'] = $_POST['legal'];
            
                $res = GuardarRegistroUsuarioBD($datos);
            
        }        
    }
}
if($_FILES){
   $datosf = $_FILES;
}
function BuscarFechaHoy(){
    $hoy =  Date('Y-m-d');
    return $hoy;
}
?>