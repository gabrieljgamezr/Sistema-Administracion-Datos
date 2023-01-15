<?php

	session_start();

	include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Cargas Familiares | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<h1>Lista de Cargas Familiares</h1>
		<a href="registro_carga_familiar.php" class="btn_new">Registrar Nueva Carga Familiar</a>

		<form action="buscar_carga_familiar.php" method="get" class="form_search">

			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar:">
			<input type="submit" class="btn_search" value="Buscar">
				<div class="raya" disabled>
					|
				</div>
			<div class="filtros">
				Filtro:
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

		</form>

		<table class="tabla_cargas_familiares">
			
			<tr>
				
				<th>CEDULA DEL REPRESENTANTE</th>
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
				<th>ACCIONES</th>

			</tr>

		<?php

			//Paginador

			$sql_register = mysqli_query($conection, "SELECT COUNT(*) AS total_registros FROM `carga familiar`;");
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

			$query = mysqli_query($conection, "SELECT t.`CEDULA` AS `CEDULA REPRESENTATE`, c.`ID CARGA FAMILIAR`,c.`ID`,c.`PRIMER APELLIDO`,c.`SEGUNDO APELLIDO`,c.`PRIMER NOMBRE`,c.`SEGUNDO NOMBRE`,c.`CEDULA`,c.`PARENTESCO`,c.`FECHA DE NACIMIENTO`,c.`NIVEL DE ESTUDIO`,c.`POSEE ALGUNA CONDICION ESPECIAL`, c.`OBSERVACIONES` FROM `carga familiar` c INNER JOIN `trabajadores` t WHERE t.`ID` = c.`ID` ORDER BY `ID` ASC LIMIT $desde,$por_pagina;");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);

			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

		?>

			<tr>
				
				<td><?php echo $data['CEDULA REPRESENTATE'] ?></td>
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
				<td>
					<a class="link_edit" href="editar_carga_familiar.php?ID=<?php echo $data['ID CARGA FAMILIAR'] ?>">Editar</a>
					|
					<a class="link_delete" href="eliminar_confirmar_carga_familiar.php?ID=<?php echo $data['ID CARGA FAMILIAR'] ?>">Eliminar</a>
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

	<a class="btn_cancel" href="excel_lista_cargas_familiares.php">Descargar</a>

	<?php include "includes/footer.php"; ?>

</body>
</html>