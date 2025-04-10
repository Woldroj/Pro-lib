<?php
// controller.php
include 'db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // En entorno real, usar password_hash()

    // Verificar si ya existe el correo (opcional pero útil)
    $check = $conn->prepare("SELECT idUser FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "El usuario ya está registrado.";
        exit;
    }

    // Insertar nuevo usuario
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../html/index.html"); // Cambia a la página que quieras
        exit;
    } else {
        echo "Usuario no registrado. Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

