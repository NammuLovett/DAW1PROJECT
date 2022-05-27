<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //var_dump($_POST);

    $idMonument = $_POST['idMonument'];

    // Validación
    $errores = array();


    if (empty($idMonument) || !is_numeric($idMonument)) {
        $errores['idMonument'] = 'El ID  no es válido';
    }


    if (count($errores) == 0) {

        $sql = "SELECT * FROM monument WHERE idMonument = '$idMonument';";


        $guardar = mysqli_query($db, $sql);

        if ($guardar && mysqli_num_rows($guardar) == 1) {
            $monuments = mysqli_fetch_assoc($guardar);
            $_SESSION["editMonuments"] = $monuments;
        }
    } else {

        $_SESSION["errores_entrada"] = $errores;
        //var_dump($_SESSION);

    }
    header("Location:editMonu.php");
}
