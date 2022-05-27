<?php require_once 'includes/cabeceraMonu.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <?php $varImg = "img/"; ?>
    <br />
    <h3>MOSTRAR MONUMENTO</h3>
    <form action="showMonuBuscar.php" method="POST">
        <p>Introduce el ID del Monumento </p><br>
        <label for="idMonument">id Monumento:</label>
        <input type="idMonument" name="idMonument" placeholder="id Monumento" maxlength="100" />
        <input type="submit" value="Buscar" /><br>
    </form>

    <?php
    if (isset($_SESSION['showMonu'])) {
        echo "Correcto ";
        $monuments = $_SESSION['showMonu'];
    } else {
        $monuments['idMonument']        = "";
        $monuments['monName']      = "";
        $monuments['monLocation']       = "";
        $monuments['monDes']     = "";
    }
    ?>
    <form action="showMonuBD.php" method="POST">
        <!--hidden value -->
        <input type="hidden" name="idMonument" value="<?= $monuments['idMonument'] ?>">


        <label for="monName">Nombre del Monumento:</label>
        <input readonly type="text" name="monName" placeholder="Nombre del Monumento" maxlength="100" value="<?= $monuments['monName'] ?> " />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'monName') : ''; ?>

        <label for="monLocation">Localización</label>
        <input readonly type="text" name="monLocation" placeholder="Localización" maxlength="50" value="<?= $monuments['monLocation'] ?>" />


        <label for="monDes">Descripción</label>
        <input readonly type="text" name="monDes" placeholder="Descripción" maxlength="500" value="<?= $monuments['monDes'] ?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'monDes') : ''; ?>

        <label for="monLocation">Imágenes</label>
        <div> <img src="<?= $varImg['monLocation'] ?>" alt=""> </div>



    </form>
    <?php borrarErrores();

    //Borrar datos de sesión de la pestaña edit

    if (isset($_SESSION['showMonu'])) {
        $_SESSION['showMonu'] = null;
    }


    ?>



</div>
<!--fin principal-->