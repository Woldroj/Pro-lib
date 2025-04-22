<?php
session_start();
include '../connection/db.php';

// ID del libro: "Un matrimonio imposible"
$idReview = 2;

// Verificamos si el usuario está logueado
$usuario_logueado = isset($_SESSION['usuario']);
$nombre_usuario = $usuario_logueado ? $_SESSION['usuario'] : null;

// Obtener comentarios de este libro
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
    <title>Un matrimonio imposible</title>
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/review.css">
</head>

<body>

    <!-- Header -->
    <header class="encabezado">
        <div class="banner">
            <img src="../img/Banner.png" alt="Banner" />
        </div>
    </header>

    <!-- Navigation menu -->
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
        <h2>La música de los huesos, de Nagore Suárez</h2>

        <div class="resenas">
            <div class="libro">
                <img src="../img/musica.jpg" alt="La musica de los huesos">
            </div>
        </div>

        <div>
            <p>Primer libro que tengo el placer de leer de Nagore Suárez. Lo cierto es que no tenía ninguna
                expectativa, había leído la sinopsis de pasada y necesitaba saber qué escondían sus páginas. Imagina que
                vamos de vacaciones a nuestra segunda residencia, la cual están llevando a cabo una pequeña obra. Nada
                puede salir mal. ¿O sí? Anne, la nieta de la dueña decide pasar las vacaciones en la Ribera Navarra. Y
                ahora viene la gran pregunta, ¿qué puede salir mal? Durante las obras se encuentran unos huesos. No es
                ninguna sorpresa cuando la nieta de la dueña les relata que hace unos años enterraron al perro de un
                amigo. Pero esos huesos no son de perro. Y aquí comienza la verdadera historia.

                He de reconocer que me sorprendía de la rapidez de la lectura. En un día pude leerme más de cien páginas
                sin darme cuenta. Imaginad el enganche. La pluma de Suárez es pura magia y elegancia. Es la gran promesa
                de la novela negra y de intriga. Diría que una de las mejores. Y este solo es su primer libro. Imaginad
                todo lo que la autora puede dar por cada historia que publique y cada oportunidad que le den. Podría
                consagrarse como la reina del thriller.
            </p>
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
                <p>Para comentar, <a href="../html/login.html">Iniciar sesión</a> o <a
                        href="../html/register.html">registrate</a>.</p>
            <?php endif; ?>

            <div class="lista-comentarios">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="comentario">
                            <p><strong><?= htmlspecialchars($row['name']) ?></strong>:
                                <?= htmlspecialchars($row['description']) ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Aún no hay comentarios para este libro.</p>
                <?php endif; ?>
            </div>
        </section>

        <div class="paginacion">
            <a href="anaFrank.php">Anterior</a> | <a href="silviaBranch.php">Siguiente</a>
        </div>
    </main>

</body>

</html>