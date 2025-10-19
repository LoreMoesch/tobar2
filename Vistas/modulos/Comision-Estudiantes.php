<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Bedel" && $_SESSION["rol"] != "Secretario" && $_SESSION["rol"] != "Director"){
	echo '<script>
	window.location = "http://localhost/tobar2/inicio";
	</script>';
	return;
}
?>
 
<div class="container">
	<section class="content-header">
		<?php
		$exp = explode("/", $_GET["url"]);
        $columna = "id";
        $valor = $exp[1];
        $comision = MateriasC::VerComisiones2C($columna, $valor);
		echo '<h3>Estudiantes de Comision: '.$comision["nombre"].'</h3>';
		if ($comision["enviado"]==0){
				$informe="Sin entregar";
			}else{
				$informe="Entregado";
        }	
	    echo '<h3>Carreras: '.$comision["carreras"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspInforme: '.$informe.'&nbsp;&nbsp;<a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Inscriptos-Materia.php/'.$exp[1].'" target="blank">
	    	     <button class="btn btn-secondary">Generar PDF con encabezado</button></a></h3>';
	    //echo '<h3>Horario: '.$comision["horario"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDias: '.$comision["dias"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCarreras: '.$comision["carreras"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspInforme: '.$informe.'</h3>
	    //echo '<h1>Carrera: '.$carrera["nombre"].'- Plan: '.$carrera["plan"].'</h1>';
	   if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){ 
			// echo ' <br/>';
        	// echo'<a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Inscriptos-Materia.php/'.$exp[1].'" target="blank">
	    	//      <button class="btn btn-primary">Generar PDF</button><br><br>
	    	//        </a>';
         //echo '<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#AdminAlumnos">Agregar Alumnos</button>';
     	}
		?>
	</section>
	<div class="row">
	    <div class="col-lg-12">
			<div class="table-responsive">
				<table id="comision"class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead class="text-center">
                       	<tr>
							<th>Nro</th>
							<th>Id</th>
							<th>Dni</th>
							<th>Apellido y Nombre</th>
							<th>Telefono</th>
							<th>Carrera</th>
							<th>Clasificaci&oacute;n</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        $columna = "id_comision";
                        $valor = $exp[1];
                        $inscriptos = MateriasC::VerInscMateriasC($columna, $valor);
                        $oo=0;
                        $ii=0;
                        foreach ($inscriptos as $key => $value) {
                            $ii++;
							if($value["id_comision"] == $exp[1]){
							    $columna = "id";
                                $valor = $value["id_alumno"];
                                $alumnos = UsuariosC::VerUsuariosC($columna, $valor);
								echo '<tr>
									<td>'.$ii.'</td>
									<td>'.$alumnos["id"].'</td>
									<td>'.$alumnos["dni"].'</td> 
									<td>'.$alumnos["apellido"].' '.$alumnos["nombre"].'</td>
									<td>'.$alumnos["telefono"].'</td>';
                                	$columna = "id";
	                                $valor = $alumnos["id_carrera"];
		                            $carrera = CarrerasC::CarreraC($columna, $valor);
                                echo '<td>'.$carrera["nom_corto"].'</td>';
                                	$columna = "id_materia";
									$valor = $value["id_materia"];
									if ($alumnos["id_carrera"]==6) {
					         	        $notaalu = MateriasC::VerNotasnAC($columna, $valor);
                                    } else if ($alumnos["id_carrera"]==7) {
                                        $notaalu = MateriasC::VerNotassAC($columna, $valor);    
                                    } else if ($alumnos["id_carrera"]==8) {
                                        $notaalu = MateriasC::VerNotasiAC($columna, $valor);
                                    } else if ($alumnos["id_carrera"]==9) {    
                                        $notaalu = MateriasC::VerNotascAC($columna, $valor);
                                    }  
									$aaa=0;
									foreach ($notaalu as $key => $N) {
										if($N["id_alumno"] == $alumnos["id"] && $N["id_materia"] == $value["id_materia"]){
											if($N["estado"] == "Promo Directa" || $N["estado"] == "Promo Indirecta"){
                                                $aaa=1;
												echo '<td class="bg-info">
												'.$N["estado"].' ('.$N["nota_regular"].')
												</td>';          									
											}else if($N["estado"] == "Regular"){
                                                $aaa=1;
												echo '<td class="bg-success">
												'.$N["estado"].' ('.$N["nota_regular"].')
												</td>';
											}else if($N["estado"] == "Reprobada" || $N["estado"] == "Libre por Inasistencia"){
                                                $aaa=1;
												echo '<td class="bg-danger">
												'.$N["estado"].'
												</td>';
											}else if($N["estado"] == "Equivalencia"){
											    $aaa=1;
												echo '<td class="bg-warning">
												'.$N["estado"].'
												</td>';
                                          }else {
												$aaa=1;
												echo '<td class="">
												'.$N["estado"].'
												</td>';
											}
										}
									}
                                if ($aaa==0){
                                    $SN="Sin Calificar";
                                    echo '<td>'.$SN.'</td>';
                                }
							    //echo '<td>';
							    //if($comision["enviado"] == 0){
								//echo '<div class="btn-group">
								//	<button class="btn btn-danger EliminarInsc" Uid="'.$value["id"].'">Borrar</button>
								//</div>';
          						     //}
        						//echo '</td>';								
								echo '</tr>';
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- <div class="modal fade" id="AdminAlumnos">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="box-body">
					<div class="form-group">
					         <?php
					        //  echo '
						    //     <input type="hidden" class="form-control input-lg" name="id_materia_nombre" value="'.$materia["nombre"].'" required="">
						    //     <input type="hidden" class="form-control input-lg" name="id_materia" value="'.$materia["id"].'" required="">
						    //     <input type="hidden" class="form-control input-lg" name="id_comision" value="'.$comision["id"].'" required="">
						    //     <input type="hidden" class="form-control input-lg" name="id_carrera" value="'.$carrera["id"].'" required="">';
						     ?>   
							<h2>Seleccionar Alumno:</h2>
							<select class="form-control input-lg" name="alumno">
							<option value="0">Seleccionar Alumno...</option>
							<?php
                                // neuro
                                // if($carrera["id"]==6){                
 								// $usarios = UsuariosC::VerUsuarios3NC();
								// foreach ($usarios as $key => $value) {
								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["dni"].'</option>';
								// }
								//sordo
                                // }else if ($carrera["id"]==7){
  								// $usarios = UsuariosC::VerUsuarios3SC();
								// foreach ($usarios as $key => $value) {
								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["dni"].'</option>';
								// }   
                                //intelectuales
                                // }else if ($carrera["id"]==8){
  								// $usarios = UsuariosC::VerUsuarios3IC();
								// foreach ($usarios as $key => $value) {
								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["dni"].'</option>';
								// }
								// //ciegos
								// }else if ($carrera["id"]==9){
  								// $usarios = UsuariosC::VerUsuarios3CC();
								// foreach ($usarios as $key => $value) {
								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["dni"].'</option>';
								// }
								// // comun
								// }else if ($carrera["id"]==10){
  								// $usarios = UsuariosC::VerUsuarios3COC();
								// foreach ($usarios as $key => $value) {
								// 	echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["dni"].'</option>';
								// }
								// }
								?>
								
							</select>
							<?php
				       		// $valor = $_POST["alumno"];
                            // $usuarion = UsuariosC::VerUsuariosC($columna, $valor);
			            	// echo '
			            	// 	 <input type="hidden" class="form-control input-lg" name="apellido" value="'.$usuarion["apellido"].'" required="">';
				         ?>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Agregar</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				//$crearA = new MateriasC();
				//$crearA -> InscribirMateria1C();
				?>
			</form>
		</div>
	</div>
</div> -->


<!-- <div class="modal fade" id="EliminarInsc">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="box-body">
					<div class="form-group">
					    	<input class="form-control input-lg" type="hidden" id="Iid" name="Iid" required>
							<h2>¿ Seguro Borrar Inscripcion ?</h2>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Si</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
                //$inscA = new MateriasC();
                //$inscA -> BorrarInsc1MC();
				?>
			</form>
		</div>
	</div>
</div> -->


