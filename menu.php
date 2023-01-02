<?php
require('config/config.php');
$BtnName =  [
    ['Home',$RHTTP.'index.php?vista=home'],
    ['Servicios',$RHTTP.'index.php?vista=servicios'],
    ['Contacto',$RHTTP.'index.php?vista=contacto'],
    ['Tutoriales',$RHTTP.'index.php?vista=tutorial'],
    ['Ficheros',$RHTTP.'index.php?vista=ficheros'],
    ['Clientes',$RHTTP.'index.php?vista=clientes'],
    ['Usuarios',$RHTTP.'index.php?vista=usuarios']
        
];   
 
echo '<nav class="navbar navbar-expand-lg bg-light"><div class="container-fluid"><a class="navbar-brand " href="#">Navbar</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarSupportedContent"><ul class="navbar-nav me-auto mb-2 mb-lg-0">';

$estado = "";
foreach($BtnName as $btn){
    //var_dump($btn);
    echo '<li class="nav-item" value="'.$btn[0].'"><a class="nav-link '.$estado.'" href="'.$btn[1].'" aria-current="page"> '.$btn[0].'</a></li>';
   
 
}
echo '</ul>';
echo '<form class="d-flex" role="search"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success" type="submit">Search</button></form></div></div>';
echo '<a class="btn btn-primary btn-sm" href="controller/controller.php?accion=CERRAR" >CERRAR SESSION</a>';
echo '</nav>';
?>


