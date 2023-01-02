<?php
require($_SERVER['DOCUMENT_ROOT'].'/mvc/config/config.php');

 $msn = "";
 $texto = AbrirFichero($RABS);
 $lang = BuscarLang();
 $charset = array('es-ES' => 'utf-8','en-EN' => 'utf-8');
 $rutax = ObtenerRutaR($_SERVER['PHP_SELF']);
 // Formateamos las propiedades del header.php
 
 
  $methods = array("","GET","POST");
 
  /*
 // $met = comandos para abrir un fichero de una formas determinada:
 "r" - Read only. Starts at the beginning of the file
 "r+" - Read/Write. Starts at the beginning of the file
 "w" - Write only. Opens and truncates the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
 "w+" - Read/Write. Opens and truncates the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
 "a" - Write only. Opens and writes to the end of the file or creates a new file if it doesn't exist
 "a+" - Read/Write. Preserves file content by writing to the end of the file
 "x" - Write only. Creates a new file. Returns FALSE and an error if file already exists
 "x+" - Read/Write. Creates a new file. Returns FALSE and an error if file already exists
 "c" - Write only. Opens the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
 "c+" - Read/Write. Opens the file; or creates a new file if it doesn't exist. Place file pointer at the beginning of the file
 "e" - Only available in PHP compiled on POSIX.1-2008 conform systems.
 */
 
 $tipos = array(
     '' => '',
     'r Read Only' => 'r',
     'r+ Read/write' => 'r+',
     'w Read Only' => 'w',
     'w+ Read/Write' => 'r+',
     'a Read' => 'a',
     'a+ Read/Write' => 'a+',
     'x Read' => 'x',
     'x+ Read/Write' => 'x+',
     'c Read' => 'c',
     'c+ Read/Write' => 'c+',
     'e POSIX.1-2008 Read' => 'e',
    
 );
 
 if($_GET){
     //var_dump($_GET);
     if(isset($_GET['ruta']) and !empty($_GET['ruta'])){
         if(isset($_GET['nombre']) and !empty($_GET['nombre'])){
             if(isset($_GET['tipo']) and !empty($_GET['tipo'])){                
                 //echo print_r($_GET);                
                 $datos = $_SERVER['QUERY_STRING'];
                 $rut = $_GET['ruta'].'datos/'.$_GET['nombre'];
                 
                 $met = $_GET['tipo'];
                
                 if(GrabarFichero($rut,$met,$datos)){
                     header('Location:'.$_GET['rutapp'].'index.php?vista=ficheros&&msn=Todo salió bién');
                 }
                 else
                 {
                    header('Location:'.$_GET['rutapp'].'index.php?vista=ficheros&&msn=Todo salió bién');
                 }
                 
             }
         }
     }
    
 }
 
 if($_POST){
     if(isset($_POST['ruta']) and !empty($_POST['ruta'])){
         if(isset($_POST['nombre']) and !empty($_POST['nombre'])){
             if(isset($_POST['tipo']) and !empty($_POST['tipo'])){
                 if(isset($_POST['texto']) and !empty($_POST['texto'])){  
                    echo print_r($_POST);
                    /*
                     $datos = $_POST['texto'];
                     $rut = $_POST['ruta'].'datos/'.$_POST['nombre'];
                     
                     $met = $_POST['tipo'];
                     if(GrabarFichero($rut,$met,$datos)){
                         header('Location:'.$_POST['rutapp'].'index.php?vista=ficheros&&msn=Todo salió bién');
                     }
                     else
                     {
                        header('Location:'.$_POST['rutapp'].'index.php?vista=ficheros&&msn=Todo salió bién');
                     }
                     */
                 }
             }
         }
     }
 }
 function GrabarFichero($rut,$met,$msn){
        //var_dump($rut);
         $files = fopen($rut,$met);            
                 fwrite($files,$msn.PHP_EOL);   //PHP_EOL cambio de linea  
                 //fwrite($files,$msn.'&');
         fclose($files);
         return true;
 }
 function LeerFichero($rut,$met){
         $files = fopen($rut,$met);    
             $i=0;
             while(!feof($files)){
                 $datos[$i] = fgets($files). "<br>";                
                 $i++;
             }
         fclose($files);
         //var_dump($datos);
         return $datos;
 }
 function BuscarLang(){
     $langx = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
     $pos1 = stripos($langx,",",0);
     $pos2 = stripos($langx,";",0 );
     $totalc = $pos2 - $pos1;
     $lang = substr($langx,$pos1+1,$totalc-1);
     return $lang;
  }
 
 function ObtenerRutaR($rutax){
     
     $pos = strrpos($rutax,"/");
     $ruta = substr($rutax,0,$pos).'/';
     return $ruta;
 }
 
 function AbrirFichero($RABS){
   
     $rut = $RABS.'datos/datos.txt';
     $met = "a+";
     $datos = LeerFichero($rut,$met);
     //$datos = LimpiarBR($datos);
   
     
     return $datos;
 }
 function LimpiarBR($datos){
     $stdatos = str_replace(implode($datos), "<br>", "");
     //$datos = str_replace($datos, "</br>", "");
     //$datos = str_replace($datos, "<b>", "");
     echo print_r($datos);
 }
 ?>
