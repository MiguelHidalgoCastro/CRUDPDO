<?php
require_once 'conexion/conexion.php';

$controller = 'index';


if (!isset($_GET['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->index();
} else if (isset($_GET['c']) && !isset($_GET['a'])) {
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
