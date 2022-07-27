<?php

include_once '___header.php';

?>
<div class="container">
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-8 mx-auto">
        <?php
        if (isset($data['registry']) || isset($data['edit_profile'])) {
        ?>
    <div id="get-a-quote" class="card border-0 shadow rounded-3 my-5">
        <div class="card-header">
            <img class="card-img-top" src="<?php echo BASE_URL_ROUTE ?>public/img/logo3.png" alt="Tlanchinol">
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="card-body p-4 p-sm-12">
                    <form form id="formUser" action="<?php echo BASE_URL_ROUTE ?><?php echo isset($data['registry']) ? 'register' : 'editar-perfil'; ?>" method="POST" class="php-email-form">
                        <?php
                            if (isset($data['edit_profile'])) {
                            ?>
                                <input type="hidden" name="id_user" value="<?php echo $data['info_user']['id']; ?>" />
                                <input type="hidden" name="rol" value="<?php echo $data['info_user']['rol']; ?>" />
                            <?php
                            }
                        ?>  
                        <h3 class="card-title text-center inicio">Registro</h3>
                        <div class="row form-floating ">
                            <div class="col-md-12 espacio">
                                <div class="row espacio">
                                <div class="col-md-5 form-floating">
                                <input type="text" 
                                name="name" 
                                class="form-control espacio" 
                                id="name" 
                                maxlength="20" 
                                value="<?php if (isset($data['info_user'])) {echo $data['info_user']['name'];} ?>" 
                                placeholder="Nombre" />
                                <label for="floatingInput"> Nombre(s): </label>
                            </div>
                            <div class="col-md-7 form-floating">
                                <input type="text" 
                                        name="surname" 
                                        class="form-control espacio" 
                                        id="surname" 
                                        maxlength="30" 
                                        value="<?php if (isset($data['info_user'])) {echo $data['info_user']['surname'];} ?>"
                                        placeholder="Apellidos" />
                                <label for="floatingInput"> Apellidos: </label>
                            </div>
                                </div>
                            </div>

                            <div class="col-md-12 espacio">
                                <div class="row espacio">
                                <div class="col-md-5 form-floating">
                                <input type="text" 
                                        name="nickname" 
                                        class="form-control" 
                                        id="nickname" 
                                        maxlength="40" 
                                        value="<?php if (isset($data['info_user'])) {echo $data['info_user']['nickname'];} ?>"
                                        placeholder="Nombre de usuario"/>
                                <label for="floatingInput"> Nombre de ususario: </label>
                            </div>
                            <div class="col-md-7 form-floating">
                                <input type="text" 
                                        name="email" 
                                        <?php isset($data['edit_profile']) ? 'readonly' : '' ?> 
                                        class="form-control" 
                                        id="email" 
                                        maxlength="40" 
                                        value="<?php if (isset($data['info_user'])) {echo $data['info_user']['email'];} ?>"
                                        placeholder="Correo"/>
                                        <label for="floatingInput"> Correo: </label>
                                <div class="valid-feedback">
                                    ¡Es correcto!
                                </div>
                                <div class="invalid-feedback">
                                    El email no tiene el formato correcto
                                </div>
                            </div>
                                </div>
                            </div>
                        <?php
                        if (isset($data['registry'])) {
                        ?>

                            <div class="col-md-12 espacio">
                                <div class="row espacio">
                                <div class="col-md-6 form-floating">
                                <input type="password" 
                                        id="password" 
                                        name="pass" 
                                        class="form-control" }
                                        maxlength="20" 
                                        placeholder="Contraseña"/>
                                        <label for="floatingInput"> Contraseña: </label>
                                <div class="valid-feedback">
                                    ¡Es correcto!
                                </div>
                                <div class="invalid-feedback">
                                    La contraseña debe tener minusculas, mayusculas y numeros. La longitud entre 8 y 20 caracteres
                                </div>
                            </div>

                            
                            <div class="col-md-6 form-floating">
                                <input type="password" 
                                        name="confirm-pass" 
                                        class="form-control" 
                                        id="confirm-pass" 
                                        maxlength="20" 
                                        placeholder="Confirmar contraseña"/>
                                <label for="floatingInput"> Confirmar contraseña: </label>
                            </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-12 text-center">
                                <button type="submit" name="action" class="btn btn-login text-uppercase btn-block fw-bold acceder"><?php echo isset($data['registry']) ? 'Registrarse' : 'Editar'; ?></button>
                            </div>
                            <?php
                            
                            if (isset($data['registry'])) {
                            ?>
                            <div class="col-d-12 link">
                                <a class="link" href="<?php echo BASE_URL_ROUTE ?>verificacion-form">¿Ya te has registrado y no te ha llegado el correo de activación? Pulsa aquí para reenviar correo.</a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div><!-- End Quote Form -->
            </div>
        </div>
    </div><!-- End Get a Quote Section -->







    
        <?php
        } else if (isset($data['form_verification'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">
        <div class="row g-0">
          <div class="col-lg-12">
            <form id="formUser" action="<?php echo BASE_URL_ROUTE ?>reenviar-confirmacion" method="POST" class="php-email-form">
            <h3>Verificación</h3>
              <div class="row gy-4">
                <div class="col-md-12">
                    <input type="text" 
                            name="email"
                            class="form-control" 
                            id="email" 
                            maxlength="40"
                            placeholder="Correo"
                    />
                        <div class="valid-feedback">
                            ¡Es correcto!
                        </div>
                        <div class="invalid-feedback">
                            El email no tiene el formato correcto
                        </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" name="action" class="btn btn-primary btn-block">Reenviar correo de activación</button>
                </div>
              </div>
            </form>
          </div><!-- End Quote Form -->
        </div>
      </div>
    </section><!-- End Get a Quote Section -->  
        <?php
        } else if (isset($data['profile'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h3>Perfil de usuario</h3>
                        <form action="" method="" class="php-email-form">
                        <h3>Perfil: <?php echo $data['info_user']['nickname'] ?></h3>
                            <div class="row gy-4">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nombre</td>
                                            <td><?php echo $data['info_user']['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Apellidos</td>
                                            <td><?php echo $data['info_user']['surname'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $data['info_user']['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Registrado</td>
                                            <td><?php echo $data['info_user']['registry_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Última conexion</td>
                                            <td><?php echo $data['info_user']['last_connection'] ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Total posts</td>
                                            <td>0</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="row gy-4">
                                <div class="col-12 text-right">
                                    <a class="btn btn-warning btn-icon" href="<?php echo BASE_URL_ROUTE ?>editar-perfil-form">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Editar perfil
                                    </a>
                                    <a class="btn btn-dark btn-icon" href="<?php echo BASE_URL_ROUTE ?>editar-password-form">
                                        <i class="fa fa-key" aria-hidden="true"></i></i> Cambiar contraseña
                                    </a>
                                    <?php
                                    if ($data['info_user']['rol'] != 1) {
                                    ?>
                                        <a class="btn btn-danger btn-icon" href="<?php echo BASE_URL_ROUTE ?>desuscribirse-confirm">
                                            <i class="fa fa-user-times" aria-hidden="true"></i> Darse de baja
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } else if (isset($data['change_password'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h3>Cambiar contraseña</h3>
                        <form action="<?php echo BASE_URL_ROUTE ?>change_password" method="POST" class="php-email-form">
                        <h3>Perfil </h3>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="password" id="password" name="pass" class="form-control" maxlength="20" placeholder="Nueva contraseña" />
                                    <div class="valid-feedback">¡Es correcto!</div>
                                    <div class="invalid-feedback">La contraseña debe tener minusculas, mayusculas y numeros. La longitud entre 8 y 20 caracteres</div>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="confirm-pass" class="form-control" id="confirm-pass" maxlength="20" placeholder="Confirmar contraseña" />
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } else if (isset($data['display_unsubscribe'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h5>¿Estas seguro de darte de baja? Ya no podras loguearte de nuevo con este usuario.</h5>
                        <div class="row">
                        <div class="col-12">
                            <a class="btn btn-success btn-icon" href="<?php echo BASE_URL_ROUTE ?>desuscribirse">
                                <i class="fa fa-check" aria-hidden="true"></i> Si
                            </a>
                            <a class="btn btn-danger btn-icon" href="<?php echo BASE_URL_ROUTE ?>no-desuscribirse">
                                <i class="fa fa-times" aria-hidden="true"></i> No
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } else if (isset($data['welcome'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h3>Bienvenido a la pagina del usuario</h3>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } 
        ?>

    </div>
</div>

    </div>

<?php

include_once '___footer.php';

?>