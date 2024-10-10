<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro cliente</title>
    <link rel="icon" type="image/x-icon" href="media/img/icono.png"
        width="32px" alt="Avatar Logo" style="width:40px;" class="rounded-pill"/>
        <link rel="apple-touch-icon"type="image/png"href="media/img/icono.png"width="32px"/>
        <link rel="stylesheet" href="../assets/css/estils.css">
    
</head>
<body style=" background: linear-gradient(rgb(43, 54, 85), rgb(28, 211, 211));" style= "display:flex; align-items:center; justify-content:center;">
    

  <!-- Inicio de sesión de la pagina-->

    <div class="login-page">
        <div class="form">
          <form class="register-form" method="POST">

            <h2 class="fas fa-lock" style="color: #ffffff;"> Registro</h2>
            <input type="text" placeholder="Nombre *" required/>
            <input type="text" placeholder="Usuario *" required/>
            <input type="email" placeholder="Email *" required/>
            <input type="password" placeholder="Contraseña *" required/>
            <button type="submit">Crear</button>
            <p class="message">¿Ya estas registrado? <a href="#">Entrar</a></p>
          </form>
          <form class="login-form" method="post">
            <h2 class="fas fa-lock" style="color: #ffffff;"> Entrar </h2>
            <input type="text" placeholder="Usuario" required />
            <input type="password" placeholder="Contraseña" required/>
            <button type="submit" name="send2">Entrar</button>
            <p class="message">¿No registrado? <a href="#">Crear una cuenta</a></p>
          </form>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="/js/main.js"></script>
      </body>
  <!--Estilo-->

  <style>


body{
      height: 100vh;
      overflow: hidden;
      font-family: "verdana";
    background: #333333;
  }
  .login-page {
    width: 400px;
    padding: 8% 0 0;
    margin: auto;
  }
  .form {
    position: relative;
    z-index: 1;
    background: #636363 url(media/img/inicio.jpg); 
    max-width: 400px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  .form input {
    font-family: verdana;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    border-radius: 7px;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    
  }
  .form button {
    font-family: "Poppins", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #333333;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #bbbbbb;
    border-radius: 7px;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }
  .form button:hover,.form button:active,.form button:focus {
    background: #0e2941;
  }
  .form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
  }
  .form .message a {
    color:#ffffff
  }
  .form .register-form {
    display: none;
  }


</style>

<script>

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
  <script type="text/javascript">
		//¿Cómo esconder el "#" hash de una url
window.onhashchange = function () {
    	window.history.pushState('', document.title, window.location.pathname)
  		}



</script>
    
</body>
</html>