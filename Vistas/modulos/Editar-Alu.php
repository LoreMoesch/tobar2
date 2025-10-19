<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Secretario" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$exp = explode("/", $_GET["url"]);


?>

<div class="container-fluid">
	
	<section class="content">
		<?php
		echo '<h3>Informacion del Alumno</h5>';
		?>
		<div class="box">
			
			<div class="box-body">
				
						 <?php


		$tablaBD = "usuarios";
		
		$id = $exp[1];

		$resultado = UsuariosM::VerMisDatosM($tablaBD, $id);
		
		$columna= "id_alumno";
         
        $valor= $exp[1];

        $libretas = UsuariosC::VerLibretasC($columna, $valor);
		
		$dia_nac=$resultado["fecha"];

		echo '<form method="post">

				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h5>Nombre:<input type="text" class="input-lg" name="nombre" value="'.$resultado["nombre"].'"></h5>
						
						<h5>Apellido:<input type="text" class="input-lg" name="apellido" value="'.$resultado["apellido"].'"></h5>

                        <h5>Dni:<input type="text" class="input-lg" name="dni" value="'.$resultado["dni"].'"></h5>

						
						
						<input type="hidden" name="Uid" value="'.$resultado["id"].'">


						<h5>Dirección:<input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'"></h5>

						<h5>Teléfono:<input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'"></h5>

						<h5>Contraseña:<input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'"></h5>
						
	
						<input type="hidden" class="input-lg" name="orientacion" value="'.$exp[2].'">

						<h5>Correo Electrónico:<input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'"></h5>

						<h5>Secundaria:<input type="text" class="input-lg" name="secundaria" value="'.$resultado["secundaria"].'"></h5>



					</div>


					<div class="col-md-6 col-xs-12">

						<h5>Fecha de Nacimiento:<input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'"></h5>

						<h5>Cuit:<input type="text" class="input-lg" name="cuit" value="'.$resultado["cuit"].'"></h5>
						
						<h5>Cohorte:<input type="text" class="input-lg" name="cohorte" value="'.$resultado["cohorte"].'"></h5>';
						
                        echo '<h5><span>Matricula: '.$resultado["libreta"].'<span></h5>'; 

						echo '<h5>Id: '.$resultado["id"].'</h5>';

						
						echo '<br><br>';
                         
						
				  echo' <button type="submit" class="btn btn-success btn-lg">Guardar Datos</button>
	                    
	           	       	<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">';
	            
	            
	                echo'
					</div>

				</div>

			</form>';

			
			$guardar1 = new UsuariosC();
			$guardar1 -> GuardarDatosAluC();

			          ?>
		</div>

	</section>

</div>


