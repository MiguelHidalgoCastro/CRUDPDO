<?php
require_once 'modelo/categoria.php';


class ControladorCategoria
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new Categoria();
    }

    public function Index()
    {
        require_once 'vista/header.php';
        require_once 'vista/categoria/categoria.php';
    }
}
