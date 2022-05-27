<?php require_once 'includes/cabecera.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h3>ELIMINAR USUARIO</h3>
	<br />
	<form action="deleteUsersBD.php" method="POST">
		<label for="idUser">ID Usuario:</label>
		<input type="number" name="idUser" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'idUser') : ''; ?>

		<input type="submit" value="Eliminar" />
	</form>
	<?php borrarErrores(); ?>
</div>
<!--fin principal-->