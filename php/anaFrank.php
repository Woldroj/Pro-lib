<?php
session_start();
include '../connection/db.php';

// ID del libro (Ana Frank)
$idReview = 1;

// Verificamos si el usuario está logueado
$usuario_logueado = isset($_SESSION['usuario']);
$nombre_usuario = $usuario_logueado ? $_SESSION['usuario'] : null;

// Obtener comentarios SOLO del libro Ana Frank
$stmt = $conn->prepare("SELECT name, description FROM comentary WHERE idReview = ? ORDER BY idComentary DESC");
$stmt->bind_param("i", $idReview);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El diario de Ana Frank</title>
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
            <li><a href="../html/login.html">Inicio de Sesión</a></li>
            <li><a href="../html/register.html">Registrate</a></li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="contenido">
        <h2>El diario de Ana Frank</h2>
        <div class="resenas">
            <div class="libro">
                <img src="../img/anne-frank.jpg" alt="El diario de Ana Frank">
                <p>El diario de Ana Frank, de Ana Frank</p>
            </div>
        </div>
        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> 
            Totam quasi, a, consequatur, repellat assumenda facilis dignissimos<br>
            exercitationem labore et voluptas autem ab ducimus in. Quas pariatur<br>
            ratione amet perferendis corrupti eum nostrum, exercitationem<br>
            voluptates expedita ullam nihil explicabo placeat, doloribus eos<br>
            similique earum praesentium illo, voluptatum delectus asperiores minima omnis.</p>
        </div>

        <!-- Comentarios -->
        <section class="comentarios">
            <h3>Comentarios</h3>

            <?php if ($usuario_logueado): ?>
                <form action="../connection/controller.php" method="POST">
                    <input type="hidden" name="action" value="comment">
                    <input type="hidden" name="idReview" value="<?= $idReview ?>">
                    <textarea name="comentario" rows="4" placeholder="Escribí tu comentario..." required></textarea>
                    <br>
                    <button type="submit">Enviar comentario</button>
                </form>
            <?php else: ?>
                <p>Para comentar, <a href="../html/login.html">Iniciar sesión</a> o <a href="../html/register.html">registrate</a>.</p>
            <?php endif; ?>

            <div class="lista-comentarios">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="comentario">
                            <p><strong><?= htmlspecialchars($row['name']) ?></strong>: <?= htmlspecialchars($row['description']) ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Aún no hay comentarios para este libro.</p>
                <?php endif; ?>
            </div>
        </section>

        <div class="paginacion">
            <a href="../php/review.php">Volver</a> | <a href="../php/matrimonio.php">Siguiente</a>
        </div>
    </main>
</body>
</html>
