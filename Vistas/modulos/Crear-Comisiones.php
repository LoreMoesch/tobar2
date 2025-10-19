<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Bedel"){
        if($_SESSION["rol"] != "Secretario"){
    	echo '<script>
    
    	window.locations = "inicio";
    	</script>';
    
    	return;
        }
    }
}

?>

<div class="container-fluid">

	<section class="content">

		<div class="box">

			<div class="box-body">

				<?php

				$exp = explode("/", $_GET["url"]);

				//$columna = "id";
				$valor = $exp[1];

				//$materia = MateriasC::VerMaterias2C($columna, $valor);

				$id = $exp[1];
		
		        $profes = UsuariosC::VerUsuarios1C($id);
		        
		        //$valor = $materia["id_carrera"];

		        //$carrera = CarrerasC::CarreraC($columna, $valor);
				
				echo '<h2>Comisiones del Docente:</h2>
				
				<h1><b>'.$profes["apellido"].' '.$profes["nombre"].'</b></h1>';
				
				  ///echo '<h2>Carrera: '.$carrera["nombre"].' -Plan: '.$carrera["plan"].'</h2>';

				?>

				<div class="row">

					<div class="col-md-12 col-xs-12">
					    <?php
					    
					    //if($_SESSION["rol"] == "Administrador"){

						//    echo '<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearComision">Crear Comisión</button>';

					    //}<h2>Comisiones:</h2>

						?>
						
						<br>
						

						<table class="table table-bordered table-hover table-striped T">

							<thead>
								<tr>

									<th>N°</th>
									<th>id_com</th>
									<th>Cantidad</th>
									<th>Materia</th>
									<th>A&ntilde;o</th>
									<th>Tipo</th>
									<th>Carreras</th>
									<th>Días</th>
									<th>Horario</th>
									<th>Turno</th>
                                    <th>Informe</th>
									<th></th>

								</tr>
							</thead>

							<tbody>

								<?php

								$columna = "id_usuarios";
								$valor = $exp[1];

        					    $comision = MateriasC::VerEquiposC($columna, $valor);

        						foreach ($comision as $key => $valor1) {
						
        						$columna="id";
						
        						$valor=$valor1["id_comision"];			

								$comisiones = MateriasC::VerComisionesC($columna, $valor);
								

								foreach ($comisiones as $key => $value) {

                                    $columna = "id_comision";

			      					$valor = $value["id"];
			      					
      								$insc = MateriasC::VerInscMateriasC($columna, $valor);

									$columna = "id";
									$valor = $value["id_materia"];
									$materias = MateriasC::VerMaterias1C($columna, $valor);
                					
									
									
									
									$ii=0;

                					foreach ($insc as $key => $insc_alu) {

         								if($_SESSION["id"] = $insc_alu["id_alumno"]){

         								  $ii++;  

      	     							}

    		    					}

									echo '<tr>

											<td>'.$value["numero"].'</td>

											<td>'.$value["id"].'</td>

											<td>'.$ii.'</td>

											<td>'.$value["nombre"].'</td>
											
											<td>'.$value["anio"].'</td>
											
											<td>'.$materias["tipo"].'</td>

											<td>'.$value["carreras"].'</td>
											
											<td>'.$value["dias"].'</td>

											<td>'.$value["horario"].'</td>
											
											<td>'.$value["turno"].'</td>';
                                            
                                            if($value["enviado"]==1){

                                                $enviado="Enviado";

                                            }else{

                                                $enviado="Sin Enviar";

                                            }
                                            
                                            echo'     <td>'.$enviado.'</td>
											      <td>';

												
												//echo '<a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

												//	<button class="btn btn-primary">Generar PDF</button>

												//</a>';

												
                                                //if($_SESSION["rol"] == "Administrador"){
												
												//    echo '<button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Borrar Comisión</button>';

                                                //}
                                            
                                            //echo'    <a href="https://sistema.isfdcarolinatobargarcia.edu.ar/Comision-Estudiantes/'.$value["id"].'/'.$materia["id"].'">
											//	<button class="btn btn-primary">Ver Alumnos</button>
											//</a>';

                                            echo'    <a href="http://localhost/tobar2/Comision-Estudiantes/'.$value["id"].'">
											
											<button class="btn btn-primary">Ver Alumnos</button>
											
											</a>';
                                                
											echo '</td>

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

	</section>

</div>


<div class="modal fade" id="CrearComision">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="box-body">

					<div class="form-group">

						<h2>Número:</h2>

						<input type="number" class="form-control input-lg" name="numero" required="">

						<?php

						echo '
						<input type="hidden" class="form-control input-lg" name="id_materia" value="'.$exp[1].'" required="">';

						?>

					</div>

					<div class="form-group">

						<h2>Cantidad Máxima de Alumnos:</h2>

						<input type="number" class="form-control input-lg" name="c_maxima" required="">

					</div>

					<div class="form-group">

						<h2>Días:</h2>

						<input type="texto" class="form-control input-lg" name="dias" required="">

					</div>

					<div class="form-group">

						<h2>Horarios:</h2>

						<input type="text" class="form-control input-lg" name="horario" required="">

					</div>
					
					<div class="form-group">

							<h2>Seleccionar Profesor:</h2>

							<select class="form-control input-lg" name="profeU">

								<option value="0">Seleccionar Profesor...</option>

								<?php

								// $usarios = UsuariosC::VerUsuarios1C();

								// foreach ($usarios as $key => $value) {

								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';

								// }

								?>


							</select>

					</div>


				</div>


				<div class="modal-footer">

					<button class="btn btn-primary" type="submit">Crear</button>

					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				//$crearC = new MateriasC();
				//$crearC -> CrearComisionC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

//$borrarC = new MateriasC();
//$borrarC -> BorrarComisionC();

?>
