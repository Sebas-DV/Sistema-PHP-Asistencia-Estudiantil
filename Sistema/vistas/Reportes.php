<?php
  session_start();

  require_once '../clases/conexion.php';
  require_once '../procesos/Reporteria/reporte.php';

  if(isset($_SESSION['usuario']))
  {
    while (ob_get_level())
    ob_end_clean();

    header("Content-Encoding: None", true);

    $query = "SELECT * FROM cursos";

    $resultado = mysqli_query($conexionBD, $query);


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10,6,'#',1,0,'C',1);
    $pdf->Cell(60,6,'CURSO',1,0,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc())
    {
      $pdf->Ln();
      $pdf->Cell(10,6,$row['idcurso'],1,0,'C',1);
      $pdf->Cell(60,6,$row['curso'], 1,0,'C',1);
    }
    $pdf->Ln(25);

    $asig = mysqli_query($conexionBD, "SELECT * FROM asignaturas");

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10,6,'#',1,0,'C',1);
    $pdf->Cell(60,6,'CURSO',1,0,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = mysqli_fetch_array($asig))
    {
      $pdf->Ln();
      $pdf->Cell(10,6,$row['idasig'],1,0,'C',1);
      $pdf->Cell(60,6,$row['nombreasig'], 1,0,'C',1);
    }

    $pdf->Ln(25);

    $usuario = mysqli_query($conexionBD, "SELECT * FROM usuarios");

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10,6,'#',1,0,'C',1);
    $pdf->Cell(60,6,'NOMBRE COMPLETO',1,0,'C',1);
    $pdf->Cell(60,6,'RANGO',1,0,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = $usuario->fetch_assoc())
    {
      if($row['rango'] == '1')
      {
        $rango = "Administrador";
      }
      else if($row['rango'] == '2')
      {
        $rango = "Docente";
      }
      else if ($row['rango'] == '3')
      {
        $rango = "Estudiante";
      }
      $pdf->Ln();
      $pdf->Cell(10,6,$row['iduser'],1,0,'C',1);
      $pdf->Cell(60,6,$row['nombre_completo'],1,0,'C',1);
      $pdf->Cell(60,6,$rango, 1,0,'C',1);
    }
    $pdf->Output();

  }
  else
  {
    header('Location: ../index.php');
  }
?>
