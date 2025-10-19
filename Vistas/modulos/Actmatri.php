<?php

$exp = explode("/", $_GET["url"]);

$valor = $exp[1];

if($valor == ""){
    
	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$actual = new UsuariosC();
$actual -> ActmatriculaC($valor);

?>