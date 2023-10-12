<?php require "./conexion/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./inc/head.php" ?>
</head>

<body>
    <?php

    if (!isset($_GET['mostrar']) || $_GET['mostrar'] == "") {
        $_GET['mostrar'] = "login";
    }

    if (is_file("./vistas/" . $_GET['mostrar'] . ".php") && $_GET['mostrar'] != "login" && $_GET['mostrar'] != "404") {

        #cerrar sesion forzadamente
        if ((!isset($_SESSION['id']) || $_SESSION['id'] == "") || (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == "")) {
            include "./vistas/logout.php";
            exit();
        }

        include "./inc/navbar.php";
        include "./vistas/" . $_GET['mostrar'] . ".php";
        include "./inc/footer.php";
        include "./inc/script.php";
    } else {
        if ($_GET['mostrar'] == "login") {
            include "./vistas/login.php";
        } else {
            include "./vistas/404.php";
        }
    }

    ?>
</body>

</html>