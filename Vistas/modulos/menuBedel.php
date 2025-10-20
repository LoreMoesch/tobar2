  <!-- Contenedor de la Barra lateral principal -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logotipo de la marca -->
    <a href="<?= $baseUrl ?>inicio" class="brand-link">
      <img src="<?= $baseUrl ?>dist/img/logo4.png"
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
            } else if($_SESSION["rol"]=="Bedel"){
            echo '<img src="http://localhost/tobar2/dist/img/rolb.png" class="img-circle elevation-2" alt="User Image">'; 
          }
           ?> 
           </div>
        <div class="info">
          <a href="<?= $baseUrl ?>inicio" class="d-block">
            <?php
             echo '<h6>'.$_SESSION["apellido"].'<p>'.$_SESSION["nombre"].'<a style="color:#c9c9c5;">'.$_SESSION["id"].'</a></p></h6>';
            ?>   
          </a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= $baseUrl ?>inicio" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Inicio
                <!-- <span class="right badge badge-danger">New</span>          -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $baseUrl ?>usuarios" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                Comisiones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $baseUrl ?>Comisiones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Docentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $baseUrl ?>Comisiones2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Materias</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far far fa-edit"></i>
              <p>
                Examenes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $baseUrl ?>Examenes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inscriptos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $baseUrl ?>Ver-llamado" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Llamados</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="<?= $baseUrl ?>Carreras" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Carreras
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.fin barra lateral -->
  </aside>
