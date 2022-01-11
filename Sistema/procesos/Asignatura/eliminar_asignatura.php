<?php
    require_once '../../clases/conexion.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM asignaturas WHERE idasig='$id'";
    $result = mysqli_query($conexionBD, $sql);

    echo $result;
?>
