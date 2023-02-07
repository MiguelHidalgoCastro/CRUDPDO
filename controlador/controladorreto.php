<?php
require_once 'modelo/reto.php';
require_once 'modelo/categoria.php';
require_once 'modelo/profesor.php';
class ControladorReto
{
    private $modelo;
    private $modelocategorias;
    private $modeloprofesores;

    public function __construct()
    {
        $this->modelo = new Reto();
        $this->modelocategorias = new Categoria();
        $this->modeloprofesores = new Profesor();
    }

    public function index()
    {
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/header.php';
        require_once 'vista/reto/reto.php';
    }

    public function buscar(){
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/header.php';
        require_once 'vista/reto/reto.php';
    }


    public function listar()
    {
        $array = $this->modelo->listar();
        return $array;
    }

    public function filtrado($idCategoria)
    {
        return $this->modelo->filtrado($idCategoria);
    }

    public function getCategoria($id)
    {
        return $this->modelocategorias->obtener($id);
    }


    public function add()
    {
        $categorias = $this->modelocategorias->listar();
        $profesores = $this->modeloprofesores->listar();
        require_once 'vista/header.php';
        require_once 'vista/reto/retoadd.php';
    }

    public function mod()
    {
        $categorias = $this->modelocategorias->listar();
        $profesores = $this->modeloprofesores->listar();

        $reto = new Reto();
        $reto = $this->modelo->obtener($_REQUEST['id']);

        require_once 'vista/header.php';
        require_once 'vista/reto/retomod.php';
    }

    public function crud()
    {
        $reto = new Reto();

        if (isset($_REQUEST['id'])) {
            $reto = $this->modelo->obtener($_REQUEST['id']);
        }

        require_once 'vista/header.php';
        require_once 'vista/reto/retoedit.php';
    }

    public function guardar()
    {
        $reto = new Reto();

        $reto->id = $_REQUEST['id'];
        $reto->nombre = $_REQUEST['nombre'];
        $reto->publicado = $_REQUEST['publicar'];
        $reto->dirigido = $_REQUEST['dirigido'];
        $reto->descripcion = $_REQUEST['descripcion'];

        $reto->fii = $_REQUEST['fechaInicioInscripcion'];
        $reto->ffi = $_REQUEST['fechaFinInscripcion'];

        $reto->fir = $_REQUEST['fechaInicioReto'];
        $reto->ffr = $_REQUEST['fechaFinReto'];

        $reto->idCategoria = $_REQUEST['idCat'];
        $reto->idProfesor = $_REQUEST['idProf'];

        $reto->fechaPublicacion = $_REQUEST['fechaInicioReto'];

        $reto->id > 0
            ? $this->modelo->actualizar($reto)
            : $this->modelo->registrar($reto);

        header('Location: index.php?c=reto');
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        header('Location: index.php?c=reto');
    }
}
