<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de datos</title>
</head>
<body>
    <h1>Tipos de datos</h1>
    <p>Tipos de datos escalares (primitivos)</p>
    <ul>
        <li>Booleanos</li>
        <li>Numérico entero</li>
        <li>En coma flotante</li>
        <li>Cadena de caracteres</li>
    </ul>

    <p>Tipos de datos compuestos</p>
    <ul>
        <li>Array</li>
        <li>Objetos</li>
        <li>Callable</li>
        <li>Iterable</li>
    </ul>

    <p>Tipos de datos especiales</p>
    <ul>
        <li>Resource</li>
        <li>NULL</li>
    </ul>

    <h2>Boolean</h2>    
    <p>
        Inicialmente las constantes True y False. Sin embargo, otros tipos de
         datos tienen conversión implícita al tipo booleano.
    </p>
    <ul>
        <li>Numérico entero: 0 y -0; False, cualquier otra cosa es True</li>
        <li>Numérico en coma flotante: 0.0 y -0.0; False, cualquier otra cosa es True</li>
        <li>Un array con 0 elementos; False, con elementos es True</li>
        <li>El tipo especial NULL; False, otro valor es True</li>
        <li>Una variable no definida; False</li>

    </ul>

<?php
$valor_booleano = True;
$edad = 20;
$mayor_edad = $edad > 18;

echo "<p>Mayor de edad es booleano: " . is_bool($mayor_edad) . "</p>";
echo "<p>$edad &gt; 18: $mayor_edad</p>";

$dinero = 0;
if( $dinero ) echo "<p>Soy rico.</p>";
else echo "<p>Estoy arruinado.</p>";

$mi_nombre = "";
if ($mi_nombre) echo "<p>Me llamo $mi_nombre.</p>";
else echo "<p>No tengo nombre.</p>";

?>

<h2>Enteros</h2>
<p>
    Números enteros en PHP son de 32 bits (depende de la plataforma). 
    Pueden expresarse en diferentes notaciones.
</p>

<?php
$numero_entero = 1234;
echo "<p>El número entero es $numero_entero.</p>";

$numero_negativo = -123;
echo "<p>Un número negativo con - delante: $numero_negativo.</p>";

$numero_octal = 0123;
echo "<p>El número 0123 en octal es en decimal: $numero_octal.</p>";

// Para mostrar un número en octal.
echo "<p>El número $numero_octal es en octal " . decoct($numero_octal) . ".</p>";

$numero_hex = 0x8AE;
echo "<p>El número 0x8AE en hexadecimal es en decimal: $numero_hex.</p>";

// Para mostrar un número en hexadecimal.
echo "<p>El número $numero_hex en hexadecimal es " . dechex($numero_hex) . ".</p>";

$numero_binario = 0b110101101;
echo "<p>El número 110101101 en binario es en decimal: $numero_binario.</p>";

// Para mostrar un número en hexadecimal.
echo "<p>El número $numero_binario en binario es " . decbin($numero_binario) . ".</p>";
?>

<h2>Números en punto flotante</h2>
<p>
    El separador decimal es el punto y se pueden expresar número muy grandes o muy pequeños
    mediante la notación científica con base diez.
</p>

<?php
$pi = 3.14159;
echo "<p>El número PI es $pi";
echo "<p>PI con 4 decimales es " . round($pi, 4) . ".</p>";

$inf_int = 7.9e13;
echo "<p>Información que circula en Internet en un día $inf_int.</p>";

$tamaño_virus = 0.2e-9;
echo "<p>Un virus tiene un tamaño de $tamaño_virus.</p>";
?>

<h2>Cadenas de caracteres</h2>
<p>
    Un string o cadena es una serie de caracteres, donde cada caracter equivale a un byte. 
    Esto significa que PHP solo admite 256 caracteres y por ello no ofrece soporte nativo a utf8. 
    Un literal de tipo string se expresa de 4 formas:
</p>

<ul>
    <li>Comillas simples</li>
    <li>Comillas dobles</li>
    <li>Heredoc</li>
    <li>Nowdow</li>
</ul>

<h3>Comillas simples</h3>
<?php
echo '<p>Esto es una cadena sencilla</p>';
echo ' Puedo poner una cadena
en varias líneas
porque la sentencia
no acaba
hasta el punto y coma.</p>';

