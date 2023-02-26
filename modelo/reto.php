<?php

/**
 * MODELO RETO
 */
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
     */
    public function __construct()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Funcion que obtiene todos los retos ordenados por la columna publicado en orden descendente y luego ordenado por categorías
     * @return Array de objetos, con todos los retos
     */
    public function listarRetos()
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos ORDER BY publicado DESC, idCategoria");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Funcion que obtiene todos los retos guardados en borrador, ordenados por categorías
     * @return Array de objetos, con todos los retos coincidentes
     */
    public function listarNoPublicados()
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE publicado = 0 ORDER BY idCategoria");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Funcion que obtiene todos los retos publicados, ordenados por categorías
     * @return Array de objetos, con todos los retos coincidentes
     */
    public function listarPublicados()
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE publicado = 1 ORDER BY idCategoria");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Funcion que obtiene todos los retos publicados de un profesor en concreto
     * @param Number $id id del profesor, que es el que está guardado en la sesión
     * @return Array de objetos, con todos los retos coincidentes
     */
    public function retosfiltradoporprofesorpublicados($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE idProfesor = ? AND publicado = 1 ORDER BY id ASC");
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Funcion que obtiene todos los retos no publicados de un profesor en concreto
     * @param Number $id id del profesor, que es el que está guardado en la sesión
     * @return Array de objetos, con todos los retos coincidentes
     */
    public function retosfiltradoporprofesorborrador($id)
    {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE idProfesor = ? AND publicado=0 ORDER BY id ASC");
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función que obtiene un reto por id
     * @param Number $id id del reto concreto
     * @return Object con el reto obtenido
     */
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

    /**
     * Funcion de como actualizaba antes un reto, pero no funcionaba con un Bit 
     * @param Reto $data con los datos nuevos del reto
     * @return Boolean 
     */
    public function actualizar_old(Reto $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE retos 
            SET nombre = ?, dirigido = ?, descripcion = ?,
            fechaInicioInscripcion = ?,  fechaFinInscripcion = ?,
            fechaInicioReto = ?, fechaFinReto = ?,
            fechaPublicacion = ?, publicado = ?,
            idCategoria = ?, idProfesor = ?
            WHERE id = ?");
            return $update->execute(array($data->nombre, $data->dirigido, $data->descripcion, $data->fii, $data->ffi, $data->fir, $data->ffr, $data->fechaPublicacion, $data->publicado, $data->idCategoria, $data->idProfesor, $data->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para actualizar un reto
     * @param Reto $data con los datos nuevos del reto
     * @return Boolean 
     */
    public function actualizar(Reto $data)
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
            $update->bindValue(':publicado', $data->publicado, PDO::PARAM_INT); // aquí está la solución al Bit
            $update->bindValue(':idCategoria', $data->idCategoria);
            $update->bindValue(':idProfesor', $data->idProfesor);
            $update->bindValue(':id', $data->id);

            return $update->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para crear un reto
     * @param Reto $data con los datos del reto nuevo
     * @return Boolean
     */
    public function registrar(Reto $data)
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
            $insert->bindValue(':publicado', $data->publicado, PDO::PARAM_INT); // aquí está la solución al Bit
            $insert->bindValue(':idCategoria', $data->idCategoria);
            $insert->bindValue(':idProfesor', $data->idProfesor);

            return $insert->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para crear un reto
     * @param Number $id del reto que quiero eliminar
     * @return Boolean
     */
    public function eliminar($id)
    {
        try {
            $delete = $this->conexion->prepare("DELETE FROM retos WHERE id = ?");
            return $delete->execute(array($id));
            //la otra forma de hacerlo
            //return $delete->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función que obtiene los retos que tengan una categoría en concreto
     * @param Number $idCategoria id de la categoría que quiero buscar
     * @param String $publicado
     * @return Array retos de una categoría en concreto
     */
    public function filtrado($idCategoria, $publicado)
    {
        try {
            $bit = 0;
            if ($publicado == 'publicado') {
                $bit = 1;
            }
            $consulta = $this->conexion->prepare("SELECT * FROM retos WHERE idCategoria= ? AND publicado = ? ORDER BY id ASC");
            $consulta->execute(array($idCategoria, $bit));

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
