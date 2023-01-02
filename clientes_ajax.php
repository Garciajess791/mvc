<?php 
require($_SERVER['DOCUMENT_ROOT'].'/mvc/config/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/mvc/model/model.php');
$con = ConectarBD();
if($_POST){
    if(isset($_POST['paisid'])){
        $paisid = $_POST['paisid'];
        if($paisid == 'ES'){
            $bprov = BuscarProvinciasES($con);
            echo '<option value=""></option>';
            foreach($bprov[0] as $row){                
                echo '<option value="'.$row['provinciaid'].'">'.$row['provincia'].'</option>';
            }
        }
        if($paisid == 'AD')
        {
            $bprov = BuscarProvinciasAD($con);
            echo '<option value=""></option>';
            foreach($bprov[0] as $row){                
                echo '<option value="'.$row['provinciaid'].'">'.$row['provincia'].'</option>';
            } 
        }
    }    
    if(isset($_POST['provinciaid'])){
        $proviid = $_POST['provinciaid'];
        
        $bprov = BuscarPoblacion($con, $proviid);
        echo '<option value=""></option>';
            foreach($bprov[0] as $row){ 
                //echo print_r($row);               
                echo '<option value="'.$row['cp'].'">'.$row['poblacio'].'</option>';
            }
    }
    if(isset($_POST['idzip'])){
        $zip = $_POST['idzip'];
        
        $bprov = BuscarCalle($con, $zip);
        echo '<option value=""></option>';
            foreach($bprov[0] as $row){ 
                echo print_r($row);               
                echo '<option value="'.$row['cp'].'">'.$row['carrer'].'</option>';
            }
    }
}
function BuscarProvinciasES($con){
   $sql = "SELECT * FROM `provincia`";
   $datos = $con->query($sql)or die($msn="error en la base de datos") ;
   
   $total = mysqli_num_rows($datos);
   if($total != 0){
        $i = 0;
        foreach($datos as $prov){
            //echo print_r($prov);            
            $provi[0][$i]=$prov;
            $i++;
            
        }        
        return $provi;
   }else{
        return $msn;
   }
   
}
function BuscarProvinciasAD($con){
    $sql = "SELECT * FROM `provinciaad`";
    $datos = $con->query($sql)or die($msn="error en la base de datos") ;
    $total = mysqli_num_rows($datos);
    if($total != 0){
        $i = 0;
        foreach($datos as $prov){
            $provi[0][$i]=$prov;
            $i++;
        }        
        return $provi;
    }else{
        return $msn;
    } 
}
function BuscarPoblacion($con,$proviid){
    $sql = "SELECT * FROM `codipostal` WHERE `provinciaid`=".$proviid;
    $datos = $con->query($sql)or die($msn="error en la base de datos") ;
    $total = mysqli_num_rows($datos);
    if($total != 0){
        $i = 0;
        foreach($datos as $row){
            $pobla[0][$i]=$row;
            $i++;
        }        
        return $pobla;
   }else{
        return $msn;
   }
}
function BuscarCalle($con, $zip){
    $sql = "SELECT * FROM `codipostal` WHERE `cp`=".$zip;
    $datos = $con->query($sql)or die($msn="error en la base de datos") ;
    $total = mysqli_num_rows($datos);
    if($total != 0){
        $i = 0;
        foreach($datos as $row){
            $calle[0][$i]=$row;
            $i++;
        }        
        return $calle;
   }else{
        return $msn;
   }
}
?>