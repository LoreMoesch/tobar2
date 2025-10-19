<?php

if($_SESSION["rol"] != "Administrador" ){

    if($_SESSION["rol"] != "Docente"){

     if($_SESSION["rol"] != "Secretario"){
       if($_SESSION["rol"] != "Director"){
	    echo '<script>

	    window.locations = "inicio";
	    </script>';

	    return;
	      }
        }
        
    }
    
}

?>

<div class="container">
	
	<section class="content-header">
	    
		<h1>Carreras y Planes de Estudio </h1>
	
	</section>
	<section class="content">
		<div class="box">
			<div class="box-header">
			    
			    <?php
			   
			   //if($_SESSION["rol"] == "Administrador"){
			    //echo '
				//<form method="post">
				//	<div class="col-md-6 col-xs-12">
				//		<input type="text" name="carrera" class="form-control" placeholder="Ingresar Nueva Carrera" required>
				//	</div>
				//	<button type="submit" class="btn btn-primary">Crear Carrera</button>
				//</form>';
			   //}
				
				$crearCarrera = new CarrerasC();
				$crearCarrera -> CrearCarreraC();
				?>
				<br>

				<?php
				//$columna = "id";
				//$valor = 1;
				//$resultado = AjustesC::VerAjustesC($columna, $valor);
				//if($resultado["h_materias"] == 0){
				//	echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar Inscripciones a Materias</button>';

				//}else{
				//	echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar Inscripciones a Materias</button>';
				//}
				
				
				//if($_SESSION["rol"] == "Administrador"){
				
				//cho '<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#VaciarRegistrosMaterias">Vaciar Registros de Inscripciones a las Materias</button>';
				
				//}
                //if($resultado["h_ccarrera"] == 0){
				
				//	echo '
				//	<br><br>
				//	<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HC">Habilitar Eleccion de Carrera</button>';

				//}else{
				//	echo '
				//	<br><br>
				//	<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DC">Deshabilitar Eleccion de Carrera</button>';
				//}
				
                
                ?>

			</div>
			<div class="box-body">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>2020</th>
							<th>2021</th>
							<th>2022</th>
							<th>2023</th>
							<th>2024</th>
							<th>2025</th>
							<th>Acciones</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$resultado = CarrerasC::VerCarrerasC();
						
						foreach ($resultado as $key => $value) {
						    	$i=0;
						
						if($value["id"] == 6 || $value["id"] == 7 ||$value["id"] == 8 ||$value["id"] == 9 ||$value["id"] == 10 ){
						
						
							echo '<tr>
									<td>'.$value["id"].'</td>
									<td>'.$value["nombre"].'</td>
								    ';
								$columna = "id_carrera";
						        $valor = $value["id"];

						        $usuarioa = UsuariosC::VerUsuarios2C($columna, $valor);

        					    $i=0;
        					
        					    $ii=0;
        					    
        					    $iii=0;
        					    
        					    $ie=0;
        					    
        					    $iee=0;
        					    
        					    $iea=0;
        					    
        					    $e=0;
        					
        						foreach ($usuarioa as $key => $usua) {
        						
        						   if ($usua["cohorte"]==2020 && $usua["rol"]=="Estudiante") {
        						
        						    $i++;
        						    $e++;
        						
        						   }
        						    
        						    if ($usua["cohorte"]==2021 && $usua["rol"]=="Estudiante") {
        						 
        						    $ii++;
        						    $e++;
        						
        						   }
        						   
                                    if ($usua["cohorte"]==2022 && $usua["rol"]=="Estudiante") {
        						 
        						    $iii++;
        						    $e++;
        						
        						   }
                                    if ($usua["cohorte"]==2023 && $usua["rol"]=="Estudiante") {
        						 
        						    $ie++;
        						    $e++;
        						
        						   }
        						   
        						   if ($usua["cohorte"]==2024 && $usua["rol"]=="Estudiante") {
        						 
        						    $iee++;
        						    $e++;
        						
        						   }
        						    if ($usua["cohorte"]==2025 && $usua["rol"]=="Estudiante") {
        						 
        						    $iea++;
        						    $e++;
        						
        						   }		
        						
        						    
        						}

						
									
							echo '	<td>'.$i.'</td>
							        <td>'.$ii.'</td>
							        <td>'.$iii.'</td>
							        <td>'.$ie.'</td>
							        <td>'.$iee.'</td>
							        <td>'.$iea.'</td>
							        ';	 
									
							echo '	<td>';
								echo '
									<a href="http://localhost/tobar2/Crear-Materias/'.$value["id"].'">
										<button class="btn btn-warning">Materias</button>
										</a>
										<a href="http://localhost/tobar2/estudiantess/'.$value["id"].'">
										<button class="btn btn-primary">Estudiantes</button>
										</a>
									</td>
									<td>'.$e.'</td>
									
									
								</tr>';
						
						    
						}    
						}
						?>
						
						
						
						
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


<div class="modal fade" id="HM">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Habilitar las Inscripciones a las Materias?</h2>
							<input type="hidden" name="h_materias" value="1">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				//$HM = new AjustesC();
				//$HM -> HMC();
				?>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="HC">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Habilitar Seleccion a Carrera?</h2>
							<input type="hidden" name="h_ccarrera" value="1">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				//$HC = new AjustesC();
				//$HC -> HCC();
				?>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="DM">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Deshabilitar las Inscripciones a las Materias?</h2>
							<input type="hidden" name="h_materias" value="0">
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

<div class="modal fade" id="DC">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Deshabilitar Eleccion de Carrera?</h2>
							<input type="hidden" name="h_ccarrera" value="0">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				//$DC = new AjustesC();
				//$DC -> DCC();
				?>				
				
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="VaciarRegistrosMaterias">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro que desea Eliminar todas las Inscripciones a las Materias?</h2>
							<input type="hidden" name="E" value="E">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				//$vaciar = new MateriasC();
				//$vaciar -> VaciarRegistrosMateriasC();
				?>
			</form>
		</div>
	</div>
</div>

<?php

//$borrarCarrera = new CarrerasC();
//$borrarCarrera -> BorrarCarrerasC();
