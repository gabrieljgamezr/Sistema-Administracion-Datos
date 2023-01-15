<?php

	session_start();

	if($_SESSION['id_rol'] != 1){

		header("Location: ./");

	}

	include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Usuarios | Sistema de Almacenamiento de Datos</title>

</head>
<body>

	<?php include "includes/header.php"; ?>

	<section id="container">

		<?php

			$busqueda = strtolower($_REQUEST['busqueda']);

			if(empty($busqueda)){

				header("Location: lista_usuarios.php");
				mysqli_close($conection);

			}

		?>

		<h1>Lista de Usuarios</h1>
		<a href="registro_usuarios.php" class="btn_new">Crear Usuario</a>

		<form action="buscar_usuario.php" method="get" class="form_search">
			
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar:" value="<?php echo $busqueda; ?>">
			<input type="submit" class="btn_search" name="btn_search" value="Buscar">

		</form>

		<table>
			
			<tr>
				
				<th>ID</th>
				<th>NOMBRE Y APELLIDO</th>
				<th>USUARIO</th>
				<th>ROL</th>
				<th>ACCIONES</th>

			</tr>

		<?php

			//Paginador

			$rol = '';

			if($busqueda == 'administrador'){

				$rol = "OR `ID_ROL` LIKE '%1%' ";

			}else if($busqueda == 'asistente'){

				$rol = "OR `ID_ROL` LIKE '%2%' ";

			}

			$sql_register = mysqli_query($conection, "SELECT COUNT(*) AS total_registros FROM `usuarios` WHERE(`ID_USUARIO` LIKE '%$busqueda%' OR `NOMBRE` LIKE '%$busqueda%' OR `USUARIO` LIKE '%$busqueda%' $rol);");
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

			$query = mysqli_query($conection, "SELECT u.ID_USUARIO, u.NOMBRE, u.USUARIO, r.ROL FROM `usuarios` u INNER JOIN `rol` r ON u.ID_ROL = r.ID_ROL WHERE (u.`ID_USUARIO` LIKE '%$busqueda%' OR u.`NOMBRE` LIKE '%$busqueda%' OR u.`USUARIO` LIKE '%$busqueda%' OR r.`ROL` LIKE '%$busqueda%') ORDER BY r.ROL ASC, U.ID_USUARIO ASC LIMIT $desde,$por_pagina;");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);

			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

		?>

			<tr>
				
				<td><?php echo $data['ID_USUARIO'] ?></td>
				<td><?php echo $data['NOMBRE'] ?></td>
				<td><?php echo $data['USUARIO'] ?></td>
				<td><?php echo $data['ROL'] ?></td>
				<td>
					<a class="link_edit" href="editar_usuario.php?ID_USUARIO=<?php echo $data['ID_USUARIO'] ?>">Editar</a>

				<?php 

					if($data['ID_USUARIO'] != 1){

				?>

					|
					<a class="link_delete" href="eliminar_confirmar_usuario.php?ID_USUARIO=<?php echo $data['ID_USUARIO'] ?>">Eliminar</a>

				<?php

					}

				?>

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
				
					<li><a href="?pagina=<?php echo 1?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
					<li><a href="?pagina=<?php echo $pagina-1?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>

					<?php

						}

						for($i=1; $i <= $total_paginas; $i++){

							if($i == $pagina){

								echo '<li class="pageSelected">'.$i.'</li>';

							}else{

								echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';

							}

						}

						if($pagina != $total_paginas){

					?>

					<li><a href="?pagina=<?php echo $pagina+1?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
					<li><a href="?pagina=<?php echo $total_paginas?>&busqueda=<?php echo $busqueda; ?>">>|</a></li>

					<?php

						}

					?>
				
			</ul>

		</div>

		<?php

			}

		?>
		
	</section>

	<?php include "includes/footer.php"; ?>

</body>
</html>