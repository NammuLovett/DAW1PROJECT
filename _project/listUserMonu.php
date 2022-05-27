<?php require_once 'includes/cabeceraUsMo.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<div id="principal">
	<h3>LISTADO DE USUARIOS QUE HAN VISITADO MONUMENTOS</h3>
	<h2> Buscador</h2>

	<br />

	<form action="listUserMonu.php" method="POST">
		<label for="idMonument"></label>
		<label for="monName"></label>

		<input type="idUser" name="idUser" placeholder="id del Usuario" maxlength="50" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'idUser') : ''; ?>
		<input type="idMonument" name="idMonument" placeholder="Id Monumento" maxlength="100" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'idMonument') : ''; ?>
		<input type="submit" value="Buscar" />
	</form>


	<table class="styled-table">
		<tr>
			<th>id User </th>
			<th> email user</th>
			<th>id Monumento</th>
			<th>Nombre Monumento</th>
		</tr>

		<?php
		$idUser = $_POST['idUser'];
		$idMonument = $_POST['idMonument'];

		$sql = "SELECT u.idUser, u.userEmail, m.idMonument, m.monName FROM monument m JOIN userMonument s ON m.idMonument = s.idMonument JOIN users u ON s.idUser = u.idUser WHERE u.idUser LIKE '%$idUser%' AND m.idMonument LIKE '%$idMonument%' ORDER BY idUser ASC;";

		//echo $sql;

		$monumentUs = mysqli_query($db, $sql);

		$resultado = [];

		if ($monumentUs && mysqli_num_rows($monumentUs) >= 1) {
			$resultado = $monumentUs;
		} else {

			$_SESSION["errores_entrada"] = $errores;
			//var_dump($_SESSION);
		}

		//$users = obtenerMonu($db);
		if (!empty($monumentUs)) {
			while ($monumentu = mysqli_fetch_assoc($resultado)) {
		?>
				<tr>
					<td><?= $monumentu['idUser'] ?></td>
					<td><?= $monumentu['userEmail'] ?></td>
					<td><?= $monumentu['idMonument'] ?></td>
					<td><?= $monumentu['monName'] ?></td>
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