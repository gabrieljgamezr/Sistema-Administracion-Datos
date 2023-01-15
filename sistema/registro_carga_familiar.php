<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['cedula_r']) || empty($_POST['p_apellido_cf']) && empty($_POST['s_apellido_cf']) && empty($_POST['p_nombre_cf']) && empty($_POST['s_nombre_cf']) && empty($_POST['cedula_cf']) && empty($_POST['parentesco_cf']) && empty($_POST['f_nacimiento_cf']) && empty($_POST['n_estudios_cf']) && empty($_POST['condicion_especial_cf']) && empty($_POST['observaciones_cf'])){

			$alert='<p class="msg_error">Todos los campos estan vacios o falta la cedula del representante</p>';

		}else{

			$cedula_r = $_POST['cedula_r'];
			$p_apellido_cf = $_POST['p_apellido_cf'];
			$s_apellido_cf = $_POST['s_apellido_cf'];
			$p_nombre_cf = $_POST['p_nombre_cf'];
			$s_nombre_cf = $_POST['s_nombre_cf'];
			$cedula_cf = $_POST['cedula_cf'];
			$parentesco_cf = $_POST['parentesco_cf'];
			$f_nacimiento_cf = $_POST['f_nacimiento_cf'];
			$n_estudios_cf = $_POST['n_estudios_cf'];
			$condicion_especial_cf = $_POST['condicion_especial_cf'];
			$observaciones_cf = $_POST['observaciones_cf'];

			$query = mysqli_query($conection, "SELECT * FROM trabajadores WHERE `CEDULA`= '$cedula_r';");
			$result = mysqli_fetch_array($query);

			if($result > 0){

				$id_r = $result['ID'];

				if(empty($f_nacimiento_cf)) {
					$f_nacimiento_cf = '0000-00-00';
				}

				$query_insert = mysqli_query($conection, "INSERT INTO `carga familiar`(`ID`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `PRIMER NOMBRE`, `SEGUNDO NOMBRE`, `CEDULA`, `PARENTESCO`, `FECHA DE NACIMIENTO`, `NIVEL DE ESTUDIO`, `POSEE ALGUNA CONDICION ESPECIAL`, `OBSERVACIONES`) VALUES ('$id_r','$p_apellido_cf','$s_apellido_cf','$p_nombre_cf','$s_nombre_cf','$cedula_cf','$parentesco_cf','$f_nacimiento_cf','$n_estudios_cf','$condicion_especial_cf', '$observaciones_cf');");
				mysqli_close($conection);

				if($query_insert){

					$alert='<p class="msg_save">La carga familiar se ha registrado exitosamente</p>';

				}

			}else{

				$alert='<p class="msg_error">La Cedula del representante no esta registrada en el sistema</p>';

			}

		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registrar Carga Familiar | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Registrar Carga Familiar</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">

				<label for="cedula_r">Cedula del Representante</label>
				<input type="number" name="cedula_r" id="cedula_r" placeholder="Cedula del Representante:">
				
				<label for="p_apellido_cf">Primer Apellido</label>
				<input type="text" name="p_apellido_cf" id="p_apellido_cf" placeholder="Primer Apellido:">

				<label for="s_apellido_cf">Segundo Apellido</label>
				<input type="text" name="s_apellido_cf" id="s_apellido_cf" placeholder="Segundo Apellido:">

				<label for="p_nombre_cf">Primer Nombre</label>
				<input type="text" name="p_nombre_cf" id="p_nombre_cf" placeholder="Primer Nombre:">

				<label for="s_nombre_cf">Segundo Nombre</label>
				<input type="text" name="s_nombre_cf" id="s_nombre_cf" placeholder="Segundo Nombre:">

				<label for="cedula_cf">Cedula</label>
				<input type="number" name="cedula_cf" id="cedula_cf" placeholder="Cedula:">

				<label for="parentesco_cf">Parentesco</label>
				<input type="text" name="parentesco_cf" id="parentesco_cf" placeholder="Parentesco:">

				<label for="f_nacimiento_cf">Fecha de Nacimiento</label>
				<input type="date" name="f_nacimiento_cf" id="f_nacimiento_cf" placeholder="Fecha de Nacimeinto:">

				<label for="n_estudios_cf">Nivel de Estudios</label>
				<input type="text" name="n_estudios_cf" id="n_estudios_cf" placeholder="Nivel de Estudios:">

				<label for="condicion_especial_cf">Posee Alguna Condicion Especial</label>
				<input type="text" name="condicion_especial_cf" id="condicion_especial_cf" placeholder="Posee Alguna Condicion Especial:">

				<label for=observaciones_cf>Observaciones</label>
				<textarea name="observaciones_cf" id="observaciones_cf" placeholder="Observaciones:"></textarea>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Registrar Carga Familiar">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>