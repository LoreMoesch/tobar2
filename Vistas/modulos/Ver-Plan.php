<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    
    	window.locations = "inicio";
    	</script>';
    
    	return;
    }
}

?>

<div class="container">
	<section class="content-header">
		<?php
		$exp = explode("/", $_GET["url"]);
		$columna = "libreta";
		$valor = $exp[2];
		$estudiante = UsuariosC::VerUsuariosC($columna, $valor);
		 $columna ="id";
         $valor = $estudiante["id_carrera"];
         $carrera = CarrerasC::VerCarreras2C($columna, $valor);
         $llamado = ExamenesC::VerTurnoC();
          foreach ($llamado as $key => $valores) {
            if ($valores["estado"]==1) {
            $llamadoa=$valores["id"];
            }
          }
		echo '<h3>Plan de Estudios del Estudiante ('.$estudiante["id"].') : '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h3>';
		// echo '<a href="http://localhost/tobar2/pdfs/Plan-de-Estudios.php/'.$exp[1].'/'.$estudiante["id"].'"target="blank">
		// 		<button class="btn btn-primary btn-lg">Generar PDF</button>
		// 	</a>
		// 	<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">';
		?>
	</section>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<br>
				<table  id="plan"class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th >C&oacute;digo</th>
							<th>Id</th>
							<th>Materia</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Cursada(Nota-Fecha-LLamado)</th>
							<th>Nota final</th>
							<th>Folio</th>
							<th>Libro</th>
							<th>Fecha</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$resultado = MateriasC::VerMateriasC();
						foreach ($resultado as $key => $value) {
							if($value["id_carrera"] == $estudiante["id_carrera"]){
								echo '<tr>
									<td style="color: black;">'.$value["codigo"].'</td>
									<td style="color: black;">'.$value["id"].'</td>';
									if ($value["taller"]==1){
											    
										echo'<td class="bg-info" style="color: black;">'.$value["nom_abrevi"].'</td>';
											
										} else {
											
										echo'<td style="color: black;">'.$value["nom_abrevi"].'</td>';    
											
									}	
								
								//echo '<td>'.$value["nombre"].'</td>';
								
								
									
								echo	'<td style="color: black;">'.$value["grado"].'</td>
									<td style="color: black;">'.$value["tipo"].'</td>';
								$aaa=0;
                                    //// notas segun estudiante ////
                                   
                                    //$columna = "id_materia";
									
									//$valor = $value["id"];

									//$nota = MateriasC::VerNotasC($columna, $valor);

								   if ( $estudiante["id_carrera"] == 8){
									    
									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotasiC($columna, $valor);

									} else if ( $estudiante["id_carrera"] == 6){
									    
									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotasnC($columna, $valor);

									} else if ( $estudiante["id_carrera"] == 7){

									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotassC($columna, $valor);

									} else if ( $estudiante["id_carrera"] == 9){

									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotascC($columna, $valor);

									}  
									
									//// notas segun estudiante ////
									foreach ($nota as $key => $N) {

										if($N["id_alumno"] == $estudiante["id"] && $N["id_materia"] == $value["id"]){
										    $aaa=1;
											if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){

												echo '<td class="bg-info" style="color: black;">

												'.$N["estado"].' ('.$N["nota_regular"].' - '.$N["fecha_r"].')

												</td>';          									

											}else if($N["estado"] == "Regular"){
											    
											     $llamador=$llamadoa-$N["llamado"];

												echo '<td class="bg-success" style="color: black;">

												'.$N["estado"].' ('.$N["nota_regular"].' - '.$N["fecha_r"].' - '.$llamador.')

												</td>';
												
											}else if($N["estado"] == "Reprobada"){

												echo '<td class="bg-danger" style="color: black;">

												'.$N["estado"].'

												</td>';

											}else if($N["estado"] == "Aprobado"){

												echo '<td class="bg-primary" style="color: black;">

												'.$N["estado"].'

												</td>';
												
                                           } else if($N["estado"] == "Equivalencia"){

												echo '<td class="bg-warning" style="color: black;">

												'.$N["estado"].'

												</td>';
                                          }else {
												echo '<td class="bg-danger" style="color: black;">

												'.$N["estado"].'

												</td>';

											}
										
										if($N["estado_final"] == "Aprobado"){

												echo '<td class="bg-primary" style="color: black;">

												 '.$N["estado_final"].' '.$N["nota_final"].'

												</td>';
										   }else{
										     
										       if($N["estado"] == "Regular"){
										         
										            $llamado_r=(12+$N["llamado"])-$llamadoa;
										        
										            if ($llamado_r<=0){
										        
										                echo '<td class="bg-warning" style="color: black;">Regularidad Vencida</td>'; 
										           
										                } else if($llamado_r==1){
										            
										                echo '<td class="bg-warning" style="color: black;">Ultimo Llamado</td>';
										            
										            } else {
										          
										                echo '<td class="bg-warning" style="color: black;"> Quedan '.$llamado_r.' LLamados</td>';
										            
										            }
										     
										       } else {
										         
										           echo '<td> </td>'; 
										       }
										     
										     
										     
										     //echo '<td>'.$N["estado_final"].' '.$N["nota_final"].'</td>';       
										   
										   }		
										
										    echo '<td style="color: black;">'.$N["folio"].'</td>';
                                        
                                            echo '<td style="color: black;">'.$N["libro"].'</td>';
                                        
                                            echo '<td style="color: black;">'.$N["fecha"].'</td>';
							
										    
										} 
									}
                            if ($aaa==0){
								echo '<td></td>
								      <td></td>
								      <td></td>
									  <td></td>
									  <td></td>';
							}
							if ($value["id"] != 146 && $value["id"] != 147 && $value["id"] != 148 && $value["id"] != 149 && $value["id"] != 150 && $value["id"] != 151 && $value["id"] != 152){    

									echo '

									<td>

										<a href="http://localhost/tobar2/Nota-Materia/'.$exp[1].'/'.$exp[2].'/'.$value["id"].'/'.$exp[3].'">

											<button class="btn btn-success"><i class="fa fa-pen"></i></button>

										</a>

									</td>';
                            }
							
							    
							}
							echo '</tr>';
						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>
