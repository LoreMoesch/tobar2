<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Secretario" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$exp = explode("/", $_GET["url"]);


?>

<div class="content-wrapper">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				
					
					

						 <?php

			          $columna = "id";

                      $valor = $exp[1];


			          $resultado = ExamenesC::VerExamenesC($columna, $valor);



							echo '</form>

							<br>

							<form method="post">
								
								<h2>Materia : '.$resultado["nombre"].' ('.$resultado["id_materia"].') - id : '.$resultado["id"].' carrera : '.$resultado["id_carrera"].'</h2>

                                <input type="hidden" class="input-lg" name="id_examen" value="'.$resultado["id"].'">

								<input type="hidden" class="input-lg" name="1_fecha_inicio" value="'.$resultado["profesor"].'">

								<h3>Fecha: <input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'"></h3>
								
								<h3>Comision: <input type="text" class="input-lg" name="comision" value="'.$resultado["id_comision"].'"></h3>
								
								<h3>Turno: <input type="text" class="input-lg" name="turno" value="'.$resultado["hora"].'"></h3>
								
								<h3>Tipo: <input type="text" class="input-lg" name="tipo" value="'.$resultado["tipo"].'"></h3>';
								
								//<h3>Llamado: <input type="text" class="input-lg" name="llamado" value="'.$resultado["llamado"].'"></h3>';
								
							echo '<h3>llamado:
								<select class="input-lg" name="llamado">

                    			    	<option value="'.$resultado["llamado"].'">'.$resultado["llamado"].'</option>';

                    				  echo '<option value="Febrero">Febrero</option>
                    				    
                    				        <option value="Marzo">Marzo</option>  
                    				  
                    				        <option value="Abril">Abril(Espl)</option>

                    				        <option value="Julio">Julio</option>
                    				  
                    				        <option value="Agosto">Agosto</option>
                    				  
                    				        <option value="Noviembre">Noviembre</option>
                    				  
                    				        <option value="Diciembre">Diciembre</option>';

                       echo ' </select>

                            </h3>';

							
							echo '<h3>Nro llamado:
								<select class="input-lg" name="nro_llamado">

                    			    	<option value="'.$resultado["nro_llamado"].'">'.$resultado["nro_llamado"].'</option>';

                    				  if   ($resultado["nro_llamado"]==1) { 
                    				    
                    				    echo '<option value="2">2</option>';
                    				    
                    				  } else {
                    				      
                    				    echo '<option value="1">1</option>';  
                    				  }		

                       echo ' </select>

                            </h3>';

								
								
								
						echo	'<h3>orden: <input type="text" class="input-lg" name="orden" value="'.$resultado["orden"].'"></h3>
								
								<input type="hidden" class="input-lg" name="id_pro" value="'.$resultado["id_profe"].'">
								
								<h3>Estado:
								<select class="input-lg" name="estado_e">

                    			    	<option value="'.$resultado["estado"].'">'.$resultado["estado"].'</option>';

                    				  if   ($resultado["estado"]==1) { 
                    				    
                    				    echo '<option value="0">0</option>';
                    				    
                    				  } else {
                    				      
                    				    echo '<option value="1">1</option>';  
                    				  }		

                       echo ' </select>

                            </h3>';

                    		   $docentes1 = UsuariosC::VerUsuarios1C($id);
                    			
                               echo '<h3>Profe:
                               
                               <select class="input-lg" name="id_profe">
                               
                               <option value="'.$resultado["profesor"].'">'.$resultado["profesor"].'</option>'
                               ;

                    			foreach ($docentes1 as $key => $value1) {
                    			    
                    			      if ($value1["rol"]=="Docente"){

                    				    echo '<option value="'.$value1["id"].'">'.$value1["apellido"].' '.$value1["nombre"].' ('.$value1["id"].')</option>';
                    			
                    			      }     
                    			  }	    	

                       echo ' </select>

                            </h3>';
                    			    
                    		   $materias = 	MateriasC::VerMateriasC();

                                if ($resultado["id_carrera"]==6){
                    			          $carre1= "Neuro";
                    			      }
                    			if ($resultado["id_carrera"]==7){
                    			          $carre1= "Sordo";
                    			      }
                    			if ($resultado["id_carrera"]==8){
                    			          $carre1= "Inte";
                    			      }
                    			if ($resultado["id_carrera"]==9){
                    			          $carre1= "Ciego";
                    			      }
                               if ($resultado["id_carrera"]==11){
                    			          $carre1= "Comun";
                    			      }
                               echo '<h3>Materia:
                               
                               <select class="input-lg" name="mate_e">
                               
                               <option value="'.$resultado["nombre"].'">'.$resultado["nombre"].'-'.$resultado["id_materia"].'-'.$carre1.'</option>'
                               ;

                    			foreach ($materias as $key => $value2) {
                    			
                    			  if ($value2["id_carrera"]==6 || $value2["id_carrera"]==7 || $value2["id_carrera"]==8 || $value2["id_carrera"]==9){
                    			      
                    			      if ($value2["id_carrera"]==6){
                    			          $carre= "Neuro";
                    			      }
                    			      if ($value2["id_carrera"]==7){
                    			          $carre= "Sordo";
                    			      }
                    			      if ($value2["id_carrera"]==8){
                    			          $carre= "Inte";
                    			      }
                    			      if ($value2["id_carrera"]==9){
                    			          $carre= "Ciego";
                    			      }
                    				    echo '<option value="'.$value2["id"].'">'.$value2["nom_abrevi"].'-'.$carre.'-'.$value2["id"].'- Año '.$value2["grado"].'</option>';
                    			    
                    			  }
                    			  
                    			}	
                    			
                                if ($resultado["id_carrera"]==6){
                    			          $carre3= "Orientacion Neuro";
                    			      }
                    			if ($resultado["id_carrera"]==7){
                    			          $carre3= "Orientacion Sordo";
                    			      }
                    			if ($resultado["id_carrera"]==8){
                    			          $carre3= "Orientacion Intelectuales";
                    			      }
                    			if ($resultado["id_carrera"]==9){
                    			          $carre3= "Orientacion Ciego";
                    			      }
                               if ($resultado["id_carrera"]==11){
                    			          $carre3= "Orientacion Comun";
                    			      }


                       echo ' </select>

                            </h3>';

                               echo '<h3>Carrera:
                               
                               <select class="input-lg" name="carre_e">
                               
                               <option value="'.$resultado["id_carrera"].'">'.$carre3.'</option>'
                               ;

	          				    echo '<option value="6">Orientacion Neuro</option>
	          				    
	          				          <option value="7">Orientacion Sordo</option>
	          				          
	          				          <option value="8">Orientacion Intelectuales</option>
	          				          
	          				          <option value="9">Orientacion Ciego</option>
	          				          
	          				          <option value="11">Orientacion Comun</option>
	          				          
	          				          ';
	    	

                       echo ' </select>

                            </h3>';

                    			
                    			//echo '<h3>Estado: <input type="text" class="input-lg" name="2_fecha_inicio" value="'.$resultado["estado"].'"></h3>';

								echo '

					<br>

					<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>
					
					<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">
					
	               


						</div>';

					$guardarAjustes = new ExamenesC();
					$guardarAjustes -> ActualizarExamenesC();

			          ?>

				</form>

				

			

		</div>

	</section>

</div>