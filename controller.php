<?php

require($_SERVER['DOCUMENT_ROOT'].'/mvc/config/config.php');

$varVista = CargarSubVista('galeria1');
// Objeto GET no tra la vista seleccionada desde el menu principal.
if($_GET){
    if(isset($_GET['vista']) and !empty($_GET['vista'])){
        $vista = $_GET['vista'];  
    }
    
    if(isset($_GET['accion']) and $_GET['accion'] == 'CERRAR'){
        session_start();        
        session_destroy();
        header('Location:'.$RHTTP.'index.php?vista=home');
    }
}
if($_POST){    
    if(isset($_POST['user']) && !empty($_POST['user'])){
        if(isset($_POST['pass']) && !empty($_POST['pass'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            require_once($_SERVER['DOCUMENT_ROOT'].'/'.$carpeta.'model/usuarios.php');
            $usuariosBD = CargarDatosUsuario();            
            foreach($usuariosBD as $users){   
                //print_r($users);
                $tipo = $users['tipo'];
                $estado = $users['estado'];         
                if($user == $users['user']){
                    if(md5($pass) ==  $users['pass']){
                        if($tipo == 1 || $tipo == 2 && $estado == 1){
                            session_start();
                            $_SESSION['user'] = $users['user'];                  
                            header('Location:'.$RHTTP.'index.php?vista=home');
                        }
                        else
                        {
                            $msn = "Este usuario no tienes permisos de acceso...";
                            header('Location:'.$RHTTP.'index.php?vista=login&msn='.$msn);
                        }
                    }
                    else
                    {
                        $msn = "USUARIO SIN VALIDAR";
                        header('Location:'.$RHTTP.'index.php?vista=login&msn='.$msn);
                    }
                }
                else
                {
                    $msn = "No existe el usuario en la Base de Datos";
                    header('Location:'.$RHTTP.'index.php?vista=login&msn='.$msn);
                }
            }
        }
    }
}
if($_FILES){}
if(isset($vista) and !empty($vista)){
    // CREAMOS 1 VALOR PARA LAS PAGINAS PÚBLICAS
    // CREAMOS 1 VALOR PARA LAS PÁGINAS PRIVADAS X USUARJO.
    // CREAMOS 1 VALOR PARA LAS PÁGINAS PRIVADAS ADMIN.
    
    if($vista=="contacto" || $vista == "servicios" || $vista == "tutorial" || $vista == "usuarios" || $vista == "ficheros" || $vista == "clientes" || $vista == "clientes_form"){        
    }else{
        $vista = 'home';
        if(isset($_GET['sub']) and !empty($_GET['sub'])){
            $subAncla = $_GET['sub'];
            $varVista = CargarSubVista($_GET['sub']);
        }         
    }    
}else{
    $vista = 'home';
}
function CargarSubVista($subAncla){
    //echo print_r($GLOBALS['carpeta']);
    require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
    switch($subAncla){
        case 'galeria1':            
            $res = '<article><script src="'.$RHTTP.'themes/js/script.js"></script></article>';            
        break;
        case 'galeria2':
            include('themes/home-galeria2.php');
            return;         
        break; 
        default:
            
            $res = '<article><script src="'.$RHTTP.'themes/js/script.js"></script></article>';        
        break;
    }
    
    return $res;
}












?>