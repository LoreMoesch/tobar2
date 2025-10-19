<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}


?>

<div class="content-wrapper">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">

					<?php
					
					$exp = explode("/", $_GET["url"]);
                    
        			$columna="id";
						
        			$valor=$exp[1];			

					$comision = MateriasC::VerComisiones2C($columna, $valor);

							echo' 

							<br>

							<form method="post">
								
								<h3>Comision : '.$comision["id"].' ('.$comision["nombre"].' - '.$comision["carreras"].' )</h3>

								<input type="hidden" class="input-lg" name="comision" value="'.$comision["id"].'">';


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

							echo '	<h3>Escritura de Notas:
								<select class="input-lg" name="nota">

                    			    	<option value="1">1</option>

                    				    <option value="0">0</option>';  

                       echo ' </select>

                            </h3>';

					echo '<br>

					<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>

						</div>';

					$guardarProfe = new MateriasC();
					$guardarProfe -> CrearEquipoC();

			          ?>

				</form>

		</div>

	</section>

</div>