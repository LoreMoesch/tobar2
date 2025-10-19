<?php
$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1]){
	echo '<script>
	window.location = "http://localhost/tobar2/inicio";
	</script>';
	return;
}

$borroe = new ExamenesC();
$borroe -> BorrarInscEC();
?>