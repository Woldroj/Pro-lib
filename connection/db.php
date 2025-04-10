<<<<<<< HEAD
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
=======
<?php
$host = 'localhost';
$dbname = 'libreria';
$username = 'root';
$password = '';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
>>>>>>> origin/monica
