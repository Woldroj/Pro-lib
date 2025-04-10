<?php
//create a connection to the database
$conn = new mysqli("localhost", "root", "", "libreria");

//verify connection
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

//get the form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

//prepare query to avoid SQL injections
$sql = "SELECT * FROM user WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

//check if the user exists
if ($result->num_rows > 0) {
    header("Location: ../html/login.html");
    exit();
} else {
    echo " Usuario o contraseña incorrectos";
}

//close connection
$stmt->close();
$conn->close();
?>