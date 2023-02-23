<?php
require_once 'modelo/profesor.php';
class ControladorIndex
{

    public function index()
    {
        $profesor = null;
        if (isset($_SESSION['user'])) {
            $profesor = new Profesor();
            $profesor = $profesor->obtenerNombre($_SESSION['user']);
            require_once 'vista/headeruser.php';
        } else
            require_once 'vista/header.php';
        require_once 'vista/index/index.php';
    }
}
