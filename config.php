<?php
$host = $_SERVER['HTTP_HOST'];
$puerto = '80';
$puerto_sql = '8889'; 
$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
// SO SISTEMA OPERATIVO DE CADA DISPOSITIVO CONECTADO.
//$so = $_SERVER['SystemRoot'];
// MAIL DEL ADMINISTRADOR DEL SERVIDORY
$mail_admin = $_SERVER['SERVER_ADMIN'];
global $carpeta; // QUE ÉS ??????

$carpeta ='mvc/';
// RUTA ABSOLUTA DE LA CARPETA PUBLICA DE EL SERVIDOR LOCAL O ONLINE.
$RABS = $_SERVER['DOCUMENT_ROOT']."/".$carpeta; //Applications/MAMP/htdocs/mvc/

// RUTA WEB HTTP DE MI SESSION http://localhost:8080/mvc/
$RHTTP = "http://".$host."/".$carpeta;


//////////RUTAS PARA LAS VISTAS AL CONFIG //////////////////////////////////
// require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
// echo '<script> window.location.href = "'.$RHTTP.'index.php?vista=usuarios&&msn='.$msn.'"; </script>';
//$(document).ready(function(){$('#ListadoUsuarios').DataTable();});

?>