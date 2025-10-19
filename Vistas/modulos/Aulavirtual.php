<?php
if($_SESSION["rol"] == "Secretario"){
    
	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

$presente = new CertificadosC();
$presente -> PresenteC();

?>