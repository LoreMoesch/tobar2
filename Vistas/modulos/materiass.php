<?php

if($_SESSION["rol"] != "Administrador"){
    if($_SESSION["rol"] != "Docente"){
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
	
		<?php
	
		/// exp 1 --> id_carrera
		/// exp 2 --> id

		$exp = explode("/", $_GET["url"]);

		$columna = "id";

		$valor = $exp[1];
		
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);

		$columna = "id";
        $valor = 1;
        $ajustes = AjustesC::VerAjustesC($columna, $valor);
		
		$columna = "id";
		$valor = $exp[2];

		$estudiante = UsuariosC::VerUsuariosC($columna, $valor);
	
		echo '<h1>Materias de la Carrera: '.$carrera["nombre"].'</h1>
		<br/> ';
		
		echo '<h1>Alumno/a ('.$estudiante["id"].') : '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h1>
        <br>
        
        <input type = "button" class="btn btn-primary btn-lg" style="margin-left: 10px" value="Volver" onclick = "history.back ()">
        
        ';
		

		?>

	</section>
	
	<section class="content">
	
		<div class="box">
	
			<div class="box-body">
	
				<?php

					echo '<table class="table table-bordered table-hover table-striped">
	
							<thead>
	
								<tr>
									<th>C&oacute;digo</th>
									<!-- 
										-->
									<th>Id</th>
								
									<th>Nombre</th>
									<th>A&ntilde;o</th>
									<th>Tipo</th>
									
									<th>Estado</th>
								</tr>
	
							</thead>
	
							<tbody>';
	
							$columna = "id_carrera";
							
							$valor = $exp[1];
							
							$notas = MateriasC::VerMaterias3C($columna, $valor);
							
							foreach ($notas as $key => $N) {

									if($ajustes["cuatrimestre"] != "2do Cuatrimestre" || $ajustes["cuatrimestre"] == "2do Cuatrimestre" ){

										if($N["tipo"] != "2do Cuatrimestre" || $N["tipo"] == "2do Cuatrimestre" ){
										    
										    $columna = "id_alumno";
							
							                $valor = $exp[2];
							                
							                if ( $exp[1] == 8){
									    
									            $notas1 = MateriasC::VerNotasiC($columna, $valor);

									        } else if ( $exp[1] == 6){
									    
									             $notas1 = MateriasC::VerNotasnC($columna, $valor);

									        } else if ( $exp[1] == 7){

									            $notas1 = MateriasC::VerNotassC($columna, $valor);

									        } else if ( $exp[1] == 9){

									            $notas1 = MateriasC::VerNotascC($columna, $valor);

									        }  
							
							                //$notas1 = MateriasC::VerNotasC($columna, $valor);
                                            
                                            $regu=0;
											
											foreach ($notas1 as $key => $N1) {
											   
											   
											    if($N1["id_materia"] == $N["id"]){
											   
											    
											       
                   								   if($N1["estado"] == "Regular" || $N1["estado"] == "Equivalencia" || $N1["estado"] == "Promo Directa" || $N1["estado"] == "Promo Indirecta" || $N1["estado"] == "Libre"){
				                                     
				                                     
											          $regu=1;
										
											          $estado=$N1["estado"]; 
                   						              
                   						              $estadof=$N1["estado_final"];     
                   								   
                   								       
                   								   }else {
                   						
                   								     $regu=0;  
                   						
                   								   }
										
											    } 
										
											} 
			
 	                                        echo '<tr>
											          <td>'.$N["codigo"].'</td>
											          <!-- 
											           -->
													  <td>'.$N["id"].'</td>
													 
													  <td>'.$N["nom_abrevi"].'</td>
													  <td>'.$N["grado"].'</td>
													  <td>'.$N["tipo"].'</td>
													  
													  ';
											
											if ($regu==1){
 	                                            
 	                                       	if($estado == "Promo Directa" || $estado == "Promo Indirecta"){

												echo '<td class="bg-info">

												'.$estado.' '.$estadof.'

												</td>';          									

											}else if($estado == "Regular" || $estado == "Libre"){

												echo '<td class="bg-success">

												'.$estado.'/'.$estadof.'

												</td>';
												
                                           } else if($estado == "Equivalencia"){

												echo '<td class="bg-warning">

												'.$estado.' '.$estadof.'

												</td>';
                                          }else {      
                                              
												echo '<td class="bg-danger">

												'.$estado.' '.$estadof.'

												</td>';

											}

											    
											}else {
 	                                          
 	                                              	$columna = "id_alumno";
							
	            						            $valor = $exp[2];
	            						            
        							                if ( $exp[1] == 8){
									    
		        							            $notas2 = MateriasC::VerNotasiC($columna, $valor);

				        					        } else if ( $exp[1] == 6){
						    			    
							        		             $notas2 = MateriasC::VerNotasnC($columna, $valor);

									                } else if ( $exp[1] == 7){

									                    $notas2 = MateriasC::VerNotassC($columna, $valor);

									                } else if ( $exp[1] == 9){

									                    $notas2 = MateriasC::VerNotascC($columna, $valor);

									                }  
	            						            
				                			
				                			        //$notas2 = MateriasC::VerNotasC($columna, $valor);
                                                    
                                                    $vacio=0;
											        $rc1=0;
                   							        $rc2=0;
                   							        $rc3=0;
                   							        $rc4=0;
                   								    $rc5=0;
                   								    $rc6=0;
                   								    $ac1=0;
                   								    $ac2=0;
                   								    $ac3=0;
                   								    $ac4=0;
											        
											        foreach ($notas2 as $key => $N2) {
                                                       $vacio=1;
                                                       
                                                       
                   								            
                   								       if ($N["rc1"]==0){ 
                   								        $rc1=1;
                   								            
                   								       }else if (($N2["id_materia"]== $N["rc1"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){     
                   								            $rc1=1;
                   								       }
                   								            
                   								       if ($N["rc2"]==0){ 
                   								            $rc2=1;
                   								        }else if (($N2["id_materia"]== $N["rc2"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc2=1;
                   								        }   
                   								        
                   								        if ($N["rc3"]==0){ 
                   								            $rc3=1;
                   								        }else if (($N2["id_materia"]== $N["rc3"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc3=1;
                   								        }   
                   								        
                   								        if ($N["rc4"]==0){ 
                   								            $rc4=1;
                   								        }else if (($N2["id_materia"]== $N["rc4"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc4=1;
                   								        }   
                   								        
                   								        if ($N["rc5"]==0){ 
                   								                $rc5=1;
                   								        }else if (($N2["id_materia"]== $N["rc5"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc5=1;
                   								        }   
                   								            
                   								        if ($N["rc6"]==0){ 
                   								            $rc6=1;
                   								        }else if (($N2["id_materia"]== $N["rc6"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $rc6=1;
                   								        }   
                   								            
                   								        if ($N["ac1"]==0){ 
                   								            $ac1=1;
                   								        }else if (($N2["id_materia"]== $N["ac1"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta") ){
                   								            $ac1=1;
                   								        }   
                   								            
                   								        if ($N["ac2"]==0){ 
                   								            $ac2=1;
                   								        }else if (($N2["id_materia"]== $N["ac2"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta") ){
                   								            $ac2=1;
                   								        }   
                   								            
                   								        if ($N["ac3"]==0){ 
                   								            $ac3=1;
                   								        }else if (($N2["id_materia"]== $N["ac3"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac3=1;
                   								        }
            
                   								        if ($N["ac4"]==0){ 
                   								            $ac4=1;
                   								        }else if (($N2["id_materia"]== $N["ac4"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac4=1;
                   								        }
            
            
                   								        $sipuede=0;
                   								        
                   								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1){
             	                                          $sipuede=1;
		    									           } 
         									             }
                                                        $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
                                                        
                                                        if ($vacio==0){
                                                            $rc1=0;
                       							            $rc2=0;
                       							            $rc3=0;
                               							    $rc4=0;
                               								$rc5=0;
                               								$rc6=0;
                               								$ac1=0;
                               								$ac2=0;
                               								$ac3=0;
                               								$ac4=0;
                               								            
                       								       if ($N["rc1"]==0){ 
                       								        $rc1=1;
                       								            
                       								       }
                       								            
                       								       if ($N["rc2"]==0){ 
                       								            $rc2=1;
                       								        }  
                       								        
                       								        if ($N["rc3"]==0){ 
                       								            $rc3=1;
                       								        }  
                       								        
                       								        if ($N["rc4"]==0){ 
                       								            $rc4=1;
                       								        }   
                       								        
                       								        if ($N["rc5"]==0){ 
                       								                $rc5=1;
                       								        }   
                       								            
                       								        if ($N["rc6"]==0){ 
                       								            $rc6=1;
                       								        }   
                       								            
                       								        if ($N["ac1"]==0){ 
                       								            $ac1=1;
                       								        }   
                       								            
                       								        if ($N["ac2"]==0){ 
                       								            $ac2=1;
                       								        }   
                       								            
                       								        if ($N["ac3"]==0){ 
                       								            $ac3=1;
                       								        }
                
                       								        if ($N["ac4"]==0){ 
                       								            $ac4=1;
                       								        }
                
                       								        $sipuede=0;
                       								        
                       								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1){
                 	                                          $sipuede=1;
    		    									           } 
     									                    
     									                    $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
 
                                                        }
                                                        
                                                        if ($sipuede==1){
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            $aa=0;
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                                
                                                                	if ($ma["id_materia"] == 123  &&  $ma["id_alumno"] == 280){
                                                            		    
                                                            		  $aa=1;
                                                            		
                                                            		}
                                                                $aa++;
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $exp[2]){
                                                            	    
                                                                    $comi = $ma["id_comision"];
                                                                    
                                                            		$regis = $ma["id"];
                                                            		
                                                            		$inscripto=1;
                                                            	
                                                                            
                                                            	     }
                                                            
                                                            }
                                                            if ($inscripto==1){
                                                            
                                                            $columna = "id";

                            								$valor = $comi;

							                            	$comision = MateriasC::VerComisiones2C($columna, $valor);
                                                            
                                                            $columna = "id";

								                            $valor = $comision["id_usuario"];

								                            $profe = UsuariosC::VerUsuariosC($columna, $valor);
								                            
								                            // '.$regis.'
								                            
                                                            echo '
                                                            <td class="bg-info">

												               comision ('.$comi.') Turno:('.$comision["turno"].') Profe:('.$profe["apellido"].' '.$profe["nombre"].') 

												            </td>';
									        				
                                                            }
                                                            $inscripto=0;
                                                            
									        				
                                                        } else {
                                                            // aqui no se puede
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            $aa=0;
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                                
                                                                	if ($ma["id_materia"] == 123  &&  $ma["id_alumno"] == 280){
                                                            		    
                                                            		  $aa=1;
                                                            		
                                                            		}
                                                                $aa++;
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $exp[2]){
                                                            	    
                                                                    $comi = $ma["id_comision"];
                                                                    
                                                            		$regis = $ma["id"];
                                                            		
                                                            		$inscripto=1;
                                                            	
                                                                            
                                                            	     }
                                                            
                                                            }
                                                            if ($inscripto==1){
                                                            
                                                            $columna = "id";

                            								$valor = $comi;

							                            	$comision = MateriasC::VerComisiones2C($columna, $valor);
                                                            
                                                            $columna = "id";

								                            $valor = $comision["id_usuario"];

								                            $profe = UsuariosC::VerUsuariosC($columna, $valor);
								                            
								                            // '.$regis.'
								                            
                                                            echo '
                                                            <td class="bg-danger">

												               comision ('.$comi.') Turno:('.$comision["turno"].') Profe:('.$profe["apellido"].' '.$profe["nombre"].') 

												            </td>';

                                                                
                                                            }
                                                            $inscripto=0;

                                                            
                                                            /// hasta aqui no se puede
                                                            
                                                            //$std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
                                                            //$std="";
                                                           // echo ' <td>'.$std.'</td>';
                                                        }
                                                        
                                                            
                                                            
											            $sipuede=0;
                                                        $vacio=0;
 	                                      }		  
													  
											echo '
											<!-- 
											       <td>'.$N["rc1"].'</td>
											       <td>'.$N["rc2"].'</td>
											       <td>'.$N["rc3"].'</td>
											       <td>'.$N["rc4"].'</td>
											       <td>'.$N["rc5"].'</td>
											       <td>'.$N["rc6"].'</td>
											       <td>'.$N["ac1"].'</td>
											       <td>'.$N["ac2"].'</td>
											       <td>'.$N["ac3"].'</td>
											       <td>'.$N["ac4"].'</td>
											 -->
											       </tr>';
 	                                      
 							
										 }
									    
							    	}else{
							    	  if($N["tipo"] == "2do Cuatrimestre" ){
										
										///
										    $columna = "id_alumno";
							
							                $valor = $exp[2];
							                
							                if ( $exp[1] == 8){
									    
									            $notas1 = MateriasC::VerNotasiC($columna, $valor);

									        } else if ( $exp[1] == 6){
									    
									             $notas1 = MateriasC::VerNotasnC($columna, $valor);

									        } else if ( $exp[1] == 7){

									            $notas1 = MateriasC::VerNotassC($columna, $valor);

									        } else if ( $exp[1] == 9){

									            $notas1 = MateriasC::VerNotascC($columna, $valor);

									        }  
						                
							
							                //$notas1 = MateriasC::VerNotasC($columna, $valor);
                                            
                                            $regu=0;
											
											foreach ($notas1 as $key => $N1) {
											    
											    if($N1["id_materia"] == $N["id"]){
											   
											      
											       
                   								   if($N1["estado"] == "Regular" || $N1["estado"] == "Equivalencia" || $N1["estado"] == "Promo Directa" || $N1["estado"] == "Promo Indirecta" || $N1["estado"] == "Libre"){
				
											          $regu=1;
											          $estado=$N1["estado"]; 
											          $estadof=$N1["estado_final"];  
                   								   }else {
                   								     $regu=0;  
                   								   }
											    } 
											} 
			                                 //  <td>'.$N["id"].'</td>
 	                                        echo '<tr>
											          <td>'.$N["codigo"].'aaa</td>
											          <td>'.$N["id"].'</td>
													   <td>'.$N["nom_abrevi"].'</td>
													  <td>'.$N["grado"].'</td>
													  <td>'.$N["tipo"].'</td>
													  
													  ';
											
											if ($regu==1){
 	                                            
 	                                           //echo ' <td>'.$estado.'</td>';
 	                                           
 	                                           if($estado == "Promo Directa" || $estado == "Promo Indirecta"){

												echo '<td class="bg-info">

												'.$estado.' '.$estadof.'

												</td>';          									

											}else if($estado == "Regular" || $estado == "Libre"){

												echo '<td class="bg-success">

												'.$estado.'/'.$estadof.'

												</td>';
												
                                           } else if($estado == "Equivalencia"){

												echo '<td class="bg-warning">

												'.$estado.' '.$estadof.'

												</td>';
                                         
                                          }else {
												
												echo '<td class="bg-danger">

												'.$estado.' '.$estadof.'

												</td>';

											}
 	                                           
 	                                           
 	                                           
 	                                      }else {
 	                                          
 	                                              	$columna = "id_alumno";
							
	            						            $valor = $exp[2];
	            						            
    	   							                if ( $exp[1] == 8){
									    
	        								            $notas2 = MateriasC::VerNotasiC($columna, $valor);

			        						        } else if ( $exp[1] == 6){
									    
					        				             $notas2 = MateriasC::VerNotasnC($columna, $valor);

							        		        } else if ( $exp[1] == 7){

									                    $notas2 = MateriasC::VerNotassC($columna, $valor);

									                } else if ( $exp[1] == 9){

									                    $notas2 = MateriasC::VerNotascC($columna, $valor);

									                }  
         						            
				                			
				                			        //$notas2 = MateriasC::VerNotasC($columna, $valor);
                                                    
                                                    $vacio=0;
											        $rc1=0;
                   							        $rc2=0;
                   							        $rc3=0;
                   							        $rc4=0;
                   								    $rc5=0;
                   								    $rc6=0;
                   								    $ac1=0;
                   								    $ac2=0;
                   								    $ac3=0;
                   								    $ac4=0;
											        foreach ($notas2 as $key => $N2) {
                                                       $vacio=1;
                                                    
                   								       if ($N["rc1"]==0){ 
                   								        $rc1=1;
                   								            
                   								       }else if (($N2["id_materia"]== $N["rc1"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){     
                   								            $rc1=1;
                   								       }
                   								            
                   								       if ($N["rc2"]==0){ 
                   								            $rc2=1;
                   								        }else if (($N2["id_materia"]== $N["rc2"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc2=1;
                   								        }   
                   								        
                   								        if ($N["rc3"]==0){ 
                   								            $rc3=1;
                   								        }else if (($N2["id_materia"]== $N["rc3"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc3=1;
                   								        }   
                   								        
                   								        if ($N["rc4"]==0){ 
                   								            $rc4=1;
                   								        }else if (($N2["id_materia"]== $N["rc4"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc4=1;
                   								        }   
                   								        
                   								        if ($N["rc5"]==0){ 
                   								                $rc5=1;
                   								        }else if (($N2["id_materia"]== $N["rc5"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   								            $rc5=1;
                   								        }   
                   								            
                   								        if ($N["rc6"]==0){ 
                   								            $rc6=1;
                   								        }else if (($N2["id_materia"]== $N["rc6"]) && ($N2["estado"] == "Regular" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $rc6=1;
                   								        }   
                   								            
                   								        if ($N["ac1"]==0){ 
                   								            $ac1=1;
                   								        }else if (($N2["id_materia"]== $N["ac1"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac1=1;
                   								        }   
                   								            
                   								        if ($N["ac2"]==0){ 
                   								            $ac2=1;
                   								        }else if (($N2["id_materia"]== $N["ac2"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac2=1;
                   								        }   
                   								            
                   								        if ($N["ac3"]==0){ 
                   								            $ac3=1;
                   								        }else if (($N2["id_materia"]== $N["ac3"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $ac3=1;
                   								        }
            
                   								        if ($N["ac4"]==0){ 
                   								            $ac4=1;
                   								        }else if (($N2["id_materia"]== $N["ac4"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $ac4=1;
                   								        }
            
            
                   								        $sipuede=0;
                   								        
                   								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1){
             	                                          $sipuede=1;
		    									           } 
         									            
											            }
                                                        $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
                                                        if ($vacio==0){
                                                            $rc1=0;
                       							            $rc2=0;
                       							            $rc3=0;
                               							    $rc4=0;
                               								$rc5=0;
                               								$rc6=0;
                               								$ac1=0;
                               								$ac2=0;
                               								$ac3=0;
                               								$ac4=0;
                               								            
                       								       if ($N["rc1"]==0){ 
                       								        $rc1=1;
                       								            
                       								       }
                       								            
                       								       if ($N["rc2"]==0){ 
                       								            $rc2=1;
                       								        }  
                       								        
                       								        if ($N["rc3"]==0){ 
                       								            $rc3=1;
                       								        }  
                       								        
                       								        if ($N["rc4"]==0){ 
                       								            $rc4=1;
                       								        }   
                       								        
                       								        if ($N["rc5"]==0){ 
                       								                $rc5=1;
                       								        }   
                       								            
                       								        if ($N["rc6"]==0){ 
                       								            $rc6=1;
                       								        }   
                       								            
                       								        if ($N["ac1"]==0){ 
                       								            $ac1=1;
                       								        }   
                       								            
                       								        if ($N["ac2"]==0){ 
                       								            $ac2=1;
                       								        }   
                       								            
                       								        if ($N["ac3"]==0){ 
                       								            $ac3=1;
                       								        }
                
                       								        if ($N["ac4"]==0){ 
                       								            $ac4=1;
                       								        }
                
                       								        $sipuede=0;
                       								        
                       								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1){
                 	                                          $sipuede=1;
    		    									           } 
     									           
 
                                                        }
                                                        
                                                        if ($sipuede==1){
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $exp[2]){
                                                            
                                                            		$inscripto=1;
                                                            
                                                            	}
                                                            
                                                            }
 
                                                            $inscripto=0;
                                                            

                                                        } else {
                                                            
                                                            $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
                                                            
                                                           //$std="";
                                                            
                                                            echo ' <td>'.$std.'</td>';

                                                            
                                                           
                                                        }	

											            
											            $sipuede=0;
                                                        $vacio=0;
 	                                      }		  
													  
											echo '
											       </tr>';

									    }
							    	    
							    	}
							}
							echo '</tbody>
						</table>';
						
				//-/ }
				///---///
				//}else{
				//	echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones...</div>';
				//}
				?>
			</div>
		</div>
	</section>
</div>

