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
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/reto.php';
    }

    public function buscar()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/reto.php';
    }


    public function listarNoPublicados()
    {
        return $this->modelo->listarNoPublicados();
    }

    public function listarPublicados()
    {
        return $this->modelo->listarPublicados();
    }


    public function getCategoria($id)
    {
        return $this->modelocategorias->obtener($id);
    }


    public function add()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        $profesores = $this->modeloprofesores->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retoadd.php';
    }

    public function mod()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        // $profesores = $this->modeloprofesores->listar();

        $reto = new Reto();
        $reto = $this->modelo->obtener($_GET['id']);

        require_once 'vista/headeruser.php';
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

        $reto->idCategoria = $_POST['idCat'];
        $reto->idProfesor = $_POST['idProf'];

        $reto->fechaPublicacion = $_POST['fechaInicioReto'];


        $reto->publicado = $_POST['publicar'];


        $reto->id > 0
            ? $this->modelo->actualizar($reto)
            : $this->modelo->registrar($reto);

        header('Location: index.php?c=reto&a=listarporprofesor');
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_GET['id']);
        header('Location: index.php?c=reto&a=listarporprofesor');
    }



    /*Nuevas funciones */

    public function listarporprofesor()
    {
        // $idProfesor = 3; //guardar en la sesion
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $retosPublicados = $this->modelo->retosfiltradoporprofesorpublicados($idProfesor);
        $retosBorrador = $this->modelo->retosfiltradoporprofesorborrador($idProfesor);
        $categorias = $this->modelocategorias->listar();
      

        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retosprofesor.php';
    }

    public function consultar()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $idReto = $_GET['id'];

        $reto = $this->modelo->obtener($idReto);
        $categoria = $this->modelocategorias->obtener($reto->idCategoria);
        $profesores = $this->modeloprofesores->listar();


        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retoconsultar.php';
    }

    public function filtrado()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $idCategoria = $_POST['filtrado'];
        if ($idCategoria != 0) {
            $retospublicados = $this->modelo->filtrado($idCategoria, 'publicado');
            $retosborrador = $this->modelo->filtrado($idCategoria, 'borrador');
        } else
            $retos = $this->modelo->listarPublicados();

        $categorias = $this->modelocategorias->listar();

        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retofind.php';
        // return $this->modelo->filtrado($idCategoria);
    }
}
