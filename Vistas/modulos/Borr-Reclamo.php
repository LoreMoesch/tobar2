<?php
    $exp = explode("/", $_GET["url"]);
    $valorb = $exp[1];
	$estado = new ReclamosC();
	$estado -> BorrarRC($valorb);
?>