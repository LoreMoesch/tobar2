<?php

if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.location = "http://localhost/tobar2/inicio";
	</script>';

	return;

}

?>


<div class="content-wrapper">

	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

        $columna = "id";
        
        $valor = $exp[2];

        $materia = MateriasC::VerMaterias2C($columna, $valor);
        
        $columna = "id";
        
        $valor = $exp[1];

        $comision = MateriasC::VerComisiones2C($columna, $valor);

		echo '<h1>Estudiantes de Materia: '.$materia["nombre"].'</h1>';
	
	    echo ' <br/>
	    
	    <h1>Horario: '.$comision["horario"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDias: '.$comision["dias"].'</h1>
	    <br>';
         		
		echo'<a href="http://localhost/tobar2/pdfs/Inscriptos-Materia.php/'.$exp[2].'/'.$exp[1].'" target="blank">

			<button class="btn btn-primary">Generar PDF</button>

			</a>';

		?>


	</section>

	<section class="content">

		<div class="box">

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped">

					<thead>
						<tr>
							<th>Libreta</th>
							<th>Dni</th>
							<th>Apellido y Nombre</th>
							<th>Clasificaci&oacute;n</th>
							<th>Acci&oacute;n</th>
						</tr>
					</thead>

					<tbody>

						<?php


                        $columna = "id_materia";
                        
                        $valor = $exp[2];

                        $inscriptos = MateriasC::VerInscMateriasC($columna, $valor);

                        $oo=0;

                        foreach ($inscriptos as $key => $value) {


							if($value["id_comision"] == $exp[1]){
							    
							    $columna = "id";
                                
                                $valor = $value["id_alumno"];

                                $alumnos = UsuariosC::VerUsuariosC($columna, $valor);
							    
								echo '<tr>
									<td>'.$alumnos["libreta"].'</td>
									<td>'.$alumnos["dni"].'</td> 
									<td>'.$alumnos["apellido"].' '.$alumnos["nombre"].'</td>';
                                
                                    
                                	$columna = "id_materia";
									
									$valor = $value["id_materia"];

									$nota = MateriasC::VerNotasC($columna, $valor);

                                    $aaa=0;            

									foreach ($nota as $key => $N) {
                                        
                                       
                                            
										if($N["id_alumno"] == $alumnos["id"] && $N["id_materia"] == $value["id_materia"]){
                                            
                                            
											if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){
                                                
                                                $aaa=1;
												
												echo '<td class="bg-info">

												'.$N["estado"].'

												</td>';          									

											}else if($N["estado"] == "Regular"){

                                                $aaa=1;
                                                
												echo '<td class="bg-success">

												'.$N["estado"].'

												</td>';
												
											}else if($N["estado"] == "Reprobada" || $N["estado"] == "Libre por Inasistencia"){
                                                
                                                $aaa=1;

												echo '<td class="bg-danger">

												'.$N["estado"].'

												</td>';

											}else if($N["estado"] == "Equivalencia"){
											    
											    $aaa=1;

												echo '<td class="bg-warning">

												'.$N["estado"].'

												</td>';
                                          }else {
												
												$aaa=1;
												
												echo '<td class="">

												'.$N["estado"].'

												</td>';

											}
										

										}

									}
                                if ($aaa==0){
                                    $SN="Sin Calificar";
                                    echo '<td>'.$SN.'</td>';
                                }
                                
                                if ($value["id_materia"] != 146 && $value["id_materia"] != 147 && $value["id_materia"] != 148 && $value["id_materia"] != 149 && $value["id_materia"] != 150 && $value["id_materia"] != 151 && $value["id_materia"] != 152){    
								
								echo '<td>

										<a href="http://localhost/tobar2/Nota-MateriaD/'.$exp[1].'/'.$alumnos["libreta"].'/'.$exp[2].'">

											<button class="btn btn-success btn-sm pull-left"><i class="fa fa-pencil"></i></button>

										</a>
									</td>
								</tr>';
                                }
							}


						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>
