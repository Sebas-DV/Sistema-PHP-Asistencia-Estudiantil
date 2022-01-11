<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];

  $sql = "DELETE FROM usuarios WHERE iduser='$id'";

  $result = mysqli_query($conexionBD, $sql);

  echo $result;
?>
