<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<?php $varImg = "img/"; ?>

<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Explora Monumentos</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>

<body>
	<header id="cabecera">
		<!-- LOGO -->
		<div id="logo">
			<a href="index.php">
				Usuarios
			</a>
		</div>


		<nav id="menu">
			<ul>
				<li>
					<a href="listUsers.php">Listado de Usuarios</a>
				</li>
				<li>
					<a href="addUsers.php">Añadir Usuarios</a>
				</li>
				<li>
					<a href="editUsers.php">Editar Usuarios</a>
				</li>
				<li>
					<a href="deleteUsers.php">Eliminar Usuarios</a>
				</li>
				<li>
					<a href="showUsers.php">Mostrar Usuario</a>
				</li>
			</ul>
		</nav>


	</header>

	<div id="contenedor">