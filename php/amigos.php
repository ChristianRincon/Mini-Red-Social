<?php
    include("../php/conexion.php");
    include("../php/validarSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <title>Mis amigos</title>
</head>
<body>
    <hr id="ancla-menu">
    <header>
        <div id="logo">
            <img src="../images/logo.png" alt="logo">
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

    <section id="recuadros">
        <h2 class="tituloBuscar"> Mis amigos </h2>

        <?php
        $queryAmigos = "SELECT * FROM persona p WHERE p.Nickname in 
        (SELECT a.Nickname2 FROM amistad a WHERE a.Nickname1 ='$nickname')";

        $prepareQueryAmigos = mysqli_query($conexion, $queryAmigos);

        while($fila=mysqli_fetch_array($prepareQueryAmigos)){

        ?>
            <section class="recuadro">
            <a href="<?php echo "../php/perfil.php?nickname=".$fila['Nickname'] ?>">
                <img src="<?php echo $fila['FotoPerfil'] ?>" alt="Imagen" height="150" class="perfilAmigos">
            </a>
                <h2><?php echo $fila['Nombre'] ." ". $fila['Apellido'] ?></h2>
                <a href="<?php echo "../php/perfil.php?nickname=".$fila['Nickname'] ?>" class="boton">Ver perfil</a><br><br>
            </section>
        <?php
            }         
        ?>
    </section><br><br>

    <footer>
        <p>Copyright © 2022 - Sociality</p>
    </footer>

    <script src="../js/main.js"></script>
    
</body>
</html>