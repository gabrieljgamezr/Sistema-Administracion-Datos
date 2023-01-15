<nav>

	<ul>

		<li><a href="http://localhost/SAD/sistema/">Inicio</a></li>

		<?php

			if($_SESSION['id_rol'] == 1){

		?>

		<li class="principal">

			<a href="#">Usuarios</a>
			<ul>
				<li><a href="registro_usuarios.php">Nuevo Usuario</a></li>
				<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
			</ul>
		</li>

		<?php

			}

		?>

		<li class="principal">
			<a href="#">Trabajadores</a>
			<ul>
				<li><a href="registro_trabajadores.php">Nuevo Trabajador</a></li>
				<li><a href="lista_trabajadores.php">Lista de Trabajadores</a></li>
			</ul>
		</li>

		<li class="principal">
			<a href="#">Cargas Familiares</a>
			<ul>
				<li><a href="registro_carga_familiar.php">Nueva Carga Familiar</a></li>
				<li><a href="lista_cargas_familiares.php">Lista de Cargas Familiares</a></li>
			</ul>
		</li>

	</ul>

</nav>