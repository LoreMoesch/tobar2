<?php
/**
 * Test de diagnóstico para el módulo de Materias
 * Guardar como: test-materias.php
 * Acceder: http://localhost/tobar2/test-materias.php
 */

session_start();
$_SESSION["Ingresar"] = true;
$_SESSION["rol"] = "Administrador";
$_SESSION["id"] = 1;

require_once "Controladores/materiasC.php";
require_once "Modelos/materiasM.php";
require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";
require_once "Modelos/ConexionBD.php";

echo "<h1>🔍 TEST DEL MÓDULO DE MATERIAS</h1><hr>";

// 1. Verificar carreras disponibles
echo "<h3>1. Carreras Disponibles:</h3>";
$carreras = CarrerasC::VerCarrerasC();

if($carreras && count($carreras) > 0){
    echo "✅ Encontradas ".count($carreras)." carrera(s)<br>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Materias</th><th>Acción</th></tr>";
    
    foreach($carreras as $carrera){
        // Contar materias de cada carrera
        $columna = "id_carrera";
        $valor = $carrera["id"];
        $materias = MateriasC::VerMaterias3C($columna, $valor);
        $cant_materias = $materias ? count($materias) : 0;
        
        echo "<tr>";
        echo "<td>{$carrera['id']}</td>";
        echo "<td>{$carrera['nombre']}</td>";
        echo "<td>{$cant_materias}</td>";
        echo "<td><a href='Crear-Materias/{$carrera['id']}' target='_blank'>Ver Materias</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "❌ No hay carreras cargadas. Debes crear carreras primero.";
}

// 2. Verificar materias existentes
echo "<h3>2. Materias en el Sistema:</h3>";
try {
    $bd = new PDO("mysql:host=localhost;dbname=idukaye1_tobar;charset=utf8mb4", "root", "");
    $stmt = $bd->query("SELECT m.*, c.nombre as nombre_carrera 
                        FROM materias m 
                        LEFT JOIN carreras c ON m.id_carrera = c.id 
                        ORDER BY c.nombre, m.grado, m.codigo");
    $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($materias) > 0){
        echo "✅ Encontradas ".count($materias)." materia(s)<br>";
        echo "<table border='1' cellpadding='5' style='font-size:12px'>";
        echo "<tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Año</th>
                <th>Tipo</th>
                <th>Correlativas R</th>
                <th>Correlativas A</th>
              </tr>";
        
        foreach($materias as $m){
            $correlativas_r = array();
            $correlativas_a = array();
            
            // Verificar correlativas regulares
            for($i=1; $i<=6; $i++){
                if($m["rc$i"] > 0) $correlativas_r[] = $m["rc$i"];
            }
            
            // Verificar correlativas aprobadas
            for($i=1; $i<=7; $i++){
                if($m["ac$i"] > 0) $correlativas_a[] = $m["ac$i"];
            }
            
            echo "<tr>";
            echo "<td>{$m['id']}</td>";
            echo "<td>{$m['codigo']}</td>";
            echo "<td>{$m['nombre']}</td>";
            echo "<td>{$m['nombre_carrera']}</td>";
            echo "<td>{$m['grado']}</td>";
            echo "<td>{$m['tipo']}</td>";
            echo "<td>".(count($correlativas_r) > 0 ? implode(", ", $correlativas_r) : '-')."</td>";
            echo "<td>".(count($correlativas_a) > 0 ? implode(", ", $correlativas_a) : '-')."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "⚠️ No hay materias cargadas en el sistema.<br>";
        echo "<p style='background:#fff3cd;padding:10px;border:1px solid #ffc107'>";
        echo "💡 <b>Sugerencia:</b> Debes crear materias para cada carrera.<br>";
        echo "Ve a <a href='Carreras'>Carreras</a> → Click en 'Materias' → Crear materias";
        echo "</p>";
    }
} catch(Exception $e){
    echo "❌ Error: " . $e->getMessage();
}

// 3. Verificar comisiones
echo "<h3>3. Comisiones Creadas:</h3>";
try {
    $stmt = $bd->query("SELECT com.*, m.nombre as nombre_materia, u.nombre as nombre_docente, u.apellido as apellido_docente
                        FROM comisiones com 
                        LEFT JOIN materias m ON com.id_materia = m.id
                        LEFT JOIN usuarios u ON com.id_docente = u.id
                        ORDER BY com.id");
    $comisiones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($comisiones) > 0){
        echo "✅ Encontradas ".count($comisiones)." comisión(es)<br>";
        echo "<table border='1' cellpadding='5' style='font-size:12px'>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Docente</th>
                <th>Año</th>
                <th>Cupo Máx</th>
                <th>Horario</th>
                <th>Días</th>
              </tr>";
        
        foreach($comisiones as $c){
            echo "<tr>";
            echo "<td>{$c['id']}</td>";
            echo "<td>{$c['nombre']}</td>";
            echo "<td>{$c['nombre_materia']}</td>";
            echo "<td>{$c['apellido_docente']} {$c['nombre_docente']}</td>";
            echo "<td>{$c['anio']}</td>";
            echo "<td>{$c['c_maxima']}</td>";
            echo "<td>{$c['horario']}</td>";
            echo "<td>{$c['dias']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "⚠️ No hay comisiones creadas.<br>";
        echo "<p style='background:#fff3cd;padding:10px;border:1px solid #ffc107'>";
        echo "💡 <b>Sugerencia:</b> Debes crear comisiones para que los alumnos puedan inscribirse.<br>";
        echo "Las comisiones son los 'cursos' específicos de cada materia.";
        echo "</p>";
    }
} catch(Exception $e){
    echo "❌ Error: " . $e->getMessage();
}

// 4. Verificar régimen de materias
echo "<h3>4. Régimen de Cursado:</h3>";
try {
    $stmt = $bd->query("SELECT * FROM regimen");
    $regimenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($regimenes) > 0){
        echo "✅ Configurado para ".count($regimenes)." materia(s)<br>";
        echo "<i>El régimen define qué % de asistencia se necesita para aprobar cada materia.</i>";
    } else {
        echo "⚠️ No hay régimen configurado para ninguna materia.<br>";
        echo "<i>Esto se configura automáticamente al crear materias.</i>";
    }
} catch(Exception $e){
    echo "❌ Error: " . $e->getMessage();
}

echo "<hr>";
echo "<h2>📋 RESUMEN:</h2>";

$total_carreras = count($carreras);
$total_materias = count($materias);
$total_comisiones = count($comisiones);

echo "<ul style='font-size:16px;line-height:2'>";
echo "<li>✅ <b>Carreras:</b> $total_carreras</li>";
echo "<li>" . ($total_materias > 0 ? "✅" : "⚠️") . " <b>Materias:</b> $total_materias</li>";
echo "<li>" . ($total_comisiones > 0 ? "✅" : "⚠️") . " <b>Comisiones:</b> $total_comisiones</li>";
echo "</ul>";

if($total_materias == 0){
    echo "<div style='background:#f8d7da;padding:15px;border:2px solid #dc3545;margin-top:20px'>";
    echo "<h3 style='color:#721c24'>⚠️ ACCIÓN REQUERIDA:</h3>";
    echo "<p>Necesitas crear materias para poder continuar con el sistema.</p>";
    echo "<ol>";
    echo "<li>Ve a <a href='Carreras'><b>Carreras</b></a></li>";
    echo "<li>Click en el botón <b>'Materias'</b> de alguna carrera</li>";
    echo "<li>Allí podrás crear las materias del plan de estudios</li>";
    echo "</ol>";
    echo "</div>";
} else if($total_comisiones == 0){
    echo "<div style='background:#fff3cd;padding:15px;border:2px solid #ffc107;margin-top:20px'>";
    echo "<h3 style='color:#856404'>💡 SIGUIENTE PASO:</h3>";
    echo "<p>Ya tienes materias. Ahora necesitas crear <b>comisiones</b> (cursos).</p>";
    echo "<p>Las comisiones son las clases específicas donde se inscribirán los alumnos.</p>";
    echo "</div>";
} else {
    echo "<div style='background:#d4edda;padding:15px;border:2px solid #28a745;margin-top:20px'>";
    echo "<h3 style='color:#155724'>✅ SISTEMA LISTO</h3>";
    echo "<p>Ya puedes inscribir alumnos a materias y gestionar el cursado.</p>";
    echo "</div>";
}

echo "<hr>";
echo "<p><a href='index.php'>← Volver al Sistema</a></p>";
?>