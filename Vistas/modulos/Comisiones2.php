<?php

if($_SESSION["rol"] != "Administrador"){

    if($_SESSION["rol"] != "Bedel"){
	  
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

?>

<div class="container">
	<section class="content-header">
		<h3>Gestor de Comisiones - por Materias</h3>
	</section>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table  id="comision2" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Materia</th>
							<th>Id_Mat</th>
							<th>Cant</th>
							<th>Tipo</th>
							<th>Orientacion</th>
							<th>Turno</th>
							<th>A&ntilde;o</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$comision = MateriasC::VerMaterias5C();
						//$resultado = CarrerasC::VerCarrerasC();
						foreach ($comision as $key => $value) {
                            	$columna = "id";
			                  	$valor = $value["id_materia"];
                            	$resultado = MateriasC::VerMaterias1C($columna,$valor);
                                $columna = "id_comision";
			      				$valor = $value["id"];
      							$insc = MateriasC::VerInscMateriasC($columna, $valor);
                				$ii=0;
                				foreach ($insc as $key => $insc_alu) {
         							if($_SESSION["id"] = $insc_alu["id_alumno"]){
         							  $ii++;  
 	     							}
		    					}
							echo '<tr>
							      <td>'.$value["id"].'</td>';
							if ($value["anio"]==1 || $value["anio"]==3){      
						    echo ' <td>'.$value["nombre"].'</td>
						           <td>'.$value["id_materia"].'</td>
								   <td>'.$ii.'</td>
								   <td>'.$resultado["tipo"].'</td> 
								   <td>'.$value["carreras"].'</td>
								   <td>'.$value["turno"].'</td>
								   <td>'.$value["anio"].'</td>';	      
							} else {
							    echo ' <td>'.$value["nombre"].'</td>
							           <td>'.$value["id_materia"].'</td>
								       <td>'.$ii.'</td>
								       <td>'.$resultado["tipo"].'</td> 
								       <td>'.$value["carreras"].'</td>
								       <td>'.$value["turno"].'</td>
								       <td>'.$value["anio"].'</td>';
							}      
								  $columna = "id_comision";
								  $valor = $value["id"];
							      $equipos = MateriasC::VerEquiposC($columna, $valor);
								 $comi=0;
								 foreach ($equipos as $key => $valor1) {
								  $comi++;
								 } 
								  $oo2=' ('.$comi.')';
									echo '<td>
											<a href="http://localhost/tobar2/ver-comision/'.$value["id"].'">
												<button type="submit" class="btn btn-success">Profes '.$oo2.'</button>
											</a>';
										echo '
									</td>
									</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



