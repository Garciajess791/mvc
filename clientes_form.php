<?php require_once('controller/clientes.php'); ?>

<section class="container p-3 mb-3">
  
    <?php 
                if(isset($_GET['msndb']) and !empty($_GET['msndb'])){  
                echo '<div class="alert alert-danger" role="alert">'.$_GET['msndb'].'</div>'; 
                }
    
    if(isset($_GET['accion'])){
        if($_GET['accion']=="ADD_CLIENTES"){
        ?>    
            <form method="post" action="<?php echo 'controller/clientes.php' ?>" >
            <h2>Formulario de Clientes:</h2>
                    <div class="mb-2">
                    <input type="text" placeholder="Nombre:" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-2">
                    <input type="mail" placeholder="correo electrónico:" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                    <input type="text" placeholder="Teléfono:" class="form-control" name="tel" required>
                    </div>
                    <div class="mb-2">            
                    <input type="text" placeholder="NIF/CIF/NIE:" class="form-control" name="nif" onchange="CalcularNif(this);" required>
                    </div>
                    <div class="mb-2">
                    <label>Fecha de alta</label>
                    <input type="date" placeholder="Fecha alta:" class="form-control" name="falta" required>
                    </div>

                    <div>
                        <input type="hidden" name="accion" value="ADD_CLIENTES" />
                        <input class="btn btn-primary" type="submit" value="GUARDAR CLIENTE" />
                        <input class="btn btn-danger" type="reset" value="RESET" />
                        <a class="btn btn-primary" href="<?php echo $RHTTP.'index.php?vista=clientes'; ?>" ><i class="fa-solid fa-rectangle-xmark"></i> CERRAR</a>
                    </div>

            </form>
        
        <?php
        }
    
        if($_GET['accion']=="EDIT_CLIENTES"){
        ?>
        <?php foreach($DatosCliente as $d){ ?>
            <form method="post" action="<?php echo 'controller/clientes.php' ?>" >        
            <h2>Formulario de Actualizar Clientes:</h2>
                    <div class="mb-2">
                    <input type="text" placeholder="Nombre:" class="form-control" name="nombre" value="<?php echo $d['nombre']; ?>" required>
                    </div>
                    <div class="mb-2">
                    <input type="mail" placeholder="correo electrónico:" class="form-control" name="email" value="<?php echo $d['email']; ?>" required>
                    </div>
                    <div class="mb-2">
                    <input type="text" placeholder="Teléfono:" class="form-control" name="tel" value="<?php echo $d['tel']; ?>" required>
                    </div>
                    <div class="mb-2">            
                    <input type="text" placeholder="NIF/CIF/NIE:" class="form-control" name="nif" value="<?php echo $d['nif']; ?>" required>
                    </div>
                    <div class="mb-2">
                    <label>Fecha de alta</label>
                    <input type="date" placeholder="Fecha alta:" class="form-control" name="falta" value="<?php echo $d['falta']; ?>" required>
                    </div>

                    <div>
                        <input type="hidden" name="accion" value="UPDATE_CLIENTES" />
                        <input type="hidden" name="rowid" value="<?php echo $d['rowid']; ?>" />
                        <input class="btn btn-primary" type="submit" value="GUARDAR CLIENTE" />
                        <input class="btn btn-danger" type="reset" value="RESET" />
                        <a class="btn btn-primary" href="<?php echo $RHTTP.'index.php?vista=clientes'; ?>" ><i class="fa-solid fa-rectangle-xmark"></i> CERRAR</a>
                    </div>
            </form>
            <?php } ?>
        <?php
        }
    }
    ?>
</section>

