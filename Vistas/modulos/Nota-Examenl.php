<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    
    	window.locations = "http://localhost/tobar2/inicio";
    	</script>';
    
    	return;
    }
}
// $exp[1]=id_materia
// $exp[2]=id_libreta
// $exp[3]=id_nota
// $exp[4]=id_examen
?>

<div class="content-wrapper">

	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post">

					<?php

					$exp = explode("/", $_GET["url"]);

					$columna = "libreta";
					$valor = $exp[2];

					$estudiante = UsuariosC::VerUsuariosC($columna, $valor);

					echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h2>';

					echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">

					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">
					
					<input type="hidden" name="id_carrera" value="'.$estudiante["id_carrera"].'">

					<input type="hidden" name="id_examen" value="'.$exp[4].'">';
					
					$columna = "id";
		            $valor = $exp[4];

		            $examen = ExamenesC::VerExamenesC($columna, $valor);
					
					$columna = "id";
					$valor = $exp[1];

					$materia = MateriasC::VerMaterias2C($columna, $valor);

					echo '<h2>Materia: '.$materia["nombre"].'</h2>

					<input type="hidden" name="id_materia" value="'.$materia["id"].'">';

					?>


					<div class="row">

						<div class="col-md-6 col-xs-12">

                <?php
                    $columna ="id";
                    
                    $valor =$exp[3];
                    
                    if ( $estudiante["id_carrera"] == 8){

                          $resultado = MateriasC::VerNotas2iC($columna, $valor);

                    } else if ( $estudiante["id_carrera"]  == 6){
									    
                          $resultado = MateriasC::VerNotas2nC($columna, $valor);

                    } else if ( $estudiante["id_carrera"]  == 7){

                          $resultado = MateriasC::VerNotas2sC($columna, $valor);

                    } else if ( $estudiante["id_carrera"]  == 9){

                          $resultado = MateriasC::VerNotas2cC($columna, $valor);
                    }   
                    
                    
                    
                    //$resultado = MateriasC::VerNotas2C($columna, $valor);
                    
                    
                    
                    
                    
                    
                    
                    echo '		<h2>Fecha:</h2>
                    			<input type="text" class="input-lg" name="fecha" value="'.$examen["fecha"].'" >
                                <input type="hidden" class="input-lg" name="nota_id" value="'.$resultado["id"].'" >
                    			<h2>Profesor:</h2>
                    			<input type="text" class="input-lg" name="profesor" value="'.$examen["profesor"].'">
                    			<h2>Folio:</h2>
                    			<input type="text" class="input-lg" name="folio" value="'.$resultado["folio"].'">

                    						</div>

                    						<div class="col-md-6 col-xs-12">

                    							<h2>Estado Actual:'.$resultado["estado_final"].'</h2>
                    							<select class="input-lg" name="estado_final">

                    								<option value="'.$resultado["estado_final"].'">Seleccionar...</option>

                    								<option value="Aprobado">Aprobado</option>
                    								<option value="Reprobada">Reprobado</option>
                    								<option value="Ausente">Ausente</option>
                    							</select>

                    							<h2>Nota Final:</h2>
                    							<input type="text" class="input-lg" name="nota_final"  value="'.$resultado["nota_final"].'">
                    							<h2>Libro:</h2>
                    							<input type="text" class="input-lg" name="libro"  value="'.$resultado["libro"].'">';
                    							
                         ?>
    						<br><br>

							<button class="btn btn-success btn-lg" type="submit">Guardar</button>

						</div>

					</div>

					<?php
					
					if ( $estudiante["id_carrera"] == 8){

					    $notasl = new MateriasC();
					    $notasl -> ColocarNotaLiC();
					
                    } else if ( $estudiante["id_carrera"]  == 6){
									    
					    $notasl = new MateriasC();
					    $notasl -> ColocarNotaLnC();
					
                    } else if ( $estudiante["id_carrera"]  == 7){

					    $notasl = new MateriasC();
					    $notasl -> ColocarNotaLsC();
					
                    } else if ( $estudiante["id_carrera"]  == 9){

					    $notasl = new MateriasC();
					    $notasl -> ColocarNotaLcC();
					
                    }  

					//$notasl = new MateriasC();
					//$notasl -> ColocarNotaLC();

					?>

				</form>

			</div>

		</div>

	</section>

</div>
