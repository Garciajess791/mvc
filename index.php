
 <?php
 //echo print_r($_SERVER);
 require('config/config.php');

session_start();
//echo print_r($_SESSION);
 require_once('vendor/mmucklo/krumo/class.krumo.php');

 require('model/model.php');
 require('controller/controller.php'); 
 
 
 require_once('themes/header.php'); 
 
    
   if(isset($_SESSION['user'])){
      include('themes/'.$vista.'.php');  
   } 
   else
   {    
     include('themes/login.php');  
   }
  

 require_once('themes/footer.php');


?>

