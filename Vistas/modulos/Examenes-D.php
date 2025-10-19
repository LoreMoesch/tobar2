<?php

if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>


<div class="container">

	<section class="content-header">

		<?php


		echo '<h1>Materias a Cargo: </h1>';

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
							<th>Id_exa</th>
							<th>Nombre</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Programa</th>
							<th>Acci&oacuten</th>

						</tr>
					</thead>

					<tbody>

						<?php
						
						$number = range(145,152);

						$columna="id_profe";
						
						$valor=$_SESSION["id"];
						
						
						$resultado = ExamenesC::VerExamenes1C($columna, $valor);

						$ii=0;
						
						foreach ($resultado as $key => $value) {
						    
						    $ii++;
						    
						    $columna="id";
						
						    $valor=$value["id_materia"];
						
						    $materia = MateriasC::VerMaterias2C($columna, $valor);
						    
						    $columna="id";
						
						    $valor=$materia["id_carrera"];
						    
						    
						    $columna = "id_examen";
                        
                            $valor =$value["id"];
                                    
                            $inscriptos1 = ExamenesC::VerInscExamen2C($columna, $valor);

                            $oo=0;

                            foreach ($inscriptos1 as $key => $value1) {
                                        $oo++;
                            }    
						
						    $carrera = CarrerasC::VerCarreras2C($columna, $valor);
                            
                            if ($oo <> 0){
							
									echo '<tr>

									<td>'.$materia["id"].'</td>
									<td>'.$value["id"].'</td>
									<td>'.$materia["nombre"].'</td>
									<td>'.$materia["grado"].'</td>
									<td>'.$materia["tipo"].'</td>';

									if($materia["programa"] != ""){

										echo '<td><a href="'.$materia["programa"].'" download="'.$materia["nombre"].'">Descargar Programa</a></td>';

									}else{

										echo '<td>No tiene programa.</td>';

									}
                                   
                                    $oo1=' ('.$oo.')';
									echo '
								
									<td>

											<a href="http://localhost/tobar2/Examenes-E/'.$value["id"].'/'.$materia["id"].'">
												<button class="btn btn-primary">Ver Alumnos'.$oo1.'</button>
											</a>

										
									</td>

								</tr>';
                                    

                            }       
						}

                       // echo $ii;
						
						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>




