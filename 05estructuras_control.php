<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de control</title>
</head>
<body>
    <h1>Estructuras de control</h1>
    <h2>Sentencias</h2>
    <p>
	Las sentencias simples acaban en ; pudiendo haber más de una en la misma línea
    </p>

<?php
$numero = 3; echo "El número es $numero<br>"; $numero += 3; print "Ahora es $numero<br>";
?>
    <p>
	Un bloque de sentencias es un conjunto de sentencias encerradas entre llaves.
	No suelen ir solas, sino formar parte de una estructura de control.
	Además, se pueden anidar.
    </p>

<?php
{
    $numero = 5;
    echo "El número es $numero<br>";
    $numero -= 2;
    echo "Ahora es $numero<br>";
    {
	$numero = 8;
	$numero *= 2;
	echo "El resultado es $numero<br>";
    }

    echo "El resultado es $numero<br>";
}
?>

    <h2>Estructuras de control simple</h2>

<?php
    /*
     * if( expresión ) sentencia;
     * */
$numero = 4;
if( $numero >= 4 ) echo "El número es mayor o igual a cuatro<br>";
if( $numero === 4 and $numero % 2 == 0 ) 
    echo "El número es idéntico a 4 y su resto al dividir entre 2 es 0<br>";
?>

    <h2>Estructuras de control compuesta</h2>

<?php
$n1 = 9;
$n2 = 5;
$n3 = 10;

if ( ($n1 == 9 OR $n2 < $n1) AND $n3 > 10) {
    echo "El resultado es True<br>";
} else {
    echo "El resultado es False<br>";
};

/*
    Se puede omitir el uso de bloques sustituyéndolos por identación cuando sólo haya 
    una lína a ejecutar en la vertiente. Es mejor usar sólo llaves salvo situaciones muy simples.
*/

$edad = 22;
if( $edad >= 18 )
    echo "Puedes ver la película.<br>";
else
    echo "No puedes ver la película para mayores.<br>";


    // Uso de código HTML en las estructuras de control.

if ($edad > 18 AND $edad < 65 ) { ?>
    <h3>Servicios del gimnasio disponibles para la edad <?= $edad?>: </h3>
    <ul>
        <li>Spinning</li>
        <li>Boxeo</li>
        <li>Zumba</li>
    </ul>
<?php
} else { ?>
    <h3>Servicios para jubilados o menores de 18</h3>
    <ul>
        <li>Taichi</li>
        <li>Pilates</li>
        <li>Yoga</li>
    </ul>

<?php
};

    // Se puede hacer lo mismo con las cadenas HEREDOC.

$tipo_carnet = "C1";

if ( $tipo_carnet == "C1" )
    echo <<<CARNET_C1
<h2>Documentación para obtener el carnet $tipo_carnet</h2>
<ul>
    <li>Fotocopia del DNI</li>
    <li>Certificado de penales</li>
    <li>Carnet B2</li>
</ul>
CARNET_C1;
?>

    <h2>If-else anidado</h2>
<?php
$nota = 6.5;

if( $nota >= 0 AND $nota < 5 ) {
    echo "Suspenso.<br>";
}
else {
    if( $nota < 6 ) {
        echo "Aprobado.<br>";
    }
    else {
        if( $nota < 7 ) {
            echo "Bien.<br>";
        }
        else {
            if( $nota < 9 ) {
                echo "Notable.<br>";
            }
            else {
                if( $nota <= 10 ) {
                    echo "Sobresaliente.<br>";
                }
                else {
                    echo "El valor de la nota no es correcto.<br>";
                };
            };
        };
    };
};

if ($nota >= 0 AND $nota < 5) {
    echo "Suspenso";
}
elseif ($nota < 6) {
    echo "Aprobado";
}
elseif ($nota < 7) {
    echo "Bien";
}
elseif ($nota < 9) {
    echo "Notable";
}
elseif ($nota <= 10) {
    echo "Sobresaliente";
}
else {
    echo "El valor de la nota no es correcto";
}
echo "<br>";
?>

    <h2>Estructura condicional múltiple switch</h2>

