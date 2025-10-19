<?php
$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1]){
	echo '<script>
	window.location = "http://localhost/tobar2/inicio";
	</script>';
	return;
}

// $exp[1]= $id_carrera
// $exp[2]= $id  Examenes
// $exp[3]= $id_materia
// $exp[4]= $condicion =1 ->libre =0->regular

?>
<div class="content-wrapper">
	<section class="content">
		<div class="box">
			 <div class="box-body">
					<?php
					// busco datos de materia correspondiente al alumno
						$columna = "id";
						$valor = $exp[2];
						$resultado = ExamenesC::VerExamenesC($columna, $valor);
						$columna = "id";
						$valor = $resultado["id_materia"];
						$materia = MateriasC::VerMaterias2C($columna, $valor);
						
						$columna = "id";
						$valor = $resultado["id_materia"];
						
						
						echo '<h2>Inscribirse a la Mesa de Exámen para: <br><br>'.$materia["nombre"].'</h2>
							<input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
							<input type="hidden" name="id_carrera" value="'.$_SESSION["id_carrera"].'">
							<input type="hidden" name="libreta" value="'.$_SESSION["libreta"].'">
							<input type="hidden" name="id_examen" value="'.$resultado["id"].'">
	                        <input type="hidden" name="id_materia" value="'.$materia["id"].'">';
							
							$condi="";
							if ($exp[4]==1) {
							$condi="Libre";    
							}else {
							$condi="Regular";    
							}
							    
							echo ' <div class="row">
								<div class="col-md-6 col-xs-12">
									<h2>Fecha: '.$resultado["fecha"].'</h2>
									<h2>Hora: '.$resultado["hora"].'</h2>
									<h2>Condicion: '.$condi.'</h2>
								</div>
								<div class="col-md-6 col-xs-12">
									<h2>Profesor: '.$resultado["profesor"].'</h2>
									<h2>Aula: '.$resultado["aula"].'</h2>

									<br><br>

									<div class="alert alert-success">Usted ya está inscripto a esta Mesa de Examen...</div>
                                    
                                    <a href="http://localhost/tobar2/inscripto-E1/'.$_SESSION["id_carrera"].'/'.$exp[2].'/'.$exp[3].'">

                                    <button class="btn btn-danger">Dar de Baja</button></a>
									
								</div>

							</div>';
					        ?>
				</div>
		    </div>
	     
     
  </section>
</div>
<?php
$borroe = new ExamenesC();
$borroe -> BorrarInscEC();
?>