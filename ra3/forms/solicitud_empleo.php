<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/funciones.php");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$clave = $_POST["clave"];
$linkedin = $_POST["linkedin"];

$fecha_disponibilidad = $_POST["fechadisponibilidad"];
$hora_entrevista = $_POST["hora_entrevista"];
$salario = $_POST["salario"];

$areas = $_POST['areas'];   // Esto es un array.


echo "Nombre: $nombre<br>";
echo "Email: $email<br>";
echo "Clave: $clave<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/general.css">
    <title>Formularios</title>
</head>
<body>
    <h1>Proceso de formulario 1</h1>



</body>
</html>