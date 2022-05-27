<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //var_dump($_POST);


    $userName      = $_POST['userName'];
    $userAp1       = $_POST['userAp1'];
    $userEmail     = $_POST['userEmail'];
    $userPassword  = $_POST['userPassword'];
    $userBirthdate = $_POST['userBirthdate'];



    // Validación
    $errores = array();



    if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $errores['userEmail'] = 'El correo electrónico no es válido';
    }

    if (empty($userName) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.: ]+/", $userName) || strlen($userName) > 50) {
        $errores['userName'] = 'El nombre no es válido';
    }

    if (empty($userAp1) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.: ]+/", $userAp1) || strlen($userAp1) > 100) {
        $errores['userAp1'] = 'El Apellido no es válido';
    }

    if (empty($userBirthdate) || !is_numeric($idUser)) {
        $errores['userBirthdate'] = 'Fecha de nacimiento no es válida';
    }


    //INSERT EN BD 
    if (count($errores) == 0) {
        $insert = "INSERT INTO users (userName, userAp1, userBirthdate, userEmail,userPassword) VALUES ('$userName', '$userAp1', '$userBirthdate', '$userEmail', '$userPassword');";
        //echo $insert;
        $guardar = mysqli_query($db, $insert);
        header("Location:listUsers.php");
    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
        header("Location:addUsers.php");
    }
}
