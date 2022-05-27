<?php require_once 'includes/cabeceraMonu.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<div id="principal">
	<h3>LISTADO DE MONUMENTOS</h3>
	<h2> Buscador</h2>

	<br />

	<form action="listMonu.php" method="POST">
		<label for="idMonument"></label>
		<label for="monName"></label>

		<input type="idMonument" name="idMonument" placeholder="id Monumento" maxlength="50" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'idMonument') : ''; ?>
		<input type="monName" name="monName" placeholder="Nombre Monumento" maxlength="100" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'monName') : ''; ?>
		<input type="submit" value="Buscar" />
	</form>


	<table class="styled-table">
		<tr>
			<th>id Monumento </th>
			<th>Nombre </th>
			<th>Dirección</th>
			<th>Descripción</th>
		</tr>

		<?php
		$idMonument = $_POST['idMonument'];
		$monName = $_POST['monName'];

		$sql = "SELECT * FROM monument WHERE idMonument LIKE '%$idMonument%' AND monName LIKE '%$monName%' ORDER BY idMonument ASC;";

		//echo $sql;

		$monuments = mysqli_query($db, $sql);

		$resultado = [];

		if ($monuments && mysqli_num_rows($monuments) >= 1) {
			$resultado = $monuments;
		} else {

			$_SESSION["errores_entrada"] = $errores;
			//var_dump($_SESSION);
		}

		//$users = obtenerMonu($db);
		if (!empty($monuments)) {
			while ($monument = mysqli_fetch_assoc($resultado)) {
		?>
				<tr>
					<td><?= $monument['idMonument'] ?></td>
					<td><?= $monument['monName'] ?></td>
					<td><?= $monument['monLocation'] ?></td>
					<td><?= $monument['monDes'] ?></td>
				</tr>

		<?php
			} //Fin while
		} //Fin if
		?>
	</table>

</div>
</div>
</body>

</html>