<?php

require_once "ConexionBD.php";

class UsuariossM extends ConexionBD{

		//Ver Usuarios
		static public function VerUsuariossM($tablaBD, $columna, $valor){

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
		

}
