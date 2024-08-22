<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibiendo</title>
    <center><font size="10"><div class="p-3 mb-2 bg-black text-white" class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">PELISPLUS</div></font></center>
</head>
<body>
    
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

$sql = "SELECT id, nombrepersona, apellidopersona, correopersona, telefonopersona, imagenpersona FROM usuario";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($fila = mysqli_fetch_assoc($result)) {
        echo "id: " . $fila["id"]. " - Nombre: " . $fila["nombrepersona"]. "   " . $fila["apellidopersona"]."  ". $fila["correopersona"]." ". $fila["telefonopersona"]." ". $fila["imagenpersona"]." <br>";
           
    // llamar url y mostrarla en HTML    
          echo ' <img src=" '. $fila["imagen"].' "> ';

    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>