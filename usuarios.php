<?php
require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
require_once($RABS.'controller/usuarios.php');
require_once($RABS.'model/usuarios.php');
?>
<section class="container">
    <button class="btn btn-primary" id="btn-adduser">Nuevo Usuario</button>
    <?php   
    if($tipoform == "ADD_USERS"){       
    ?>   
        <form id="adduser" class="form container card" method="post" action="<?php echo 'model/usuarios.php'; ?>" style="display:none" autocomplete="off" novalidate>
            <div class="row">
                <div id="titulo" class="col-lg-12 card">
                   <h2><i class="fa-regular fa-user"></i> Alta Usuarios</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" name="user" class="form-control" id="user" maxlength="50" min="3" required />
                    </div>
                    <div class="form-group">
                        <label>Fecha de Alta:</label>
                        <input type="date" name="falta" class="form-control" id="falta" required />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="pass" class="form-control" id="pass" maxlength="50" required />
                        <label>Repetir Password:</label>
                        <input type="password" class="form-control" id="repass" maxlength="50" required />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Estado:</label>
                        <select class="form-control" name="estado">
                            <option></option>
                            <option value="1">Activo</option>
                            <option value="2">Suspendido</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select class="form-control" name="tipo">
                            <option></option>
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">Invitado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="hidden" name="accion" value="ADD_USERS" />
                        <input type="submit" class="btn btn-primary" value="GUARDAR" />
                        <input type="reset" class="btn btn-danger" value="RESET" />
                    </div>
                </div>
            </div>            
        </form>
        
        <script>
            var estado = "noactivo";
            var btnAddUser = document.getElementById('btn-adduser');
            var repass = document.getElementById('repass');
            var formadduser = document.getElementById('adduser');
            btnAddUser.onclick = function(){
                document.getElementById('adduser').style.display = 'flex';
                document.getElementById('adduser').style.flexDirection = 'column';
                document.getElementById('adduser').style.flexWrap = 'nowrap';
            }
            repass.onchange = function(){
                var valor2 = document.getElementById('pass').value;
                var valor1 = repass.value;
                if(valor2 === valor1){
                    estado = "activo";
                }else{
                    estado = "noactivo";
                }

            }

            formadduser.onsubmit = function(){
                if(estado == "activo"){
                   
                }else{
                    event.preventDefault();                
                }
            }

            
    

    </script>
    <?php
    }
    if($tipoform == "EDIT_USERS"){
      
    ?>
        <form id="edituser" class="form container g-3 needs-validation card p-4" method="post" action="<?php echo 'model/usuarios.php'; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <h2><i class="fa-regular fa-user"></i> Actualizar Usuarios</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" name="user" class="form-control" id="user" maxlength="50" min="3" required
                            value="<?php  echo $DatosUser['user'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Fecha de Alta:</label>
                        <input type="date" name="falta" class="form-control" id="falta" required
                            value="<?php  echo $DatosUser['falta'] ?>" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="pass" class="form-control" id="pass" maxlength="50" value="" />
                        <label>Repetir Password:</label>
                        <input type="password" class="form-control" id="repass" maxlength="50" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Estado:</label>
                        <select class="form-control" name="estado">
                            <option></option>
                            <option value="1" <?php if($DatosUser['estado'] == 1){ echo 'selected="selected"';  } ?>>
                                Activo</option>
                            <option value="2" <?php if($DatosUser['estado'] == 2){ echo 'selected="selected"';  } ?>>
                                Suspendido</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>

                        <select class="form-control" name="tipo">
                            <option></option>
                            <option value="1" <?php if($DatosUser['tipo'] == 1){ echo 'selected="selected"';  } ?>>Admin
                            </option>
                            <option value="2" <?php if($DatosUser['tipo'] == 2){ echo 'selected="selected"';  } ?>>
                                Editor</option>
                            <option value="3" <?php if($DatosUser['tipo'] == 3){ echo 'selected="selected"';  } ?>>
                                Invitado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-6  p-4">
                        <label for="validationCustom01" class="form-label">Nombre:</label>
                        <input name="nombre" type="text" maxlength="10" class="form-control" id="validationCustom01"
                            value="<?php echo $dto_dte['nombre'] ?>" required >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        
                        <label for="validationCustomUsername" class="form-label">mail</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input name="mail" type="email" class="form-control" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend" value="<?php echo $dto_dte['mail'] ?>" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <label for="validationCustomUsername" class="form-label">Nif:</label>
                        <div class="input-group has-validation">
                            <input id="nif" name="nif" type="text" maxlength="9" class="form-control"
                                aria-describedby="inputGroupPrepend" value="<?php echo $dto_dte['nif'] ?>" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img id="pre-foto" src="<?php echo $RHTTP.'images/users/default.png'; ?>" alt="foto usuario" />
                        <input id="carga-foto" name="foto_user" type="file" class="form-control"
                            onchange="PrecargaFoto()" value="<?php echo $dto_dte['foto'] ?>" />
                    </div>
            </div>
            <div class="row">
                    <div class="col-12 p-4">
                        <div class="form-check">
                            <?php if($dto_dte['legal'] == 'on'){ $chk = "checked"; }else{ $chk  = "";} ?>
                            <input name="legal" class="form-check-input" type="checkbox" id="invalidCheck" required
                                onchange="" <?php echo $chk; ?> />
                            <label class="form-check-label" for="invalidCheck">
                                Acepto las condiciones.
                            </label>
                            <div class="invalid-feedback">
                                Tienes que marcar el checkbox
                            </div>
                        </div>
                    </div>
            </div>                
                <div class="row">
                    <div class="col-12 p-4">                       
                        <div class="form-group">                
                            <input type="hidden" name="accion" value="EDIT_USERS" />
                            <input type="hidden" name="rowid" value="<?php echo $DatosUser['rowid']; ?>" />
                            <button class="btn btn-primary" type="submit">GUARDAR</button>
                            <button class="btn btn-danger" type="reset">RESET</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            var estado = "noactivo";
            var btnNuevo = document.getElementById('btn-adduser').style.display = "none";
            var CambioPass = document.getElementById('pass');

            CambioPass.onchange = function () {
                var CambioPassRep = document.getElementById('repass').required = 'required';
            }


            var repass = document.getElementById('repass');
            var formedituser = document.getElementById('edituser');
            if(document.getElementById('pass').value == ""){estado = "activo";}else{ estado = "noactivo"; }
            repass.onchange = function () {
                var valor2 = document.getElementById('pass').value;
                var valor1 = repass.value;
                if (valor2 == valor1) {
                    estado = "activo";
                } else {
                    estado = "noactivo";
                }
            }

            formedituser.onsubmit = function () {
                //alert(estado);
                if (estado == "activo") {

                } else {
                    event.preventDefault();

                }
            }
        </script>
    <?php
    }
    ?>
    
