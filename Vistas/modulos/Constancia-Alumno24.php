<?php

if($_SESSION["rol"] != "Estudiante"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>

<div class="container">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<h2>Constancia de Alumno Regular</h2>
				
	            <?php
				
				$columna = "id_alumno";
				
				$valor = $_SESSION["id"];

				$cert3 = CertificadosC::VerCertificadosC($columna, $valor);

					foreach ($cert3 as $key => $value3) {
						

						if($_SESSION["id"] == $value3["id_alumno"] && $value3["estado"] =="No Impreso"){


		                        echo '<script>

		                        window.location = "http://localhost/tobar2/imprimirc/'.$_SESSION["id"].'/'.$_SESSION["id_carrera"].'/'.$value3["id"].'"
		                        
		                        </script>';

	                        	return;

	                    }

                    }
				
				?>
				<form method="post">
					
					<?php
					
                    $columna = "id_alumno";
        
                    $valor = $_SESSION["id"];
           
                    $ins = MateriasC::VerInscMateriasC($columna, $valor);
            
            
                    $anio_c="";
                    $uno=0;
                    $dos=0;
                    $tres=0;
                    $cuatro=0;
                    $introductorio=0;
                    $ninguno=0;
            
                    foreach ($ins as $key => $m) {
            
                        $ninguno=1;
            
            	        $columna = "id";
            	
            	        $valor = $m["id_materia"];
    
             	        $materia = MateriasC::VerMaterias1C($columna, $valor);
             
                        $anio=$materia["grado"];
                
                        if ($materia["id"]==197){
                
                            $introductorio=1;
                
                        } 
    
                        if ($anio==1){
            
                            $uno++; 
            
                        }
                        if ($anio==2){
            
                            $dos++; 
            
                        }
                        if ($anio==3){
            
                        $tres++; 
            
                        }
                        if ($anio==4){
            
                        $cuatro++; 
            
                        }
                    }
            
                    if ($uno>$dos && $uno>$tres && $uno>$cuatro){
                
                        $anio_c=1;
            
                    } else if ($dos>$tres && $dos>=$uno && $dos>$cuatro){
                
                        $anio_c=2;
            
                    } else if ($tres>=$dos && $tres>=$uno && $tres>$cuatro){
            
                        $anio_c=3;
            
                    }else if ($cuatro>=$dos && $cuatro>=$uno && $cuatro>=$tres){
                
                        $anio_c=4;
            
                    }
                    


					$columna = "id_alumno";
					
					$valor = $_SESSION["id"];

					$cert = CertificadosC::VerCertificadosC($columna, $valor);
                    
                    $cert_alu=0;
                    
                    $pedido=0;
                    
                    $hoy= date("Y-m-d");
                    
                    //date_default_timezone_set('america/argentina/buenos_aires');
                    
					foreach ($cert as $key => $value) {
						
						//if($_SESSION["id"] == $value["id_alumno"] && $value["tipo"] == "alumno 2do a 4to Año"){
						
						if($_SESSION["id"] == $value["id_alumno"]){

	                		$cert_alu=$cert_alu + 1;
	                		
	                		//if ($value["nro"] ==1){
	                		    
	                		//  $pedido=1;
	                		 
	                		//}
	                           
						}

					}

                    if ($cert_alu>=3) {
                        
					echo '<div class="alert alert-success">Ya has solicitado el Certificado de Alumno Regular (3 veces).</div>';

                    } else if ($cert_alu>=1 || $cert_alu<=3){
						$numc="";
						if ($cert_alu==0){
							$numc="primero";
						}else if ($cert_alu==1){
							$numc="segundo";		
						}else if ($cert_alu==2){
							$numc="tercero y ultimo";
						}
					
                    	echo '<div class="alert alert-success">Solo puedes generar tres certificados. Este es el '.$numc.'</div>';

                        echo '<h3>Alumno: '.$_SESSION["apellido"].', '.$_SESSION["nombre"].'</h3>';

	    				$columna = "id";
					
		    			$valor = $_SESSION["id_carrera"];

			    		$carrera = CarrerasC::VerCarreras2C($columna, $valor);

				    	echo '<h3>Carrera: '.$carrera["nombre"].'</h3>';
				    	
				    	if ($anio_c==1){
				    	    $aniol="Primer A&ntilde;o Ciclo Basico Comun";
				    	} else if ($anio_c==2) {
				    	    $aniol="Segundo A&ntilde;o";
				    	} else if ($anio_c==3) {
				    	    $aniol="Tercer A&ntilde;o";
				    	} else if ($anio_c==4) {
				    	    $aniol="Cuarto A&ntilde;o";
				    	}
				    	

					      echo '<h3>Cursa: '.$aniol.'</h3>';
					
			    		echo '<h3>Libreta: '.$_SESSION["libreta"].'</h3>
					
				    	<br>

					    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
					
					    <input type="hidden" name="tipo" value='.$anio_c.'>
					
					    <input type="hidden" name="estado" value="No Impreso">
					    
					    <input type="hidden" name="nroa" value='.$cert_alu.'>
					    
					    ';					
					
					    echo '<button class="btn btn-primary btn-lg" type="submit">Generar Certificado</button>';

                      }

                    
                    
					$certificado = new CertificadosC();
					$certificado -> PedirCertificados24C();


					?>

					

				</form>

			</div>

		</div>

	</section>

</div>