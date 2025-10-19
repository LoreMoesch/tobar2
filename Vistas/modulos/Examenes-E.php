<?php

if($_SESSION["rol"] != "Docente"){

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
        
        $valor = $exp[2];

        $materia = MateriasC::VerMaterias2C($columna, $valor);
        
        $columna = "id";
        
        $valor = $exp[1];

        $examen = ExamenesC::VerExamenesC($columna, $valor);

		echo '<h1>Estudiantes de Materia: '.$materia["nombre"].'</h1>';
	
	    echo ' <br/>
	    
	     <h1>Hora: '.$examen["hora"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDias: '.$examen["fecha"].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAula: '.$examen["aula"].'</h1>
	    <br>';
         		
		//echo'<a href="http://localhost/tobar2/pdfs/Inscriptos-Materia.php/'.$exp[2].'/'.$exp[1].'" target="blank">

		//	<button class="btn btn-primary">Generar PDF</button>

		//	</a>';

		?>


	</section>

	<section class="content">

		<div class="box">

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped">

					<thead>
						<tr>
							<th>Libreta</th>
							<th>Dni</th>
							<th>Apellido y Nombre</th>
							<th>Condici&oacute;n</th>
							<!-- <th>Acci&oacute;n</th> -->
						</tr>
					</thead>

					<tbody>

						<?php


                        $columna = "id_materia";
                        
                        $valor = $exp[2];

                        $inscriptos = ExamenesC::VerInscExamentodosC($columna, $valor);

                        $oo=0;

                        foreach ($inscriptos as $key => $value) {


							if($value["id_examen"] == $exp[1]){
							    
							    $columna = "id";
                                
                                $valor = $value["id_alumno"];

                                $alumnos = UsuariosC::VerUsuariosC($columna, $valor);
							    
								echo '<tr>
									<td>'.$alumnos["libreta"].'</td>
									<td>'.$alumnos["dni"].'</td> 
									<td>'.$alumnos["apellido"].' '.$alumnos["nombre"].'</td>
									<td>'.$value["condicion"].'</td>
									</tr>'
									;
                                
                                    
 
                                

							}


						}

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>
