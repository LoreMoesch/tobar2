<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    	window.location = "inicio";
    	</script>';
    	return;
    }
}

// ✅ CORREGIDO: Inicializar variable antes de usar
$valuea = array('turno' => 'N/A', 'llamado' => 'N/A');

$llamadoa = ExamenesC::VerTurnoAC();

if($llamadoa && count($llamadoa) > 0){
    foreach ($llamadoa as $key => $value_temp) {
        $valuea = $value_temp; // Tomar el primer registro
        break; // Salir del foreach después del primero
    }
}

?>

<div class="container">
    
	<section class="container">
	
		<h3>Gestor de Exámenes</h3>
		<?php
		echo '<h3>Turno: '.$valuea["turno"].' - Llamado: '.$valuea["llamado"].' </h3>';
		?>
		
	</section>
	
	<section class="container">
	
		<div class="box">
	
			<div class="box-body">
	
				<?php
	
				$crearCarrera = new CarrerasC();
	
				$crearCarrera -> CrearCarreraC();
	
				?>
	
				

				<?php
	
				$columna = "id";
	
				$valor = 1;
	
				$resultado = AjustesC::VerAjustesC($columna, $valor);
	
				if($resultado["h_examenes"] == 0){
	
					echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HE">Habilitar Inscripciones a Examenes</button>&nbsp;&nbsp;';
	
				}else{
	
					echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DE">Deshabilitar Inscripciones a Examenes</button>&nbsp;&nbsp;';
	
				}
	
				if($_SESSION["rol"] == "Administrador"){
				    
				    echo '<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#VaciarRegistrosExamenes">Vaciar Registros de Inscripciones a los Examenes</button>';
                }
                
                	
                ?>
                
        <br>
        <br>
	
				<table class="table table-bordered table-hover table-striped">
				    
					<thead>
					
						<tr>
					
							<th>Código</th>
					
							<th>Nombre</th>
					
							<th>Inscriptos</th>
							
							 <th>Turno</th>
							 
						</tr>
					
					</thead>
					
					<tbody>

						<?php

						$carrera = CarrerasC::VerCarrerasC();
						

						foreach ($carrera as $key => $value) {
						    
						    // ✅ CORREGIDO: Quitar filtro restrictivo - mostrar todas las carreras
							    
						    echo '<tr>
								<td>'.$value["id"].'</td>
								<td>'.$value["nombre"].'</td>';
								
							$i=0;
							$ii=0;
							
							$exam = ExamenesC::VerInscExamentodosC();
							
							if($exam){
								foreach ($exam as $key => $inscripexa) {
    						       
    						      $columna= "id";
    						      $valor=$inscripexa["id_alumno"];
    						      $usua=UsuariosC:: VerUsuariosC($columna, $valor);
    						      
            				      $columna = "id";
			                      $valor = $inscripexa["id_examen"];        						      
    						      
    						      $exa= ExamenesC::VerExamenesC($columna, $valor);
    						      
    						      if($exa && isset($exa["id_carrera"]) && $exa["id_carrera"] == $value["id"]){
    						          
    						          if (isset($inscripexa["llamado"])){
        						          if ($inscripexa["llamado"]==1){
        						              $i++;
        						          }
        						          if ($inscripexa["llamado"]==2){
        						              $ii++;
        						          }
    						          }
    						      }
    						    }
							}

					   // Mostrar inscriptos según el llamado activo
					   if (isset($valuea["llamado"]) && $valuea["llamado"]==1){
					        echo '<td>'.$i.'</td>';
					   }else if (isset($valuea["llamado"]) && $valuea["llamado"]==2){
					        echo '<td>'.$ii.'</td>';  
					   }else{
					        echo '<td>0</td>';
					   }
							
                        echo' <td> 		
							<a href="Ver-Examenes/'.$value["id"].'/'.(isset($valuea["llamado"]) ? $valuea["llamado"] : 1).'">
								<button class="btn btn-success">Ver Exámenes</button>
							</a>
						</td>';

						echo '</tr>';
						    
						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

<div class="modal fade" id="HE">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Habilitar las Inscripciones a Examenes?</h2>
							<input type="hidden" name="h_examenes" value="1">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$HE = new AjustesC();
				$HE -> HEC();
				?>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="DE">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Deshabilitar las Inscripciones a Examenes?</h2>
							<input type="hidden" name="h_examenes" value="0">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="VaciarRegistrosExamenes">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Eliminar todas las Inscripciones a Examenes?</h2>
							<input type="hidden" name="EE" value="EE">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$vaciare = new MateriasC();
				$vaciare -> VaciarRegistrosExamenesC();
				?>
			</form>
		</div>
	</div>
</div>