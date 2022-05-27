<?php

// Muestra los errores que nos devuelven en la sesión.

function mostrarError($errores, $campo)
{
	$alerta = '';
	if (isset($errores[$campo]) && !empty($campo)) {
		$alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
	}

	return $alerta;
}

// Elimina los errores de la sesión

function borrarErrores()
{
	$borrado = false;

	if (isset($_SESSION['errores'])) {
		$_SESSION['errores'] = null;
		$borrado = true;
	}

	if (isset($_SESSION['errores_entrada'])) {
		$_SESSION['errores_entrada'] = null;
		$borrado = true;
	}


	return $borrado;
}

// Obtiene todos los alumnos de la BBDD

function obtenerUsers($conexion)
{

	$sql = "SELECT * FROM users ORDER BY idUser ASC;";
	$users = mysqli_query($conexion, $sql);

	$resultado = [];

	if ($users && mysqli_num_rows($users) >= 1) {
		$resultado = $users;
	}

	return $resultado;
}

// Obtiene todos los monumentos

function obtenerMonu($conexion)
{

	$sql = "SELECT * FROM monument ORDER BY idMonument ASC;";
	$monument = mysqli_query($conexion, $sql);

	$resultado = [];

	if ($monument && mysqli_num_rows($monument) >= 1) {
		$resultado = $monument;
	}

	return $resultado;
}
