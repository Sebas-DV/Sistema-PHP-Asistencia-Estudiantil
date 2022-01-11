<?php
session_start();
require_once 'includes.php';

if(isset($_SESSION['usuario']))
{
  require_once 'menu.php';
}
else
{
  header('Location: ../index.php');
}
?>
