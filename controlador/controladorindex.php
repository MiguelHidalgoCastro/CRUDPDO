<?php
require_once 'modelo/profesor.php';
/**
 * Controlador de Index
 */
class ControladorIndex
{
    /**
     * Función que muestra la vista index general de la aplicación 
     * Si está iniciada la sesión carga un header diferente a cuando no hay iniciada sesión
     */
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
