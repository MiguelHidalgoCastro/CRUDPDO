<?php

class Profesor
{

    private $conexion;
    public $id;
    public $nombre;
    public $correo;
    public $password;

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

    public function obtenerNombre($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM profesores WHERE id = ?");
            $consulta->execute([$id]);
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function comprobar($correo, $pass)
    {
        try {
            $sql = "SELECT * FROM profesores WHERE correo = :correo AND pass = :pass";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(array('correo' => $correo, 'pass' => $pass));

            if ($consulta->rowCount()) {
                session_start();
                return $consulta->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function addUser(Profesor $data)
    {
        try {
            $sql = "INSERT INTO profesores (nombre,correo,pass) VALUES (:nombre, :correo, :pass)";
            $insert = $this->conexion->prepare($sql);
            return $insert->execute(array('nombre' => $data->nombre, 'correo' => $data->correo, 'pass' => $data->password));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
