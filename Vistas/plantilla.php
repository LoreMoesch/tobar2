<?php
session_start();
// Calcular BASE URL dinámico (http/https + host + subcarpeta)
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$baseUrl = $scheme . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proyecto SIGEDU Albino Sanchez Barros</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome 
  <link rel="stylesheet" href="http://localhost/tobar2/plugins/fontawesome-free/css/all.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $baseUrl ?>dist/css/adminlte.min.css">
  
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
<!-- Propios-->
  <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>main.css"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--datables CSS básico-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>datatables/datatables.min.css"/>
   <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="<?= $baseUrl ?>datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">   

    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  


</head>

<body class="hold-transition sidebar-mini">

<?php
$columna = "id";
$valor = 1;
$resultado = AjustesC::VerAjustesC($columna, $valor);
if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){
       echo '<div id="wrapper">';
       include "modulos/cabecera.php";
       //include "modulos/menu.php";
       if($_SESSION["rol"] == "Administrador"){
             include "modulos/menu.php";
       }else if($_SESSION["rol"] == "Estudiante"){
           if ($resultado["mto"]==1) {
               if ($_SESSION["id"] == 416 || $_SESSION["id"] == 832 || $_SESSION["id"] == 833 || $_SESSION["id"] == 834 || $_SESSION["id"] == 485){
               include "modulos/menuEstudiante.php";
               }else {
               include "modulos/menumto.php";    
               }
           } else {
              include "modulos/menuEstudiante.php";
           }  
       }else if($_SESSION["rol"] == "Docente"){
              include "modulos/menuDocente.php";
       }else if($_SESSION["rol"] == "Bedel"){
              include "modulos/menuBedel.php";
       }else if($_SESSION["rol"] == "Secretario"){
              include "modulos/menuSecre.php";
       }else if($_SESSION["rol"] == "Director"){
              include "modulos/menuDire.php";
            }
       echo ' <div class="content-wrapper">';
              $url = array();
              if(isset($_GET["url"])){
                $url = explode("/", $_GET["url"]);
                    if($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "mis-datos" || $url[0] == "Carreras" || $url[0] == "Editar-Carrera" || $url[0] == "usuarios" || $url[0] == "Estudiantes" || $url[0] == "Editar-Inicio" || $url[0] == "Crear-Materias" || $url[0] == "Crear-Comisiones" || $url[0] == "Ver-Plan" || $url[0] == "Nota-Materia" || $url[0] == "Plan-de-Estudios" || $url[0] == "Materias" || $url[0] == "insc-materia" || $url[0] == "inscripto-M" || $url[0] == "Examenes" || $url[0] == "Crear-Examenes" || $url[0] == "C-E" || $url[0] == "Ver-Examenes" || $url[0] == "insc-examen" || $url[0] == "Inscriptos-examen" || $url[0] == "Constancia-Alumno" || $url[0] == "Constancia-Materias" || $url[0] == "Certificados" || $url[0] == "Editar-Nota" || $url[0] == "inscripto-E" || $url[0] == "inscripto-E1" || $url[0] == "Nota-Examen" || $url[0] == "Promo-Docente" || $url[0] == "Promo-Estudiantes" || $url[0] == "Nota-MateriaD" || $url[0] == "Editar-NotaD" || $url[0] == "Ver-Examenes1" || $url[0] == "Constancia-Alumno1" || $url[0] == "Constancia-Alumno24" || $url[0] == "Inscriptos-examenl" || $url[0] == "Nota-Examenl" || $url[0] == "Nota-Examenle" || $url[0] == "Comision-Estudiantes" || $url[0] == "Reclamos" || $url[0] == "Examenes-D"|| $url[0] == "Examenes-E"|| $url[0] == "Aulavirtual" || $url[0] == "Asistencia" ||  $url[0] == "AsistenciaD" || $url[0] == "AsistenciaD1" || $url[0] == "Comisiones"|| $url[0] == "Mto"|| $url[0] == "Comisiones2" || $url[0] == "ver-comision" || $url[0] == "Materias2" || $url[0] == "insc-materia2" || $url[0] == "inscripto-M2" ||  $url[0] == "Ver-llamado" || $url[0] == "Editar-Examen" || $url[0] == "Regimen" || $url[0] == "Editar-Turno" || $url[0] == "Turno" || $url[0] == "Editar-Alu" || $url[0] == "GuardarExamen" || $url[0] == "Actmatri" || $url[0] == "Agregar-profe" || $url[0] == "Borrar-profe" || $url[0] == "Act-Desc-edi" || $url[0] == "seguimiento" || $url[0] == "estudiantess" || $url[0] == "Plan" || $url[0] == "materiass" || $url[0] == "infoalu" || $url[0] == "imprimirc" || $url[0] == "nuevodo" || $url[0] == "editdo" || $url[0] == "borrarinsc" || $url[0] == "usuarioss" || $url[0] == "prueba" || $url[0] == "usuarios2" || $url[0] == "Act-Reclamo" || $url[0] == "Borr-Reclamo" || $url[0] == "reclamosa"){
                        include "modulos/".$url[0].".php";
                    }
               }else{
                  include "modulos/inicio.php";
               }
               echo '</div>';         
              echo '<footer class="main-footer">
                   <div class="float-right d-none d-sm-block">
                    <b>Version</b> 2.0
                   </div>
                     <strong>Development Tobar 2020-2025 </strong>
                   </footer>

                   <!-- Barra lateral de Control -->
                   <aside class="control-sidebar control-sidebar-dark">
                   <!-- Contenido de la barra lateral de control va aqui -->
                   </aside>
                   <!-- /.fin contenido de la barra lateral de control -->';

      }else if(isset($_GET["url"])){
       if($_GET["url"] == "Ingresar"){
               include "modulos/Ingresar.php";
       }
       }else{
             include "modulos/Ingresar.php";
       }
