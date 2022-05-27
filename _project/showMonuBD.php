<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    $idMonument        = $_POST['idMonument'];
    $monName      = $_POST['monName'];
    $monLocation       = $_POST['monLocation'];
    $monDes       = $_POST['monDes'];

    $errores = array();

    if (empty($monName) || !preg_match("/[A-Za-z0-9_.]+/", $monName) || strlen($monName) > 50) {
        $errores['monName'] = 'El nombre no es válido';
    }

    if (empty($monName) || !preg_match("/[A-Za-z0-9_.]+/", $monName) || strlen($monName) > 100) {
        $errores['userAp1'] = ' Nombre no es válido';
    }

    if (empty($monLocation)  || strlen($monLocation) > 100) {
        $errores['monLocation'] = 'Localización no válida';
    }

    if (empty($monDes) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/", $monDes) || strlen($monDes) > 500) {
        $errores['monDes'] = 'Descripción no válida';
    }

    if (count($errores) == 0) {


        $sql = "SELECT m.idMonument,m.monName, m.monLocation, m.monDes, i.ruta FROM monument AS m JOIN imagen AS i ON m.idMonument = i.idMon WHERE m.idMonument = $idMonument ;";
        echo $sql;

        //$guardar = mysqli_query($db, $sql);
    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
    }
    //header("Location:showMonu.php");
}
