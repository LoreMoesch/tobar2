<?php
if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
		if($_SESSION["rol"] != "Secretario"){
			if($_SESSION["rol"] != "Director"){
	    echo '<script>
	    window.location = "inicio";
	    </script>';
	    return;
			}
		}
    }    
}
?>
<div class="container">
	<section class="container-header">
		<h1>Usuarios Estudiantes</h1>
        <?php
		$columna = null;
		$valor = null;
		$resultado = UsuariosC::VerUsuariosEC($columna, $valor);
		?> 
	</section>
	<div class="row">
		<div class="col-lg-12">
			<!-- ✅ CORREGIDO: Botón de crear ahora visible -->
			<div class="box-header">
				<button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>
 			</div>
			<div class="table-responsive">
				<table id="estudiantes2" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
                            <th>Id</th>
                            <th>Libreta</th>
                         	<th>Apellido</th>
							<th>Nombres</th>
							<th>Carrera</th>
							<th>Dni</th>
							<th>Clave</th>
							<th>Cohorte</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($resultado){
								foreach ($resultado as $key => $value) {
								
										echo '<tr>
										<td>'.$value["id"].'</td>
										<td>'.$value["libreta"].'</td>
										<td>'.$value["apellido"].'</td>
										<td>'.$value["nombre"].'</td>';
										$columnaC = "id";
										$valorC = $value["id_carrera"];
										$carrera = CarrerasC::CarreraC($columnaC, $valorC);
										echo '<td>'.($carrera ? $carrera["nombre"] : 'N/A').'</td>';
										echo '<td>'.$value["dni"].'</td>
										<td>'.$value["clave"].'</td>
										<td>'.$value["cohorte"].'</td>
										<td>
											<a href="Editar-Alu/'.$value["id"].'">
												<button class="btn btn-sm btn-warning">Editar</button>
											</a>
										</td>
										</tr>';
					        	}
							}
         				?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="CrearUsuario">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>Apellido:</h2>
							<input class="form-control input-lg" type="text" name="apellidoU" required>
						</div>
						<div class="form-group">
							<h2>Nombre:</h2>
							<input class="form-control input-lg" type="text" name="nombreU" required>
						</div>
						<div class="form-group">
							<h2>Dni/libreta (sin puntos):</h2>
							<input class="form-control input-lg" type="text" id="libreta" name="usuarioU" required>
						</div>
						<div class="form-group">
							<h2>Contraseña:</h2>
							<input class="form-control input-lg" type="text" name="claveU" required>
						</div>
						<div class="form-group">
							<h2>Seleccionar Carrera:</h2>
							<select class="form-control input-lg" name="carreraU">
								<option value="1">Seleccionar Carrera...</option>
								<?php
								$carreras = CarrerasC::VerCarrerasC();
								foreach ($carreras as $key => $value) {
									echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<h2>Seleccionar Rol:</h2>
								<?php
								echo '
								
								<select class="form-control input-lg" name="rolU" required>

								<option>Seleccionar Rol...</option>
								
								<option value="Administrador">Administrador</option>
								
								<option value="Estudiante">Estudiante</option>
								
								<option value="Docente">Docente</option>
                                
                                <option value="Bedel">Bedel</option>
                                
                                <option value="Secretario">Secretario</option>
                                
                                <option value="Director">Director</option>
                      
							    </select> ';
   
								?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
				</div>
				<?php
				// ✅ CORREGIDO: Descomentado para que funcione
				$crearU = new UsuariosC();
				$crearU -> CrearUsuarioC();
				?>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="EditarUsuario">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>Apellido:</h2>
							<input class="form-control input-lg" type="text" id="apellidoEU" name="apellidoEU" required>
							<input class="form-control input-lg" type="hidden" id="Uid" name="Uid" required>
						</div>
						<div class="form-group">
							<h2>Nombre:</h2>
							<input class="form-control input-lg" type="text" id="nombreEU" name="nombreEU" required>
						</div>
						<div class="form-group">
							<h2>Dni/Libreta (sin puntos):</h2>
							<input class="form-control input-lg" type="text" id="usuarioEU" name="usuarioEU" required>
						</div>
						<div class="form-group">
							<h2>Contraseña:</h2>
							<input class="form-control input-lg" type="text" id="claveEU" name="claveEU" required>
						</div>
						<div class="form-group" id="carrera">
							<h2>Seleccionar Carrera:</h2>
							<select class="form-control input-lg" name="carreraEU">
								<option id="carrera"></option>
								<?php
								$carreras = CarrerasC::VerCarrerasC();
								foreach ($carreras as $key => $value) {
									echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
								}
								?>
							</select>
						</div>
          				<div class="form-group">
							<h2 id="estadoActual"></h2>
							<h2>Seleccionar nuevo Estado:</h2>
								<?php
    								echo '
    								<select class="form-control input-lg" name="estadoEU" required>
    								<option>Seleccionar Estado...</option>
    								<option value="Regular">Regular</option>
    								<option value="Egresado">Egresado</option>
    								<option value="Condicional">Condicional</option>
                                    <option value="Abandono">Abandono</option>
    							    </select> ';
								?>
						</div>
						<div class="form-group">
							<h2 id="rolActual"></h2>
							<h2>Seleccionar nuevo Rol:</h2>
								<?php
								if ($_SESSION["rol"] == "Administrador"){
    								echo '
    								<select class="form-control input-lg" name="rolEU" required>
    								<option>Seleccionar Rol...</option>
    								<option value="Administrador">Administrador</option>
    								<option value="Estudiante">Estudiante</option>
    								<option value="Docente">Docente</option>
                                    <option value="Bedel">Bedel</option>
                                    <option value="Secretario">Secretario</option>
                                    <option value="Director">Director</option>
    							    </select> ';
								}else {
    								echo '
    					    		<select class="form-control input-lg" name="rolEU" required>
    								<option>Seleccionar Rol...</option>
    								<option value="Estudiante">Estudiante</option>
    							    </select> ';
								}    
								?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Guardar Cambios</button>
                	<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
				</div>
				<?php
				$actualizarU = new UsuariosC();
				$actualizarU -> ActualizarUsuariosC();
				?>
			</form>
		</div>
	</div>
</div>
<?php

$eliminarU = new UsuariosC();
$eliminarU -> EliminarUsuariosC();

?>