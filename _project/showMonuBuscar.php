<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //var_dump($_POST);

    $idMonument = $_POST['idMonument'];

    // Validación
    $errores = array();


    if (empty($idMonument) || !is_numeric($idMonument)) {
        $errores['idMonument'] = 'El ID no es válido';
    }


    if (count($errores) == 0) {


        $sql = "SELECT * FROM monument WHERE idMonument = $idMonument ;";
        // echo $sql;

        $guardare = mysqli_query($db, $sql);

        if ($guardare && mysqli_num_rows($guardare) == 1) {
            $monumente = mysqli_fetch_assoc($guardare);
            $_SESSION["showMonuments"] = $monumentsB;
        }
    } else {

        $_SESSION["errores_entrada"] = $errores;
        //var_dump($_SESSION);

    }
    header("Location:showMonu.php");
}
