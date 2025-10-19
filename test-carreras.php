<?php
/**
 * Guardar como: test-carreras.php
 * Acceder: http://localhost/tobar2/test-carreras.php
 */

session_start();

// Simular sesión de admin
$_SESSION["Ingresar"] = true;
$_SESSION["rol"] = "Administrador";
$_SESSION["id"] = 1;

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";
require_once "Modelos/ConexionBD.php";

echo "<h1>🔍 TEST DE CARRERAS</h1><hr>";

// 1. Verificar que existen carreras en BD
try {
    $bd = new PDO("mysql:host=localhost;dbname=idukaye1_tobar;charset=utf8mb4", "root", "");
    $stmt = $bd->query("SELECT * FROM carreras");
    $carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>1. Carreras en Base de Datos:</h3>";
    if(count($carreras) > 0){
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Nom Corto</th><th>Plan</th><th>Turno</th></tr>";
        foreach($carreras as $c){
            echo "<tr>";
            echo "<td>{$c['id']}</td>";
            echo "<td>{$c['nombre']}</td>";
            echo "<td>{$c['nom_corto']}</td>";
            echo "<td>{$c['plan']}</td>";
            echo "<td>{$c['turno']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "❌ No hay carreras en la BD";
    }
    
} catch(Exception $e){
    echo "❌ Error: " . $e->getMessage();
}

// 2. Probar el método del controlador
echo "<h3>2. Probando Método VerCarrerasC():</h3>";
try {
    $resultado = CarrerasC::VerCarrerasC();
    
    if($resultado && count($resultado) > 0){
        echo "✅ El método devuelve " . count($resultado) . " carrera(s)<br>";
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    } else {
        echo "❌ El método no devuelve datos";
    }
} catch(Exception $e){
    echo "❌ Error en método: " . $e->getMessage();
}

echo "<hr>";
echo "<h3>3. Verificar Rol de Sesión:</h3>";
echo "Rol actual: <b>" . $_SESSION["rol"] . "</b><br>";
echo "ID usuario: <b>" . $_SESSION["id"] . "</b><br>";

if($_SESSION["rol"] == "Administrador"){
    echo "✅ Tienes permisos de Administrador<br>";
} else {
    echo "❌ No eres Administrador<br>";
}
?>