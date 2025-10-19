<?php

class UsuariosC{

	//Iniciar Sesion
	public function IniciarSesionC(){

		if(isset($_POST["libreta"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["libreta"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["clave"])){

				$tablaBD = "usuarios";

				$datosC = array("libreta"=>$_POST["libreta"], "clave"=>$_POST["clave"]);

				$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

				if($resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"]){

					$_SESSION["Ingresar"] = true;

					$_SESSION["rol"] = $resultado["rol"];
					$_SESSION["libreta"] = $resultado["libreta"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["id_carrera"] = $resultado["id_carrera"];
					$_SESSION["id"] = $resultado["id"];
					$_SESSION["plan"] = $resultado["plan"];

					echo '<script>

					window.location = "inicio";
					</script>';

				}else{

					echo '<br> <div class="alert alert-danger">Error al Ingresar</div>';

				}

			}

		}

	}

	//Ver Mis Datos
	public function VerMisDatosC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		$resultado = UsuariosM::VerMisDatosM($tablaBD, $id);
		
		$dia_nac=$resultado["fechanac"];

		echo '<form method="post">

				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h2>Fecha de Nacimiento:</h2>
						<input type="text" class="input-lg" name="fechanac" value="'.$resultado["fechanac"].'">

						<input type="hidden" name="dni" value="'.$_SESSION["dni"].'">
						
						<input type="hidden" name="Uid" value="'.$_SESSION["id"].'">


						<h2>Dirección:</h2>
						<input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

						<h2>Teléfono:</h2>
						<input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

						<h2>Contraseña:</h2>
						<input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'">
						
						<h2>Nombre:</h2>
						<input type="text" class="input-lg" name="nombre" value="'.$resultado["nombre"].'">

					</div>


					<div class="col-md-6 col-xs-12">

						<h2>Correo Electrónico:</h2>
						<input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'">

						<h2>Secundaria:</h2>
						<input type="text" class="input-lg" name="secundaria" value="'.$resultado["secundaria"].'">

						<h2>Lugar de Nacimiento:</h2>
						<input type="text" class="input-lg" name="lugarnac" value="'.$resultado["lugarnac"].'">

                        <h2>Dni:</h2>
						<input type="text" class="input-lg" name="dni" value="'.$resultado["dni"].'">

						<h2>Apellido:</h2>
						<input type="text" class="input-lg" name="apellido" value="'.$resultado["apellido"].'">
						
						<br><br>';
                         
						
						  echo' <button type="submit" class="btn btn-success">Guardar Datos</button>';
	                    
	                    
	                echo'
					</div>

				</div>

			</form>';

	}






	//Actualizar Mis Datos
	public function GuardarDatosC(){

		if(isset($_POST["Uid"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["Uid"], "fechanac"=>$_POST["fechanac"], "direccion"=>$_POST["direccion"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "secundaria"=>$_POST["secundaria"], "lugarnac"=>$_POST["lugarnac"], "clave"=>$_POST["clave"], "dni"=>$_POST["dni"], "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"]);

			$resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/mis-datos";
					</script>';

			}

		}

	}



		//Crear Usuarios
		public function CrearUsuarioC(){

			if(isset($_POST["apellidoU"])){

				$tablaBD = "usuarios";
				if ($_POST["carreraU"] =0){
				    
				    $carre = 10;
				    
				}else{
				    
				    $carre = $_POST["carreraU"];
				}
				
				$datosC = array("apellido"=>$_POST["apellidoU"], "nombre"=>$_POST["nombreU"], "libreta"=>$_POST["usuarioU"], "clave"=>$_POST["claveU"], "id_carrera"=>$carre, "rol"=>$_POST["rolU"]);

				$resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/usuarios";
					</script>';

				}

			}

		}




		//Ver uno o varios Usuarios
		static public function VerUsuariosC($columna, $valor){

			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

			return $resultado;

		}
		
		//Ver Usuarios profes
		static public function VerUsuarios1C($id){

			//$columna = 'rol';
			
			//$valor = 'Docente';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios1M($tablaBD, $id);

			return $resultado;

		}
		
		
		//Ver Usuarios alumnos
		static public function VerUsuarios3C($columna, $valor){

			$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios1M($tablaBD, $columna, $valor);

			return $resultado;

		}
		
		//Usuarios de sordos
		static public function VerUsuarios3SC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3SM($tablaBD, $columna, $valor);

