<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elementos del lenguaje</title>
</head>
<body>
    <h1>Elementos del lenguaje</h1>


    <h2>Entrada y salida</h2>
    <p>
        La entrada de datos en PHP es con un formulario o con un enlace.
        La salida de datos se produce con la función "echo", y su forma abreviada
        y la función "print". Además, para la salida de datos con formato, tenemos
        la función "printf".
    </p>

    <h3>Función echo</h3>
<?php
echo "<p>La función 'echo' emite el resultado de una expresión a la salida. 
Se puede usar como función o como construcción del lenguaje (sin paréntesis).</p>";

$nombre = "Juan";
echo "<p>Hola, ", $nombre, ", ¿cómo estás?</p>";
/*
echo("<p>Hola, ", $nombre, ", ¿cómo estás?</p>"); no funciona. 'Echo' sólo admite más de un argumento 
como construcción de lenguaje, pero no como función
*/

$nombre = "José";
$apellidos = "Gómez";

echo "<p>Mi nombre es $nombre $apellidos.</p>";

echo "<p>Mi nombre es " . $nombre . " y mi apellido es " . $apellidos . ".</p>"; 

echo "<p>Uno más dos son ", 1 + 2, " y tiene que salir 3.</p>";

// Es más habitual utilizar el operador punto
echo "<p>Uno más dos son " . 1 + 2 . " y tiene que salir 3.</p>";

echo "<h4>Forma abreviada de 'echo'.</h4>";

echo "<p>Cuando hay que enviar así el resultado de una operación pequeña, 
disponemos de una forma abreviada de echo que permite intercalarse en el 
código HTML con menos esfuerzo.</p>";

$tiene_portatil = True;

?>
        <!-- La forma abreviada va dentro del HTML -->
        <p>Mi nombre es <?= $nombre . " " . $apellidos?></p>

        <!-- Uso muy habitual. Valores por defecto en controles de formulario. -->
        <input type="text" name="nombre" size=15 value="<?= $nombre?>"></input>
        <br>
        <input type="checkbox" name="portatil" <?= $tiene_portatil ? 'checked':''?>>¿Tienes portátil?</input>

        <!-- Consejo: en PHP, utilizar comillas dobles. En HTML, usar comillas simples. --> 
<?php
echo "<br><input type='text' name='apellidos' size=50></input>";
?>

    <h3>Función print</h3>
    <p>Funciona igual que 'echo'</p>

<?php
print "<p>Esto es una cadena\nque tiene más de una línea\ny se envían a la salida.</p>";
print "<p>Mi nombre es $nombre $apellidos.";

?>

    <h3>Función printf</h3>
<?php
$pi = 3.14159;
$radio = 3;
$circunferencia = 2 * $pi * $radio;

printf("<p>La circunferencia de radio %d es %.2f.</p>", $radio, $circunferencia);
?>

</body>
</html>