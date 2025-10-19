<?php

if($_SESSION["rol"] != "Administrador"){
	echo '<script>
	window.locations = "inicio";
	</script>';
	return;
}

?>
<div class="container">
	<section class="content">
		<div class="box">
			<div class="box-body">
				<h1>Reclamos</h1>
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<h2>Tickets:</h2>
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Nro</th>
									<th>Id</th>
									<th>Libreta</th>
									<th>Estudiante</th>
									<th>Reclamo</th>
									<th>Recl</th>
									<th>Estado</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$columna = null;
								$valor = null;
								$resultado = ReclamosC::VerReclamosC($columna, $valor);
								$cont=0;
								$cont1=0;
								foreach ($resultado as $key => $value) {
									echo '<tr>';
									$columna = "id";
									$valor = $value["id_alumno"];
									$alumno = UsuariosC::VerUsuariosC($columna, $valor);
									
									if ($_SESSION["id"]==1) {
										if ($value["activo"]==6 || $value["activo"]==9 || $value["activo"]==10){
									$cont=$cont+1;
									echo ' <td>'.($cont).'</td>
									<td>'.$alumno["id"].'</td>
									<td>'.$alumno["libreta"].'</td>
									<td>'.$alumno["apellido"].', '.$alumno["nombre"].'</td>
									<td>'.$value["reclamo"].'</td>
									<td>'.$value["activo"].'</td>
									<td>'.$value["estado"].'</td>';
									if($value["estado"] == "En proceso"){		
										echo '<td>
										<a href="http://localhost/tobar2/Vistas/modulos/Act-Reclamo/'.$value["id"].'">
										<button class="btn btn-success">Listo</button>
										</a>
										</td>';
									}else if($value["estado"] == "listo"){
										echo '<td>
										<a href="http://localhost/tobar2/Vistas/modulos/Borr-Reclamo/'.$value["id"].'">
										<button class="btn btn-danger">Borrar</button>
										</a>
										</td>';
									}
										}
									} else if ($_SESSION["id"]==59) {
										if ($value["activo"]==7 || $value["activo"]==8){
											$cont1=$cont1+1;
										echo ' <td>'.($cont1).'</td>
										<td>'.$alumno["id"].'</td>
											<td>'.$alumno["libreta"].'</td>
									<td>'.$alumno["apellido"].', '.$alumno["nombre"].'</td>
									<td>'.$value["reclamo"].'</td>
									<td>'.$value["activo"].'</td>
									<td>'.$value["estado"].'</td>';
									if($value["estado"] == "En proceso"){		
										echo '<td>
										<a href="http://localhost/tobar2/Vistas/modulos/Act-Reclamo/'.$value["id"].'">
										<button class="btn btn-success">Listo</button>
										</a>
										</td>';
									}else if($value["estado"] == "listo"){
										echo '<td>
										<a href="http://localhost/tobar2/Vistas/modulos/Borr-Reclamo/'.$value["id"].'">
										<button class="btn btn-danger">Borrar</button>
										</a>
										</td>';
									}
										}
									}

									echo '</tr>';
								}
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>