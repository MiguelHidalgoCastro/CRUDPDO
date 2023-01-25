<?php
class Conexion
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=2daw.esvirgua.com;dbname=user2daw_BD1-06;charset=utf8', 'user2daw_06', '6F.Z@GPTwB!s');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
