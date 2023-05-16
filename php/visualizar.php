<?php
    include("../php/conexion.php");
    include("../php/validarSesion.php");
    $visual = $_GET['visual'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <title> Mis fotos </title>
</head>
<body>
    <hr id="ancla-menu">
    <header>
        <div id="logo">
            <img src="../images/logo.png" alt="Logo">
        </div>
        <nav class="menu">
            <ul>
                <li>
                    <button class="switch" id="switch">
                        <span><i class="fas fa-sun"></i></span>
                        <span><i class="fas fa-moon"></i></span>
                    </button>
                </li>
                <li><a href="../php/miPerfil.php"> Mi perfil</a></li>
                <li><a href="../php/amigos.php"> Mis amigos</a></li>
                <li><a href="../php/fotos.php"> Mis fotos</a></li>
                <li><a href="../php/buscar.php"> Buscar Amigos</a></li>
                <li><a href="../php/cerrarSesion.php"> Cerrar Sesión </a></li>
            </ul>              
        </nav>
    </header><br><br>
    
    <a href="#ancla-menu"><img src="../images/arriba.png" alt="logo flecha" id="logo_flecha" title="Click para Subir"></a>

    <video src="../video/claro_web.mp4" autoplay="true" muted="true" loop="true" id="video"></video>

<?php
    $queryFotos = "SELECT NombreFoto FROM fotos f WHERE f.Nickname='$nickname' AND NombreFoto = '$visual' ";
    $executeQueryFotos = mysqli_query($conexion, $queryFotos);

    if($fila=mysqli_fetch_array($executeQueryFotos)){

?>
        <section id="visualizar">         
                <img src= <?php echo $fila['NombreFoto'] ?> alt="Fotos" >       
        </section><br><br>

        <form action="<?php echo "../php/borrarImagen.php?visual=".$fila['NombreFoto'] ?>" id="modificarFoto" method="post">            
            <div id="opciones-visualizar">
                <input type="submit" name="enviar" class="botonBorrar" value="Borrar Imagen">
                <a href=<?php echo $fila['NombreFoto'] ?> class="botonDescargar" download>Descargar Imagen</a>
                <a href="../php/fotos.php" class="botonVolver">Volver</a>
            </div>
        </form><br><br><br>
<?php
    }
?>

    <footer>
        <p>Copyright © 2022 - Sociality</p>
    </footer>

    <script src="../js/main.js"></script>


</body>
</html>
