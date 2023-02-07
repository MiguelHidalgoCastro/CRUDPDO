<?php

class Profesor
{

    private $conexion;
    public $id;
    public $nombre;

    /**
     * Constructor de la clase Profesor (Modelo) 
     * @param String si llega 'pdo' carga la bbdd con pdo, si llega 'mysqli' carga la bbdd con mysqli
     */
    public function __construct()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM profesores ORDER BY id ASC");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