<?php
if(isset($_GET['accion'])){
      if($_GET['accion']=="ADD_CLIENTES"){
?>        
    <!--
        <section class="container p-3 mb-3">
            <h2>DATOS POSTALES CLIENTE NUEVO</h2>
            <form class="container p-3 mb-3" method="post" action="<?php //echo 'controller/clientes.php'; ?>">
                <div class="row">
                    <div class="col-lg-4">
                        
                        <div class="form-group">
                            <label>País:</label>
                            <select id="pais" class="form-control" name="pais" onchange="BuscarProv(this.value)">
                                <option></option>
                                <?php
                                /*
                                if(isset($DatosPais)){
                                    foreach($DatosPais as $p){
                                        echo '<option value="'.$p['paisid'].'" '.$selected.'>'.utf8_encode($p['pais']).'</option>';
                                    }
                                }
                                */
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Provincia:</label>
                            <select id="prov" class="form-control" name="prov" onchange="BuscarPobla(this.value)" >
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Población</label>
                            <select id="pobla" class="form-control" name="pobla" onchange="BuscarZip(this.value)">
                                
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>CP-ZIP:</label>
                            <input value="" class="form-control" type="text" name="zip" id="zip" onchange="BuscarCalle(this.value)"/>
                        </div>      
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Tipo de Via</label>
                            <select class="form-control" name="via">
                                <option></option>
                                <option>Calle</option>
                                <option>Plaza</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Dirección:</label>
                            <div id="direcamano">
                                <select id="direc" class="form-control" name="direc" onkeypress="CambiarInput(this.name)"></select>
                            </div>    
                        </div>
                    </div>
                </div>        
                <div class="form-group mt-2 mb-5">
                    <input type="hidden" name="accion" value="ADD_CLIENTES_DIR" />
                    <input type="submit" class="btn btn-primary" value="GUARDAR" />
                    <input type="reset" class="btn btn-danger" value="RESET" />
                </div>
            </form>
        </section>
        -->
<?php } 
      if($_GET['accion']=="EDIT_CLIENTES"){
?>
        <section class="container p-3 mb-3">
            <h2>DATOS POSTALES DE <?php echo $d['nombre']; ?></h2>
            <form class="container p-3 mb-3" method="post" action="<?php echo 'controller/clientes.php'; ?>">
                <div class="row">
                    <div class="col-lg-4">
                        
                        <div class="form-group">
                            <label>País:</label>
                            <select id="pais" class="form-control" name="pais" onchange="BuscarProv(this.value)">
                                <option></option>
                                <?php
                                if(isset($DatosPais)){
                                    foreach($DatosPais as $p){
                                        if(!empty($p)){
                                            echo '<option value="'.$p['paisid'].'" '.$selected.'>'.utf8_encode($p['pais']).'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Provincia:</label>
                            <select id="prov" class="form-control" name="prov" onchange="BuscarPobla(this.value)" >
                            <?php 
                            if(!empty($proid) && !empty($nombre['provincia'])){ 
                                echo '<option value="'.$proid.'">'.$nombre['provincia'].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Población</label>
                            <select id="pobla" class="form-control" name="pobla" onchange="BuscarZip(this.value)">
                            <?php 
                            if(!empty($DPC['zip']) && !empty($nompobla['poblacio'])){ 
                                echo '<option value="'.$DPC['zip'].'">'.$nompobla['poblacio'].'</option>';
                            }
                            ?>                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>CP-ZIP:</label>
                            
                            <input value="<?php if(!empty($DPC['zip'])){ echo $DPC['zip'];} ?>" class="form-control" type="text" name="zip" id="zip" onchange="BuscarCalle(this.value)"/>
                        </div>      
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Tipo de Via</label>
                            <select class="form-control" name="via">
                                <option></option>
                                <option <?php if($DPC['via']=='Calle'){ echo $selvia ='selected';}else{ echo $selvia=""; }  ?> >Calle</option>
                                <option <?php if($DPC['via']=='Plaza'){ echo $selvia ='selected';}else{ echo $selvia=""; }   ?> >Plaza</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Dirección:</label>
                            <div id="direcamano">
                                <select id="direc" class="form-control" name="direc" onkeypress="CambiarInput(this.name)">
                                <?php 
                                if(!empty($DPC['direc']) && !empty($DPC['direc'])){ 
                                    echo '<option value="'.$DPC['direc'].'">'.$DPC['direc'].'</option>';
                                }
                                ?>
                                </select>
                            </div>    
                        </div>
                    </div>
                </div>        
                <div class="form-group mt-2 mb-5">
                    <input type="hidden" name="clienteid" value="<?php if(isset($_GET['rowid'])){ echo $_GET['rowid'];} ?>" />
                    <input type="hidden" name="accion" value="UPDATE_CLIENTES_DIR" />
                    <input type="submit" class="btn btn-primary" value="GUARDAR" />
                    <input type="reset" class="btn btn-danger" value="RESET" />
                </div>
            </form>
        </section>
<?php } 
}
?>


<script src="themes/js/clientes.js"></script>
<script>
    var myoption = document.getElementById('prov');
</script>