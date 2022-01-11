<?php
  require_once '../clases/conexion.php';

  $msg = "";

  if(!empty($_POST))
  {
    if(empty($_POST['asignatura']))
    {
      $msg = "Alert: Rellene todos los campos.";
    }
    else
    {
      $asig = $_POST['asignatura'];

      $sql = mysqli_query($conexionBD, "INSERT INTO asignaturas (nombreasig) VALUES ('$asig')");

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
