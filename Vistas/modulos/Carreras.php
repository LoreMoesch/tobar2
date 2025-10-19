<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
	    echo '<script>
	    window.location = "inicio";
	    </script>';
	    return;
    }    
}
?>
<div class="container-fluid">
	<section class="container-header">
		<h4 style="color:rgb(0, 0, 0)">Gestor de Carreras y Planes de Estudio </h4>
	</section>
	<section class="container-fluid">
		<div class="box">
			<div class="box-body">
			    <?php
			    // Crear carrera deshabilitado - Las carreras se gestionan directamente en MySQL
			    // if($_SESSION["rol"] == "Administrador"){
			    //  echo '
				// <form method="post">
				// 	<div class="col-md-6 col-xs-12">
				// 		<input type="text" name="carrera" class="form-control" placeholder="Ingresar Nueva Carrera" required>
				// 	</div>
				// 	<button type="submit" class="btn btn-primary">Crear Carrera</button>
				// </form>';
			    // }
				// $crearCarrera = new CarrerasC();
				// $crearCarrera -> CrearCarreraC();
				?>
				<?php
				$columna = "id";
				$valor = 1;
				$resultado = AjustesC::VerAjustesC($columna, $valor);
				if($resultado["h_materias"] == 0){
					echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar Inscripciones a Materias</button>';

				}else{
					echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar Inscripciones a Materias</button>';
				}
				
				if($_SESSION["rol"] == "Administrador"){
				
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#VaciarRegistrosMaterias">Vaciar Registros de Inscripciones a las Materias</button>';
				
				}
                if($resultado["h_ccarrera"] == 0){
				
					echo '
					<br><br>
					<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HC">Habilitar Eleccion de Carrera</button>
					<br><br>';

				}else{
					echo '
					<br><br>
					<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DC">Deshabilitar Eleccion de Carrera</button>
					<br><br>';
				}
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
							<th>Acciones/Opciones</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$resultado = CarrerasC::VerCarrerasC();
						
						foreach ($resultado as $key => $value) {
						    
						    // ✅ CORREGIDO: Mostrar TODAS las carreras
						    // Quitamos el filtro restrictivo
						    
							echo '<tr>
									<td>'.$value["id"].'</td>
									<td>'.$value["nombre"].'</td>';
									
							// Contar estudiantes por cohorte
							$columna = "id_carrera";
					        $valor = $value["id"];
					        $usuarioa = UsuariosC::VerUsuarios2C($columna, $valor);
    					    
    					    $i2020=0;
    					    $i2021=0;
    					    $i2022=0;
    					    $i2023=0;
    					    $i2024=0;
    					    $i2025=0;
    					    $total=0;
    					    
    					    if($usuarioa){
        						foreach ($usuarioa as $key => $usua) {
        						   if ($usua["rol"]=="Estudiante") {
        						       $total++;
        						       
        						       switch($usua["cohorte"]){
        						           case '2020': $i2020++; break;
        						           case '2021': $i2021++; break;
        						           case '2022': $i2022++; break;
        						           case '2023': $i2023++; break;
        						           case '2024': $i2024++; break;
        						           case '2025': $i2025++; break;
        						       }
        						   }
        						}
    					    }

							echo '<td>'.$i2020.'</td>
							      <td>'.$i2021.'</td>
							      <td>'.$i2022.'</td>
							      <td>'.$i2023.'</td>
							      <td>'.$i2024.'</td>
							      <td>'.$i2025.'</td>';	 
									
							echo '<td>';
											
							if($_SESSION["rol"] == "Administrador"){
							
							echo '
							<a href="Editar-Carrera/'.$value["id"].'">
								<button class="btn btn-success btn-sm">Editar</button>
							</a> ';
							
							// Descomenta si quieres habilitar eliminar
							// echo '
							// <a href="Carreras/'.$value["id"].'">
							// 	<button class="btn btn-danger btn-sm">Borrar</button>
							// </a>';
							   
							}
							
							echo '
							<a href="Crear-Materias/'.$value["id"].'">
								<button class="btn btn-warning btn-sm">Materias</button>
							</a>
							<a href="Estudiantes/'.$value["id"].'">
								<button class="btn btn-primary btn-sm">Estudiantes</button>
							</a>
							</td>
							<td><b>'.$total.'</b></td>
						</tr>';
						    
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
				$HM = new AjustesC();
				$HM -> HMC();
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
				$HC = new AjustesC();
				$HC -> HCC();
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
				$DC = new AjustesC();
				$DC -> DCC();
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
				$vaciar = new MateriasC();
				$vaciar -> VaciarRegistrosMateriasC();
				?>
			</form>
		</div>
	</div>
</div>

<?php

// Borrar carrera - Deshabilitado temporalmente
// $borrarCarrera = new CarrerasC();
// $borrarCarrera -> BorrarCarrerasC();