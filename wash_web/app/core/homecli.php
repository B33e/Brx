<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Tags SEO-->
  <meta name="author" content="Wash.WEB">
  <meta name="description" content="Aplicativo para proyecto Sena, I.E San José ">
  <meta name="keywords" content="lavadero,Lavadero,LAVADERO">
  <meta name="MobileOptimized" content="width">
  <meta name="HandhleFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar" content="black-traslucent">

  <!--favicon and title-->
  <title>Inicio de sesión</title>
  <link rel="icon" type="image/x-icon" href="media/img/logo.jpg" width="32px" alt="Avatar Logo" style="width:40px;"
    class="rounded-pill" />
  <link rel="apple-touch-icon" type="image/png" href="media/img/logo.jpg" width="32px" />
  <!--Styles  Bootstrap 5.3.3-->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      height: 100vh;
      overflow: hidden;
      font-family: "verdana";
      background: linear-gradient(rgb(43, 54, 85), rgb(28, 211, 211));
    }

    .login-page {
      width: 400px;
      padding: 8% 0 0;
      margin: auto;
    }

    .form {
      position: relative;
      z-index: 1;
      background: #000000 url(media/img/logo.jpg);
      max-width: 400px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      border-radius: 15px;
      box-shadow: 0 0 20px 0 rgba(134, 151, 207, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
      font-family: "verdana";
      outline: 0;
      background: #ffffff;
      width: 100%;
      border: 0;
      border-radius: 7px;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;

    }

    .form button {
      font-family: "verdana";
      text-transform: uppercase;
      outline: 0;
      background: #333333;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #bbbbbb;
      border-radius: 7px;
      font-size: 14px;
      -webkit-transition: all 1.0 ease;
      transition: all 1.0 ease;
      cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      background: #0e2941;
    }

    .form .message {
      margin: 15px 0 0;
      color: #ffffff;
      font-size: 12px;
    }

    .form .message a {
      color: #ffffff;
      text-decoration: solid;
    }

    .form .register-form {
      display: none;
    }
  </style>

</head>
<header>

</header>

<body style="background-color:rgb(97, 130, 153);" style="display:flex; align-items:center; justify-content:center;">

  <!-- Inicio de sesión de la pagina-->
  <?php
  //require_one.'core/class.dbconfig,php';
//$conn->dbconnection();
  session_start();
  require_once 'core/class.clien.php';
  $regcliente= new clien();

  if (isset($_POST['regcliente'])) {
    $fname = trim($_POST['fname']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $number = trim($_POST['number']);

    $data = $regadmin->runQuery("SELECT * FROM adm WHERE email=:email");
    $data->execute(array(":email" => $email));
    $data->fetch(PDO::FETCH_ASSOC);

    if ($data->rowCount() > 0) {
      $msg = array("disculpa, el email ya existe, utiliza otro", "danger");
    } else {

      if ($regcliente->reg_cliente($nombre, $correo, $telefono, $user, $clave)) {
        $msg = array("datos ingresados", "success");
      } else {
        echo "lo siento no se puede guardar tus datos";

      }
    }
  }

  ?>

  <!--Section Alerts-->
  <?php if (isset($msg)) { ?>
    <div class="alert alert-<?php echo $msg[1] ?> alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> <?php echo $msg[0] ?>
    </div>
  <?php } ?>
  <!--Section Alerts-->
  <div class="login-page">
    <div class="form">
  
        <form action="" class="register-form" method="POST">
          <h2><i class="fas fa-lock"></i> Register</h2>
          <input type="text" name="nombre" placeholder="Nombre*" required />
          <input type="number" name="edad" placeholder="Edad" required />
          <input type="email" name="email" placeholder="Email *" required />
        </form>
        <form action="../action_page.php" class="login-form password-wrapper" method="post" >
          <h2><i class="fas fa-lock"></i> Ingresa </h2>
          <input type="text" placeholder="Usuario" required />
          <label for="pwd" class="form-label">Contraseña:</label>
          <input type="password" placeholder="Contraseña" class="form-control" id="password" required>
          <span class="input-group pt-3 toggle-button eye-icon" onclick="password_show_hide()">
            <i class="bi bi-eye-fill d-none" id="show_eye" style="font: size 20px;"></i>

            <i class="bi bi-eye-slash-fill" id="hide_eye" style="font: size 20px;"></i>
          </span>
          <button type="submit" name="send2">Ingresa</button>
          <p class="message">¿No registrado? <a href="#">Crear una cuenta</a></p>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/password.viewer.js"></script>

  <script>


    $('.message a').click(function () {
      $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });
 </script >
      <a href="index.php"> Inicio de sesion</a>
    
</body >
      <footer>
  <!-- Copyright -->
        <div class="borde">
          <div class="text-center p-3" style="background-color: rgb(128, 190, 206);" >
            © 2024 Copyright:
            <a class="text-light" href="#">Wash.WEB</a>
          </div>
        </div>
      </footer>
</html >zx