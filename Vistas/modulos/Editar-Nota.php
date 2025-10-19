
<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    
    	echo '<script>
    
    	window.locations = "http://localhost/tobar2/inicio";
    	</script>';
    
    	return;
    }
}

$llamado = ExamenesC::VerTurnoC();
         
foreach ($llamado as $key => $valores) {

    if ($valores["estado"]==1) {
        
    $llamadoa=$valores["id"];
                        
    }
         
}


?>

<div class="container-fluid">

	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post">

					<?php

					$exp = explode("/", $_GET["url"]);

					$columna = "libreta";
					$valor = $exp[2];

					$estudiante = UsuariosC::VerUsuariosC($columna, $valor);

					//echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h3>';

					echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">

					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">
					
					 <input type="hidden" class="input-lg" name="nota_id" value="'.$exp[3].'" >

					<input type="hidden" name="id_carrera" value="'.$estudiante["id_carrera"].'">';
					
					// auditoria
					
					echo '<input type="hidden" name="usuario" value="'.$_SESSION["id"].'">
					
					      <input type="hidden" name="proceso" value="cambio">
					      
					      <input type="hidden" name="nomyape" value="'.$estudiante["nombre"].' '.$estudiante["apellido"].'">
					      
					';
					// fin auditoria
					

					$columna = "id";
					
					$valor = $exp[1];

					$materia = MateriasC::VerMaterias2C($columna, $valor);
					
					$columna = "id_materia";
					
					$valor = $exp[1];

					$comision_m = MateriasC::VerComisiones2C($columna, $valor);
					

					echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].'  -  Libreta: '.$estudiante["libreta"].'  -  Materia: '.$materia["nombre"].' </h3>

					<input type="hidden" name="id_materia" value="'.$materia["id"].'">';

					?>


					<div class="row">

						<div class="col-md-6 col-xs-12">

                <?php
                    
                    $columna ="id";
                    
                    $valor =$exp[3];
                    
                    if ($exp[4] == 8){
                    
                    $resultado = MateriasC::VerNotas2iC($columna, $valor);
                    
                    } else if ($exp[4] == 9){
                        
                    $resultado = MateriasC::VerNotas2cC($columna, $valor);    
                    
                    } else if ($exp[4] == 7){
                        
                    $resultado = MateriasC::VerNotas2sC($columna, $valor);    
                        
                    } else if ($exp[4] == 6){
                        
                    $resultado = MateriasC::VerNotas2nC($columna, $valor);
                    
                    }
                    
                                          echo ' <h3>Fecha regularidad:</h3>
                    					
                    							<input type="text" class="input-lg" name="fecha_r" value="'.$resultado["fecha_r"].'">
                    					
                    							<h3>Profesor:</h3>
                    							
                    							<input type="text" class="input-lg" name="profesor" value="'.$resultado["profesor"].'">';
                    							
                    						/// auditoria
                    						
                    						 echo '<input type="hidden" class="input-lg" name="nota_anterior" value="'.$resultado["nota_regular"].'">
                    						       <input type="hidden" class="input-lg" name="v_regularidad" value="'.$resultado["v_regularidad"].'">
                    						 
                    						 ';
                    					
                    						// fin auditoria
                    							
                    						echo '<h3>Nota regular : '.$resultado["nota_regular"].'</h3>
                    					
                    							
    						  	        <select class="input-lg" name="nota_r">
                           
                    			    	<option value="'.$resultado["nota_regular"].'">Sin Nota...</option>
                    			    	
                   				    <option value="2">2</option>
                   				    
                    				    <option value="2,25">2,25</option>
                    					<option value="2,5">2,5</option>
                    					<option value="2,75">2,75</option>
                    					
                    				    <option value="3">3</option>
                    				    <option value="3,25">3,25</option>
                    					<option value="3,5">3,5</option>
                    			    	<option value="3,75">3,75</option>
                    				    
                    				    <option value="4">4</option>
                    					<option value="4,25">4,25</option>	
                    					<option value="4,5">4,5</option>
                    					<option value="4,75">4,75</option>
                    					
                    					<option value="5">5</option>
                    					<option value="5,25">5,25</option>
                    					<option value="5,5">5,5</option>
                                        <option value="5,75">5,75</option>
                    					
                    					<option value="6">6</option>
                                        <option value="6,25">6,25</option>    
										<option value="6,5">6,5</option>
										<option value="6,75">6,75</option>
										
										<option value="7">7</option>
										<option value="7,25">7,25</option>
                     					<option value="7,5">7,5</option>
                    					<option value="7,75">7,75</option>
                    					
                    					<option value="8">8</option>
                    					<option value="8,25">8,25</option>	
                    					<option value="8,5">8,5</option>
                                        <option value="8,75">8,75</option>
                                        
                    					<option value="9">9</option>
                                        <option value="9,25">9,25</option>
										<option value="9,5">9,5</option>
										<option value="9,75">9,75</option>
										
										<option value="10">10</option>
                    						
                    			      </select>';
                    							
                    						/// auditoria
                    						
                    						 echo '<input type="hidden" class="input-lg" name="estado_anterior" value="'.$resultado["estado"].'">';	
                    							
                    						// fin auditoria	
                    							
                    						echo	'<h3>Estado Regular:'.$resultado["estado"].'</h3>';
                                                ///////////
                     					  	  $regimen = MateriasC::VerRegimenC1();   
                    					  	
                    					  	 echo '<select class="input-lg" name="estado">
                           
                    	        			    	<option value="'.$resultado["estado"].'">Seleccionar...</option>
                    	        			    	
                    	        			    	<option value="Sin Estado">Sin Estado</option>
                    						
                    								<option value="Equivalencia">Equivalencia</option>
                    	        			    	
                    	        				    <option value="Libre por Inasistencia">Libre por Inasistencia</option>
                    						
                    							    <option value="Reprobada">Reprobada</option>';
                    							    
	                                         foreach ($regimen as $key => $valuee) {                    							    

                    						  if ($exp[1]==$valuee["id_materia"]){
                    						      
                    						      if ($valuee["regular"]==1){
                    						
                    							    echo '<option value="Regular">Regular</option>';
                    						        
                    						      }
                    						      if ($valuee["promo_d"]==1){
                    						
                    							    echo '<option value="Promo Directa">Promo Directa</option>';
                    						        
                    						      }
                    						      if ($valuee["promo_i"]==1){
                    						
                    							    echo '<option value="Promo Indirecta">Promo Indirecta</option>';
                    						        
                    						      }
                                                }

                    						  } 
                    						 
                    						 echo '       </select>';                                              
                                            /////////////                    							
                    						
                    						echo '<input type="hidden" class="input-lg" name="llamado" value="'.$resultado["llamado"].'">
                    						
                    							<h3>Comision: '.$resultado["comisionc"].'</h3>';
                    						
                    						// auditoria
                    						
                    						echo '<input type="hidden" class="input-lg" name="comision_anterior" value="'.$resultado["comisionc"].'">
                    						      
                    						      <input type="hidden" class="input-lg" name="llamadoreg" value="'.$resultado["llamado"].'">';	
                    								
                    						// fin auditoria	
                    					
                    						if ($materia["comun"]==1) { 
                    						 
                    	 					$columna = "orden";
					
                         					$valor = $materia["codigo"];

                    						 $examenes = ExamenesC::VerExamenesPorOrdenC($columna, $valor);   
                    					  	
                    					  	 echo '<select class="input-lg" name="comision">';
                    							    
	                                              foreach ($examenes as $key => $valuaa) {                    							    
                                                  
                                                    echo '<option value="'.$valuaa["id_comision"].'">'.$valuaa["hora"].' ('.$valuaa["id_comision"].')</option>';
     
	                                              }
	                                              
                    						 echo '       </select>';   
                                             } else {
                                                 
                                                echo '<input type="text" class="input-lg" name="comision" value="'.$resultado["comisionc"].'">';
     
                                             }                         						
                    						
                    						
                    						
                    						
                    						echo '<h3>Llamado al regularizar: '.$resultado["llamado"].'</h3>
                    						
                    						<input type="text" class="input-lg" name="llamadod" value="'.$resultado["llamado"].'">';
                    						
                    						
                    						$faltanes=$llamadoa-$resultado["llamado"];
                    						
                    						
                    						//echo  '<h2 style="color:#0083ff">Llamados restantes :'.$faltanes.'/'.$resultado["llamado"].'</h3>';

                    						echo '</div>

                    						<div class="col-md-6 col-xs-12">

                    							<h3>Libro:</h3>
                    					
                    							<input type="text" class="input-lg" name="libro" value="'.$resultado["libro"].'">

                    						    <h3>Folio:</h3>
                    					
                    							<input type="text" class="input-lg" name="folio" value="'.$resultado["folio"].'">
                    					
                   							    <h3>Fecha final:</h3>
                                          
                    							<input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'" >
                    							
                                                <input type="hidden" class="input-lg" name="nota_id" value="'.$resultado["id"].'" >
                                                
                     							<h3>Profe Final:</h3>
                    					
                    							<input type="text" class="input-lg" name="profe_f" value="'.$resultado["profesor_final"].'">
                    							
                    							<h3>Nota final : '.$resultado["nota_final"].'</h3>';
                    							
                    						 // auditoria
                    						
                    						 echo '<input type="hidden" class="input-lg" name="notaf_anterior" value="'.$resultado["nota_final"].'">';	
                    								
                    					     // fin auditoria
                    							
                    						echo '<select class="input-lg" name="nota_f">
                           
                    			    	<option value="'.$resultado["nota_final"].'">Sin Nota...</option>

                   				    <option value="2,25">2,25</option>
                    					<option value="2,5">2,5</option>
                    					<option value="2,75">2,75</option>
                    					
                    				    <option value="3">3</option>
                    				    <option value="3,25">3,25</option>
                    					<option value="3,5">3,5</option>
                    			    	<option value="3,75">3,75</option>
                    				    
                    				    <option value="4">4</option>
                    					<option value="4,25">4,25</option>	
                    					<option value="4,5">4,5</option>
                    					<option value="4,75">4,75</option>
                    					
                    					<option value="5">5</option>
                    					<option value="5,25">5,25</option>
                    					<option value="5,5">5,5</option>
                                        <option value="5,75">5,75</option>
                    					
                    					<option value="6">6</option>
                                        <option value="6,25">6,25</option>    
										<option value="6,5">6,5</option>
										<option value="6,75">6,75</option>
										
										<option value="7">7</option>
										<option value="7,25">7,25</option>
                     					<option value="7,5">7,5</option>
                    					<option value="7,75">7,75</option>
                    					
                    					<option value="8">8</option>
                    					<option value="8,25">8,25</option>	
                    					<option value="8,5">8,5</option>
                                        <option value="8,75">8,75</option>
                                        
                    					<option value="9">9</option>
                                        <option value="9,25">9,25</option>
										<option value="9,5">9,5</option>
										<option value="9,75">9,75</option>
										
										<option value="10">10</option>

                    						
                    			      </select>';
                    							
                						 // auditoria
                    						
                						 echo '<input type="hidden" class="input-lg" name="estadof_anterior" value="'.$resultado["estado_final"].'">';	
		
                                        // fin auditoria
                                        
                                        echo    '<h3>Estado Final:'.$resultado["estado_final"].'</h3>
                    							
                    							<select class="input-lg" name="estado_final">
                           
                    							    	<option value="'.$resultado["estado_final"].'">Seleccionar...</option>

													    <option value="Aprobado">Aprobado</option>
													    
													     <option value="Ninguno">Ninguno</option>
                    						
                    							        </select>
                    							';
                                                
                    					  	     
                    	                  //echo '<h2>Nota Final:</h3>
                    					//		<input type="text" class="input-lg" name="nota_final"  value="'.$resultado["nota_final"].'">';
                         ?>
                         </div>

                    	<div class="col-md-6 col-xs-12">                         
    					
    						<br>
                  
							<button class="btn btn-success btn-lg" type="submit">Guardar</button>
							

						</div>

					</div>

					<?php
                    
                    if ($exp[4] == 8){
                    
					    $notas7 = new MateriasC();
					    $notas7 -> CambiarNotaiC();
                    
                    } else if ($exp[4] == 9){
                        
					    $notas7 = new MateriasC();
					    $notas7 -> CambiarNotacC();
                    
                    } else if ($exp[4] == 7){
                        
					    $notas7 = new MateriasC();
					    $notas7 -> CambiarNotasC();
                        
                    } else if ($exp[4] == 6){
                        
					    $notas7 = new MateriasC();
					    $notas7 -> CambiarNotanC();
                    
                    }


                    



					?>

				</form>

			</div>

		</div>

	</section>

</div>
