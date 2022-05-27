<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    $idUser        = $_POST['idUser'];
    $userName      = $_POST['userName'];
    $userAp1       = $_POST['userAp1'];
    $userEmail     = $_POST['userEmail'];
    $userPassword  = $_POST['userPassword'];
    $userBirthdate = $_POST['userBirthdate'];

    $errores = array();

    if (empty($userName) || !preg_match("/[A-Za-z0-9_.]+/", $userName) || strlen($userName) > 50) {
        $errores['userName'] = 'El nombre de usuario no es válido';
    }

    if (empty($userAp1) || !preg_match("/[A-Za-z0-9_.]+/", $userAp1) || strlen($userAp1) > 100) {
        $errores['userAp1'] = 'El apellido del usuario no es válido';
    }

    if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL) || strlen($userEmail) > 100) {
        $errores['userEmail'] = 'El email no es válido';
    }

    if (empty($userPassword) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/", $userPassword) || strlen($userPassword) > 50) {
        $errores['userPassword'] = 'La contraseña no es válida';
    }


    if (count($errores) == 0) {


        $sql = "UPDATE users SET userName = '$userName', userAp1 = '$userAp1', userEmail = '$userEmail', userPassword = '$userPassword' WHERE idUser = '$idUser';";
        // echo $sql;

        $guardar = mysqli_query($db, $sql);
    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
    }
    header("Location:listMonu.php");
}
