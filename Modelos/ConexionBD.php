<?php
/**
 * Clase de Conexión a Base de Datos
 * SIGEDU - Sistema de Gestión Educativa
 */

class ConexionBD {
    
    /**
     * Método para conectar a la base de datos
     * @return PDO Objeto de conexión PDO
     */
    static public function cBD(){
        try {
            // Configuración para desarrollo local (WAMPSERVER)
            $host = "localhost";
            $dbname = "idukaye1_tobar";
            $username = "root";
            $password = ""; // En WAMP por defecto está vacío
            
            // Crear conexión PDO
            $bd = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4", 
                $username, 
                $password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                )
            );
            
            return $bd;
            
        } catch(PDOException $e) {
            // En caso de error, mostrar mensaje detallado
            die("ERROR DE CONEXIÓN: " . $e->getMessage() . 
                "<br><br>Verifica que:<br>" .
                "1. MySQL esté corriendo en WAMP<br>" .
                "2. La base de datos 'idukaye1_tobar' exista<br>" .
                "3. El usuario y contraseña sean correctos");
        }
    }
}