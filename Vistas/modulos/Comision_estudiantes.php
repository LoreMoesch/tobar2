<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Bedel"){


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
	    
	    <h1>Horario: '.$comision["horario"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDias: '.$comision["dias"].'</h1>';

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
                                
                                    
								echo '	</tr>';

							}


						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>
