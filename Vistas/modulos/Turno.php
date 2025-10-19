
<div class="container">
  <section class="content-header">
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
	<div class="row">
		<div class="col-lg-12">
				<?php
				
				if($_SESSION["rol"] == "Administrador"){
			echo '&nbsp;&nbsp;&nbsp;'; 
            
         	echo '<a href="http://localhost/tobar2/Ver-llamado">
			<button class="btn btn-primary btn-lg">Llamados</button>
			</a><br/><br/>';
				}

      	if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){
					echo '
					<div class="table-responsive">
					<table  id="turnos"class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							    
							    <th>id</th>
								<th>Turno</th>
								<th>Anio</th>
								<th>F_Inicio</th>
								<th>F_Fin</th>
								<th>Llamado</th>';
									if($_SESSION["rol"] == "Administrador"){
								
								echo '<th>Accion</th>
								';
									}

						echo '
    							</tr>
						</thead>
						<tbody>';

						$resultado = ExamenesC::VerTurnoC();

   					    foreach ($resultado as $key => $value) {
   					        	echo '<tr>';
   					        
   					         if ($value["estado"]==1){
   					             

   					         echo '<td class="bg-info">'.$value["id"].'</td>
   					         
   					         <td class="bg-info">'.$value["turno"].'</td>
   					         <td class="bg-info">'.$value["anio"].'</td>
   					         <td class="bg-info">'.$value["fecha_desde"].'</td>
   					         
   					         <td class="bg-info">'.$value["fecha_hasta"].'</td>
   					         <td class="bg-info">'.$value["llamado"].'</td>';
   
   					         }else{
   					         
   					         echo '<td>'.$value["id"].'</td>
   					         
   					         <td>'.$value["turno"].'</td>
   					         <td>'.$value["anio"].'</td>
   					         <td>'.$value["fecha_desde"].'</td>
   					         
   					         <td>'.$value["fecha_hasta"].'</td>
   					         <td>'.$value["llamado"].'</td>';
   					         
   					         }

                           	if($_SESSION["rol"] == "Administrador"){
							echo '<td><a href="http://localhost/tobar2/Editar-Turno/'.$value["id"].'">

                            <button class="btn btn-success">Modificar</button></a>';
                           	}

						echo '</tr>';
   					        
   					    }
						
						
						echo '</tbody>
						
					</table>
					</div>';
					
				}else{

				}

				?>

			</div>

		</div>

	</section>

</div>



				
