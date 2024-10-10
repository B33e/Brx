<?php
session_start();
require_once 'core/class.adm.php';
require_once 'core/class.clien.php';

$reg_adm = new adm();
$reg_cliente = new clien();

if (isset($_POST['btnlogin'])) {
    $name = trim($_POST['name']);
    $pass = trim($_POST['pass']);
  
    $stmt = $reg_adm->runQuery("SELECT * FROM administrador WHERE name=:name UNION SELECT * FROM usuario WHERE user=:user");
    $stmt->execute(array(':user' => $client_user));
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    switch ($row['tipo']) {
      case 'cliente':
        if ($regcliente->reg_cliente($name, $pass)) {
          header('location: homecli');
        }
        break;
      case 'admin':
        if ($regadm->reg_adm($name, $pass)) {
          header('location: homead');
        }
        break;
  
      default:
        $msg = array("No se encontro usuario", "danger");
        break;
    }
  }
  

?>
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
    <link rel="icon" type="image/x-icon" href="../media/img/logo.jpg" width="32px" alt="Avatar Logo" style="width:40px;"
        class="rounded-pill" />
    <link rel="apple-touch-icon" type="image/png" href="media/img/logo.jpg" width="32px" />
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <!--Styles  Bootstrap 5.3.3-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/estils.css">

</head>

<body style=" background: linear-gradient(rgb(43, 54, 85), rgb(28, 211, 211));"
    style="display:flex; align-items:center; justify-content:center;">

    <!-- Inicio de sesión de la pagina-->
    <?php

//*Inicio del switch

$regcliente = new clien();
$regadm = new adm();

if (isset($_POST['reg_usr'])) {

    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);

  switch ($_POST['tipo']) {
    case 'cliente':

      $data = $regusr->runQuery("SELECT * FROM cliente WHERE name=:name");
      $data->execute(array(":name" => $name));
      $data->fetch(PDO::FETCH_ASSOC);

      $data = $regusr->runQuery("SELECT * FROM cliente WHERE age=:age");
      $data->execute(array(":age" => $age));
      $data->fetch(PDO::FETCH_ASSOC);

      $data1 = $regusr->runQuery("SELECT * FROM cliente WHERE email=:email");
      $data1->execute(array(":email" => $email));
      $data1->fetch(PDO::FETCH_ASSOC);

      $data2 = $regusr->runQuery("SELECT * FROM cliente WHERE user=:user");
      $data2->execute(array(":user" => $user));
      $data2->fetch(PDO::FETCH_ASSOC);

      if ($data->rowCount() > 0) {
        $msg = array("Disculpa, el telefono ya existe", "danger");
      } else {

        if ($data1->rowCount() > 0) {
          $msg = array("Disculpa, el email ya existe", "danger");
        } else {
          if ($data2->rowCount() > 0) {
            $msg = array("Disculpa, el usuario ya existe", "danger");
          } else {

            if ($regusr->reg_usr($name, $age, $email, $user, $pass)) {
              $msg = array("Datos Ingresados", "success");
            } else {
              $msg = array("Lo siento no se pudo guardar los datos", "danger");
            }
          }
        }
      }
      break;
    case 'admin':

      $data = $regadm->runQuery("SELECT * FROM administrador WHERE name=:name");
      $data->execute(array(":name" => $name));
      $data->fetch(PDO::FETCH_ASSOC);

      $data1 = $regadm->runQuery("SELECT * FROM administrador WHERE age=:age");
      $data1->execute(array(":age" => $age));
      $data1->fetch(PDO::FETCH_ASSOC);

      $data2 = $regadm->runQuery("SELECT * FROM administrador WHERE email=:email");
      $data2->execute(array(":email" => $email));
      $data2->fetch(PDO::FETCH_ASSOC);

      $data = $regadm->runQuery("SELECT * FROM administrador WHERE pass=:pass");
      $data->execute(array(":pass" => $pass));
      $data->fetch(PDO::FETCH_ASSOC);

      if ($data->rowCount() > 0) {
        $msg = array("Disculpa, el telefono ya existe", "danger");
      } else {

        if ($data1->rowCount() > 0) {
          $msg = array("Disculpa, el email ya existe", "danger");
        } else {
          if ($data2->rowCount() > 0) {
            $msg = array("Disculpa, el usuario ya existe", "danger");
          } else {

            if ($regadm->reg_adm($name, $age, $email, $user, $pass)) {
              $msg = array("Datos Ingresados", "success");
            } else {
              $msg = array("Lo siento no se pudo guardar los datos", "danger");
            }
          }
        }
      }

      break;

    default:
      # code...
      break;
  }
}
//*Fin del switch

    $regadm = new adm();

    if (isset($_POST['regadm'])) {
        $name = trim($_POST['name']);
        $age = trim($_POST['age']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['pass']);

        $data = $regadm->runQuery("SELECT * FROM admin WHERE email=:email");
        $data->execute(array(":email" => $email));
        $data->fetch(PDO::FETCH_ASSOC);

        if ($data->rowCount() > 0) {
            $msg = array("disculpa, el email ya existe, utiliza otro", "danger");
        } else {

            if ($regadm->reg_adm($name, $age, $email, $pass)) {
                $msg = array("datos ingresados", "success");
            } else {
                $msg = array("lo siento no se puede guardar tus datos", "danger");

            }
        }
    }

    ?>

    <div class="login-page">
        <!--Section Alerts-->
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Alerta!</strong> correo o contraseña incorreta
            </div>
        <?php } ?>
        <!--Section Alerts-->
        <?php if (isset($msg)) { ?>
            <div class="alert alert-<?php echo $msg[1] ?> alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> <?php echo $msg[0] ?>
            </div>
        <?php } ?>
        <!--Section Alerts-->
        <div class="form">
            <form class="register-form" method="post">
            <div id="login" class="h2">
                    <i class="fas fa-lock"></i>Registro
                </div>
                <select name="tipo" id="tipo" class="form-select mb-2">
              <option value="cliente" class="bg-secondary text-white"><b>Eres cliente</b></option>
              <option value="admin" class="bg-secondary text-white"><b>Eres admin</b></option>
            </select>
                <input type="text" name="name" placeholder="Nombre *" required />
                <input type="number" name="age" placeholder="Edad*" required />
                <input type="email" name="email" placeholder="Email *" required />
                <input type="password" name="pass" placeholder="Contraseña *" required />
                <button type="submit" name="regadm">Crear</button>
                <p class="message">¿Ya estas registrado? <a href="#">Ingresar</a></p>
            </form>

            <form class="login-form" method="post">
                <div id="login" class="h2">
                    <i class="fas fa-lock"></i>Entrar
                </div>
                <input type="text" placeholder="Correo" name="email" required />
                <input type="password" placeholder="Contraseña" name="pass" required />
                <button type="submit" name="btnlogin">Entrar</button>
                <p class="message">¿No registrado? <a href="#">Crear una cuenta</a></p>
            </form>
        </div>
    </div>

    <footer>
        <!-- Copyright -->
        <div class="borde">
            <div class="text-center p-3" style="background-color: rgb(128, 190, 206);">
                © 2024 Copyright:
                <a class="text-light" href="#">Wash.WEB</a>
            </div>
        </div>
    </footer>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
        });
    </script>

</body>

</html>