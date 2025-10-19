

  <!-- Contenedor de la Barra lateral principal -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logotipo de la marca -->
    <a href="http://localhost/tobar2/inicio" class="brand-link">
      <img src="http://localhost/tobar2/dist/img/logo4.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">S I G E D U</span>
    </a>

    <!-- Barra lateral -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($_SESSION["rol"]=="Administrador"){
           echo '<img src="http://localhost/tobar2/dist/img/rola.png" class="img-circle elevation-2" alt="User Image">';
            } else if($_SESSION["rol"]=="Docente"){
            echo '<img src="http://localhost/tobar2/dist/img/rold.png" class="img-circle elevation-2" alt="User Image">';
            } else if($_SESSION["rol"]=="Estudiante"){  
            echo '<img src="http://localhost/tobar2/dist/img/role.png" class="img-circle elevation-2" alt="User Image">';
            } else if($_SESSION["rol"]=="Director"){
            echo '<img src="http://localhost/tobar2/dist/img/rold.png" class="img-circle elevation-2" alt="User Image">';
            } else if($_SESSION["rol"]=="Secretario"){
            echo '<img src="http://localhost/tobar2/dist/img/rols.png" class="img-circle elevation-2" alt="User Image">';
           }
           ?> 
           </div>
        <div class="info">
          <a href="http://localhost/tobar2/inicio" class="d-block">
            <?php
              echo '<h6>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'<p>  Libreta: '.$_SESSION["libreta"].'<a style="color:#c9c9c5;">'."id: ".$_SESSION["id"].'</a></p></h6>';
            ?>   
          </a>
        </div>
      </div>
       
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="http://localhost/tobar2/inicio" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="http://localhost/tobar2/Plan-de-Estudios" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Plan de Estudios
              </p>
            </a>
          </li>
           <li class="nav-item">
          
            <a href="http://localhost/tobar2/Materias" class="nav-link">
              
            <i class="nav-icon far far fa-edit"></i>
              <p>
                Inscripciones a Materias
              </p>
            </a>
          </li>
           <li class="nav-item">
            <?php
            echo '<a href="http://localhost/tobar2/Ver-Examenes1/'.$_SESSION["id_carrera"].'" class="nav-link">';
             ?>
            <i class="nav-icon fas fa-book"></i>
              <p>
                Examenes
              </p>
            </a>
          </li>
            <li class="nav-item">
             <a href="http://localhost/tobar2/reclamosa" class="nav-link">
             <i class="nav-icon fa fa-bullhorn" aria-hidden="true"></i>
              <p>
                 Reclamos
              </p>
            </a>
          </li>
           <li class="nav-item">
             <a href="http://localhost/tobar2/Constancia-Alumno24" class="nav-link">
               <i class="nav-icon fa fa-list"></i>
              <p>
                Certificados
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.fin barra lateral -->
  </aside>




