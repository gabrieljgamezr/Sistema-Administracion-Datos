<?php

	session_start();

	if($_SESSION['id_rol'] != 1){

		header("Location: ./");

	}

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['u_nombre_apellido']) || empty($_POST['u_usuario']) || empty($_POST['u_rol'])){

			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';

		}else{

			$id_usuario = $_POST['id_usuario'];
			$nombre = $_POST['u_nombre_apellido'];
			$usuario = $_POST['u_usuario'];
			$clave = md5($_POST['u_clave']);
			$rol = $_POST['u_rol'];

			$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE (USUARIO = '$usuario' AND ID_USUARIO != '$id_usuario');");
			$result = mysqli_fetch_array($query);

			if($result > 0){

				$alert='<p class="msg_error">El usuario ya está siendo utilizado</p>';

			}else{

				if(empty($_POST['u_clave'])){

					$sql_update = mysqli_query($conection, "UPDATE usuarios SET `NOMBRE` = '$nombre', `USUARIO` = '$usuario', `ID_ROL` = '$rol' WHERE `ID_USUARIO` = '$id_usuario';");

				}else{

					$sql_update = mysqli_query($conection, "UPDATE usuarios SET `NOMBRE` = '$nombre', `USUARIO` = '$usuario', `CLAVE` = '$clave', `ID_ROL` = '$rol' WHERE `ID_USUARIO` = '$id_usuario';");

				}

				if($sql_update){

					$alert='<p class="msg_save">El usuario ha sido actualizado exitosamente</p>';

				}else{

					$alert='<p class="msg_error">Error al actualizar el usuario</p>';

				}

			}

		}

		mysqli_close($conection);

	}

	//Mostrar Datos

	if(empty($_GET['ID_USUARIO'])){

		header('Location: lista_usuarios.php');
		mysqli_close($conection);

	}

	include "../conexion.php";

	$ID_USUARIO = $_GET['ID_USUARIO'];

	$sql = mysqli_query($conection, "SELECT u.ID_USUARIO, u.NOMBRE, u.USUARIO, (u.ID_ROL) as ID_ROL, (r.ROL) as ROL FROM usuarios u INNER JOIN rol r ON u.ID_ROL = r.ID_ROL WHERE ID_USUARIO = $ID_USUARIO;");
	mysqli_close($conection);

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){

		header('Location: lista_usuarios.php');

	}else{

		while ($data = mysqli_fetch_array($sql)){

			$ID_USUARIO = $data['ID_USUARIO'];
			$NOMBRE = $data['NOMBRE'];
			$USUARIO = $data['USUARIO'];
			$ID_ROL = $data['ID_ROL'];
			$ROL = $data['ROL'];

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Usuario | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Actualizar Usuario</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">

				<input type=hidden name="id_usuario" value="<?php echo $ID_USUARIO; ?>"> 
				
				<label for="u_nombre_apellido">Nombre y Apellido</label>
				<input type="text" name="u_nombre_apellido" id="u_nombre_apellido" placeholder="Nombre y Apellido:" value="<?php echo $NOMBRE; ?>">

				<label for="u_usuario">Usuario</label>
				<input type="text" name="u_usuario" id="u_usuario" placeholder="Usuario:" value="<?php echo $USUARIO; ?>">

				<label for="u_clave">Clave</label>
				<input type="password" name="u_clave" id="u_clave" placeholder="Clave: (Si no quiere cambiarla deje este campo vacio)">

				<?php 

					if($ID_USUARIO != 1){

				?>

				<label for="u_rol">Tipo de Usuario</label>
				<select name="u_rol" id="u_rol">
					<option <?php if($ID_ROL == 1){ echo 'selected'; } ?> value="1">Administrador</option>
					<option <?php if($ID_ROL == 2){ echo 'selected'; } ?> value="2">Asistente</option>
				</select>

				<?php

					}else{

				?>

				<label for="u_rol">Tipo de Usuario</label>
				<select name="u_rol" id="u_rol">
					<option <?php if($ID_ROL == 1){ echo 'selected'; } ?> value="1">Administrador</option>
				</select>

				<?php

					}

				?>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Actualizar Usuario">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>