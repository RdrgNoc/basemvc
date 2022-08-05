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

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid  d-flex align-items-center justify-content-between">

      <a href="<?php echo BASE_URL_ROUTE ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="public/img/IMG_9671.PNG" alt="">
      </a>

      <center><h2 class="titulo-inicio1">Sistema Web de tránsito vehicular municipal de Tlanchinol, Hgo.</h2></center>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <?php
        if (isset($data) && $data['login']) {
            $nickname = $data['nickname'];
            if (!$data['isAdmin']) {
      ?>
      
      <?php
            } else {
      ?>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo BASE_URL_ROUTE ?>login-form">Iniciar sesión</a></li>
          <li style="padding-right: 5px;"></li>
        </ul>
      </nav><!-- .navbar -->
      <?php        
            }
        } else {
      ?>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo BASE_URL_ROUTE ?>login-form">Iniciar sesión</a></li>
          <li style="padding-right: 5px;"></li>
        </ul>
      </nav><!-- .navbar -->
      <?php
        }
      ?>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('public/img/blanco.jpg');">
      </div>
    </div><!-- End Breadcrumbs -->
    <?php include_once "___messages.php"; ?>
        
        
<div class="fondo">
    <section id="get-a-quote" class="get-a-quote">
        <div class="container" data-aos="fade-up">
            <div class="row g-0">
                <div class="col-lg-12">
                
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include_once '___footer.php';
?>