?>
</div>
<!-- jQuery -->
<!-- <script src="<?= $baseUrl ?>plugins/jquery/jquery.min.js"></script> -->
<script src="<?= $baseUrl ?>jquery/jquery-3.3.1.min.js"></script>  

<!-- Bootstrap 4 -->
<!--<script src="<?= $baseUrl ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
 <script src="<?= $baseUrl ?>bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="<?= $baseUrl ?>popper/popper.min.js"></script> -->

<!-- AdminLTE App -->
<script src="<?= $baseUrl ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE para demostracion -->
<script src="<?= $baseUrl ?>dist/js/demo.js"></script>

<!-- datatables JS -->
      
<script type="text/javascript" src="<?= $baseUrl ?>datatables/datatables.min.js"></script> 

<!-- para usar botones en datatables JS -->  
<script src="<?= $baseUrl ?>datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
<script src="<?= $baseUrl ?>datatables/JSZip-2.5.0/jszip.min.js"></script>    
<script src="<?= $baseUrl ?>datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
<script src="<?= $baseUrl ?>datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= $baseUrl ?>datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

<!-- código propio JS --> 
<script type="text/javascript" src="<?= $baseUrl ?>main.js"></script>  
<script type="text/javascript" src="<?= $baseUrl ?>usuarios.js"></script>  
<script type="text/javascript" src="<?= $baseUrl ?>usuarios2.js"></script> 
<script type="text/javascript" src="<?= $baseUrl ?>comision.js"></script> 
<script type="text/javascript" src="<?= $baseUrl ?>comision1.js"></script> 
<script type="text/javascript" src="<?= $baseUrl ?>comision2.js"></script> 
<script type="text/javascript" src="<?= $baseUrl ?>turnos.js"></script> 
<script type="text/javascript" src="<?= $baseUrl ?>materias.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>regimen.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>estudiantes.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>estudiantes1.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>estudiantes2.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>plan.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>plan1.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>plan2.js"></script>

</body>

</html>
