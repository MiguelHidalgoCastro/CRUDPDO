<?php
require_once 'conexion/conexion.php';

$controller = 'cliente';

if (!isset($_REQUEST['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->Index();
}
