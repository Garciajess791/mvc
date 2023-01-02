<?php require_once($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'controller/ficheros.php'); ?>

<section class="container p-3 mb-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h2>Gestor de Escritura en Fichero</h2>
            <?php 
                if(isset($_GET['msn']) && !empty($_GET['msn'])){ 
                    echo '<div class="alert alert-primary" role="alert">'.$_GET['msn'].'</div>'; 
                }
            ?>
            <form id="form" class="form-control container p-3" action="controller/ficheros.php">
                <div class="row">
                    <div class="col-lg-12">                    
                        <lavel>Deja tu comentario:</lavel>
                        <textarea id="texto" class="form-control mb-3" name="texto"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <input class="form-control" type="file" name="rutac" onchange="CogerRuta(this.name)" />
                        <lavel>Nombre de Fichero:</lavel>
                        <input id="nombre" class="form-control mb-3" type="text" name="nombre" maxlength="0"
                            tabindex="-1" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Tipo de apertura del fichero:</label>
                        <select class="form-control w-50 mb-3" name="tipo" required>
                            <?Php                        
                            foreach($tipos as $i => $tipo) {
                                echo '<option value="'.$tipo.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Tipo de método:</label>
                        <select id="metodo" class="form-control w-50 mb-3" name="metodo"
                            onchange="CambiarMetodo(this.value)" required>
                            <?Php                        
                            foreach($methods as $i => $method){                            
                                echo '<option value="'.$i.'">'.$method.'</option>';
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" name="ruta" value="<?php echo $RABS; ?>" />
                        <input type="hidden" name="rutapp" value="<?php echo $RHTTP; ?>" />
                        <input class="btn btn-success mb-3" type="submit" value="GRABAR" />
                        <input class="btn btn-danger mb-3" type="reset" value="RESET" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-lg-6 ">
            <h2>Mostrar Fichero</h2>
            <textarea id="mostrar" class="form-control p-1 "  placeholder="" wrap="off">
                <?php 
                
                foreach($texto as $row){
                    echo $row;
                }
              
                
                
                ?>
        
            </textarea>
        </div>    
    </div>
</section>
<script src="<?php echo $RHTTP.'themes/js/ficheros.js'; ?>" type="text/javascript"></script>