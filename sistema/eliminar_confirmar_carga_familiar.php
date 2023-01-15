<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$ID = $_POST['id'];

		$query_delete = mysqli_query($conection, "DELETE FROM `carga familiar` WHERE `ID CARGA FAMILIAR`='$ID';");
		mysqli_close($conection);

		if($query_delete){

			header("Location: lista_cargas_familiares.php");

		}else{

			echo "Error al eliminar";

		}

	}

	if(empty($_REQUEST['ID'])){

		header("Location: lista_cargas_familiares.php");
		mysqli_close($conection);

	}else{

		$ID = $_REQUEST['ID'];

		$query = mysqli_query($conection, "SELECT t.`CEDULA` AS `CEDULA REPRESENTATE`, c.`ID CARGA FAMILIAR`,c.`ID`,c.`PRIMER APELLIDO`,c.`SEGUNDO APELLIDO`,c.`PRIMER NOMBRE`,c.`SEGUNDO NOMBRE`,c.`CEDULA`,c.`PARENTESCO`,c.`FECHA DE NACIMIENTO`,c.`NIVEL DE ESTUDIO`,c.`POSEE ALGUNA CONDICION ESPECIAL` FROM `carga familiar` c INNER JOIN `trabajadores` t WHERE t.`ID` = c.`ID` AND `ID CARGA FAMILIAR` = '$ID';");
		mysqli_close($conection);

		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query)) {
				
				$CEDULA = $data['CEDULA'];
				$P_APELLIDO = $data['PRIMER APELLIDO'];
				$P_NOMBRE = $data['PRIMER NOMBRE'];
				$CEDULA_REPRESENTANTE = $data['CEDULA REPRESENTATE'];

			}

		}else{

			header("Location: lista_cargas_familiares.php");

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Carga Familiar | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="data_delete">
			
			<h2>¿Está seguro de eliminar la siguiente carga familiar?</h2>
			<p>Cédula del Representante: <span><?php echo $CEDULA_REPRESENTANTE; ?></span></p>
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