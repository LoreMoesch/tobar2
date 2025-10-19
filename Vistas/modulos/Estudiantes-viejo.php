<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    
    	window.location = "http://localhost/tobar2/inicio";
    	</script>';
    
    	return;
    }
}

?>


<div class="container">

	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

		$columnaC = "id";
		$valorC = $exp[1];

		$carrera = CarrerasC::CarreraC($columnaC, $valorC);

        $columna = null;
		
		$valor = null;

		$resultadou = UsuariosC::VerUsuariosC($columna, $valor);

        $cant=0;

		foreach ($resultadou as $key => $value1) {
		    
            if($value1["id_carrera"] == $exp[1]){
        
            $cant++;
		
            }
            
            }

		echo '<h3>Estudiantes de: '.$carrera["nombre"].'('.$cant.')</h3>';

		?>


	</section>

	<div class="row">

		<div class="col-lg-12">

			<div class="table-responsive">

				<table id="estudiantes"class="table table-striped table-bordered" cellspacing="0" width="100%">

					<thead>
						<tr>
						    <th>Nro</th>
							<th>Id</th>
							<th>Libreta</th>
							<th>Apellido y Nombre</th>
							<th>DNI</th>
							<th>Cohorte</th>
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>

						<?php

						$columna = null;
						$valor = null;

						$resultado = UsuariosC::VerUsuariosC($columna, $valor);

                        $can=0;
						//$notaalu = "";
						//if(!empty($resultado)){
							foreach ($resultado as $key => $value) {

								if($value["id_carrera"] == $exp[1]){
                                
                               	 $can++;
                                
									echo '<tr>
								
								    	<td>'.$can.'</td>
								
								   		 <td>'.$value["id"].'</td>
								
										<td>'.$value["libreta"].'</td>
								
										<td>'.$value["apellido"].' '.$value["nombre"].'</td>
									
										<td>'.$value["dni"].'</td>';
                                
                                		$columna ="id_alumno";
						
						            	$valor = $value["id"];

						            if ($exp[1]==6) {
						            
					         	        $notaalu = MateriasC::VerNotasnAC($columna, $valor);

                                    } else if ($exp[1]==7) {
                             
                                        $notaalu = MateriasC::VerNotassAC($columna, $valor);    
                                        
                                    } else if ($exp[1]==8) {
                                        
                                        $notaalu = MateriasC::VerNotasiAC($columna, $valor);
                                        
                                    } else if ($exp[1]==9) {    
                                        
                                        $notaalu = MateriasC::VerNotascAC($columna, $valor);
                                        
                                    }  
                                    
                                    $ii=0;

                                    foreach ($notaalu as $key => $nalu) {
                                        
                                        $ii++;
                                        	
                                    } 
                                    
                                    echo '<td>'.$value["cohorte"].'</td>';
                                    
                                	if ($ii==0 || $exp[1]== 10){
                                
                                      echo '<td> No </td>';
                                        	    
                                	   }else {
                                        	    
                            	    echo '<td> Sí</td>';
                            	    
                                	}
                                    
                                    
								echo '
								      
								      <td>
										<a href="http://localhost/tobar2/Ver-Plan/'.$value["id_carrera"].'/'.$value["libreta"].'/'.$value["id"].'">
											<button class="btn btn-primary">Plan de Estudios</button>
										</a>
									
										<a href="http://localhost/tobar2/Materias2/'.$value["id_carrera"].'/'.$value["id"].'">
											<button class="btn btn-success">Cursadas</button>
										</a>

										<a href="#">
											<button class="btn btn-warning">Examnen</button>
										</a>
										
										<a href="http://localhost/tobar2/Editar-Alu/'.$value["id"].'/'.$exp[1].'">
											<button class="btn btn-danger">Info Personal</button>
										</a>


									</td>
								</tr>';

							}
				 		}
					//}else{echo "<tr><td colspan='6'>No hay estudiantes inscriptos.</td></tr>";
					//}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</div>
