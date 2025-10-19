<?php

if($_SESSION["rol"] != "Administrador"){
    
    if($_SESSION["rol"] != "Bedel"){

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
}

?>


<div class="container">

	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

		$columna = "id";
		$valor = $exp[1];

		$carrera = CarrerasC::CarreraC($columna, $valor);

		echo '<h3>Gestor de Materias de la Carrera: '.$carrera["nombre"].'</h3>';

		?>


	</section>


	<div class="row">

		<div class="col-lg-12">

			<div class="box-header">
            
            <?php
            
            //if($_SESSION["rol"] == "Administrador"){
                
			//    echo '<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearMateria">Crear Materia</button>';
            
            //}
            
            echo '&nbsp;&nbsp;&nbsp;'; 
            
      	echo '<a href="http://localhost/tobar2/Crear-Materias/'.$exp[1].'">
			<button type="submit" class="btn btn-success">Correlatividades</button>
			</a>
			<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()"><br><br>';
            
            ?>
			</div>

			<div class="table-responsive">

				<table id="regimen"class="table table-striped table-bordered" cellspacing="0" width="100%">

					<thead>
						<tr>

							<th>C&oacute;digo</th>
							<th>Id</th>
							<th>Nombre</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>Regular</th>
							<th>Promo Dir</th>
							<th>Promo Ind</th>
							<th>Libre</th>
   
						</tr>
					</thead>

					<tbody>

						<?php

						$resultado = MateriasC::VerMateriasC();

						foreach ($resultado as $key => $value) {

							if($value["id_carrera"] == $exp[1]){

							echo '<tr>

									<td>'.$value["codigo"].'</td>
									<td>'.$value["id"].'</td>
									<td>'.$value["nom_abrevi"].'</td>
									<td>'.$value["grado"].'</td>';
							if($value["tipo"] =="1er Cuatrimestre"){
							    echo '<td>1C</td>';
							} else if($value["tipo"] =="2do Cuatrimestre"){
							    echo '<td>2C</td>';
							} else if($value["tipo"] =="Anual"){
							    echo '<td>A</td>';
							}
							
							$columna = "id_materia";
							
							$valor=$value["id"];
							
							$resultado1 = MateriasC::VerRegimenC($columna, $valor);
                            							
								
							echo   '<td style="color:#00bb2d">'.$resultado1["regular"].'</td>
									<td style="color:#00bb2d">'.$resultado1["promo_d"].'</td>
									<td style="color:#00bb2d">'.$resultado1["promo_i"].'</td>
									<td style="color:#00bb2d">'.$resultado1["libre"].'</td>';

				
										echo '</div>

									</td>';

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
