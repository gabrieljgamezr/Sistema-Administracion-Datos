<?php

	session_start();

	include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Trabajadores | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<?php

			$busqueda = strtolower($_REQUEST['busqueda']);
			$p_fecha = $_REQUEST['p_fecha'];
			$s_fecha = $_REQUEST['s_fecha'];
			$padre_madre = $_REQUEST['padre_madre'];
			$d_nacionalidad = $_REQUEST['d_nacionalidad'];
			$sexo = $_REQUEST['sexo'];
			$e_civil = $_REQUEST['e_civil'];
			$p_discapacidad = $_REQUEST['p_discapacidad'];
			$p_enfermedad = $_REQUEST['p_enfermedad'];
			$organizacion_social = $_REQUEST['organizacion_social'];
			$p_consejo_comunal = $_REQUEST['p_consejo_comunal'];
			$maneja = $_REQUEST['maneja'];
			$grado_licencia = $_REQUEST['grado_licencia'];
			$m_dominante = $_REQUEST['m_dominante'];
			$codigo_nominal = $_REQUEST['codigo_nominal'];
			$fi_p_fecha = $_REQUEST['fi_p_fecha'];
			$fi_s_fecha = $_REQUEST['fi_s_fecha'];
			$j_patrimonio = $_REQUEST['j_patrimonio'];

			if(empty($busqueda) && empty($p_fecha) && empty($s_fecha) && empty($padre_madre) && empty($d_nacionalidad) && empty($sexo) && empty($e_civil) && empty($p_discapacidad) && empty($p_enfermedad) && empty($organizacion_social) && empty($p_consejo_comunal) && empty($maneja) && empty($grado_licencia) && empty($m_dominante) && empty($codigo_nominal) && empty($fi_p_fecha) && empty($fi_s_fecha) && empty($j_patrimonio)){

				header("Location: lista_trabajadores.php");

			}

			if(empty($p_fecha)){
				$p_fecha = '0000-00-00';
			}

			if(empty($s_fecha)){
				$s_fecha = '9999-12-31';
			}

			if(empty($fi_p_fecha)){
				$fi_p_fecha = '0000-00-00';
			}

			if(empty($fi_s_fecha)){
				$fi_s_fecha = '9999-12-31';
			}

		?>

		<h1>Lista de Trabajadores</h1>
		<a href="registro_trabajadores.php" class="btn_new">Registrar Nuevo Trabajador</a>

		<form action="buscar_trabajador.php" method="get" class="form_trabajador_buscar">
			
			<section class="form_search_trabajador">

				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar:" value="<?php echo $busqueda; ?>">
				<input type="submit" class="btn_search" value="Buscar">
				<div class="raya" disabled>
					|
				</div>
				<div class="filtros">
					Filtros:
				</div>
				<div class="fdnacimiento" disabled>
					F.Nacimiento
				</div>
				<div class="d_h" disabled>
					Desde
				</div>
				<input type="date" name="p_fecha" id="p_fecha" value="<?php echo $p_fecha; ?>">
				<div class="d_h" disabled>
					Hasta
				</div>
				<input type="date" name="s_fecha" id="s_fecha" value="<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; }?>">

			</section>

			<section class="form_search_trabajador">

				<select name="d_nacionalidad" id="d_nacionalidad">
					<option value="" <?php if(strcmp ($d_nacionalidad,'') == 0) { echo "selected"; } ?> >Doble Nacionalidad</option>
					<option <?php if(strcmp ($d_nacionalidad,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($d_nacionalidad,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="padre_madre" id="padre_madre">
					<option value="" <?php if(strcmp ($padre_madre,'') == 0) { echo "selected"; } ?> >Tiene Hijos</option>
					<option <?php if(strcmp ($padre_madre,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($padre_madre,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="sexo" id="sexo">
					<option value="" <?php if(strcmp ($sexo,'') == 0) { echo "selected"; } ?> >Sexo</option>
					<option <?php if(strcmp ($sexo,'Masculino') == 0) { echo "selected"; } ?> >Masculino</option>
					<option <?php if(strcmp ($sexo,'Femenino') == 0) { echo "selected"; } ?> >Femenino</option>
				</select>
				<select name="e_civil" id="e_civil">
					<option value="" <?php if(strcmp ($e_civil,'') == 0) { echo "selected"; } ?> >Estado Civil</option>
					<option <?php if(strcmp ($e_civil,'Soltero/a') == 0) { echo "selected"; } ?> >Soltero/a</option>
					<option <?php if(strcmp ($e_civil,'Casado/a') == 0) { echo "selected"; } ?> >Casado/a</option>
					<option <?php if(strcmp ($e_civil,'Divorciado/a') == 0) { echo "selected"; } ?> >Divorciado/a</option>
					<option <?php if(strcmp ($e_civil,'Viudo/a') == 0) { echo "selected"; } ?> >Viudo/a</option>
					<option <?php if(strcmp ($e_civil,'Otro') == 0) { echo "selected"; } ?> >Otro</option>
				</select>
				<select name="p_discapacidad" id="p_discapacidad">
					<option value="" <?php if(strcmp ($p_discapacidad,'') == 0) { echo "selected"; } ?> >Posee Alguna Discapacidad</option>
					<option <?php if(strcmp ($p_discapacidad,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($p_discapacidad,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="p_enfermedad" id="p_enfermedad">
					<option value="" <?php if(strcmp ($p_enfermedad,'') == 0) { echo "selected"; } ?> >Posee Alguna Enfermedad</option>
					<option <?php if(strcmp ($p_enfermedad,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($p_enfermedad,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="organizacion_social" id="organizacion_social">
					<option value="" <?php if(strcmp ($organizacion_social,'') == 0) { echo "selected"; } ?> >Organizacion Social</option>
					<option <?php if(strcmp ($organizacion_social,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($organizacion_social,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>

			</section>

			<section class="form_search_trabajador">

				<select name="p_consejo_comunal" id="p_consejo_comunal">
					<option value="" <?php if(strcmp ($p_consejo_comunal,'') == 0) { echo "selected"; } ?> >Consejo Comunal</option>
					<option <?php if(strcmp ($p_consejo_comunal,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($p_consejo_comunal,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="maneja" id="maneja">
					<option value="" <?php if(strcmp ($maneja,'') == 0) { echo "selected"; } ?> >Maneja</option>
					<option <?php if(strcmp ($maneja,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($maneja,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>
				<select name="grado_licencia" id="grado_licencia">
					<option value="" <?php if(strcmp ($grado_licencia,'') == 0) { echo "selected"; } ?>>Grado Licencia</option>
					<option <?php if(strcmp ($grado_licencia,'No posee') == 0) { echo "selected"; } ?> >No posee</option>
					<option <?php if(strcmp ($grado_licencia,'2do Grado') == 0) { echo "selected"; } ?> >2do Grado</option>
					<option <?php if(strcmp ($grado_licencia,'3ro Grado') == 0) { echo "selected"; } ?> >3ro Grado</option>
					<option <?php if(strcmp ($grado_licencia,'4to Grado') == 0) { echo "selected"; } ?> >4to Grado</option>
					<option <?php if(strcmp ($grado_licencia,'5to Grado') == 0) { echo "selected"; } ?> >5to Grado</option>
				</select>
					<select name="m_dominante" id="m_dominante">
					<option value="" <?php if(strcmp ($m_dominante,'') == 0) { echo "selected"; } ?> >Mano Dominante</option>
					<option <?php if(strcmp ($m_dominante,'Derecha') == 0) { echo "selected"; } ?> >Derecha</option>
					<option <?php if(strcmp ($m_dominante,'Izquierda') == 0) { echo "selected"; } ?> >Izquierda</option>
					<option <?php if(strcmp ($m_dominante,'Ambidiestro') == 0) { echo "selected"; } ?> >Ambidiestro</option>
				</select>
				<input type="number" name="codigo_nominal" id="codigo_nominal" placeholder="Codigo de Nomina:" value="<?php echo $codigo_nominal; ?>">
				<div class="fdnacimiento" disabled>
					F.Ingreso
				</div>
				<div class="d_h" disabled>
					Desde
				</div>
				<input type="date" name="fi_p_fecha" id="fi_p_fecha" value="<?php echo $fi_p_fecha; ?>">
				<div class="d_h" disabled>
					Hasta
				</div>
				<input type="date" name="fi_s_fecha" id="fi_s_fecha" value="<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; }?>">
				<select name="j_patrimonio" id="j_patrimonio">
					<option value="" <?php if(strcmp ($j_patrimonio,'') == 0) { echo "selected"; } ?>>Declaración Jurada de Patrimonio</option>
					<option <?php if(strcmp ($j_patrimonio,'No') == 0) { echo "selected"; } ?> >No</option>
					<option <?php if(strcmp ($j_patrimonio,'Si') == 0) { echo "selected"; } ?> >Si</option>
				</select>

			</section>

		</form>

		<table>
			
			<tr>
				
				<th>CEDULA</th>
				<th>NRO DE RIF</th>
				<th>PRIMER APELLIDO</th>
				<th>SEGUNDO APELLIDO</th>
				<th>PRIMER NOMBRE</th>
				<th>SEGUNDO NOMBRE</th>
				<th>FECHA DE NACIMIENTO</th>
				<th>ACCIONES</th>

			</tr>

		<?php

			//paginador

			$sql_register = mysqli_query($conection, "SELECT count(*) as total_registros FROM `trabajadores` WHERE (`CEDULA` LIKE '%$busqueda%' OR `Nro DE RIF` LIKE '%$busqueda%' OR `PRIMER APELLIDO` LIKE '%$busqueda%' OR `SEGUNDO APELLIDO` LIKE '%$busqueda%' OR `PRIMER NOMBRE` LIKE '%$busqueda%' OR `SEGUNDO NOMBRE` LIKE '%$busqueda%' OR `CIUDAD` LIKE '%$busqueda%' OR `NACIONALIDAD` LIKE '%$busqueda%' OR `GACETA Nro` LIKE '%$busqueda%' OR `ESPECIFIQUE` LIKE '%$busqueda%' OR `DIRECCION DE HABITACION` LIKE '%$busqueda%' OR `MUNICIPIO` LIKE '%$busqueda%' OR `ESTADO` LIKE '%$busqueda%' OR `CENTRO DE VOTACION` LIKE '%$busqueda%' OR `CUAL ORGANIZACION SOCIAL` LIKE '%$busqueda%' OR `TIPO DE VIVIENDA` LIKE '%$busqueda%' OR `TENDENCIA DE VIVIENDA` LIKE '%$busqueda%' OR `GRUPO SANGUINEO` LIKE '%$busqueda%' OR `NIVEL EDUCATIVO ESTUDIOS` LIKE '%$busqueda%' OR `ESPECIALIDAD O DOCTORADO` LIKE '%$busqueda%' OR `PROFESION` LIKE '%$busqueda%' OR `DEPENDENCIA ADSCRITA NOMINALMENTE` LIKE '%$busqueda%' OR `DEPENDENCIA DONDE TRABAJA FISICAMENTE` LIKE '%$busqueda%' OR `DIRECCION EXACTA DEL LUGAR DE TRABAJO` LIKE '%$busqueda%' OR `UBICACION ADMINISTRATIVA` LIKE '%$busqueda%' OR `UBICACION FISICA` LIKE '%$busqueda%' OR `CARGO` LIKE '%$busqueda%' OR `TIPO DE PERSONAL` LIKE '%$busqueda%' OR `TIPO DE TRABAJADOR` LIKE '%$busqueda%' OR `OCUPACION` LIKE '%$busqueda%' OR `ASIC` LIKE '%$busqueda%' OR `ORGANISMO DE ADSCRIPCION` LIKE '%$busqueda%' OR `BREVE DESCRIPCION DEL CARGO` LIKE '%$busqueda%') AND (`FECHA DE NACIMIENTO` BETWEEN '$p_fecha' AND '$s_fecha') AND `DOBLE NACIONALIDAD` LIKE '%$d_nacionalidad%' AND `PADRE/MADRE` LIKE '%$padre_madre%' AND `SEXO` LIKE '%$sexo%' AND `ESTADO CIVIL` LIKE '%$e_civil%' AND `POSEE ALGUNA DISCAPACIDAD` LIKE '%$p_discapacidad%' AND `POSEE ALGUNA ENFERMEDAD` LIKE '%$p_enfermedad%' AND `PERTENECE A UNA ORGANIZACION SOCIAL` LIKE '%$organizacion_social%' AND `PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD` LIKE '%$p_consejo_comunal%' AND `MANEJA` LIKE '%$maneja%' AND `GRADO DE LICENCIA` LIKE '%$grado_licencia%' AND `MANO DOMINANTE` LIKE '%$m_dominante%' AND `CODIGO NOMINAL` LIKE '%$codigo_nominal%' AND (`FECHA DE INGRESO` BETWEEN '$fi_p_fecha' AND '$fi_s_fecha') AND `DECLARACION JURADA DE PATRIMONIO` LIKE '%$j_patrimonio%'");
			$result_register = mysqli_fetch_array($sql_register);
			$total_registros = $result_register['total_registros'];

			$por_pagina = 10;

			if(empty($_GET['pagina'])){

				$pagina = 1;

			}else{

				$pagina = $_GET['pagina'];

			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registros / $por_pagina);

			$query = mysqli_query($conection, "SELECT * FROM `trabajadores` WHERE (`CEDULA` LIKE '%$busqueda%' OR `Nro DE RIF` LIKE '%$busqueda%' OR `PRIMER APELLIDO` LIKE '%$busqueda%' OR `SEGUNDO APELLIDO` LIKE '%$busqueda%' OR `PRIMER NOMBRE` LIKE '%$busqueda%' OR `SEGUNDO NOMBRE` LIKE '%$busqueda%' OR `CIUDAD` LIKE '%$busqueda%' OR `NACIONALIDAD` LIKE '%$busqueda%' OR `GACETA Nro` LIKE '%$busqueda%' OR `ESPECIFIQUE` LIKE '%$busqueda%' OR `DIRECCION DE HABITACION` LIKE '%$busqueda%' OR `MUNICIPIO` LIKE '%$busqueda%' OR `ESTADO` LIKE '%$busqueda%' OR `CENTRO DE VOTACION` LIKE '%$busqueda%' OR `CUAL ORGANIZACION SOCIAL` LIKE '%$busqueda%' OR `TIPO DE VIVIENDA` LIKE '%$busqueda%' OR `TENDENCIA DE VIVIENDA` LIKE '%$busqueda%' OR `GRUPO SANGUINEO` LIKE '%$busqueda%' OR `NIVEL EDUCATIVO ESTUDIOS` LIKE '%$busqueda%' OR `ESPECIALIDAD O DOCTORADO` LIKE '%$busqueda%' OR `PROFESION` LIKE '%$busqueda%' OR `DEPENDENCIA ADSCRITA NOMINALMENTE` LIKE '%$busqueda%' OR `DEPENDENCIA DONDE TRABAJA FISICAMENTE` LIKE '%$busqueda%' OR `DIRECCION EXACTA DEL LUGAR DE TRABAJO` LIKE '%$busqueda%' OR `UBICACION ADMINISTRATIVA` LIKE '%$busqueda%' OR `UBICACION FISICA` LIKE '%$busqueda%' OR `CARGO` LIKE '%$busqueda%' OR `TIPO DE PERSONAL` LIKE '%$busqueda%' OR `TIPO DE TRABAJADOR` LIKE '%$busqueda%' OR `OCUPACION` LIKE '%$busqueda%' OR `ASIC` LIKE '%$busqueda%' OR `ORGANISMO DE ADSCRIPCION` LIKE '%$busqueda%' OR `BREVE DESCRIPCION DEL CARGO` LIKE '%$busqueda%') AND (`FECHA DE NACIMIENTO` BETWEEN '$p_fecha' AND '$s_fecha') AND `DOBLE NACIONALIDAD` LIKE '%$d_nacionalidad%' AND `PADRE/MADRE` LIKE '%$padre_madre%' AND `SEXO` LIKE '%$sexo%' AND `ESTADO CIVIL` LIKE '%$e_civil%' AND `POSEE ALGUNA DISCAPACIDAD` LIKE '%$p_discapacidad%' AND `POSEE ALGUNA ENFERMEDAD` LIKE '%$p_enfermedad%' AND `PERTENECE A UNA ORGANIZACION SOCIAL` LIKE '%$organizacion_social%' AND `PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD` LIKE '%$p_consejo_comunal%' AND `MANEJA` LIKE '%$maneja%' AND `GRADO DE LICENCIA` LIKE '%$grado_licencia%' AND `MANO DOMINANTE` LIKE '%$m_dominante%' AND `CODIGO NOMINAL` LIKE '%$codigo_nominal%' AND (`FECHA DE INGRESO` BETWEEN '$fi_p_fecha' AND '$fi_s_fecha') AND `DECLARACION JURADA DE PATRIMONIO` LIKE '%$j_patrimonio%' ORDER BY `CEDULA` ASC LIMIT $desde,$por_pagina;");
			mysqli_close($conection);
			if($query){
				$result = mysqli_num_rows($query);
			}else{
				$result = 0;
			}

			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

		?>

			<tr>
				
				<td><?php echo $data['CEDULA'] ?></td>
				<td><?php echo $data['Nro DE RIF'] ?></td>
				<td><?php echo $data['PRIMER APELLIDO'] ?></td>
				<td><?php echo $data['SEGUNDO APELLIDO'] ?></td>
				<td><?php echo $data['PRIMER NOMBRE'] ?></td>
				<td><?php echo $data['SEGUNDO NOMBRE'] ?></td>
				<td><?php echo $data['FECHA DE NACIMIENTO'] ?></td>
				<td>
					<a class="link_info" href="ficha.php?ID=<?php echo $data['ID'] ?>">Ver Todo</a>
					|
					<a class="link_edit" href="editar_trabajador.php?ID=<?php echo $data['ID'] ?>">Editar</a>
					|
					<a class="link_delete" href="eliminar_confirmar_trabajador.php?ID=<?php echo $data['ID'] ?>">Eliminar</a>
				</td>


			</tr>

		<?php

				}

			}

		?>

		</table>

		<?php

			if($total_registros != 0){

		?>

		<div class="paginador">
			
			<ul>
				
					<?php

						if($pagina != 1){

					?>
				
					<li><a href="?pagina=<?php echo 1?>&busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>">|<</a></li>
					<li><a href="?pagina=<?php echo $pagina-1?>&busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>"><<</a></li>

					<?php

						}

						for($i=1; $i <= $total_paginas; $i++){

							if($i == $pagina){

								echo '<li class="pageSelected">'.$i.'</li>';

							}else{

								if($s_fecha == '9999-12-31'){ $s_fecha = ''; }
								if($p_fecha == '0000-00-00'){ $p_fecha = ''; }
								if($fi_s_fecha == '9999-12-31'){ $fi_s_fecha = ''; }
								if($fi_p_fecha == '0000-00-00'){ $fi_p_fecha = ''; }

								echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'&p_fecha='.$p_fecha.'&s_fecha='.$s_fecha.'&padre_madre='.$padre_madre.'&d_nacionalidad='.$d_nacionalidad.'&sexo='.$sexo.'&e_civil='.$e_civil.'&p_discapacidad='.$p_discapacidad.'&p_enfermedad='.$p_enfermedad.'&organizacion_social='.$organizacion_social.'&p_consejo_comunal='.$p_consejo_comunal.'&maneja='.$maneja.'&grado_licencia='.$grado_licencia.'&m_dominante='.$m_dominante.'&codigo_nominal='.$codigo_nominal.'&fi_p_fecha='.$fi_p_fecha.'&fi_s_fecha='.$fi_s_fecha.'&j_patrimonio='.$j_patrimonio.'">'.$i.'</a></li>';

							}

						}

						if($pagina != $total_paginas){

					?>

					<li><a href="?pagina=<?php echo $pagina+1?>&busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>">>></a></li>
					<li><a href="?pagina=<?php echo $total_paginas?>&busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>">>|</a></li>

					<?php

						}

					?>

			</ul>

		</div>

		<?php

			}

		?>
		
	</section>

	<a class="btn_cancel" href="excel_buscar_trabajador.php?busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>">Descargar</a>
	<a class="btn_cancel" href="excel_buscar_trabajador_sin_carga.php?busqueda=<?php echo $busqueda; ?>&p_fecha=<?php if($p_fecha != '0000-00-00'){ echo $p_fecha; } ?>&s_fecha=<?php if($s_fecha != '9999-12-31'){ echo $s_fecha; } ?>&padre_madre=<?php echo $padre_madre; ?>&d_nacionalidad=<?php echo $d_nacionalidad; ?>&sexo=<?php echo $sexo; ?>&e_civil=<?php echo $e_civil; ?>&p_discapacidad=<?php echo $p_discapacidad; ?>&p_enfermedad=<?php echo $p_enfermedad; ?>&organizacion_social=<?php echo $organizacion_social; ?>&p_consejo_comunal=<?php echo $p_consejo_comunal; ?>&maneja=<?php echo $maneja; ?>&grado_licencia=<?php echo $grado_licencia; ?>&m_dominante=<?php echo $m_dominante; ?>&codigo_nominal=<?php echo $codigo_nominal; ?>&fi_p_fecha=<?php if($fi_p_fecha != '0000-00-00'){ echo $fi_p_fecha; } ?>&fi_s_fecha=<?php if($fi_s_fecha != '9999-12-31'){ echo $fi_s_fecha; } ?>&j_patrimonio=<?php echo $j_patrimonio; ?>">DescargarSCF</a>

	<?php include "includes/footer.php"; ?>

</body>
</html>