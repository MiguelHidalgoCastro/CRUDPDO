<?php
require_once 'conexion/conexion.php';

$controller = 'index';
ini_set('session.cookie_lifetime', 0); 
// que se elimine la cookie automáticamente al cerrar el navegador
ini_set('session.cookie_httponly', true); 
//evitar robo por inyeccion de javascript
ini_set('session.use_strict_mode', true); 
//Para que no puedan usar un id de sesion si no se ha iniciado sesion.
ini_set('session.use_only_cookies', 1); 
//Las cookies deben estar activas incondicionalmente en el lado del usuario, o las sesiones no funcionarán. 
session_start();

if (!isset($_GET['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->index();
} else if (isset($_SESSION['user'])) {
    if (isset($_GET['c']) && !isset($_GET['a'])) {
        $controller = $_GET['c'];
        require_once "controlador/controlador$controller.php";
        $controller = 'Controlador' . ucwords($controller);
        $controller = new $controller;
        $controller->index();
    } else {
        $controller = strtolower($_GET['c']);
        $accion = isset($_GET['a']) ? $_GET['a'] : 'Index';
        require_once "controlador/controlador$controller.php";
        $controller = 'Controlador' . ucwords($controller);
        $controller = new $controller;
        call_user_func(array($controller, $accion));
    }
} else if (isset($_GET['c']) && !isset($_GET['a']) && (($_GET['c'] == 'sesion'))) {
    $controller = $_GET['c'];
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->index();
} else if (isset($_GET['c']) && isset($_GET['a']) && ($_GET['c'] == 'sesion') && ($_GET['a'] == 'iniciarsesion')) {
    $controller = strtolower($_GET['c']);
    $accion = isset($_GET['a']) ? $_GET['a'] : 'Index';
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    call_user_func(array($controller, $accion));
} else {
    header('Location:index.php');
}
