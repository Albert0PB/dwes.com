<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/funciones.php");
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
<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {


$nombre = $_POST["nombre"];
$email = $_POST["email"];
$clave = $_POST["clave"];
$linkedin = $_POST["linkedin"];

$fecha_disponible = $_POST["fecha_disponible"];
$hora_entrevista = $_POST["hora_entrevista"];
$salario = $_POST["salario"];

$areas = $_POST['areas'];   // Esto es un array.
$modalidad = $_POST['modalidad'];
$tipo_contrato = $_POST['tipo_contrato'];
$habilidades = $_POST['habilidades'];   // Esto también es un array.
$comentarios = $_POST['comentarios'];
$operacion = $_POST['operacion'];


echo "Nombre: $nombre<br>";
echo "Email: $email<br>";
echo "Clave: $clave<br>";
echo "URL LinkedIn: $linkedin<br>";

echo "Fecha de disponibilidad: $fecha_disponible<br>";
echo "Hora entrevista: $hora_entrevista<br>";
echo "Expectativa de salario: $salario<br>";

$areas_interes = [
    "ds" => "Desarrollo Web",
    "dg" => "Diseño gráfico",
    "mk" => "Marketing",
    "rh" => "Recursos Humanos"
];
echo "Áreas de interés: ";
foreach( $areas as $area ) {
    if( array_key_exists($area, $areas_interes) )
        echo "{$areas_interes[$area]} ";
};

echo "<br";
echo "Modalidad: $modalidad<br>";
echo "Tipo de contrato: $tipo_contrato<br>";

$habilidades_disponibles = [
    "js" => "Javascript",
    "py" => "Python", 
    "uxui" => "Diseño UX/UI",
    "seo" => "SEO",
    "gp" => "Gestión de proyectos"
];

echo "Habilidades: ";
foreach( $habilidades as $habilidad ) {
    if( array_key_exists($habilidad, $habilidades_disponibles) )
        echo "{$habilidades_disponibles[$habilidad]} ";
};
echo "<br>";
echo "Comentarios: $comentarios<br>";
echo "Operación: $operacion<br>";
}
else{
    echo "<h3>Error. No se han enviado datos.</h3>";
};

?>


</body>
</html>