			return $resultado;

		}
		
        // usuarios de Intelectuales
		static public function VerUsuarios3IC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3IM($tablaBD, $columna, $valor);

			return $resultado;

		}
		
        // usuarios de Neuro
		static public function VerUsuarios3NC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3NM($tablaBD, $columna, $valor);

			return $resultado;

		}		
		
        // usuarios de Ciegos
		static public function VerUsuarios3CC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3CM($tablaBD, $columna, $valor);

			return $resultado;

		}
		
        // usuarios comun
		static public function VerUsuarios3COC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Estudiante';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3COM($tablaBD, $columna, $valor);

			return $resultado;

		}		
		
		//Ver Usuarios2
		static public function VerUsuarios2C($columna, $valor){

			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios2M($tablaBD, $columna, $valor);

			return $resultado;

		}

		//Actualizar Usuarios
		public function ActualizarUsuariosC(){

			if(isset($_POST["Uid"])){

				$tablaBD = "usuarios";

				$datosC = array("id"=>$_POST["Uid"], "apellido"=>$_POST["apellidoEU"], "estado"=>$_POST["estadoEU"], "nombre"=>$_POST["nombreEU"], "libreta"=>$_POST["usuarioEU"], "clave"=>$_POST["claveEU"], "id_carrera"=>$_POST["carreraEU"], "rol"=>$_POST["rolEU"]);

				$resultado = UsuariosM::ActualizarUsuariosM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/usuarios";
					</script>';

				}

			}

		}
		
		public function ActualizarCarreraC(){

			if(isset($_POST["Idu"])){
			    
			    $carre=$_POST["carrera"];			    
                
                if ($carre==1){
                
                    $carre189=153;
                    $comi146=1;
                    $carre190=154;
                    $comi147=3;
                    $carre191=155;
                    $comi148=4;
                    $carre192=156;
                    $comi149=5;
                    $carre193=157;
                    $comi150=6;
                    $carre194=158;
                    $comi151=7;
                    $carre195=159;
                    $comi152=9;
                    $carre196=161;
                    $comi152=10;
                    
                }else if ($carre==2){

                    $carre146=1;
                    $comi146=19;
                    $carre147=3;
                    $comi147=21;
                    $carre148=4;
                    $comi148=22;
                    $carre149=5;
                    $comi149=23;
                    $carre150=6;
                    $comi150=24;
                    $carre151=7;
                    $comi151=25;
                    $carre152=9;
                    $comi152=27;
                }else if ($carre==3){

                    $carre146=74;
                    $comi146=28;
                    $carre147=76;
                    $comi147=30;
                    $carre148=77;
                    $comi148=31;
                    $carre149=78;
                    $comi149=32;
                    $carre150=79;
                    $comi150=33;
                    $carre151=80;
                    $comi151=34;
                    $carre152=82;
                    $comi152=36;
                    
                }else if ($carre==4){

                    $carre146=37;
                    $comi146=10;
                    $carre147=39;
                    $comi147=12;
                    $carre148=40;
                    $comi148=13;
                    $carre149=41;
                    $comi149=14;
                    $carre150=42;
                    $comi150=15;
                    $carre151=43;
                    $comi151=16;
                    $carre152=45;
                    $comi152=18;
                }else {
                    
                    $carre==5;

                    $carre146=146;
                    $comi146=38;
                    $carre147=147;
                    $comi147=39;
                    $carre148=148;
                    $comi148=42;
                    $carre149=149;
                    $comi149=43;
                    $carre150=150;
                    $comi150=44;
                    $carre151=151;
                    $comi151=45;
                    $carre152=152;
                    $comi152=46;
                }    
				
				$tablaBD = "usuarios";
				
				$idusu=$_SESSION["id"];
				
				//$idusu=70;


				$datosC = array("id"=>$_POST["Idu"], "id_carrera"=>$carre, "c146"=>$carre146, "c147"=>$carre147, "c148"=>$carre148, "c149"=>$carre149, "c150"=>$carre150, "c151"=>$carre151, "c152"=>$carre152, "co146"=>$comi146, "co147"=>$comi147, "co148"=>$comi148, "co149"=>$comi149, "co150"=>$comi150, "co151"=>$comi151, "co152"=>$comi152, "id_alu"=>$idusu);


				$resultado = UsuariosM::ActualizarCarreraM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/salir";
					</script>';

				}

			}

		}

        //Cambiia Solo el id_carrera 
		public function ActualizarCarrera2C(){

			if(isset($_POST["Idu"])){
			    
			    $carre=$_POST["carrera"];			    
                
				$tablaBD = "usuarios";
				
				//$idusu=$_SESSION["id"];
				
				//$idusu=70;


				$datosC = array("id"=>$_POST["Idu"], "id_carrera"=>$carre);


				$resultado = UsuariosM::ActualizarCarrera2M($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/salir";
					</script>';

				}

			}

		}


		//Eliminar Usuarios
		public function EliminarUsuariosC(){

			if(isset($_GET["Uid"])){
			    

				$tablaBD = "usuarios";

				$id = $_GET["Uid"];

				$resultado = UsuariosM::EliminarUsuariosM($tablaBD, $id);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/usuarios";
					</script>';

				}

			}

		}



}
