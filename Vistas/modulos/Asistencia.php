<?php

if($_SESSION["rol"] != "Secretario"){

	    echo '<script>

	    window.location = "inicio";
	    </script>';

	    return;
    
}

?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>Presentismo de Docentes</h1>
	</section>

	<section class="content">

		<div class="box">

			<div class="box-header">
			
			    <!-- Esto es un comentario 

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
							<th>Acci&oacute;n</th>

						</tr>
					</thead>

					<tbody>

						<?php

						$columna = null;
						$valor = null;

						$resultado = CertificadosC::VerPresentesC($columna, $valor);

						foreach ($resultado as $key => $value) {

						          if ($value["flag_s"]==1){
						          	    echo '<tr>
						          	    
                                        <td>'.$value["id"].'</td>
									    
									    <td>'.$value["nombre"].'</td>';
									    
									    $hoy=date("d-m-Y", strtotime($value["fecha"]));
									    
									   	echo '
										
										<td>'.$hoy.'</td>
										
										<td>'.$value["hora"].'</td>
										
										
										
										<td>
										
										<form method="post">

											<input type="hidden" name="Pid" value="'.$value["id"].'">

											<button class="btn btn-danger" type="submit">Borrar</button>

										</form>
									
									    </td>

								        </tr>';

                                       }
						        }

						?>

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

<?php

$eliminar = new CertificadosC();
$eliminar -> EliminarPresenteC();

?>
