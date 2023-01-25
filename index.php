<?php
require_once 'conexion/conexion.php';

$controller = 'categoria';

if (!isset($_REQUEST['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->Index();
}
