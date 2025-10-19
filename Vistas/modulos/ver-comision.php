<?php

if($_SESSION["rol"] != "Administrador"){
    
    if($_SESSION["rol"] != "Secretario"){
    
       if($_SESSION["rol"] != "Bedel"){
		 if($_SESSION["rol"] != "Director"){
        	echo '<script>
    
    	    window.locations = "inicio";
    	    </script>';
    
    	   return;
		 }
       }	   
    }
}

$exp = explode("/", $_GET["url"]);

?>

<div class="container-fluid">

	<section class="content-header">

		<div class="box">

			<div class="box-body">
			    <?php

			    $columna="id";
						
        		$valor=$exp[1];			

				$comision = MateriasC::VerComisiones2C($columna, $valor);
			    
			  echo '<a href="http://localhost/tobar2/Agregar-profe/'.$exp[1].'">
			       <button class="btn btn-success">Agregar Profe</button>
			       </a>';
			       
			  echo '<a href="http://localhost/tobar2/Comisiones2">
			       <button class="btn btn-primary">Volver</button>
			      </a>';
	//echo $comision["enviado"];
	      
            if($_SESSION["rol"] != "Secretario"){
            
            if($comision["enviado"]==1){
                
	         echo '<a href="http://localhost/tobar2/Act-Desc-edi/'.$exp[1].'/0">
			       <button class="btn btn-danger">Desactivar Envio</button>
			       </a>';
			       
			 echo '<br><br>';
			       
			 echo '<div class="alert alert-success">Informe Enviado</div>';

            } else {
	         
			  echo '<a href="http://localhost/tobar2/Act-Desc-edi/'.$exp[1].'/1">
			       <button class="btn btn-warning">Activar Envio</button>
			       </a>';
              
              echo '<br><br>';
              
              echo '<div class="alert alert-success">Informe sin Enviar</div>';  

            
            }
            }
            
            
            
			    echo '<h2>Comision:</h2>';
			   
			   
			   ?>
			   
			   <table class="table table-bordered table-hover table-striped T">

							<thead>
								<tr>

									<th>N°</th>
									<th>id_com</th>
									<th>Cantidad</th>
									<th>Materia</th>
									<th>Carreras</th>
									<th>Días</th>
									<th>Horario</th>
                                    <th>Informe</th>
									<th>Accion</th>

								</tr>
							</thead>

							<tbody>



				<?php
				
				

			

				//$columna = "id";
				//$valor = $exp[1];

				//$materia = MateriasC::VerMaterias2C($columna, $valor);

				//$id = $exp[1];
		
		        ///////////////////////////////////////////////////////////////
		                		$columna="id";
						
        						$valor=$exp[1];			


								$comi = MateriasC::VerComisionesC($columna, $valor);
								
								foreach ($comi as $key => $value) {

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

												
												//echo '<a href="http://localhost/tobar2/pdfs/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

												//	<button class="btn btn-primary">Generar PDF</button>

												//</a>';

												
                                                //if($_SESSION["rol"] == "Administrador"){
												
												//    echo '<button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Borrar Comisión</button>';

                                                //}
                                            
                                            //echo'    <a href="http://localhost/tobar2/Comision-Estudiantes/'.$value["id"].'/'.$materia["id"].'">
											//	<button class="btn btn-primary">Ver Alumnos</button>
											//</a>';

                                            echo'    <a href="http://localhost/tobar2/Comision-Estudiantes/'.$value["id"].'">
											
											<button class="btn btn-primary">Ver Alumnos</button>
											
											</a>';
                                                
											echo '</td>

										</tr>';

								

                                }
		        
		        
		        
		        
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

                        echo '<h2>Profes:</h2>';

						?>
						
						<br>
						

						<table class="table table-bordered table-hover table-striped T">

							<thead>
								<tr>
                                    <th>Id</th>
									<th>Id_p</th>
									<th>Dni</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Accion</th>
								</tr>
							</thead>

							<tbody>

								<?php

								$columna = "id_comision";
								
								$valor = $exp[1];

        					    $comision = MateriasC::VerEquiposC($columna, $valor);

        						foreach ($comision as $key => $valor1) {
						
            						$columna="id";
						
        						    $valor=$valor1["id_usuarios"];
        						
        						    //echo $valor;

                                    $val = UsuariosC::VerUsuariosC($columna, $valor);

                                        echo '<tr>
                                        
                                            <td>'.$valor1["id"].'</td>

                                            <td>'.$val["id"].'</td>

											<td>'.$val["libreta"].'</td>

											<td>'.$val["nombre"].'</td>

											<td>'.$val["apellido"].'</td>
                                            
                                            <td><a href="http://localhost/tobar2/Borrar-profe/'.$valor1["id"].'/'.$exp[1].'">
			                                <button class="btn btn-danger">Borrar</button>
			                                </a></td>

										</tr>';

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


