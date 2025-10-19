<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Secretario" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>

<div class="content-fuid">
	
	<section class="container">
		
		<div class="box">
			
			<div class="box-body">
				
				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						 <?php

			          $columna = "id";
			          $valor = 1;

			          $resultado = AjustesC::VerAjustesC($columna, $valor);

			          echo '<h3 style="color:rgb(0, 0, 0)">Cuatrimestre Actual: '.$resultado["cuatrimestre"].'</h3>

							<form method="post">
								
								<button type="submit" class="btn btn-primary">1er Cuatrimestre</button>

								<input type="hidden" name="cuatrimestreA" value="1er Cuatrimestre">';

								$cuatrimestre = new AjustesC();
								$cuatrimestre -> CambiarCuatrimestreC();

							echo '</form>

							<br>

							<form method="post">
								
								<button type="submit" class="btn btn-success">2do Cuatrimestre</button>

								<input type="hidden" name="cuatrimestreA" value="2do Cuatrimestre">';

								$cuatrimestre = new AjustesC();
								$cuatrimestre -> CambiarCuatrimestreC();

							echo '</form>

							<br>

							<form method="post">
								
								<h3 style="color:rgb(0, 0, 0)">1er Cuatrimestre</h3>

								<h5>Inicio: <input type="text" class="input-lg" name="1_fecha_inicio" value="'.$resultado["1_fecha_inicio"].'"></h5>

								<h5>Fin: <input type="text" class="input-lg" name="1_fecha_fin" value="'.$resultado["1_fecha_fin"].'"></h5>

								<br>

								<h3 style="color:rgb(0, 0, 0)">2do Cuatrimestre</h3>

								<h5>Inicio: <input type="text" class="input-lg" name="2_fecha_inicio" value="'.$resultado["2_fecha_inicio"].'"></h5>

								<h5>Fin: <input type="text" class="input-lg" name="2_fecha_fin" value="'.$resultado["2_fecha_fin"].'"></h5>


						</div>

						<div class="col-xs-12 col-md-6">
							
							<br>

							<h3 style="color:rgb(0, 0, 0)">Fechas de Exámenes Próximas:</h3>

							<h5>Desde: <input type="text" class="input-lg" name="1examenes_i" value="'.$resultado["1examenes_i"].'"></"></h5>

							<h5>Hasta: <input type="text" class="input-lg" name="1examenes_f" value="'.$resultado["1examenes_f"].'"></"></h5>
							
							<h5>Desde: <input type="text" class="input-lg" name="2examenes_i" value="'.$resultado["2examenes_i"].'"></"></h5>

							<h5>Hasta: <input type="text" class="input-lg" name="2examenes_f" value="'.$resultado["2examenes_f"].'"></"></h5>


							<br>

							<h3 style="color:rgb(0, 0, 0)">Fechas para Inscribirse a Materias:</h3>

							<h5>Desde: <input type="text" class="input-lg" name="materias_i" value="'.$resultado["materias_i"].'"></"></h5>

							<h5>Hasta: <input type="text" class="input-lg" name="materias_f" value="'.$resultado["materias_f"].'"></"></h5>

						</div>
						
						

					<br>

					&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>';

					$guardarAjustes = new AjustesC();
					$guardarAjustes -> ActualizarAjustesC();

			          ?>

				</form>

				</div>

			</div>

		</div>

	</section>

</div>