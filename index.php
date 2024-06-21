<?php
require_once "models/database.php"; // Incluir configuración de la base de datos
require_once "controllers/Users.php"; // Incluir el controlador Users
require_once "models/User.php"; // Incluir el modelo User

// Verificar el controlador y la acción solicitada
if (!isset($_REQUEST['controller'])) {
    // Si no se especifica un controlador, cargar el controlador de Landing o el que desees
    require_once "controllers/Landing.php";
    $controller = new Landing();
    $controller->main();
} else {
    // Si se especifica un controlador
    $controllerName = $_REQUEST['controller'];

    // Incluir el archivo del controlador
    require_once "controllers/Users.php";

    // Crear una instancia del controlador
    $controller = new Users(); // Cambia esto a la clase adecuada si no es Users

    // Determinar la acción a realizar
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'mostrarFormularioRegistro'; // Cambia esto a la acción adecuada

    // Llamar a la acción del controlador
    call_user_func(array($controller, $action));
}




//Si no hay un parámetro 'c' en la solicitud (generalmente en la URL), se carga el controlador predeterminado 'Landing'.
/*if (!isset($_REQUEST['c'])) {
    // Se incluye el archivo del controlador 'Landing'.
    require_once "controllers/Landing.php";
    // Se crea una instancia del controlador 'Landing'.
    $controller = new Landing;
    // Se llama al método 'main' del controlador 'Landing'.
    $controller->main();
} else {
    // Si existe un parámetro 'c' en la solicitud, se toma su valor y se asigna a la variable '$controller'.
    $controller = $_REQUEST['c'];
    // Se incluye el archivo del controlador correspondiente al valor de '$controller'.
    require_once "controllers/" . $controller . ".php";
    // Se crea una instancia del controlador solicitado.
    $controller = new $controller;
    // Se verifica si hay un parámetro 'a' en la solicitud, que representa la acción o método a ejecutar. Si no, se usa 'main' por defecto.
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
    // Se llama a la acción (método) en el controlador usando 'call_user_func'.
    call_user_func(array($controller, $action));
}

require_once 'controllers/Users.php';

// Obtener el controlador y la acción de la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'users';
$action = isset($_GET['action']) ? $_GET['action'] : 'mostrarRegistro';

// Ejecutar el controlador y la acción correspondiente
if ($controller == 'users') {
    $usersController = new Users();

    if ($action == 'mostrarRegistro') {
        $usersController->mostrarFormularioRegistro();
    } elseif ($action == 'procesarRegistro') {
        $usersController->procesarFormularioRegistro();
    } elseif ($action == 'mostrarLogin') {
        $usersController->mostrarFormularioLogin();
    } elseif ($action == 'procesarLogin') {
        $usersController->procesarFormularioLogin();
    }
}*/
?>

