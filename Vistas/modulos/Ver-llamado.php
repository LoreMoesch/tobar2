

<div class="container">
  <section class="container-header">
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

	</section>


<section class="container">
	<div class="box">
		<div class="box-body">

			<?php
			$columna = "id";
            $valor = 1;
            $ajuste = AjustesC::VerAjustesC($columna, $valor);
			echo '&nbsp;&nbsp;&nbsp;'; 
            
            echo '
			<br>
			<a href="http://localhost/tobar2/Turno">
			<button class="btn btn-primary btn-lg">Turnos</button>
			</a>';
			
			if($ajuste["exa_estado"] == 0){
				
				echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#VT">Ver Todos</button>';
    			
			}else{
			
	            echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#VA">Ver Activos</button>';
			
			}
			
            echo'<br/>';
            echo'<br/>';

      	if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){
					echo '
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
							    <th>Id</th>
							    <th>Materia</th>
							    <th>Dia</th>
							    <th>Curso</th>
								<th>Fecha</th>
								<th>Profesor</th>
								<th>Comision</th>
								<th>llamado -Nro</th>
       					        <th>orden</th>
								<th>Turno</th>
								<th>Comun</th>
								<th>Accion</th>
    							</tr>
						</thead>
						<tbody>';

						$resultado = ExamenesC::VerExamenesllaC();
						
						foreach ($resultado as $key => $value) {
   					    
   					         echo '<tr>';
   					        
   					         if ($value["estado"]==1){
   					             
   					           //if ($ajuste["exa_estado"]==1) {
   					           
   					           if ($value["hora"]<>"Tarde"){
   					         
   					                    echo '<td style="color:#00aaff">'.$value["id"].'</td>
   					         
   					                    <td style="color:#00aaff">'.$value["nombre"].'</td>
   					         
   					                    <td style="color:#00aaff">'.$value["orden_dia"].'</td>';
   					         
   					             } else {

   					                    echo '<td>'.$value["id"].'</td>
   					         
   					                    <td>'.$value["nombre"].'</td>
   					         
   					                     <td>'.$value["orden_dia"].'</td>';
             	             
   					           }
             	             
             	               $columna = "id";

                               $valor = $value["id_materia"];
    					    
    					       $materias = MateriasC::VerMaterias1C($columna, $valor);

   					          if ($value["hora"]<>"Tarde"){
   					              
   					                echo '<td style="color:#00aaff">'.$materias["grado"].'</td>';

   					                echo '<td style="color:#00aaff">'.$value["fecha"].'</td>
   					         
   					                <td style="color:#00aaff">'.$value["profesor"].'</td>
   					         
   					                <td style="color:#00aaff">'.$value["id_comision"].'</td>
   					         
   					                <td style="color:#00aaff">'.$value["llamado"].'-'.$value["nro_llamado"].'</td>
   					         
   					                <td style="color:#00aaff">'.$value["orden"].'</td>';

    			                    echo '<td style="color:#00aaff">M</td>';
   	
   					                if ($value["comun"]==1){
   					         
   					                    echo '<td style="color:#00aaff">Si</td>';

   					                }else {
   					             
   					                    if ($value["id_carrera"]==8){     
   					             
   					                        echo '<td>Inte ('.$value["id_materia"].')</td>';
   					         
   					                    } else if ($value["id_carrera"]==6){
   					             
   					                        echo '<td style="color:#00aaff">Neuro ('.$value["id_materia"].')</td>';    
   					         
   					                    }else if ($value["id_carrera"]==7){
   					         
   					                            echo '<td>Sordo ('.$value["id_materia"].')</td>';
   					         
   					                    }else if ($value["id_carrera"]==9){
   					             
   					                    echo '<td style="color:#00aaff">Ciego ('.$value["id_materia"].')</td>';    
   					                    }   
   					         
   					               }   					            

   					        }else{
   					            
   					            echo '<td>'.$materias["grado"].'</td>';

   					            echo '<td>'.$value["fecha"].'</td>
   					         
   					            <td>'.$value["profesor"].'</td>
   					         
   					            <td>'.$value["id_comision"].'</td>
   					         
   					            <td>'.$value["llamado"].'-'.$value["nro_llamado"].'</td>
   					         
   					            <td>'.$value["orden"].'</td>';

   					            echo '<td>T</td>';
   					        
   					            if ($value["comun"]==1){
   					         
   					                echo '<td>Si</td>';

   					            }else { 
   					             
   					                if ($value["id_carrera"]==8){     
   					             
   					                    echo '<td>Inte ('.$value["id_materia"].')</td>';
   					         
   					                    } else if ($value["id_carrera"]==6){
   					             
   					                        echo '<td>Neuro ('.$value["id_materia"].')</td>';    
   					         
   					                    }else if ($value["id_carrera"]==7){
   					         
   					                        echo '<td>Sordo ('.$value["id_materia"].')</td>';
   					         
   					                    }else if ($value["id_carrera"]==9){
   					             
   					                        echo '<td>Ciego ('.$value["id_materia"].')</td>';    
   					                    }   
   					         
   					             }

   					         }
   					         
   					         echo '<td><a href="http://localhost/tobar2/Editar-Examen/'.$value["id"].'">

                            <button class="btn btn-success">Modificar</button></a>';
   					         
   					         }else{
   					         
   					            if ($ajuste["exa_estado"]==1) {

   					                echo '<td class="bg-info">'.$value["id"].'</td>
   					         
   					                <td class="bg-info">'.$value["nombre"].'</td>
   					         
   					                <td class="bg-info">'.$value["orden_dia"].'</td>';

            	                    $columna = "id";

                                    $valor = $value["id_materia"];
    					    
    					            $materias = MateriasC::VerMaterias1C($columna, $valor);

				                    echo '<td class="bg-info">'.$materias["grado"].'</td>';

   					                echo '<td class="bg-info">'.$value["fecha"].'</td>';
   					         
   					                echo '<td class="bg-info">'.$value["profesor"].'</td>
   					         
   					                <td class="bg-info">'.$value["id_comision"].'</td>
   					         
   					                <td class="bg-info">'.$value["llamado"].'-'.$value["nro_llamado"].'</td>
   					         
   					                <td class="bg-info">'.$value["orden"].'</td>';
   					         
   					                 if ($value["hora"]=="Ma���ana"){
   					            
   					                    echo '<td style="color:#ff0000">'.$value["hora"].'</td>';
   					            
   					                    }else{
   					            
   					                    echo '<td class="bg-info">'.$value["hora"].'</td>';
   					                 } 
   					         
   					                if ($value["comun"]==1){
   					         
   					                    echo '<td class="bg-info">Si</td>';

   					                }else {
   					             
   					                    if ($value["id_carrera"]==8){     
   					             
   					                        echo '<td class="bg-info">Inte ('.$value["id_materia"].')</td>';
   					         
   					                        } else if ($value["id_carrera"]==6){
   					             
   					                            echo '<td  class="bg-info">Neuro ('.$value["id_materia"].')</td>';    
   					         
   					                        }else if ($value["id_carrera"]==7){
   					         
   					                            echo '<td class="bg-info">Sordo ('.$value["id_materia"].')</td>';
   					         
   					                        }else if ($value["id_carrera"]==9){
   					             
   					                            echo '<td class="bg-info">Ciego ('.$value["id_materia"].')</td>';    
   					                        }     
   					         
   					                }    
   					         
   					        echo '<td><a href="http://localhost/tobar2/Editar-Examen/'.$value["id"].'">

                            <button class="btn btn-success">Modificar</button></a>';
   					         
   					         
   					         } 
   					         }
   					         
   					         //}

   					         

						echo '</tr>';
   					        
   					    }

						echo '</tbody>
						
					</table>';
					
				}else{

				}

				?>

			</div>

		</div>

	</section>

</div>

<div class="modal fade" id="VT">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Ver Todo los Examenes?</h2>
							<input type="hidden" name="Exa_e" value="1">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$VTM = new AjustesC();
				$VTM -> VTMC();
				?>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="VA">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Ver Solo Examenes Activos?</h2>
							<input type="hidden" name="Exa_a" value="0">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$VAM = new AjustesC();
				$VAM -> VAMC();
				?>
			</form>
		</div>
	</div>
</div>


				<?php
//				$DEX = new ExamenesC();
//				$DEX -> DEC();
				?>				
				
				
