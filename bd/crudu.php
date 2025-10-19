<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepción de los datos enviados mediante POST desde el JS   

$libreta = (isset($_POST['libreta'])) ? $_POST['libreta'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

if ($rol=="Seleccionar Rol..."){
      $rol="Sin Rol";
      $carrera="11";
   } else if ($rol=="Estudiante"){
      $carrera="10";
   } else if ($rol=="Docente" || $rol=="Bedel"){
     $carrera="11";
   } 

switch($opcion){
    case 1: //alta

        $consulta = "INSERT INTO usuarios (`libreta`, `clave`, `nombre`, `apellido`, `id_carrera`, `rol`, `dni`, `cohorte`, `estado`, `c_carre`, `usu`) VALUES ('$libreta', '$clave', '$nombre', '$apellido', '$carrera', '$rol','$dni','', '',0,1)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, libreta, nombre, apellido, dni, rol, clave FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE usuarios SET libreta='$libreta', nombre='$nombre', apellido='$apellido', dni='$dni', clave='$clave', rol='$rol' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, libreta, nombre, apellido, dni, rol, clave FROM usuarios WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM usuarios WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
		
	    $consulta = "SELECT id, libreta,  nombre, apellido, dni, rol, clave FROM usuarios";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);			
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
