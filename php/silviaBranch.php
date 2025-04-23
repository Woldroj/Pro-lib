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
    <title>El último verano de Silvia Blanch</title>
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
        <h2>El último verano de Silvia Blanch, de Lorena Franco</h2>
        <div class="resenas">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="../img/silvia.jpg" alt="Portada Silvia Blanch" />
                    </div>
                    <div class="flip-card-back">
                        <img src="../img/contraportadaSilvia.jpg" alt="Contraportada Silvia Blanch" />
                    </div>
                </div>
            </div>

        </div>
        <div class="cuadro-resena">
            <p>
                Con una sinopsis trepidante y un ritmo ágil y elegante, encontramos una historia escalofriante, que
                promete sorprender al lector en multitud de ocasiones. <br> Y es que la pluma de Lorena Franco es única
                y promete enganchar al lector de principio a fin. Y, ¿para qué negarlo? ¿cuántos thrillers han logrado
                volver loco al lector?
            </p>

            <p>
                El último verano de Silvia Blanch consta de 318 páginas. Comencé a leer casi cien páginas por día, ¿la
                razón?, llegar a un punto de la trama que provocaba al lector a quedarse una noche en vela leyendo. Los
                capítulos están titulados, por lo que no sabemos cuál es el número exacto. Lo que sí sabemos, es que la
                extensión de los capítulos está entre 2 y 6 páginas. Dependiendo de la voz que narre la historia.
            </p>

            <p>
                Es una trama contada a varias voces: Alejandra Duarte, Silvia Blanch y Jan Blanch, entre otros. Nos
                encontramos
                en el pueblo de Montseny. Hace un año exacto, desapareció Silvia Blanch. Alejandra Duarte, periodista de
                Barcelona, es seleccionada para redactar un artículo en dicho pueblo, entrevistando así a sus
                familiares y gente de la zona que conoció a la desaparecida Silvia. En este misterioso pueblo, todo el
                mundo miente y esconde algo.
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
            <a href="../php/review.php">Volver</a> | <a href="../php/musicaHuesos.php">Siguiente</a>
        </div>
    </main>
</body>

</html>