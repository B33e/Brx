<?php
session_start();
require_once 'core/class.adm.php';
$login_adm = new adm();

if (!$login_adm->logged_in()) {
    $login_adm->redirect('./');
}


$stmt = $login_adm->runQuery("SELECT * FROM admin WHERE idadmin=:idadmin");
$stmt->execute(array(":idadmin" => $_SESSION['admsession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Tags SEO-->
    <meta name="author" content="WashWEB">
    <meta name="description" content="Aplicativo para la I.E San José">
    <meta name="keywords" content="lavadero,Lavadero,LAVADERO">
    <meta name="MobileOptimized" content="width">
    <meta name="HandhleFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar" content="black-traslucent">

    <!--favicon and title-->

    <title>WashWEB</title>
    <div class="d-flex d-flex justify-content-end py-1"><img src="media\img\icono.png" alt=""></div>
    <link rel="icon" type="image/x-icon" href="assets\img\logo.jpg" width="32px" alt="Avatar Logo" style="width:40px;" class="rounded-pill" />
    <link rel="apple-touch-icon" type="image/png" href="media/img/icono.png" width="32px" alt="botón" />
    <!--iconos bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Styles  Bootstrap 5.3.3-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style_forminit.css">
</head>

<body style="background-color:rgb(0, 0, 0); font-family:Arial;" size="4">

    <header>

        <!-- The Modal logout-->
        <div class="modal fade" id="logout">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Logout</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    You sure want to go out?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" onclick="location.href='logoutadm'">ACCEPT</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../media\img\icono.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="homead">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=perfilad">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../app/reg_traba.php">Registrar trabajador</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container py-5 mt-2">

        <?php


        $page = isset($_GET['pg']) ? strtolower(ucwords($_GET['pg'])) : 'homead';
        require_once './' . $page . '.php';
        ?>

    </main>

    <script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>

</body>
<div class="d-flex justify-content-center">
    <footer><b> &copy; Copyright 2024 <a href="index.html"> WashWEB</b></a></footer>
</div>

</html>