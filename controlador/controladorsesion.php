<?php
require_once 'modelo/profesor.php';
/**
 * Controlador de la Sesión
 */
class ControladorSesion
{
    private $modelo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modelo = new Profesor();
    }

    /**
     * Método que carga el login de iniciar sesion
     */
    public function index()
    {
        require_once 'vista/header.php';
        require_once 'vista/sesion/sesion.php';
    }

    /**
     * Función utilizada para iniciar sesión
     * Llama a la función del profesor que comprueba si está bien el correo y la contraseña
     */
    public function iniciarsesion()
    {
        $profesor = $this->modelo->comprobar($_POST['correo'], $_POST['pass']);
        if ($profesor != null) {
            $_SESSION['user'] = $profesor->id;
            header('Location: index.php');
        }
    }

    /**
     * Función para cerrar la sesión
     */
    public function cerrarsesion()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

    /**
     * Función para cargar la vista de crear usuario
     */
    public function formadd()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modelo->obtenerNombre($idProfesor);
        if (isset($_SESSION['user']))
            require_once 'vista/headeruser.php';

        else
            require_once 'vista/header.php';
        require_once 'vista/sesion/usuarioadd.php';
    }

    /**
     * Función que crear un usuario nuevo
     * Falta por terminarla, para el tema de guardar las llaves y demás
     */
    public function adduser()
    {
        $profesor = new Profesor();
        $profesor->nombre = $_POST['nombre'];
        $profesor->correo = $_POST['correo'];
        $profesor->password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $this->modelo->addUser($profesor);
        header('Location: index.php');
    }
}
