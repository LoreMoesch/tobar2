<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$exp = explode("/", $_GET["url"]);


?>

<div class="content-wrapper">
	
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
		
		$dia_nac=$resultado["fechanac"];

		echo '<form method="post">

				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h3>Nombre:<input type="text" class="input-lg" name="nombred" value="'.$resultado["nombre"].'"></h3>
						
						<h3>Apellido:<input type="text" class="input-lg" name="apellidod" value="'.$resultado["apellido"].'"></h3>

                        <h3>Dni:<input type="text" class="input-lg" name="dnid" value="'.$resultado["libreta"].'"></h3>

						<input type="hidden" name="Uid" value="'.$resultado["id"].'">

						<h3>Contrase&ntildea:<input type="text" class="input-lg" name="claved" value="'.$resultado["clave"].'"></h3>';
						
						echo '<br>';
						
						echo' <button type="submit" class="btn btn-success btn-lg">Guardar Datos</button>
						
	           	       	<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">';

echo' 				</div>

					<div class="col-md-6 col-xs-12">';

	                echo'
					</div>

				</div>

			</form>';

			$guardar2 = new UsuariosC();
			$guardar2 -> GuardarDocC();

			          ?>
		</div>

	</section>

</div>
