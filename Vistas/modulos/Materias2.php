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

<div class="container-fluid">
	
	<section class="content-header">
	
		<?php
	
		/// exp 1 --> id_carrera
		/// exp 2 --> id_alumno

		$exp = explode("/", $_GET["url"]);

		$columna = "id";
		$valor = isset($exp[1]) ? $exp[1] : null;
		
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);
		
		$columna = "id";
		$valor = isset($exp[2]) ? $exp[2] : null;

		$estudiante = UsuariosC::VerUsuariosC($columna, $valor);

		$columna = "id";
        $valor = 1;
        $ajustes = AjustesC::VerAjustesC($columna, $valor);

		$carrName = isset($carrera["nombre"]) ? $carrera["nombre"] : "Carrera #".htmlspecialchars($exp[1]);

		echo '<h3>Materias de la Carrera: '.htmlspecialchars($carrName).'</h3><br/>';
		
		if (!empty($estudiante) && is_array($estudiante)) {
			$estuId = isset($estudiante["id"]) ? $estudiante["id"] : '';
			$estuApellido = isset($estudiante["apellido"]) ? $estudiante["apellido"] : '';
			$estuNombre = isset($estudiante["nombre"]) ? $estudiante["nombre"] : '';
			$estuLibreta = isset($estudiante["libreta"]) ? $estudiante["libreta"] : '';
		} else {
			$estuId = $estuApellido = $estuNombre = $estuLibreta = '';
		}

		echo '<h3>Alumno/a ('.htmlspecialchars($estuId).') : '.htmlspecialchars($estuApellido).' '.htmlspecialchars($estuNombre).' - Libreta: '.htmlspecialchars($estuLibreta).'</h3><br>';
		echo '<input type="button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick="history.back()"><br><br>';
		?>

	</section>
	
	<section class="content">
	
		<div class="box">
	
			<div class="box-body">
	
				<?php
					// Helper: normalizar resultado de modelo a array de filas
					function _normalizarFilas($res) {
						if (empty($res)) return [];
						if (!is_array($res)) return [];
						// si tiene claves numéricas -> ya es listado
						foreach (array_keys($res) as $k) {
							if (is_int($k)) return $res;
						}
						// es un assoc single-row -> envolver
						return [$res];
					}

					// Helper: obtener notas del alumno según id_carrera (compatibilidad con las funciones del proyecto)
					function obtenerNotasAlumno($id_alumno, $id_carrera) {
						$col = "id_alumno";
						$val = $id_alumno;
						$res = [];

						if (!class_exists('MateriasC')) return [];

						// Intentar funciones en orden conocido (evitar errores si no existen)
						if ($id_carrera == 8 && method_exists('MateriasC','VerNotasiC')) {
							$res = MateriasC::VerNotasiC($col, $val);
						} elseif ($id_carrera == 6 && method_exists('MateriasC','VerNotasnC')) {
							$res = MateriasC::VerNotasnC($col, $val);
						} elseif ($id_carrera == 7 && method_exists('MateriasC','VerNotassC')) {
							$res = MateriasC::VerNotassC($col, $val);
						} elseif ($id_carrera == 9 && method_exists('MateriasC','VerNotascC')) {
							$res = MateriasC::VerNotascC($col, $val);
						} else {
							// Si no hay funciones específicas, intentar genérica (si existe)
							if (method_exists('MateriasC','VerNotasC')) {
								$res = MateriasC::VerNotasC($col, $val);
							}
						}

						return _normalizarFilas($res);
					}

					// traer materias de la carrera
					$columna = "id_carrera";
					$valor = isset($exp[1]) ? $exp[1] : null;
					$notas = MateriasC::VerMaterias3C($columna, $valor);
					$notas = _normalizarFilas($notas);

					echo '<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Id</th>
									<th>Nombre</th>
									<th>Año</th>
									<th>Tipo</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>';

					if (!empty($notas) && is_array($notas)) {
						foreach ($notas as $N) {
							// proteger índices
							$Nid = isset($N["id"]) ? $N["id"] : '';
							$Ncodigo = isset($N["codigo"]) ? $N["codigo"] : '';
							$Nnom_abrevi = isset($N["nom_abrevi"]) ? $N["nom_abrevi"] : '';
							$Ngrado = isset($N["grado"]) ? $N["grado"] : '';
							$Ntipo = isset($N["tipo"]) ? $N["tipo"] : '';

							// decide si se muestra por cuatrimestre/otro (mantengo la lógica original pero no la forzo)
							$mostrar = true;
							if (isset($ajustes["cuatrimestre"]) && $ajustes["cuatrimestre"] == "2do Cuatrimestre") {
								// si necesitás filtrar por tipo, colocá la lógica aquí; por ahora la dejamos pasar.
							}

							if (!$mostrar) continue;

							// obtener notas del alumno para esta carrera
							$id_alumno = isset($exp[2]) ? $exp[2] : null;
							$notas1 = [];
							$notas2 = [];
							if ($id_alumno) {
								$notas1 = obtenerNotasAlumno($id_alumno, (int)$exp[1]);
								// notas2 se usa cuando se evalúa condiciones de correlativas; obtener igual
								$notas2 = $notas1;
							}

							// verificar si el alumno tiene registro en notas que coincida con la materia actual
							$regu = 0;
							$estado = "";
							$estadof = "";

							if (!empty($notas1) && is_array($notas1)) {
								foreach ($notas1 as $N1) {
									if (isset($N1["id_materia"]) && $N1["id_materia"] == $Nid) {
										$estTmp = isset($N1["estado"]) ? $N1["estado"] : '';
										$estfTmp = isset($N1["estado_final"]) ? $N1["estado_final"] : '';

										if (in_array($estTmp, ["Regular","Equivalencia","Promo Directa","Promo Indirecta","Libre"])) {
											$regu = 1;
											$estado = $estTmp;
											$estadof = $estfTmp;
										} else {
											$regu = 0;
										}
									}
								}
							}

							// Si se encontró que está regular (o promo, etc.) dibujar estado y continuar
							echo '<tr>
									  <td style="color: black;">'.htmlspecialchars($Ncodigo).'</td>
									  <td style="color: black;">'.htmlspecialchars($Nid).'</td>
									  <td style="color: black;">'.htmlspecialchars($Nnom_abrevi).'</td>
									  <td style="color: black;">'.htmlspecialchars($Ngrado).'</td>
									  <td style="color: black;">'.htmlspecialchars($Ntipo).'</td>';

							if ($regu == 1) {
								// mostrar estado coloreado
								if ($estado == "Promo Directa" || $estado == "Promo Indirecta") {
									echo '<td class="bg-info" style="color: black;">'.htmlspecialchars($estado).' '.htmlspecialchars($estadof).'</td>';
								} elseif ($estado == "Regular" || $estado == "Libre") {
									echo '<td class="bg-success" style="color: black;">'.htmlspecialchars($estado).'/'.htmlspecialchars($estadof).'</td>';
								} elseif ($estado == "Equivalencia") {
									echo '<td class="bg-warning" style="color: black;">'.htmlspecialchars($estado).' '.htmlspecialchars($estadof).'</td>';
								} else {
									echo '<td class="bg-danger" style="color: black;">'.htmlspecialchars($estado).' '.htmlspecialchars($estadof).'</td>';
								}
							} else {
								// Cuando no hay nota directa, evaluar correlativas (usando notas2)
								// Inicializar variables de correlativas (rc1..rc6, ac1..ac4)
								$rc1=$rc2=$rc3=$rc4=$rc5=$rc6 = 0;
								$ac1=$ac2=$ac3=$ac4 = 0;
								$vacio = 0;

								if (!empty($notas2) && is_array($notas2)) {
									$vacio = 1;
									foreach ($notas2 as $N2) {
										// comparamos id_materia y estados
										$idmatN2 = isset($N2["id_materia"]) ? $N2["id_materia"] : null;
										$estadoN2 = isset($N2["estado"]) ? $N2["estado"] : '';
										$estadofN2 = isset($N2["estado_final"]) ? $N2["estado_final"] : '';

										// rc1..rc6 checks
										if ($N["rc1"] == 0) { $rc1 = 1; }
										elseif ($idmatN2 == $N["rc1"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc1 = 1;

										if ($N["rc2"] == 0) { $rc2 = 1; }
										elseif ($idmatN2 == $N["rc2"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc2 = 1;

										if ($N["rc3"] == 0) { $rc3 = 1; }
										elseif ($idmatN2 == $N["rc3"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc3 = 1;

										if ($N["rc4"] == 0) { $rc4 = 1; }
										elseif ($idmatN2 == $N["rc4"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc4 = 1;

										if ($N["rc5"] == 0) { $rc5 = 1; }
										elseif ($idmatN2 == $N["rc5"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc5 = 1;

										if ($N["rc6"] == 0) { $rc6 = 1; }
										elseif ($idmatN2 == $N["rc6"] && in_array($estadoN2, ["Regular","Equivalencia","Promo Directa","Promo Indirecta"])) $rc6 = 1;

										// ac1..ac4 checks (estado_final == Aprobado or equivalencia/promo)
										if ($N["ac1"] == 0) { $ac1 = 1; }
										elseif ($idmatN2 == $N["ac1"] && in_array($estadofN2, ["Aprobado"]) || in_array($estadoN2, ["Equivalencia","Promo Directa","Promo Indirecta"])) $ac1 = 1;

										if ($N["ac2"] == 0) { $ac2 = 1; }
										elseif ($idmatN2 == $N["ac2"] && in_array($estadofN2, ["Aprobado"]) || in_array($estadoN2, ["Equivalencia","Promo Directa","Promo Indirecta"])) $ac2 = 1;

										if ($N["ac3"] == 0) { $ac3 = 1; }
										elseif ($idmatN2 == $N["ac3"] && in_array($estadofN2, ["Aprobado"]) || in_array($estadoN2, ["Equivalencia","Promo Directa","Promo Indirecta"])) $ac3 = 1;

										if ($N["ac4"] == 0) { $ac4 = 1; }
										elseif ($idmatN2 == $N["ac4"] && in_array($estadofN2, ["Aprobado"]) || in_array($estadoN2, ["Equivalencia","Promo Directa","Promo Indirecta"])) $ac4 = 1;
									}
								} else {
									// si no hay notas2, considerar rc/ac que sean 0 como cumplidos
									$rc1 = ($N["rc1"]==0) ? 1 : 0;
									$rc2 = ($N["rc2"]==0) ? 1 : 0;
									$rc3 = ($N["rc3"]==0) ? 1 : 0;
									$rc4 = ($N["rc4"]==0) ? 1 : 0;
									$rc5 = ($N["rc5"]==0) ? 1 : 0;
									$rc6 = ($N["rc6"]==0) ? 1 : 0;
									$ac1 = ($N["ac1"]==0) ? 1 : 0;
									$ac2 = ($N["ac2"]==0) ? 1 : 0;
									$ac3 = ($N["ac3"]==0) ? 1 : 0;
									$ac4 = ($N["ac4"]==0) ? 1 : 0;
								}

								// determinar si cumple todas las correlativas y los ac
								$sipuede = ($rc1 && $rc2 && $rc3 && $rc4 && $rc5 && $rc6 && $ac1 && $ac2 && $ac3 && $ac4) ? 1 : 0;

								if ($sipuede == 1) {
									// si puede cursarla, ver si está inscripto
									$inscripto = 0;
									$columna = "id_materia";
									$valor = $Nid;
									$ins = MateriasC::VerInscMateriasC($columna, $valor);
									$ins = _normalizarFilas($ins);
									$comi = null;

									if (!empty($ins) && is_array($ins)) {
										foreach ($ins as $ma) {
											if (isset($ma["id_materia"]) && $ma["id_materia"] == $Nid && isset($ma["id_alumno"]) && $ma["id_alumno"] == $id_alumno) {
												$inscripto = 1;
												$comi = isset($ma["id_comision"]) ? $ma["id_comision"] : null;
												break;
											}
										}
									}

									if ($inscripto == 1) {
										// obtener datos de la comisión / profe (si existen)
										$comision = [];
										$profe = [];
										if ($comi && method_exists('MateriasC','VerComisiones2C')) {
											$comision = MateriasC::VerComisiones2C("id", $comi);
											if (!empty($comision) && isset($comision["id_usuario"])) {
												$profe = UsuariosC::VerUsuariosC("id", $comision["id_usuario"]);
											}
										}
										$turnoTxt = isset($comision["turno"]) ? $comision["turno"] : '';
										$profeTxt = (isset($profe["apellido"]) ? $profe["apellido"] : '') . ' ' . (isset($profe["nombre"]) ? $profe["nombre"] : '');

										echo '<td class="bg-info" style="color: black;">comision ('.htmlspecialchars($comi).') Turno:('.htmlspecialchars($turnoTxt).') Profe:('.htmlspecialchars($profeTxt).')</td>';
										echo '<td><a href="http://localhost/tobar2/inscripto-M2/'.htmlspecialchars($exp[1]).'/'.htmlspecialchars($Nid).'/'.htmlspecialchars($exp[2]).'"><button class="btn btn-danger">Borrar Incripción</button></a></td>';
									} else {
										echo '<td><a href="http://localhost/tobar2/insc-materia2/'.htmlspecialchars($exp[1]).'/'.htmlspecialchars($Nid).'/'.htmlspecialchars($exp[2]).'"><button class="btn btn-primary">Ver Detalle</button></a></td>';
									}
								} else {
									// no puede cursarla: mostrar qué correlativas faltan (o código bruto)
									$std = $rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
									echo '<td>'.htmlspecialchars($std).'</td>';
								}
							} // fin else regu==0

							echo '</tr>';
						} // fin foreach materias
					} else {
						echo '<tr><td colspan="6">No hay materias cargadas para esta carrera.</td></tr>';
					}

					echo '</tbody></table>';
				?>
			</div>
		</div>
	</section>
</div>
