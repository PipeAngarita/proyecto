<?php
require_once "models/database.php"; // Incluir configuración de la base de datos
require_once "models/User.php"; // Incluir el modelo User
require_once "controllers/UserController.php"; // Incluir el controlador UserController
require_once "controllers/Users.php"; // Incluir el controlador Users
require_once "controllers/Landing.php"; // Incluir el controlador Landing

// Verificar el controlador y la acción solicitada
if (!isset($_REQUEST['controller'])) {
    // Si no se especifica un controlador, cargar el controlador de Landing o el que desees
    $controller = new Landing();
    $controller->main();
} else {
    // Si se especifica un controlador
    $controllerName = $_REQUEST['controller'];

    // Determinar la clase del controlador basado en el nombre del controlador solicitado
    switch ($controllerName) {
        case 'Users':
            $controller = new Users();
            break;
        case 'UserController':
            $controller = new UserController();
            break;
        // Agregar más casos según sea necesario para otros controladores
        default:
            // Manejar el caso donde el controlador no exista
            echo "Error: Controlador '{$controllerName}' no encontrado.";
            exit;
    }

    // Determinar la acción a realizar
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'mostrarFormularioRegistro';

    // Verificar si el método existe en el controlador
    if (method_exists($controller, $action)) {
        // Llamar a la acción del controlador
        call_user_func(array($controller, $action));
    } else {
        // Manejar el caso donde el método no exista
        echo "Error: Acción '{$action}' no encontrada en el controlador '{$controllerName}'.";
    }
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

