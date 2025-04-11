<a?php
session_start();
include '../connection/db.php';

// Verificamos si el usuario está logueado y obtenemos su correo
$usuario_logueado = isset($_SESSION['usuario']);
$correo_usuario = $usuario_logueado ? $_SESSION['usuario'] : null;

// Obtener comentarios
$sql = "SELECT name, description FROM comentary ORDER BY idComentary DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El rinconcito de la lectura</title>
    <link rel="stylesheet" href="../css/review.css">
</head>

<body>

    <!-- Header -->
    <header class="encabezado">
        <img src="../img/encabezado.png" alt="El rinconcito de la lectura" class="banner">
    </header>

    <!-- Navigation menu -->
    <nav class="navegacion">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="review.php">Reseñas</a></li>
            <li><a href="#">Podcast</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="login.html">Inicio de Sesión</a></li>
            <li><a href="register.html">Registrate</a></li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="contenido">
        <h2>Reseñas</h2>
        <div class="resenas">
            <div class="libro">
                <img src="../img/anne-frank.jpg" alt="El diario de Ana Frank">
                <p><a href="../php/anaFrank.php">El diario de Ana Frank, de Ana Frank</a></p>
            </div>
            <div class="libro">
                <img src="../img/matrimonio.jpg" alt="Un matrimonio imposible">
                <p>Un matrimonio imposible</p>
            </div>
        </div>

       
        <div class="paginacion">
            <a href="#">Anterior</a> | <a href="#">Siguiente</a>
        </div>
    </main>

</body>

</html>