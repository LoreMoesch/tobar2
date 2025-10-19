
<div class="container">
	<section class="content-header">
	
		<?php
	
		// es para alumno
		// muestro la carrera del alumno
	
		$columna = "id";
		$valor = $_SESSION["id_carrera"];
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);
	
		echo '<h1>Materias de la Carrera: '.$carrera["nombre"].'</h1>
		<br/> ';
		$columna = "id";
		$valor = 1;
		$ajustes = AjustesC::VerAjustesC($columna, $valor);
		
		if($ajustes["h_materias"] == 0){
			
		    echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones...</div>';  
		
		}
		
		echo ' 
		<a href="http://localhost/tobar2/pdfs/inscripcion_alumno.php/'.$_SESSION["id_carrera"].'/'.$_SESSION["id"].'" target="blank">
	         <button class="btn btn-primary">Generar PDF de Inscripci&oacute;n</button>
	     </a>  ';
		
	
		if($ajustes["h_materias"] != 0){
		    
		?>

	
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<?php
					//	if($ajustes["h_materias"] != 0){
				    //-/if ($_SESSION["id_carrera"]==10) {
	                //-/ 	echo '<div class="alert alert-warning">Debes primero eligir Orientacion... en "Plan de Estudios"</div>';
				    //-/ } else {
					echo '<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Estado</th>
									<th>Cod.</th>
									<th>Id</th>
     								<th>Nombre</th>
									<th>A&ntilde;o</th>
									<th>Tipo</th>
								</tr>
							</thead>
							<tbody>';
							$columna = "id_carrera";
							$valor = $_SESSION["id_carrera"];
							$notas = MateriasC::VerMaterias3C($columna, $valor);
							foreach ($notas as $key => $N) {
									if($ajustes["cuatrimestre"] != "2do Cuatrimestre" ){
										if($N["tipo"] != "2do Cuatrimestre" ){
										    $columna = "id_alumno";
							                $valor = $_SESSION["id"];
							                if ( $_SESSION["id_carrera"] == 8){
									            $notas1 = MateriasC::VerNotasiC($columna, $valor);
									        } else if ( $_SESSION["id_carrera"] == 6){
									             $notas1 = MateriasC::VerNotasnC($columna, $valor);
									        } else if ( $_SESSION["id_carrera"] == 7){
									            $notas1 = MateriasC::VerNotassC($columna, $valor);
									        } else if ( $_SESSION["id_carrera"] == 9){
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
                                            /// comienza tabla////
 	                                             echo '<tr>';
											if ($regu==1){
 	                                       	if($estado == "Promo Directa" || $estado == "Promo Indirecta"){
												echo '<td class="bg-info">
												'.$estado.'
												</td>';          									
											}else if($estado == "Regular" && $estadof == "Aprobado"){
												echo '<td class="bg-success">
												'.$estado.'/'.$estadof.'
												</td>';
   										   }else if($estado == "Regular" && $estadof == "Libre"){
												echo '<td class="bg-success">
												'.$estado.'/'.$estadof.'
												</td>';
                                           } else if($estado == "Equivalencia"){
												echo '<td class="bg-warning">
												'.$estado.' '.$estadof.'
												</td>';
                                          }else {      
												echo '<td class="bg-success">
												'.$estado.' '.$estadof.'
												</td>';
											}
											}else {
 	                                          
 	                                              	$columna = "id_alumno";
							
	            						            $valor = $_SESSION["id"];
	            						          
	            						           if ( $_SESSION["id_carrera"] == 8){
									    
									                    $notas2 = MateriasC::VerNotasiC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 6){
									    
									                    $notas2 = MateriasC::VerNotasnC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 7){

									                    $notas2 = MateriasC::VerNotassC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 9){

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
                   								    
                   								    //////////
											        $a2=0;
                   								    
                   								    $a1=0;
											        $a3=0;
											        $a4=0;
											        $a5=0;
											        $a6=0;
											        $a7=0;
											        $a8=0;
											        $a9=0;
											        $abc=0;
											        
											        /////////
											        
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
            
                   								        if ($N["ac5"]==0){ 
                   								            $ac5=1;
                   								        }else if (($N2["id_materia"]== $N["ac5"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac5=1;
                   								        }

                   								        if ($N["ac6"]==0){ 
                   								            $ac6=1;
                   								        }else if (($N2["id_materia"]== $N["ac6"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac6=1;
                   								        }
                   								        if ($N["ac7"]==0){ 
                   								            $ac7=1;
                   								        }else if (($N2["id_materia"]== $N["ac7"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								            $ac7=1;
                   								        }
                   								        /////
                   								        
                   								        if ($N["aac"]==0){
                   								          $abc=1;
                   								        } else {
                   								          $abc=0;  
                   								        } 
                   								            

                   								        if (($N2["id_materia"]== 162) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a1=1;
                   								        } 
                   								        if (($N2["id_materia"]== 163) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a2=1;
                   								        }
                   								        if (($N2["id_materia"]== 164) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a3=1; 
                   								        }
                   								        if (($N2["id_materia"]== 165) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a4=1; 
                   								        }
                   								        if (($N2["id_materia"]== 166) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a5=1; 
                   								        }
                   								        if (($N2["id_materia"]== 167) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a6=1; 
                   								        }
                   								        if (($N2["id_materia"]== 170) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a7=1; 
                   								        }
                   								        if (($N2["id_materia"]== 168) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a8=1; 
                   								        }
                   								        if (($N2["id_materia"]== 169) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a9=1; 
                   								        }
                   								       
                   								        $aaa=$a1.$a2.$a3.$a4.$a5.$a6.$a7.$a8.$a9;
                                                        
                                                        if ($aaa=="111111111"){
                                                            $abc=1;    
                                                        }
                                                        
                                                        //////////
                                                        
                   								        $sipuede=0;
                   								        
                   								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1 && $ac5==1 && $ac6==1 && $ac7==1 && $abc==1){
             	                                          $sipuede=1;
		    									           } 
         									             }
                                                        $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
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
                               								$ac5=0;
                               								$ac6=0;
                               								$ac7=0;
                               								
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
                
                       								        if ($N["ac5"]==0){ 
                       								            $ac5=1;
                       								        }

                       								        if ($N["ac6"]==0){ 
                       								            $ac6=1;
                       								        }
                                                            
                                                            if ($N["ac7"]==0){ 
                       								            $ac7=1;
                       								        }

                       								        $sipuede=0;
                       								        
                       								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1 && $ac5==1 && $ac6==1 && $ac7==1){
                 	                                          $sipuede=1;
    		    									           } 
     									                    
     									                    $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
 
                                                        }
                                                        
                                                        if ($sipuede==1){
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $_SESSION["id"]){
                                                                 
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
								                            
                                                            //echo '
                                                            //<td class="bg-info">

												            //   comision ('.$comi.') Turno:('.$comision["turno"].') Profe:('.$profe["apellido"].' '.$profe["nombre"].') 

												            //</td>';                                                                
                                                                
                                                             if($ajustes["h_materias"] != 0){   
                                                            
                                                            echo '<td>
			        											<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$N["id"].'">
					    		    								<button class="btn btn-success">Ver Incripci&oacute;n</button>
						        								</a>
									        				</td>';
                                                            
                                                             } else {
                                                                 
                                                                echo '<td></td>'; 
                                                             }
                                                                
                                                                
                                                            }else {
                                                                
                                                              if($ajustes["h_materias"] != 0){  
                                                                
                                                                echo '<td>
			        											<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$N["id"].'">
					    		    								<button class="btn btn-primary">Inscribirse</button>
						        								</a>
									        			    	</td>';
									        				
                                                              } else {
                                                                    echo '<td></td>'; 
                                                              }
									        				
                                                                
                                                            }
                                                            $inscripto=0;
                                                            
                                                            
                                                            
									        				
                                                        } else {
                                                            
                                                            // aqui no se puede
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $_SESSION["id"]){
                                                                 
                                                                    $comi = $ma["id_comision"];
                                                                    
                                                            		$regis = $ma["id"];                                                           	    
                                                            	    
                                                            	  	$inscripto=1;
                                                            
                                                            	}
                                                            
                                                            }
                                                            //$std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
                                                            $std="";
                                                            echo '<td></td>';  
                                                            
                                                            if ($inscripto==1){
                                                                
                                                            $columna = "id";

                            								$valor = $comi;

							                            	$comision = MateriasC::VerComisiones2C($columna, $valor);
                                                            
                                                            $columna = "id";

								                            $valor = $comision["id_usuario"];

								                            $profe = UsuariosC::VerUsuariosC($columna, $valor);
								                            
								                            // '.$regis.'
								                            
                                                            echo '
                                                            <td>

												               xxxxx 

												            </td>';           
                                                            }
                                                            /// aqui termina
                                                            
 
                                                            //echo ' <td>'.$std.'</td>';
                                                            //echo ' <td>'.$abc.'</td>';
                                                            
                                                            
                                                            
                                                        }											            
											            $sipuede=0;
                                                        $vacio=0;
 	                                      }		  
													  
											
											echo'<td>'.$N["codigo"].'</td>
											     <!-- 
											      -->
											     <td>'.$N["id"].'</td>';
											
									    	if ($N["taller"]==1){
											    
											      echo '<td class="bg-info">'.$N["nom_abrevi"].'</td>';
										          //echo'<td class="bg-info">'.$value["nom_abrevi"].'</td>';
											
										       } else {
											
										          echo '<td>'.$N["nom_abrevi"].'</td>';
											
									         }
											     
											
											     
											echo '<td>'.$N["grado"].'</td>
											     <td>'.$N["tipo"].'</td>';
											
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
											       <td>'.$N["ac5"].'</td>
											       <td>'.$N["ac6"].'</td>
											 -->
											       </tr>';
 	                                      
 							
										 }
									    
							    	
									  
									////////////////////// fin primer cuatrimestre ////////////////////////////////// 
								
									}else{
							    	  
							    	  if($N["tipo"] == "2do Cuatrimestre" ){
										
										    $columna = "id_alumno";
							
							                $valor = $_SESSION["id"];
							                
							           	   if ( $_SESSION["id_carrera"] == 8){
									    
									            $notas1 = MateriasC::VerNotasiC($columna, $valor);

									        } else if ( $_SESSION["id_carrera"] == 6){
									    
									            $notas1 = MateriasC::VerNotasnC($columna, $valor);

									       } else if ( $_SESSION["id_carrera"] == 7){

									             $notas1 = MateriasC::VerNotassC($columna, $valor);

									        } else if ( $_SESSION["id_carrera"] == 9){

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
 	                                        echo '<tr>';
 	                                        
																						
											if ($regu==1){
 	                                            
 	                                           //echo ' <td>'.$estado.'</td>';
 	                                           
 	                                           if($estado == "Promo Directa" || $estado == "Promo Indirecta"){

												echo '<td class="bg-info">

												'.$estado.' '.$estadof.'

												</td>';          									

											}else if($estado == "Regular" && $estadof == "Libre"){

												echo '<td class="bg-success">

												'.$estado.'/'.$estadof.'

												</td>';
												
											}else if($estado == "Regular" && $estadof == "Aprobado"){

												echo '<td class="bg-success">

												'.$estado.'/'.$estadof.'

												</td>';

                                           } else if($estado == "Equivalencia"){

												echo '<td class="bg-warning">

												'.$estado.' '.$estadof.'

												</td>';
                                         
                                          }else {
												
												echo '<td class="bg-success">

												'.$estado.' '.$estadof.'

												</td>';

											}
 	                                           
 	                                           
 	                                           
 	                                      }else {
 	                                          
 	                                              	$columna = "id_alumno";
							
	            						            $valor = $_SESSION["id"];
	            						            
	            						            if ( $_SESSION["id_carrera"] == 8){
									    
									                    $notas2 = MateriasC::VerNotasiC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 6){
									    
									                    $notas2 = MateriasC::VerNotasnC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 7){

									                    $notas2 = MateriasC::VerNotassC($columna, $valor);

									                } else if ( $_SESSION["id_carrera"] == 9){

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
                   								    
                   								    //////////
											        
											        $a2=0;
                   								    $a1=0;
											        $a3=0;
											        $a4=0;
											        $a5=0;
											        $a6=0;
											        $a7=0;
											        $a8=0;
											        $a9=0;
											        $abc=0;
											        
											        /////////
                   								    
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

                   								        if ($N["ac5"]==0){ 
                   								            $ac5=1;
                   								        }else if (($N2["id_materia"]== $N["ac5"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $ac5=1;
                   								        }
  
                     								    if ($N["ac6"]==0){ 
                   								            $ac6=1;
                   								        }else if (($N2["id_materia"]== $N["ac6"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $ac6=1;
                   								        }
                      								  
                      								    if ($N["ac7"]==0){ 
                   								            $ac7=1;
                   								        }else if (($N2["id_materia"]== $N["ac7"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                   								            $ac7=1;
                   								        }
                           
                   								        /////
                   								        
                   								        if ($N["aac"]==0){
                   								          $abc=1;
                   								        } else {
                   								          $abc=0;  
                   								        } 
                   								            

                   								        if (($N2["id_materia"]== 162) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a1=1;
                   								        } 
                   								        if (($N2["id_materia"]== 163) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a2=1;
                   								        }
                   								        if (($N2["id_materia"]== 164) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a3=1; 
                   								        }
                   								        if (($N2["id_materia"]== 165) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a4=1; 
                   								        }
                   								        if (($N2["id_materia"]== 166) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a5=1; 
                   								        }
                   								        if (($N2["id_materia"]== 167) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a6=1; 
                   								        }
                   								        if (($N2["id_materia"]== 170) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a7=1; 
                   								        }
                   								        if (($N2["id_materia"]== 168) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a8=1; 
                   								        }
                   								        if (($N2["id_materia"]== 169) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   								         $a9=1; 
                   								        }
                   								       
                   								        $aaa=$a1.$a2.$a3.$a4.$a5.$a6.$a7.$a8.$a9;
                                                        
                                                        if ($aaa=="111111111"){
                                                            $abc=1;    
                                                        }
                                                        
                                                        //////////
                                                        

                   								        $sipuede=0;
                   								        
                   								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1 && $ac5==1 && $ac6==1 && $ac7==1 && $abc==1){
             	                                          $sipuede=1;
		    									           } 
         									            
											            }
                                                        $std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
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
                               								$ac5=0;
                               								$ac6=0;
                               								$ac7=0;
                               								
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

                                                            if ($N["ac5"]==0){ 
                       								            $ac5=1;
                       								        }
                       								        
                       								        if ($N["ac6"]==0){ 
                       								            $ac6=1;
                       								        }
                       								        
                       								        if ($N["ac7"]==0){ 
                       								            $ac7=1;
                       								        }
                       								        $sipuede=0;
                       								        
                       								        if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1 && $ac5==1 && $ac6==1 && $ac7==1 ){
                 	                                          $sipuede=1;
    		    									           } 
     									           
 
                                                        }
                                                        
                                                        if ($sipuede==1){
                                                            
                                                            $inscripto=0;
                                                            
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = MateriasC::VerInscMateriasC($columna, $valor);
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $_SESSION["id"]){
                                                            
                                                            		$inscripto=1;
                                                            
                                                            	}
                                                            
                                                            }
                                                            if ($inscripto==1){
                                                            
                                                            if($ajustes["h_materias"] != 0){  
                                                            
                                                            echo '<td>
			        											<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$N["id"].'">
					    		    								<button class="btn btn-success">Ver Incripci&oacute;n</button>
						        								</a>
									        				</td>';
                                                            
                                                                
                                                            } else if($ajustes["h_materias"] == 0) {
                                                                
                                                                echo '<td></td>';
                                                            }
                                                            
                                                                
                                                            }else {
                                                                
                                                                if($ajustes["h_materias"] != 0){  
                                                                
                                                                echo '<td>
			        											<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$N["id"].'">
					    		    								<button class="btn btn-primary">Inscribirse</button>
						        								</a>
									        				</td>';
                                                                } else if($ajustes["h_materias"] == 0){
                                                                    
                                                                echo ' <td></td>';    
                                                                }
                                                                
                                                            }
                                                            $inscripto=0;
									        				
                                                        } else {
                                                            //$std=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
                                                            $std="";
                                                            echo ' <td>'.$std.'</td>';
                                                        }											            
											            $sipuede=0;
                                                        $vacio=0;
 	                                      }		  
											     echo ' <td>'.$N["codigo"].'</td>
											          <td>'.$N["id"].'</td>';
							    	  
							    	      	if ($N["taller"]==1){
											    
											      echo '<td class="bg-info">'.$N["nom_abrevi"].'</td>';
										         
										       } else {
											
										          echo '<td>'.$N["nom_abrevi"].'</td>';
											
									         }
							    	  
							    	       
												//echo  ' <td>'.$N["nom_abrevi"].'</td>';
												
												echo	 ' <td>'.$N["grado"].'</td>
													  <td>'.$N["tipo"].'</td>';

													  
											//echo '
											//       <td>'.$N["rc1"].'</td>
											//       <td>'.$N["rc2"].'</td>
											//       <td>'.$N["rc3"].'</td>
											//       <td>'.$N["rc4"].'</td>
											//       <td>'.$N["rc5"].'</td>
											//       <td>'.$N["rc6"].'</td>
											//       <td>'.$N["ac1"].'</td>
											//       <td>'.$N["ac2"].'</td>
											//       <td>'.$N["ac3"].'</td>
											//       <td>'.$N["ac4"].'</td>
											//       </tr>';

											echo '
											       </tr>';

										
										
										//	echo '<tr>
										//			<td>'.$N["codigo"].'</td>
										//			<td>'.$N["nombre"].'</td>
										//			<td>'.$N["grado"].'</td>
										//			<td>'.$N["tipo"].'</td>
										//			<td>'.$N["estado"].'</td>
										//			<td>
										//				<a href="http://localhost/tobar2/insc-materia/'.$_SESSION["id_carrera"].'/'.$N["id"].'">
										//					<button class="btn btn-primary">Ver Detalle</button>
										//				</a>
										//			</td>
										//		</tr>';
										
										
									    }
							    	    
							    	}
							}
							
				
							echo '</tbody>
						</table>';
						
				 

				
				?>
			</div>
		</div>
		
		
	</section>
</div>
<?php
}
?>

