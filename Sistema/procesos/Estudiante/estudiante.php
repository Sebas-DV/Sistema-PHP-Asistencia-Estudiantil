<?php
require_once '../clases/conexion.php';

$msg = "";

if(!empty($_POST))
{
  if(empty($_POST['nombre']) || empty($_POST['cedula']) || empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['idRnago']) || empty($_POST['idCurso']))
  {
    $msg = "Alert: Rellene todos los campos.";
  }
  else
  {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $rango = $_POST['idRnago'];
    $idCurso = $_POST['idCurso'];

    $sql = mysqli_query($conexionBD, "INSERT INTO usuarios (nombre_completo, c_i, username, password, rango, idcurso) VALUES ('$nombre','$cedula','$username','$password','$rango','$idCurso')");

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
