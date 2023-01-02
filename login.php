<?php require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php'); ?>
<script>
     var EstadoRobot = "robot";
</script>

<section class="container p-3">
     <div class="row">
          <div class="col-lg-6">
               <form id="FormLogin" class="form" method="post" action="controller/controller.php" autocomplete="off">
                    <h3>Zona Usuarios Registrados</h3>
                    <div>
                         <label>User:</label>
                         <input type="text" name="user" class="form-control w-50 p-3" required />
                    </div>
                    <div>
                         <label>Password:</label>
                         <input type="password" name="pass" class="form-control w-50 p-3" required />
                    </div>
                    <div id="LoginCaptcha">
                         <h5>¿Eres humano?</h5>
                         <div id="LoginCandado" ondrop="drop(event)" ondragover="allowDrop(event)">
                              <i id="LoginCanCerrado" class="fa-solid fa-lock"></i>
                              <i id="LoginCanAbierto" style="display:none;" class="fa-solid fa-lock-open"></i>
                         </div>
                         <div id="LoginLlave" draggable="true" ondragstart="drag(event)">
                              <i id="LoginCanLlave" class="fa-solid fa-key"></i>
                         </div>
                    </div>
                    <div>
                         <p>He olvidad mi contraseña <a class="btn btn-primary" href="#">Click aquí</a></p>
                    </div>
                    <div>
                         <input class="btn btn-success" type="submit" value="ENTRAR" />
                         <input class="btn btn-danger" type="reset" value="RESET" />
                    </div>
               </form>
          </div>
          <div class="col-lg-6">
               <h2>Registrate en MVC:</h2>
               <form method="post" id="form-user" class="row g-3 needs-validation card p-4" autocomplete="off"
                    action="controller/usuarios.php" enctype="multipart/form-data" >
                    <div id="Form_reg_cont" class="container">
                         <div class="row">
                              <div class="col-lg-6  p-4">
                                   <label for="validationCustom01" class="form-label">Nombre:</label>
                                   <input name="nombre" type="text" maxlength="10" class="form-control"
                                        id="validationCustom01" value="" required>
                                   <div class="valid-feedback">
                                        Looks good!
                                   </div>
                                   <label for="validationCustom02" class="form-label">Nombre de usuario::</label>
                                   <input name="user" type="text" class="form-control" id="validationCustom02" value=""
                                        required>
                                   <div class="valid-feedback">
                                        Looks good!
                                   </div>
                                   <label for="validationCustom03" class="form-label">Password:</label>
                                   <input name="pass" type="password" class="form-control" id="validationCustom03"
                                        required>
                                   <div class="invalid-feedback">
                                        Please provide a valid city.
                                   </div>
                                   <label for="validationCustomUsername" class="form-label">mail</label>
                                   <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input name="mail" type="email" class="form-control"
                                             id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                             required>
                                        <div class="invalid-feedback">
                                             Please choose a username.
                                        </div>
                                   </div>
                                   <label for="validationCustomUsername" class="form-label">Nif:</label>
                                   <div class="input-group has-validation">
                                        <input id="nif" name="nif" type="text" maxlength="9" class="form-control"
                                             aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                             Please choose a username.
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6 text-center">
                                   <img id="pre-foto" src="<?php echo $RHTTP.'images/users/default.png'; ?>"
                                        alt="foto usuario" />
                                   <input id="carga-foto" name="foto_user" type="file" class="form-control"
                                        onchange="PrecargaFoto()" />
                              </div>
                         </div>                    
                         <div class="row">
                              <div class="col-12 p-4">
                                   <div class="form-check">
                                        <input name="legal" class="form-check-input" type="checkbox" id="invalidCheck" required
                                             onchange="">
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
                                   <input type="hidden" name="accion" value="REG_USERS" />
                                   <button class="btn btn-primary" type="submit">ENVIO</button>
                                   <button class="btn btn-danger" type="reset">RESET</button>
                              </div>
                         </div>
                    </div>          
               </form>
          </div>
     </div>
</section>
<script src="themes/js/usuarios.js"></script>
<script>
     var FormLogin = document.getElementById('FormLogin');

     FormLogin.onsubmit = function () {
          if (EstadoRobot == "robot") {
               event.preventDefault();
          } else {
               window.location("<?php echo 'index.php?vista=home'; ?>");
          }
     }

     function allowDrop(ev) {
          ev.preventDefault();
     }

     function drag(ev) {
          ev.dataTransfer.setData("text", ev.target.id);
     }

     function drop(ev) {

          ev.preventDefault();
          var data = ev.dataTransfer.getData("text");
          ///
          ev.target.appendChild(document.getElementById(data));
          ///
          var CuadroCandado = document.getElementById('LoginCandado');
          var CanCerrado = document.getElementById('LoginCanCerrado').style.display = "none";
          var CanAbierto = document.getElementById('LoginCanAbierto');
          CanAbierto.style.color = "green";
          CanAbierto.style.display = "block";
          CuadroCandado.style.borderColor = "green";
          var CanLlave = document.getElementById('LoginCanLlave').style.display = "none";

          CambiarEstadoRobot()

     }

     function CambiarEstadoRobot() {
          EstadoRobot = "humano";
          return EstadoRobot;
     }
</script>

<script>
    var cssId = 'UsuariosCss'; 
    if (!document.getElementById(cssId)) {
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.id = cssId;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '<?php echo $RHTTP."themes/css/usuarios.css"; ?>';
        link.media = 'all';
        head.appendChild(link);
    }
</script>

<?php
/*--------------------------------  
<style>
     #div1,#div2 {
     width: 350px;
     height: 70px;
     padding: 10px;
     border: 1px solid #aaaaaa;
     }
</style>
<script>
     function allowDrop(ev) {
     ev.preventDefault();
     }

     function drag(ev) {
     ev.dataTransfer.setData("text", ev.target.id);
     }

     function drop(ev) {
     ev.preventDefault();
     var data = ev.dataTransfer.getData("text");
     ev.target.appendChild(document.getElementById(data));
     }
</script>

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<br>
<img id="drag1" src="img_logo.gif" draggable="true" ondragstart="drag(event)" width="336" height="69">
<img id="drag2" src="img_logo.gif" draggable="true" ondragstart="drag(event)" width="336" height="69">
*/
?>