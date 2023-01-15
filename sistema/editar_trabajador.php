<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['cedula']) && empty($_POST['rif']) && empty($_POST['p_apellido']) && empty($_POST['s_apellido']) && empty($_POST['p_nombre']) && empty($_POST['s_nombre']) && empty($_POST['f_nacimiento']) && empty($_POST['ciudad']) && empty($_POST['nacionalidad']) && empty($_POST['d_nacionalidad']) && empty($_POST['f_nacionalidad']) && empty($_POST['codigo_carnet_patria']) && empty($_POST['serial_carnet_patria']) && empty($_POST['gaceta']) && empty($_POST['padre_madre']) && empty($_POST['sexo']) && empty($_POST['e_civil']) && empty($_POST['p_discapacidad']) && empty($_POST['especifique_d']) && empty($_POST['p_enfermedad']) && empty($_POST['especifique_e']) && empty($_POST['toma_medicamento'])&& empty($_POST['entidad_bancaria']) && empty($_POST['cuenta_nomina']) && empty($_POST['forma_pago']) && empty($_POST['d_habitacion']) && empty($_POST['municipio']) && empty($_POST['estado']) && empty($_POST['centro_votacion']) && empty($_POST['p_organizacion_social']) && empty($_POST['cual_organizacion_social']) && empty($_POST['p_consejo_comunal']) && empty($_POST['t_fijo']) && empty($_POST['t_movil']) && empty($_POST['t_oficina']) && empty($_POST['correo']) && empty($_POST['tipo_vivienda']) && empty($_POST['tendencia_vivienda']) && empty($_POST['maneja']) && strcmp ($_POST['grado_licencia'],'No posee') == 0 && empty($_POST['g_sanguineo']) && empty($_POST['estatura']) && empty($_POST['peso']) && empty($_POST['pantalon']) && empty($_POST['camisa']) && empty($_POST['zapato']) && empty($_POST['m_dominante']) && empty($_POST['n_estudios']) && empty($_POST['especialidad_doctorado']) && empty($_POST['profesion']) && empty($_POST['d_nominalmente']) && empty($_POST['d_fisicamente']) && empty($_POST['u_administrativa']) && empty($_POST['u_fisica']) && empty($_POST['d_trabajo']) && empty($_POST['c_trabajo']) && empty($_POST['t_trabajo']) && empty($_POST['codigo_nominal']) && empty($_POST['cargo']) && empty($_POST['t_personal']) && empty($_POST['t_trabajador']) && empty($_POST['ocupacion']) && empty($_POST['carga_horaria']) && empty($_POST['jornada_diaria']) && empty($_POST['guardias_nocturnas']) && empty($_POST['asic']) && empty($_POST['organismo_adscripcion']) && empty($_POST['b_cargo']) && empty($_POST['f_ingreso']) && empty($_POST['asap']) && empty($_POST['j_patrimonio']) && empty($_POST['observaciones_t'])){

			$alert='<p class="msg_error">Todos los campos estan vacios</p>';

		}else{

			$idtrabajador = $_POST['idtrabajador'];
			$cedula = strtoupper($_POST['cedula']);
			$rif = strtoupper($_POST['rif']);
			$p_apellido = strtoupper($_POST['p_apellido']);
			$s_apellido = strtoupper($_POST['s_apellido']);
			$p_nombre = strtoupper($_POST['p_nombre']);
			$s_nombre = strtoupper($_POST['s_nombre']);
			$f_nacimiento = strtoupper($_POST['f_nacimiento']);
			$ciudad = strtoupper($_POST['ciudad']);
			$nacionalidad = strtoupper($_POST['nacionalidad']);
			$d_nacionalidad = strtoupper($_POST['d_nacionalidad']);
			$f_nacionalidad = strtoupper($_POST['f_nacionalidad']);
			$codigo_carnet_patria = strtoupper($_POST['codigo_carnet_patria']);
			$serial_carnet_patria = strtoupper($_POST['serial_carnet_patria']);
			$gaceta = strtoupper($_POST['gaceta']);
			$padre_madre = strtoupper($_POST['padre_madre']);
			$sexo = strtoupper($_POST['sexo']);
			$e_civil = strtoupper($_POST['e_civil']);
			$p_discapacidad = strtoupper($_POST['p_discapacidad']);
			$especifique_d = strtoupper($_POST['especifique_d']);
			$p_enfermedad = strtoupper($_POST['p_enfermedad']);
			$especifique_e = strtoupper($_POST['especifique_e']);
			$toma_medicamento = strtoupper($_POST['toma_medicamento']);
			$entidad_bancaria = strtoupper($_POST['entidad_bancaria']);
			$cuenta_nomina = strtoupper($_POST['cuenta_nomina']);
			$forma_pago = strtoupper($_POST['forma_pago']);
			$d_habitacion = strtoupper($_POST['d_habitacion']);
			$municipio = strtoupper($_POST['municipio']);
			$estado = strtoupper($_POST['estado']);
			$centro_votacion = strtoupper($_POST['centro_votacion']);
			$p_organizacion_social = strtoupper($_POST['p_organizacion_social']);
			$cual_organizacion_social = strtoupper($_POST['cual_organizacion_social']);
			$p_consejo_comunal = strtoupper($_POST['p_consejo_comunal']);
			$t_fijo = strtoupper($_POST['t_fijo']);
			$t_movil = strtoupper($_POST['t_movil']);
			$t_oficina = strtoupper($_POST['t_oficina']);
			$correo = strtoupper($_POST['correo']);
			$tipo_vivienda = strtoupper($_POST['tipo_vivienda']);
			$tendencia_vivienda = strtoupper($_POST['tendencia_vivienda']);
			$maneja = strtoupper($_POST['maneja']);
			$grado_licencia = strtoupper($_POST['grado_licencia']);
			$g_sanguineo = strtoupper($_POST['g_sanguineo']);
			$estatura = strtoupper($_POST['estatura']);
			$peso = strtoupper($_POST['peso']);
			$pantalon = strtoupper($_POST['pantalon']);
			$camisa = strtoupper($_POST['camisa']);
			$zapato = strtoupper($_POST['zapato']);
			$m_dominante = strtoupper($_POST['m_dominante']);
			$n_estudios = strtoupper($_POST['n_estudios']);
			$especialidad_doctorado = strtoupper($_POST['especialidad_doctorado']);
			$profesion = strtoupper($_POST['profesion']);
			$d_nominalmente = strtoupper($_POST['d_nominalmente']);
			$d_fisicamente = strtoupper($_POST['d_fisicamente']);
			$u_administrativa = strtoupper($_POST['u_administrativa']);
			$u_fisica = strtoupper($_POST['u_fisica']);
			$d_trabajo = strtoupper($_POST['d_trabajo']);
			$c_trabajo = strtoupper($_POST['c_trabajo']);
			$t_trabajo = strtoupper($_POST['t_trabajo']);
			$codigo_nominal = strtoupper($_POST['codigo_nominal']);
			$cargo = strtoupper($_POST['cargo']);
			$t_personal = strtoupper($_POST['t_personal']);
			$t_trabajador = strtoupper($_POST['t_trabajador']);
			$ocupacion = strtoupper($_POST['ocupacion']);
			$carga_horaria = strtoupper($_POST['carga_horaria']);
			$jornada_diaria = strtoupper($_POST['jornada_diaria']);
			$guardias_nocturnas = strtoupper($_POST['guardias_nocturnas']);
			$asic = strtoupper($_POST['asic']);
			$organismo_adscripcion = strtoupper($_POST['organismo_adscripcion']);
			$b_cargo = strtoupper($_POST['b_cargo']);
			$f_ingreso = strtoupper($_POST['f_ingreso']);
			$asap = strtoupper($_POST['asap']);
			$j_patrimonio = strtoupper($_POST['j_patrimonio']);
			$observaciones_t = strtoupper($_POST['observaciones_t']);

			$query = mysqli_query($conection, "SELECT * FROM trabajadores WHERE (CEDULA = '$cedula' AND ID != '$idtrabajador');");

			$result = mysqli_fetch_array($query);

			if($result > 0){

				$alert='<p class="msg_error">La cedula ya esta siendo utilizada</p>';

			}else{

				if(empty($codigo_nominal)) {
					$codigo_nominal = 0;
				}
				if(empty($f_nacimiento)) {
					$f_nacimiento = '0000-00-00';
				}
				if(empty($f_nacionalidad)) {
					$f_nacionalidad = '0000-00-00';
				}
				if(empty($f_ingreso)) {
					$f_ingreso = '0000-00-00';
				}

				$sql_update = mysqli_query($conection, "UPDATE trabajadores SET `CEDULA`='$cedula', `Nro DE RIF`='$rif', `PRIMER APELLIDO`='$p_apellido', `SEGUNDO APELLIDO`='$s_apellido', `PRIMER NOMBRE`='$p_nombre', `SEGUNDO NOMBRE`='$s_nombre', `FECHA DE NACIMIENTO`='$f_nacimiento', `CIUDAD`='$ciudad', `NACIONALIDAD`='$nacionalidad', `DOBLE NACIONALIDAD`='$d_nacionalidad', `FECHA DE NACIONALIDAD`='$f_nacionalidad', `CODIGO CARNET PATRIA`='$codigo_carnet_patria', `SERIAL CARNET PATRIA`='$serial_carnet_patria', `GACETA Nro`='$gaceta', `PADRE/MADRE`='$padre_madre', `SEXO`='$sexo', `ESTADO CIVIL`='$e_civil', `POSEE ALGUNA DISCAPACIDAD`='$p_discapacidad', `ESPECIFIQUE`='$especifique_d', `POSEE ALGUNA ENFERMEDAD`='$p_enfermedad', `ESPECIFIQUE ENFERMEDAD`='$especifique_e', `TOMA ALGUN MEDICAMENTO`='$toma_medicamento', `ENTIDAD BANCARIA`='$entidad_bancaria', `CUENTA NOMINA`='$cuenta_nomina', `FORMA DE PAGO`='$forma_pago', `DIRECCION DE HABITACION`='$d_habitacion', `MUNICIPIO`='$municipio', `ESTADO`='$estado', `CENTRO DE VOTACION`='$centro_votacion', `PERTENECE A UNA ORGANIZACION SOCIAL`='$p_organizacion_social', `CUAL ORGANIZACION SOCIAL`='$cual_organizacion_social', `PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD`='$p_consejo_comunal', `TELEFONO FIJO DE HABITACION`='$t_fijo', `TELEFONO MOVIL`='$t_movil', `TELEFONO DE OFICINA`='$t_oficina', `CORREO ELECTRONICO`='$correo', `TIPO DE VIVIENDA`='$tipo_vivienda', `TENDENCIA DE VIVIENDA`='$tendencia_vivienda', `MANEJA`='$maneja', `GRADO DE LICENCIA`='$grado_licencia', `GRUPO SANGUINEO`='$g_sanguineo', `ESTATURA`='$estatura', `PESO`='$peso', `PANTALON`='$pantalon', `CAMISA`='$camisa', `ZAPATO`='$zapato', `MANO DOMINANTE`='$m_dominante', `NIVEL EDUCATIVO ESTUDIOS`='$n_estudios', `ESPECIALIDAD O DOCTORADO`='$especialidad_doctorado', `PROFESION`='$profesion', `DEPENDENCIA ADSCRITA NOMINALMENTE`='$d_nominalmente', `DEPENDENCIA DONDE TRABAJA FISICAMENTE`='$d_fisicamente', `UBICACION ADMINISTRATIVA`='$u_administrativa', `UBICACION Fisica`='$u_fisica', `DIRECCION EXACTA DEL LUGAR DE TRABAJO`='$d_trabajo', `CORREO ELECTRONICO DEL LUGAR DE TRABAJO`='$c_trabajo', `TELEFONO DE LA OFICINA`='$t_trabajo', `CODIGO NOMINAL`='$codigo_nominal', `CARGO`='$cargo', `TIPO DE PERSONAL`='$t_personal', `TIPO DE TRABAJADOR`='$t_trabajador', `OCUPACION`='$ocupacion', `CARGA HORARIA`='$carga_horaria', `JORNADA DIARIA`='$jornada_diaria', `GUARDIAS NOCTURNAS`='$guardias_nocturnas', `ASIC`='$asic', `ORGANISMO DE ADSCRIPCION`='$organismo_adscripcion', `BREVE DESCRIPCION DEL CARGO`='$b_cargo', `FECHA DE INGRESO`='$f_ingreso', `ASAP ANTES DEL INGRESO D.S.M`='$asap', `DECLARACION JURADA DE PATRIMONIO`='$j_patrimonio', `OBSERVACIONES` ='$observaciones_t' WHERE `ID`='$idtrabajador';");

				if($sql_update){

					$alert='<p class="msg_save">El trabajador se ha actualizado exitosamente</p>';

				}else{

					$alert='<p class="msg_error">Error al actualizado trabajador</p>';

				}

			}

		}

		mysqli_close($conection);

	}

	//Mostrar Datos

	if(empty($_GET['ID'])){

		header('Location: lista_trabajadores.php');
		mysqli_close($conection);

	}

	include "../conexion.php";

	$ID_TRABAJADOR = $_GET['ID'];

	$sql = mysqli_query($conection, "SELECT * FROM trabajadores WHERE `ID` = '$ID_TRABAJADOR';");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){

		header('Location: lista_trabajadores.php');

	}else{

		while ($data = mysqli_fetch_array($sql)){

			$id = $data['ID'];
			$cedula = strtoupper($data['CEDULA']);
			$rif = strtoupper($data['Nro DE RIF']);
			$p_apellido = strtoupper($data['PRIMER APELLIDO']);
			$s_apellido = strtoupper($data['SEGUNDO APELLIDO']);
			$p_nombre = strtoupper($data['PRIMER NOMBRE']);
			$s_nombre = strtoupper($data['SEGUNDO NOMBRE']);
			$f_nacimiento = strtoupper($data['FECHA DE NACIMIENTO']);
			$ciudad = strtoupper($data['CIUDAD']);
			$nacionalidad = strtoupper($data['NACIONALIDAD']);
			$d_nacionalidad = strtoupper($data['DOBLE NACIONALIDAD']);
			$f_nacionalidad = strtoupper($data['FECHA DE NACIONALIDAD']);
			$codigo_carnet_patria = strtoupper($data['CODIGO CARNET PATRIA']);
			$serial_carnet_patria = strtoupper($data['SERIAL CARNET PATRIA']);
			$gaceta = strtoupper($data['GACETA Nro']);
			$padre_madre = strtoupper($data['PADRE/MADRE']);
			$sexo = strtoupper($data['SEXO']);
			$e_civil = strtoupper($data['ESTADO CIVIL']);
			$p_discapacidad = strtoupper($data['POSEE ALGUNA DISCAPACIDAD']);
			$especifique_d = strtoupper($data['ESPECIFIQUE']);
			$p_enfermedad = strtoupper($data['POSEE ALGUNA ENFERMEDAD']);
			$especifique_e = strtoupper($data['ESPECIFIQUE ENFERMEDAD']);
			$toma_medicamento = strtoupper($data['TOMA ALGUN MEDICAMENTO']);
			$entidad_bancaria = strtoupper($data['ENTIDAD BANCARIA']);
			$cuenta_nomina = strtoupper($data['CUENTA NOMINA']);
			$forma_pago = strtoupper($data['FORMA DE PAGO']);
			$d_habitacion = strtoupper($data['DIRECCION DE HABITACION']);
			$municipio = strtoupper($data['MUNICIPIO']);
			$estado = strtoupper($data['ESTADO']);
			$centro_votacion = strtoupper($data['CENTRO DE VOTACION']);
			$p_organizacion_social = strtoupper($data['PERTENECE A UNA ORGANIZACION SOCIAL']);
			$cual_organizacion_social = strtoupper($data['CUAL ORGANIZACION SOCIAL']);
			$p_consejo_comunal = strtoupper($data['PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD']);
			$t_fijo = strtoupper($data['TELEFONO FIJO DE HABITACION']);
			$t_movil = strtoupper($data['TELEFONO MOVIL']);
			$t_oficina = strtoupper($data['TELEFONO DE OFICINA']);
			$correo = strtoupper($data['CORREO ELECTRONICO']);
			$tipo_vivienda = strtoupper($data['TIPO DE VIVIENDA']);
			$tendencia_vivienda = strtoupper($data['TENDENCIA DE VIVIENDA']);
			$maneja = strtoupper($data['MANEJA']);
			$grado_licencia = strtoupper($data['GRADO DE LICENCIA']);
			$g_sanguineo = strtoupper($data['GRUPO SANGUINEO']);
			$estatura = strtoupper($data['ESTATURA']);
			$peso = strtoupper($data['PESO']);
			$pantalon = strtoupper($data['PANTALON']);
			$camisa = strtoupper($data['CAMISA']);
			$zapato = strtoupper($data['ZAPATO']);
			$m_dominante = strtoupper($data['MANO DOMINANTE']);
			$n_estudios = strtoupper($data['NIVEL EDUCATIVO ESTUDIOS']);
			$especialidad_doctorado = strtoupper($data['ESPECIALIDAD O DOCTORADO']);
			$profesion = strtoupper($data['PROFESION']);
			$d_nominalmente = strtoupper($data['DEPENDENCIA ADSCRITA NOMINALMENTE']);
			$d_fisicamente = strtoupper($data['DEPENDENCIA DONDE TRABAJA FISICAMENTE']);
			$u_administrativa = strtoupper($data['UBICACION ADMINISTRATIVA']);
			$u_fisica = strtoupper($data['UBICACION FISICA']);
			$d_trabajo = strtoupper($data['DIRECCION EXACTA DEL LUGAR DE TRABAJO']);
			$c_trabajo = strtoupper($data['CORREO ELECTRONICO DEL LUGAR DE TRABAJO']);
			$t_trabajo = strtoupper($data['TELEFONO DE LA OFICINA']);
			$codigo_nominal = strtoupper($data['CODIGO NOMINAL']);
			$cargo = strtoupper($data['CARGO']);
			$t_personal = strtoupper($data['TIPO DE PERSONAL']);
			$t_trabajador = strtoupper($data['TIPO DE TRABAJADOR']);
			$ocupacion = strtoupper($data['OCUPACION']);
			$carga_horaria = strtoupper($data['CARGA HORARIA']);
			$jornada_diaria = strtoupper($data['JORNADA DIARIA']);
			$guardias_nocturnas = strtoupper($data['GUARDIAS NOCTURNAS']);
			$asic = strtoupper($data['ASIC']);
			$organismo_adscripcion = strtoupper($data['ORGANISMO DE ADSCRIPCION']);
			$b_cargo = strtoupper($data['BREVE DESCRIPCION DEL CARGO']);
			$f_ingreso = strtoupper($data['FECHA DE INGRESO']);
			$asap = strtoupper($data['ASAP ANTES DEL INGRESO D.S.M']);
			$j_patrimonio = strtoupper($data['DECLARACION JURADA DE PATRIMONIO']);
			$observaciones_t = strtoupper($data['OBSERVACIONES']);

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Trabajador | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Actualizar Trabajador</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">

				<input type="hidden" name="idtrabajador" value="<?php echo $id; ?>">
				
				<label for="cedula">Cedula</label>
				<input type="number" name="cedula" id="cedula" placeholder="Cedula:" value="<?php echo $cedula; ?>">

				<label for="rif">Nro de Rif</label>
				<input type="text" name="rif" id="rif" placeholder="Nro de Rif:" value="<?php echo $rif; ?>">

				<label for="p_apellido">Primer Apellido</label>
				<input type="text" name="p_apellido" id="p_apellido" placeholder="Primer Apellido:" value="<?php echo $p_apellido; ?>">

				<label for="s_apellido">Segundo Apellido</label>
				<input type="text" name="s_apellido" id="s_apellido" placeholder="Segundo Apellido:" value="<?php echo $s_apellido; ?>">

				<label for="p_nombre">Primer Nombre</label>
				<input type="text" name="p_nombre" id="p_nombre" placeholder="Primer Nombre:" value="<?php echo $p_nombre; ?>">

				<label for="s_nombre">Segundo Nombre</label>
				<input type="text" name="s_nombre" id="s_nombre" placeholder="Segundo Nombre:" value="<?php echo $s_nombre; ?>">

				<label for="f_nacimiento">Fecha de Nacimiento</label>
				<input type="date" name="f_nacimiento" id="f_nacimiento" placeholder="Fecha de Nacimiento:" value="<?php echo $f_nacimiento; ?>">

				<label for="ciudad">Lugar de Nacimiento</label>
				<input type="text" name="ciudad" id="ciudad" placeholder="Lugar de Nacimiento:" value="<?php echo $ciudad; ?>">

				<label for="nacionalidad">Nacionalidad</label>
				<input type="text" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad:" value="<?php echo $nacionalidad; ?>">

				<label for="d_nacionalidad">Doble Nacionalidad</label>
				<select name="d_nacionalidad" id="d_nacionalidad">
					<option <?php if(strcmp ($d_nacionalidad,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($d_nacionalidad,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($d_nacionalidad,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="f_nacionalidad">Fecha de Nacionalidad</label>
				<input type="date" name="f_nacionalidad" id="f_nacionalidad" placeholder="Fecha de Nacionalidad:" value="<?php echo $f_nacionalidad; ?>">

				<label for="codigo_carnet_patria">Codigo Carnet Patria</label>
				<input type="number" name="codigo_carnet_patria" id="codigo_carnet_patria" placeholder="Codigo Carnet Patria:" value="<?php echo $codigo_carnet_patria ?>">

				<label for="serial_carnet_patria">Serial Carnet Patria</label>
				<input type="number" name="serial_carnet_patria" id="serial_carnet_patria" placeholder="Serial Carnet Patria:" value="<?php echo $serial_carnet_patria ?>">

				<label for="gaceta">Gaceta Nro</label>
				<input type="text" name="gaceta" id="gaceta" placeholder="Gaceta Nro:" value="<?php echo $gaceta; ?>">

				<label for="padre_madre">Tiene Hijos</label>
				<select name="padre_madre" id="padre_madre">
					<option <?php if(strcmp ($padre_madre,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($padre_madre,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($padre_madre,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo">
					<option <?php if(strcmp ($sexo,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($sexo,'MASCULINO') == 0) { echo "selected"; } ?> >MASCULINO</option>
					<option <?php if(strcmp ($sexo,'FEMENINO') == 0) { echo "selected"; } ?> >FEMENINO</option>
				</select>

				<label for="e_civil">Estado Civil</label>
				<select name="e_civil" id="e_civil">
					<option <?php if(strcmp ($e_civil,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($e_civil,'SOLTERO/A') == 0) { echo "selected"; } ?> >SOLTERO/A</option>
					<option <?php if(strcmp ($e_civil,'CASADO/A') == 0) { echo "selected"; } ?> >CASADO/A</option>
					<option <?php if(strcmp ($e_civil,'DIVORCIADO/A') == 0) { echo "selected"; } ?> >DIVORCIADO/A</option>
					<option <?php if(strcmp ($e_civil,'VIUDO/A') == 0) { echo "selected"; } ?> >VIUDO/A</option>
					<option <?php if(strcmp ($e_civil,'OTRO') == 0) { echo "selected"; } ?> >OTRO</option>
				</select>

				<label for="p_discapacidad">Posee Alguna Discapacidad</label>
				<select name="p_discapacidad" id="p_discapacidad">
					<option <?php if(strcmp ($p_discapacidad,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($p_discapacidad,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($p_discapacidad,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="especifique_d">Especifique Discapacidad</label>
				<input type="text" name="especifique_d" id="especifique_d" placeholder="Especifique Discapacidad:" value="<?php echo $especifique_d; ?>">

				<label for="p_enfermedad">Posee Alguna Enfermedad</label>
				<select name="p_enfermedad" id="p_enfermedad">
					<option <?php if(strcmp ($p_enfermedad,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($p_enfermedad,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($p_enfermedad,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="especifique_e">Especifique Enfermedad</label>
				<input type="text" name="especifique_e" id="especifique_e" placeholder="Especifique Enfermedad:" value="<?php echo $especifique_e; ?>">

				<label for="toma_medicamento">Toma Algun Medicamento</label>
				<input type="text" name="toma_medicamento" id="toma_medicamento" placeholder="Toma Algun Medicamento:" value="<?php echo $toma_medicamento; ?>">

				<label for="entidad_bancaria">Entidad Bancaria</label>
				<input type="text" name="entidad_bancaria" id="entidad_bancaria" placeholder="Entidad Bancaria:" value="<?php echo $entidad_bancaria; ?>">

				<label for="cuenta_nomina">Cuenta Nomina</label>
				<input type="text" name="cuenta_nomina" id="cuenta_nomina" placeholder="Cuenta Nomina:" value="<?php echo $cuenta_nomina; ?>">

				<label for="forma_pago">Forma de Pago</label>
				<input type="text" name="forma_pago" id="forma_pago" placeholder="Forma de Pago:" value="<?php echo $forma_pago; ?>">

				<label for="d_habitacion">Direccion de Habitacion</label>
				<input type="text" name="d_habitacion" id="d_habitacion" placeholder="Direccion de Habitacion:" value="<?php echo $d_habitacion; ?>">

				<label for="municipio">Municipio</label>
				<input type="text" name="municipio" id="municipio" placeholder="Municipio:" value="<?php echo $municipio; ?>">

				<label for="estado">Estado</label>
				<input type="text" name="estado" id="estado" placeholder="Estado:" value="<?php echo $estado; ?>">

				<label for="centro_votacion">Centro de Votacion</label>
				<input type="text" name="centro_votacion" id="centro_votacion" placeholder="Centro de Votacion:" value="<?php echo $centro_votacion; ?>">

				<label for="p_organizacion_social">Pertenece a una Organizacion Social</label>
				<select name="p_organizacion_social" id="p_organizacion_social">
					<option <?php if(strcmp ($p_organizacion_social,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($p_organizacion_social,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($p_organizacion_social,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="cual_organizacion_social">Cual Organizacion Social</label>
				<input type="text" name="cual_organizacion_social" id="cual_organizacion_social" placeholder="Cual Organizacion Social:" value="<?php echo $cual_organizacion_social; ?>">

				<label for="p_consejo_comunal">Pertenece al Consejo Comunal de su Comunidad</label>
				<select name="p_consejo_comunal" id="p_consejo_comunal">
					<option <?php if(strcmp ($p_consejo_comunal,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($p_consejo_comunal,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($p_consejo_comunal,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="t_fijo">Telefono Fijo de Habitacion</label>
				<input type="number" name="t_fijo" id="t_fijo" placeholder="Telefono Fijo de Habitacion:" value="<?php echo $t_fijo; ?>">

				<label for="t_movil">Telefono Movil</label>
				<input type="number" name="t_movil" id="t_movil" placeholder="Telefono Movil:" value="<?php echo $t_movil; ?>">

				<label for="t_oficina">Telefono de Oficina</label>
				<input type="number" name="t_oficina" id="t_oficina" placeholder="Telefono de Oficina:" value="<?php echo $t_oficina; ?>">

				<label for="correo">Correo Electronico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo Electronico:" value="<?php echo $correo; ?>">

				<label for="tipo_vivienda">Tipo de Vivienda</label>
				<select name="tipo_vivienda" id="tipo_vivienda">
					<option <?php if(strcmp ($tipo_vivienda,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($tipo_vivienda,'APARTAMENTO') == 0) { echo "selected"; } ?> >APARTAMENTO</option>
					<option <?php if(strcmp ($tipo_vivienda,'CASA') == 0) { echo "selected"; } ?> >CASA</option>
					<option <?php if(strcmp ($tipo_vivienda,'OTRO') == 0) { echo "selected"; } ?> >OTRO</option>
				</select>

				<label for="tendencia_vivienda">Tendencia de Vivienda</label>
				<select name="tendencia_vivienda" id="tendencia_vivienda">
					<option <?php if(strcmp ($tendencia_vivienda,'') == 0) { echo "selected"; } ?>></option>
					<option <?php if(strcmp ($tendencia_vivienda,'PROPIA') == 0) { echo "selected"; } ?> >PROPIA</option>
					<option <?php if(strcmp ($tendencia_vivienda,'ALQUILADA') == 0) { echo "selected"; } ?> >ALQUILADA</option>
					<option <?php if(strcmp ($tendencia_vivienda,'FAMILIAR') == 0) { echo "selected"; } ?> >FAMILIAR</option>
					<option <?php if(strcmp ($tendencia_vivienda,'OTRO') == 0) { echo "selected"; } ?> >OTRO</option>
				</select>

				<label for="maneja">Maneja</label>
				<select name="maneja" id="maneja">
					<option <?php if(strcmp ($maneja,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($maneja,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($maneja,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for="grado_licencia">Grado de Licencia</label>
				<select name="grado_licencia" id="grado_licencia">
					<option <?php if(strcmp ($grado_licencia,'NO POSEE') == 0) { echo "selected"; } ?> >NO POSEE</option>
					<option <?php if(strcmp ($grado_licencia,'2DO GRADO') == 0) { echo "selected"; } ?> >2DO GRADO</option>
					<option <?php if(strcmp ($grado_licencia,'3RO GRADO') == 0) { echo "selected"; } ?> >3RO GRADO</option>
					<option <?php if(strcmp ($grado_licencia,'4TO GRADO') == 0) { echo "selected"; } ?> >4TO GRADO</option>
					<option <?php if(strcmp ($grado_licencia,'5TO GRADO') == 0) { echo "selected"; } ?> >5TO GRADO</option>
				</select>

				<label for="g_sanguineo">Grupo Sanguineo</label>
				<input type="text" name="g_sanguineo" id="g_sanguineo" placeholder="Grupo Sanguineo:" value="<?php echo $g_sanguineo; ?>">

				<label for="estatura">Estatura</label>
				<input type="number" name="estatura" id="estatura" placeholder="Estatura (Metros):" min="0" max="3" step="0.01" value="<?php echo $estatura; ?>">

				<label for="peso">Peso</label>
				<input type="number" name="peso" id="peso" placeholder="Peso (KG):" min="0" max="300" step="0.1" value="<?php echo $peso; ?>">

				<label for="pantalon">Talla de Pantalon</label>
				<input type="text" name="pantalon" id="pantalon" placeholder="Pantalon:" value="<?php echo $pantalon; ?>">

				<label for="camisa">Talla de Camisa</label>
				<input type="text" name="camisa" id="camisa" placeholder="Camisa:" value="<?php echo $camisa; ?>">

				<label for="zapato">Talla de Zapato</label>
				<input type="number" name="zapato" id="zapato" placeholder="Zapato:" min="0" max="60" value="<?php echo $zapato; ?>">

				<label for="m_dominante">Mano Dominante</label>
				<select name="m_dominante" id="m_dominante">
					<option <?php if(strcmp ($m_dominante,'') == 0) { echo "selected"; } ?> ></option>
					<option <?php if(strcmp ($m_dominante,'DERECHA') == 0) { echo "selected"; } ?> >DERECHA</option>
					<option <?php if(strcmp ($m_dominante,'IZQUIERDA') == 0) { echo "selected"; } ?> >IZQUIERDA</option>
					<option <?php if(strcmp ($m_dominante,'AMBIDIESTRO') == 0) { echo "selected"; } ?> >AMBIDIESTRO</option>
				</select>

				<label for=n_estudios>Nivel Educativo Estudios (Ultimo Grado Obtenido):</label>
				<input type="text" name="n_estudios" id="n_estudios" list="lista_grados" placeholder="Nivel Educativo Estudios (Ultimo Grado Obtenido):" value="<?php echo $n_estudios; ?>">
				<datalist name="lista_grados" id="lista_grados">
					<option>PRIMARIA</option>
					<option>BACHILLER</option>
					<option>TECNICO SUPERIOR UNIVERSITARIO</option>
					<option>INGENIERIA</option>
					<option>LICENCIATURA</option>
					<option>MAESTRIA</option>
					<option>DOCTORADO</option>
				</datalist>

				<label for=especialidad_doctorado>Especialidad o Doctorado</label>
				<input type="text" name="especialidad_doctorado" id="especialidad_doctorado" placeholder="Especialidad o Doctorado en:" value="<?php echo $especialidad_doctorado; ?>">

				<label for="profesion">Profesion</label>
				<input type="text" name="profesion" id="profesion" placeholder="Profesion:" value="<?php echo $profesion; ?>">

				<label for=d_nominalmente>Dependencia Adscrita Nominalmente</label>
				<input type="text" name="d_nominalmente" id="d_nominalmente" placeholder="Dependencia Adscrita Nominalmente:" value="<?php echo $d_nominalmente; ?>">

				<label for=d_fisicamente>Dependencia Donde Trabaja Fisicamente</label>
				<input type="text" name="d_fisicamente" id="d_fisicamente" placeholder="Dependencia Donde Trabaja Fisicamente:" value="<?php echo $d_fisicamente; ?>">

				<label for=u_administrativa>Ubicacion Administrativa</label>
				<input type="text" name="u_administrativa" id="u_administrativa" placeholder="Ubicacion Administrativa:" value="<?php echo $u_administrativa; ?>">

				<label for=u_fisica>Ubicacion Fisica</label>
				<input type="text" name="u_fisica" id="u_fisica" placeholder="Ubicacion Fisica:" value="<?php echo $u_fisica; ?>">

				<label for=d_trabajo>Direccion Exacta del Lugar de Trabajo</label>
				<input type="text" name="d_trabajo" id="d_trabajo" placeholder="Direccion Exacta del Lugar de Trabajo:" value="<?php echo $d_trabajo; ?>">

				<label for=c_trabajo>Correo Electronico del Lugar de Trabajo</label>
				<input type="email" name="c_trabajo" id="c_trabajo" placeholder="Correo Electronico del Lugar de Trabajo:" value="<?php echo $c_trabajo; ?>">

				<label for=t_trabajo>Telefono de la Oficina</label>
				<input type="number" name="t_trabajo" id="t_trabajo" placeholder="Telefono de la Oficina:" value="<?php echo $t_trabajo; ?>">

				<label for=codigo_nominal>Codigo de Nomina</label>
				<input type="number" name="codigo_nominal" id="codigo_nominal" placeholder="Codigo de Nomina:" value="<?php echo $codigo_nominal; ?>">

				<label for=cargo>Cargo</label>
				<input type="text" name="cargo" id=cargo placeholder="Cargo:" value="<?php echo $cargo; ?>">

				<label for=t_personal>Tipo de Personal</label>
				<input type="text" name="t_personal" id="t_personal" placeholder="Tipo de Personal:" value="<?php echo $t_personal; ?>">

				<label for=t_trabajador>Tipo de Trabajador</label>
				<input type="text" name="t_trabajador" id="t_trabajador" placeholder="Tipo de Trabajador:" value="<?php echo $t_trabajador; ?>">

				<label for=ocupacion>Ocupacion</label>
				<input type="text" name="ocupacion" id=ocupacion placeholder="Ocupacion:" value="<?php echo $ocupacion; ?>">

				<label for=carga_horaria>Carga Horaria</label>
				<input type="text" name="carga_horaria" id="carga_horaria" placeholder="Carga Horaria:" value="<?php echo $carga_horaria; ?>">

				<label for=jornada_diaria>Jornada Diaria</label>
				<input type="text" name="jornada_diaria" id="jornada_diaria" placeholder="Jornada Diaria:" value="<?php echo $jornada_diaria; ?>">

				<label for=guardias_nocturnas>Guardias Nocturnas</label>
				<input type="text" name="guardias_nocturnas" id="guardias_nocturnas" placeholder="Guardias Nocturnas:" value="<?php echo $guardias_nocturnas; ?>">

				<label for=asic>ASIC</label>
				<input type="text" name="asic" id="asic" placeholder="ASIC:" value="<?php echo $asic; ?>">

				<label for=organismo_adscripcion>Organismo de Adscripcion</label>
				<input type="text" name="organismo_adscripcion" id="organismo_adscripcion" placeholder="Organismo de Adscripcion:" value="<?php echo $organismo_adscripcion; ?>">

				<label for=b_cargo>Breve Descripcion del Cargo</label>
				<input type="text" name=b_cargo id="b_cargo" placeholder="Breve Descripcion del Cargo:" value="<?php echo $b_cargo; ?>">

				<label for="f_ingreso">Fecha de Ingreso</label>
				<input type="date" name="f_ingreso" id="f_ingreso" placeholder="Fecha de Ingreso" value="<?php echo $f_ingreso; ?>">

				<label for=asap>ASAP Antes del Ingreso D.S.M</label>
				<input type="text" name="asap" id="asap" placeholder="ASAP Antes del Ingreso D.S.M:" value="<?php echo $asap; ?>">

				<label for=j_patrimonio>Declaracion Jurada de Patrimonio</label>
				<select name="j_patrimonio" id="j_patrimonio">
					<option <?php if(strcmp ($j_patrimonio,'') == 0) { echo "selected"; } ?>></option>
					<option <?php if(strcmp ($j_patrimonio,'NO') == 0) { echo "selected"; } ?> >NO</option>
					<option <?php if(strcmp ($j_patrimonio,'SI') == 0) { echo "selected"; } ?> >SI</option>
				</select>

				<label for=observaciones_t>Observaciones</label>
				<textarea name="observaciones_t" id="observaciones_t" placeholder="Observaciones:"><?php echo $observaciones_t?></textarea>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Actualizar Trabajador">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>