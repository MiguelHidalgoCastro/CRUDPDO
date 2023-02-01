<?php
require_once 'modelo/categoria.php';


class ControladorCategoria
{

    private $modelo;
    /**
     * Constructor del Controlador de Categoría
     */
    public function __construct()
    {
        $this->modelo = new Categoria();
    }
    /**
     * Función que importa la vista del index de categoría
     */
    public function index()
    {
        require_once 'vista/header.php';
        require_once 'vista/categoria/categoria.php';
    }

    /**
     * Función que le pide al modelo la lista de categorías
     * @return array Lista de Categorías de la BBDD
     */
    public function listar()
    {
        $array = $this->modelo->listar();
        return $array;
    }
    /**
     * Cargo la vista del formulario de categorías
     * Si existe un id en el $_REQUEST, trae la categoría al front para poder editarla
     */

    public function crud()
    {
        $categoria = new Categoria();

        if (isset($_REQUEST['id'])) {
            $categoria = $this->modelo->obtener($_REQUEST['id']);
        }

        require_once 'vista/header.php';
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

        header('Location: index.php');
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
