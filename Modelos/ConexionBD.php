<?php
/**
 * Clase de Conexión a Base de Datos
 * SIGEDU - Sistema de Gestión Educativa
 */

class ConexionBD {
    /**
     * Devuelve una conexión PDO utilizando variables de entorno cuando existen.
     * Variables soportadas: DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET
     */
    static public function cBD(){
        try {
            $host = getenv('DB_HOST') ?: 'localhost';
            $dbname = getenv('DB_NAME') ?: 'idukaye1_tobar';
            $username = getenv('DB_USER') ?: 'root';
            $password = getenv('DB_PASS') ?: '';
            $charset = getenv('DB_CHARSET') ?: 'utf8mb4';

            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $host, $dbname, $charset);

            $bd = new PDO(
                $dsn,
                $username,
                $password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $charset
                )
            );

            return $bd;
        } catch (PDOException $e) {
            die(
                'ERROR DE CONEXIÓN: ' . $e->getMessage() .
                '<br><br>Revisa configuración de conexión (host, base, usuario, clave).'
            );
        }
    }
}