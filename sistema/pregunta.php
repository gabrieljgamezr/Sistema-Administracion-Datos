<?php

	session_start();

	$alert='<p class="msg_save">El trabajador se ha registrado exitosamente</p>';

	if(isset($_POST['no_carga_familiar'])){

		header("Location: registro_trabajadores.php");

	}
	if(isset($_POST['si_carga_familiar'])){

		header("Location: registro_carga_familiar_nuevo.php");

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Pregunta | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="c_f">

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			
			<h1>¿Desea registrar cargas familiares?</h1>
			<hr>

			<form action="" method="post">
				
				<input type="submit" name="si_carga_familiar" id="si_carga_fiamliar" class="btn_c_f" value="Si">
				<input type="submit" name="no_carga_familiar" id="no_carga_familiar" class="btn_c_f" value="No">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>