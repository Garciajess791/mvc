<?php
/*
    $sql = "INSERT INTO `codipostal` (`internalid`, `cp`, `carrer`, `poblacio`, `provinciaid`, `provincia`, `paisid`, `pais`) VALUES (\'156751\', \'AD100\', \'xxxx\', \'Meritxell\', \'100\', \'Canillo\', \'AD\', \'Andorra\');";
    
   
    */
// FUNCIONES DATOS CLIENTE
function CargarDatosCliente($con){
    $sql = "SELECT * FROM `clientes`";   
    $datos = $con->query($sql);
    return $datos;
}
function CargarDatosClienteId($con,$rowid){
    $sql = "SELECT * FROM `clientes` WHERE `rowid`=".$rowid;   
    $datos = $con->query($sql);
    return $datos;
}
function GuardarDatosClientes($con,$RHTTP,$datos){
   
    $sql = "INSERT INTO `clientes` (`rowid`,`nombre`,`email`,`tel`,`nif`,`falta`) VALUES (null,'".$datos['nombre']."','".$datos['email']."','".$datos['tel']."','".$datos['nif']."','".$datos['falta']."'); ";
   
    $res = $con->query($sql)or die($msn = "Error en nuestra base de datos guardando Clientes");
    if($res !=0){
        $sql = "SELECT `rowid` FROM `clientes` ORDER BY `rowid` DESC LIMIT 1";
        $datos = $con->query($sql);
        $total = mysqli_num_rows($datos);
        if($total != 0){
            foreach($datos as $dato);
            $sql = "INSERT INTO `clientes_direccion` (`rowid`, `clienteid`, `paisid`, `provinciaid`, `poblaid`, `zip`, `via`, `direc`) VALUES (NULL, '".$dato['rowid']."', '', '0', '', '', '', '');";
            $res = $con->query($sql)or die( $msn ="error en recuperar id del cliente" );
            if($res != 0){
                $msn = "Toto ha ido fantástico maravillos de la muerte";
                header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn); 
            }else{
                header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn); 
            }
        }
        else
        {
            header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn); 
        }
    
    }
    else{
        header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn);
    }   
}
function UpdateDatosClientes($con,$RHTTP,$d){
   
    $sql = "UPDATE `clientes` SET `nombre` = '".$d['nombre']."', `email` = '".$d['email']."', `tel` = '".$d['tel']."', `nif` = '".$d['nif']."', `falta` = '".$d['falta']."' WHERE `clientes`.`rowid` =".$d['rowid'];
    
    $res = $con->query($sql)or die($msn = "Error en nuestra base de datos guardando Clientes");
    if($res != 0){
        $msn = "DATOS DEL CLIENTE ACTUALIZADOS CORRECTAMENTE";
        header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn);

    }
    else
    {
        $msn = "DATOS DEL CLIENTE NO ACTUALIZADOS CORRECTAMENTE";
        header('Location:'.$RHTTP.'index.php?vista=clientes_form&&error=2&&accion=EDIT_CLIENTES&&rowid='.$d['rowid'].'&&msndb='.$msn);
    }
    
    
}
function BorrarDatosClientes($con,$RHTTP,$rowid){
    $sql = "DELETE FROM `clientes` WHERE `clientes`.`rowid` =".$rowid;    
    if($con->query($sql)){
        echo '<script> window.location.href="'.$RHTTP.'index.php?vista=clientes";</script>';
    }else{ 
        $msndel="no se ha podido borrar el dato de Clientes" ;
        echo '<script> window.location.href="'.$RHTTP.'index.php?vista=clientes&&msndel='.$msndel.'";</script>';
    }
}

//FUNCIONES DATOS POBLACION CLIENTE 

function CargarDatosPostales($con){
    $sql = "SELECT * FROM `codipostal`";
    $datos = $con->query($sql)or die($msn = "NO SE PUEDE ACCEDER A LA TABLA CODIPOSTAL");
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;
    }
    else
    {
        return $msn;
    }
}

