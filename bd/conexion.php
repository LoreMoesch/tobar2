<?php 
class Conexion {
    public static function Conectar() {
        $servidor = "localhost";
        $nombre_bd = "idukaye1_tobar";
        $usuario = "root";
        $password = "";

        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_bd", $usuario, $password, $opciones);
            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es: " . $e->getMessage());
        }
    }
}






//CODIGO DE ANDRADA

/* <?php
class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'idukaye1_tobar');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}*/