<?php
require_once 'config/config.php';
class Conexion
{
    /**
     * Función para conectar con el driver PDO para conectar con la BBDD
     */
    public static function conectar()
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB . ';charset=' . CHARSET, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
