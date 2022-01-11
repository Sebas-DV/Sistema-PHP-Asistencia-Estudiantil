<?php
  require_once '../clases/conexion.php';

  $msg = "";

  if(!empty($_POST))
  {
    if(empty($_POST['nombre']) || empty($_POST['cedula']) || empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['idRango']) || empty($_POST['idCurso']) || empty($_POST['idAsig']))
    {
      $msg = "Alert: Rellene todos los campos.";
    }
    else
    {
      $nombre = $_POST['nombre'];
      $cedula = $_POST['cedula'];
      $username = $_POST['user'];
      $password = $_POST['pass'];
      $rango = $_POST['idRango'];
      $idCurso = $_POST['idCurso'];
      $idAsig = $_POST['idAsig'];

      $sql = mysqli_query($conexionBD, "INSERT INTO usuarios (nombre_completo, c_i, username, password, rango, idCurso, idasig) VALUES ('$nombre','$cedula','$username','$password','$rango','$idCurso','$idAsig')");

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
