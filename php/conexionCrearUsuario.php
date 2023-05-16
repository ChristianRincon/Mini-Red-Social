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

$nickname = $_POST["nickname"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];
$descripcion = $_POST["descripcion"];
$email = $_POST["correo"];
$password = $_POST["contraseña"];
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$fotoPerfil = "../images/$nickname/perfil.png";

$queryNickname = "SELECT Nickname FROM persona WHERE Nickname = '$nickname' ";
$queryID = mysqli_query($conexion, $queryNickname);                                 
$showData = mysqli_fetch_array($queryID);

if(!$showData){
    $createUser = "INSERT INTO persona VALUES ('$nickname', LOWER('$nombre'), LOWER('$apellido'), '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";

    if(mysqli_query($conexion, $createUser)){
        mkdir("../images/$nickname");
        copy("../images/default.png", "../images/$nickname/perfil.png");
        echo "<script>
                swal('Registro exitoso', 'Deberá ingresar sus datos', 'success');
              </script>";
    }else{
        echo "Error: " . $createUser . "<br>" . mysqli_error($conexion);
    }
}else{
    echo "<script>
                swal('Usuario en uso', 'Pruebe con otro usuario', 'error');
          </script>";
    //echo "Tu usuario se encuentra en uso.";
    //echo "<a href='../index.html'> Intentalo de nuevo </a></div>";
}

mysqli_close($conexion);

?>

<script src="../js/welcome.js"></script>
</body>
</html>