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

    public function buscar()
    {
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/header.php';
        require_once 'vista/reto/reto.php';
    }


    public function listar()
    {
        return $this->modelo->listar();
    }

    public function retosFiltradoPorProfesor($id)
    {
        return $this->modelo->retosFiltradoPorProfesor($id);
    }

    public function filtrado()
    {
        $idCategoria = $_POST['filtrado'];
        require_once 'vista/header.php';
        require_once 'vista/reto/retofind.php';
        // return $this->modelo->filtrado($idCategoria);
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
        // $profesores = $this->modeloprofesores->listar();

        $reto = new Reto();
        $reto = $this->modelo->obtener($_GET['id']);

        require_once 'vista/header.php';
        require_once 'vista/reto/retomod.php';
    }

    public function guardar()
    {
        $reto = new Reto();

        if (isset($_POST['id']))
            $reto->id = $_POST['id'];
        else
            $reto->id = 0;
        $reto->nombre = $_POST['nombre'];

        $reto->dirigido = $_POST['dirigido'];

        $reto->descripcion = $_POST['descripcion'];

        $reto->fii = $_POST['fechaInicioInscripcion'];
        $reto->ffi = $_POST['fechaFinInscripcion'];

        $reto->fir = $_POST['fechaInicioReto'];
        $reto->fir = str_replace('T', ' ', $reto->fir);
        $reto->ffr = $_POST['fechaFinReto'];
        $reto->ffr = str_replace('T', ' ', $reto->ffr);

        $reto->idCategoria = $_GET['idCat'];
        $reto->idProfesor = $_GET['idProf'];

        $reto->fechaPublicacion = $_POST['fechaInicioReto'];


        $reto->publicado = $_POST['publicar'];


        $reto->id > 0
            ? $this->modelo->actualizar($reto)
            : $this->modelo->registrar($reto);

        header('Location: index.php?c=reto&a=listarPorProfesor');
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_GET['id']);
        header('Location: index.php?c=reto');
    }



    /*Nuevas funciones */

    public function listarPorProfesor()
    {
        $idProfesor = 2;
        $retos = $this->retosFiltradoPorProfesor($idProfesor);
        $categorias = $this->modelocategorias->listar();
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);

        require_once 'vista/header.php';
        require_once 'vista/reto/retosProfesor.php';
    }

    public function consultar()
    {

        $idReto = $_GET['id'];

        $reto = $this->modelo->obtener($idReto);
        $categoria = $this->modelocategorias->obtener($reto->idCategoria);
        $profesores = $this->modeloprofesores->listar();


        require_once 'vista/header.php';
        require_once 'vista/reto/retoconsultar.php';
    }
}
