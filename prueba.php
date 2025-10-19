<?php
require_once "bd/conexion.php";

try {
    $db = Conexion::Conectar();
    echo "✅ Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
