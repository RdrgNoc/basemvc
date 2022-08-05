<?php
if (isset($data['display_login'])) {
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Infracciones Tlanchinol</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <script src="<?php echo BASE_URL_ROUTE ?>public/includes/jquery/jquery-3.6.0.min.js"></script>

    <script src="<?php echo BASE_URL_ROUTE ?>public/includes/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo BASE_URL_ROUTE ?>public/includes/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo BASE_URL_ROUTE ?>public/includes/jquery-steps/jquery.steps.min.js"></script>

  <!-- Favicons -->
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/img/favicon.png" rel="icon">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="<?php echo BASE_URL_ROUTE ?>public/includes/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href="<?php echo BASE_URL_ROUTE ?>public/includes/ckeditor4/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/css/main.css" rel="stylesheet">

  <link href="<?php echo BASE_URL_ROUTE ?>public/assets/css/principal.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/cr-1.5.6/fc-4.1.0/r-2.3.0/rr-1.2.8/sl-1.4.0/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/cr-1.5.6/fc-4.1.0/r-2.3.0/rr-1.2.8/sl-1.4.0/datatables.min.js"></script>
</head>

<body>
<div class="">
    <div class="fondo">
        <div class="container contenedor">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
                    <div class="panel border-0 shadow rounded-3 my-5">
                        <div class="panel-heading" id="panel-inicio-heading">
                        <center><img src="public/img/logo_seguridad.PNG" alt="" class="logo-seguridad" ></center>
                            <center><h3 class="panel-title text-center inicio" style="font-weight: bolder;" id="inicio-sesion">Inicio de sesión</h3></center>
                        </div>
                        <div class="panel-body p-4 p-sm-8" id="panel-inicio-body">
                            
                            <br>
                            <form action="<?php echo BASE_URL_ROUTE ?>login" method="POST" class="php-email-form">
                                <div class="form-floating mb-3">
                                    <input type="text" name="nick_email" id="nick_email" class="form-control " placeholder="Nombre de usuario o correo" required>
                                    <label for="floatingInput"><i class="bi bi-person-circle"></i>  Nombre de usuario: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                                    <label for="floatingPassword"> <i class="bi bi-lock-fill"></i> Contraseña: </label>
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