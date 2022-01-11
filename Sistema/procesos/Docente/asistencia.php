<?php

  $msg = "";
  if(!empty($_POST))
  {
    if(empty($_POST['reg_asistencia']))
    {
      $msg = "Seleccione algo para guardar.";
    }
    else
    {
      $id = $_POST['id_user'];
      $reg = $_POST['reg_asistencia'];

      $query = mysqli_query($conexionBD, "UPDATE usuarios SET asistencia='$reg' WHERE iduser='$id'");

      if($query)
      {
          $msg = "Se guardo con exito.";
      }
      else
      {
          $msg = "Ocurrio un erro :(.";
      }
    }
  }
?>
