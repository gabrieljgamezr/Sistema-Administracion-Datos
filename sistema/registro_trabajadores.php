<?php

	session_start();

	include "../conexion.php";

	if(!empty($_POST)){

		$alert='';

		if(empty($_POST['cedula']) && empty($_POST['rif']) && empty($_POST['p_apellido']) && empty($_POST['s_apellido']) && empty($_POST['p_nombre']) && empty($_POST['s_nombre']) && empty($_POST['f_nacimiento']) && empty($_POST['ciudad']) && empty($_POST['nacionalidad']) && empty($_POST['d_nacionalidad']) && empty($_POST['f_nacionalidad']) && empty($_POST['codigo_carnet_patria']) && empty($_POST['serial_carnet_patria']) && empty($_POST['gaceta']) && empty($_POST['padre_madre']) && empty($_POST['sexo']) && empty($_POST['e_civil']) && empty($_POST['p_discapacidad']) && empty($_POST['especifique_d']) && empty($_POST['p_enfermedad']) && empty($_POST['especifique_e']) && empty($_POST['toma_medicamento'])&& empty($_POST['entidad_bancaria']) && empty($_POST['cuenta_nomina']) && empty($_POST['forma_pago']) && empty($_POST['d_habitacion']) && empty($_POST['municipio']) && empty($_POST['estado']) && empty($_POST['centro_votacion']) && empty($_POST['p_organizacion_social']) && empty($_POST['cual_organizacion_social']) && empty($_POST['p_consejo_comunal']) && empty($_POST['t_fijo']) && empty($_POST['t_movil']) && empty($_POST['t_oficina']) && empty($_POST['correo']) && empty($_POST['tipo_vivienda']) && empty($_POST['tendencia_vivienda']) && empty($_POST['maneja']) && strcmp ($_POST['grado_licencia'],'No posee') == 0 && empty($_POST['g_sanguineo']) && empty($_POST['estatura']) && empty($_POST['peso']) && empty($_POST['pantalon']) && empty($_POST['camisa']) && empty($_POST['zapato']) && empty($_POST['m_dominante']) && empty($_POST['n_estudios']) && empty($_POST['especialidad_doctorado']) && empty($_POST['profesion']) && empty($_POST['d_nominalmente']) && empty($_POST['d_fisicamente']) && empty($_POST['u_administrativa']) && empty($_POST['u_fisica']) && empty($_POST['d_trabajo']) && empty($_POST['c_trabajo']) && empty($_POST['t_trabajo']) && empty($_POST['codigo_nominal']) && empty($_POST['cargo']) && empty($_POST['t_personal']) && empty($_POST['t_trabajador']) && empty($_POST['ocupacion']) && empty($_POST['carga_horaria']) && empty($_POST['jornada_diaria']) && empty($_POST['guardias_nocturnas']) && empty($_POST['asic']) && empty($_POST['organismo_adscripcion']) && empty($_POST['b_cargo']) && empty($_POST['f_ingreso']) && empty($_POST['asap']) && empty($_POST['j_patrimonio']) && empty($_POST['observaciones_t'])){

			$alert='<p class="msg_error">Todos los campos estan vacios</p>';

		}else{

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

			$query = mysqli_query($conection, "SELECT * FROM trabajadores WHERE (CEDULA = '$cedula');");

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

				$query_insert = mysqli_query($conection, "INSERT INTO trabajadores (`CEDULA`, `Nro DE RIF`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `PRIMER NOMBRE`, `SEGUNDO NOMBRE`, `FECHA DE NACIMIENTO`, `CIUDAD`, `NACIONALIDAD`, `DOBLE NACIONALIDAD`, `FECHA DE NACIONALIDAD`, `CODIGO CARNET PATRIA`, `SERIAL CARNET PATRIA`, `GACETA Nro`, `PADRE/MADRE`, `SEXO`, `ESTADO CIVIL`, `POSEE ALGUNA DISCAPACIDAD`, `ESPECIFIQUE`, `POSEE ALGUNA ENFERMEDAD`, `ESPECIFIQUE ENFERMEDAD`, `TOMA ALGUN MEDICAMENTO`, `ENTIDAD BANCARIA`, `CUENTA NOMINA`, `FORMA DE PAGO`, `DIRECCION DE HABITACION`, `MUNICIPIO`, `ESTADO`, `CENTRO DE VOTACION`, `PERTENECE A UNA ORGANIZACION SOCIAL`, `CUAL ORGANIZACION SOCIAL`, `PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD`, `TELEFONO FIJO DE HABITACION`, `TELEFONO MOVIL`, `TELEFONO DE OFICINA`, `CORREO ELECTRONICO`, `TIPO DE VIVIENDA`, `TENDENCIA DE VIVIENDA`, `MANEJA`, `GRADO DE LICENCIA`, `GRUPO SANGUINEO`, `ESTATURA`, `PESO`, `PANTALON`, `CAMISA`, `ZAPATO`, `MANO DOMINANTE`, `NIVEL EDUCATIVO ESTUDIOS`, `ESPECIALIDAD O DOCTORADO`, `PROFESION`, `DEPENDENCIA ADSCRITA NOMINALMENTE`, `DEPENDENCIA DONDE TRABAJA FISICAMENTE`, `UBICACION ADMINISTRATIVA`, `UBICACION FISICA`, `DIRECCION EXACTA DEL LUGAR DE TRABAJO`, `CORREO ELECTRONICO DEL LUGAR DE TRABAJO`, `TELEFONO DE LA OFICINA`, `CODIGO NOMINAL`, `CARGO`, `TIPO DE PERSONAL`, `TIPO DE TRABAJADOR`, `OCUPACION`, `CARGA HORARIA`, `JORNADA DIARIA`, `GUARDIAS NOCTURNAS`, `ASIC`, `ORGANISMO DE ADSCRIPCION`, `BREVE DESCRIPCION DEL CARGO`, `FECHA DE INGRESO`, `ASAP ANTES DEL INGRESO D.S.M`, `DECLARACION JURADA DE PATRIMONIO`, `OBSERVACIONES`) VALUES ('$cedula', '$rif', '$p_apellido', '$s_apellido', '$p_nombre', '$s_nombre', '$f_nacimiento', '$ciudad', '$nacionalidad', '$d_nacionalidad', '$f_nacionalidad', '$codigo_carnet_patria', '$serial_carnet_patria', '$gaceta', '$padre_madre', '$sexo', '$e_civil', '$p_discapacidad', '$especifique_d', '$p_enfermedad', '$especifique_e', '$toma_medicamento', '$entidad_bancaria', '$cuenta_nomina', '$forma_pago', '$d_habitacion', '$municipio', '$estado', '$centro_votacion', '$p_organizacion_social', '$cual_organizacion_social', '$p_consejo_comunal', '$t_fijo', '$t_movil', '$t_oficina', '$correo', '$tipo_vivienda', '$tendencia_vivienda', '$maneja', '$grado_licencia', '$g_sanguineo', '$estatura', '$peso', '$pantalon', '$camisa', '$zapato', '$m_dominante', '$n_estudios', '$especialidad_doctorado', '$profesion', '$d_nominalmente', '$d_fisicamente', '$u_administrativa', '$u_fisica', '$d_trabajo', '$c_trabajo', '$t_trabajo', '$codigo_nominal', '$cargo', '$t_personal', '$t_trabajador', '$ocupacion', '$carga_horaria', '$jornada_diaria', '$guardias_nocturnas', '$asic', '$organismo_adscripcion', '$b_cargo', '$f_ingreso', '$asap', '$j_patrimonio', '$observaciones_t');");
				mysqli_close($conection);

				if($query_insert){

						header("Location: pregunta.php");

						$alert='<p class="msg_save">El trabajador se ha registrado exitosamente</p>';

				}else{

					$alert='<p class="msg_error">Error al registrar trabajador</p>';

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
	<title>Registrar Trabajador | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<div class="form_register">
			
			<h1>Registrar Trabajador</h1>
			<hr>

			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				
				<label for="cedula">Cedula</label>
				<input type="number" name="cedula" id="cedula" placeholder="Cedula:">

				<label for="rif">Nro de Rif</label>
				<input type="text" name="rif" id="rif" placeholder="Nro de Rif:">

				<label for="p_apellido">Primer Apellido</label>
				<input type="text" name="p_apellido" id="p_apellido" placeholder="Primer Apellido:">

				<label for="s_apellido">Segundo Apellido</label>
				<input type="text" name="s_apellido" id="s_apellido" placeholder="Segundo Apellido:">

				<label for="p_nombre">Primer Nombre</label>
				<input type="text" name="p_nombre" id="p_nombre" placeholder="Primer Nombre:">

				<label for="s_nombre">Segundo Nombre</label>
				<input type="text" name="s_nombre" id="s_nombre" placeholder="Segundo Nombre:">

				<label for="f_nacimiento">Fecha de Nacimiento</label>
				<input type="date" name="f_nacimiento" id="f_nacimiento" placeholder="Fecha de Nacimiento:">

				<label for="ciudad">Lugar de Nacimiento</label>
				<input type="text" name="ciudad" id="ciudad" placeholder="Lugar de Nacimiento:">

				<label for="nacionalidad">Nacionalidad</label>
				<input type="text" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad:">

				<label for="d_nacionalidad">Doble Nacionalidad</label>
				<select name="d_nacionalidad" id="d_nacionalidad">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="f_nacionalidad">Fecha de Nacionalidad</label>
				<input type="date" name="f_nacionalidad" id="f_nacionalidad" placeholder="Fecha de Nacionalidad:">

				<label for="codigo_carnet_patria">Codigo Carnet Patria</label>
				<input type="number" name="codigo_carnet_patria" id="codigo_carnet_patria" placeholder="Codigo Carnet Patria:">

				<label for="serial_carnet_patria">Serial Carnet Patria</label>
				<input type="number" name="serial_carnet_patria" id="serial_carnet_patria" placeholder="Serial Carnet Patria:">

				<label for="gaceta">Gaceta Nro</label>
				<input type="text" name="gaceta" id="gaceta" placeholder="Gaceta Nro:">

				<label for="padre_madre">Tiene Hijos</label>
				<select name="padre_madre" id="padre_madre">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo">
					<option selected></option>
					<option>MASCULINO</option>
					<option>FEMENINO</option>
				</select>

				<label for="e_civil">Estado Civil</label>
				<select name="e_civil" id="e_civil">
					<option selected></option>
					<option>SOLTERO/A</option>
					<option>CASADO/A</option>
					<option>DIVORCIADO/A</option>
					<option>VIUDO/A</option>
					<option>OTRO</option>
				</select>

				<label for="p_discapacidad">Posee Alguna Discapacidad</label>
				<select name="p_discapacidad" id="p_discapacidad">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="especifique_d">Especifique Discapacidad</label>
				<input type="text" name="especifique_d" id="especifique_d" placeholder="Especifique Discapacidad:">

				<label for="p_enfermedad">Posee Alguna Enfermedad</label>
				<select name="p_enfermedad" id="p_enfermedad">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="especifique_e">Especifique Enfermedad</label>
				<input type="text" name="especifique_e" id="especifique_e" placeholder="Especifique Enfermedad:">

				<label for="toma_medicamento">Toma Algun Medicamento</label>
				<input type="text" name="toma_medicamento" id="toma_medicamento" placeholder="Toma Algun Medicamento:">

				<label for="entidad_bancaria">Entidad Bancaria</label>
				<input type="text" name="entidad_bancaria" id="entidad_bancaria" placeholder="Entidad Bancaria:">

				<label for="cuenta_nomina">Cuenta Nomina</label>
				<input type="text" name="cuenta_nomina" id="cuenta_nomina" placeholder="Cuenta Nomina:">

				<label for="forma_pago">Forma de Pago</label>
				<input type="text" name="forma_pago" id="forma_pago" placeholder="Forma de Pago:">

				<label for="d_habitacion">Direccion de Habitacion</label>
				<input type="text" name="d_habitacion" id="d_habitacion" placeholder="Direccion de Habitacion:">

				<label for="municipio">Municipio</label>
				<input type="text" name="municipio" id="municipio" placeholder="Municipio:">

				<label for="estado">Estado</label>
				<input type="text" name="estado" id="estado" placeholder="Estado:">

				<label for="centro_votacion">Centro de Votacion</label>
				<input type="text" name="centro_votacion" id="centro_votacion" placeholder="Centro de Votacion:">

				<label for="p_organizacion_social">Pertenece a una Organizacion Social</label>
				<select name="p_organizacion_social" id="p_organizacion_social">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="cual_organizacion_social">Cual Organizacion Social</label>
				<input type="text" name="cual_organizacion_social" id="cual_organizacion_social" placeholder="Cual Organizacion Social:">

				<label for="p_consejo_comunal">Pertenece al Consejo Comunal de su Comunidad</label>
				<select name="p_consejo_comunal" id="p_consejo_comunal">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="t_fijo">Telefono Fijo de Habitacion</label>
				<input type="number" name="t_fijo" id="t_fijo" placeholder="Telefono Fijo de Habitacion:">

				<label for="t_movil">Telefono Movil</label>
				<input type="number" name="t_movil" id="t_movil" placeholder="Telefono Movil:">

				<label for="t_oficina">Telefono de Oficina</label>
				<input type="number" name="t_oficina" id="t_oficina" placeholder="Telefono de Oficina:">

				<label for="correo">Correo Electronico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo Electronico:">

				<label for="tipo_vivienda">Tipo de Vivienda</label>
				<select name="tipo_vivienda" id="tipo_vivienda">
					<option selected></option>
					<option>APARTAMENTO</option>
					<option>CASA</option>
					<option>OTRO</option>
				</select>

				<label for="tendencia_vivienda">Tendencia de Vivienda</label>
				<select name="tendencia_vivienda" id="tendencia_vivienda">
					<option selected></option>
					<option>PROPIA</option>
					<option>ALQUILADA</option>
					<option>FAMILIAR</option>
					<option>OTRO</option>
				</select>

				<label for="maneja">Maneja</label>
				<select name="maneja" id="maneja">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for="grado_licencia">Grado de Licencia</label>
				<select name="grado_licencia" id="grado_licencia">
					<option selected>NO POSEE</option>
					<option>2DO GRADO</option>
					<option>3RO GRADO</option>
					<option>4TO GRADO</option>
					<option>5TO GRADO</option>
				</select>

				<label for="g_sanguineo">Grupo Sanguineo</label>
				<input type="text" name="g_sanguineo" id="g_sanguineo" placeholder="Grupo Sanguineo:">

				<label for="estatura">Estatura</label>
				<input type="number" name="estatura" id="estatura" placeholder="Estatura (Metros):" min="0" max="3" step="0.01">

				<label for="peso">Peso</label>
				<input type="number" name="peso" id="peso" placeholder="Peso (KG):" min="0" max="300" step="0.1">

				<label for="pantalon">Talla de Pantalon</label>
				<input type="text" name="pantalon" id="pantalon" placeholder="Pantalon:">

				<label for="camisa">Talla de Camisa</label>
				<input type="text" name="camisa" id="camisa" placeholder="Camisa:">

				<label for="zapato">Talla de Zapato</label>
				<input type="number" name="zapato" id="zapato" placeholder="Zapato:" min="0" max="60">

				<label for="m_dominante">Mano Dominante</label>
				<select name="m_dominante" id="m_dominante">
					<option selected></option>
					<option>DERECHA</option>
					<option>IZQUIERDA</option>
					<option>AMBIDIESTRO</option>
				</select>

				<label for=n_estudios>Nivel Educativo Estudios (Ultimo Grado Obtenido):</label>
				<input type="text" name="n_estudios" id="n_estudios" list="lista_grados" placeholder="Nivel Educativo Estudios (Ultimo Grado Obtenido):">
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
				<input type="text" name="especialidad_doctorado" id="especialidad_doctorado" placeholder="Especialidad o Doctorado en:">

				<label for="profesion">Profesion</label>
				<input type="text" name="profesion" id="profesion" placeholder="Profesion:">

				<label for=d_nominalmente>Dependencia Adscrita Nominalmente</label>
				<input type="text" name="d_nominalmente" id="d_nominalmente" placeholder="Dependencia Adscrita Nominalmente:">

				<label for=d_fisicamente>Dependencia Donde Trabaja Fisicamente</label>
				<input type="text" name="d_fisicamente" id="d_fisicamente" placeholder="Dependencia Donde Trabaja Fisicamente:">

				<label for=u_administrativa>Ubicacion Administrativa</label>
				<input type="text" name="u_administrativa" id="u_administrativa" placeholder="Ubicacion Administrativa:">

				<label for=u_fisica>Ubicacion Fisica</label>
				<input type="text" name="u_fisica" id="u_fisica" placeholder="Ubicacion Fisica:">

				<label for=d_trabajo>Direccion Exacta del Lugar de Trabajo</label>
				<input type="text" name="d_trabajo" id="d_trabajo" placeholder="Direccion Exacta del Lugar de Trabajo:">

				<label for=c_trabajo>Correo Electronico del Lugar de Trabajo</label>
				<input type="email" name="c_trabajo" id="c_trabajo" placeholder="Correo Electronico del Lugar de Trabajo:">

				<label for=t_trabajo>Telefono de la Oficina</label>
				<input type="number" name="t_trabajo" id="t_trabajo" placeholder="Telefono de la Oficina:">

				<label for=codigo_nominal>Codigo de Nomina</label>
				<input type="number" name="codigo_nominal" id="codigo_nominal" placeholder="Codigo de Nomina:">

				<label for=cargo>Cargo</label>
				<input type="text" name="cargo" id=cargo placeholder="Cargo:">

				<label for=t_personal>Tipo de Personal</label>
				<input type="text" name="t_personal" id="t_personal" placeholder="Tipo de Personal:">

				<label for=t_trabajador>Tipo de Trabajador</label>
				<input type="text" name="t_trabajador" id="t_trabajador" placeholder="Tipo de Trabajador:">

				<label for=ocupacion>Ocupacion</label>
				<input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupacion:">

				<label for=carga_horaria>Carga Horaria</label>
				<input type="text" name="carga_horaria" id="carga_horaria" placeholder="Carga Horaria:">

				<label for=jornada_diaria>Jornada Diaria</label>
				<input type="text" name="jornada_diaria" id="jornada_diaria" placeholder="Jornada Diaria:">

				<label for=guardias_nocturnas>Guardias Nocturnas</label>
				<input type="text" name="guardias_nocturnas" id="guardias_nocturnas" placeholder="Guardias Nocturnas:">

				<label for=asic>ASIC</label>
				<input type="text" name="asic" id="asic" placeholder="ASIC:">

				<label for=organismo_adscripcion>Organismo de Adscripcion</label>
				<input type="text" name="organismo_adscripcion" id="organismo_adscripcion" placeholder="Organismo de Adscripcion:">

				<label for=b_cargo>Breve Descripcion del Cargo</label>
				<input type="text" name=b_cargo id="b_cargo" placeholder="Breve Descripcion del Cargo:">

				<label for="f_ingreso">Fecha de Ingreso</label>
				<input type="date" name="f_ingreso" id="f_ingreso" placeholder="Fecha de Ingreso">

				<label for=asap>ASAP Antes del Ingreso D.S.M</label>
				<input type="text" name="asap" id="asap" placeholder="ASAP Antes del Ingreso D.S.M:">

				<label for=j_patrimonio>Declaracion Jurada de Patrimonio</label>
				<select name="j_patrimonio" id="j_patrimonio">
					<option selected></option>
					<option>NO</option>
					<option>SI</option>
				</select>

				<label for=observaciones_t>Observaciones</label>
				<textarea name="observaciones_t" id="observaciones_t" placeholder="Observaciones:"></textarea>

				<input type="submit" name="btn_u_t" id="btn_u_t" class="btn_u_t" value="Registrar Trabajador">

			</form>

		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>