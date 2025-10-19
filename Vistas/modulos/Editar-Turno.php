<?php

if($_SESSION["rol"] == "Estudiante" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Secretario" || $_SESSION["rol"] == "Director"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$exp = explode("/", $_GET["url"]);


?>

<div class="container">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				
					
					

						 <?php

			          $columna = "id";

                      $valor = $exp[1];


			          $resultado = ExamenesC::VerTurnosC($columna, $valor);



							echo '</form>

							<br>

							<form method="post">
							
							    <h3>Id: '.$resultado["id"].'</h3>
								
                                <input type="hidden" class="input-lg" name="id_turno" value="'.$resultado["id"].'">

								<h3>Turno: <input type="text" class="input-lg" name="turno" value="'.$resultado["turno"].'"></h3>
								<h3>Anio: <input type="text" class="input-lg" name="anio" value="'.$resultado["anio"].'"></h3>
								<h3>Fecha Inicio: <input type="text" class="input-lg" name="f-inicio" value="'.$resultado["fecha_desde"].'"></h3>
								
								<h3>Fecha Finalizacion: <input type="text" class="input-lg" name="f-hasta" value="'.$resultado["fecha_hasta"].'"></h3>
								<h3>Llamado: <input type="text" class="input-lg" name="llamado" value="'.$resultado["llamado"].'"></h3>
								
								<h3>Estado:
								<select class="input-lg" name="estado_t">

                    			    	<option value="'.$resultado["estado"].'">'.$resultado["estado"].'</option>';

                    				  if   ($resultado["estado"]==1) { 
                    				    
                    				    echo '<option value="0">0</option>';
                    				    
                    				  } else {
                    				      
                    				    echo '<option value="1">1</option>';  
                    				  }		

                       echo ' </select>

                            </h3>';

								echo '

					<br>

					<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>
					
					
	                <a href="/Turno"><button class="btn btn-primary">Volver</button></a>


						</div>';

					$guardarturnos = new ExamenesC();
					$guardarturnos -> ActualizarTurnosC();

			          ?>

				</form>

				

			

		</div>

	</section>

</div>