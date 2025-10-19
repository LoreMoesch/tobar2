<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    
    	window.locations = "http://localhost/tobar2/inicio";
    	</script>';
    
    	return;
    }
}

?>


<div class="content-wrapper">

	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

		// $exp[1]  id_examen
		$columna = "id";
		$valor = $exp[1];

		$examen = ExamenesC::VerExamenesC($columna, $valor);

		$columna = "id";
		$valor = $examen["id_materia"];

		$materia = MateriasC::VerMaterias2C($columna, $valor);
		
		echo '<h1>Inscriptos en Exámen como Libres de: '.$examen["nombre"].'<br><br>

		Fecha: '.$examen["fecha"].' - Turno: '.$examen["hora"].' - Aula: '.$examen["aula"].' - Profesor/a: '.$examen["profesor"].'
		</h1>
		<br>';

		echo '<a href="http://localhost/tobar2/pdfs/Inscriptos-Examen_l.php/'.$exp[1].'"target="blank">
				<button class="btn btn-primary">Generar Acta PDF</button>
			</a>';
			
		echo '<a href="http://localhost/tobar2/pdfs/Inscriptos-Examen1_l.php/'.$exp[1].'"target="blank">
				<button class="btn btn-primary">Informe PDF</button>
			</a>';


		?>




	</section>

	<section class="content">

		<div class="box">

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped">

					<thead>
						<tr>
							<th>N°</th>
							<th>Libreta</th>
							<th>Apellido y Nombre</th>
							<th>Concepto</th>
							<th>Fecha</th>
							<th>Nota</th>
							<th>Folio</th>
							<th>Libro</th>
						</tr>
					</thead>

					<tbody>

						<?php

						$columna = "id_examen";
						$valor = $exp[1];

						$insc = ExamenesC::VerInscExamenliC($columna, $valor);

						foreach ($insc as $key => $value) {
						    
                           	echo '<tr>';

								echo '<td>'.($key+1).'</td>
								<td>'.$value["libreta"].'</td>';

								$columna = "id";
								$valor = $value["id_alumno"];

								$alumnos = UsuariosC::VerUsuarios2C($columna, $valor);
                                
                                foreach ($alumnos as $key => $v) {

									echo '<td>'.$v["apellido"].' '.$v["nombre"].'</td>';
									
	                                $columna = "id_materia";
									
									$valor = $value["id_materia"];

									$notas = MateriasC::VerNotasC($columna, $valor);
									
									if ( $v["id_carrera"] == 8){
									    
									      $notas = MateriasC::VerNotasiC($columna, $valor);

									  } else if ( $v["id_carrera"] == 6){
									    
									      $notas = MateriasC::VerNotasnC($columna, $valor);

									  } else if ( $v["id_carrera"] == 7){

									      $notas = MateriasC::VerNotassC($columna, $valor);

									  } else if ( $v["id_carrera"] == 9){

									       $notas = MateriasC::VerNotascC($columna, $valor);

									  }  
									
                                    $vernota=0;
                                    foreach ($notas as $key => $Nota) {
                                       
	                                    if ($Nota["id_alumno"] == $v["id"] && ($Nota["estado_final"] == "Aprobado" || $Nota["estado_final"] == "Reprobado" || $Nota["estado_final"] == "Ausente")){
                                        $vernota=1;
                                            
                                            echo '<td>'.$Nota["estado_final"].'</td>';

                                            echo '<td>'.$Nota["fecha"].'</td>';

                                            echo '<td>'.$Nota["nota_final"].'</td>';

                                            echo '<td>'.$Nota["folio"].'</td>';

                                            echo '<td>'.$Nota["libro"].'</td>';

                                            echo '<td>
							
                                                <a href="http://localhost/tobar2/Nota-Examenle/'.$value["id_materia"].'/'.$v["libreta"].'/'.$Nota["id"].'/'.$examen["id"].'">
		    			    
		    			    		                <button class="btn btn-success btn-sm pull-left"><i class="fa fa-pencil"></i></button>
        	    			
        	    					            </a>

				    			            </td>';	

	                                       } 

									}
									if ($vernota==0){
									    echo '<td>
							
                                                <a href="http://localhost/tobar2/Nota-Examenl/'.$value["id_materia"].'/'.$v["libreta"].'/0/'.$examen["id"].'">
		    			    
		    			    		                <button class="btn btn-success btn-sm pull-left"><i class="fa fa-pencil"></i></button>
        	    			
        	    					            </a>';
        	    					             
        	    					            echo '<a>&nbsp;</a>';
		    			    		            
		    			    		            echo '<a href="http://localhost/tobar2/borrarinsc/'.$value["id"].'/'.$exp[1].'/0">
			                                
			                                    <button class="btn btn-danger">Borrar</button></a>';
        	    					            
        	    					            
        	    					            

				    			           echo '</td>';	
									}


                                      
							echo '</tr>';

								}
 
					           	}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>
