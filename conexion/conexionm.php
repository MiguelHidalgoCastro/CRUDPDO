<?php
require_once 'config/config.php';
class ConexionM
{
    /**
     * Función para conectar con el driver MySQLi para conectar con la BBDD
     */

    public static function conectar()
    {
        $mysqli = new mysqli(SERVIDOR, DBUSER, DBPASS, DB);
        $mysqli->set_charset(CHARSET);
        return $mysqli;
    }
}
