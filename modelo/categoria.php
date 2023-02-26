<?php

/**
 * MODELO CATEGORÍA
 */
class Categoria
{
    private $conexion;
    public $id;
    public $nombre;

    /**
     * Constructor de la clase Categoria (Modelo) 
     * Conectamos con la base de datos
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
     * Función que obtiene todas las categorías ordenadas por orden de insercción a la BBDD
     * @return Array lista de categorías
     */
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

    /**
     * Función que obtiene una categoría por id
     * Si no existe la categoría devuelve undefined
     * @return Object Devuelve un objeto
     */
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

    /**
     * Fucnión que actualiza una Categoria
     * @param Categoria $data los nuevos datos de la categoría
     * @return Boolean devuelve true si se ha ejectuado correctamente
     */
    public function actualizar(Categoria $data)
    {
        try {
            $update = $this->conexion->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");
            return $update->execute(array($data->nombre, $data->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función que registra una Categoria
     * @param Categoria $data los datos de la categoría
     * @return Boolean devuelve true si se ha ejectuado correctamente
     */
    public function registrar(Categoria $data)
    {
        try {
            $insert = $this->conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
            return $insert->execute(array($data->nombre));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función que elimina una categoría 
     * @param Number $id es el id de la categoría que quiero eliminar
     * @return Boolean devuelve true si se ha ejectuado correctamente
     */
    public function eliminar($id)
    {
        try {
            $delete = $this->conexion->prepare("DELETE FROM categorias WHERE id = ?");
            return $delete->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
