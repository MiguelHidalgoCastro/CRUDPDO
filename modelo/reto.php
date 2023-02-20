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

    public function retosFiltradoPorProfesor($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE idProfesor = ? ORDER BY id ASC");
            $consulta->execute(array($id));

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


    public function actualizar_old(reto $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE retos 
            SET nombre = ?, dirigido = ?, descripcion = ?,
            fechaInicioInscripcion = ?,  fechaFinInscripcion = ?,
            fechaInicioReto = ?, fechaFinReto = ?,
            fechaPublicacion = ?, publicado = ?,
            idCategoria = ?, idProfesor = ?
            WHERE id = ?");
            $update->execute(array($data->nombre, $data->dirigido, $data->descripcion, $data->fii, $data->ffi, $data->fir, $data->ffr, $data->fechaPublicacion, $data->publicado, $data->idCategoria, $data->idProfesor, $data->id));
            // $update->execute([$data->nombre, $data->id]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizar(reto $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE retos 
            SET nombre = :nombre, dirigido = :dirigido, descripcion = :descripcion,
            fechaInicioInscripcion = :fechaInicioInscripcion,  fechaFinInscripcion = :fechaFinInscripcion,
            fechaInicioReto = :fechaInicioReto, fechaFinReto = :fechaFinReto,
            fechaPublicacion = :fechaPublicacion, publicado = :publicado,
            idCategoria = :idCategoria, idProfesor = :idProfesor
            WHERE id = :id");

            $update->bindValue(':nombre', $data->nombre);
            $update->bindValue(':dirigido', $data->dirigido);
            $update->bindValue(':descripcion', $data->descripcion);
            $update->bindValue(':fechaInicioInscripcion', $data->fii);
            $update->bindValue(':fechaFinInscripcion', $data->ffi);
            $update->bindValue(':fechaInicioReto', $data->fir);
            $update->bindValue(':fechaFinReto', $data->ffr);
            $update->bindValue(':fechaPublicacion', $data->fechaPublicacion);
            $update->bindValue(':publicado', $data->publicado, PDO::PARAM_INT);
            $update->bindValue(':idCategoria', $data->idCategoria);
            $update->bindValue(':idProfesor', $data->idProfesor);
            $update->bindValue(':id', $data->id);

            $update->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function registrar(reto $data)
    {
        try {
            if ($data->descripcion == '')
                $data->descripcion = null;

            $sqlInsert = "INSERT INTO retos (nombre,dirigido,descripcion,
            fechaInicioInscripcion, fechaFinInscripcion,
            fechaInicioReto, fechaFinReto, fechaPublicacion, 
            publicado, idCategoria, idProfesor)
            VALUES (:nombre, :dirigido, :descripcion,
            :fechaInicioInscripcion,:fechaFinInscripcion,
            :fechaInicioReto,:fechaFinReto,:fechaPublicacion,
            :publicado,:idCategoria,:idProfesor)";

            $insert = $this->conexion->prepare($sqlInsert);
            $insert->bindValue(':nombre', $data->nombre);
            $insert->bindValue(':dirigido', $data->dirigido);
            $insert->bindValue(':descripcion', $data->descripcion);
            $insert->bindValue(':fechaInicioInscripcion', $data->fii);
            $insert->bindValue(':fechaFinInscripcion', $data->ffi);
            $insert->bindValue(':fechaInicioReto', $data->fir);
            $insert->bindValue(':fechaFinReto', $data->ffr);
            $insert->bindValue(':fechaPublicacion', $data->fechaPublicacion);
            $insert->bindValue(':publicado', $data->publicado, PDO::PARAM_INT);
            $insert->bindValue(':idCategoria', $data->idCategoria);
            $insert->bindValue(':idProfesor', $data->idProfesor);

            var_dump($data->publicado);
            $insert->execute();
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
