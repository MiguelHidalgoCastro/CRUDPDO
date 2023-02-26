<?php
require_once 'modelo/categoria.php';
require_once 'modelo/profesor.php';
/**
 * Controlador de Categoria
 */
class ControladorCategoria
{

    private $modelo;
    private $modeloprofesores;

    /**
     * Constructor del Controlador de Categoría
     */
    public function __construct()
    {
        $this->modelo = new Categoria();
        $this->modeloprofesores = new Profesor();
    }

    /**
     * Función que importa la vista del index de categoría
     */
    public function index()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        require_once 'vista/headeruser.php';
        require_once 'vista/categoria/categoria.php';
    }

    /**
     * Función que le pide al modelo la lista de categorías
     * @return array Lista de Categorías de la BBDD
     */
    public function listar()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $array = $this->modelo->listar();
        return $array;
    }

    /**
     * Cargo la vista del formulario de categorías
     * Si existe un id en el $_REQUEST, trae la categoría al front para poder editarla
     */
    public function crud()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categoria = new Categoria();

        if (isset($_REQUEST['id'])) {
            $categoria = $this->modelo->obtener($_REQUEST['id']);
        }

        require_once 'vista/headeruser.php';
        require_once 'vista/categoria/categoriaedit.php';
    }

    /**
     * Función que carga cuando le damos a aceptar, tanto en crear como en editar
     * Actualiza si el id>0
     */
    public function guardar()
    {
        $categoria = new Categoria();

        $categoria->id = $_REQUEST['id'];
        $categoria->nombre = $_REQUEST['nombre'];


        $categoria->id > 0
            ? $this->modelo->actualizar($categoria)
            : $this->modelo->registrar($categoria);

        header('Location: index.php?c=categoria');
    }
    
    /**
     * Función que elimina la categoria con el id que llega por url
     */
    public function eliminar()
    {
        $this->modelo->eliminar($_GET['id']);
        header('Location: index.php?c=categoria');
    }
}
