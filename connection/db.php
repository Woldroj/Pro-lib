<?php
// db.php
$host = "localhost";
$user = "root";
$pass = ""; // cambia si tienes contraseña
$dbname = "libreria";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