<?php

    // Estructura condicional múltiple switch.

$nota = 7;

switch( $nota ) {
    case 1:
    case 2: 
    case 3:
    case 4:
        echo "Suspenso";
        break;
    case 5:
        echo "Aprobado";
        break;
    case 6:
        echo "Bien";
        break;
    case 7:
    case 8:
        echo "Notable";
        break;
    case 9:
    case 10:
        echo "Sobresaliente";
        break;
    default:
        echo "La nota no es correcta";
};
?>

    <h2>Expresión match</h2>

<?php


    // Expresión match

$calificacion = match($nota) {
    0, 1,2,3,4      => "Suspenso",
    5               => "Aprobado",
    6               => "Bien",
    7, 8            => "Notable",
    9, 10           => "Sobresaliente",
    default         => "Nota errónea"
};

echo "Con tu nota $nota tienes una calificación de $calificacion.<br>";
?>

    <h2>Operador ternario</h2>

<?php

    /*
        Sintaxis:
        <condición> ? <expresion_true> : <expresion_false>
    */

$nota = 6;
$resultado = "Con un $nota estás " . (($nota >= 5) ? "aprobado" : "suspenso") . ".<br>";
echo $resultado;

$con_beca = false;
$nombre = "Juan Gómez";
?>

    <form action="" method="post">
        <input type="text" name="nombre" size="30" value='<?= isset($nombre) ? $nombre : ""?>'>
        <input type="checkbox" name="con_beca" <?= $con_beca ? "checked" : "" ?> >Con beca
        <button>Enviar</button>
    </form>


    <h2>Operador de fusión NULL</h2>

<?php

$metodo = "POST";
$segundo_metodo = "GET";
$por_defecto = "main";

$resultado = $metodo ?? $segundo_metodo;

echo "El resultado es $resultado.<br>";


unset($metodo);
$segundo_metodo = "GET";
$por_defecto = "main";

$resultado = $metodo ?? $segundo_metodo;

echo "El resultado es $resultado.<br>";


unset($metodo); unset($segundo_metodo);
$por_defecto = "main";

$resultado = $metodo ?? $segundo_metodo ?? $por_defecto;

echo "El resultado es $resultado.<br>";
?>

    <h2>Bucles</h2>
    <ul>
        <li>For con contador (estilo Java y C++)</li>
        <li>For para colecciones de datos</li>
        <li>While</li>
        <li>Do...while</li>
    </ul>

    <h3>Bucle for</h3>

<?php

    /*
        Sintaxis:
        for ( <iniciar_contador>; <condicion_salida>; <incrementar_contador> ) {
            
            SENTENCIAS
        
        };
    */


    // Tabla de multiplicar del 4.

echo "<h4>Tabla de multiplicar del 4</h4>";
for ($i = 1; $i <= 10; $i++) {
    echo "4 x $i = " . (4 * $i) . "<br>";
};

    /*
        Diferencias entre $i++ y ++$i
        En el bucle for no hay diferencia entre preincremento y postincremento, ya que 
        el incremento se realiza una vez que se han ejecutado todas las sentencias dentro 
        del bloque.
    */

echo "<h4>Los 10 primeros números pares</h4>";

for( $i = 2; $i <= 2 * 10; $i+=2 ) {
    echo "Número par $i<br>";
};

echo "<h4>Cuenta atrás para el lanzamiento</h4>";

for( $i = 10; $i >= 0; $i--) {
    echo "$i segundos<br>";
};

echo "Ignición<br>";

    /*
        Varias expresiones en la inicialización e incremento.
    */

for( $i = 10, $j = 0; $i >= 5 AND $j < 8; $i--, $j+=2) {
    echo "Valor de i es $i y valor de j es $j<br>";
};

?>

    <h3>Bucle while</h3>

