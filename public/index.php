<?php

require_once("../app/index.php");

spl_autoload_extensions('.php');
spl_autoload_register();

$router = new Router();

// LINKS PARA IMPRIMIR PANTALLAS
// INICIO DE APP
$router->register(new Route('/^\/' . BASE_URL . '\/welcome\/(\w[\-\w]*)$/', 'IndexController', 'display'));
// PAGINA DE REGISTRO
$router->register(new Route('/^\/' . BASE_URL . '\/register-form$/', 'UserController', 'display'));
// PAGINA DE REENVIO DE VERIFICACION DE CORREO
$router->register(new Route('/^\/' . BASE_URL . '\/verificacion-form$/', 'UserController', 'display_verification'));
// PAGINA DE INICIO DE SESIÓN
$router->register(new Route('/^\/' . BASE_URL . '\/login-form$/', 'LoginController', 'display'));
// PAGINA PARA RECUPERAR CONTRASEÑA
$router->register(new Route('/^\/' . BASE_URL . '\/remember-form$/', 'LoginController', 'display_remember'));
// PAGINA PRINCIPAL COMO USUARIO
$router->register(new Route('/^\/' . BASE_URL . '\/welcomeuser$/', 'UserController', 'displayWelcome'));
// PAGINA PRINCIPAL COMO ADMIN
$router->register(new Route('/^\/' . BASE_URL . '\/welcomeadmin$/', 'UserController', 'displayWelcomeAdmin'));
// PAGINA PARA VER DATOS DEL PERFIL
$router->register(new Route('/^\/' . BASE_URL . '\/perfil$/', 'UserController', 'display_profile'));
// ÁGINA PARA EDITAR DATOS DEL PERFIL
$router->register(new Route('/^\/' . BASE_URL . '\/editar-perfil-form$/', 'UserController', 'display_edit_profile'));
// PAGINA PARA EDITAR CONTRASEÑA
$router->register(new Route('/^\/' . BASE_URL . '\/editar-password-form$/', 'UserController', 'edit_password'));
// PAGINA QUE MUESTRA LOS LOGS DEL SISTEMA
$router->register(new Route('/^\/' . BASE_URL . '\/log$/', 'LogController', 'display'));
// PAGINA QUE MUESTRA LAS INFRACCIONES
$router->register(new Route('/^\/' . BASE_URL . '\/ver-infracciones$/', 'InfringementController', 'display'));
$router->register(new Route('/^\/' . BASE_URL . '\/crear-infracciones$/', 'InfringementController', 'create'));
$router->register(new Route('/^\/' . BASE_URL . '\/ver-vehiculos$/', 'VehicleController', 'display'));
$router->register(new Route('/^\/' . BASE_URL . '\/crear-vehiculos$/', 'VehicleController', 'create'));
$router->register(new Route('/^\/' . BASE_URL . '\/ver-personas$/', 'PeopleController', 'display'));
$router->register(new Route('/^\/' . BASE_URL . '\/crear-personas$/', 'PeopleController', 'create'));
$router->register(new Route('/^\/' . BASE_URL . '\/ver-usuarios/', 'UserController', 'displayUsers'));
$router->register(new Route('/^\/' . BASE_URL . '\/crear-usuarios/', 'UserController', 'create'));



// METODOS DE LOS FORMULARIOS
// FORM INICIO SE SESION
$router->register(new Route('/^\/' . BASE_URL . '\/login$/', 'LoginController', 'login'));
// FORM PARA ENVIO DE CONFIRMACIÓN DE CORREO
$router->register(new Route('/^\/' . BASE_URL . '\/remember$/', 'LoginController', 'remember'));
// FORM PARA REGISTRAR PERFIL
$router->register(new Route('/^\/' . BASE_URL . '\/register$/', 'UserController', 'register'));
// FORM PARA EDITAR DATOS DEL PERFIL
$router->register(new Route('/^\/' . BASE_URL . '\/editar-perfil$/', 'UserController', 'edit_profile'));
// FORM PARA REENVIAR CONFIRMACION DE CUENTA
$router->register(new Route('/^\/' . BASE_URL . '\/reenviar-confirmacion$/', 'UserController', 'resend_confirmation'));
// FORM PARA DESSUCRIPCION
$router->register(new Route('/^\/' . BASE_URL . '\/desuscribirse-confirm$/', 'UserController', 'display_unsubscribe'));
// FORM PARA EDITAR CONTRASEÑA
$router->register(new Route('/^\/' . BASE_URL . '\/change_password$/', 'UserController', 'change_password'));
// FORM PARA REGISTRAR VEHICULO
$router->register(new Route('/^\/' . BASE_URL . '\/registerVehicle$/', 'VehicleController', 'registerVehicle'));
$router->register(new Route('/^\/' . BASE_URL . '\/editVehicle$/', 'VehicleController', 'edit'));
$router->register(new Route('/^\/' . BASE_URL . '\/registerPeople$/', 'PeopleController', 'registerPeople'));
$router->register(new Route('/^\/' . BASE_URL . '\/editPeople$/', 'PeopleController', 'edit'));
$router->register(new Route('/^\/' . BASE_URL . '\/registerInfringement$/', 'InfringementController', 'registerInfringement'));
$router->register(new Route('/^\/' . BASE_URL . '\/editInfringements$/', 'InfringementController', 'edit'));
$router->register(new Route('/^\/' . BASE_URL . '\/registerNewUser$/', 'UserController', 'registerUser'));



// ACCIONES QUE NO SON FORMULARIOS NI VISTAS
// BOTON PARA DESUSCRIBIRSE
$router->register(new Route('/^\/' . BASE_URL . '\/desuscribirse$/', 'UserController', 'unsubscribe'));
// BOTON PARA NO DESUSCRIBIRSE
$router->register(new Route('/^\/' . BASE_URL . '\/no-desuscribirse$/', 'UserController', 'no_unsubscribe'));
// BOTON PARA CERRAR SESIÓN
$router->register(new Route('/^\/' . BASE_URL . '\/logout$/', 'UserController', 'logout'));
// BOTON PARA ELIMINAR TODOS LOS LOGS
$router->register(new Route('/^\/' . BASE_URL . '\/log\/delete-log$/', 'LogController', 'delete_content_log'));
$router->register(new Route('/^\/' . BASE_URL . '\/verificar\/(\w+)$/', 'UserController', 'verification'));

$router->register(new Route('/^\/' . BASE_URL . '\/vehicle\/delete\/(\w+)$/', 'VehicleController', 'delete'));

$router->register(new Route('/^\/' . BASE_URL . '\/vehicle\/edit\/(\w+)$/', 'VehicleController', 'editVehicle'));

$router->register(new Route('/^\/' . BASE_URL . '\/people\/delete\/(\w+)$/', 'PeopleController', 'delete'));

$router->register(new Route('/^\/' . BASE_URL . '\/people\/edit\/(\w+)$/', 'PeopleController', 'editPeople'));

$router->register(new Route('/^\/' . BASE_URL . '\/infringement\/edit\/(\w+)$/', 'InfringementController', 'editInfringement'));


// Users
$router->register(new Route('/^\/' . BASE_URL . '\/user-verification\/(\w+)$/', 'UserController', 'verification'));

$router->register(new Route('/^\/' . BASE_URL . '/', 'IndexController', 'display'));
$router->handleRequest($_SERVER['REQUEST_URI']);
