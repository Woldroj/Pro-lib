<?php
session_start();
include '../connection/db.php';

// Verificamos si el usuario está logueado y obtenemos su nombre
$usuario_logueado = isset($_SESSION['usuario']);
$nombre_usuario = $usuario_logueado ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El rinconcito de la lectura</title>
    <link rel="stylesheet" href="../css/init.css" />
    <link rel="stylesheet" href="../css/review.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <!-- Header -->
    <header class="encabezado">
        <img src="../img/Banner.png" alt="El rinconcito de la lectura" class="banner">
    </header>

    <!-- Menu -->
    <div class="menu">
        <nav class="navegacion">
            <ul>
                <li><a href="../html/init.html">Inicio</a></li>
                <li><a href="review.php">Reseñas</a></li>
                <li><a href="../html/podcast.html">Podcast</a></li>
                <li><a href="../html/formContact.html">Contacto</a></li>
                <li><a href="../html/login.html">Inicio de sesión</a></li>
                <li><a href="../html/register.html">Registrate</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="contenido">
        <h2>Reseñas disponibles</h2>

        <div class="resenas">
            <!-- Libro 1: silvia branch -->
            <div class="libro">
                <a href="silviaBranch.php">
                    <img src="../img/silvia.jpg" alt="el ultimo verano de silvia blanch">
                </a>
            </div>

            <!-- book 2: the music of the bones -->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/musica.jpg" alt="la musica de los huesos">
                </a>
            </div>
            <!-- book 3: escrayber -->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/escrayber.jpg" alt="escrayber">
                </a>
            </div>
            <!-- book 4: witches-->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/brujas.jpg" alt="noche de brujas">
                </a>
            </div>
            <!-- book 5: an impossible marriage -->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/matrimonio.jpg" alt="Escrayber">
                </a>
            </div>
            <!-- book 6: anne frank -->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/anne.jpg" alt="ana frank">
                </a>
            </div>
            <!-- book 7: penance -->
            <div class="libro">
                <a href="musicaHuesos.php" alt="penitencia">
                    <img src="../img/penitencia.jpg" alt="penitencia">
                </a>
            </div>
            <!-- book 8: what have you done? -->
            <div class="libro">
                <a href="musicaHuesos.php">
                    <img src="../img/shari.jpg" alt="pero que has hecho">
                </a>
            </div>
        </div>

        <div class="paginacion">
            <a href="#">Anterior</a> | <a href="#">Siguiente</a>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>
            &copy; 2025 El Rinconcito de la Lectura - Todos los derechos reservados
        </p>
        <!-- Redes sociales -->
        <div class="rrss">
            <a href="https://www.instagram.com" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.tiktok.com" target="_blank">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://www.telegram.org" target="_blank">
                <i class="fab fa-telegram-plane"></i>
            </a>
        </div>
    </footer>
</body>

</html>