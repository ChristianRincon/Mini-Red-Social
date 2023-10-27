<?php

    include("../php/conexion.php");
    $nicknameAmigo = $_GET['nickname'];

    $queryBorrar = "DELETE FROM amistad WHERE Nickname2 = '$nicknameAmigo' ";
    $prepareQueryAmigos = mysqli_query($conexion, $queryBorrar);
    
    if ($prepareQueryAmigos) {
        header("Location: amigos.php");
        exit;
    }
    
?>