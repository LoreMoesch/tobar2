

<div class="container">
	<section class="content-header">
		<?php
		$columna = "id";
		$valor = $_SESSION["id_carrera"];
	  	$carrera = CarrerasC::VerCarreras2C($columna, $valor);
		echo '<h1>Generacion de Tickets de Reclamo </h1>';
		?>
	</section>
	<div class="row">
		<div class="col-lg-12">
		    <div class="box-header">
		    	<?php
				    date_default_timezone_set('America/Argentina/Buenos_Aires');
				    $hoy=date("Y-m-d");
					$hora=date("h:i:sa");
				    //$columna = "id";
				    //$valor = 1;
				    //$resultado = AjustesC::VerAjustesC($columna, $valor);
				    $columna = "id";
				    $valor = $_SESSION["id"];
				    $usu = UsuariosC::VerUsuariosC($columna, $valor);
					$columna = "id_alumno";
				    $valor = $_SESSION["id"];
					$reclamos = ReclamosC::VerReclamosC($columna, $valor);
		            // $llamado = ExamenesC::VerTurnoC();
                    //  foreach ($llamado as $key => $valores) {
                    //    if ($valores["estado"]==1) {
                    //         $llamadoa=$valores["id"];
                    //     }
                    //   }
					$aaa=0;
					foreach ($reclamos as $key => $valores) {
						 if ($valores["id_alumno"]==$_SESSION["id"]) {
                             $aaa=1;
                         }
	                  }
						if ($aaa==1) {
                	    echo '
        				<form method="post">
        					<div class="col-md-6 col-xs-12">
            				    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                                <input type="hidden" name="contacto" value="'.$usu["telefono"].'">
					  			<input type="hidden" name="estado" value="En proceso">
								<input type="hidden" name="dia" value="'.$hoy.'">
								<input type="hidden" name="hora" value="'.$hora.'">
								<input type="hidden" name="activo" value="'.$_SESSION["id_carrera"].'">

								<h5>Nombre y Apellido: '.$usu["nombre"].''.$usu["apellido"].'</h5>
                                <h5>Contacto: '.$usu["telefono"].'</h5>
                                <h5>Orientacion: '.$carrera["nombre"].'</h5>
                                <h5>Libreta: '.$_SESSION["libreta"].'</h5>
								<h5>Area: '.$valores["area"].'</h5>
								<h5>Reclamo: '.$valores["reclamo"].'</h5>
								<h5>Dia: '.$valores["fecha_r"].'</h5>
								<h5>Hora: '.$valores["hora_r"].'</h5>	
								<br><br>
								<div class="alert alert-success">Ya has realizado un Reclamo, a la brevedad responderemos</div>  
								</div>
        			         </form>';
						    } else {
							    echo '
        				<form method="post">
        					<div class="col-md-6 col-xs-12">
            				    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                                <input type="hidden" name="contacto" value="'.$usu["telefono"].'">
					  			<input type="hidden" name="estado" value="En proceso">
								<input type="hidden" name="dia" value="'.$hoy.'">
								<input type="hidden" name="hora" value="'.$hora.'">
								<input type="hidden" name="activo" value="'.$_SESSION["id_carrera"].'">
							
                                <div class="alert alert-success">Tus reclamos nos ayudan a mejorar nuestro sistema</div>  
								<h5>Nombre y Apellido: '.$usu["nombre"].''.$usu["apellido"].'</h5>
                                <h5>Contacto: '.$usu["telefono"].'</h5>
                                <h5>Orientacion: '.$carrera["nombre"].'</h5>
                                <h5>Libreta: '.$_SESSION["libreta"].'</h5>
                                <br>
               				    <h3>Area principal donde esta el problema.</h3>
               						<select class="input-lg" name="area">
                					<option value="S/A">Sin Area Principal..</option>
            	    				<option value="Plan">Plan de Estudios</option>
            	    				<option value="Cursadas">Inscripcion a Cursadas</option>
            	    				<option value="Examen">Inscripcion a Examen Final</option>
            	    				<option value="Certi">Certificados</option>
            					</select>
								<br><br>
                                <h5>Reclamo :</h5>
   								<textarea name="reclamo" rows="4" cols="50">
  								</textarea>
    							<br>
								<button type="submit" class="btn btn-primary">Enviar</button>
								</div>
        			         </form>';
							 $estado = new ReclamosC();
						     $estado -> HacerReclamosC();
							}
				     
				        ?>
						<?php
    					
						?>
            </div>  

		</div>

	</div>
</div>
  

