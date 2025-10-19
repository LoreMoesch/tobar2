<?php
// viene de insc-materia.php
// aqui muestro ventana1.jpg cuando ya esta inscripto
// pregunto si la carrera del usuario alumno es la que esta en la url
$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1]){
	echo '<script>
	window.location = "http://localhost/tobar2/inicio";
	</script>';
	return;
}


?>
<div class="content-wrapper">
	<section class="content">
		<div class="box">
			 <div class="box-body">
					<?php
					// busco datos de carrera correspondiente al alumno
					$exp = explode("/", $_GET["url"]);
					$columna = "id";
					$valor = $exp[2];
					$materia = MateriasC::VerMaterias2C($columna, $valor);

			  	echo '<h2>Materia: '.$materia["nombre"].'</h2>
      					<div class="row">
    		  				<div class="col-md-6 col-xs-12">
      							<h2>C&oacute;digo/Orden: '.$materia["codigo"].'</h2>
      							<h2>A&ntilde;o: '.$materia["grado"].'</h2>
        					</div>
    						<div class="col-md-6 col-xs-12">
							<h2>Tipo: '.$materia["tipo"].'</h2>';
            // ver si esta inscripto en la materia
						$columna = "id_materia";
						$valor = $exp[2];
						$insC = MateriasC::VerInscMateriasC($columna, $valor);
						foreach ($insC as $key => $C) {
							if($C["id_alumno"] == $_SESSION["id"]){
								$columna = "id";
								$valor = $C["id_comision"];
								$comision = MateriasC::VerComisiones2C($columna, $valor);
								
								$columna = "id";
								$valor = $comision["id_usuario"];
								$profe = UsuariosC::VerUsuariosC($columna, $valor);
								
								//echo '<h2>Su Comisi&oacute;n:'.$comision["id"].' </h2><h3> Turno: '.$comision["turno"].' - '.$comision["dias"].' - '.$comision["horario"].'</h3>';
								echo '<h2>Su Comisi&oacute;n:'.$comision["id"].' </h2><h3> Turno: '.$comision["turno"].'</h3>';
								
								echo '<h3>'.'Profesor/ra: '.$profe["nombre"].' '.$profe["apellido"].'</h3>';
								echo '<br>

								<div class="alert alert-success">Usted ya está inscripto a esta Materia...</div>

								<a href="http://localhost/tobar2/inscripto-M/'.$exp[1].'/'.$exp[2].'/'.$C["id"].'">
								<button class="btn btn-danger">Dar de Baja</button>
								</a>
								';
							}
						}
					?>
				</div>
		    </div>
	      </div>
     </div>
  </section>
</div>
<?php

$borrarI = new MateriasC();
$borrarI -> BorrarInscMC();
