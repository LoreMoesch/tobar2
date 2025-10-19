
<div class="content-wrapper">
	
	<section class="content-header">
	
		<?php
	
		// es para alumno
		// muestro la carrera del alumno
	
		$columna = "id";
		$valor = $_SESSION["id_carrera"];
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);
	
		echo '<h1>Materias de la Carrera: '.$carrera["nombre"].'</h1>';
	
		?>
	
	</section>
	
	<section class="content">
	
		<div class="box">
	
			<div class="box-body">
	
				<?php
	
				$columna = "id";
				$valor = 1;
				$ajustes = AjustesC::VerAjustesC($columna, $valor);
	
				// pregunta si estan habilitadas las fechas de inscripcion a materias en ajustes
	
				if($ajustes["h_materias"] != 0){
	
					echo '<table class="table table-bordered table-hover table-striped">
	
							<thead>
	
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Grado</th>
									<th>Tipo</th>
									<th>Estado</th>
									<th></th>
								</tr>
	
							</thead>
	
							<tbody>';
	
							$columna = "id_alumno";
							$valor = $_SESSION["id"];
							$notas = MateriasC::VerNotasC($columna, $valor);
	
							foreach ($notas as $key => $N) {
								// en base Nota Busca los estados distinto de Aprobados y distinto de regular

								if($N["estado"] != "Aprobado" && $N["estado"] != "Regular" && $N["estado"] != "Equivalencia" && $N["estado"] != "Promo Directa" && $N["estado"] != "Promo Indirecta"){
                                //if($N["estado"] == "Sin Estado"){
                                //if($N["estado"] == "Regular"){         
									
									$columna = "id";

									$valor = $N["id_materia"];
									$resultado = MateriasC::VerMaterias2C($columna, $valor);
									// pregunta si el cuatrimestre actual es el 1ro o el anual
								
									if($ajustes["cuatrimestre"] != "2do Cuatrimestre" ){
										// busca en la materia si el tipo es 1er cuatrimestre o anual
										if($resultado["tipo"] != "2do Cuatrimestre" ){
											echo '<tr>
													<td>'.$resultado["codigo"].'</td>
													<td>'.$resultado["nombre"].'</td>
													<td>'.$resultado["grado"].'</td>
													<td>'.$resultado["tipo"].'</td>
													<td>'.$N["estado"].'</td>
													<td>
														<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
															<button class="btn btn-primary">Ver Detalles</button>
														</a>
													</td>
												</tr>';
										}
								
									}else{
									//	if($resultado["tipo"] == "2do Cuatrimestre" && $resultado["tipo"] == "Anual"){
											echo '<tr>
													<td>'.$resultado["codigo"].'</td>
													<td>'.$resultado["nombre"].'</td>
													<td>'.$resultado["grado"].'</td>
													<td>'.$resultado["tipo"].'</td>
													<td>'.$N["estado"].'</td>
													<td>

														<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
															<button class="btn btn-primary">Ver Detalles</button>
														</a>

													</td>
												</tr>';
									//	}
									}
								}
							}
							echo '</tbody>
						</table>';
				}else{
					echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones...</div>';
				}
				?>
			</div>
		</div>
	</section>
</div>
