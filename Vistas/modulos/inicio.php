<!-- Content Wrapper. Contains page content -->
<div class="container">
   <!-- Content Header (Page header) -->
    <h4 style="color:rgb(0, 0, 0)">
      Sistema de Gestion Educativa ISFD Albino Sanchez Barros
    </h4>
     <!-- Main content -->
     <section class="container">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <?php
         $columna = "id";
         $valor = 1;
         $resultado = AjustesC::VerAjustesC($columna, $valor);
         if($resultado["mto"] == 0 ){
            $columna= "id_alumno";
            $valor= $_SESSION["id"];
            $libretas = UsuariosC::VerLibretasC($columna, $valor);
            echo '<h4>Ciclo Lectivo 2025 - Cuatrimestre Actual: '.$resultado["cuatrimestre"].'</h4><br>';
            // if($_SESSION["rol"] == "Docente"){
            // echo '<a href="Aulavirtual">
            //       <button class="btn btn-success btn-lg">Entrar a Aulas Virtuales</button>
            //       </a> ';
            // }        
            echo'
            </div>
              <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <h5>1er Cuatrimestre</h5>
                    <h5>Inicio: '.$resultado["1_fecha_inicio"].'</h5>
                    <h5>Fin: '.$resultado["1_fecha_fin"].'</h5>
                    <hr>
                    <h5>2do Cuatrimestre</h5>
                    <h5>Inicio: '.$resultado["2_fecha_inicio"].'</h5>
                    <h5>Fin: '.$resultado["2_fecha_fin"].'</h5>
                    <hr>';
                     if($_SESSION["rol"] == "Estudiante"){
                  echo '<h3 style="color:#00bb2d";> Tu N&uacute;mero de Libreta es: '.$_SESSION["libreta"].'';
                     }                   
              echo '</div>
                      <div class="col-md-6 col-xs-12" style="background-color: rgb(214, 213, 213);"> 
                          <h5>Fechas de Exámenes Próximas:</h5>
                          <h5>Desde: '.$resultado["1examenes_i"].'</h5>
                          <h5>Hasta: '.$resultado["1examenes_f"].'</h5>
                          </p>
                          <h5>Desde: '.$resultado["2examenes_i"].'</h5>
                          <h5>Hasta: '.$resultado["2examenes_f"].'</h5>
                          <h5>Fechas para Inscribirse a Materias:</h5>
                          <h5>Desde: '.$resultado["materias_i"].'</h5>
                          <h5>Hasta: '.$resultado["materias_f"].'</h5>
                    </div>
                 </div>';
                     
              if($resultado["mto"] == 0 ){
                 echo '<h3><span>Estado del Sistema: </span><span style="font-size:20px;color:blue"> En Produccion... <span></h3>'; 
              }
              ?>
              <div class="row">
                 <div class="col">
                  <?php
                      if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel" ){
                      echo'<div class="box-footer">
                            <a href="Editar-Inicio">
                              <button class="btn btn-success btn-lg">Editar</button></a>';
                           if($_SESSION["rol"] == "Administrador"){   
                             if($resultado["mto"] == 0){
								             	echo '<a>&nbsp;&nbsp;<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar Mantenimiento</button></a>';
         				               }else{
				      	             echo '<a>&nbsp;&nbsp;<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar Mantenimiento</button></a>';
				                     }
                            }
                        echo ' 
                          </div>';
                       }
                  ?>    
                 </div>

             </div>
              <?php     

         }else if ($_SESSION["rol"] == "Estudiante" ){
          echo ' <h4>VOLVEMOS ENSEGUIDA ... </h4>         
                 <hr>
                 <h5>Estamos realizando tareas de mantenimiento, disculpe las molestias.</h5>
                 <h5>Regresamos en Breve. Si necesitas hablar con nosotros en forma Urgente</h5>
                 <h5>cominicate a este whatsApp 380-4525650  Ing. Lorena Möesch </h5>';
        }else if ($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Docente" || $_SESSION["rol"] == "Bedel" || $_SESSION["rol"] == "Director" || $_SESSION["rol"] == "Secretario" ) {
         echo ' <h3>Ciclo Lectivo 2025 - Cuatrimestre Actual: '.$resultado["cuatrimestre"].'</h3>';
          //  if($_SESSION["rol"] == "Docente"){
          //     //echo '<a href="Aulavirtual">
          //   //      <button class="btn btn-success btn-lg">Entrar a Aulas Virtuales</button>
          //    //  </a> ';
          //          }
          echo'</div>
                 <div class="row">
                  <div class="col-md-6 col-xs-12">
                   <h4>1er Cuatrimestre</h4>
                   <h5>Inicio: '.$resultado["1_fecha_inicio"].'</h5>
                   <h5>Fin: '.$resultado["1_fecha_fin"].'</h5>
                   <hr>
                   <h4>2do Cuatrimestre</h4>
                   <h5>Inicio: '.$resultado["2_fecha_inicio"].'</h5>
                   <h5>Fin: '.$resultado["2_fecha_fin"].'</h5>
                   <hr>';
            echo '</div>
                  <div class="col-md-6 col-xs-12" style="background-color: rgb(214, 213, 213);"> 
                     <h5>Fechas de Exámenes Próximas1:</h5>
                     <h6>Desde: '.$resultado["1examenes_i"].'</h6>
                     <h6>Hasta: '.$resultado["1examenes_f"].'</h6>
                     </p>
                     <h6>Desde: '.$resultado["2examenes_i"].'</h6>
                     <h6>Hasta: '.$resultado["2examenes_f"].'</h6>
                     <hr>';
                     echo '<h5>Fechas para Inscribirse a Materias:</h5>
                     <h6>Desde: '.$resultado["materias_i"].'</h6>
                     <h6>Hasta: '.$resultado["materias_f"].'</h6>';            
            echo '</div>';
        if($resultado["mto"] == 1 ){
            echo '<h3><span>Estado del Sistema: </span><span style="font-size:20px;color:red"> En Mantenimiento... <span></h3>';
        }
        if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Bedel" ){
         echo'
          </div>
         <div class="row">
           <div class="col">
                 <a href="Editar-Inicio">
                 <button class="btn btn-success btn-lg">Editar</button>
                </a>
                  ';
              if($_SESSION["rol"] == "Administrador"){    
              if($resultado["mto"] == 0){
							   	echo '<a>&nbsp;&nbsp;<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar Mantenimiento</button></a>';
         			  }else{
				          echo '<a>&nbsp;&nbsp;<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar Mantenimiento</button></a>';
				      }
            }
         }
         echo '
           </div>
         </div>'; 
        }
        ?>
       <!-- /.box-footer-->
     </div>
     <!-- /.box -->
   </section>
   <!-- /.content -->
</div>


<div class="modal fade" id="HM">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro dejar en Mantenimiento?</h2>
							<input type="hidden" name="mto" value="1">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$HM = new AjustesC();
				$HM -> HMMC();
				?>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="DM">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>¿Está seguro sacar de Mantenimiento?</h2>
							<input type="hidden" name="mto" value="0">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				$HC = new AjustesC();
				$HC -> DMMC();
				?>
			</form>
		</div>
	</div>
</div>