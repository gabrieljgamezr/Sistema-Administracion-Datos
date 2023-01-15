<?php

	session_start();

	if($_SESSION['id_rol'] != 1){

		header("Location: ./");

	}

	include "../conexion.php";

	if(!empty($_POST)){

		if($_POST['id_usuario'] == 1){

			header("Location: lista_usuarios.php");
			mysqli_close($conection);
			exit;

		}

		$ID_USUARIO = $_POST['id_usuario'];

		$query_delete = mysqli_query($conection, "DELETE FROM `usuarios` WHERE `ID_USUARIO`='$ID_USUARIO';");
		mysqli_close($conection);

		if($query_delete){

			header("Location: lista_usuarios.php");

		}else{

			echo "Error al eliminar";

		}

	}

	if(empty($_REQUEST['ID_USUARIO']) || $_REQUEST['ID_USUARIO'] == 1){

		header("Location: lista_usuarios.php");
		mysqli_close($conection);

	}else{

		$id_usuario = $_REQUEST['ID_USUARIO'];

		$query = mysqli_query($conection, "SELECT u.`NOMBRE`, u.`USUARIO`, r.`ROL` FROM `usuarios` u INNER JOIN `rol` r ON u.ID_ROL = r.`ID_ROL` WHERE u.ID_USUARIO = '$id_usuario';");
		mysqli_close($conection);

		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query)) {
				
				$NOMBRE = $data['NOMBRE'];
				$USUARIO = $data['USUARIO'];
				$ROL = $data['ROL'];

			}

		}else{

			header("Location: lista_usuarios.php");

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Usuario | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="data_delete">
			
			<h2>¿Está seguro de eliminar el siguiente usuario?</h2>
			<p>Nombre y Apellido: <span><?php echo $NOMBRE; ?></span></p>
			<p>Usuario: <span><?php echo $USUARIO; ?></span></p>
			<p>Tipo de Usuario: <span><?php echo $ROL; ?></span></p>

			<form method="post" action="">

				<input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>">
				<input type="submit" name="btn_ok" class="btn_ok" value="Aceptar">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>