<?php
$servername = "localhost:3307";
$database = "metodo";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Obtener los datos del formulario
$nombrepelicula = $_POST['nombrepelicula'];
$descripcionpelicula = $_POST['descripcionpelicula'];
$generopelicula = $_POST['generopelicula'];
$fechapelicula = $_POST['fechapelicula'];
$duracionpelicula = $_POST['duracionpelicula'];
$imagenpelicula = $_POST['imagenpelicula'];
$videopelicula = $_POST['videopelicula'];

// Consulta SQL para insertar los datos
$sql = "INSERT INTO metodo (nombrepelicula, descripcionpelicula, generopelicula, fechapelicula, duracionpelicula, imagenpelicula, videopelicula) VALUES ('$nombrepelicula', '$descripcionpelicula', '$generopelicula', '$fechapelicula', '$duracionpelicula', '$imagenpelicula', '$videopelicula')";

if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario a Index.html después de la inserción exitosa
    header("Location: Index.html");
    exit; // Importante: asegúrate de salir del script después de la redirección
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>