<?php

    /*
        Sintaxis:
        while (condicion) {
        
            SENTENCIAS

        };


    /*
        Sumar números pares aleatorios hasta que salga el 0
    */

$total = 0;
$numero = rand(0, 10);

while ( $numero != 0 ) {
    echo "El número generado es $numero<br>";
    if( $numero % 2 == 0 ) {
        $total += $numero;
    };

    $numero = rand(0, 10);
};

echo "El total de los pares es $total.<br>";
?>

    <h3>Do...while</h3>

<?php

    /*
        Contar cuántos números impares se generan aleatoriamente hasta que
        se genera uno negativo.
    */

$total = 0;

do {
    $numero = rand(-5, 50);
    if( $numero % 2 == 1 ) {
        $total++;
    };
} while( $numero >= 0 );

echo "Se han generado $total números impares.<br>";
?>

    <h3>Sentencias break y continue</h3>

<?php

    // Bucle repetir...hasta con break

$total = 0;
do{
    $numero = rand(0, 20);
    if( $numero % 3 == 0 ) {
        $total++;
        echo "<span style='color:red;'>El número es múltiplo de 3</span><br>";
    };
    echo "El número generado es $numero<br>";
    if( !$numero ) break;
} while(true);

echo "Se han generado $total números múltiplos de 3<br>";

    /*
        Generar números aleatorios entre 1 y 10 y sumar los pares hasta
        que la suma sea superior a 100 o se hayan generado 20 números.
    */

$suma_pares = 0;
$contador = 0;
while( true ) {
    $numero = rand(1,10);
    if( $numero % 2 == 0 ) {
        $suma_pares += $numero;
    };

    if( $suma_pares > 100 ) break;

    $contador++;
    if( $contador == 20 ) break;
};

echo "Se han generado $contador números y los pares han sumado $suma_pares.<br>";

    /*
        Break admite un argumento numérico para indicar de qué bucle se sale.
        Siempre y cuando se encuentre en un bucle anidado.
    */

    /* 
        Generar 200 números aleatorios entre 1 y 1000.
        Por cada número generado se comprueban cuántos números primos hay desde 1 hasta sí mismo.
        Si hay más de 10 números primos, se termina de generar números aleatorios.
        Al final, visualizar cada número generado y los primos hasta ese número.
    */

for( $i = 0; $i < 200; $i++ ) {
    $numero = rand(1,1000);
    $cuantos_primos = 0;
    echo "El número generado es: $numero. Primos: ";

    for( $j = 1; $j < $numero; $j++ ) {
        $es_primo = true;
        $raiz_cuadrada = sqrt($j);
        $k = 2;

        while( $es_primo AND $k < $raiz_cuadrada) {
            if( $j % $k == 0 ) $es_primo = false;
            $k++;
        };

        if( $es_primo ) {
            echo "$j ";
            $cuantos_primos++;

            if( $cuantos_primos >= 10 ) break 2;
        };
    };
};


    /*
        Genera 10 números aleatorios. Por cada uno, genera tantos caracteres en minúscula
        aleatorios como ese número. Si alguno de estos caracteres es 'z', el programa acaba.
        Si el número generado es impar, que vuelva a generar otro.
    */

for( $i = 0; $i < 10; $i++ ) {
    $numero = rand(1,10);
    echo "Número: $numero ";
    if( $numero % 2 == 1 ) continue;

    for( $j = 0; $j <= $numero; $j++ ) {
        $caracter = chr(rand(97, 122));
        echo "$caracter ";
        if( $caracter == "z" ) break 2;
    };
    echo "<br>";

};
?>

    <h3>Sintaxis alternativa a la estructura de cnotrol</h3>

<?php
$numero = rand(1,100);

if( $numero % 2 == 0 ):
    echo "El número $numero es par<br>";
else:
    echo "El número $numero es impar<br>";
endif;

for( $i = 1; $i <= 10; $i++ ):
    echo "$i x $numero = " . $i * $numero . "<br>";
endfor;
?>

</body>
</html>
