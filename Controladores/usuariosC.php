<?php

class UsuariosC{

	//Iniciar Sesion
	public function IniciarSesionC(){

		if(isset($_POST["libreta"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["libreta"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["clave"])){

				$tablaBD = "usuarios";

				$datosC = array("libreta"=>$_POST["libreta"], "clave"=>$_POST["clave"]);

				$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

				if($resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"] && $resultado["usu"] == 1){

					$_SESSION["Ingresar"] = true;

					$_SESSION["rol"] = $resultado["rol"];
					$_SESSION["libreta"] = $resultado["libreta"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["id_carrera"] = $resultado["id_carrera"];
					$_SESSION["id"] = $resultado["id"];
					$_SESSION["dni"] = $resultado["dni"];
					$_SESSION["c_carre"] = $resultado["c_carre"];

					echo '<script>

					window.location = "inicio";
					</script>';

				}else{

					echo '<br> <div class="alert alert-danger">Error al Ingresar1</div>';

				}

			}

		}

	}

	//Ver Mis Datos
	public function VerMisDatosC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		//echo $id;

		$resultado = UsuariosM::VerMisDatosM($tablaBD, $id);
		
		$dia_nac=$resultado["fecha"];

		echo '<form method="post">

				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h3>Fecha de Nacimiento:</h3>
						<h6>formato (aaaa/mm/dd)</h6>
						<input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'">

						<input type="hidden" name="dni" value="'.$_SESSION["dni"].'">
						
						<input type="hidden" name="Uid" value="'.$_SESSION["id"].'">


						<h3>Dirección:</h3>
						<input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

						<h3>Teléfono:</h3>
						<input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

						<h3>Contraseña:</h3>
						<input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'">
						
						<h3>Nombre:</h3>
						<input type="text" class="input-lg" name="nombre" value="'.$resultado["nombre"].'"><br><br>';

 						 echo' <button type="submit" class="btn btn-success">Guardar Datos</button>';
					
					echo '</div>


					<div class="col-md-6 col-xs-12">

						<h3>Correo Electrónico:</h3>
						<input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'">

						<h3>Secundaria:</h3>
						<input type="text" class="input-lg" name="secundaria" value="'.$resultado["secundaria"].'">

						<h3>Cuit:</h3>
						<input type="text" class="input-lg" name="cuit" value="'.$resultado["cuit"].'">

                        <h3>Dni:</h3>
						<input type="text" class="input-lg" name="dni" value="'.$resultado["dni"].'">

						<h3>Apellido:</h3>
						<input type="text" class="input-lg" name="apellido" value="'.$resultado["apellido"].'">
						
						<br><br>';
	                    
	                echo'
					</div>

				</div>

			</form>';

	}




	//Actualizar Mis Datos
	public function GuardarDatosC(){

		if(isset($_POST["Uid"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["Uid"], "fecha"=>$_POST["fecha"], "direccion"=>$_POST["direccion"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "secundaria"=>$_POST["secundaria"], "cuit"=>$_POST["cuit"], "clave"=>$_POST["clave"], "dni"=>$_POST["dni"], "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"]);

			$resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>
					window.location = "http://localhost/tobar2/inicio";
					</script>';

			}

		}

	}

	//Actualizar Mis Datos
	public function BuscarUsuariosC(){

		if(isset($_POST["dnidocente"])){

			$tablaBD = "usuarios";

			//$datosC = array("id"=>$_POST["dnidocente"], "fechanac"=>$_POST["fechanac"], "direccion"=>$_POST["direccion"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "secundaria"=>$_POST["secundaria"], "lugarnac"=>$_POST["lugarnac"], "clave"=>$_POST["clave"], "dni"=>$_POST["dni"], "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"]);

			$datosC = array("id"=>$_POST["dnidocente"]);

			$resultado = UsuariosM::BuscarUsuariosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/usuariosd";
					</script>';

			}

		}

	}

