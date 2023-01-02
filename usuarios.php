<?php
require($_SERVER['DOCUMENT_ROOT'].'/mvc/config/config.php');
require_once($RABS.'model/model.php');

if($_POST){
    if(isset($_POST['accion']) && !empty($_POST['accion'])){
        if($_POST['accion'] == 'ADD_USERS'){
            $datos = $_POST;
            AddDatosUsuariosBD($datos);            
        }
        if($_POST['accion'] == 'EDIT_USERS'){                
            $datos = $_POST;
            $res = "";
           
            if($_FILES['foto_user']['name'] != ""){
                $DatosFoto = $_FILES;                
                $msnres = GuardarImagenesUsuario($datos, $DatosFoto);
            }
            else
            {
                $msnres = "";
            }
           
            EditDatosUsuariosBD($datos,$msnres);
        }
    }
}
if($_GET){
    
}

if($_FILES){
    $DatosFoto = $_FILES;
}

function CargarDatosUsuario(){
    $con = ConectarBD();
    $sql = "SELECT * FROM `users` ";
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;
    }else{
        return $error = "No se puede conectar con la tabla Users.";
    }
    mysqli_close($con);
}
function CargarDatosUsuariosIdBD($rowid){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    $con = ConectarBD();
    $sql = "SELECT * FROM `users` WHERE `rowid`=".$rowid;
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;        
        echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&rowid='.$datos['rowid'].'&&accion=EDIT_USERS;</script>';
    }else{
        return $error = "No se puede conectar con la tabla Users.";
    }
    mysqli_close($con);
}
function CargarDatosUsuariosDteIdBD($rowid){
    $con = ConectarBD();
    $sql = "SELECT * FROM `users_detalles` WHERE `iduser`=".$rowid;
    $datos_detalle = $con->query($sql);
    $total = mysqli_num_rows($datos_detalle);
    if($total != 0){
        return $datos_detalle;
        
    }else{
        return $error = "No se puede conectar con la tabla Users.";
    }
    mysqli_close($con);
}
function BuscarUsuarioCoincidente($user){
    $con = ConectarBD();
    $sql = "SELECT `user` FROM `users` WHERE `user`='".$user."';";
    $datos = $con->query($sql)or die( "No se puede conectar con la tabla USERS");    
    $total =  mysqli_num_rows($datos);
    if($total != 0){
        return true;
    }
    else
    {
        return false;
    }    
    mysqli_close($con);
}
function AddDatosUsuariosBD($datos){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    $con = ConectarBD();
    $sql = "INSERT INTO `users` (`rowid`, `user`, `pass`, `falta`, `estado`, `tipo`) VALUES (NULL,'".$datos['user']."', '".MD5($datos['pass'])."', '".$datos['falta']."',".$datos['estado']." , ".$datos['tipo'].");";
    $res = $con->query($sql)or die( "Error en la base de datos de Usuarios");    
    if($res != 0){        
        $sql = "SELECT `rowid` FROM `users` WHERE `user`='".$datos['user']."';";        
        $dato = $con->query($sql)or die("usuario no localizado en la tabla users");
        $total = mysqli_num_rows($dato);
        if($total != 0){
            foreach($dato as $field){ $iduser = $field['rowid'];}
            $sql = "INSERT INTO `users_detalles` (`rowid`, `iduser`, `nombre`, `mail`, `nif`, `foto`,`legal`) VALUES (NULL,".$iduser.", 'Usuario guest', 'ejemplo@ejemplo.com', 'xxxxxxx', 'http://localhost/mvc/images/users/default.jpg' ,'Off');";
            $res = $con->query($sql)or die("usuario no localizado en la tabla users");
            if($res != 0){  
                $msn = "Datos guardados correctamente";
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
            }
            else
            {
                $msn = "Datos NO guardados correctamente";
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
            }
        }
        else
        {
            $msn = "no se puede generar el id de usuario ya que se encuentra en la Tabla Users";
            echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
        }

    }
    else
    {
        $msn = "Datos NO guardados correctamente";
        echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';  
    }
    
    mysqli_close($con);
    
}
function GuardarRegistroUsuarioBD($datos){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    $con = ConectarBD();
    $sql = "INSERT INTO `users` (`rowid`, `user`, `pass`, `falta`, `estado`, `tipo`) VALUES (NULL,'".$datos['user']."', '".MD5($datos['pass'])."', '".$datos['falta']."', 0 , 3);";
    
    $res = $con->query($sql)or die( "Error en la base de datos de Usuarios");  
    if($res != 0){
        $msn = "Datos guardados correctamente";
        $sql = "SELECT `rowid` FROM `users` WHERE `user`='".$datos['user']."';";
        
        $dato = $con->query($sql)or die("usuario no localizado en la tabla users");
        $total = mysqli_num_rows($dato);
        if($total != 0){
            foreach($dato as $field){ $iduser = $field['rowid'];}
            $sql = "INSERT INTO `users_detalles` (`rowid`, `iduser`, `nombre`, `mail`, `nif`, `foto`,`legal`) VALUES (NULL,".$iduser.", '".$datos['nombre']."', '".$datos['mail']."', '".$datos['nif']."', 'http://localhost/mvc/images/users/default.jpg','".$datos['legal']."');";
            $res = $con->query($sql)or die( "Error en la base de datos de Usuarios");    
            if($res != 0){
                $msn = "Datos guardados correctamente";
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
                
            }
            else
            {
                $msn = "Datos NO guardados correctamente";
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';  
            }
        }
        else
        {
            $msn = "usuario no localizado en la base de datos";
            echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
        }
        
    }
    else
    {
        $msn = "Datos NO guardados correctamente";
        echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';  
    }
    
    mysqli_close($con);
}
function EditDatosUsuariosBD($datos,$msnfoto){
    
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');    
    $con = ConectarBD();    
    if(!empty($datos['pass'])){        
        $sql = "UPDATE `users` SET `user` = '".$datos['user']."', `pass` ='".MD5($datos['pass'])."', `falta` = '".$datos['falta']."', `estado` = ".$datos['estado'].", `tipo` = ".$datos['tipo']." WHERE `users`.`rowid` = ".$datos['rowid'].";";
    }
    else
    {
        $sql = "UPDATE `users` SET `user` = '".$datos['user']."', `falta` = '".$datos['falta']."', `estado` = ".$datos['estado'].", `tipo` = ".$datos['tipo']." WHERE `users`.`rowid` = ".$datos['rowid'].";";      
    }
    $res = $con->query($sql)or die("NO SE PUEDE ACTUALIZAR EL USUARIO EN LA BASE DE DATOS");
    if($res != 0){
        $sql = "UPDATE `users_detalles` SET `nombre` = '".$datos['nombre']."', `mail` = '".$datos['mail']."', `foto` = '".$datos['user']."', `legal` = '".$datos['legal']."' WHERE `users_detalles`.`iduser` = '".$datos['rowid']."';";
        $res = $con->query($sql)or die("NO SE PUEDE ACTUALIZAR EL USUARIO EN LA BASE DE DATOS");
        if($res != 0){
            $msn = "Datos Actualizados Correctamente";
            if($msnfoto != "")
            {            
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'&&msnfoto='.$msnfoto.'"; </script>';
            }
            else
            {
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>'; 
            }
        }
        else
        {
            $msn = "Datos No Actualizados Correctamente";
            if($msnfoto != ""){   
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'&&msnfoto='.$msnfoto.'"; </script>';
            }            
            else
            {
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>'; 
            }    
        }
        
        

    }
    else
    {
        $msn = "Datos NO Actualizados Correctamente";
        echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'&&msnfoto='.$msnfoto.'"; </script>';
    }
    mysqli_close($con);
   

    
}
function BorrarDatosUsuariosBD($rowid){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    $con = ConectarBD();
    $sql = "DELETE FROM `users_detalles` WHERE `iduser` =".$rowid;
    $res = $con->query($sql)or die("NO SE PUEDE ELEMINAR EL USUARIO O NO EXISTE EN LA BASE DE DATOS");
    if($res != 0){
        $sql = "DELETE FROM `users` WHERE `rowid` =".$rowid;
        $res = $con->query($sql)or die("NO SE PUEDE ELEMINAR EL USUARIO O NO EXISTE EN LA BASE DE DATOS");
        if($res != 0){
            $msn = "Usuario Borrado Correctamente";
            header('Location:'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn);
        }
        else
        {
            $msn = "No se puede Borrrar el Usuario o no exite";
            header('Location:'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn);
        }
    }
    else
    {
        $msn = "No se puede Borrrar el Usuario o no exite";
        header('Location:'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn);
    }

    mysqli_close($con);


}
function GuardarImagenesUsuario($datos, $DatosFoto){
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
   
   
    $name = $DatosFoto['foto_user']['name'];   
    $tipo = $DatosFoto['foto_user']['type'];
    $archivo =  SEONombreFoto($datos, $name,$tipo);
   
     //Si el archivo contiene algo y es diferente de vacio
     if (isset($archivo) && $archivo != "") {
       
      //Obtenemos algunos datos necesarios sobre el archivo
      
      $tmp = $DatosFoto['foto_user']['tmp_name'];
      $size = $DatosFoto['foto_user']['size'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($size < 2000000))) {
        
        $msn = '<b>Error. La extensión o el tamaño de los archivos no es correcta.<br>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
            
            if (move_uploaded_file($tmp, $RABS.'uploads/fotos_usuarios'.'/'.$archivo)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod($RABS.'uploads/fotos_usuarios'.'/'.$archivo, 0777);
                //Mostramos el mensaje de que se ha subido co éxito
                $msn =  '<div><b>Se ha subido correctamente la imagen.</b></div>';
               
            }
            else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                $msn = '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
      }
            
    }
    return $msn;
    
}
function SEONombreFoto($datos, $name,$tipo){
    $pos = strpos($tipo,"/");
    $ext = substr($tipo,$pos+1,100);

    $name = "dominio-usuario-foto-".$datos['rowid'].".".$ext;
    return $name;
}


?>