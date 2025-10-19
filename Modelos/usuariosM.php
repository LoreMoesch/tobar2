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
	static public function BuscarUsuariosM($tablaBD, $datosC){

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

	//Guardar Mis Datos
	static public function GuardarDatosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha = :fecha, direccion = :direccion, telefono = :telefono, correo = :correo, secundaria = :secundaria, clave = :clave, cuit = :cuit, dni = :dni, nombre = :nombre, apellido = :apellido WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":dni", $datosC["dni"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":secundaria", $datosC["secundaria"], PDO::PARAM_STR);
		$pdo -> bindParam(":cuit", $datosC["cuit"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();
		$pdo = null;

	}

	static public function GuardarDatosAluM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, correo = :correo, secundaria = :secundaria, clave = :clave, lugarnac = :lugarnac, dni = :dni, nombre = :nombre, apellido = :apellido, cohorte = :cohorte WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":dni", $datosC["dni"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":secundaria", $datosC["secundaria"], PDO::PARAM_STR);
		$pdo -> bindParam(":lugarnac", $datosC["lugarnac"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":cohorte", $datosC["cohorte"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();
		$pdo = null;

	}

	static public function GuardarDocM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, correo = :correo, secundaria = :secundaria, clave = :clave, lugarnac = :lugarnac, dni = :dni, nombre = :nombre, apellido = :apellido, cohorte = :cohorte WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":dni", $datosC["dni"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":secundaria", $datosC["secundaria"], PDO::PARAM_STR);
		$pdo -> bindParam(":lugarnac", $datosC["lugarnac"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":cohorte", $datosC["cohorte"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();
		$pdo = null;

	}
	
	static public function ActmatriM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET libreta = :libreta WHERE id = :id;UPDATE libretas SET cambio = 1 WHERE id_alumno = :id;");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

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
		
		//Crear Usuarios Docentes 
		
		static public function CrearUsuariodM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (libreta, clave, nombre, apellido, id_carrera, rol, fechanac, direccion, telefono, correo, pais, secundaria, dni, cohorte, estado, lugarnac, c_carre) VALUES (:libreta, :clave, :nombre, :apellido, :id_carrera, :rol, '', '', '', '', '', '', '', '', '', '', 0)");

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
		
		static public function VerUsuariosEM($tablaBD, $columna, $valor){

			if($columna != null){

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Estudiante' and $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetch();

			}else{

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Estudiante' ORDER BY apellido");

				$pdo -> execute();

				return $pdo -> fetchAll();

			}

			$pdo -> close();
			$pdo = null;

		}

		static public function VerSeguiM($tablaBD, $columna, $valor){

			if($columna != null){

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetch();

			}else{

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

				$pdo -> execute();

				return $pdo -> fetchAll();

			}

			$pdo -> close();
			$pdo = null;

		}


		//Ver Libretas
		static public function VerLibretasM($tablaBD, $columna, $valor){

			if($columna != null){

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetch();

			}else{

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY dni");

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

			$pdo -> execute();

	   		return $pdo -> fetch();

			} else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido");

			$pdo -> execute();

			return $pdo -> fetchAll();

			}
			
			$pdo -> close();

			$pdo = null;
			

		}
		
				//Ver Usuarios profes uno o varios
		
		static public function VerUsuarios123M($tablaBD, $id){

			if($id != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Docente' and id = :id ");

            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

			$pdo -> execute();

	   		return $pdo -> fetch();

			} else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Docente' ORDER BY apellido");

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
		
		// usuarios docentes
		
		static public function VerUsuarios3DM($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND id_carrera = 11 ORDER BY id");

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

		//Actualizar Usuarios docentes
		static public function ActualizarDocM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, clave = :clave WHERE id = :id");

			$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

			if($pdo -> execute()){
				return true;
			}

			$pdo -> close();
			$pdo = null;

		}
		
		
		static public function ActualizarCarreraM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_carrera = :id_carrera, c_carre = :cambioc WHERE id = :id; UPDATE insc_materias SET id_materia = :cod1 WHERE id_alumno = :id_alu and orden = 1; UPDATE insc_materias SET id_materia = :cod2 WHERE id_alumno = :id_alu and orden = 2; UPDATE insc_materias SET id_materia = :cod3 WHERE id_alumno = :id_alu and orden = 3; UPDATE insc_materias SET id_materia = :cod5 WHERE id_alumno = :id_alu and orden = 5; UPDATE insc_materias SET id_materia = :cod6 WHERE id_alumno = :id_alu and orden = 6; UPDATE insc_materias SET id_materia = :cod7 WHERE id_alumno = :id_alu and orden = 7; UPDATE insc_materias SET id_materia = :cod9 WHERE id_alumno = :id_alu and orden = 9; insert into act_orien values (:id_alu,:id_carrera,'2023');");

			$pdo -> bindParam(":cambioc", $datosC["cambioc"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod1", $datosC["cod1"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod2", $datosC["cod2"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod3", $datosC["cod3"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod5", $datosC["cod5"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod6", $datosC["cod6"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod7", $datosC["cod7"], PDO::PARAM_INT);
			$pdo -> bindParam(":cod9", $datosC["cod9"], PDO::PARAM_INT);
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
