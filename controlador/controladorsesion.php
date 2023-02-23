<?php
require_once 'modelo/profesor.php';
class ControladorSesion
{
    private $modelo;
    public function __construct()
    {
        $this->modelo = new Profesor();
    }
    public function index()
    {
        if (isset($_SESSION['user']))
            require_once 'vista/headeruser.php';

        else
            require_once 'vista/header.php';
        require_once 'vista/sesion/sesion.php';
    }

    public function iniciarsesion()
    {
        $profesor = $this->modelo->comprobar($_POST['correo'], $_POST['pass']);
        if ($profesor != null) {
            require_once 'vista/headeruser.php';
            $_SESSION['user'] = $profesor->id;
            header('Location: index.php');
        }
    }

    public function cerrarsesion()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

    public function formadd()
    {
        if (isset($_SESSION['user']))
            require_once 'vista/headeruser.php';

        else
            require_once 'vista/header.php';
        require_once 'vista/sesion/usuarioadd.php';
    }

    public function adduser()
    {
        //nombre correo pass
        $profesor = new Profesor();
        $profesor->nombre = $_POST['nombre'];
        $profesor->correo = $_POST['correo'];
        $profesor->password = hash('sha512', $_POST['pass']);
        $this->modelo->addUser($profesor);
        header('Location: index.php');
    }
}
