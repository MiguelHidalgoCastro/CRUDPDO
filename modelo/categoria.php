<?php

class Categoria
{

    private $conexion;
    public $id;
    public $nombre;

    /**
     * Constructor de la clase Categoria (Modelo) 
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
            $consulta = $this->conexion->prepare("SELECT * FROM categorias ORDER BY id ASC");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM categorias WHERE id = ?");
            $consulta->execute([$id]);
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizar(Categoria $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");
            $update->execute(array($data->nombre, $data->id));
            // $update->execute([$data->nombre, $data->id]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Categoria $data)
    {
        try {
            $insert = $this->conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
            $insert->execute(array($data->nombre));
            //$insert->bindParam(1, $data->nombre);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $delete = $this->conexion->prepare("DELETE FROM categorias WHERE id = ?");
            $delete->execute(array($id));
            //$delete->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
