<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
    	echo '<script>
    	window.location = "http://localhost/tobar2/inicio";
    	</script>';
    	return;
    }
}

?>

<div class="container">

	<section class="content-header">

		<?php
		// Obtener id_carrera: desde URL si viene, sino desde sesión (fallback)
		$exp = explode("/", $_GET["url"]);
		$id_carrera = (isset($exp[1]) && is_numeric($exp[1])) ? (int)$exp[1] : (isset($_SESSION["id_carrera"]) ? (int)$_SESSION["id_carrera"] : null);

		if (!$id_carrera) {
			echo '<h3>Estudiantes: No se especificó carrera.</h3>';
		} else {
			$columnaC = "id";
			$valorC = $id_carrera;
			$carrera = CarrerasC::CarreraC($columnaC, $valorC);

			// Obtener todos los usuarios (tal como hacía el original)
			$resultadou = UsuariosC::VerUsuariosC(null, null);

			// Contar estudiantes de la carrera
			$cant = 0;
			if (!empty($resultadou) && is_array($resultadou)) {
				foreach ($resultadou as $u) {
					if (isset($u["id_carrera"]) && $u["id_carrera"] == $id_carrera && isset($u["rol"]) && $u["rol"] == "Estudiante") {
						$cant++;
					}
				}
			}

			$nombreCarrera = isset($carrera["nombre"]) ? $carrera["nombre"] : "Carrera #".$id_carrera;
			echo '<h3>Estudiantes de: '.htmlspecialchars($nombreCarrera).'('.$cant.')</h3>';
		}
		?>

	</section>

	<div class="row">

		<div class="col-lg-12">

			<div class="table-responsive">

				<table id="estudiantes" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th>Nro</th>
							<th>Id</th>
							<th>Libreta</th>
							<th>Apellido y Nombre</th>
							<th>DNI</th>
							<th>Cohorte</th>
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>
						<?php
						if (!$id_carrera) {
							echo "<tr><td colspan='8'>No se puede mostrar sin id de carrera.</td></tr>";
						} else {
							// Traer usuarios (como antes)
							$resultado = UsuariosC::VerUsuariosC(null, null);

							$can = 0;

							if (!empty($resultado) && is_array($resultado)) {
								foreach ($resultado as $value) {

									// filtrar por carrera y por rol Estudiante
									if ((isset($value["id_carrera"]) && $value["id_carrera"] == $id_carrera) && (isset($value["rol"]) && strtolower($value["rol"]) == "estudiante")) {

										$can++;
										echo '<tr>
											<td>'. $can .'</td>
											<td>'. htmlspecialchars($value["id"]) .'</td>
											<td>'. htmlspecialchars($value["libreta"]) .'</td>
											<td>'. htmlspecialchars($value["apellido"]) .' '. htmlspecialchars($value["nombre"]) .'</td>
											<td>'. htmlspecialchars($value["dni"]) .'</td>';

										// Preparar para verificar si tiene cursadas/notas (activo)
										$columna = "id_alumno";
										$valor = $value["id"];

										// Intentamos obtener "notas" usando las funciones originales solo si existen.
										// Pero no asumimos tipo de retorno: puede ser array, asociativo, string o null.
										$notaalu = null;

										// Si el código original tenía ramas según id de carrera (6,7,8,9), las omitimos:
										// llamamos a una función genérica si existe. Si no existe, seguimos sin error.
										if (method_exists('MateriasC','VerNotasGenAC')) {
											// Si en su código existe un método genérico que devuelva notas (no garantizado)
											$notaalu = MateriasC::VerNotasGenAC($columna, $valor);
										} else {
											// Intentamos varias funciones conocidas (compatibilidad hacia atrás)
											if (method_exists('MateriasC','VerNotasnAC')) {
												$notaalu = @MateriasC::VerNotasnAC($columna, $valor);
											} elseif (method_exists('MateriasC','VerNotassAC')) {
												$notaalu = @MateriasC::VerNotassAC($columna, $valor);
											} elseif (method_exists('MateriasC','VerNotasiAC')) {
												$notaalu = @MateriasC::VerNotasiAC($columna, $valor);
											} elseif (method_exists('MateriasC','VerNotascAC')) {
												$notaalu = @MateriasC::VerNotascAC($columna, $valor);
											} else {
												$notaalu = null;
											}
										}

										// NORMALIZAR contador de "notas" (ii)
										$ii = 0;
										if ($notaalu !== null && $notaalu !== '') {
											// Si es array (puede ser array de rows, o un assoc array single row)
											if (is_array($notaalu)) {
												// distinguir array-list (rows) de array-assoc (single row)
												$isList = false;
												foreach (array_keys($notaalu) as $k) {
													if (is_int($k)) { $isList = true; break; }
												}
												$ii = $isList ? count($notaalu) : 1;
											} else {
												// si vino string/num, consideramos 1 registro encontrado
												$ii = 1;
											}
										} else {
											$ii = 0;
										}

										echo '<td>'. htmlspecialchars($value["cohorte"]) .'</td>';

										// Lógica Activo: si tiene al menos una nota/inscripción -> Sí
										if ($ii == 0) {
											// adicional: chequeo insc_materias o insc_examenes directamente con modelos si existen
											$insc_count = 0;
											if (method_exists('MateriasC','ContarInscMateriasAlumno')) {
												$insc_count = (int) MateriasC::ContarInscMateriasAlumno($value["id"]);
											} elseif (method_exists('UsuariosC','ContarInscMaterias')) {
												$insc_count = (int) UsuariosC::ContarInscMaterias($value["id"]);
											}
											if ($insc_count > 0) {
												echo '<td>Sí</td>';
											} else {
												echo '<td>No</td>';
											}
										} else {
											echo '<td>Sí</td>';
										}

										// Acciones
										$id_carr = $value["id_carrera"];
										$libreta = $value["libreta"];
										$id_al = $value["id"];

										echo '
										  <td>
											<a href="http://localhost/tobar2/Ver-Plan/'.$id_carr.'/'.$libreta.'/'.$id_al.'">
												<button class="btn btn-primary">Plan de Estudios</button>
											</a>
											<a href="http://localhost/tobar2/Materias2/'.$id_carr.'/'.$id_al.'">
												<button class="btn btn-success">Cursadas</button>
											</a>
											<a href="#">
												<button class="btn btn-warning">Examen</button>
											</a>
											<a href="http://localhost/tobar2/Editar-Alu/'.$id_al.'/'.$id_carrera.'">
												<button class="btn btn-danger">Info Personal</button>
											</a>
										  </td>
										</tr>';

									} // fin if filtro por carrera
								} // fin foreach usuarios
							} else {
								echo "<tr><td colspan='8'>No hay estudiantes registrados.</td></tr>";
							} // fin else resultado no vacío
						} // fin else id_carrera ok
						?>
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>
