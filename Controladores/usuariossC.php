<?php
class UsuariossC{
		//Ver uno o varios Usuarios estudiantes
		static public function VerUsuariossC($columna, $valor){
			$tablaBD = "usuarios_log";
			$resultado = UsuariossM::VerUsuariossM($tablaBD, $columna, $valor);
			return $resultado;
		}
}

