<?php
require_once 'conexion/conexion.php';

$controller = 'categoria';


if (!isset($_REQUEST['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->index();
} else {
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;

    call_user_func(array($controller, $accion));
}
