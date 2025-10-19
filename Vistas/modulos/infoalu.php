<?php

if($_SESSION["rol"] == "Estudiante"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$exp = explode("/", $_GET["url"]);


?>

<div class="container">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
						 <?php


		$tablaBD = "usuarios";
		
		$id = $exp[1];

		$resultado = UsuariosM::VerMisDatosM($tablaBD, $id);
		
		$columna= "id_alumno";
         
        $valor= $exp[1];

        $libretas = UsuariosC::VerLibretasC($columna, $valor);
		
		//$dia_nac=$resultado["fechanac"];

		echo '<form method="post">

				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h5>Nombre:<input type="text" class="input-lg" name="nombre" value="'.$resultado["nombre"].'"></h5>
						
						<h5>Apellido:<input type="text" class="input-lg" name="apellido" value="'.$resultado["apellido"].'"></h5>

                        <h5>Dni:<input type="text" class="input-lg" name="dni" value="'.$resultado["dni"].'"></h5>

						
						
						<input type="hidden" name="Uid" value="'.$resultado["id"].'">


						<h5>Direcci&oacute;n:<input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'"></h5>

						<h5>Tel&eacute;fono:<input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'"></h5>

					
						<input type="hidden" class="input-lg" name="orientacion" value="'.$exp[2].'">

						<h5>Correo Electr&oacute;nico:<input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'"></h5>

						<h5>Secundaria:<input type="text" class="input-lg" name="secundaria" value="'.$resultado["secundaria"].'"></h5>



					</div>


					<div class="col-md-6 col-xs-12">

						<h5>Fecha de Nacimiento:<input type="text" class="input-lg" name="fechanac" value="'.$resultado["fecha"].'"></h5>

						<h5>Cuit:<input type="text" class="input-lg" name="lugarnac" value="'.$resultado["cuit"].'"></h5>
						
						<h5>Cohorte:<input type="text" class="input-lg" name="cohorte" value="'.$resultado["cohorte"].'"></h5>';
						
					
						if($libretas["cambio"] == 0 ){
					
						  echo '<h5><span>Matricula: '.$libretas["libreta"].'</span><span style="font-size:20px;color:red"> (Sin Actualizar)<span></h5>
						  
						  ';
						
						} else {
						    
						  echo '<h5><span>Matricula: '.$libretas["libreta"].'</span><span style="font-size:20px;color:blue"> (Actualizado)<span></h5>';  
						}
						echo '<h5>Id: '.$resultado["id"].'</h5>

						
						<br><br>';
                         
						
				  echo' <input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">';
	            
	            
	                echo'
					</div>

				</div>

			</form>';

			
			//$guardar1 = new UsuariosC();
			//$guardar1 -> GuardarDatosAluC();

			          ?>
		</div>

	</section>

</div>