// Solo admite el caracter de escape \' \\
echo '<p>El mejor pub de la ciudad es O\'Donnel.</p>';
echo '<p>La raíz del disco duro es C:\.</p>';
echo '<p>La raíz del disco duro es C:\\.</p>';

// El salto de línea no se expande.
echo "<p>Esta cadena tiene\nmás de una línea.</p>";

// Las comillas simples no interpolan variables.
$mi_nombre = "Manuel";
echo '<p>Hola, $mi_nombre, ¿cómo estás?</p>';
?>

    <h3>Comillas dobles</h3>
    <p>
        La forma habitual de expresar cadenas de caracteres, ya que
        expande los caracteres de escape y las variables.
    </p>

<?php
// Las cadenas son tipos primitivos, no objetos, por lo que no tienen métodos.
$cadena = "Esto es una cadena con comillas dobles";
if (is_object($cadena)) echo "<p>Las cadenas en PHP son objetos.</p>";
else echo "<p>LAS CADENAS EN PHP NO SON OBJETOS.</p>";
?>

    <h3>Cadenas HEREDOC</h3>
    <p>
        Es una cadena muy larga que comienza con <<< le sigue un identificador y 
        justo después un salto de línea. A continuación se escribe la cadena con los 
        saltos de línea que necesitemos. Podemos interpolar variables y poner caracteres 
        de escape. Para finalizar hay que hacer un salto de línea y volver a poner el identificador.
    </p>

<?php
$cadena_hd = <<<HD
<p>Esto es una cadena
heredoc que respeta los saltos
de línea, le puedo poner
variables como $mi_nombre y
además secuencias de escape. El
identificador no necesita \$ y
tampoco usamos comillas dobles.
Simplemente la escribimos y acabamos con un salto
de línea más el identificador.</p>
HD;

echo $cadena_hd;
?>

    <h3>Cadena NOWDOC</h3>
    <p>
        La cadena Nowdoc es como Heredoc con comillas simpes. No se interpolan variables ni se 
        reconocen caracteres de escape como \ o '. Sí se respetan los saltos de línea.
    </p>

<?php
$cadena_nd = <<<'ND'
<p>Esto es una cadena Nowdoc
y el salto de línea sí lo respeta.
No puedo interpolar variables y sólo reconoce
caracteres de escape para \' y \\.</p>
ND;

echo $cadena_nd;
?>

    <h2>Conversión de tipos de datos</h2>
    <p>
        Hay dos tipos de conversiones: implícitas y explícitas. Las primeras ocurren
        cuando en una expresión hay operandos de diferente tipo. PHP convierte algunos
        de ellos para evaluar la expresión.
    </p>

<?php
$cadena = '25';
$numero = 8;
$booleano = True;
$resultado = $cadena + $numero + $booleano;
echo "<p>El resultado es $resultado.</p>";
?>

    <p>
        ¡¡¡Importante!!! Cuando se hace una conversión implícita sólo afecta al operando 
        pero no a la variable. La conversión de cadena a entero solamente para evaluar
        la expresión, pero $cadena sigue siendo de tipo string.
    </p>

<?php
$flotante = 3.5;
$resultado = $cadena + $flotante + $numero + $booleano;
echo "<p>El resultado ahora es $resultado.</p>";

$cadena = "25 marranos dan mucho provecho";
$resultado = $numero + $cadena;
echo "<p>El resultado es $resultado.</p>";
?>

    <p>
        Las conversiones explícitas se conocen como casting o moldeo y se hacen
        precediendo la expresión con el tipo de datos a convertir entre paréntesis.
    </p>

<?php
    // Si quiero convertir a un entero ->   (int)expresión
    // Si quiero convertir a float ->       (float)expresión
    // Si quiero convertir a string ->      (string)expresión

echo "<p>Conversiones a entero.</p>";
$valor_booleano = True;
$valor_convertido = (int)$valor_booleano;
echo "<p>El valor convertido a entero es $valor_convertido.</p>";
$valor_float = 3.14159;
$valor_convertido = (int)$valor_float;
echo "<p>El valor convertido a entero es $valor_convertido.</p>";
$valor_cadena = "123";
$valor_convertido = (int)$valor_cadena;
echo "<p>El valor convertido a entero es $valor_convertido.</p>";

?>

</body>
</html>