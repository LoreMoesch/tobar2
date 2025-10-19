<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/usuariossC.php";
require_once "Modelos/usuariossM.php";


require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";

require_once "Controladores/ajustesC.php";
require_once "Modelos/ajustesM.php";

require_once "Controladores/materiasC.php";
require_once "Modelos/materiasM.php";

require_once "Controladores/examenesC.php";
require_once "Modelos/examenesM.php";

require_once "Controladores/certificadosC.php";
require_once "Modelos/certificadosM.php";

require_once "Controladores/reclamosC.php";
require_once "Modelos/reclamosM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();
 
?>