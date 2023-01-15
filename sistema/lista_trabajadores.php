<?php

	session_start();

	include "../conexion.php";

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

		<h1>Lista de Trabajadores</h1>
		<a href="registro_trabajadores.php" class="btn_new">Registrar Nuevo Trabajador</a>

		<form action="buscar_trabajador.php" method="get" class="form_trabajador_buscar">

			<section class="form_search_trabajador">
			
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar:">
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
				<input type="date" name="p_fecha" id="p_fecha">
				<div class="d_h" disabled>
					Hasta
				</div>
				<input type="date" name="s_fecha" id="s_fecha">

			</section>

			<section class="form_search_trabajador">

				<select name="d_nacionalidad" id="d_nacionalidad">
					<option value="" selected>Doble Nacionalidad</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="padre_madre" id="padre_madre">
					<option value="" selected>Tiene Hijos</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="sexo" id="sexo">
					<option value="" selected>Sexo</option>
					<option>Masculino</option>
					<option>Femenino</option>
				</select>
				<select name="e_civil" id="e_civil">
					<option value="" selected>Estado Civil</option>
					<option>Soltero/a</option>
					<option>Casado/a</option>
					<option>Divorciado/a</option>
					<option>Viudo/a</option>
					<option>Otro</option>
				</select>
				<select name="p_discapacidad" id="p_discapacidad">
					<option value="" selected>Posee Alguna Discapacidad</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="p_enfermedad" id="p_enfermedad">
					<option value="" selected>Posee Alguna Enfermedad</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="organizacion_social" id="organizacion_social">
					<option value="" selected>Organizacion Social</option>
					<option>No</option>
					<option>Si</option>
				</select>
			
			</section>

			<section class="form_search_trabajador">

				<select name="p_consejo_comunal" id="p_consejo_comunal">
					<option value="" selected>Consejo Comunal</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="maneja" id="maneja">
					<option value="" selected>Maneja</option>
					<option>No</option>
					<option>Si</option>
				</select>
				<select name="grado_licencia" id="grado_licencia">
					<option value="" value="" selected>Grado Licencia</option>
					<option>No posee</option>
					<option>2do Grado</option>
					<option>3ro Grado</option>
					<option>4to Grado</option>
					<option>5to Grado</option>
				</select>
				<select name="m_dominante" id="m_dominante">
					<option value="" selected>Mano Dominante</option>
					<option>Derecha</option>
					<option>Izquierda</option>
					<option>Ambidiestro</option>
				</select>
				<input type="number" name="codigo_nominal" id="codigo_nominal" placeholder="Codigo de Nomina:">
				<div class="fdnacimiento" disabled>
					F.Ingreso
				</div>
				<div class="d_h" disabled>
					Desde
				</div>
				<input type="date" name="fi_p_fecha" id="fi_p_fecha">
				<div class="d_h" disabled>
					Hasta
				</div>
				<input type="date" name="fi_s_fecha" id="fi_s_fecha">
				<select name="j_patrimonio" id="j_patrimonio">
					<option value="" selected>Declaración Jurada de Patrimonio</option>
					<option>No</option>
					<option>Si</option>
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

			$sql_register = mysqli_query($conection, "SELECT COUNT(*) AS total_registros FROM `trabajadores`;");
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

			$query = mysqli_query($conection, "SELECT * FROM `trabajadores` ORDER BY `CEDULA` ASC LIMIT $desde,$por_pagina;");
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
				
					<li><a href="?pagina=<?php echo 1?>">|<</a></li>
					<li><a href="?pagina=<?php echo $pagina-1?>"><<</a></li>

					<?php

						}

						for($i=1; $i <= $total_paginas; $i++){

							if($i == $pagina){

								echo '<li class="pageSelected">'.$i.'</li>';

							}else{

								echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';

							}

						}

						if($pagina != $total_paginas){

					?>

					<li><a href="?pagina=<?php echo $pagina+1?>">>></a></li>
					<li><a href="?pagina=<?php echo $total_paginas?>">>|</a></li>

					<?php

						}

					?>

			</ul>

		</div>

		<?php

			}

		?>
		
	</section>

	<a class="btn_cancel" href="excel_lista_trabajadores.php">Descargar</a>
	<a class="btn_cancel" href="excel_lista_trabajadores_sin_carga.php">DescargarSCF</a>

	<?php include "includes/footer.php"; ?>

</body>
</html>