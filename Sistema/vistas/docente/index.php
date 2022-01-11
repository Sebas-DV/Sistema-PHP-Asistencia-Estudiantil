<?php
  session_start();
  require_once 'librerias.php';

  if(isset($_SESSION['usuario']))
  {
    require_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="titulo">
        <hr>
        <h1>Sistema de Asistencia Docente</h1>
        <hr>
      </div>
    </div>
  </body>
</html>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