function CargarDatosPais($con){
    $sql = "SELECT * FROM `pais`";
    $datos = $con->query($sql)or die($msn = "NO SE PUEDE ACCEDER A LA TABLA PAÍS");
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;
    }
    else
    {
        return $msn;
    }
}
function CargarDatosProv($con){
    $sql = "SELECT * FROM `provincia`";
    $datos = $con->query($sql)or die($msn = "NO SE PUEDE ACCEDER A LA TABLA PROVINCIA");
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;
    }
    else
    {
        return $msn;
    }
}
function CargarDatosProvIdNombre($con,$pais,$proid){
    if($pais=='ES'){
        $sql = "SELECT `provincia` FROM `provincia` WHERE `provinciaid`=".$proid;
    }else{
        $sql = "SELECT `provincia` FROM `provinciaad` WHERE `provinciaid`=".$proid;
    }
   
    $datos = $con->query($sql)or die($msn = "NO SE PUEDE ACCEDER A LA TABLA PROVINCIA");
    $total = mysqli_num_rows($datos);
    if($total != 0){
        return $datos;
    }
    else
    {
        return $msn;
    }
}

function CargarDatosPoblacionCliente($con, $RHTTP, $rowid){
    $sql = "SELECT * FROM `clientes_direccion` WHERE `clienteid`=".$rowid;
    $datos = $con->query($sql)or die($msn="Error");
    $total = mysqli_num_rows($datos);
    if($total != 0){
        foreach($datos as $row);
        return $row;
        
    }
    else
    {
        return $msn;
    }

}

function  GuardarDatosClientesDir($con,$RHTTP,$d){
    $sql = "SELECT `clienteid` FROM `clientes_direccion` WHERE `clienteid`=".$d['clienteid'];
    $datos = $con->query($sql);
    $total = mysqli_num_rows($datos);
    if($total != 0){
        $sql = "UPDATE `clientes_direccion` SET `paisid` = '".$d['pais']."', `provinciaid` = ".$d['prov'].", `poblaid` = '".$d['pobla']."', `zip` = '".$d['zip']."', `via` = '".$d['via']."', `direc` = '".$d['direc']."' WHERE `clienteid`=".$d['clienteid'];
        $res = $con->query($sql)or die($msn = "Error en nuestra base de datos guardando Direcciones Clientes");
        if($res != 0){
            $msn = "DATOS DE LA DIRECCIÓN DEL CLIENTE ACTUALIZADOS CORRECTAMENTE";
            header('Location:'.$RHTTP.'index.php?vista=clientes&&error=1&&msndb='.$msn);
    
        }
        else
        {
            $msn = "DATOS DE LA DIRECCIÓN DEL CLIENTE NO ACTUALIZADOS CORRECTAMENTE";
            header('Location:'.$RHTTP.'index.php?vista=clientes_form&&error=2&&accion=EDIT_CLIENTES&&rowid='.$d['rowid'].'&&msndb='.$msn);
        }

    }else{
        $sql = "INSERT INTO `clientes_direccion` (`rowid`, `clienteid`, `paisid`, `provinciaid`, `poblaid`, `zip`, `via`, `direc`) VALUES (NULL, ".$d['clienteid'].", '".$d['pais']."', ".$d['prov'].", '".$d['pobla']."', '".$d['zip']."', '".$d['via']."','".$d['direc']."');";
        $res = $con->query($sql)or die($msn = "Error en nuestra base de datos guardando Direcciones Clientes");
        if($res != 0){
            $msn = "DATOS DE LA DIRECCIÓN DEL CLIENTE ACTUALIZADOS CORRECTAMENTE";
            header('Location:'.$RHTTP.'index.php?vista=clientes_form&&error=1&&msndb='.$msn);
    
        }
        else
        {
            $msn = "DATOS DE LA DIRECCIÓN DEL CLIENTE NO ACTUALIZADOS CORRECTAMENTE";
            header('Location:'.$RHTTP.'index.php?vista=clientes_form&&error=2&&accion=EDIT_CLIENTES&&rowid='.$d['rowid'].'&&msndb='.$msn);
        }
    }
   
}

function CargarNombrePoblaCP($con,$zip){
    $sql = "SELECT `poblacio` FROM `codipostal` WHERE `cp`='".$zip."';";
    $datos = $con->query($sql)or die( $msn="Esto es un infierno");
    $total = mysqli_num_rows($datos);
    if($total !=0){
        return $datos;
    }else{
        return $msn;
    }

}


?>