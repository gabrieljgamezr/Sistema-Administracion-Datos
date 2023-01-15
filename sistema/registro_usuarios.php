<?php

	session_start();

	if($_SESSION['id_rol'] != 1){

		header("Location: ./");

	}

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['u_nombre_apellido']) || empty($_POST['u_usuario']) || empty($_POST['u_clave']) || empty($_POST['u_rol'])){

			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';

		}else{

			$nombre = $_POST['u_nombre_apellido'];
			$usuario = $_POST['u_usuario'];
			$clave = md5($_POST['u_clave']);
			$rol = $_POST['u_rol'];

			$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE USUARIO = '$usuario';");
			$result = mysqli_fetch_array($query);

			if($result > 0){

				$alert='<p class="msg_error">El usuario ya está siendo utilizado</p>';

			}else{

				$query_insert = mysqli_query($conection, "INSERT INTO usuarios(`NOMBRE`, `USUARIO`, `CLAVE`, `ID_ROL`) VALUES('$nombre', '$usuario', '$clave', '$rol');");
				mysqli_close($conection);

				if($query_insert){

					$alert='<p class="msg_save">El usuario ha sido creado exitosamente</p>';

				}else{

					$alert='<p class="msg_error">Error al crear el usuario</p>';

				}

			}

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registrar Usuario | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Registrar Usuario</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				
				<label for="u_nombre_apellido">Nombre y Apellido</label>
				<input type="text" name="u_nombre_apellido" id="u_nombre_apellido" placeholder="Nombre y Apellido:">

				<label for="u_usuario">Usuario</label>
				<input type="text" name="u_usuario" id="u_usuario" placeholder="Usuario:">

				<label for="u_clave">Clave</label>
				<input type="password" name="u_clave" id="u_clave" placeholder="Clave:">

				<label for="u_rol">Tipo de Usuario</label>
				<select name="u_rol" id="u_rol">
					<option value="1">Administrador</option>
					<option value="2">Asistente</option>
				</select>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Crear Usuario">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>