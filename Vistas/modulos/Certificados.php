<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Secretario"){
     if($_SESSION["rol"] != "Director"){


	echo '<script>

	window.locations = "inicio";
	</script>';

	return;
	  }
    }
}

?>


<div class="container-fluid">

	<section class="container">

		<div class="box">

			<div class="box-body">

				<h1>Certificados</h1>
                	<!-- <a href="https://sistema.isfdcarolinatobargarcia.edu.ar/ejemplo.php">
					<button class="btn btn-primary">Descargar PDF</button>
					</a> -->

				<div class="row">

					<div class="col-md-12 col-xs-12">

						<h2>Solicitudes:</h2>

						<table class="table table-bordered table-hover table-striped">

							<thead>
								<tr>
									<th>Nro</th>

									<th>Id</th>

									<th>Estudiante</th>

									<th>A&ntilde;o</th>
									
									<th>Pedido</th>

									<th>F-Pedido</th>

									<th>F-Vence</th>

									<th>C&oacute;digo</th>

									<th>Accion</th>

									<th></th>

								</tr>

							</thead>

							<tbody>
								<?php

								$columna = null;

								$valor = null;

								$resultado = CertificadosC::VerCertificadosC($columna, $valor);
								
								$hoy = date("Y-m-d");

								foreach ($resultado as $key => $value) {

									if($value["estado"] == "No Impreso"){

										echo '<tr>';

											if ($value["f_vence"]<$hoy) {
											echo '<td style="color:#ff0000">'.($key+1).'</td>';
											} else {
											echo '<td>'.($key+1).'</td>';    
											}    

											$columna = "id";
											$valor = $value["id_alumno"];

											$alumno = UsuariosC::VerUsuariosC($columna, $valor);
                                            
                                            $pedido = date("d/m/Y", strtotime($value["f_pedido"]));
                                            $vence = date("d/m/Y", strtotime($value["f_vence"]));
											
											if ($value["f_vence"]<$hoy) {
											echo '<td style="color:#ff0000">'.$alumno["id"].'</td>';
											echo '<td style="color:#ff0000">'.$alumno["apellido"].', '.$alumno["nombre"].'</td>';
											echo '<td style="color:#ff0000">'.$value["tipo"].'</td>';
											echo '<td style="color:#ff0000">'.$value["nro"].'</td>';
											echo '<td style="color:#ff0000">'.$pedido.'</td>';
											echo '<td style="color:#ff0000">'.$vence.'</td>';
											echo '<td style="color:#ff0000">'.$value["codigo"].'</td>';
											} else {
											echo '<td>'.$alumno["id"].'</td>';
											echo '<td>'.$alumno["apellido"].', '.$alumno["nombre"].'</td>';
											echo '<td>'.$value["tipo"].'</td>';
											echo '<td>'.$value["nro"].'</td>';
											echo '<td>'.$pedido.'</td>';
											echo '<td>'.$vence.'</td>';
											echo '<td>'.$value["codigo"].'</td>';
											}
												echo '<td>

												<a href="http://localhost/tobar2/pdfs/C_Alumno_1.php/'.$alumno["id"].'/'.$alumno["id_carrera"].'/'.$value["id"].'"target="blank">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>

											<td>

											<form method="post">

												<input type="hidden" name="estado" value="Impreso">

												<input type="hidden" name="Eid" value="'.$value["id"].'">
												
												<input type="hidden" name="autoa" value="1">

												<button class="btn btn-success" type="submit">Visto</button>

											</form>

											</td>';

								

											echo '

										</tr>';

									}

								}

								?>
							</tbody>

						</table>


						<h2>Solicitudes Listas:</h2>

						<table class="table table-bordered table-hover table-striped">

							<thead>
								<tr>
									<th>Nro</th>
									
									<th>Id</th>
									
									<th>Estudiante</th>
                                    
                                    <th>A&ntilde;o</th>

                                    <th>Pedido</th>
									
									<th>F-Pedido</th>

									<th>F-Vence</th>

									<th>C&oacute;digo</th>
									

									<th>Accion</th>
							
								</tr>
						
							</thead>

							<tbody>
								<?php

								$columna = null;
								$valor = null;

								$resultado = CertificadosC::VerCertificadosC($columna, $valor);

								foreach ($resultado as $key => $value) {

									if($value["estado"] == "Impreso"){

										echo '<tr>

											<td>'.($key+1).'</td>';

											$columna = "id";
											$valor = $value["id_alumno"];

											$alumno = UsuariosC::VerUsuariosC($columna, $valor);
											
											$pedido = date("d/m/Y", strtotime($value["f_pedido"]));
                                            
                                            $vence = date("d/m/Y", strtotime($value["f_vence"]));

											echo '
											<td>'.$alumno["id"].'</td>
											<td>'.$alumno["apellido"].', '.$alumno["nombre"].'</td>
											<td>'.$value["tipo"].'</td>
											<td>'.$value["nro"].'</td>
											<td>'.$pedido.'</td>
											<td>'.$vence.'</td>
											<td>'.$value["codigo"].'</td>';

												echo '<td>

												<a href="http://localhost/tobar2/tcpdf/pdf/C_Alumno_1.php/'.$alumno["id"].'/'.$alumno["id_carrera"].'/'.$value["id"].'"target="blank">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>';

											echo '

										</tr>';

									}

								}

								?>
							</tbody>

							<?php

							$estado = new CertificadosC();
							$estado -> CambiarEC();

							?>

						</table>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>
