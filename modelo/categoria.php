<?php

class Categoria
{

    private $conexionPDO;
    public $id;
    public $Nombre;

    public function __construct()
    {
        try {
            $this->conexionPDO = Conexion::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $consulta = $this->conexionPDO->prepare("SELECT * FROM categorias");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
