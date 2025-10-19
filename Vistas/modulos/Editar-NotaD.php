
<?php

// $exp[1] ---> id_materia
// $exp[2] ---> libreta
// $exp[3] ---> id --> notas
// $exp[4] ---> id_comision
// $exp[5] ---> id_carrera


if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.locations = "http://localhost/tobar2/inicio";
	</script>';

	return;
}
?>

<div class="container">

	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post">

					<?php

					$exp = explode("/", $_GET["url"]);

					$columna = "libreta";
					$valor = $exp[2];
					
                	$estudiante = UsuariosC::VerUsuariosC($columna, $valor);

					echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h2>';

					echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">

					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">
					
					<input type="hidden" name="id_carrera" value="'.$estudiante["id_carrera"].'">
					
					<input type="hidden" name="id_promo" value="'. $exp[1].'">';


					$columna = "id";
					$valor = $exp[1];

					$materia = MateriasC::VerMaterias2C($columna, $valor);

					echo '<h2>Materia: '.$materia["nombre"].'</h2>

					<input type="hidden" name="id_materia" value="'.$materia["id"].'">';

					?>


					     <div class="row">

						      <div class="col-md-6 col-xs-12">

                                  <?php
                                  
                                  $columna ="id";
                                 
                                  $valor =$exp[3];
                                  
                                  //////////////////////////////////////////
                                  
                                  if ( $exp[5] == 8){

                                          $resultado = MateriasC::VerNotas2iC($columna, $valor);

                                    } else if ( $exp[5] == 6){
									    
                                         $resultado = MateriasC::VerNotas2nC($columna, $valor);

                                    } else if ( $exp[5] == 7){

                                          $resultado = MateriasC::VerNotas2sC($columna, $valor);

                                    } else if ( $exp[5] == 9){

                                          $resultado = MateriasC::VerNotas2cC($columna, $valor);
                                    }  

                                  //////////////////////////////////////////

                                  $hoy=date("d/m/y");
                                
                                  echo '	<input type="hidden" class="input-lg" name="fecha" value="'.$resultado["fecha"].'" >
                                                <input type="hidden" class="input-lg" name="nota_id" value="'.$resultado["id"].'" >
                    							<input type="hidden" class="input-lg" name="profesor" value="'.$resultado["profesor"].'">
                                                <input type="hidden" class="input-lg" name="id_materia" value="'.$materia["id"].'">
                                               	<input type="hidden" class="input-lg" name="fecha_r" value="'.$hoy.'">
                                               	<input type="hidden" class="input-lg" name="id_comision" value="'.$exp[4].'">

                    							<h2>Estado Actual:'.$resultado["estado"].'</h2>';
                                                    //////////////////                    							
                    					  	  $regimen = MateriasC::VerRegimenC1();   
                    					  	
                    					  	 echo '<select class="input-lg" name="estado">
                           
                    	        			    	<option value="'.$resultado["estado"].'">Seleccionar...</option>
                    	        			    	
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
                    						 
                    						 echo '       </select>
                    						 
                    						 <h2>Libro:</h2>
                    					
                    				         <input type="text" class="input-lg" name="libro" value="'.$resultado["libro"].'">

                    				         <br>
    							   
    							             <a>(Colocar Libro solo en caso de Estado: Promo Directa </a><br>
                    			      
                    			             <a> o Promo Indirecta)</a>
                    			
                    				         <h2>Folio:</h2>
                    					
                    				         <input type="text" class="input-lg" name="folio" value="'.$resultado["folio"].'">';
    							
    							             echo '<br>';
    							   
    							             echo '<a>(Colocar Folio solo en caso de Estado: Promo Directa </a><br>
                    			      
                    			            <a> o Promo Indirecta)</a>
                    						 
                    						 ';     
                    					  	     

                    					            //////////////////
                    					            
                    					            
                    					            

                         ?>
                         
                    		</div>

                    		<div class="col-md-6 col-xs-12">   
                    		
                    		<?php
                    		
                    		echo '<h2>Nota Actual:'.$resultado["nota_regular"].'</h2>';
                    		
                    			        echo '<select class="input-lg" name="notar">
                           
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
                    			      
                    			      echo '<br>';
                    			      
                    			      echo '<a>(Colocar Nota solo en caso de Estado: Regular,</a><br>
                    			      
                    			            <a> Promo Directa y Promo Indirecta)</a>';
                    		
                    		
    					    ?>
    					    
    						<br><br>
                            
                            <br><br>
							
							<button class="btn btn-success btn-lg" type="submit">Guardar Clasificaci&oacute;n</button>
							
						</div>

					</div>

					<?php

                    if ( $exp[5] == 8){

				    	$notas = new MateriasC();
					    $notas -> CambiarNotaiDC();

                       } else if ( $exp[5] == 6){
									    
				    	$notas = new MateriasC();
					    $notas -> CambiarNotanDC();

                       } else if ( $exp[5] == 7){

		    			$notas = new MateriasC();
			    		$notas -> CambiarNotasDC();

                       } else if ( $exp[5] == 9){

    					$notas = new MateriasC();
	    				$notas -> CambiarNotacDC();
                    }  
                    

					?>

				</form>

			</div>

		</div>

	</section>

</div>