</section>

<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <H2>Listado de Usuarios</H2>
            <div id="res-ajax">
                <?php
                   
                    if(isset($_GET['msn']) ){                        
                        $msn = $_GET['msn'];                      
                        echo '<div class="alert alert-success" role="alert">'.$msn.'</div>';
                    }
                    if(isset($_GET['msnfoto'])){                       
                        $msnfoto = $_GET['msnfoto'];
                        echo '<div class="alert alert-success" role="alert">'.$msnfoto.'</div>';
                    }

                ?>
            </div>           
            <table id="ListadoUsuarios" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Fecha alta</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th></th>
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($total != 0){
                                foreach($dUsers as $row){
                                    if($row['estado']==1){ $valorchk = "checked"; }else{ $valorchk="";}
                                   
                                    echo '<tr>';
                                        echo '<td>'.$row['rowid'].'</td>';
                                        echo '<td>'.$row['user'].'</td>';
                                        echo '<td>'.$row['pass'].'</td>';
                                        echo '<td>'.$row['falta'].'</td>';
                                        echo '<td><div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="user-'.$row['rowid'].'" name="estado" value="'.$row['estado'].'"'.$valorchk.' onchange=" Cerrojo('.$row['rowid'].',this.value)" /></div></td>';
                                        echo '<td>'.$tipouser[$row['tipo']].'</td>';
                                        echo '<td><a class="btn btn-primary" href="'.$RHTTP.'index.php?vista=usuarios&&accion=EDIT_USERS&&rowid='.$row['rowid'].'"><i class="fa-regular fa-folder-open"></i></a></td>';
                                        
                                        echo '<td><a class="btn btn-danger"  href="'.$RHTTP.'index.php?vista=usuarios&&accion=DELETE_USERS&&rowid='.$row['rowid'].'"><i class="fa-solid fa-trash-can"></i></a></td>';
                                    echo '</tr>';
                                }
                        }
                        else
                        {
                            echo $dUsers;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<script>
    var cssId = 'UsuariosCss'; 
    if (!document.getElementById(cssId)) {
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.id = cssId;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = "<?php echo $RHTTP.'themes/css/usuarios.css'; ?>";
        link.media = 'all';
        head.appendChild(link);
    }
    $(document).ready(function(){$('#ListadoUsuarios').DataTable();});

    function Cerrojo(rowid,value){
       
        
        if(value==1){ var nvalue=0;}else{ var nvalue=1;}
       
        
        var data = {
                "rowid":rowid,
                "estado":nvalue
                }
                
        $.post( "<?php $RHTTP.'controller/usuarios-ajax.php'; ?>", 
                data , 
                function(response) { 
                    //alert(response);
                                                                                              
                    const myObj = JSON.parse(response);                    
                    var res = document.getElementById('res-ajax');
                    var opcion1 = '<div class="alert alert-success" role="alert">'+myObj.msn+'</div>';
                    var opcion2 = '<div class="alert alert-danger" role="alert">'+myObj.msn+'</div>';                   
                    // como se solventa tipores                    
                    if(myObj.valor == 1){
                        res.innerHTML = opcion1;
                        document.getElementById('user-'+rowid).value = nvalue;
                        document.getElementById('res-ajax').style.display = 'block';
                        var letrero = setInterval( 'document.getElementById("res-ajax").style.display = "none" ' , 2000);
                        //clearInterval(letrero);
                    }
                    else
                    {
                        res.innerHTML = opcion2;    
                    }
                             

                }
        );
        
        
    }
</script>

<script src="<?php echo $RHTTP.'themes/js/usuarios.js'; ?>" ></script>