<?php
    $exp = explode("/", $_GET["url"]);
    $valora = $exp[1];
	$estado = new ReclamosC();
	$estado -> CambiarRC($valora);
?>