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
    <link rel="stylesheet" href="../css/review.css" />
</head>

<body>

    <!-- Header -->
    <header class="encabezado">
    <div class="banner">
        <img src="../img/Banner.png" alt="Banner" />
      </div>
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
            <!-- Libro 1: Ana Frank -->
            <div class="libro">
                <a href="anaFrank.php">
                    <img src="../img/anne.jpg" alt="El diario de Ana Frank">
                    <p>El diario de Ana Frank, de Ana Frank</p>
                </a>
            </div>

            <!-- Libro 2: Un matrimonio imposible -->
            <div class="libro">
                <a href="matrimonio.php">
                    <img src="../img/matrimonio.jpg" alt="Un matrimonio imposible">
                    <p>Un matrimonio imposible</p>
                </a>
            </div>
            <!-- Libro 3: Un matrimonio imposible -->
            <div class="libro">
                <a href="matrimonio.php">
                    <img src="../img/matrimonio.jpg" alt="Un matrimonio imposible">
                    <p>Un matrimonio imposible</p>
                </a>
            </div>
        </div>

        <div class="paginacion">
            <a href="#">Anterior</a> | <a href="#">Siguiente</a>
        </div>
    </main>

</body>

</html>