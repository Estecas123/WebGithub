<?php
$servername = "localhost:3307";
$database = "metodo";
$username = "root";
$password = "";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
$nombrepelicula = $_POST['nombrepelicula'];
$descripcionpelicula = $_POST['descripcionpelicula'];
$generopelicula = $_POST['generopelicula'];
$fechapelicula = $_POST['fechapelicula'];
$duracionpelicula = $_POST['duracionpelicula'];
$imagenpelicula = $_POST['imagenpelicula'];
$videopelicula = $_POST['videopelicula'];

$consulta = "UPDATE metodo SET 
        nombrepelicula = '$nombrepelicula',
        descripcionpelicula = '$descripcionpelicula',
        generopelicula = '$generopelicula',
        fechapelicula = '$fechapelicula',
        duracionpelicula = '$duracionpelicula',
        imagenpelicula = '$imagenpelicula',
        videopelicula = '$videopelicula'
        WHERE id = '$id'";

if (mysqli_query($conexion, $consulta)) {
    echo "Registro actualizado correctamente";
} else {
    echo "Error actualizando registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>