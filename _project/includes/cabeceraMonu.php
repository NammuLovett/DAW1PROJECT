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
				Monumentos
			</a>
		</div>


		<nav id="menu">
			<ul>
				<li>
					<a href="listMonu.php">Listado de Monumentos</a>
				</li>

				<li>
					<a href="addMonu.php">Añadir Monumentos</a>
				</li>
				<li>
					<a href="editMonu.php">Editar Monumentos</a>
				</li>
				<li>
					<a href="showMonu.php">Mostrar Monumentos </a>
				</li>
			</ul>
		</nav>


	</header>

	<div id="contenedor">