<?php
/**
 * Script de prueba de conexión a BD
 * Guardar como: C:/wamp64/www/tobar2/test-conexion.php
 * Acceder: http://localhost/tobar2/test-conexion.php
 */

echo "<h1>🔧 TEST DE CONEXIÓN SIGEDU</h1>";
echo "<hr>";

// 1. Verificar extensión PDO
echo "<h3>1. Verificando Extensión PDO MySQL:</h3>";
if (extension_loaded('pdo_mysql')) {
    echo "✅ PDO MySQL está habilitado<br>";
} else {
    echo "❌ PDO MySQL NO está habilitado. Habilítalo en php.ini<br>";
    die();
}

// 2. Intentar conexión
echo "<h3>2. Probando Conexión a BD:</h3>";
try {
    $bd = new PDO("mysql:host=localhost;dbname=idukaye1_tobar;charset=utf8mb4", "root", "");
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa a la base de datos<br>";
    
    // 3. Verificar tablas
    echo "<h3>3. Verificando Tablas:</h3>";
    $tablas = ['ajustes', 'usuarios', 'carreras', 'materias', 'comisiones'];
    
    foreach($tablas as $tabla){
        $stmt = $bd->query("SELECT COUNT(*) as total FROM $tabla");
        $resultado = $stmt->fetch();
        echo "✅ Tabla <b>$tabla</b>: {$resultado['total']} registros<br>";
    }
    
    // 4. Verificar usuarios
    echo "<h3>4. Usuarios en el Sistema:</h3>";
    $stmt = $bd->query("SELECT libreta, nombre, apellido, rol, usu FROM usuarios");
    $usuarios = $stmt->fetchAll();
    
    if(count($usuarios) > 0){
        echo "<table border='1' cellpadding='10' style='border-collapse:collapse'>";
        echo "<tr style='background:#4CAF50;color:white'>
                <th>Libreta</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>Acceso (usu)</th>
              </tr>";
        
        foreach($usuarios as $user){
            $color = $user['usu'] == 1 ? '#90EE90' : '#FFB6C6';
            echo "<tr style='background:$color'>
                    <td>{$user['libreta']}</td>
                    <td>{$user['nombre']}</td>
                    <td>{$user['apellido']}</td>
                    <td>{$user['rol']}</td>
                    <td align='center'>{$user['usu']}</td>
                  </tr>";
        }
        echo "</table>";
        echo "<br><i>Nota: Solo usuarios con usu=1 pueden acceder</i>";
    } else {
        echo "⚠️ No hay usuarios en el sistema. Ejecuta el script SQL de inicialización.";
    }
    
    // 5. Verificar ajustes
    echo "<h3>5. Configuración del Sistema (Ajustes):</h3>";
    $stmt = $bd->query("SELECT * FROM ajustes WHERE id=1");
    $ajustes = $stmt->fetch();
    
    if($ajustes){
        echo "✅ Cuatrimestre: <b>{$ajustes['cuatrimestre']}</b><br>";
        echo "✅ Mantenimiento: " . ($ajustes['mto'] == 0 ? 'Desactivado' : 'Activado') . "<br>";
        echo "✅ Sistema configurado correctamente<br>";
    } else {
        echo "❌ No hay configuración en tabla ajustes. Ejecuta el script SQL de inicialización.";
    }
    
    echo "<hr>";
    echo "<h2 style='color:green'>✅ SISTEMA LISTO PARA USAR</h2>";
    echo "<a href='index.php' style='background:#4CAF50;color:white;padding:10px 20px;text-decoration:none;display:inline-block;margin-top:10px'>IR AL LOGIN</a>";
    
} catch(PDOException $e) {
    echo "<h3 style='color:red'>❌ ERROR DE CONEXIÓN</h3>";
    echo "<p style='background:#FFE6E6;padding:10px;border:2px solid red'>";
    echo "<b>Mensaje:</b> " . $e->getMessage() . "<br><br>";
    echo "<b>Soluciones posibles:</b><br>";
    echo "1. Verifica que WAMP esté corriendo (ícono verde)<br>";
    echo "2. Verifica que MySQL esté activo<br>";
    echo "3. La base de datos 'idukaye1_tobar' debe existir<br>";
    echo "4. Ejecuta el script SQL de inicialización en phpMyAdmin<br>";
    echo "</p>";
}
?>