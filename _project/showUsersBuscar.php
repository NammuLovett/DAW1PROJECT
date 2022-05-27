<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //var_dump($_POST);

    $idUser = $_POST['idUser'];

    // Validación
    $errores = array();


    if (empty($idUser) || !is_numeric($idUser)) {
        $errores['idUser'] = 'El ID de usuario no es válido';
    }


    if (count($errores) == 0) {

        $sql = "SELECT * FROM users WHERE idUser = '$idUser';";


        $guardar = mysqli_query($db, $sql);

        if ($guardar && mysqli_num_rows($guardar) == 1) {
            $users = mysqli_fetch_assoc($guardar);
            $_SESSION["showUsers"] = $users;
        }
    } else {

        $_SESSION["errores_entrada"] = $errores;
        //var_dump($_SESSION);

    }
    header("Location:showUsers.php");
}
