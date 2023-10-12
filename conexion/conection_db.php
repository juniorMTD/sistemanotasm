<?php

class Conexion
{

    //conectar base de datos
    function Conexiondb()
    {
        $host = 'localhost';
        $dbname = 'dbconsultanotas';
        $username = 'root';
        $pasword = '';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pasword);
            $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            echo ("Se conecto correctamente a la base de datos, error:$exp");
        }
        return $conn;
    }
}
