<?php
require_once 'modelo/cliente.php';


class ControladorCliente
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new Cliente();
    }

    public function Index()
    {
        require_once 'vista/header.php';
        require_once 'vista/cliente/cliente.php';
    }
}
