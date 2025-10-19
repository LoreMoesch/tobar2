<?php

if($_SESSION["rol"] != "Docente"){

	    echo '<script>

	    window.location = "inicio";
	    </script>';

	    return;
    
}
$estudiante=1;


?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>Presentismo de Docentes</h1>
	</section>

	<section class="content">

		<div class="box">

			<div class="box-header">
			
	     <?php
		echo	'<a href="http://localhost/tobar2/pdfs/AsistenciaD1.php/'.$_SESSION["id"].'" target="blank">
				<button class="btn btn-primary">Informe PDF</button>
				
			</a> ';  
			
         ?>			
			    <!-- Esto es un comentario 

				a href="https://sistema.isfdcarolinatobargarcia.edu.ar/pdfs/Plan-de-Estudios.php/'.$exp[1].'/'.$estudiante["id"].'"target="blank">
				<button class="btn btn-primary">Generar PDF</button>
			</a>
			
				<button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>
                
                -->
			
			</div>

			<div class="box-body">

				<table class="table table-bordered table-hover table-striped T">

					<thead>
						<tr>
                             <th>Id</th>
                         	<th>Nombre y Apellido</th>
							<th>Fecha</th>
							<th>Hora</th>
							

						</tr>
					</thead>

					<tbody>

						<?php
                        
                        if ($_SESSION["id"]==418){
                        
                        $columna = null;
						$valor = null;

                        }else{
						$columna = "fk_profe";
						$valor = $_SESSION["id"];
                        }
						
						$resultado = CertificadosC::VerPresentesC($columna, $valor);

						foreach ($resultado as $key => $value) {

						          	    echo '<tr>
						          	    
                                        <td>'.$value["id"].'</td>
									    
									    <td>'.$value["nombre"].'</td>';
									    
									    $hoy=date("d-m-Y", strtotime($value["fecha"]));
									    
									   	echo '
										
										<td>'.$hoy.'</td>
										
										<td>'.$value["hora"].'</td>
										
										
										

								        </tr>';

                                       }
                                        

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

