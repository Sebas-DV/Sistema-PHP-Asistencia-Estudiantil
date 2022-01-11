<?php
  session_start();

  require_once 'clases/conexion.php';

  $msg = "";

  if(!empty($_POST))
  {
    if(empty($_POST['user']) && empty($_POST['pass']))
    {
      $msg = "Debes llenar todos los campos";
    }
    else
    {
      $user = $_POST['user'];
      $pass = $_POST['pass'];

      $_SESSION['usuario'] = $user;

      $sql = mysqli_query($conexionBD, "SELECT u.iduser, u.username, u.password, u.rango, u.idcurso
                                        FROM usuarios u
                                        WHERE username='$user' AND password='$pass'");

      if(mysqli_num_rows($sql) > 0)
      {
        while($valores = mysqli_fetch_array($sql))
        {
          $rango = $valores['rango'];
          $curso = $valores[4];
          $id = $valores[0];

          $_SESSION['id_curso'] = $curso;
          $_SESSION['id'] = $id;

          if($rango == '1')
          {
            header('Location: vistas/');
          }
          else if($rango == '2')
          {
            header('Location: vistas/docente/');
          }
          else if($rango == '3')
          {
            header('Location: vistas/estudiante/');
          }
        }
      }
      else
      {
        $msg = "Usuario y/o Contraseña incorrectos";
      }
    }
  }
?>
