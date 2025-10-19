<?php

if($_SESSION["rol"] != "Administrador"){

    if($_SESSION["rol"] != "Bedel"){
        
	  if($_SESSION["rol"] != "Secretario"){
	  
	    echo '<script>

	    window.location = "inicio";
	    </script>';

	    return;
	    
	  }
	  
    }



    
}

?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>Gestor de Usuarios</h1>
     
       <?php
       
		$columna = null;
		
        $valor = null;

        $result = UsuariosC::VerUsuariosC($columna, $valor);

        $cant2=0;

        $cant3=0;

        foreach ($result as $key => $val) {
		    
            if($val["cohorte"] == 2020 ){
        
            $cant2++;
		
            }
            if($val["cohorte"] == 2021 ){
        
            $cant3++;
		
            }

        }
		echo '</p>
		
		<h1>Estudiantes 2020: '.$cant2.' </h1>
		
		</p>';
		
		echo '<h1>Estudiantes 2021: '.$cant3.' </h1>';
		
		?>
		
	</section>

	<section class="content">

		<div class="box">

			<div class="box-heade3">
			    
			    <?php
  
                if ($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){			    

				echo '<button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>';

                }			
               ?>			
			
			</div>

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped T">

					<thead>
						<tr>
                            <th>Id</th>
                         	<th>Apellido</th>
							<th>Nombres</th>
							<th>Carrera</th>
							<th>Usuario</th>
							<?php
							if ($_SESSION["rol"] != "Secretario" ){
							
							echo '<th>Contrase√±a</th>';
							
							    
							}
							
							?>
							<th>Rol</th>
							<th>Cohorte</th>
							<th>Estado</th>
							<th>Cursa</th>
							<?php
							if ($_SESSION["rol"] != "Secretario" ){
							
							echo '<th>Acci&oacute;n</th>';
                            
							}
							
							?>
						</tr>
					</thead>

					<tbody>

						<?php

						$columna = null;
						$valor = null;

						$resultado = UsuariosC::VerUsuariosC($columna, $valor);

						foreach ($resultado as $key => $value) {
 
                                    if ($_SESSION["rol"] == "Administrador"){
									
						          	    echo '<tr>
						          	    
                                        <td>'.$value["id"].'</td>

									    <td>'.$value["apellido"].'</td>
									
									    <td>'.$value["nombre"].'</td>';
                                        
                                        if($value["rol"] == "Administrador"){

									    	echo '<td>Usuario Administrador</td>';

									    }else{

									        $columnaC = "id";
									   
									        $valorC = $value["id_carrera"];

									        $carrera = CarrerasC::CarreraC($columnaC, $valorC);

									        echo '<td>'.$carrera["nombre"].'</td>';

									   }

									    echo '<td>'.$value["libreta"].'</td>
									    
									    <td>'.$value["clave"].'</td>
									    
									    <td>'.$value["rol"].'</td>
									    
									    <td>'.$value["cohorte"].'</td>
                                        
                                        <td>'.$value["estado"].'</td>';
                                        
                                        // calcular el aè´–o que esta cursando
                                  
                                        $columna = "id_alumno";
                                        $valor = $value["id"];
           
                                        $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                                   
                                        $uno=0;
                                        $dos=0;
                                        $tres=0;
                                        $cuatro=0;
 
                                        $ninguno=0;
                                                   
                                        foreach ($ins as $key => $m) {
                                            
                                            $ninguno=1;
                                        	
            	                        $columna = "id";
            	
                                        $valor = $m["id_materia"];
                                
             	                        $materia = MateriasC::VerMaterias1C($columna, $valor);
             
                                        $anio=$materia["grado"];
                

                                        if ($anio==1){
            
                                        $uno++; 
            
                                        }
                                        if ($anio==2){
            
                                        $dos++; 
            
                                        }
                                        if ($anio==3){
            
                                        $tres++; 
            
                                        }
                                        if ($anio==4){
                               
                                            $cuatro++; 
                                
                                        }
                                     }
                                     
                                      $anio_c="";  
            
                                    if ($uno>$dos && $uno>$tres && $uno>$cuatro){
                
                                        $anio_c="Primero";
            
                                    } else if ($dos>$tres && $dos>=$uno && $dos>$cuatro){
                
                                        $anio_c="Segundo";
                               
                                    } else if ($tres>=$dos && $tres>=$uno && $tres>$cuatro){
            
                                        $anio_c="Tercer";
            
                                    }else if ($cuatro>=$dos && $cuatro>=$uno && $cuatro>=$tres){
                
                                        $anio_c="Cuarto";
            
                                    }
                                    if ($ninguno==0){
                                
                                      $anio_c="Ningun Curso";    
            
                                    }

                                        echo '<td>'. $anio_c.'</td>';
									    
									    echo '<td>

										<div class="btn-group">

										
											<button class="btn btn-success EditarUsuario" Uid="'.$value["id"].'" data-toggle="modal" data-target="#EditarUsuario">Editar</button>

											
											<button class="btn btn-danger EliminarUsuario" Uid="'.$value["id"].'">Borrar</button>

										
										</div>

									    </td>

								        </tr>';
                                    } else if ($_SESSION["rol"] == "Bedel" || $_SESSION["rol"] == "Secretario" ){
                                       
                                       if ($value["rol"] == "Estudiante"){
                                        
						          	    echo '<tr>
						          	    
						          	    <td>'.$value["id"].'</td>

									    <td>'.$value["apellido"].'</td>
									
									    <td>'.$value["nombre"].'</td>';

                                        if($value["rol"] == "Administrador"){

									    	echo '<td>Usuario Administrador</td>';

									    }else{

									        $columnaC = "id";
									   
									        $valorC = $value["id_carrera"];

									        $carrera = CarrerasC::CarreraC($columnaC, $valorC);

									        echo '<td>'.$carrera["nombre"].'</td>';

									   }

                                        echo '<td>'.$value["libreta"].'</td>';
									    
									    if ($_SESSION["rol"] != "Secretario" ){
									    
									    echo '<td>'.$value["clave"].'</td>';
									    
									    }
									    
									    echo '<td>'.$value["rol"].'</td>
									    
									    <td>'.$value["cohorte"].'</td>
                                        
                                        
                                        
                                        <td>'.$value["estado"].'</td>';
                                        
                                        
                                                                                // calcular el aè´–o que esta cursando
                                  
                                        $columna = "id_alumno";
                                        $valor = $value["id"];
           
                                        $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                                   
                                        $uno=0;
                                        $dos=0;
                                        $tres=0;
                                        $cuatro=0;
 
                                        $ninguno=0;
                                                   
                                        foreach ($ins as $key => $m) {
                                            
                                            $ninguno=1;
                                        	
            	                        $columna = "id";
            	
                                        $valor = $m["id_materia"];
                                
             	                        $materia = MateriasC::VerMaterias1C($columna, $valor);
             
                                        $anio=$materia["grado"];
                

                                        if ($anio==1){
            
                                        $uno++; 
            
                                        }
                                        if ($anio==2){
            
                                        $dos++; 
            
                                        }
                                        if ($anio==3){
            
                                        $tres++; 
            
                                        }
                                        if ($anio==4){
                               
                                            $cuatro++; 
                                
                                        }
                                     }
                                     
                                      $anio_c="";  
            
                                    if ($uno>$dos && $uno>$tres && $uno>$cuatro){
                
                                        $anio_c="Primero";
            
                                    } else if ($dos>$tres && $dos>=$uno && $dos>$cuatro){
                
                                        $anio_c="Segundo";
                               
                                    } else if ($tres>=$dos && $tres>=$uno && $tres>$cuatro){
            
                                        $anio_c="Tercer";
            
                                    }else if ($cuatro>=$dos && $cuatro>=$uno && $cuatro>=$tres){
                
                                        $anio_c="Cuarto";
            
                                    }
                                    if ($ninguno==0){
                                
                                      $anio_c="Ningun Curso";    
            
                                    }

                                        echo '<td>'. $anio_c.'</td>';
									    
									    
							
            							if ($_SESSION["rol"] != "Secretario" ){
							
			    						    echo '<td>

				    						<div class="btn-group">

										
					    						<button class="btn btn-success EditarUsuario" Uid="'.$value["id"].'" data-toggle="modal" data-target="#EditarUsuario">Editar</button>

											
						    				</div>

							    		    </td>';							
                            
							            }
							
								        
								        echo '</tr>';
                                       
                                           
                                       }
                                        
                                    }    

						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>


<div class="modal fade" id="CrearUsuario">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="modal-body">

					<div class="box-body">

						<div class="form-group">

							<h2>Apellido:</h2>

							<input class="form-control input-lg" type="text" name="apellidoU" required>

						</div>

						<div class="form-group">

							<h2>Nombre:</h2>

							<input class="form-control input-lg" type="text" name="nombreU" required>

						</div>

						<div class="form-group">

							<h2>Usuario:</h2>

							<input class="form-control input-lg" type="text" id="libreta" name="usuarioU" required>

						</div>

						<div class="form-group">

							<h2>Contrase√±a:</h2>

							<input class="form-control input-lg" type="text" name="claveU" required>

						</div>

						<div class="form-group">

							<h2>Seleccionar Carrera:</h2>

							<select class="form-control input-lg" name="carreraU">

								<option value="0">Seleccionar Carrera...</option>

								<?php

								$carreras = CarrerasC::VerCarrerasC();

								foreach ($carreras as $key => $value) {
								    
                                  If ($value["id"] >= 6 && $value["id"] <= 10 ) {
                                      
                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'- Plan ('.$value["plan"].')</option>';
                                   
                                   }
								}

								?>


							</select>

						</div>
						

						<div class="form-group">

							<h2>Seleccionar Rol:</h2>

								<?php
								if ($_SESSION["rol"] == "Administrador"){
								echo '
								
								<select class="form-control input-lg" name="rolU" required>

								<option value="Estudiante">Seleccionar Rol...</option>
								
								<option value="Administrador">Administrador</option>
								
								<option value="Estudiante">Estudiante</option>
								
								<option value="Docente">Docente</option>
                                
                                <option value="Bedel">Bedel</option>
                                
                                <option value="Secretario">Secretario</option>
                                
                                <option value="Director">Director</option>
                      
							    </select> ';

								}else {
								    
								echo '
								
								<select class="form-control input-lg" name="rolU" required>

								<option>Seleccionar Rol...</option>
								
								<option value="Estudiante">Estudiante</option>

							    </select> ';

								}    
								
								?>

						</div>

					</div>

				</div>

				<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Crear</button>
					
					<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
					
					<!-- Esto es un comentario
                    
					<button type="button" class="btn btn-danger">Salir</button>
  
                    -->
                    
				</div>

				<?php

				$crearU = new UsuariosC();
				$crearU -> CrearUsuarioC();

				?>

			</form>

		</div>

	</div>

</div>






<div class="modal fade" id="EditarUsuario">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="modal-body">

					<div class="box-body">

						<div class="form-group">

							<h2>Apellido:</h2>

							<input class="form-control input-lg" type="text" id="apellidoEU" name="apellidoEU" required>
							<input class="form-control input-lg" type="hidden" id="Uid" name="Uid" required>

						</div>

						<div class="form-group">

							<h2>Nombre:</h2>

							<input class="form-control input-lg" type="text" id="nombreEU" name="nombreEU" required>

						</div>

						<div class="form-group">

							<h2>Usuario:</h2>

							<input class="form-control input-lg" type="text" id="usuarioEU" name="usuarioEU" required>

						</div>

						<div class="form-group">

							<h2>Contrase√±a:</h2>

							<input class="form-control input-lg" type="text" id="claveEU" name="claveEU" required>
						
						</div>

						<div class="form-group">

							<h2>Estado:</h2>

							<input class="form-control input-lg" type="text" id="estadoEU" name="estadoEU" required>

						</div>
						<div class="form-group" id="carrera">
						    
						    <h2 id="carreraActual"></h2>

							<h2>Seleccionar Carrera:</h2>

							<select class="form-control input-lg" name="carreraEU">

								<option id="carr"></option>

								<?php

								$carreras = CarrerasC::VerCarrerasC();

								foreach ($carreras as $key => $value) {
								    
								     If ($value["id"] >= 6 && $value["id"] <= 10 ) {

									       echo '<option value="'.$value["id"].'">'.$value["nombre"].'-'.$value["plan"].'</option>';
								     }
								     
								}

								?>

							</select>

						</div>
						
						<div class="form-group">

							<h2 id="estadoActual"></h2>

							<h2>Seleccionar nuevo Estado:</h2>
							
								<?php
								
    								echo '
    								<select class="form-control input-lg" name="estadoEU" required>
    						
    								<option>Seleccionar Estado...</option>
    								
    								<option value="Regular">Regular</option>
    								
    								<option value="Egresado">Egresado</option>
    								
    								<option value="Condicional">Condicional</option>
                                    
                                    <option value="Abandono">Abandono</option>

    							    </select> ';

								?>


						</div>
						
						<div class="form-group">

							<h2 id="rolActual"></h2>

							<h2>Seleccionar nuevo Rol:</h2>
							
								<?php
								
								if ($_SESSION["rol"] == "Administrador"){
								
    								echo '
    								<select class="form-control input-lg" name="rolEU" required>
    						
    								<option>Seleccionar Rol...</option>
    								
    								<option value="Administrador">Administrador</option>
    								
    								<option value="Estudiante">Estudiante</option>
    								
    								<option value="Docente">Docente</option>
                                    
                                    <option value="Bedel">Bedel</option>
                                    
                                    <option value="Secretario">Secretario</option>
                                    
                                    <option value="Director">Director</option>
                          
    							    </select> ';

								}else {
								    
    								echo '
    								
    					    		<select class="form-control input-lg" name="rolEU" required>
    
    								<option>Seleccionar Rol...</option>
    								
    								<option value="Estudiante">Estudiante</option>
    
    							    </select> ';

								}    
								
								?>


						</div>


					</div>

				</div>

				<div class="modal-footer">

					<button type="submit" class="btn btn-success">Guardar Cambios</button>

                	<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
					
					<!-- Esto es un comentario
					
					<button type="button" class="btn btn-danger">Salir</button>

                    -->
                    
				</div>

				<?php

				$actualizarU = new UsuariosC();
				$actualizarU -> ActualizarUsuariosC();

				?>

			</form>

		</div>

	</div>

</div>

<?php

$eliminarU = new UsuariosC();
$eliminarU -> EliminarUsuariosC();

?>
