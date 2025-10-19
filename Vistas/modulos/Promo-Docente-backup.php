<?php

if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>


<div class="content-wrapper">

	<section class="content-header">

		<?php


		echo '<h1>Materias a Cargo: '.$carrera["nombre"].'</h1>';

		?>


	</section>


	<section class="content">

		<div class="box">

		 <!-- 	<div class="box-header">

				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearMateria">Crear Materia</button>

			</div> -->
		
			<div class="box-body">

				<table class="table table-bordered table-hover table-striped T">

					<thead>
						<tr>

							
							<th>Id_mate</th>
							<th>Id_com</th>
						
							<th>Nombre</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Programa</th>
							<th>Carrera</th>
							<th>Acci&oacuten</th>

						</tr>
					</thead>

					<tbody>

						<?php
						
						$number = range(145,152);

						$columna="id_usuario";
						
						$valor=$_SESSION["id"];
						
						$resultado = MateriasC::VerComisionesC($columna, $valor);

						foreach ($resultado as $key => $value) {
						    
						   
						    
						    $columna="id";
						
						    $valor=$value["id_materia"];
						
						    $materia = MateriasC::VerMaterias2C($columna, $valor);
						    
						    $columna="id";
						
						    $valor=$materia["id_carrera"];
						
						    $carrera = CarrerasC::VerCarreras2C($columna, $valor);

									echo '<tr>

									<td>'.$materia["id"].'</td>
									<td>'.$value["id"].'</td>
									
									<td>'.$materia["nombre"].'</td>
									<td>'.$materia["grado"].'</td>
									<td>'.$materia["tipo"].'</td>';

									if($value["programa"] != ""){

										echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar Programa</a></td>';

									}else{

										echo '<td>No tiene programa.</td>';

									}
                        $columna = "id_materia";
                        
                        $valor = $materia["id"];

                        $inscriptos = MateriasC::VerInscMateriasC($columna, $valor);

                        $oo=0;

                        foreach ($inscriptos as $key => $value) {
                            $oo++;
                            
                            }
									echo '
									<td>'.$carrera["nombre"].' '.$carrera["plan"].' '.$oo.' </td>
									<td>

										<div class="btn-group">

											<a href="http://localhost/tobar2//Promo-Estudiantes/'.$value["id"].'/'.$materia["id"].'">
												<button class="btn btn-primary">Ver Alumnos</button>
											</a>

										</div>

									</td>

								</tr>';

                            //}///       
						}


						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>




