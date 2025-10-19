<?php

if($_SESSION["rol"] != "Estudiante"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}


$exp = explode("/", $_GET["url"]);


?>

<div class="container">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
			 <?php

                echo	'<h2>Constancia de Alumno Regular</h2>';
                
	        	echo '<div class="alert alert-success">Ahora puedes descargar tu certificado. </div>';

			    echo	'<br>
						
				<a href="http://localhost/tobar2/pdfs/C_Alumno_1.php/'.$exp[1].'/'.$exp[2].'/'.$exp[3].'"target="blank">
				
                <button class="btn btn-warning">Descargar Certificado</button> </a>';


            ?>
		</div>

	</section>

</div>
