<?php

$exp = explode("/", $_GET["url"]);

$columna = "id_materia";
$valor = $exp[3];

/// $exp[1]  carrera

///$nota = MateriasC::VerNotasC($columna, $valor);

if ( $exp[1] == 8){

    $nota = MateriasC::VerNotasiC($columna, $valor);

  } else if ( $exp[1] == 6){
									    
    $nota = MateriasC::VerNotasnC($columna, $valor);

  } else if ( $exp[1] == 7){

    $nota = MateriasC::VerNotassC($columna, $valor);

  } else if ( $exp[1] == 9){

    $nota = MateriasC::VerNotascC($columna, $valor);

}  

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    
    	window.locations = "http://localhost/tbar2/inicio";
    	</script>';
    
    	return;
    }
}

foreach ($nota as $key => $EN) {

	if($EN["id_materia"] == $exp[3] && $EN["id_alumno"] == $exp[4]){

		echo '<script>

		window.location = "http://localhost/tobar2/Editar-Nota/'.$exp[3].'/'.$exp[2].'/'.$EN["id"].'/'.$exp[1].'"
		</script>';

		return;

	}

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
    
    					<input type="hidden" name="id_carrera" value="'.$exp[1].'">';
    
    					$columna = "id";
    					
    					$valor = $exp[3];
    
    					$materia = MateriasC::VerMaterias2C($columna, $valor);
    					
    					// auditoria
					
					echo '<input type="hidden" name="usuario" value="'.$_SESSION["id"].'">
					
					      <input type="hidden" name="proceso" value="nuevo">
					      
					      <input type="hidden" name="nomyape" value="'.$estudiante["nombre"].' '.$estudiante["apellido"].'">
					      
					';
					// fin auditoria
    					
    
    					echo '<h2>Materia: '.$materia["nombre"].'-'.$materia["id"].'</h2>
    
    					<input type="hidden" name="id_materia" value="'.$materia["id"].'">
    					
                        
    					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">';
    
    					?>
    
    
    					<div class="row">
    
    						<div class="col-md-6 col-xs-12">
    							
    							<?php
    							echo '<h2>Fecha Regularidad:</h2>
    							
    					        <input type="text" class="input-lg" name="fecha_r">
    						
    							<h2>Profesor Regularidad:</h2>
                        
                                <input type="text" class="input-lg" name="profesor">
    							
    							<h2>Nota Regularidad:</h2> 
    						  
    						  	        <select class="input-lg" name="notar">
                           
                    			    	<option >Sin Nota...</option>

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

                    						
                    			      </select>
    							
    							<h2>Estado Regularidad:</h2>';
    						
                                              //////////////////
                     					  	  $regimen = MateriasC::VerRegimenC1();   
                    					  	
                    					  	 echo '<select class="input-lg" name="estado">
                           
                    	        			    	<option>Seleccionar...</option>
                    	        			    	
                    	        			    	<option value="Sin Estado">Sin Estado</option>
                    						
                    								<option value="Equivalencia">Equivalencia</option>
                    	        			    	
                    	        				    <option value="Libre por Inasistencia">Libre por Inasistencia</option>
                    						
                    							    <option value="Reprobada">Reprobada</option>';
                    							    
	                                         foreach ($regimen as $key => $valuee) {                    							    

                    						  if ($exp[3]==$valuee["id_materia"]){
                    						      
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
                    						
                    						 echo '</select>';

                    						echo '<h2>Comision:</h2>
                    						  
                    						     <input type="text" class="input-lg" name="comision">
                    						
                     						     <h2>Llamado al regularizar:</h2>
                    						
                    						<input type="text" class="input-lg" name="llamadod">';
                    						 
                    						 
                    						 
                    						 
                    						 echo '  <input type="hidden" class="input-lg" name="llamado">
                    						 
                    						  <br><br>
                    						 <button class="btn btn-success btn-lg" type="submit">Guardar</button>
                    						 ';                                              
  
                                    ?>   
    						
    						</div>

    						<div class="col-md-6 col-xs-12">
    
    							
    						        
    						        <?php
    						        echo ' 
    						        	<h2>Libro:</h2>
                    					
                    					<input type="text" class="input-lg" name="libro">

                    					<h2>Folio:</h2>
                    					
                    					<input type="text" class="input-lg" name="folio" >
                    					
                   						<h2>Fecha final:</h2>
                                         
                    					<input type="text" class="input-lg" name="fecha" >
                    							
                                        <input type="hidden" class="input-lg" name="nota_id" >
                                                
                     					<h2>Profe Final:</h2>
                    					
                    					<input type="text" class="input-lg" name="profe_f" >
                    							
                    					<h2>Nota final:</h2>
                    					
                    				    <select class="input-lg" name="nota_f">
                           
                    			    	<option>Sin Nota...</option>

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

                    						
                    			      </select>
                                        
                                        
                                        <h2>Estado Final:</h2>
                    							
                    					<select class="input-lg" name="estado_final">
                           
                    					 	<option>Seleccionar...</option>

										    <option value="Aprobado">Aprobado</option>
											    
										    <option value="Ninguno">Ninguno</option>
                    						
                    					</select>
    						        
    						        ';
                    			      
                    			      echo '<br>';
                    			      
                    			      //echo '<a>(Colocar Nota solo en caso de Estado: Regular,</a><br>
                    			      
                    			      //      <a> Promo Directa y Promo Indirecta)</a>';
    						       

                                ?>
                               
                                
    						
    						</div>
    
    					</div>
    
    					<?php
    
                        // nuevo registro en Notas : id_alumno, libreta, id_materia, fecha, profesor, nota_final, estado.

                        if ( $exp[1] == 8){
         
         					$notas8 = new MateriasC();
         					$notas8 -> ColocarNotaiC();

                         } else if ( $exp[1] == 6){
                             
         					$notas8 = new MateriasC();
         					$notas8 -> ColocarNotanC();

                         } else if ( $exp[1] == 7){

           					$notas8 = new MateriasC();
    	    				$notas8 -> ColocarNotasC();

                         } else if ( $exp[1] == 9){

    					    $notas8 = new MateriasC();
    					    $notas8 -> ColocarNotacC();

                         }  
    

					?>

				</form>

			</div>

		</div>

	</section>

</div>
