<?php
$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1]){
	echo '<script>
	window.location = "https://localhost/tobar2/inicio";
	</script>';
	return;
}

// $exp[1]= $id_carrera
// $exp[2]= $id  Examenes
// $exp[3]= $id_materia


$borrarIE = new ExamenesC();
$borrarIE -> BorrarInscEC();
