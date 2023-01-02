<?php
require_once('usuarios.php');
require_once('../model/usuarios.php');
if($_POST){   
    if((isset($_POST['rowid']) && !empty($_POST['rowid']) && isset($_POST['estado'])))
    {
     
      $rowid = $_POST['rowid'];
      $estado = $_POST['estado'];
      ActualizarEstadoUser($rowid,$estado);  
    }
}
function ActualizarEstadoUser($rowid,$estado){
    
    $con = ConectarBD();
    $sql = "UPDATE `users` SET `estado` = ".$estado." WHERE `rowid` = ".$rowid.";";    
    $res = $con->query($sql)or die("Error en la actualización del estado del usuario");
        
    if($res != 0){
        $msn = array();
        $msn['msn'] = "El estado del usuario ha sido modificado correctamente."; 
        $msn['valor'] = 1;
        echo json_encode($msn);
    }
    else
    {        
        $msn = array();
        $msn['msn'] = "No se puede actualizar el estado del usuario."; 
        $msn['valor'] = 2;
        echo json_encode($msn); 
    }
    

}
?>