

<div class="container">
	<section class="content-header">
		<?php
		$columna = "id";
		$valor = $_SESSION["id_carrera"];
	  	$carrera = CarrerasC::VerCarreras2C($columna, $valor);
		echo '<h1>Plan de Estudios: '.$carrera["nombre"].'</h1>';
		// echo '
		// <br>
		// <a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Plan-de-Estudios.php/'.$_SESSION["id_carrera"].'/'.$_SESSION["id"].'"target="blank">
		// 		<button class="btn btn-primary">Generar PDF</button>
		// 	</a>';
		?>
	</section>
	<div class="row">
		<div class="col-lg-12">
		    <div class="box-header">
		    	<?php
				$columna = "id";
				$valor = 1;
				$resultado = AjustesC::VerAjustesC($columna, $valor);
				$columna = "id";
				$valor = $_SESSION["id"];
				$usu = UsuariosC::VerUsuariosC($columna, $valor);
		        $llamado = ExamenesC::VerTurnoC();
                foreach ($llamado as $key => $valores) {
                    if ($valores["estado"]==1) {
                       $llamadoa=$valores["id"];
                    }
                }
                if($resultado["h_ccarrera"] == 1){
				    if($_SESSION["c_carre"] == 0){
        			    echo '
        				<form method="post">
        					<div class="col-md-6 col-xs-12">
            				    <input type="hidden" name="Idu" value="'.$_SESSION["id"].'">
            				    
            				    <h3>Atención: Solo puedes elegir tu Orientación una sola vez.</h3>
         
            					<input type="hidden" name="libreta" value="'.$_SESSION["libreta"].'">
            
        						<select class="input-lg" name="carrera">
                					<option value="10">Seleccionar Carrera...</option>
            	    				<option value="6">Orientacíon en Discapacidad Neuromotora</option>
            	    				<option value="7">Orientacion en Discapacidad Auditiva</option>
            	    				<option value="8">Orientacíon en Discapacidad Intelectual</option>
            	    				<option value="9">Orientacíon en Discapacidad Visual</option>
            					</select>
        			
        					<button type="submit" class="btn btn-primary">Cambiar</button>
							<br><br>
        						</div>
        				</form>';
				    }else{
				        
				        echo '<h3> Tu Orientación ya fue seleccionada. </h3>'; 
				    }
				    
				    
				}

                ?>
		    
		    </div>
			<div class="table-responsive">
				<table  id="plan1"class="table table-striped table-bordered" cellspacing="0" width="100%" >
					<thead>
						<tr>
							<th>Orden</th>
							<th>Id</th>
							<th style="width:300px">Nombre</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Programa</th>
							<th>Cursada</th>
							<th style="width:50px">Estado(nota) / llamados Restantes </th>
							<th>Libro</th>
							<th>Folio</th>
							<th>Fecha</th>							
						</tr>
					</thead>
					<tbody>

						<?php

						$resultado = MateriasC::VerMateriasC();

						foreach ($resultado as $key => $value) {

							if($value["id_carrera"] == $_SESSION["id_carrera"]){

							        echo '<tr>';
							        
        							echo    '<td>'.$value["codigo"].'</td>';
							
        							echo    '<td>'.$value["id"].'</td>';
        							
        							if ($value["taller"]==1){
											    
										echo'<td class="bg-info">'.$value["nom_abrevi"].'</td>';
											
										} else {
											
										echo'<td>'.$value["nom_abrevi"].'</td>';    
											
									}
							
		         					//echo    '<td>'.$value["nombre"].'</td>';
		         					
							if ($value["tipo"]=="Anual"){
							    
							    $tip="A";
							
							    
							}else if ($value["tipo"]=="2do Cuatrimestre"){
							
							    $tip="2C";
							
							}else{
							
							    $tip="1C";
							
							}
									
							echo   '<td>'.$value["grado"].'</td>';
							
							echo 	'<td>'.$tip.'</td>';

									if($value["programa"] != ""){

										echo '<td><a href="'.$value["programa"].'" download="'.$value["nom_abrevi"].'">Descargar Informe</a></td>';

									}else{

										echo '<td>No tiene Programa.</td>';
									}								    
		         					
									//// segun la orientacion//////
									
									
									if ( $_SESSION["id_carrera"] == 8){
									    
									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotasiC($columna, $valor);

									} else if ( $_SESSION["id_carrera"] == 6){
									    
									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotasnC($columna, $valor);

									} else if ( $_SESSION["id_carrera"] == 7){

									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotassC($columna, $valor);

									} else if ( $_SESSION["id_carrera"] == 9){

									    	$columna = "id_materia";

								            $valor = $value["id"];

									        $nota = MateriasC::VerNotascC($columna, $valor);

									}    

									$columna = "id_materia";

									$valor = $value["id"];

									$nota = MateriasC::VerNotasC($columna, $valor);

                                    ////  segun la orientacion//////

                                    $eee=0;
									
									foreach ($nota as $key => $N) {

										if($N["id_alumno"] == $_SESSION["id"] && $N["id_materia"] == $value["id"]){

											//if ($N["estado"] == "Regular" || $N["estado"] == "Equivalencia" || $N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){
											
											    $eee=1;
											
											    //if($N["estado"] == "Aprobado"){

											    //	echo '<td class="bg-primary">'.$N["nota_final"].''.$N["estado"].'</td>';

											    //}else if($N["estado"] == "Regular"){

											    //	echo '<td class="bg-success">'.$N["nota_final"].' '.$N["estado"].'</td>';

											    //}else if($N["estado"] == "Desaprobado"){

											    //	echo '<td class="bg-danger">'.$N["nota_final"].' '.$N["estado"].'</td>';

											    //}else{

											 if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){

												echo '<td class="bg-info">

												'.$N["estado"].' ('.$N["nota_final"].')

												</td>';          									

											}else if($N["estado"] == "Regular"){

												//$dia=date("m/d/y");
												
												echo '<td class="bg-success">

												'.$N["estado"].' ('.$N["fecha_r"].') '.'

												</td>';
												
                                           } else if($N["estado"] == "Equivalencia"){

												echo '<td class="bg-warning">

												'.$N["estado"].'

												</td>';
                                          }else {
												echo '<td class="bg-danger">

												'.$N["estado"].'

												</td>';

											}
										if($N["estado_final"] == "Aprobado"){

			    							echo '<td class="bg-primary">

		    								 '.$N["estado_final"].' ('.$N["nota_final"].')

	    									</td>';
    							        }else {
										     if($N["estado"] == "Regular"){
										         
										        $llamado_r=(12+$N["llamado"])-$llamadoa;
										        
										        if ($llamado_r<=0){
										        
										           echo '<td class="bg-warning">Regularidad Vencida</td>'; 
										           
										        } else if($llamado_r==1){
										            
										                echo '<td class="bg-warning">Ultimo Llamado</td>';
										            
										            } else {
										          
										                echo '<td class="bg-warning"> Quedan '.$llamado_r.' LLamados</td>';
										            
										        }
										     
										         
										         
										     } else {
										         
										        echo '<td> </td>'; 
										     }  

									    }	
									
    									echo '<td>'.$N["libro"].'</td>';
                                            
                                        echo '<td>'.$N["folio"].'</td>';
                                        
                                        echo '<td>'.$N["fecha"].'</td>';

									//echo '</tr>';   	
											   	
											   	//echo '<td>'.$N["estado"].'</td>';

											    //}
											
											//}

										} 

									}
									
	                                     if ($eee==0){

										 //break;   
										 
										 echo '<td> </td>';
										 
										 echo '<td> </td>';
										 
										 echo '<td> </td>';
										 
										 echo '<td> </td>';
										 
										 echo '<td> </td>';
										 
										 //$eee==0;
									
										}								

									
							

								    //if($N["estado_final"] == "Aprobado"){

			    					//		echo '<td class="bg-primary">

		    						//		'.$N["nota_final"].' '.$N["estado_final"].'

	    							//		</td>';
    								//   }else{
										     
									//	     echo '<td>'.$N["nota_final"].' '.$N["estado_final"].'</td>';       
										   
									//}	
									
									//echo '<td>'.$N["folio"].''.$value["id"].'</td>';
                                        
                                    //echo '<td>'.$N["libro"].'</td>';
                                        
                                    //echo '<td>'.$N["fecha"].'</td>';
                                    
                                    if ($eee==1){

										 //break;   
										 
    									//echo '<td>'.$N["libro"].'</td>';
                                            
                                        //echo '<td>'.$N["folio"].'</td>';
                                        
                                        //echo '<td>'.$N["fecha"].'</td>';

										 //echo '<td> </td>';
										 
										 //echo '<td> </td>';
										 
										 $eee==0;
									
										}					
                                    
                                    

									echo '</tr>';

							}

						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>

<?php

$actualizarUC = new UsuariosC();
$actualizarUC -> ActualizarCarreraC();
?>
 