<?php

class Cliente
{
    private $conexionPDO;

    public $id;
    public $dni;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Telefono;

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
            $consulta = $this->conexionPDO->prepare("SELECT * FROM cliente");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
