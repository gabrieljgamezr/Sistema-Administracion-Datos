<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['cedula_r']) || empty($_POST['p_apellido_cf']) && empty($_POST['s_apellido_cf']) && empty($_POST['p_nombre_cf']) && empty($_POST['s_nombre_cf']) && empty($_POST['cedula_cf']) && empty($_POST['parentesco_cf']) && empty($_POST['f_nacimiento_cf']) && empty($_POST['n_estudios_cf']) && empty($_POST['condicion_especial_cf']) && empty($_POST['observaciones_cf'])){

			$alert='<p class="msg_error">Todos los campos estan vacios o falta la cedula del representante</p>';

		}else{

			$idCargaFamiliar = strtoupper($_POST['idCargaFamiliar']);
			$cedula_r = strtoupper($_POST['cedula_r']);
			$p_apellido_cf = strtoupper($_POST['p_apellido_cf']);
			$s_apellido_cf = strtoupper($_POST['s_apellido_cf']);
			$p_nombre_cf = strtoupper($_POST['p_nombre_cf']);
			$s_nombre_cf = strtoupper($_POST['s_nombre_cf']);
			$cedula_cf = strtoupper($_POST['cedula_cf']);
			$parentesco_cf = strtoupper($_POST['parentesco_cf']);
			$f_nacimiento_cf = strtoupper($_POST['f_nacimiento_cf']);
			$n_estudios_cf = strtoupper($_POST['n_estudios_cf']);
			$condicion_especial_cf = strtoupper($_POST['condicion_especial_cf']);
			$observaciones_cf = strtoupper($_POST['observaciones_cf']);

			$query = mysqli_query($conection, "SELECT * FROM trabajadores WHERE `CEDULA`= '$cedula_r';");
			$result = mysqli_fetch_array($query);

			if($result > 0){

				$id_r = $result['ID'];

				if(empty($f_nacimiento_cf)) {
					$f_nacimiento_cf = '0000-00-00';
				}

				$query_update = mysqli_query($conection, "UPDATE `carga familiar` SET `ID`='$id_r',`PRIMER APELLIDO`='$p_apellido_cf',`SEGUNDO APELLIDO`='$s_apellido_cf',`PRIMER NOMBRE`='$p_nombre_cf',`SEGUNDO NOMBRE`='$s_nombre_cf',`CEDULA`='$cedula_cf',`PARENTESCO`='$parentesco_cf',`FECHA DE NACIMIENTO`='$f_nacimiento_cf',`NIVEL DE ESTUDIO`='$n_estudios_cf',`POSEE ALGUNA CONDICION ESPECIAL`='$condicion_especial_cf', `OBSERVACIONES` ='$observaciones_cf' WHERE `ID CARGA FAMILIAR`='$idCargaFamiliar';");

				if($query_update){

					$alert='<p class="msg_save">La carga familiar se ha actualizado exitosamente</p>';

				}

			}else{

				$alert='<p class="msg_error">La Cedula del representante no esta registrada en el sistema</p>';

			}

		}

		mysqli_close($conection);

	}

	//MOSTRAR DATOS

	if(empty($_GET['ID'])){

		header('Location: lista_usuarios.php');
		mysqli_close($conection);

	}

	include "../conexion.php";

	$ID = $_GET['ID'];

	$sql = mysqli_query($conection, "SELECT t.`CEDULA` AS `CEDULA REPRESENTANTE`,c.`ID`,c.`ID CARGA FAMILIAR`,c.`PRIMER APELLIDO`,c.`SEGUNDO APELLIDO`,c.`PRIMER NOMBRE`,c.`SEGUNDO NOMBRE`,c.`CEDULA`,c.`PARENTESCO`,c.`FECHA DE NACIMIENTO`,c.`NIVEL DE ESTUDIO`,c.`POSEE ALGUNA CONDICION ESPECIAL`, c.`OBSERVACIONES` FROM `carga familiar` c INNER JOIN `trabajadores` t WHERE c.`ID CARGA FAMILIAR` = '$ID' AND t.`ID` = c.`ID`;");
	mysqli_close($conection);

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){

		header('Location: lista_cargas_familiares.php');

	}else{

		while ($data = mysqli_fetch_array($sql)){

			$ID = $data['ID'];
			$ID_CARGA_FAMILIAR = strtoupper($data['ID CARGA FAMILIAR']);
			$CEDULA_REPRESENTATE = strtoupper($data['CEDULA REPRESENTANTE']);
			$P_APELLIDO = strtoupper($data['PRIMER APELLIDO']);
			$S_APELLIDO = strtoupper($data['SEGUNDO APELLIDO']);
			$P_NOMBRE = strtoupper($data['PRIMER NOMBRE']);
			$S_NOMBRE = strtoupper($data['SEGUNDO NOMBRE']);
			$CEDULA = strtoupper($data['CEDULA']);
			$PARENTESCO = strtoupper($data['PARENTESCO']);
			$F_NACIMINETO = strtoupper($data['FECHA DE NACIMIENTO']);
			$N_ESTUDIOS = strtoupper($data['NIVEL DE ESTUDIO']);
			$CONDICION_ESPECIAL = strtoupper($data['POSEE ALGUNA CONDICION ESPECIAL']);
			$OBSERVACIONES = strtoupper($data['OBSERVACIONES']);

		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Carga Familiar | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Actualizar Carga Familiar</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">

				<input type="hidden" name="idCargaFamiliar" value="<?php echo $ID_CARGA_FAMILIAR; ?>">

				<label for="cedula_r">Cedula del Representante</label>
				<input type="number" name="cedula_r" id="cedula_r" placeholder="Cedula del Representante:" value="<?php echo $CEDULA_REPRESENTATE; ?>">
				
				<label for="p_apellido_cf">Primer Apellido</label>
				<input type="text" name="p_apellido_cf" id="p_apellido_cf" placeholder="Primer Apellido:" value="<?php echo $P_APELLIDO; ?>">

				<label for="s_apellido_cf">Segundo Apellido</label>
				<input type="text" name="s_apellido_cf" id="s_apellido_cf" placeholder="Segundo Apellido:" value="<?php echo $S_APELLIDO; ?>">

				<label for="p_nombre_cf">Primer Nombre</label>
				<input type="text" name="p_nombre_cf" id="p_nombre_cf" placeholder="Primer Nombre:" value="<?php echo $P_NOMBRE; ?>">

				<label for="s_nombre_cf">Segundo Nombre</label>
				<input type="text" name="s_nombre_cf" id="s_nombre_cf" placeholder="Segundo Nombre:" value="<?php echo $S_NOMBRE; ?>">

				<label for="cedula_cf">Cedula</label>
				<input type="number" name="cedula_cf" id="cedula_cf" placeholder="Cedula:" value="<?php echo $CEDULA; ?>">

				<label for="parentesco_cf">Parentesco</label>
				<input type="text" name="parentesco_cf" id="parentesco_cf" placeholder="Parentesco:" value="<?php echo $PARENTESCO; ?>">

				<label for="f_nacimiento_cf">Fecha de Nacimiento</label>
				<input type="date" name="f_nacimiento_cf" id="f_nacimiento_cf" placeholder="Fecha de Nacimeinto:" value="<?php echo $F_NACIMINETO; ?>">

				<label for="n_estudios_cf">Nivel de Estudios</label>
				<input type="text" name="n_estudios_cf" id="n_estudios_cf" placeholder="Nivel de Estudios:" value="<?php echo $N_ESTUDIOS; ?>">

				<label for="condicion_especial_cf">Posee Alguna Condicion Especial</label>
				<input type="text" name="condicion_especial_cf" id="condicion_especial_cf" placeholder="Posee Alguna Condicion Especial:" value="<?php echo $CONDICION_ESPECIAL; ?>">

				<label for=observaciones_cf>Observaciones</label>
				<textarea name="observaciones_cf" id="observaciones_cf" placeholder="Observaciones:"><?php echo $OBSERVACIONES?></textarea>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Actualizar Carga Familiar">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>