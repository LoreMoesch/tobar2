<?php

if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.location = "http://localhost/tobar2/inicio";
	</script>';

	return;

}

?>


<div class="container">

	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

        $columna = "id";
        
        $valor = $exp[1];

        $comision = MateriasC::VerComisiones2C($columna, $valor);
		
		$columna = "id";
        
        $valor = $comision["id_materia"];

        $materiaa = MateriasC::VerMaterias2C($columna, $valor);
		

        $columna = "id_usuarios";

		$valor=$_SESSION["id"];

        $equipo = MateriasC::VerEquiposC($columna, $valor);

        foreach ($equipo as $key => $valor1) {
            
            If ($valor1["id_comision"]==$exp[1]){
                
                $nota1= $valor1["notas"];
                
            }

        }
		echo '<h1>Estudiantes de Comisi&oacute;n: '.$comision["nombre"].'</h1>';
	    echo '<h1>Horario: '.$comision["horario"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDias: '.$comision["dias"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspA&ntilde;o: '.$comision["anio"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo: '.$materiaa["tipo"].'</h1>';
		echo '<h1>Carreras: '.$comision["carreras"].'</h1>';
		if($nota1==1){
		
		echo '<h1>Edicion de Notas: Si </h1>';
		} else {
		    
		  echo '<h1>Edicion de Notas: No </h1>';  
		}
		
		
		//echo '<br/>';
		
		//echo'<a href="http://localhost/tobar2/pdfs/Inscriptos-Materia.php/'.$exp[2].'/'.$exp[1].'" target="blank">

		//	<button class="btn btn-primary">Generar PDF</button>

		//	</a>';
		
		echo'<a href="http://localhost/tobar2/pdfs/Inscriptos-Materia.php/'.$exp[1].'" target="blank">

			<button class="btn btn-primary">Generar PDF</button>

			</a>';
		
		
			if($nota1 == 1){
			    
			
			    if($comision["enviado"] == 0){
				    
			        echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#EN">Enviar Notas</button>';	
				
				    
			    }
			
			}
			
		?>


	</section>

	<section class="content">

		<div class="box">

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped">

					<thead>
						<tr>
						    <th>Id</th>
							<th>Libreta</th>
							<th>Dni</th>
							<th>Apellido y Nombre</th>
							<th>Telefono</th>
							<th>Carrera</th>
							<th>Clasificaci&oacute;n</th>
							<th>Acci&oacute;n</th>
						</tr>
					</thead>

					<tbody>

						<?php


                        $columna = "id_comision";
                        
                        $valor = $exp[1];

                        $inscriptos = MateriasC::VerInscMateriasC($columna, $valor);

                        $oo=0;

                        foreach ($inscriptos as $key => $value) {
                              
                            $oo++;
                            
							if($value["id_comision"] == $exp[1]){
							    
							    $columna = "id";
                                
                                $valor = $value["id_alumno"];

                                $alumnos = UsuariosC::VerUsuariosC($columna, $valor);
							    
							   echo '<tr>
								    
								    <td>'.$alumnos["id"].'</td>
									
									<td>'.$alumnos["libreta"].'</td>
									
									<td>'.$alumnos["dni"].'</td> 
									
									<td>'.$alumnos["apellido"].' '.$alumnos["nombre"].'</td>
									
									<td>'.$alumnos["telefono"].'</td>';
									
									$columna = "id";
		
	                                $valor = $alumnos["id_carrera"];

		                            $carrera = CarrerasC::CarreraC($columna, $valor);
		                          
		                            $columna = "id";
        
                                    $valor = $value["id_materia"];

                                    $materia = MateriasC::VerMaterias2C($columna, $valor);

                                	echo '<td>'.$carrera["nom_corto"].'</td>';
                                	
                                	$columna = "id_materia";
									
									$valor = $value["id_materia"];
									

									if ( $alumnos["id_carrera"] == 8){
									    
									        $nota = MateriasC::VerNotasiC($columna, $valor);

									} else if ( $alumnos["id_carrera"] == 6){
									    
									        $nota = MateriasC::VerNotasnC($columna, $valor);

									} else if ( $alumnos["id_carrera"] == 7){

									        $nota = MateriasC::VerNotassC($columna, $valor);

									} else if ( $alumnos["id_carrera"] == 9){

									        $nota = MateriasC::VerNotascC($columna, $valor);

									}    

									//$nota = MateriasC::VerNotasC($columna, $valor);

                                    $aaa=0;            

									foreach ($nota as $key => $N) {
                                        
                                       
										if($N["id_alumno"] == $alumnos["id"] && $N["id_materia"] == $value["id_materia"]){
                                            
                                            
											if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){
                                                
                                                $aaa=1;
												
												echo '<td class="bg-info">

												'.$N["estado"].' ('.$N["nota_regular"].')

												</td>';          									

											}else if($N["estado"] == "Regular"){

                                                $aaa=1;
                                                
												echo '<td class="bg-success">

												'.$N["estado"].' ('.$N["nota_regular"].')

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
								
								echo '<td>';
								
								    if($nota1 == 1){
								        
								      if($alumnos["id_carrera"] <> 10){
								
								        if($comision["enviado"] == 0){

										    echo '<a href="http://localhost/tobar2/Nota-MateriaD/'.$exp[1].'/'.$alumnos["libreta"].'/'.$alumnos["id_carrera"].'/'.$value["id_materia"].'/'.$materia["comun"].'">

											<button class="btn btn-success btn-sm pull-left"><i class="fas fa-pen"></i></button>

										    </a>';
								        }
								      }
								    }   
										
									echo '</td>
								</tr>';
                                }
							}


						}

                        //echo $oo;
                        //echo $exp[1];
						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

<div class="modal fade" id="EN">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Enviar Informe de Notas?</h2>
							<?php
							echo '<input type="hidden" name="enviado" value="1">
							<input type="hidden" name="id_comision" value="'.$exp[1].'">
							<input type="hidden" name="id_mate" value="'.$comision["id_materia"].'">';
								?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$EN = new MateriasC();
				$EN -> ENC();
				?>
			</form>
		</div>
	</div>
</div>
