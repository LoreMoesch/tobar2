<?php

// $exp[1] ---> id_comision
// $exp[2] ---> libreta
// $exp[3] ---> id_carrera
// $exp[4] ---> id_materia
// $exp[5] ---> comun



$exp = explode("/", $_GET["url"]);

$columna = "id_materia";
$valor = $exp[4];


if ( $exp[3] == 8){

    $nota = MateriasC::VerNotasiC($columna, $valor);

  } else if ( $exp[3] == 6){
									    
    $nota = MateriasC::VerNotasnC($columna, $valor);

  } else if ( $exp[3] == 7){

    $nota = MateriasC::VerNotassC($columna, $valor);

  } else if ( $exp[3] == 9){

    $nota = MateriasC::VerNotascC($columna, $valor);
}  


//$nota = MateriasC::VerNotasC($columna, $valor);




if($_SESSION["rol"] != "Docente"){

	echo '<script>

	window.locations = "http://localhost/tobar2/inicio";
	</script>';

	return;

}

foreach ($nota as $key => $EN) {

	if($EN["id_materia"] == $exp[4] && $EN["libreta"] == $exp[2]){

		echo '<script>

		window.location = "http://localhost/tobar2/Editar-NotaD/'.$exp[4].'/'.$exp[2].'/'.$EN["id"].'/'.$exp[1].'/'.$exp[3].'"
		</script>';

		return;
        
        // 

	}

}

?>

<div class="container">

	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post">

					<?php
					
					   	 $llamado3 = ExamenesC::VerTurnoC();
         
                         foreach ($llamado3 as $key => $valores) {

                                if ($valores["estado"]==1) {
        
                                  $llamado_a1=$valores["id"];
                        
                                }
         
                        }
						
					    $exp = explode("/", $_GET["url"]);

					    $columna = "libreta";
					
					    $valor = $exp[2];

					    $estudiante = UsuariosC::VerUsuariosC($columna, $valor);
                        
                        $hoy=date("d/m/y");
					    
					    echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].' - Dni: '.$estudiante["dni"].'</h2>';

    					echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">
    
    					<input type="hidden" name="profesor" value="'.$_SESSION["apellido"].'">
    					
    					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">
    
    					<input type="hidden" name="fecha_r" value="'.$hoy.'">
    					
    					<input type="hidden" name="llamado" value="'.$llamado_a1.'">
    					
    					<input type="hidden" name="id_materia" value="'.$exp[4].'">
    					
    					<input type="hidden" name="comun" value="'.$exp[5].'">
    
    					<input type="hidden" name="id_comision" value="'.$exp[1].'">';
    
    					$columna = "id";
    					
    					$valor = $exp[4];
    
    					$materia = MateriasC::VerMaterias2C($columna, $valor);
    
    					echo '<h2>Materia: '.$materia["nom_abrevi"].'</h2>
    
    					<input type="hidden" name="id_materia" value="'.$materia["id"].'">';
    
    					?>
    
    
    					<div class="row">
    
    						<div class="col-md-6 col-xs-12">
    
    							
    							<input type="hidden" class="input-lg" name="fecha">
    
    							
    							
    
    							<h2>Estado:</h2>
    							
                                <?php
            						       
                    					  	  $regimen = MateriasC::VerRegimenC1();   
                    					  	
                    					  	 echo '<select class="input-lg" name="estado">
                           
                    	        			    	<option>Seleccionar...</option>
                    	        			    	
                    	        				    <option value="Libre por Inasistencia">Libre por Inasistencia</option>
                    						
                    							    <option value="Reprobada">Reprobada</option>';
                    							    
	                                         foreach ($regimen as $key => $valuee) {                    							    

                    						  if ($exp[4]==$valuee["id_materia"]){
                    						      
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
                    			      
                    			            <a> o Promo Indirecta)</a>';
    							
    							?>
    							
    							<input type="hidden" class="input-lg" name="nota_final">
    							<br><br>
    							
                                
                                <button class="btn btn-success btn-lg" type="submit">Guardar Clasificaci&oacute;n</button>
                                
                               </div>
    
    					   <div class="col-md-6 col-xs-12">
    						       <?php
    						       
    						        echo '<h2>Nota:</h2> ';
    						        
    						       
    						        echo '
    						        
 
    						       
    						        
    						        <select class="input-lg" name="notar">
                           
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

                    						
                    			      </select>';
                    			      
                    			      echo '<br>';
                    			      
                    			      echo '<a>(Colocar Nota solo en caso de Estado: Regular,</a><br>
                    			      
                    			            <a> Promo Directa y Promo Indirecta)</a>';
    						       
    			        	       //echo '<h2>Nota Final:</h2>
    
                 				//	<input type="text" class="input-lg" name="nota_final"  value="'.$resultado["nota_final"].'">
    
    							echo '<br><br>';
    							   ?>	
    						
    
    						</div>
    
    					</div>
    
    					<?php
    
                        // nuevo registro en Notas : id_alumno, libreta, id_materia, fecha, profesor, nota_final, estado.
    

                        if ( $exp[3] == 8){

        					$notas = new MateriasC();
    					
        					$notas -> ColocarNotaDiC();
                    
                      } else if ( $exp[3] == 6){
									    
    
    					$notas = new MateriasC();
    					
    					$notas -> ColocarNotaDnC();

                      } else if ( $exp[3] == 7){


    					$notas = new MateriasC();
    					
    					$notas -> ColocarNotaDsC();

                    } else if ( $exp[3] == 9){


    					$notas = new MateriasC();
    					
    					$notas -> ColocarNotaDcC();
                    }  


					?>

				</form>

			</div>

		</div>

	</section>

</div>
