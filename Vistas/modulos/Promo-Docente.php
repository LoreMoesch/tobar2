<?php

if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

//$exp = explode("/", $_GET["url"]);

?>


<div class="container">

	<section class="content-header">

		<?php


		echo '<h1>Comisiones a Cargo: </h1>';
        
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

							<th>Id_com</th>
							
							<th>Nombre</th>
							
							<th>Cantidad</th>

							<th>A&ntilde;o</th>

							<th>Carrera</th>

							<th>Acci&oacuten</th>

						</tr>

					</thead>

					<tbody>

						<?php
						
						//$number = range(145,152);

						$columna="id_usuarios";
						
						$valor=$_SESSION["id"];
						
					    $comision = MateriasC::VerEquiposC($columna, $valor);

						foreach ($comision as $key => $valor1) {
						
						$columna="id";
						
						$valor=$valor1["id_comision"];						
						
						
						$resultado = MateriasC::VerComisionesC($columna, $valor);

						foreach ($resultado as $key => $value) {
						    
						    $columna="id";
						
						    $valor=$value["id_materia"];
						
						    $materia = MateriasC::VerMaterias2C($columna, $valor);
						    
						    $columna="id";
						
						    $valor=$materia["id_carrera"];
						
						    $carrera = CarrerasC::VerCarreras2C($columna, $valor);

									echo '<tr>

									<td>'.$value["id"].'</td>
									
									<td>'.$value["nombre"].'</td>';
									
									//if($value["programa"] != ""){

									//	echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar Programa</a></td>';

									//}else{

									//	echo '<td>No tiene programa.</td>';

									//}
									
									
					            	$columna = "id_comision";
                        
                                    $valor = $value["id"];

                                    $inscriptos2 = MateriasC::VerInscMateriasC($columna, $valor);

                                    $oo=0;

                                    foreach ($inscriptos2 as $key => $value2) {
                                    
                                    $oo++;
                            
                                    }
                         
                                    //$oo2=' ('.$oo.')';
                                    
                                    
                                    echo '<td>'.$oo.'</td>
                         
									<td>'.$value["anio"].'</td>
									
									<td>'.$value["carreras"].'</td>';                         
                         
									//echo '
									//<td>'.$carrera["nombre"].' '.$carrera["plan"].'</td>';
									
									echo '<td>

										

											<a href="http://localhost/tobar2//Promo-Estudiantes/'.$value["id"].'">
												<button class="btn btn-primary">Ver Alumnos</button>
											</a>

										

									</td>

								</tr>';

                            //}///       
						}

                        }

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>




