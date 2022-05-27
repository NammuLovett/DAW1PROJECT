<?php require_once 'includes/cabecera.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

    <br />
    <h3>MOSTRAR USUARIO</h3>
    <form action="showUsersBuscar.php" method="POST">
        <p>Introduce el ID del usuario </p><br>
        <label for="idUser">id Usuario:</label>
        <input type="idUser" name="idUser" placeholder="id Usuario" maxlength="100" />
        <input type="submit" value="Buscar" /><br>
    </form>

    <?php
    if (isset($_SESSION['showUsers'])) {
        echo "Correcto ";
        $users = $_SESSION['showUsers'];
    } else {
        $users['idUser']        = "";
        $users['userName']      = "";
        $users['userAp1']       = "";
        $users['userEmail']     = "";
        $users['userPassword']  = "";
        $users['userBirthdate'] = "";
    }
    ?>
    <form action="showUsersBD.php" method="POST">
        <!--hidden value -->
        <input type="hidden" name="idUser" value="<?= $users['idUser'] ?>">


        <label for="userEmail">Email:</label>
        <input readonly type="email" name="userEmail" placeholder="Email" maxlength="100" value="<?= $users['userEmail'] ?> " />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userEmail') : ''; ?>

        <label for="userPassword">Contraseña:</label>
        <input readonly type="Password" name="userPassword" placeholder="Contraseña" maxlength="50" value="<?= $users['userPassword'] ?>" />


        <label for="userName">Nombre</label>
        <input readonly type="text" name="userName" placeholder="Nombre" maxlength="50" value="<?= $users['userName'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userName') : ''; ?>

        <label for="userAp1">Primer Apellido</label>
        <input readonly type="text" name="userAp1" placeholder="Apellido" maxlength="100" value="<?= $users['userAp1'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'userAp1') : ''; ?>


        <label for="userBirthdate">Fecha Nacimiento </label>
        <input readonly type="date" name="userBirthdate" value="<?= $users['userBirthdate'] ?>" />


    </form>
    <?php borrarErrores();

    //Borrar datos de sesión de la pestaña edit

    if (isset($_SESSION['showUsers'])) {
        $_SESSION['showUsers'] = null;
    }


    ?>



</div>
<!--fin principal-->