<?php
  include("../php/conexion.php");
  include("../php/validarSesion.php");
  $visual = $_GET['visual'];

  $queryDelete = "DELETE FROM fotos WHERE Nickname='$nickname' AND NombreFoto = '$visual' " ;
 
  if(mysqli_query($conexion, $queryDelete)){   
    header('Location: ../php/fotos.php');
  }else{
    echo "Error";
    echo "<a href='../php/fotos.php'> Volver </a>";
  }

  ?>