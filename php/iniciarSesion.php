<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../7-redSocial/css/estilo.css">
    <link rel="shortcut icon" href="../7-redSocial/images/logo.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>


<?php
include("../php/conexion.php");

session_start();
$_SESSION['login'] = false;

$nickname = $_POST['nickname'];
$password = $_POST['contraseña'];

$queryNickname = "SELECT * FROM persona WHERE Nickname = '$nickname' ";
$queryID = mysqli_query($conexion, $queryNickname);
$showData = mysqli_fetch_array($queryID);

if($showData){
    if(password_verify($password, $showData['Password'])){
        $_SESSION['login'] = true;
        $_SESSION['nickname'] = $showData['Nickname'];
        $_SESSION['nombre'] = $showData['Nombre'];
        $_SESSION['apellido'] = $showData['Apellido'];
        $_SESSION['edad'] = $showData['Edad'];
        $_SESSION['descripcion'] = $showData['Descripcion'];
        $_SESSION['fotoPerfil'] = $showData['FotoPerfil'];
        
        header('Location: ../php/miPerfil.php');
    }else{
        echo "<script>
                swal('Contraseña Incorrecta', 'Intente nuevamente', 'error');
              </script>";
        //echo "Contraseña incorrecta";
        //echo "<br> <a href='../index.html'> Intente nuevamente </a> </div>";
    }
}else{
    echo "<script>
            swal('Usuario Incorrecto', 'Pruebe con otro usuario', 'error');
          </script>";
    //echo "Su usuario no existe";
    //echo "<br> <a href='../index.html'> Intente nuevamente </a> </div>";
}

mysqli_close($conexion);


?>

<script src="../js/welcome.js"></script>
</body>
</html>