<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$ID = $_POST['id'];

		$query_delete = mysqli_query($conection, "DELETE FROM `trabajadores` WHERE `ID`='$ID';");
		mysqli_close($conection);

		if($query_delete){

			header("Location: lista_trabajadores.php");

		}else{

			echo "Error al eliminar";

		}

	}

	if(empty($_REQUEST['ID'])){

		header("Location: lista_trabajadores.php");
		mysqli_close($conection);

	}else{

		$ID = $_REQUEST['ID'];

		$query = mysqli_query($conection, "SELECT * FROM `trabajadores` WHERE ID = '$ID';");
		mysqli_close($conection);

		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query)) {
				
				$CEDULA = $data['CEDULA'];
				$P_APELLIDO = $data['PRIMER APELLIDO'];
				$P_NOMBRE = $data['PRIMER NOMBRE'];

			}

		}else{

			header("Location: lista_trabajadores.php");

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Trabajador | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="data_delete">
			
			<h2>¿Está seguro de eliminar al siguiente trabajador y todas las cargas familiares que tenga?</h2>
			<p>Cédula: <span><?php echo $CEDULA; ?></span></p>
			<p>Primer Nombre: <span><?php echo $P_NOMBRE; ?></span></p>
			<p>Primer Apellido: <span><?php echo $P_APELLIDO; ?></span></p>

			<form method="post" action="">

				<input type="hidden" name="id" value="<?php echo $ID?>">
				<input type="submit" name="btn_ok" class="btn_ok" value="Aceptar">
				<a href="lista_trabajadores.php" class="btn_cancel">Cancelar</a>
				

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>