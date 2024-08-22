<?php
$servername = "localhost:3307";
$database = "usuario";
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
$nombrepersona = $_POST['nombrepersona'];
$apellidopersona = $_POST['apellidopersona'];
$correopersona = $_POST['correopersona'];
$telefonopersona = $_POST['telefonopersona'];
$imagenpersona = $_POST['imagenpersona'];

// Consulta SQL para insertar los datos
$sql = "INSERT INTO usuario (nombrepersona, apellidopersona, correopersona, telefonopersona, imagenpersona) VALUES ('$nombrepersona', '$apellidopersona', '$correopersona', '$telefonopersona', '$imagenpersona')";

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