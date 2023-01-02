<?php
require($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS['carpeta'].'config/config.php');
require($RABS.'controller/contacto.php'); 
?>

<section class="container p-4 ">
    <div class="row">
        <div class="col-sm-12 col-lg-12 p-4">
            <h2>Sección de Contacto</h2>
            <form method="post" id="form-user" class="row g-3 needs-validation card p-4" autocomplete="off"
                action="controller/contacto.php" enctype="multipart/form-data" novalidate>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6  p-4">

                            <label for="validationCustom01" class="form-label">Nombre:</label>
                            <input name="nombre" type="text" maxlength="10" class="form-control" id="validationCustom01"
                                value="" required>
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
                            <input name="pass" type="password" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>


                            <label for="validationCustomUsername" class="form-label">mail</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input name="mail" type="email" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
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
                            <img id="pre-foto" src="<?php echo $RHTTP.'images/users/default.png' ?>"
                                alt="foto usuario" />
                            <input id="carga-foto" name="foto_user" type="file" class="form-control"
                                onchange="PrecargaFoto()" />
                        </div>

                    </div>
                </div>
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
                <div class="col-12 p-4">
                    <input type="hidden" name="accion" value="form-user" />
                    <button class="btn btn-primary" type="submit">ENVIO</button>
                    <button class="btn btn-danger" type="reset">RESET</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-12 p-4">
            <form>
                <lavel>Fam. artículo:</lavel>
                <select class="form-control" id="sel1" name="familia"></select>

                <lavel>artículos:</lavel>
                <select class="form-control" id="sel2" name="familia"></select>
            </form>
            <div>
                <button type="button" class="btn btn-success" onclick="alert($GET('vista'));">
                    sessionid
                </button>
                <button type="button" class="btn btn-success" onclick="alert($GET('xyz'));">
                    xyz
                </button>
                <button type="button" class="btn btn-success" onclick="alert($GET('msn'));">
                    product_id
                </button>
            </div>
             
            
        </div>
    </div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo $RHTTP.'themes/js/contacto.js' ?>"></script>
