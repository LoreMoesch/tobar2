<?php

$exp = explode("/", $_GET["url"]);

if($_SESSION["id_carrera"] != $exp[1]){

  echo '<script>

	window.locations = "http://localhost/tobar2/inicio";

	</script>';

	return;

}

// $exp[1]= $id_carrera del alumno

// $exp[2]= $id  Examenes de ins-examen

// $exp[3]= $id_materia de ins-examen

// $exp[4]= $condicion =1 ->libre =0->regular

// $exp[5]= $turno =1 ->Mañana =2->Tarde

// $exp[6]= Orden en materia

$columna = "id_materia";

$valor = $exp[3];

$ins = ExamenesC::VerInscExamenC($columna, $valor);

  foreach ($ins as $key => $m) {

  	if($m["id_materia"] == $exp[3] && $m["id_alumno"] == $_SESSION["id"]){

  		echo '<script>

  			window.location = "http://localhost/tobar2/inscripto-E/'.$exp[1].'/'.$exp[2].'/'.$exp[3].'";

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

				    $hoy = date("d/m/Y");

					$columna = "id";

					$valor = $exp[2];

					$resultado = ExamenesC::VerExamenesC($columna, $valor);

					$columna = "id";

					//$valor = $resultado["id_materia"];

					$valor = $exp[3];

					$materia = MateriasC::VerMaterias2C($columna, $valor);

					echo '<h2>Inscribirse a la Mesa de Exámen de :  '.$materia["nombre"].'</h2>
					
						<input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">

						<input type="hidden" name="apellido" value="'.$_SESSION["apellido"].'">

						<input type="hidden" name="id_carrera" value="'.$_SESSION["id_carrera"].'">

						<input type="hidden" name="libreta" value="'.$_SESSION["libreta"].'">
						
						<input type="hidden" name="fecha_insc" value="'.$hoy.'">

                        <input type="hidden" name="id_materia" value="'.$exp[3].'">
                        
                        
                        <input type="hidden" name="orden" value="'.$exp[6].'">
                        
                        <input type="hidden" name="carrea" value="'.$exp[1].'">

                        <input type="hidden" name="idexa" value="'.$exp[2].'">
                        
                        <input type="hidden" name="conda" value="'.$exp[4].'">
                        
                        <input type="hidden" name="turno" value="'.$exp[5].'">';
                        
                        ////$exp[6] es si es una materia comun
                        
                        //<input type="hidden" name="nro_llama" value="'.$resultado["nro_llamado"].'">
                        
                        $condi="";
                        
                        if ($exp[4]==1){
                            
                            $condi="Libre";
                            
                            echo '<input type="hidden" name="condicion" value="Libre">';
                        
                        }else{
                        
                            echo '<input type="hidden" name="condicion" value="Regular">';
                        
                            $condi="Regular";
                        
                            
                        }

    				if ($exp[5]==1){

	      			//Hora = turno
	      			$valor1 = "Mañana";

    				}else if ($exp[5]==2){
    				    
	      			//Hora = turno
	      			$valor1 = "Tarde";
    				    
    				}

    				//Hora = turno
    				$columna1 = "hora";
	      				
	      			//Orden
	      			$columna2 = "orden";
	      			
	      			//Orientacion 
	      			
	      			$columna3 = "id_carrera";
	      			
	      			$valor3 = $exp[1];
	      			
	      			//Comision 
	      			
	      			$columna = "id_comision";
	      			
	      			$valor = $exp[2];

	      			//Orden
	      			$valor2 = $exp[6];

    				//echo '<p>**Solo se podrá inscribir a un LLamado por vez.</p>';
    				
    				echo '<p>* Elige la opcion a inscribir.</p>';
    				

    				// materias que se rinden regular hasta 3año
    				//segundo 11,13,14,17,18,229,230,231 sordos   10,11,12,13,14,18,168,228,229,230,231

    				// segundo 83,85,87,90,220,221,222,223 Intelectuales (ver 88) 
    				// segundo 119,121,122,201,202,203 neuro ()
    				// segundo 47,49,50,210,211,212,213,216 ciego ()

                    if ($exp[4]==1){
                    
                    // si es ==1 es libre

                    if ($exp[3]==173 || $exp[3]==164 || $exp[3]==182 || $exp[3]==155) { 				


                    //if ($exp[3]==47 || $exp[3]==49 || $exp[3]==50 || $exp[3]==210 || $exp[3]==211 || $exp[3]==212 || $exp[3]==213 || $exp[3]==216 || $exp[3]==119 || $exp[3]==121 || $exp[3]==122 || $exp[3]==201 || $exp[3]==202 || $exp[3]==203 || $exp[3]==90 || $exp[3]==220 || $exp[3]==221 || $exp[3]==222 || $exp[3]==223 || $exp[3]==83 || $exp[3]==85 || $exp[3]==87 || $exp[3]==17 || $exp[3]==13 || $exp[3]==14 || $exp[3]==11 || $exp[3]==18|| $exp[3]==229|| $exp[3]==230|| $exp[3]==231) { 				

                          
                            //$columna1-> turno, $columna2-> orden
                        
                            $examenes1= ExamenesC::VerExamenes22C($columna1, $columna2, $valor1, $valor2);
        				
        			        foreach ($examenes1 as $key => $value1) {

      				 		    echo '<input type="radio" name="id_examen" value="'.$value1["id"].'" required> &nbsp;&nbsp;Turno : '.$value1["hora"].'&nbsp;&nbsp;&nbsp;&nbsp;Fecha : '.$value1["fecha"].'&nbsp;&nbsp;&nbsp;&nbsp;LLamado : '.$value1["llamado"].'&nbsp;&nbsp;&nbsp;&nbsp;Profesor/ra: '.$value1["profesor"].'&nbsp;&nbsp;&nbsp;&nbsp;Id-Exa: '.$value1["id"].'&nbsp;&nbsp;Nro-LLamado: '.$value1["nro_llamado"].'<br>';
      				        }    

                      } else {

                        //$columna1-> turno, $columna2-> orden, $columna3-> id_carrera  

    				    $examenes= ExamenesC::VerExamenes2C($columna1, $columna2, $columna3, $valor1, $valor2, $valor3);
        				
        			    foreach ($examenes as $key => $value) {

      				 		echo '<input type="radio" name="id_examen" value="'.$value["id"].'" required> &nbsp;&nbsp;Turno : '.$value["hora"].'&nbsp;&nbsp;&nbsp;&nbsp;Fecha : '.$value["fecha"].'&nbsp;&nbsp;&nbsp;&nbsp;LLamado : '.$value["llamado"].'&nbsp;&nbsp;&nbsp;&nbsp;Profesor/ra: '.$value["profesor"].'&nbsp;&nbsp;&nbsp;&nbsp;Id-Exa: '.$value["id"].'&nbsp;&nbsp;Nro-LLamado: '.$value["nro_llamado"].'<br>';
      				  
      				    }
                        
                    }
                    
                    } else if($exp[4]==2){
                    
                    // si es ==1 es regular
                    
                    // echo "gsgsgsg";

                    if ($exp[6]==1) { 				

                        //carrera comun
                        
                        //$columna  -> id_comision  

    				    $examenes= ExamenesC::VerExamenes133C($columna, $valor);
        				
        			    foreach ($examenes as $key => $valuee) {

      				 		echo '<input type="radio" name="id_examen" value="'.$valuee["id"].'" required> &nbsp;&nbsp;Turno : '.$valuee["hora"].'&nbsp;&nbsp;&nbsp;&nbsp;Fecha : '.$valuee["fecha"].'&nbsp;&nbsp;&nbsp;&nbsp;LLamado : '.$valuee["llamado"].'&nbsp;&nbsp;&nbsp;&nbsp;Profesor/ra: '.$valuee["profesor"].'&nbsp;&nbsp;&nbsp;&nbsp;Id-Exa: '.$valuee["id"].'&nbsp;&nbsp;Nro-LLamado: '.$valuee["nro_llamado"].'<br>';
      				  
      				    }

                      } else {

                        //$columna  -> id_comision  

    				    $examenes= ExamenesC::VerExamenes133C($columna, $valor);
        				
        			    foreach ($examenes as $key => $valuee) {

      				 		echo '<input type="radio" name="id_examen" value="'.$valuee["id"].'" required> &nbsp;&nbsp;Turno : '.$valuee["hora"].'&nbsp;&nbsp;&nbsp;&nbsp;Fecha : '.$valuee["fecha"].'&nbsp;&nbsp;&nbsp;&nbsp;LLamado : '.$valuee["llamado"].'&nbsp;&nbsp;&nbsp;&nbsp;Profesor/ra: '.$valuee["profesor"].'&nbsp;&nbsp;&nbsp;&nbsp;Id-Exa: '.$valuee["id"].'&nbsp;&nbsp;Nro-LLamado: '.$valuee["nro_llamado"].'<br>';
      				  
      				    }
                        
                    }
                    
                    
                    
                        
                    }
                    
						echo '
						<div class="row">
						
							<div class="col-md-6 col-xs-12">
						

								<br><br>

								<button type="submit" class="btn btn-primary btn-lg">Inscribirse</button>

							</div>

						</div>
						';

						$Iexamen = new ExamenesC();
						$Iexamen -> InscribirseExamenC();

				?>

				</form>

			</div>

		</div>

	</section>

</div>
