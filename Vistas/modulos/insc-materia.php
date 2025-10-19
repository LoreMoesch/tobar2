<?php
// viene del boton "ver detalles" del Materias.php

$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1]){
	echo '<script>
	window.location = "http://localhost/tobar2/inicio";
	</script>';
	return;
}

$columna = "id_materia";
$valor = $exp[2];

$ins = MateriasC::VerInscMateriasC($columna, $valor);
foreach ($ins as $key => $m) {
	if($m["id_materia"] == $exp[2] && $m["id_alumno"] == $_SESSION["id"]){
		echo '<script>
			window.location = "http://localhost/tobar2/inscripto-M/'.$exp[1].'/'.$exp[2].'";
			</script>';
	}

}
?>
<div class="container">
    
	<section class="content">
	
		<div class="box">
	
			<div class="box-body">
	
				<form method="post">
	
					<?php
	
					$exp = explode("/", $_GET["url"]);
	
					$columna = "id";
	
					$valor = $exp[2];
	
					$materia = MateriasC::VerMaterias2C($columna, $valor);
					
					echo '<h2>Inscribirse a la Materia: '.$materia["nombre"].' ('.$materia["id"].')'.'</h2>
						
					<input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
						
					<input type="hidden" name="apellido" value="'.$_SESSION["apellido"].'">
						
					<input type="hidden" name="id_materia" value="'.$materia["id"].'">
				
					<input type="hidden" name="comun" value="'.$materia["comun"].'">
					
					<input type="hidden" name="orden" value="'.$materia["orden"].'">
						
					<div class="row">
		   				
		   			<div class="col-md-6 col-xs-12">
			      		
			      	<h2>C&oacute;digo: '.$materia["codigo"].'</h2>
						
					<h2>A&ntilde;o: '.$materia["grado"].'</h2>
						
					</div>
  						
  					<div class="col-md-6 col-xs-12">
  						
    				<h2>Tipo: '.$materia["tipo"].'</h2>
    					
    				<p>*Solo se podrá inscribir a una Comisión por única vez.</p>';
    				
    				if($materia["comun"] == 1){
    				
    				    $columna = "id_materia";
			      				
			      	    $valor = $exp[2];
      							
      				    $equiv = MateriasC::VerMaterias6C($columna, $valor);
      				    
      				    $materia_id= $equiv["equivalencia"];
      				    
    				}else{
    				    
    				    $materia_id= $exp[2];
    				}
    				
    				//echo '<input type="text" name="comun2" value="'.$materia_id.'">';
    				
    				$columna = "id_materia";
	      				
	      			$valor = $materia_id;
    					
    				$comisiones = MateriasC::VerComisionesC($columna, $valor);
        				
        			foreach ($comisiones as $key => $value) {
        					    
      						$columna = "id";
                                
                            $valor = $value["id_docente"];
                                
                            $profe = UsuariosC::VerUsuariosC($columna, $valor);
      							
      						$nombre= $profe["nombre"].' '.$profe["apellido"];
      							
      						$columna = "id_comision";
			      				
			      			$valor = $value["id"];
      							
      						$insc = MateriasC::VerInscMateriasC($columna, $valor);
      							
      						if(count($insc) < $value["c_maxima"]){
           						
           						$lugares = ($value["c_maxima"] - count($insc));
            					
            					echo '<input type="radio" name="id_comision" value="'.$value["id"].'" required> Turno : '.$value["turno"].' - '.$value["dias"].' - '.$value["horario"].' - Profesor/ra: '.$nombre.' <br>';
      							
      						}
    							
        			}
					
					?>
					
					<br><br>
					
					<button class="btn btn-primary" type="submit">Inscribirse</button>
					
					<?php
					
						$inscribir = new MateriasC();
					
						$inscribir -> InscribirMateriaC();
  				    
  				    ?>
					
					</div>
				
				</div>
		  	
		  	</form>
	  	
	  	</div>
		
		</div>
	
	</section>

</div>
