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
<div class="container">
	<section class="content-header">
		<h3>Gestor de Comisiones - por Docentes</h3>
	</section>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="comision1" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead class="text-center">
						<tr>
							<th>Id</th>
							<th>Docente</th>
							<th>Dni</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$id = null;
						$docentes1 = UsuariosC::VerUsuarios123C($id);
						//$resultado = CarrerasC::VerCarrerasC();
						foreach ($docentes1 as $key => $value) {
                            if($value["id"] <> 481){
							echo '<tr>
							      <td>'.$value["id"].'</td>
								  <td>'.$value["apellido"].' '.$value["nombre"].'</td>
								  <td>'.$value["libreta"].'</td>';
								 $columna = "id_usuarios";
								 $valor = $value["id"];
							     $comision = MateriasC::VerEquiposC($columna, $valor);
								 $comi=0;
								 foreach ($comision as $key => $valor1) {
									  $comi++;
 								 } 
								 $oo2=' ('.$comi.')';
								 if ($comi <> 0) {
									echo '<td>
										<a href="http://localhost/tobar2/Crear-Comisiones/'.$value["id"].'">
										<button class="btn btn-primary">Comisiones'.$oo2.'</button>
										</a></td>';
									
								 } else {
										echo '<td>
										<a>Sin comision</a></td>';		
								 }
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
