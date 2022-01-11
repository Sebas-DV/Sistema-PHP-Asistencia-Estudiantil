<?php
  include 'procesos/Login/login.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="librerias/ext/css/bootstrap.css">
    <link rel="stylesheet" href="librerias/alertify/css/alertify.css">
    <link rel="stylesheet" href="librerias/alertify/css/themes/default.css">
    <link rel="stylesheet" href="estilos/index.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="librerias/ext/js/bootstrap.min.js"></script>
    <script src="librerias/alertify/alertify.js"></script>
    <script src="js/alertify/menu.js"></script>
  </head>
  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <div class="fadeIn first">
          <h3>Sistema de Asistencia</h3>
        </div>

        <form method="POST" action="">
          <input type="text" id="login" class="fadeIn second" name="user" placeholder="Nombre de Usuario">
          <input type="text" id="password" class="fadeIn third" name="pass" placeholder="Contraseña">
          <input type="submit" class="fadeIn fourth" value="Iniciar Session">
        </form>

        <div id="formFooter">
          <p><?php echo isset($msg) ? $msg : ''; ?></p>
          <a class="underlineHover" href="#"></a>
        </div>
      </div>
    </div>
  </body>
</html>
