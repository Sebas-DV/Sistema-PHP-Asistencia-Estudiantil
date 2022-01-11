<?php
  require_once '../clases/conexion.php';

  $msg = "";

  if(!empty($_POST))
  {
    if(empty($_POST['curso']))
    {
      $msg = "Alert: Rellene todos los campos.";
    }
    else
    {
      $curso = $_POST['curso'];

      $sql = mysqli_query($conexionBD, "INSERT INTO cursos (curso) VALUES ('$curso')");

      if($sql)
      {
        $msg = "Se registro con exito.";
      }
      else
      {
        $msg = "Error al registrar :(.";
      }
    }
  }
?>
