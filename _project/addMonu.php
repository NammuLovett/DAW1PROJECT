<?php require_once 'includes/cabeceraMonu.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

	<br />
	<form action="addMonuBD.php" method="POST">

		<label for="userEmail">Email:</label>
		<input type="email" name="userEmail" placeholder="Email" maxlength="100" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userEmail') : ''; ?>

		<label for="userPassword">Contraseña:</label>
		<input type="Password" name="userPassword" placeholder="Contraseña" maxlength="50" pattern="[A-Za-z0-9_.@]+" />


		<label for="userName">Nombre</label>
		<input type="text" name="userName" placeholder="Nombre" maxlength="50" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userName') : ''; ?>

		<label for="userAp1">Primer Apellido</label>
		<input type="text" name="userAp1" placeholder="Apellido" maxlength="100" pattern="[A-Za-z0-9_.@]+" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userAp1') : ''; ?>


		<label for="userBirthdate">Fecha Nacimiento </label>
		<input type="date" name="userBirthdate" />
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userBirthdate') : ''; ?>

		<input type="submit" value="Añadir Usuario" />
	</form>
	<?php borrarErrores(); ?>
</div>
<!--fin principal-->