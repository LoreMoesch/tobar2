<?php
// Ultima modificacion el 22/01/2023
?>
<div class="container">
	<section class="content-header">
		<?php
		$andrada=0;
		// es para alumno
		// muestro la carrera del alumno
		$columna = "id";
		$valor = $_SESSION["id_carrera"];
		$carrera = CarrerasC::VerCarreras2C($columna, $valor);
		echo '<h1>Materias de la Carrera: '.$carrera["nombre"].'</h1>
		<br/>';
		$columna = "id";
		$valor = 1;
		$ajustes = AjustesC::VerAjustesC($columna, $valor);
		//if($ajustes["h_examenes"] != 0){
		echo ' 
		<a href="http://localhost/tobar2/pdfs/insc_alu_exa.php/'.$_SESSION["id_carrera"].'/'.$_SESSION["id"].'" target="blank">
	         <button class="btn btn-primary">Generar PDFs de Inscripci&oacute;n</button>
	     </a>
	     <br/>';
		//}else {
		//}
		?>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<?php
				if($ajustes["h_examenes"] != 0){
					echo '<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Estado</th>
									<th>C&oacute;d.</th>
									<th>Id</th>
									<th>Nombre</th>
									<th>A&ntilde;o</th>
									<th>Tipo</th>
							  <!--
									<th>Fecha</th>
									<th>Turno</th>
									<th>Profesor</th>
									<th>Llamado</th>
                               -->
								</tr>
							</thead>
							<tbody>';
					        $llamado3 = ExamenesC::VerTurnoC();
                            foreach ($llamado3 as $key => $valores) {
                                if ($valores["estado"]==1) {
                                  $llamado_a1=$valores["id"];
                                }
                            }
							$columna = "id_carrera";
							$valor = $_SESSION["id_carrera"];
							$notas = MateriasC::VerMaterias3C($columna, $valor);
							foreach ($notas as $key => $N) {
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
											$regu2=0;
											$regu3=0;
											////////// empieza notas1 --> $N1
											foreach ($notas1 as $key => $N1) {
											    if($N1["id_materia"] == $N["id"]){
											       if($N1["estado_final"] == "Aprobado" || $N1["estado"] == "Equivalencia" || $N1["estado"] == "Promo Directa" || $N1["estado"] == "Promo Indirecta"){
											          $regu=1;
					                                   if ($N1["estado_final"] == "Aprobado"){                 					
											                $estado=$N1["estado_final"]; 
					                                   } else{
					                                       $estado=$N1["estado"];
					                                   }
					                           	   }else {
                   								     $regu=0;  
                   								   }
                   								   if($N1["estado"] == "Regular"){
                   								       $regu2=1;
                   								       $comi=$N1["comisionc"];
                   								       $llamado_a=$N1["llamado"];
                   								   } 
                   								   if ($regu==1 || $regu2==1){
                   								       $regu3=1;    
                   								   }
											    } 
											} 
											///////// aqui termina notas1 --> $N1
										    $columna =  "id_materia";
						                    $valor = $N["id"];
						                    $examenesv = ExamenesC::VerExamenesC($columna, $valor);
											echo '<tr>';
											if ($regu==0){
 	                                      // proceso para ver si el alumno es regular 
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
       							            $ar1=0;
                   							$ar2=0;
                   							$libre=0;
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
											//////// aqui comienza $notas2 --> $N2
										foreach ($notas2 as $key => $N2) {
                                            $vacio=1;
                   							// aqui materias libres // 
                   							// 6 -- 155 118 120 200 - 4) 236 237
                   							// 7 -- 164 10 12 228   - 4) 244 245
                   							// 8 -- 173 86 84 219   - 4) 252 253
                   							// 9 -- 182 46 48 209   - 4) 260 261
								            if ($N["id"]==155 || $N["id"]==118 || $N["id"]==120 || $N["id"]==200 || $N["id"]==164 || $N["id"]==10 || $N["id"]==12 || $N["id"]==228 || $N["id"]==173  || $N["id"]==86 || $N["id"]==219 || $N["id"]==84 || $N["id"]==182 || $N["id"]==46 || $N["id"]==48 || $N["id"]==209 || $N["id"]==236 || $N["id"]==237 || $N["id"]==244 || $N["id"]==245 || $N["id"]==252 || $N["id"]==253 || $N["id"]==260 || $N["id"]==261){
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
                      						    }else if (($N2["id_materia"]== $N["ac1"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                      							  $ac1=1;
                       						  }   
                       								            
                       						  if ($N["ac2"]==0){ 
                       						    $ac2=1;
                       						    }else if (($N2["id_materia"]== $N["ac2"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){
                       						      $ac2=1;
                       						 }   
                       								            
                       						 if ($N["ac3"]==0){ 
                       						   $ac3=1;
                       						   }else if (($N2["id_materia"]== $N["ac3"]) && ($N2["estado_final"] == "Aprobado" || $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                   							      $ac3=1;
                       						 }
                
                       						 if ($N["ac4"]==0){ 
                       						   $ac4=1;
                       						   }else if (($N2["id_materia"]== $N["ac4"]) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                       						      $ac4=1;
                       						 }
                       						
                       						 if ($N["ac5"]==0){ 
                       						   $ac5=1;
                       						   }else if (($N2["id_materia"]== $N["ac5"]) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                       						     $ac5=1;
                       						 }
                       						
                       						 if ($N["ac6"]==0){ 
                       						   $ac6=1;
                       						   }else if (($N2["id_materia"]== $N["ac6"]) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                       						     $ac6=1;
                       						 }
                       						
                       						 if ($N["ac7"]==0){ 
                       						   $ac7=1;
                       						   }else if (($N2["id_materia"]== $N["ac7"]) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta" )){
                       						     $ac7=1;
                       						 }

											 if ($rc1==1 && $rc2==1 && $rc3==1 && $rc4==1 && $rc5==1 && $rc6==1 && $ac1==1 && $ac2==1 && $ac3==1 && $ac4==1 && $ac5==1 && $ac6==1 && $ac7==1 ){
             	                             
             	                                $libre=1;
		    								
		    								 } 
		    									            
									        } 
										
										///////termina materias libres
										
                   						     if ($N["rc1"]==0) {
                   								           
                   						           $NN=$N2["id_materia"];
                   								       
                   						     } else {
                   								           
                   						           $NN=$N["rc1"];
                   						     }
                   								       
                   						    if ($N["ar1"]==0){ 
                   						      $ar1=1;
                   						      }else if (($N2["id_materia"]== $NN) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){     
                   						          $ar1=1;
                   						     }
                   								       
                   						    if ($N["ar2"]==0){ 
                   						      $ar2=1;
                   						      }else if (($N2["id_materia"]== $N["rc2"]) && ($N2["estado_final"] == "Aprobado"|| $N2["estado"] == "Equivalencia" || $N2["estado"] == "Promo Directa" || $N2["estado"] == "Promo Indirecta")){ 
                   						          $ar2=1;
                   						    }   
                   								        
                   								        
                   						  $sipuede=0;
                   						  
                   						  $std2=0;
                   						  
                   						  if ($ar1==1 && $ar2==1 && $regu2==1){
                   						        
             	                               $sipuede=1;
             	                          
                   						  }
                   						  
                   						  if ($ar1==1 && $ar2==1){
                   						  
                   						       $std2=1;
                   						  
                   						  }
		    									           
								      }
											            
									  //////// aqui termina $notas2 --> $N2
											
									  $std=$ar1.$ar2.$regu2;
                                            
                                      //$std1=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4;
                                            
                                      $std1=$rc1.$rc2.$rc3.$rc4.$rc5.$rc6.$ac1.$ac2.$ac3.$ac4.$ac5.$ac6.$ac7;
                                        
                                      $std22=$ar1.$ar2;                    
                                      
                                      if ($vacio==0){
    
                                      /// cuando no entra esta vacia       
                                      
                                      }
                                                        
                                      if ($sipuede==1){
                                                            
                                         $condicion=0;
                                                           
                                         $inscripto=0;
                                                            
                                         $columna = "id_materia";
                                                            
                                         $valor = $N["id"];
                                                            
                                         $ins = ExamenesC::VerInscExamenC($columna, $valor);
                                                            
                                         foreach ($ins as $key => $ma) {
                                                            
                                           	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $_SESSION["id"] && $ma["condicion"] == "Regular"){
                                                            
                                               		$inscripto=1;
                                                            		
                                               		$id_ins=$ma["id"];
                                                            		
                                               		$id_exam=$ma["id_examen"];
                                                            
                                           	}
                                                            
                                         }
                                                            
                                         if ($N["comun"]==1){
                                                                
                                           $columna =  "id_comision";
                                                                
                                           $valor = $comi;
                                                                
                                          } else {
                                                                
                                             $columna =  "id_materia";
						                                
						                      $valor = $N["id"];
                                          }
						                                    
						                  $examenes = ExamenesC::VerExamenesC($columna, $valor);
						                                    
                                          /// inicio alumno con condicion Regular
                                                            
                                          if ($inscripto==1){
                                                $estadoa="Inscripto Regular";
                                                $estadoe="Regular";
                                                $columna = "id";
                                                $valor = $id_exam;
                                                $inscp = ExamenesC::VerExamenesC($columna, $valor);
                                                if ($N["comun"]==1){
                                                		 } 
                                                echo '<td>
                                                <a href="http://localhost/tobar2/pdfs/Comprobante-Exa.php/'.$_SESSION["id_carrera"].'/'.$_SESSION["id"].'/'.$examenes["id"].'/'.$id_ins.'/'.$estadoe.'"target="blank">
                                                <!--
                                                <a href="http://localhost/tobar2/inscripto-E/'.$_SESSION["id_carrera"].'/'.$examenes["id"].'/'.$id_ins.'/'.$condicion.'">
					       		                -->
					       		    			<button class="btn btn-warning">Comprobante</button>
						            			</a>
                                                </td>';
                                             }else {
                                                $andrada=1;
								                if ($examenes["id_comision"]<>0){
							                    	if ($N["comun"]==1){
								                    	 }
							                    	if($examenes["hora"]=="Mañana"){
								                       $turno=1;
								                      } else if($examenes["hora"]=="Tarde"){
								                       $turno=2;    
								                     }
	     							                // $exp[1]= $id_carrera del alumno
                                                    // $exp[2]= $id  Examenes de ins-examen
                                                    // $exp[3]= $id_materia de ins-examen
                                                    // $exp[4]= $condicion =1 ->libre =0->regular
                                                    // $exp[5]= $turno =1 ->Mañana =2->Tarde
                                                    // $exp[6]= Orden
                                                     $reg_a=(12+$llamado_a)-$llamado_a1;
                                                     if ($reg_a==1){
                                                        $reg_a1="Ultimo LLamado";
                                                      }else {
                                                        $reg_a1="Queda ".$reg_a." llamado/s"; 
                                                      }
                                                      if ($reg_a<>0){
                                                        $condicion1=2;   
                                                           echo '<td>
                                                            <a href="http://localhost/tobar2/insc-examen/'.$_SESSION["id_carrera"].'/'.$examenes["id_comision"].'/'.$N["id"].'/'.$condicion1.'/'.$turno.'/'.$N["comun"].'">
	                                                        <!--
	                                                        <button class="btn btn-primary">P/Regular"'.$std.'/'.$std1.' ('.$reg_a1.')"</button>
	                                                        --> 
	                                                        <button class="btn btn-primary">Regular1 ('.$reg_a1.')</button>
	                                                        </a> </td>';
                                                          }else if ($reg_a<=0){
                                                            echo '<td class="bg-danger">
    									                       Regularidad Vencida
										                       </td>'; 
                                                          }
	        								                } else {

												                   echo '
                                                                
                                                                   <td class="bg-success">

												                   Ver comision';

												                   echo'</td>'; 

												                } 
			
                                                       }

                                                            /// fin alumno con condicion Regular

									        			    /// inicio alumno con condicion libre 	

                                                        } else if($libre==1 && $regu2==0 && $std2==1) {
                                                            
                                                            $condicion=1;
                                                            $inscripto=0;
                                                            $columna = "id_materia";
                                                            
                                                            $valor = $N["id"];
                                                            
                                                            $ins = ExamenesC::VerInscExamenC($columna, $valor);
                                                            
                                                            foreach ($ins as $key => $ma) {
                                                            
                                                            	if($ma["id_materia"] == $N["id"] && $ma["id_alumno"] == $_SESSION["id"] && $ma["condicion"] == "Libre"){
                                                            
                                                            		$inscripto=1;
                                                            		$id_ins=$ma["id"];
                                                            
                                                            	}
                                                            
                                                            }
                                                            
                                                            $columna =  "id_materia";
						                                    
						                                    $valor = $N["id"];
						                                    
						                                    //$examenes = ExamenesC::VerExamenesC($columna, $valor);

                                                            if ($inscripto==1){
                                                                
                                                                  $estadoe="Libre";
                                            
                                                             echo '<td>
                                
                                                    		    	<a href="http://localhost/tobar2/pdfs/Comprobante-Exa.php/'.$_SESSION["id_carrera"].'/'.$_SESSION["id"].'/'.$examenes["id"].'/'.$id_ins.'/'.$estadoe.'"target="blank">
					       		    								<button class="btn btn-warning">Comprobante</button>
						        
						            								</a>
                                
                                                                </td>';
                                                                
                                
                                                            }else {
                                                                
                                                              //////dos materias libres sin condiciones 155,164,173,182 y filo->118,10,86,46 tics->200,228,219,209
                                                              
                                                              ///// Materias 1er Año Libres Int 173, Ciegos 182, Sordos 164, Neuro 155
                                                                
                                                              //if ($N["id"]==155 || $N["id"]==164 || $N["id"]==173 || $N["id"]==182 || $N["id"]==118 || $N["id"]==10 || $N["id"]==86 || $N["id"]==46 || $N["id"]==200 || $N["id"]==228 || $N["id"]==219 || $N["id"]==209){
                                                                 
                                                              if ($N["id"]==155 || $N["id"]==164 || $N["id"]==173 || $N["id"]==182){

                                                                 //$_SESSION["id_carrera"];
                                                                 
                                                                if($carrera["turno"]=="Mañana"){
													                     
													                   $turno1=1;
													                       
													               } else if($carrera["turno"]=="Tarde"){
													                       
													                   $turno1=2;    
													                       
													            }
                                                                 
                                                                 // materia que se rinde libre y es comun
                                                                 echo '<td>
                                                                 
                                                                    <a href="http://localhost/tobar2/insc-examen/'.$_SESSION["id_carrera"].'/0/'.$N["id"].'/'.$condicion.'/'.$turno1.'/'.$N["codigo"].'">
			    
				    						                        <!-- 
				    						                        <button class="btn btn-primary">Insc/Libre"'.$std.'/'.$std1.'"</button>
			                                                         -->
			                                                        <button class="btn btn-primary">Insc/Libre</button>
				        						            
				        						                   </a> </td>';
				        						                   
				        						             } else {
				        						                 
				        						                if($carrera["turno"]=="Mañana"){
													                     
													                   $turno1=1;
													                       
													               } else if($carrera["turno"]=="Tarde"){
													                       
													                   $turno1=2;    
													                       
													            }
				        						                 
				        						                 // materia que se rinde libre y NO es comun
				        						                 
                                                                 echo '<td>
                                                                 
                                                                    <a href="http://localhost/tobar2/insc-examen/'.$_SESSION["id_carrera"].'/'.$examenes["id"].'/'.$examenes["id_materia"].'/'.$condicion.'/'.$turno1.'/'.$N["codigo"].'">
			    
				    						                       <!--  
				    						                        <button class="btn btn-primary">Insc/Libre"'.$std.'/'.$std1.'/'.$libre.'/'.$std2.'"</button>
			                                                        -->
			                                                        <button class="btn btn-primary">Insc/Libre</button>
                                                                    				        						            
				        						                   </a> </td>';

                                                              } 
			
                                                            }
                                                        
                                                        }else{    
                                                            $stda="";
                                                            
                                                            //echo ' <td>'.$std.'/'.$std1.'/'.$N["rc1"].'</td>';
                                                            
                                                            //echo ' <td>'.$std1.'/'.$std22.'/'.$regu2.'/'.$regu.'</td>';
                                                            
                                                             echo ' <td>'.$stda.'</td>';
                                                        }
                                                        
                                                        /// fin alumno con condicion libre 
                                                        
											            $sipuede=0;
                                                        $vacio=0;
 	                                      } else {
	                                        // si regu=1 muestro el estado  
 										 if($estado == "Promo Directa" || $estado == "Promo Indirecta"){
												echo '<td class="bg-info">
												'.$estado.'
												</td>';          									
											}else if($estado == "Regular" || $estado == "Libre" ){
												echo '<td class="bg-success">
												'.$estado.'
												</td>';
                                           } else if($estado == "Equivalencia"){
												echo '<td class="bg-warning">
												'.$estado.'
												</td>';
                                            } else if($estado == "Aprobado"){
												echo '<td class="bg-success">
												'.$estado.'
												</td>';
	                                          }else {
												echo '<td class="bg-danger">
												'.$estado.'
												</td>';
											}
											

                                       // Fin regu=1

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
											       <td>'.$N["ar1"].'</td>
											       <td>'.$N["ar2"].'</td>
											    -->
											    <td>'.$N["codigo"].'</td>
											    <td>'.$N["id"].'</td>
											    ';

											if ($N["taller"]==1){
											    
											echo'<td class="bg-info">'.$N["nom_abrevi"].'</td>';
											
											} else {
											
											echo'<td>'.$N["nom_abrevi"].'</td>';    
											
											}		  

											echo'<td>'.$N["grado"].'</td>';
													  
											if($N["tipo"]=="1er Cuatrimestre"){
											
											    $tipoa="1C";
											    
											}else if($N["tipo"]=="2do Cuatrimestre"){
											
											    $tipoa="2C";
											
											}else if($N["tipo"]=="Anual"){
											
											    $tipoa=$N["tipo"];
											} 
											
                                            echo '<td>'.$tipoa.'</td>';
                                            
                                            if ($regu==0){
                                            
                                                if ($inscripto==1){

										            if ($examenes["estado"]==1 ){   
											
										       	        //echo '<td>'.$inscp["id"].'</td>
											   	        //<td>'.$inscp["hora"].'</td>
											            //<td>'.$inscp["profesor"].'</td>
											            //<td>'.$inscp["llamado"].'</td>';
											
											        }
											 
										        }
                                            
                                            } 
    

											echo '</tr>';
 	                                      
 							
										 } 
									    
									
							
						
							
							echo '</tbody>
						</table>';
				}else{
					echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones...</div>';
				}
				?>
			</div>
		</div>
	</section>
</div>
