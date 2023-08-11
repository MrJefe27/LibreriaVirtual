<?php

class Database {
    //Declarando las variables de conexion
    private $hostname = 'localhost';
    private $database = 'dblibreria';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8';

    //Declarando la funcion para ejecutar la conexion con la base de datos
    function conectar(){

        try{
        $conexion = "mysql:host=".$this->hostname."; dbname=".$this->database."; charset=".$this->charset;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        
        //Declarando y retornando la conexion con la base de datos
        $pdo = new PDO($conexion, $this->username, $this->password, $options);
        
        return $pdo;

        } catch(PDOException $e){
            
            echo 'Error de conexion: '.$e->getMessage();
            exit;
        }
    }
}

?>