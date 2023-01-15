<?php

	session_start();

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

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Ficha del Trabajador | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<h1>Ficha del Trabajador</h1>
		<hr>

		<div class="ficha_trabajador">

			<table class="tabla_ficha">

			<?php

				include "../conexion.php";

				$query = mysqli_query($conection, "SELECT * FROM `trabajadores` WHERE `ID`='$ID_TRABAJADOR';");
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
				
					<th>ACCIONES</th>
					<th>CEDULA</th>
					<th>NRO DE RIF</th>
					<th>PRIMER APELLIDO</th>
					<th>SEGUNDO APELLIDO</th>
					<th>PRIMER NOMBRE</th>

				</tr>

				<tr>

					<td>
						<a class="link_edit" href="editar_trabajador.php?ID=<?php echo $data['ID'] ?>">Editar</a>
						|
						<a class="link_delete" href="eliminar_confirmar_trabajador.php?ID=<?php echo $data['ID'] ?>">Eliminar</a>
					</td>
					<td><?php echo $data['CEDULA'] ?></td>
					<td><?php echo $data['Nro DE RIF'] ?></td>
					<td><?php echo $data['PRIMER APELLIDO'] ?></td>
					<td><?php echo $data['SEGUNDO APELLIDO'] ?></td>
					<td><?php echo $data['PRIMER NOMBRE'] ?></td>

				</tr>

				<tr>
				
					<th>SEGUNDO NOMBRE</th>
					<th>FECHA DE NACIMIENTO</th>
					<th>LUGAR DE NACIMIENTO</th>
					<th>NACIONALIDAD</th>
					<th>DOBLE NACIONALIDAD</th>
					<th>FECHA DE NACIONALIDAD</th>

				</tr>

				<tr>
				
					<td><?php echo $data['SEGUNDO NOMBRE'] ?></td>
					<td><?php echo $data['FECHA DE NACIMIENTO'] ?></td>
					<td><?php echo $data['CIUDAD'] ?></td>
					<td><?php echo $data['NACIONALIDAD'] ?></td>
					<td><?php echo $data['DOBLE NACIONALIDAD'] ?></td>
					<td><?php echo $data['FECHA DE NACIONALIDAD'] ?></td>

				</tr>

				<tr>

					<th>CODIGO CARNET PATRIA</th>
					<th>SERIAL CARNET PATRIA</th>
					<th>GACETA NRO</th>
					<th>TIENE HIJOS</th>
					<th>SEXO</th>
					<th>ESTADO CIVIL</th>

				</tr>

				<tr>
				
					<td><?php echo $data['CODIGO CARNET PATRIA'] ?></td>
					<td><?php echo $data['SERIAL CARNET PATRIA'] ?></td>
					<td><?php echo $data['GACETA Nro'] ?></td>
					<td><?php echo $data['PADRE/MADRE'] ?></td>
					<td><?php echo $data['SEXO'] ?></td>
					<td><?php echo $data['ESTADO CIVIL'] ?></td>

				</tr>

				<tr>
					
					<th>POSEE ALGUNA DISCAPACIDAD</th>
					<th>ESPECIFIQUE DISCAPACIDAD</th>
					<th>POSEE ALGUNA ENFERMEDAD</th>
					<th>ESPECIFIQUE ENFERMEDAD</th>
					<th>TOMA ALGUN MEDICAMENTO</th>
					<th>ENTIDAD BANCARIA</th>

				</tr>

				<tr>
					
					<td><?php echo $data['POSEE ALGUNA DISCAPACIDAD'] ?></td>
					<td><?php echo $data['ESPECIFIQUE'] ?></td>
					<td><?php echo $data['POSEE ALGUNA ENFERMEDAD'] ?></td>
					<td><?php echo $data['ESPECIFIQUE ENFERMEDAD'] ?></td>
					<td><?php echo $data['TOMA ALGUN MEDICAMENTO'] ?></td>
					<td><?php echo $data['ENTIDAD BANCARIA'] ?></td>

				</tr>

				<tr>
					
					<th>CUENTA NOMINA</th>
					<th>FORMA DE PAGO</th>
					<th>DIRECCION DE HABITACION</th>
					<th>MUNICIPIO</th>
					<th>ESTADO</th>
					<th>CENTRO DE VOTACION</th>
					
				</tr>

				<tr>

					<td><?php echo $data['CUENTA NOMINA'] ?></td>
					<td><?php echo $data['FORMA DE PAGO'] ?></td>
					<td><?php echo $data['DIRECCION DE HABITACION'] ?></td>
					<td><?php echo $data['MUNICIPIO'] ?></td>
					<td><?php echo $data['ESTADO'] ?></td>
					<td><?php echo $data['CENTRO DE VOTACION'] ?></td>

				</tr>

				<tr>
				
					<th>PERTENECE A UNA ORGANIZACION SOCIAL</th>
					<th>CUAL ORGANIZACION SOCIAL</th>	
					<th>PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD</th>	
					<th>TELEFONO FIJO DE HABITACION</th>
					<th>TELEFONO MOVIL</th>
					<th>TELEFONO DE OFICINA</th>

				</tr>

				<tr>
				
					<td><?php echo $data['PERTENECE A UNA ORGANIZACION SOCIAL'] ?></td>
					<td><?php echo $data['CUAL ORGANIZACION SOCIAL'] ?></td>
					<td><?php echo $data['PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD'] ?></td>
					<td><?php echo $data['TELEFONO FIJO DE HABITACION'] ?></td>
					<td><?php echo $data['TELEFONO MOVIL'] ?></td>
					<td><?php echo $data['TELEFONO DE OFICINA'] ?></td>

				</tr>

				<tr>
				
					<th>CORREO ELECTRONICO</th>
					<th>TIPO DE VIVIENDA</th>
					<th>TENDENCIA DE VIVIENDA</th>
					<th>MANEJA</th>
					<th>GRADO DE LICENCIA</th>
					<th>GRUPO SANGUINEO</th>

				</tr>

				<tr>
				
					<td><?php echo $data['CORREO ELECTRONICO'] ?></td>
					<td><?php echo $data['TIPO DE VIVIENDA'] ?></td>
					<td><?php echo $data['TENDENCIA DE VIVIENDA'] ?></td>
					<td><?php echo $data['MANEJA'] ?></td>
					<td><?php echo $data['GRADO DE LICENCIA'] ?></td>
					<td><?php echo $data['GRUPO SANGUINEO'] ?></td>

				</tr>

				<tr>
					
					<th>ESTATURA (M)</th>
					<th>PESO (Kg)</th>
					<th>PANTALON</th>
					<th>CAMISA</th>
					<th>ZAPATO</th>
					<th>MANO DOMINANTE</th>

				</tr>

				<tr>
					
					<td><?php echo $data['ESTATURA'] ?></td>
					<td><?php echo $data['PESO'] ?></td>
					<td><?php echo $data['PANTALON'] ?></td>
					<td><?php echo $data['CAMISA'] ?></td>
					<td><?php echo $data['ZAPATO'] ?></td>
					<td><?php echo $data['MANO DOMINANTE'] ?></td>
				
				</tr>

				<tr>
					
					<th>NIVEL EDUCATIVO ESTUDIOS</th>
					<th>ESPECIALIDAD O DOCTORADO</th>
					<th>PROFESION</th>
					<th>DEPENDENCIA ADSCRITA NOMINALMENTE</th>
					<th>DEPENDENCIA DONDE TRABAJA FISICAMENTE</th>
					<th>UBICACION ADMINISTRATIVA</th>

				</tr>

				<tr>
					
					<td><?php echo $data['NIVEL EDUCATIVO ESTUDIOS'] ?></td>
					<td><?php echo $data['ESPECIALIDAD O DOCTORADO'] ?></td>
					<td><?php echo $data['PROFESION'] ?></td>
					<td><?php echo $data['DEPENDENCIA ADSCRITA NOMINALMENTE'] ?></td>
					<td><?php echo $data['DEPENDENCIA DONDE TRABAJA FISICAMENTE'] ?></td>
					<td><?php echo $data['UBICACION ADMINISTRATIVA'] ?></td>

				</tr>

				<tr>
				
					<th>UBICACION FISICA</th>
					<th>DIRECCION EXACTA DEL LUGAR DE TRABAJO</th>
					<th>CORREO ELECTRONICO DEL LUGAR DE TRABAJO</th>
					<th>TELEFONO DE LA OFICINA</th>
					<th>CODIGO DE NOMINA</th>
					<th>CARGO</th>

				</tr>

				<tr>
					
					<td><?php echo $data['UBICACION FISICA'] ?></td>
					<td><?php echo $data['DIRECCION EXACTA DEL LUGAR DE TRABAJO'] ?></td>
					<td><?php echo $data['CORREO ELECTRONICO DEL LUGAR DE TRABAJO'] ?></td>
					<td><?php echo $data['TELEFONO DE LA OFICINA'] ?></td>
					<td><?php echo $data['CODIGO NOMINAL'] ?></td>
					<td><?php echo $data['CARGO'] ?></td>

				</tr>

				<tr>
				
					<th>TIPO DE PERSONAL</th>
					<th>TIPO DE TRABAJADOR</th>
					<th>OCUPACION</th>
					<th>CARGA HORARIA</th>
					<th>JORNADA DIARIA</th>
					<th>GUARDIAS NOCTURNAS</th>

				</tr>

				<tr>
					
					<td><?php echo $data['TIPO DE PERSONAL'] ?></td>
					<td><?php echo $data['TIPO DE TRABAJADOR'] ?></td>
					<td><?php echo $data['OCUPACION'] ?></td>
					<td><?php echo $data['CARGA HORARIA'] ?></td>
					<td><?php echo $data['JORNADA DIARIA'] ?></td>
					<td><?php echo $data['GUARDIAS NOCTURNAS'] ?></td>
				
				</tr>

				<tr>
					
					<th>ASIC</th>
					<th>ORGANISMO DE ADSCRIPCION</th>
					<th>BREVE DESCRIPCION DEL CARGO</th>
					<th>FECHA DE INGRESO</th>
					<th>ASAP ANTES DEL INGRESO D.S.M</th>
					<th>DECLARACION JURADA DE PATRIMONIO</th>

				</tr>

				<tr>
					
					<td><?php echo $data['ASIC'] ?></td>
					<td><?php echo $data['ORGANISMO DE ADSCRIPCION'] ?></td>
					<td><?php echo $data['BREVE DESCRIPCION DEL CARGO'] ?></td>
					<td><?php echo $data['FECHA DE INGRESO'] ?></td>
					<td><?php echo $data['ASAP ANTES DEL INGRESO D.S.M'] ?></td>
					<td><?php echo $data['DECLARACION JURADA DE PATRIMONIO'] ?></td>

				</tr>

			</table>

		</div>

		

		<div class="ficha_trabajador">

			<table class="tabla_ficha">

				<tr>
				
					<th>OBSERVACIONES</th>

				</tr>

				<tr>
					
					<td><?php echo $data['OBSERVACIONES'] ?></td>

				</tr>

			<?php

					}

				}

			?>
			
			</table>

		</div>

		<br>
		<h1>Cargas Familiares</h1>
		<hr>

		<div class="ficha_trabajador">

			<table class="tabla_ficha">

			<?php

				include "../conexion.php";

				$query = mysqli_query($conection, "SELECT c.`ID CARGA FAMILIAR`,c.`ID`,c.`PRIMER APELLIDO`,c.`SEGUNDO APELLIDO`,c.`PRIMER NOMBRE`,c.`SEGUNDO NOMBRE`,c.`CEDULA`,c.`PARENTESCO`,c.`FECHA DE NACIMIENTO`,c.`NIVEL DE ESTUDIO`,c.`POSEE ALGUNA CONDICION ESPECIAL`, `OBSERVACIONES` FROM `carga familiar` c WHERE c.`ID` = '$ID_TRABAJADOR' ORDER BY c.`ID` ASC;");
				mysqli_close($conection);
				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {

			?>

				<tr>
				
					<th>ACCIONES</th>
					<th>PRIMER APELLIDO</th>
					<th>SEGUNDO APELLIDO</th>
					<th>PRIMER NOMBRE</th>
					<th>SEGUNDO NOMBRE</th>
					<th>CEDULA</th>
					<th>PARENTESCO</th>
					<th>FECHA DE NACIMIENTO</th>
					<th>NIVEL DE ESTUDIO</th>
					<th>CONDICION ESPECIAL</th>
					<th>OBSERVACIONES</th>

				</tr>

				<tr>
				
					<td>
						<a class="link_edit" href="editar_carga_familiar.php?ID=<?php echo $data['ID CARGA FAMILIAR'] ?>">Editar</a>
						|
						<a class="link_delete" href="eliminar_confirmar_carga_familiar.php?ID=<?php echo $data['ID CARGA FAMILIAR'] ?>">Eliminar</a>
					</td>
					<td><?php echo $data['PRIMER APELLIDO'] ?></td>
					<td><?php echo $data['SEGUNDO APELLIDO'] ?></td>
					<td><?php echo $data['PRIMER NOMBRE'] ?></td>
					<td><?php echo $data['SEGUNDO NOMBRE'] ?></td>
					<td><?php echo $data['CEDULA'] ?></td>
					<td><?php echo $data['PARENTESCO'] ?></td>
					<td><?php echo $data['FECHA DE NACIMIENTO'] ?></td>
					<td><?php echo $data['NIVEL DE ESTUDIO'] ?></td>
					<td><?php echo $data['POSEE ALGUNA CONDICION ESPECIAL'] ?></td>
					<td><?php echo $data['OBSERVACIONES'] ?></td>
				
				</tr>

			<?php

					}

				}

			?>

			</table>

		</div>
		
	</section>

	<a class="btn_cancel" href="excel_ficha.php?ID_TRABAJADOR=<?php echo $ID_TRABAJADOR ?>">Descargar</a>

	<?php include "includes/footer.php"; ?>

</body>
</html>