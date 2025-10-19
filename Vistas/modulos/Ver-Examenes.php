<div class="container">
  <section class="container-header">
		<?php
        if($_SESSION["rol"] != "Administrador"){
            if($_SESSION["rol"] != "Bedel"){
            	echo '<script>
             	window.locations = "inicio";
            	</script>';
             	return;
            }
        }
// entrada por alumno
		$exp = explode("/", $_GET["url"]);
		$columna = "id";
		$valor = $exp[1];
        $llamado = $exp[2];
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);
		$llamadoa = ExamenesC::VerTurnoAC();
        foreach ($llamadoa as $key => $valuea) {
         }
		echo '<h1>Exámenes de la Carrera: '.$carrera["nombre"].'</h1>';
		?>
	</section>
<section class="container">
	<div class="box">
		<div class="box-body">
				<?php
				$columna = "id";
				$valor = 1;
				$ajustes = AjustesC::VerAjustesC($columna, $valor);
        // habilitar examenes esta en 1
      	//if($ajustes["h_examenes"] != 0){
      	if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){
					echo '
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
							    <th>C&oacute;digo</th>
							    <th>Id</th>
								<th>Materia</th>
								<th>Fecha</th>';

                                if ($exp[1] <> 12 ) {							
								   echo '<th>Tipo</th>';
								} 
    							echo '<th>Profesor</th>';
								echo '<th>Turno</th>
								     <th>Acciones</th>
 							</tr>
						</thead>
						<tbody>';
						$columna = "llamado";
						if ($llamado==1){
						$valor = $valuea["turno"];
						} else if ($llamado==2) {
						$valor = $valuea["turno"];
						}
						$resultado = ExamenesC::VerExamenesllC($columna, $valor);
   					    foreach ($resultado as $key => $value) {
							$columna = "id";
							$valor = $value["id_materia"];
							$materia = MateriasC::VerMaterias2C($columna, $valor);
							$columna = "id_examen";
						    $valor = $value["id"];
   					        $iinsc = ExamenesC::VerInscExamenC($columna, $valor);
						    $iii=0;
						    foreach ($iinsc as $key => $value3) {
						       if ($value3["condicion"]=="Regular" || $value3["condicion"]=="Libre"){
							     $iii++;
						       }
						    }
//            	            if ($exp[1] == 12 && $materia["comun"] == 1 && $materia["taller"] == 0 && ($value["id"] == 1 || $value["id"] == 12 || $value["id"] == 13 || $value["id"] == 6 || $value["id"] == 9 || $value["id"] == 45 || $value["id"] == 11 || $value["id"] == 31 || $value["id"] == 4 || $value["id"] == 5)) {
            	            if ($exp[1] == 12 && $value["comun"] == 1 ) {
            	            //if($value["id_carrera"] == $exp[1] && $materia["comun"] == 0){
								if($_SESSION["rol"] == "Estudiante" && $value["estado"] == 1){
									echo '<tr>';
									$columna = "id";
									$valor = $value["id_materia"];
									$materia = MateriasC::VerMaterias2C($columna, $valor);
									if($value["id_materia"] == $materia["id"]){
										echo '<td>'.$materia["nombre"].'</td>';
									}
  								    echo '<td>'.$value["fecha"].'</td>';
                                    echo '<td>
									<div class="btn-group">';
                    // abro formulario para cargar examen si el rol es estudiante
									if($_SESSION["rol"] == "Estudiante"){
									// $value insc-examen
										echo '<a href="http://localhost/tobar2/insc-examen/'.$_SESSION["id_carrera"].'/'.$value["id"].'/'.$value["id_materia"].'">
										<button class="btn btn-primary">Ver Detalles</button>
										</a>';
									}
									echo '</div>
  									</td>';
                     $columna = "id_materia";
                     $valor = $value["id_materia"];
                     $ins = ExamenesC::VerInscExamenC($columna, $valor);
                     foreach ($ins as $key => $m) {
                       	if($m["id_materia"] == $valor && $m["id_alumno"] == $_SESSION["id"]){
                          echo '<td><a href="http://localhost/tobar2/inscripto-E1/'.$_SESSION["id_carrera"].'/'.$m["id"].'">
                          <button class="btn btn-danger">Dar de Baja Inscripcion</button>
                            </a></td>';
                          }
                        }
						echo '</tr>';
                        // si es administrador
						}else if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){
						echo '<tr>';
						//if ($materia["comun"]== 0 ) {
						if($value["id_materia"] == $materia["id"]){
							echo '
					    	<td>'.$materia["codigo"].'</td>
										<td> '.$value["id"].'</td>
										<td>'.$value["nombre"].'</td>';
									}
									echo '<td>'.$value["fecha"].'</td>';
										echo '<td>'.$value["profesor"].'</td>
										<td>'.$value["hora"].'</td>';
									    echo '<td>
										';
								    	$columna = "id_examen";
						                $valor = $value["id"];
					                	$insc = ExamenesC::VerInscExamenC($columna, $valor);
						                 $aaa=0;
						                 $vvv=0;
						                 $lll=0;
						                 foreach ($insc as $key => $value1) {
						                   if ($value1["condicion"]=="Regular"){
										     $aaa++;
						                   }
						                  }
										$aaa1=' ('.$aaa.')';
										if($aaa!=0){
										echo '<a href="http://localhost/tobar2/Inscriptos-examen/'.$value["id"].'">
										<button class="btn btn-primary">Ver Regulares'.$aaa1.'</button>
										</a>';
										$vvv=1;
										} 
										$columna = "id_materia";
							            $valor=$value3["id_materia"];
							            $resultado12 = MateriasC::VerRegimenC($columna, $valor);
										//if($iii==0 && $resultado12["libre"]==0){
										if($iii == 0){
										  //echo '  <a href="https://localhost/tobar2/tcpdf/pdf/examensinalumnos.php/'.$value["id"].'"target="blank">
										  //		<button class="btn btn-success">Acta S/A</button>
										  //	</a>';
										}
   							           // aqui materias libres 
   							           // 6 -- 155 118 120 
  							           // 7 -- 164 10 12       
   							           // 8 -- 173 86 84
  							           // 9 -- 182 46 48 
									//	if ($value3["id_materia"]==155 || $value3["id_materia"]==118 || $value3["id_materia"]==120 || $value3["id_materia"]==164 || $value3["id_materia"]==10 || $value3["id_materia"]==12  || $value3["id_materia"]==173 || $value3["id_materia"]==86  || $value3["id_materia"]==84 || $value3["id_materia"]==182 || $value3["id_materia"]==46 || $value3["id_materia"]==48 || $value3["id_materia"]==228 || $value3["id_materia"]==244 || $value3["id_materia"]==245 ){
										if ($value3["id_materia"]==155 || $value3["id_materia"]==164 || $value3["id_materia"]==173|| $value3["id_materia"]==182 ){
								            	$columna = "id_examen";
						                        $valor = $value["id"];
					                        	$insc1 = ExamenesC::VerInscExamenC($columna, $valor);
						                        $eee=0;
						                        foreach ($insc1 as $key => $value2) {
										          if ($value2["condicion"]=="Libre"){
										             $eee++;
										          }
						                        }
									        	$eee1=' ('.$eee.')';
                                            if($eee!=0){
                                            echo '<a href="http://localhost/tobar2/Inscriptos-examenl/'.$value["id"].'">
									    	<button class="btn btn-primary">Ver Libres'.$eee1.'</button>
									    	</a>';
									    	$lll=1;
                                            }
                                        }
                                        if ($vvv==0 && $lll==0){
										echo '  <a href="http://localhost/tobar2/pdfs/examensinalumnos.php/'.$value["id"].'"target="blank">
												<button class="btn btn-secondary">Acta S/A</button>
											   </a>';
                                        }
										if($_SESSION["rol"] == "Administrador"){
											if($value["estado"] == 1){
												echo '<a href="http://localhost/tobar2/">
												<button class="btn btn-warning">Deshabilitar</button>
												</a>';
											}else{
												echo '<a href="http://localhost/tobar2/">
												<button class="btn btn-success">Habilitar</button>
												</a>';
											}
										echo '<a href="http://localhost/tobar2/">
										<button class="btn btn-danger">Borrar</button>
										</a>';
										}
										echo '
									</td>
									</tr>';
								}
            	            } else if ($value["id_carrera"] == $exp[1] && $materia["comun"] == 0) {
            					if($_SESSION["rol"] == "Estudiante" && $value["estado"] == 1){
									echo '<tr>';
									$columna = "id";
									$valor = $value["id_materia"];
									$materia = MateriasC::VerMaterias2C($columna, $valor);
									if($value["id_materia"] == $materia["id"]){
										echo '<td>'.$materia["nombre"].'</td>';
									}
  								        echo '<td>'.$value["fecha"].'</td>';
                                        echo '<td>
										';
                    // abro formulario para cargar examen si el rol es estudiante
										if($_SESSION["rol"] == "Estudiante"){
										// $value insc-examen
			
										echo '<a href="http://localhost/tobar2/insc-examen/'.$_SESSION["id_carrera"].'/'.$value["id"].'/'.$value["id_materia"].'">
			
										<button class="btn btn-primary">Ver Detalles</button>
			
										</a>';
			
										}
			
										echo '
  			
  									</td>';

                     $columna = "id_materia";

                     $valor = $value["id_materia"];

                     $ins = ExamenesC::VerInscExamenC($columna, $valor);

                     foreach ($ins as $key => $m) {

                       	if($m["id_materia"] == $valor && $m["id_alumno"] == $_SESSION["id"]){

                          echo '<td><a href="http://localhost/tobar2/inscripto-E1/'.$_SESSION["id_carrera"].'/'.$m["id"].'">

                          <button class="btn btn-danger">Dar de Baja Inscripcion</button>

                            </a></td>';
                          }
                       }
									echo '</tr>';
                                // si es administrador
								}else if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel"){
									echo '<tr>';
									//if ($materia["comun"]== 0 ) {
									if($value["id_materia"] == $materia["id"]){
										echo '
										<td>'.$value["id"].'</td>
										<td>'.$materia["id"].'</td>
										<td>'.$materia["nom_abrevi"].'</td>';
									}
									echo '<td>'.$value["fecha"].'</td>
									<td>'.$materia["tipo"].'</td>';
										echo '<td>'.$value["profesor"].'</td>
										<td>'.$value["hora"].'</td>';
									    echo '<td>
										';
								    	$columna = "id_examen";
						                $valor = $value["id"];
					                	$insc = ExamenesC::VerInscExamenC($columna, $valor);
						                 $aaa=0;
						                 $uuu=0;
						                 $jjj=0;
						                 foreach ($insc as $key => $value1) {
						                   if ($value1["condicion"]=="Regular"){
										     $aaa++;
						                   }
						                  }
										$aaa1=' ('.$aaa.')';
										if($aaa!=0){
										echo '<a href="http://localhost/tobar2/Inscriptos-examen/'.$value["id"].'">
										<button class="btn btn-primary">Ver Regulares'.$aaa1.'</button>
										</a>';
										 $uuu=1;   
										}
										$columna = "id_materia";
							            $valor=$materia["id"];
							            $resultado1 = MateriasC::VerRegimenC($columna, $valor);
										if($aaa==0 && $resultado1["libre"]==0)  {
										  //echo '  <a href="https://localhost/tobar2/tcpdf/pdf/examensinalumnos.php/'.$value["id"].'"target="blank">
										  //	<button class="btn btn-success">Acta S/A</button>
										 // </a>';
										}
									   /// aqui materias libres 
   							           /// 6 -- 155 118 120 
  							           /// 7 -- (1) 164 (2) 10 12 (3) 228 (4) 244 245
   							           /// 8 -- 173 86 84
  							           /// 9 -- 182 46 48 
										if($resultado1["libre"]==1){
//										if ($materia["id"]==155 || $materia["id"]==118 || $materia["id"]==120 || $materia["id"]==164 || $materia["id"]==10  || $materia["id"]==12 || $materia["id"]==173  || $materia["id"]==86 || $materia["id"]==84 || $materia["id"]==182 || $materia["id"]==46 || $materia["id"]==48 ){
								            	$columna = "id_examen";
						                        $valor = $value["id"];
					                        	$insc1 = ExamenesC::VerInscExamenC($columna, $valor);
   						                        $eee=0;
						                        foreach ($insc1 as $key => $value2) {
										          if ($value2["condicion"]=="Libre"){
										             $eee++;
										          }
						                        }
									        	$eee1=' ('.$eee.')';
                                            if($eee!=0){
                                            echo '<a href="http://localhost/tobar2/Inscriptos-examenl/'.$value["id"].'">
									    	<button class="btn btn-primary">Ver Libres'.$eee1.'</button>
									    	</a>';
									    	$jjj=1;
                                            }
                                         }
                                        if ($uuu==0 && $jjj==0) {    
                                        echo '  <a href="http://localhost/tobar2/pdfs/examensinalumnos.php/'.$value["id"].'"target="blank">
												<button class="btn btn-secondary">Acta S/A</button>
     											</a>';
                                        }
										if($_SESSION["rol"] == "Administrador"){
											if($value["estado"] == 1){
												echo '<a href="http://localhost/tobar2/">
												<button class="btn btn-warning">Deshabilitar</button>
												</a>';
											}else{
												echo '<a href="http://localhost/tobar2/">
												<button class="btn btn-success">Habilitar</button>
												</a>';
											}
										echo '<a href="http://localhost/tobar2/">
										<button class="btn btn-danger">Borrar</button>
										</a>';
										}
										echo '
									</td>
									</tr>';
								}
            	            }
							////  //// ////
						}
						echo '</tbody>
					</table>';
				}else{
				echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones.</div>';
				}
				?>
			</div>
		</div>
	</section>
</div>