	public function GuardarDatosAluC(){

		if(isset($_POST["Uid"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["Uid"], "fechanac"=>$_POST["fechanac"], "direccion"=>$_POST["direccion"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "secundaria"=>$_POST["secundaria"], "lugarnac"=>$_POST["lugarnac"], "clave"=>$_POST["clave"], "dni"=>$_POST["dni"], "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "cohorte"=>$_POST["cohorte"]);

			$resultado = UsuariosM::GuardarDatosAluM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Estudiantes/'.$_POST["orientacion"].'";
					</script>';

			}

		}

	}

	public function GuardarDocC(){

		if(isset($_POST["dnid"])){

			$tablaBD = "usuarios";

           	$columna = 'libreta';
			
			$valor = $_POST["dnid"];
            
            $resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

			if($resultado["libreta"]==$valor){
			    
			echo '<br><br>';
			    
			echo '<div class="alert alert-success">Ya existe el docente con este DNI : '.$resultado["apellido"].','.$resultado["nombre"].', Dni:'.$resultado["dni"].'</div>';    
			    
			} else {    
			
				$tablaBD = "usuarios";
				
				$idcarrera=11;
				
				$rol="Docente";

				$datosC = array("apellido"=>$_POST["apellidod"], "nombre"=>$_POST["nombred"], "libreta"=>$_POST["dnid"], "clave"=>$_POST["claved"], "id_carrera"=>$idcarrera, "rol"=>$rol);

				$resultado = UsuariosM::CrearUsuariodM($tablaBD, $datosC);

			if($resultado == true){
			    
			    
				echo '<script>

					window.location = "http://localhost/tobar2/usuariosd";
					</script>';
				
					
			}

			}

		}

	}
	
	public function ModificarDocC(){

		if(isset($_POST["Uid"])){

			$tablaBD = "usuarios";
				
			$datosC = array("id"=>$_POST["Uid"], "apellido"=>$_POST["apellidod"], "nombre"=>$_POST["nombred"], "clave"=>$_POST["claved"]);

			$resultado = UsuariosM::ActualizarDocM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/usuariosd";
					</script>';

			}

		}

	}

	public function ActmatriculaC($valor){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_SESSION["id"], "libreta"=>$valor);

			$resultado = UsuariosM::ActmatriM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/salir";
					</script>';

			}


	}



		//Crear Usuarios
		public function CrearUsuarioC(){

			if(isset($_POST["apellidoU"])){

				$tablaBD = "usuarios";

				$datosC = array("apellido"=>$_POST["apellidoU"], "nombre"=>$_POST["nombreU"], "libreta"=>$_POST["usuarioU"], "clave"=>$_POST["claveU"], "id_carrera"=>$_POST["carreraU"], "rol"=>$_POST["rolU"]);

				$resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/usuarios";
					</script>';

				}

			}

		}
		
		//Crear Usuarios docentes
		
		public function CrearUsuariodC(){

			if(isset($_POST["apellidoUd"])){

				$tablaBD = "usuarios";
				
				$idcarrera=11;
				
				$rol="Docente";

				$datosC = array("apellido"=>$_POST["apellidoUd"], "nombre"=>$_POST["nombreUd"], "libreta"=>$_POST["usuarioUd"], "clave"=>$_POST["claveUd"], "id_carrera"=>$idcarrera, "rol"=>$rol);

				$resultado = UsuariosM::CrearUsuariodM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/usuariosd";
					
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
		
		static public function VerUsuariosEC($columna, $valor){

			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuariosEM($tablaBD, $columna, $valor);

			return $resultado;

		}

		
		static public function VerSeguiC($columna, $valor){

			$tablaBD = "seguimiento";

			$resultado = UsuariosM::VerSeguiM($tablaBD, $columna, $valor);

			return $resultado;

		}

		//Ver uno o varias 
		static public function VerLibretasC($columna, $valor){

			$tablaBD = "libretas";

			$resultado = UsuariosM::VerLibretasM($tablaBD, $columna, $valor);

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
		
		//Ver Usuarios profes
		static public function VerUsuarios123C($id){

			//$columna = 'rol';
			
			//$valor = 'Docente';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios123M($tablaBD, $id);

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
		
		        // solo usuarios docentes
		        
		static public function VerUsuarios3DC($columna, $valor){

    		$columna = 'rol';
			
			$valor = 'Docente';
			
			$tablaBD = "usuarios";

			$resultado = UsuariosM::VerUsuarios3DM($tablaBD, $columna, $valor);

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
                
                if ($carre==6){
                
                    $carre1=154;
                    $carre2=153;
                    $carre3=155;
                    $carre5=157;
                    $carre6=156;
                    $carre7=158;
                    $carre9=161;

                }else if ($carre==7){

                    $carre1=163;
                    $carre2=162;
                    $carre3=164;
                    $carre5=166;
                    $carre6=165;
                    $carre7=167;
                    $carre9=170;
                    
                    
                }else if ($carre==8){

                    $carre1=171;
                    $carre2=172;
                    $carre3=173;
                    $carre5=175;
                    $carre6=174;
                    $carre7=176;
                    $carre9=179;
                    
                }else if ($carre==9){

                    $carre1=181;
                    $carre2=180;
                    $carre3=182;
                    $carre5=184;
                    $carre6=183;
                    $carre7=185;
                    $carre9=188;
                }else {
                    
                    $carre==10;

                    $carre1=190;
                    $carre2=189;
                    $carre3=191;
                    $carre5=193;
                    $carre6=192;
                    $carre7=194;
                    $carre9=196;

                }    
				
				$tablaBD = "usuarios";
				
				$idusu=$_SESSION["id"];
				
				if($carre==10){
				    $ccarre=0;
				} else {
					$ccarre=1;
				}
				//$idusu=70;

				$datosC = array("id"=>$_POST["Idu"], "id_carrera"=>$carre, "cambioc"=>$ccarre, "cod1"=>$carre1, "cod2"=>$carre2, "cod3"=>$carre3, "cod5"=>$carre5, "cod6"=>$carre6, "cod7"=>$carre7, "cod9"=>$carre9, "id_alu"=>$idusu);

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
