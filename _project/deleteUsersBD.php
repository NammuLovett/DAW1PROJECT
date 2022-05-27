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

        $sql = "DELETE FROM `users` WHERE (idUser='$idUser');";


        $eliminar = mysqli_query($db, $sql);

        //var_dump($eliminar);


    } else {

        $_SESSION["errores_entrada"] = $errores;
        //var_dump($_SESSION);

    }

    header("Location: listUsers.php");
}
