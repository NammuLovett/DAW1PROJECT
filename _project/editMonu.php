<?php require_once 'includes/cabeceraMonu.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

    <br />

    <form action="editMonuBuscar.php" method="POST">
        <p>Introduce el ID del Monumento </p>
        <label for="idMonument">id Monumento:</label>
        <input type="idMonument" name="idMonument" placeholder="id Monumento" maxlength="100" />

        <input type="submit" value="Buscar" />
    </form>

    <?php
    if (isset($_SESSION['editUsers'])) {
        echo "Comprobar Correcto";
        $users = $_SESSION['editUsers'];
    } else {
        $users['idUser']        = "";
        $users['userName']      = "";
        $users['userAp1']       = "";
        $users['userEmail']     = "";
        $users['userPassword']  = "";
        $users['userBirthdate'] = "";
    }
    ?>
    <form action="editMonuBD.php" method="POST">
        <!--hidden value -->
        <input type="hidden" name="idUser" value="<?= $users['idUser'] ?>">

        <label for="userEmail">Email:</label>
        <input type="email" name="userEmail" placeholder="Email" maxlength="100" value="<?= $users['userEmail'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userEmail') : ''; ?>

        <label for="userPassword">Contraseña:</label>
        <input type="Password" name="userPassword" placeholder="Contraseña" maxlength="50" value="<?= $users['userPassword'] ?>" />


        <label for="userName">Nombre</label>
        <input type="text" name="userName" placeholder="Nombre" maxlength="50" value="<?= $users['userName'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userName') : ''; ?>

        <label for="userAp1">Primer Apellido</label>
        <input type="text" name="userAp1" placeholder="Apellido" maxlength="100" value="<?= $users['userAp1'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userAp1') : ''; ?>


        <label for="userBirthdate">Fecha Nacimiento </label>
        <input type="date" name="userBirthdate" value="<?= $users['userBirthdate'] ?>" />


        <input type="submit" value="Actualizar" />
    </form>
    <?php borrarErrores();

    //Borrar datos de sesión de la pestaña edit

    if (isset($_SESSION['editUsers'])) {
        $_SESSION['editUsers'] = null;
    }




    ?>



</div>
<!--fin principal-->