
  <!-- Barra de Navegacion superior-->
  <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   


  </nav> -->

   <!-- Topbar - Parte Superior-->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->
          <!-- Topbar Navbar -->
		  
          <ul class="navbar-nav ml-auto">
             <div class="topbar-divider d-none d-sm-block"></div>
			   
            <!-- Nav Item - User Information (barra de arriba) -->
            <li class="nav-item dropdown no-arrow">
          
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> </span>
                <span class="mr-2 d-none d-lg-inline text-gray-400 small">
                   <?php
                    //echo '<h6>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'</h6>';
                    ?>  
               
         <!--  <img class="img-profile rounded-circle" src="https://sistema.isfdcarolinatobargarcia.edu.ar/Vistas/img/logo3.png"> -->
              </a>
           
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="http://localhost/tobar2/mis-datos">
                  <i class="fa fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
 <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listo para Salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar Sesión" a continuación si esta listo para finalizar la su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="http://localhost/tobar2/salir">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>         
