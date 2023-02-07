<?php

class Reto
{

    private $conexion;
    public $id;
    public $nombre;
    public $dirigido;
    public $descripcion;
    public $fii;
    public $ffi;
    public $fir;
    public $ffr;
    public $fechaPublicacion;
    public $publicado;
    public $idCategoria;
    public $idProfesor;

    /**
     * Constructor de la clase Reto (Modelo) 
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
            $consulta = $this->conexion->prepare("SELECT * FROM retos ORDER BY id ASC");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE id = ?");
            $consulta->execute([$id]);
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizar(reto $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE retos SET nombre = ? WHERE id = ?");
            $update->execute(array($data->nombre, $data->id));
            // $update->execute([$data->nombre, $data->id]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(reto $data)
    {
        try {
            $insert = $this->conexion->prepare("INSERT INTO retos 
            (nombre,dirigido,descripcion,fechaInicioInscripcion, fechaFinInscripcion,fechaInicioReto, fechaFinReto, fechaPublicacion, publicado, idCategoria, idProfesor) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute(array($data->nombre, $data->dirigido, $data->descripcion, $data->fii, $data->ffi, $data->fir, $data->ffr, $data->fechaPublicacion, $data->publicado, $data->idCategoria, $data->idProfesor));
            //$insert->bindParam(1, $data->nombre);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $delete = $this->conexion->prepare("DELETE FROM retos WHERE id = ?");
            $delete->execute(array($id));
            //$delete->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function filtrado($idCategoria)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE idCategoria= ? ORDER BY id ASC");
            $consulta->execute([$idCategoria]);

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
