<?php
require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
/* Controlador de Contacto */
if($_GET){
    if(isset($_GET['msn']) and !empty($_GET['msn'])){
        $msn = $_GET['msn'];
        FuncionAlerta($msn);
    }
}
if($_POST){   
    if(isset($_POST['accion']) and !empty($_POST['accion'])){
        if($_POST['accion'] == 'form-user'){
            RecibirFormUser($_POST);
        }
    }
}
if($_FILES){
    echo print_r($_FILES);
    GuardarFoto($_FILES);
}
function RecibirFormUser($DatosUser){
    //var_dump($DatosUser);    
}
function GuardarFoto($Foto){
    //datos del arhivo
    //var_dump($Foto);
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    $nombre_archivo = $Foto['foto_user']['name'];
    $tipo_archivo = $Foto['foto_user']['type'];   
    $tamano_archivo = $Foto['foto_user']['size'];
    $ruta_temp = $Foto['foto_user']['tmp_name'];
    $name_seo = "dominio-categoria-producto-".$nombre_archivo;
    $ruta = $RABS.'uploads/';
    //compruebo si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg")) && ($tamano_archivo < 100000))) {
        echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
    }else{
        if (move_uploaded_file( $ruta_temp ,  $ruta.$name_seo )){
                $msn = "El archivo ha sido cargado correctamente.";               
                echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=contacto&msn='.base64_encode($msn).'; </script>';
        }else{
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }
    }
}
function FuncionAlerta($msn){
    echo '<div id="alerta" class="alert alert-success" role="alert" >'.base64_decode($msn).'</div>';
}

?>