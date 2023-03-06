<?php
require_once 'modelo/reto.php';
require_once 'modelo/categoria.php';
require_once 'modelo/profesor.php';
/**
 * Controlador de Reto
 */
class ControladorReto
{
    private $modeloreto;
    private $modelocategorias;
    private $modeloprofesores;

    /**
     * Constructor
     * Inicializa los modelos que se van a utilizar en el CRUD RETOS
     */
    public function __construct()
    {
        $this->modeloreto = new Reto();
        $this->modelocategorias = new Categoria();
        $this->modeloprofesores = new Profesor();
    }

    /**
     * Función que carga el index de Retos, que lo que hace es cargar la lista global de retos disponibles 
     */
    public function index()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/reto.php';
    }

    /**
     * Función que busca los retos según el id del profesor de la sesión
     * Actualmente sin uso
     */
    public function buscar()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/reto.php';
    }

    /**
     * Añade un reto a la BBDD
     */
    public function add()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        $profesores = $this->modeloprofesores->listar();
        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retoadd.php';
    }

    /**
     * Función que obtiene el reto que se quiere modificar
     */
    public function mod()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $categorias = $this->modelocategorias->listar();
        // $profesores = $this->modeloprofesores->listar();

        $reto = new Reto();
        $reto = $this->modeloreto->obtener($_GET['id']);

        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retomod.php';
    }

    /**
     * Función general de guardar y modificar
     * Si $reto->id es mayor que 0, modifica, sino guarda el reto nuevo
     */
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
        $reto->idProfesor = $_SESSION['user'];

        $reto->fechaPublicacion = $_POST['fechaInicioReto'];


        $reto->publicado = $_POST['publicar'];


        $reto->id > 0
            ? $this->modeloreto->actualizar($reto)
            : $this->modeloreto->registrar($reto);

        header('Location: index.php?c=reto&a=listarporprofesor');
    }

    /**
     * Función que elimina un Reto
     * Aquí tendría que hacer la comprobación de si el reto es del profresor que quiere borrarlo
     */
    public function eliminar()
    {
        $this->modeloreto->eliminar($_GET['id']);
        header('Location: index.php?c=reto&a=listarporprofesor');
    }

    /*Nuevas funcionalidades */
    /**
     * Función que obtiene todos los retos del profesor que tenga iniciada la sesión
     */
    public function listarporprofesor()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $retosPublicados = $this->modeloreto->retosfiltradoporprofesorpublicados($idProfesor);
        $retosBorrador = $this->modeloreto->retosfiltradoporprofesorborrador($idProfesor);
        $categorias = $this->modelocategorias->listar();


        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retosprofesor.php';
    }

    /**
     * Función que muestra los datos de un reto
     */
    public function consultar()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $idReto = $_GET['id'];

        $reto = $this->modeloreto->obtener($idReto);
        $categoria = $this->modelocategorias->obtener($reto->idCategoria);
        $profesores = $this->modeloprofesores->listar();


        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retoconsultar.php';
    }
    
    /**
     * Función que se utiliza para el filtrado de retos
     */
    public function filtrado()
    {
        $idProfesor = $_SESSION['user'];
        $profesor = $this->modeloprofesores->obtenerNombre($idProfesor);
        $idCategoria = $_POST['filtrado'];
        if ($idCategoria != 0) {
            $retospublicados = $this->modeloreto->filtrado($idCategoria, 'publicado');
            $retosborrador = $this->modeloreto->filtrado($idCategoria, 'borrador');
        } else
            $retos = $this->modeloreto->listarPublicados();

        $categorias = $this->modelocategorias->listar();

        require_once 'vista/headeruser.php';
        require_once 'vista/reto/retofind.php';
    }


     /**
     * Obtiene la lista de los retos globales no publicados
     * @return Array de Retos
     */
    public function listarNoPublicados()
    {
        return $this->modeloreto->listarNoPublicados();
    }

    /**
     *  Obtiene la lista de los retos globales publicados
     * @return Array de Retos
     */
    public function listarPublicados()
    {
        return $this->modeloreto->listarPublicados();
    }

    /**
     * Función que obtiene una row con la categoría que entra por parámetro
     * @param {number} $id el id de la categoría que busco
     * @return Row Categoría
     */
    public function getCategoria($id)
    {
        return $this->modelocategorias->obtener($id);
    }


    public function listarPublicadosPorCategoria($id)
    {
        return $this->modeloreto->listarPublicadosPorCategoria($id);
    }


    public function listarNoPublicadosPorCategoria($id)
    {
        return $this->modeloreto->listarNoPublicadosPorCategoria($id);
    }
    
}
