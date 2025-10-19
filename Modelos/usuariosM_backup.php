<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{


	//Iniciar Sesion
	static public function IniciarSesionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta ");

		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	//Ver Mis Datos
	static public function VerMisDatosM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	//Guardar Mis Datos
	static public function GuardarDatosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, correo = :correo, secundaria = :secundaria, clave = :clave, lugarnac = :lugarnac, dni = :dni, nombre = :nombre, apellido = :apellido WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":dni", $datosC["dni"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":secundaria", $datosC["secundaria"], PDO::PARAM_STR);
		$pdo -> bindParam(":lugarnac", $datosC["lugarnac"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();
		$pdo = null;

	}




		//Crear Usuarios
		static public function CrearUsuarioM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (libreta, clave, apellido, nombre, id_carrera, rol) VALUES (:libreta, :clave, :apellido, :nombre, :id_carrera, :rol)");

			$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
			$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
			$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}

		//Ver Usuarios
		static public function VerUsuariosM($tablaBD, $columna, $valor){

			if($columna != null){

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetch();

			}else{

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido");

				$pdo -> execute();

				return $pdo -> fetchAll();

			}

			$pdo -> close();
			$pdo = null;

		}
		
		//Ver Usuarios profes uno o varios
		
		static public function VerUsuarios1M($tablaBD, $id){

			if($id != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Docente' and id = :id ");

            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

			//$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

	   		return $pdo -> fetch();

			} else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Docente' ORDER BY apellido");

			//$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			}
			
			$pdo -> close();

			$pdo = null;
			

		}
		// usuarios de sordos
		static public function VerUsuarios3SM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 7 ORDER BY apellido");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			$pdo -> close();

			$pdo = null;

		}
		
		// usuarios de intelectuales
		
		static public function VerUsuarios3IM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 8 ORDER BY apellido");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			$pdo -> close();

			$pdo = null;

		}		
		
		// usuarios de Neuro
		
		static public function VerUsuarios3NM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 6 ORDER BY apellido");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			$pdo -> close();

			$pdo = null;

		}
		
		// usuarios de Ciegos
		
		static public function VerUsuarios3CM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 9 ORDER BY apellido");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			$pdo -> close();

			$pdo = null;

		}

		// usuarios Comun
		
		static public function VerUsuarios3COM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 10 ORDER BY apellido");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
			$pdo -> execute();

			return $pdo -> fetchAll();

			$pdo -> close();

			$pdo = null;

		}				

		//Ver Usuarios2
		static public function VerUsuarios2M($tablaBD, $columna, $valor){

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetchAll();

			$pdo -> close();
			$pdo = null;

		}


		//Actualizar Usuarios
		static public function ActualizarUsuariosM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, estado = :estado, libreta = :libreta, clave = :clave, id_carrera = :id_carrera, rol = :rol WHERE id = :id");

			$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
			$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
			$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
			$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}

		
		static public function ActualizarCarreraM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_carrera = :id_carrera WHERE id = :id; UPDATE insc_materias SET id_materia = :c146, id_comision = :co146 WHERE id_alumno = :id_alu and id_materia = 146; UPDATE insc_materias SET id_materia = :c147, id_comision = :co147 WHERE id_alumno = :id_alu and id_materia = 147; UPDATE insc_materias SET id_materia = :c148, id_comision = :co148 WHERE id_alumno = :id_alu and id_materia = 148; UPDATE insc_materias SET id_materia = :c149, id_comision = :co149 WHERE id_alumno = :id_alu and id_materia = 149; UPDATE insc_materias SET id_materia = :c150, id_comision = :co150 WHERE id_alumno = :id_alu and id_materia = 150; UPDATE insc_materias SET id_materia = :c151, id_comision = :co151 WHERE id_alumno = :id_alu and id_materia = 151; UPDATE insc_materias SET id_materia = :c152, id_comision = :co152 WHERE id_alumno = :id_alu and id_materia = 152;");

			$pdo -> bindParam(":c146", $datosC["c146"], PDO::PARAM_INT);
			$pdo -> bindParam(":c147", $datosC["c147"], PDO::PARAM_INT);
			$pdo -> bindParam(":c148", $datosC["c148"], PDO::PARAM_INT);
			$pdo -> bindParam(":c149", $datosC["c149"], PDO::PARAM_INT);
			$pdo -> bindParam(":c150", $datosC["c150"], PDO::PARAM_INT);
			$pdo -> bindParam(":c151", $datosC["c151"], PDO::PARAM_INT);
			$pdo -> bindParam(":c152", $datosC["c152"], PDO::PARAM_INT);
			$pdo -> bindParam(":co146", $datosC["co146"], PDO::PARAM_INT);
			$pdo -> bindParam(":co147", $datosC["co147"], PDO::PARAM_INT);
			$pdo -> bindParam(":co148", $datosC["co148"], PDO::PARAM_INT);
			$pdo -> bindParam(":co149", $datosC["co149"], PDO::PARAM_INT);
			$pdo -> bindParam(":co150", $datosC["co150"], PDO::PARAM_INT);
			$pdo -> bindParam(":co151", $datosC["co151"], PDO::PARAM_INT);
			$pdo -> bindParam(":co152", $datosC["co152"], PDO::PARAM_INT);
			$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
	        $pdo -> bindParam(":id_alu", $datosC["id_alu"], PDO::PARAM_INT);
			
			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}

		
		static public function ActualizarCarrera2M($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_carrera = :id_carrera WHERE id = :id ");

			$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);

			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}



		//Eliminar Usuarios
		static public function EliminarUsuariosM($tablaBD, $id){

			$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

			$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}




}
