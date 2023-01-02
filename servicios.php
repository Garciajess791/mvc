<?php
require('controller/servicios.php'); 

/*
require('controller/servicios.php');
$op = LlenarSelectTipo(); 
$glob = $GLOBALS['op']; 
$valor = DatosTabla();
$datos = $valor[0];
$j=0;
for($i=0; $i<= strlen($datos); $i++){
   echo print_r($datos[$i]);
    $letras[$i] = $datos[$i];    
    if($valor[0][$i] == ','){       
        $palabras[$j] = $letras;
        $letras = "";
        $j++;
    }    
}
echo print_r($palabras);
?>
<?php
if(isset($_GET['msn']) && !empty($_GET['msn'])){
    print'<section class="container"><h2 class="alert-success">'.$_GET['msn'].'</h2></section>';
}
?>
*/
?>
<script>
  $(document).ready(function(){$('#tareas').DataTable();});
</script>
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <h2>Sección de Servicios</h2>
            <div id="msn">
                <?php
                if($_GET){
                    if(isset($_GET['msn'])){ 
                        if($_GET['msn'] == 1){
                            echo $msn = '<div class="alert alert-success" role="alert">Data guadado correctamente en la Base de Datos.</div>';
                        }
                        if($_GET['msn'] != 1){
                            echo $msn = '<div class="alert alert-danger" role="alert">'.$_GET['msn'].'</div>';
                        }
                    }
                }
                ?>
            </div>
            <a class="btn btn-primary" href="<?php echo $RHTTP.'index.php?vista=servicios&&accion=ADD_TAREA'; ?>" >ADD TAREA</a>
            <?php if($accion == 'ADD_TAREA'){ ?>
                <form novalidate class="form p-2 mt-2" method="post" action="<?php echo 'controller/servicios.php'; ?>">
                    <h3>Formulario Nueva Tareas</h3>
                    <div class="card">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="form-control nombre " id="nombre" required />
                    </div>
                    <div>
                        <label>Tipo:</label>
                        <select name="tipo" class="form-control" id="tipo" required >  
                            <option></option>
                            <option value="1" selected="selected">Personal</option>                      
                            <?php                        
                                foreach($datosTipo as $f){                             
                                    
                                    echo '<option  value="'.$f['rowid'].'">';
                                    echo $f['tipo'];
                                    echo '</option>';
                                                                  
                                }                        
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Fecha Tarea:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" required />
                    </div>
                    <div>
                        <legend>Estado</legend>
                        <label>ACTIVO</label>
                        <input type="radio" name="estado" class="" id="estado1" value="1" />
                        <label>CERRADO</label>
                        <input type="radio" name="estado" class="" id="estado" value="0" />
                    </div>
                    <div>
                        <input type="hidden" name="accion" value="ADD_TAREA" />
                        <input type="submit" value="GUARDAR" class="btn btn-primary" />
                        <input type="reset" value="RESET" class="btn btn-danger" />
                        <input type="button" value="RESET" class="btn btn-danger" onclick="CerrarForm()" />
                    </div>
                </form>
            <?php } ?>                
            <?php if($accion == 'UPDATE_TAREA'){ ?>                
                <form novalidate class="form p-2 mt-2" method="post" action="<?php echo 'controller/servicios.php'; ?>">
                    <h3>Formulario Actualizar Tareas</h3>
                    <div class="card">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="form-control nombre " id="nombre" required value="<?php echo $d['nombre']; ?>" />
                    </div>
                    <div>
                        <label>Tipo:</label>
                        <select name="tipo" class="form-control" id="tipo"
                            onchange="<?php //echo 'RevisarOpcion(this.id)'; ?>" required >  
                            <option></option>
                                                  
                            <?php                        
                                
                                
                                foreach($datosTipo as $f){
                                    
                                    if($d['tipo'] == $f['rowid']){echo $selec ='selected="selected"'; }else{ $selec="";}
                                    echo '<option  value="'.$f['rowid'].'"'.$selec.'>';
                                    echo $f['tipo'];
                                    echo '</option>';
                                                                  
                                }
                                                        
                            ?>
                        </select>                        
                    </div>
                    <div>
                        <label>Fecha Tarea:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" required value="<?php echo $d['fecha']; ?>"/>
                    </div>
                    <div>
                        
                        <legend>Estado</legend>
                        <label>ACTIVO</label>
                        <input type="radio" name="estado" class="" id="estado1" value="1"  <?php if($d['estado'] == '1'){ echo 'checked="true"';}else{} ?>/>
                        <label>CERRADO</label>
                        <input type="radio" name="estado" class="" id="estado" value="0" <?php if($d['estado'] == '0'){  echo 'checked="true"';}else{} ?> />
                    </div>
                    <div>
                        <input type="hidden" name="accion" value="UPDATE_TAREA" />
                        <input type="hidden" name="rowid" value="<?php echo $d['rowid']; ?>" />
                        <input type="submit" value="GUARDAR" class="btn btn-primary" />
                        <input type="reset" value="RESET" class="btn btn-danger" />
                        <input type="button" onclick="" class="btn btn-danger" value="CERRAR" />
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <h2>Listado de Tareas</h2>
            <table id= "tareas" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    
                    foreach($datosTabla as $d){
                       
                        echo '<tr>';
                        echo '<td>'.$d['nombre'].'</td>';
                        echo '<td>'.$d['tipo'].'</td>';
                        echo '<td>'.$d['fecha'].'</td>';
                        echo '<td>'.$d['estado'].'</td>';
                        echo '<td><a class="btn btn-primary" href="'.$RHTTP.'index.php?vista=servicios&&accion=UPDATE_TAREA&&rowid='.$d['rowid'].'"><i class="fa-regular fa-folder-open"></i></a></td>';
                                        
                        echo '<td><a class="btn btn-danger"  href="'.$RHTTP.'index.php?vista=servicios&&accion=DELETE_TAREA&&rowid='.$d['rowid'].'"><i class="fa-solid fa-trash-can"></i></a></td>';
                        echo '</tr>';
                    }
                    
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

