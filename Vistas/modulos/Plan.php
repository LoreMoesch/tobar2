<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Docente"){
      if($_SESSION["rol"] != "Secretario"){
		 if($_SESSION["rol"] != "Director"){
    	echo '<script>
    
    	window.locations = "inicio";
    	</script>';
    
    	return;
		 }
      }
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

          
		echo '<h1>Plan de Estudios del Estudiante ('.$estudiante["id"].') : '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h1>
        <br>';
		?>


	</section>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="plan2"class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>

							<th>C&oacute;digo</th>
							<th>Id</th>
							<th>Materia</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Cursada(Nota-Fecha-LLamado)</th>
							<th>Nota final</th>
							<th>Folio</th>
							<th>Libro</th>
							<th>Fecha</th>
							

						</tr>
					</thead>

					<tbody>

						<?php

						$resultado = MateriasC::VerMateriasC();

						foreach ($resultado as $key => $value) {

							if($value["id_carrera"] == $estudiante["id_carrera"]){

								echo '<tr>

									<td>'.$value["codigo"].'</td>
									<td>'.$value["id"].'</td>';
								
									if ($value["taller"]==1){
											    
										echo'<td class="bg-info">'.$value["nom_abrevi"].'</td>';
											
										} else {
											
										echo'<td>'.$value["nom_abrevi"].'</td>';    
											
									}	
								
								//echo '<td>'.$value["nombre"].'</td>';
								
								
									
								echo	'<td>'.$value["grado"].'</td>
									<td>'.$value["tipo"].'</td>';

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

											if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){

												echo '<td class="bg-info">

												'.$N["estado"].' ('.$N["nota_regular"].' - '.$N["fecha_r"].')

												</td>';          									

											}else if($N["estado"] == "Regular"){
											    
											     $llamador=$llamadoa-$N["llamado"];

												echo '<td class="bg-success">

												'.$N["estado"].' ('.$N["nota_regular"].' - '.$N["fecha_r"].' - '.$llamador.')

												</td>';
												
											}else if($N["estado"] == "Reprobada"){

												echo '<td class="bg-danger">

												'.$N["estado"].'

												</td>';

											}else if($N["estado"] == "Aprobado"){

												echo '<td class="bg-primary">

												'.$N["estado"].'

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

												 '.$N["estado_final"].' '.$N["nota_final"].'

												</td>';
										   }else{
										     
										     echo '<td>'.$N["estado_final"].' '.$N["nota_final"].'</td>';       
										   
										   }		
										
										    echo '<td>'.$N["folio"].'</td>';
                                        
                                            echo '<td>'.$N["libro"].'</td>';
                                        
                                            echo '<td>'.$N["fecha"].'</td>';
							
										    
										}

									}

							
							    
							}



						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>
