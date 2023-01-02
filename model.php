<?php
/********
 * 
 * $sql = "INSERT INTO `user` (`rowid`, `user`, `pass`, `falta`, `estado`) VALUES (NULL, \'root\', \'1234\', \'2022-11-04\', \'1\'), (NULL, \'admin\', MD5(\'1234\'), \'2022-11-04\', \'1\');";
 * 
 **********/
function ConectarBD(){
// conector de Base de Datos en Php
$host = "localhost:8889";
$user = "mvc_datos";
$bd = "mvc_datos";
$pass = "GcLgddxAX4If4Ln*";
$con = mysqli_connect($host,$user,$pass,$bd,8889);
return $con;
}



?>