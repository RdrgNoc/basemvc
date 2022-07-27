<?php
include_once '___header.php';
if (isset($data['display_login'])) {
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-header">
                    <img class="card-img-top" src="<?php echo BASE_URL_ROUTE ?>public/img/logo3.png" alt="Tlanchinol">
                </div>
                <div class="card-body p-4 p-sm-8">
                    <h3 class="card-title text-center inicio">Inicio de sesión</h3>
                    <br>
                    <form action="<?php echo BASE_URL_ROUTE ?>login" method="POST" class="php-email-form">
                        <div class="form-floating mb-3">
                            <input type="text" name="nick_email" id="nick_email" class="form-control " placeholder="Nombre de usuario o correo" required>
                            <label for="floatingInput"><i class="bi bi-person-circle"></i>  Nombre de usuario o correo </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                            <label for="floatingPassword"> <i class="bi bi-lock-fill"></i> Contraseña</label>
                        </div>
                        <div class="form-check mb-12">
                            <center><a href="<?php echo BASE_URL_ROUTE ?>remember-form">¿Has olvidado la contraseña?</a> <i class="bi bi-question-circle"></i></center> 
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-login text-uppercase fw-bold acceder" type="submit" name="action">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

} elseif (isset($data['display_recover_password'])) {
?>
<section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">
        <div class="row g-0">
            <div class="col-lg-12">
                <form action="<?php echo BASE_URL_ROUTE ?>remember" method="POST" class="php-email-form">
                <h3>Recuperar contraseña</h3>
                <div class="row gy-4">
                    <div class="col-md-12">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Correo registrado en el sistema"/>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" name="action" class="btn btn-primary btn-block">Recuperar</button>
                    </div>
                </div>
                </form>
            </div><!-- End Quote Form -->
        </div>
    </div>
</section><!-- End Get a Quote Section -->
<?php
}
?>
<?php
include_once '___footer.php';
?>