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

<div class="content-wrapper">

	<section class="content">

		<div class="box">

			<div class="box-body">
			    
		      <table class="table table-bordered table-hover table-striped ">

							<thead>
								<tr>

									<th>Nfff°</th>
									<th>id_com</th>
									<th>Cantidad</th>
									<th>Materia</th>
									<th>Carreras</th>
									<th>Días</th>
									<th>Horario</th>
                                    <th>Informe</th>
									<th></th>

								</tr>
							</thead>

							<tbody>



			    
			    
			    
			    
			    
			  

				<?php

				$exp = explode("/", $_GET["url"]);

				//$columna = "id";
				//$valor = $exp[1];

				//$materia = MateriasC::VerMaterias2C($columna, $valor);

				//$id = $exp[1];
		
		        ///////////////////////////////////////////////////////////////
		                		$columna="id";
						
        						$valor=$exp[1];			


								$comisiones = MateriasC::VerComisionesC($columna, $valor);

								$columna = "id_comision";

			      				$valor = $exp[1];
			      					
      								$insc = MateriasC::VerInscMateriasC($columna, $valor);

                					$ii=0;

                					foreach ($insc as $key => $insc_alu) {

         								if($_SESSION["id"] = $insc_alu["id_alumno"]){

         								  $ii++;  

      	     							}

    		    					}

									echo '<tr>

											<td>'.$comisiones["numero"].'</td>

											<td>'.$comisiones["id"].'</td>

											<td>'.$ii.'</td>

											<td>'.$comisiones["nombre"].'</td>

											<td>'.$comisiones["carreras"].'</td>
											
											
											<td>'.$comisiones["dias"].'</td>

											<td>'.$comisiones["horario"].'</td>';
                                            

                                            

                                            if($comisiones["enviado"]==1){

                                                $enviado="Enviado";

                                            }else{

                                                $enviado="Sin Enviar";

                                            }
                                            
                                            echo'     <td>'.$enviado.'</td>
											      <td>';

												
												//echo '<a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

												//	<button class="btn btn-primary">Generar PDF</button>

												//</a>';

												
                                                //if($_SESSION["rol"] == "Administrador"){
												
												//    echo '<button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Borrar Comisión</button>';

                                                //}
                                            
                                            //echo'    <a href="https://sistema.isfdcarolinatobargarcia.edu.ar/Comision-Estudiantes/'.$value["id"].'/'.$materia["id"].'">
											//	<button class="btn btn-primary">Ver Alumnos</button>
											//</a>';

                                            echo'    <a href="http://localhost/tobar2/Comision-Estudiantes/'.$comisiones["id"].'">
											
											<button class="btn btn-primary">Ver Alumnos</button>
											
											</a>';
                                                
											echo '</td>

										</tr>';

								

                              //  }
		        
		        
        
		        
		        ///////////////////////////////////////////////////////////////
		        ////$profes = UsuariosC::VerUsuarios1C($id);
		        
		         
		       
		        //$valor = $materia["id_carrera"];

		        //$carrera = CarrerasC::CarreraC($columna, $valor);
				
				
				
				//echo '<h2>Docentes en la Comision:</h2>
				
				//<h1><b>'.$profes["apellido"].' '.$profes["nombre"].'</b></h1>';
				
				  ///echo '<h2>Carrera: '.$carrera["nombre"].' -Plan: '.$carrera["plan"].'</h2>';

				?>

						</tbody>

						</table>	    





				<div class="row">

					<div class="col-md-12 col-xs-12">
					    <?php
					    
					    //if($_SESSION["rol"] == "Administrador"){

						//    echo '<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearComision">Crear Comisión</button>';

					    //}<h2>Comisiones:</h2>

						?>
						
						<br>
						

						<table class="table table-bordered table-hover table-striped T">

							<thead>
								<tr>

									<th>Nuuuu°</th>
									<th>id_com</th>
									<th>Cantidad</th>
									<th>Materia</th>
									<th>Carreras</th>
									<th>Días</th>
									<th>Horario</th>
                                    <th>Informe</th>
									<th></th>

								</tr>
							</thead>

							<tbody>

								<?php

								$columna = "id_usuarios";
								$valor = $exp[1];

        					    $comision = MateriasC::VerEquiposC($columna, $valor);

        						foreach ($comision as $key => $valor1) {
						
        						$columna="id";
						
        						$valor=$valor1["id_comision"];			


								$comisiones = MateriasC::VerComisionesC($columna, $valor);

								foreach ($comisiones as $key => $value) {

                                    $columna = "id_comision";

			      					$valor = $value["id"];
			      					
      								$insc = MateriasC::VerInscMateriasC($columna, $valor);

                					$ii=0;

                					foreach ($insc as $key => $insc_alu) {

         								if($_SESSION["id"] = $insc_alu["id_alumno"]){

         								  $ii++;  

      	     							}

    		    					}

									echo '<tr>

											<td>'.$value["numero"].'</td>

											<td>'.$value["id"].'</td>

											<td>'.$ii.'</td>

											<td>'.$value["nombre"].'</td>

											<td>'.$value["carreras"].'</td>
											
											
											<td>'.$value["dias"].'</td>

											<td>'.$value["horario"].'</td>';
                                            

                                            

                                            if($value["enviado"]==1){

                                                $enviado="Enviado";

                                            }else{

                                                $enviado="Sin Enviar";

                                            }
                                            
                                            echo'     <td>'.$enviado.'</td>
											      <td>';

												
												//echo '<a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

												//	<button class="btn btn-primary">Generar PDF</button>

												//</a>';

												
                                                //if($_SESSION["rol"] == "Administrador"){
												
												//    echo '<button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Borrar Comisión</button>';

                                                //}
                                            
                                            //echo'    <a href="https://sistema.isfdcarolinatobargarcia.edu.ar/Comision-Estudiantes/'.$value["id"].'/'.$materia["id"].'">
											//	<button class="btn btn-primary">Ver Alumnos</button>
											//</a>';

                                            echo'    <a href="http://localhost/tobar2/Comision-Estudiantes/'.$value["id"].'">
											
											<button class="btn btn-primary">Ver Alumnos</button>
											
											</a>';
                                                
											echo '</td>

										</tr>';

								}

                                }

								?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>


