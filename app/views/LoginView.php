<?php
include_once '___header.php';
if (isset($data['display_login'])) {
?>
<section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">
        <div class="row g-0">
            <div class="col-lg-12">
                <form action="<?php echo BASE_URL_ROUTE ?>login" method="POST" class="php-email-form">
                <h3>Iniciar sesión</h3>
                <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" name="nick_email" id="nick_email" class="form-control" placeholder="Nombre de usuario o correo" required>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="col-md-12">
                        <a href="<?php echo BASE_URL_ROUTE ?>remember-form">¿Has olvidado la contraseña?</a>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success" type="submit" name="action">Acceder</button>
                    </div>
                </div>
                </form>
            </div><!-- End Quote Form -->
        </div>
    </div>
</section><!-- End Get a Quote Section -->
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