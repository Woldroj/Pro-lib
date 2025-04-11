<?php
session_start();
include 'db.php'; // Incluye la conexión con $conn

$action = $_POST['action'] ?? '';

// ========================
// LOGIN
// ========================
if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "Por favor, completá todos los campos.";
        exit();
    }

    $sql = "SELECT name FROM user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['name']; // Guardamos el nombre
        header("Location: ../php/review.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
        exit();
    }
}

// ========================
// REGISTER
// ========================
if ($action === 'register') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Verificamos si ya existe el correo
    $check = $conn->prepare("SELECT idUser FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "El usuario ya está registrado.";
        exit();
    }
    
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['usuario'] = $name;
        header("Location: ../php/review.php");
        exit();
    } else {
        echo "Error al registrar usuario: " . $conn->error;
        exit();
    }
}

// ========================
// COMENTARIO
// ========================
if ($action === 'comment') {
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../html/login.html");
        exit();
    }

    $nombre = $_SESSION['usuario'];
    $comentario = trim($_POST['comentario'] ?? '');
    $idReview = intval($_POST['idReview'] ?? 0);

    if ($comentario === '' || $idReview === 0) {
        header("Location: ../php/review.php?error=Comentario vacío o libro no válido");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO comentary (name, description, idReview) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $comentario, $idReview);
    $stmt->execute();
    $stmt->close();

    // Redirigir de vuelta al libro correspondiente
    if ($idReview == 1) {
        header("Location: ../php/anaFrank.php");
    } elseif ($idReview == 2) {
        header("Location: ../php/matrimonio.php");
    } else {
        header("Location: ../php/review.php");
    }
    exit();
}


// ========================
// CONTACT
// ========================

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //insertar menssaje 
    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../html/bienvenido.html");
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }

    $stmt->close();
}
?>

