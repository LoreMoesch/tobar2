<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepción de los datos enviados mediante POST desde el JS   

$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$cuit = (isset($_POST['cuit'])) ? $_POST['cuit'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$cohorte = (isset($_POST['cohorte'])) ? $_POST['cohorte'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$usu = (isset($_POST['usu'])) ? $_POST['usu'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

// if ($rol=="Seleccionar Rol..."){
//       $rol="Sin Rol";
//       $carrera="11";
//    } else if ($rol=="Estudiante"){
//       $carrera="10";
//    } else if ($rol=="Docente" || $rol=="Bedel"){
//      $carrera="11";
//    } 

        $consulta = "UPDATE usuarios SET fecha='$fecha',cuit='$cuit',correo='$correo',direccion='$direccion',telefono='$telefono',cohorte='$cohorte', estado='$estado', usu='$usu' WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        // $consulta = "SELECT id,libreta,fechanac,nombre,apellido,dni,cuit,correo,direccion,telefono,estado,cohorte,usu FROM usuarios WHERE id='$id'";       
        $consulta = "SELECT id,fecha,cuit,correo,direccion,telefono,estado,cohorte,usu FROM usuarios WHERE id='$id'";    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
