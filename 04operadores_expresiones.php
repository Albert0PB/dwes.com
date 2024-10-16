<?php
define("PI", 3.14159);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores y expresiones</title>
</head>
<body>
<h1>Expresiones, operadores y operandos</h1>
    <p>
        Una expresión es una combinación de operandos y operadores que arroja
        un resultado. Tiene tipo de datos, que depende del tipo de datos de sus 
        operandos y de la operación realizada.
        Un operador es un símbolo formado por uno, dos o tres caracteres que
        denota una operación. Los operadores pueden ser unarios (un operando), 
        binarios (utilizan dos operandos) o ternarios (tres operandos).
        Un operando es una expresión en sí misma, siendo la más simple un literal o 
        una variable, pero también puede ser un valor devuelto por una función 
        o el resultado de otra expresión. Las operaciones de una expresión no se 
        ejecutan a la vez sino en orden según la precedencia y asociatividad de los 
        operadores. Esta se puede alterar a conveniencia.
    </p>

    <h2>Operadores</h2>
    <h3>Asignación</h3>

<?php
    // El operador de asignación es =

$numero = 45;
$resultado = $numero + 5 - 29;
$sin_valor = NULL;
?>

    <h3>Operadores aritméticos</h3>
<?php
    /*
    Binarios
        + Suma
        - Resta
        * Multiplicación
        / División
        % Módulo (resto de la división entera)
        ** Exponenciación

    Unarios
        + Conversión a entero (conversión de string a integer)
        - El opuesto
    */

$numero_cadena = "35";
$numero_entero = +$numero_cadena;
echo "La variable \$numero_entero vale $numero_entero y es de tipo " . gettype($numero_entero) . ".<br>";
?>

    <h2>Asignación aumentada</h2>

<?php
    /*
        ++ Incremento
        -- Decremento
        +=
        -=
        *=
        /=
        %=
    */

$numero = 4;
$numero++;          // Equivalente a $numero = $numero + 1
++$numero;          // Equivalente a $numero = $numero + 1

/*
La diferencia radica en que usando $numero++ (postincremento), primero se utiliza
el valor de la variable en el ámbito mayor y después se realiza el incremento; usando
++$numero (preincremento), primero se realiza el incremento y después se resuelve
la operación de ámbito mayor
*/

$numero = 10;
$resultado = $numero++ * 2;     // $resultado = $numero * 2; $numero = $numero + 1;
echo "El resultado es $resultado y el número es $numero<br>.";

$numero = 10;
$resultado = ++$numero * 2;     // $numero = $numero + 1; $resultado = $numero * 2;
echo "El resultado es $resultado y el número es $numero<br>.";
?>


    <h2>Operadores relacionales</h2>

<?php
    /*
        ==      Igual
        ===     Idéntico a
        !=      Distinto
        !==     Distinto valor o distinto tipo
        >       Mayor que
        <       Menor que
        >=      Mayor o igual
        <=      Menor o igual
        <=>     Nave espacial
    */

$n1 = 5;
$cadena = "5";
$n2 = 8;

$resultado = $n1 == $n2;
echo "¿Es n1 igual a n2?: " . (int)$resultado . "<br>";

$resultado = $n1 == $cadena;
echo "¿Es n1 igual que cadena?: " . (int)$resultado . "<br>";

$resultado = $n1 === $cadena;
echo "¿Es n1 idéntico a cadena?: " . (int)$resultado . "<br>";

$resultado = $n1 != $n2;
echo "¿Es n1 distinto de n2?: " . (int)$resultado . "<br>";

$resultado = $n1 != $cadena;
echo "¿Es n1 distinto de cadena?: " . (int)$resultado . "<br>";

$resultado = $n1 !== $cadena;
echo "¿Es n1 distinto de cadena?: " . (int)$resultado . "<br>";


    /*
     Nave espacial
        - Si n1 es mayor que n2 devuelve 1
        - Si n1 es igual que n2 devuelve 0
        - Si n1 es menor que n2 devuelve -1
     Es emplea para evitar:
            if( $n1 < $n2 ) {
            } elseif ($n1 == $n2) {
            }
            else{
            }
    */

$resultado = $n1 <=> $n2;
echo "Es n1 menor, igual o mayor que n2: $resultado<br>";

/* 
Con cadenas
La comparación se realiza con el primer caracter diferente, siguiendo
el orden del caracter en el sistema ASCII.
*/

$nombre1 = "Zacarías";
$nombre2 = "adela";
$resultado = $nombre1 > $nombre2;
echo "El resultado es " . (int)$resultado . "<br>";

$nombre1 = "Mario";
$nombre2 = "MariA";
$resultado = $nombre1 < $nombre2;
echo "El resultado es " . (int)$resultado . "<br>";

/*
Para evitar errores es recomendable pasar las cadenas a mayúsuclas o minúsculas.
*/

$nombre1 = "maria";
$nombre2 = "Maria";
$resultado = $nombre1 === strtolower($nombre2);
echo "El resultado es " . (int)$resultado . "<br>";
?>

    <h2>Operadores lógicos</h2>

<?php
    // AND          Conjunción lógica
    // OR           Disyunción lógica
    // XOR          OR exclusivo
    // !            NOT
    // &&           AND con precedencia
    //              OR con precedencia

$n1 = 9;
$n2 = 5;
$n3 = 10;
$resultado = $n1 == $n2 OR $n2 > $n3;
$resultado = $n1 == $n2 AND $n2 < $n3;

echo "El resultado es " . (int)$resultado . "<br>";

$resultado = $n1 == 9 OR $n2 < $n1 AND $n3 > 10;
echo "El resultado es " . (int)$resultado . "<br>";

$resultado = ($n1 == 9 OR $n2 < $n1) AND $n3 > 10;
echo "El resultado es " . (int)$resultado . "<br>";

$resultado = ($n1 == 9 OR $n2 < $n1) && $n3 > 10;
echo "El resultado es " . (int)$resultado . "<br>";

/*
    ¡¡¡ATENCIÓN!!!

    El operador de asignación tiene precedencia sobre las expresiones relacionales.
    Donde dice:
            $resultado = $n1 == 9 OR $n2 < $n1 AND $n3 > 10;

    SOLO SE ESTÁ EVALUANDO $n1 == 9 (true) YA QUE LA ASIGNACIÓN TIENE PRECEDENCIA SOBRE EL SIGUIENTE OR.
            $resultado = $n1 == 9 = true;

    PARA SOLUCIONARLO HABRÍA QUE SUSTITUIR OR POR || Y AND POR && O BIEN UTILIZAR PARÉNTESIS:
            $resultado = ($n1 == 9 OR $n2 < $n1 AND $n3 > 10);
            $resultado = $n1 == 9 || $n2 < $n1 && $n3 > 10;
            
*/


?>

</body>
</html>