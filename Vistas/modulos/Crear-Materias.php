

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

$exp = explode("/", $_GET["url"]);
//$valor = $_GET["idcarrera"];
$columna = "id";
$valor = $exp[1];
$carrera = CarrerasC::CarreraC($columna, $valor);
?>
<!-- <head>
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../vendor/datatables/datatables.min.css"/>
<link rel="stylesheet"  type="text/css" href="../vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">   

</head> -->
<div class="container">
	<section class="header">
		<?php
		echo '<h3>Gestor de Materias de la Carrera: '.$carrera["nombre"].'</h3>';
		?>
	</section>
	<div class="row">
		<div class="col-lg-12">
			<div class="box-header">
        	  <?php
	             
    	     	echo '<a href="http://localhost/tobar2/Regimen/'.$exp[1].'">
				<button type="submit" class="btn btn-success">Regimen de Evaluacion/Comision</button>
				</a>
				<input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()"><br><br>';
               ?>
			</div>
			<div class="table-responsive">
				<table  id="materias"class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>C&oacute;digo</th>
							<th>Id</th>
							<th>Nombre</th>
							<th>A&ntilde;o</th>
							<th>Tipo</th>
							<th>rc1</th>
							<th>rc2</th>
							<th>rc3</th>
							<th>rc4</th>
							<th>rc5</th>
							<th>rc6</th>
							<th>ac1</th>
							<th>ac2</th>
							<th>ac3</th>
							<th>ac4</th>
							<th>ac5</th>
							<th>ac6</th>
							<th>ac7</th>
							<th>aac</th>
							<th>ar1</th>
							<th>ar2</th>
							<th>ar3</th>
							<th>Ta</th>
							<th>Programa</th>
							 <!-- 
							<th>Acci&oacute;n</th>
                            -->
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
							echo   '<td style="color:#ff0000">'.$value["rc1"].'</td>
									<td style="color:#ff0000">'.$value["rc2"].'</td>
									<td style="color:#ff0000">'.$value["rc3"].'</td>
									<td style="color:#ff0000">'.$value["rc4"].'</td>
									<td style="color:#ff0000">'.$value["rc5"].'</td>
									<td style="color:#ff0000">'.$value["rc6"].'</td>
									<td style="color:#00bb2d">'.$value["ac1"].'</td>
									<td style="color:#00bb2d">'.$value["ac2"].'</td>
									<td style="color:#00bb2d">'.$value["ac3"].'</td>
									<td style="color:#00bb2d">'.$value["ac4"].'</td>
									<td style="color:#00bb2d">'.$value["ac5"].'</td>
									<td style="color:#00bb2d">'.$value["ac6"].'</td>
									<td style="color:#00bb2d">'.$value["ac7"].'</td>
									<td>'.$value["aac"].'</td>
									<td style="color:#00aaff">'.$value["ar1"].'</td>
									<td style="color:#00aaff">'.$value["ar2"].'</td>
									<td style="color:#00aaff">'.$value["ar3"].'</td>
									<td>'.$value["taller"].'</td>';
									if($value["programa"] != ""){
										echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar Programa</a></td>';
									}else{
										echo '<td>No tiene programa.</td>';
									}
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

<?php

// $eliminarM = new MateriasC();
// $eliminarM -> EliminarMateriaC();

?>


<!-- 
<div class="modal fade" id="CrearMateria">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" enctype="multipart/form-data">

				<div class="modal-body">

					<div class="form-group">

						<h2>Código:</h2>

						<input type="text" class="form-control input-lg" name="codigo" required="">

						<?php

						//echo '<input type="hidden" name="Cid" value="'.$exp[1].'">';

						?>


					</div>

					<div class="form-group">

						<h2>Nombre:</h2>

						<input type="text" class="form-control input-lg" name="nombre" required="">

					</div>

					<div class="form-group">

						<h2>Grado:</h2>

						<input type="number" class="form-control input-lg" name="grado" required="">

					</div>

					<div class="form-group">

						<h2>Tipo:</h2>

						<select class="form-control input-lg" name="tipo">

							<option>Seleccionar...</option>

							<option value="Anual">Anual</option>
							<option value="1er Cuatrimestre">1er Cuatrimestre</option>
							<option value="2do Cuatrimestre">2do Cuatrimestre</option>

						</select>

					</div>

					<div class="form-group">

						<h2>Programa:</h2>

						<input type="file" name="programa">

					</div>

				</div>


				<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Crear Materia</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				// $crearM = new MateriasC();
				// $crearM -> CrearMateriaC();

				?>


			</form>

		</div>

	</div>

</div> -->
