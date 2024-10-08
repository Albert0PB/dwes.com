<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Array</h1>
    <p>
        Un array es un conjunto de elementos que se referencian con el mismo nombre.
        A cada variable del array se le conoce como componente o elemento del array.
        Cada componente tiene asociada una clave que se emplea para acceder a ese elemento
        o componente.
    </p>
    <p>
        En PHP los arrays son muy flexibles. Hay de dos tipos: escalares y asociativos.
        Para acceder a un elemento se usa su clave con el operador []. Si la clave es un 
        número entero mayor o igual que cero, es un array escalar. Si la clave es una cadena 
        de caracteres, el array es asociativo.
    </p>
    <h2>Arrays escalares</h2>

<?php

    /*
        Un array se define de dos formas:
            1. Con la función Array().
            2. Con un literal.
        Si sólo se indican los elementos del array, la clave comienza por 0 desde la izquierda.
    */

$notas = Array(4, 9, 7.5, 6, 2.5);
$numeros = [8, 4, 2, 9, 5.5];

echo "La primera nota es $notas[0].<br>";
echo "La tercera nota es $notas[2].<br>";

    /*
        Al definir el array podemos indicar los indices.
    */

$notas = Array( 2 => 8.5, 4 => 4.75, 8 => 3.5 );

    /*
        Puede definirse indice para algunos y no para otros.
    */

$notas = Array( 3 => 5, 6.5, 8, 7 => 2, 9, 5);
echo "Índice 0: " . $notas[0] . "<br>";
echo "Índice 1: " . $notas[1] . "<br>";
echo "Índice 2: " . $notas[2] . "<br>";
echo "Índice 3: " . $notas[3] . "<br>";
echo "Índice 4: " . $notas[4] . "<br>";
echo "Índice 5: " . $notas[5] . "<br>";
echo "Índice 6: " . $notas[6] . "<br>";
echo "Índice 7: " . $notas[7] . "<br>";
echo "Índice 8: " . $notas[8] . "<br>";
echo "Índice 9: " . $notas[9] . "<br>";

    /*
        Para borrar un elemento de un array usamos unset().
        Y para modificar un elemento, simplemente realizamos una asignación.
    */

unset($notas[4]);
$notas[5] = 3;
    
    /*
        Con una asignación dejando los corchetes vacíos podemos crear un nuevo elemento
        al final del array con el valor que indiquemos.
    */

$notas[] = 7.5;     
?>

    <h2>Arrays asociativos</h2>
    <p>
        Array que tiene una cadena de caracteres como clave.
    </p>

<?php

$coche['1234ABC'] = "Seta León";
$coche['4321CBA'] = "Ford Ficus";

echo "Mi coche es {$coche['1234ABC']}.<br>";
echo "Mi coche es {$coche['4321CBA']}.<br>";
?>

    <h2>Array mixto</h2>
    <p>
        Cuando las claves son índices numéricos o cadenas indistintamente.
    </p>

<?php
$alumno['nombre'] = "Juan Gómez";
$alumno[0] = 4;
$alumno[1] = 6;
$alumno[2] = 5;
$alumno['media'] = 5;

echo "El alumno {$alumno['nombre']} tiene de notas: $alumno[0], $alumno[1] y $alumno[2].<br>";
echo "Su media es {$alumno['media']}.<br>";

$alumno = ['nombre' => "Manuel Martínez", 0 => 3, 8, 5, 4, 'media' => 5];

echo "El alumno {$alumno['nombre']} tiene de notas: $alumno[0], $alumno[1], $alumno[2] 
y $alumno[3].<br>";
echo "Su media es {$alumno['media']}.<br>";
?>

    <h2>Arrays bidimensionales</h2>
    <p>
        Arrays con dos dimensiones y por tanto para acceder a un elemento hacen
        falta dos claves.
    </p>

<?php
$notas = Array(
    Array(3.5, 6, 8, 9.5, 3),
    Array(2, 5.5, 6, 2, 10),
    Array(4.5, 3, 2.5, 7, 8),
    Array(7, 1, 0, 1.5, 3.5)
);
echo "El elemento en la fila 2 columna 3: {$notas[1][2]}.<br>";


$notas[][] = 9;
echo "El último elemento de la última fila: {$notas[4][0]}.<br>";

$notas[3][0] = 7.5;
echo "El último elemento de la fila 3: {$notas[3][5]}.<br>";

$numeros = [1,2,3,4,5];
echo "El último elemento del array es {$numeros[count($numeros) - 1]}.<br>";

$coches = [
    '1234abc' => ['marca' => 'Seat', 'modelo' => 'Ibiza', 'motor' => 'Diesel', 'pvp' => 18000],
    '4321bca' => ['marca' => 'Ford', 'modelo' => 'Focus', 'motor' => 'Gasolina', 'pvp' => 21000]
];

echo "El primer coche es {$coches['1234abc']['marca']} modelo {$coches['1234abc']['modelo']}.<br>"

    /*
        Crea un array de un equipo de fútbol donde cada fila son las posiciones donde juegan
        los jugadores con el conjunto de jugadores identificacos por su dorsal.
    */
?>

    <h2>Arrays multidimensionales</h2>

<?php
$notas = [
    [
        [3,4,5,6],
        [2,8,9,3],

    ],
    [
        [1,8,9,5],
        [2,4,8,5]
    ],
    [
        [2,8,4,6],
        [9,10,4,3]
    ]
];

echo "Accedo al elemento 1,1,2: {$notas[1][1][2]}.<br>";

$notas = [
    'juan' => [
        'trimestre1' => ['dwes' => 6, 'dwec' => 5, 'daw' => 8, 'diw' => 7],
        'trimestre2' => ['dwes' => 5.5, 'dwec' => 7.5, 'daw' => 6, 'diw' => 6],
        'trimestre3' => ['dwes' => 5, 'dwec' => 7, 'daw' => 6.5, 'diw' => 4]
    ],
    'maria' => [
        'trimestre1' => ['dwes' => 9, 'dwec' => 6, 'daw' => 7.5, 'diw' => 7],
        'trimestre2' => ['dwes' => 8, 'dwec' => 7, 'daw' => 6.5, 'diw' => 5.5],
        'trimestre3' => ['dwes' => 7, 'dwec' => 7, 'daw' => 4.5, 'diw' => 5.5]
    ]
];

$alumno = 'maria';
$trimestre = 'T2';
$modulo = 'dwec';

echo "La nota de María en el segundo trimestre en dwec: {$notas['maria']['T2']['dwec']}.<br>";
echo "La nota de María en el segundo trimestre en dwec: {$notas[$alumno][$trimestre][$modulo]}.<br>";
?>

    <h2>Recorrer un array</h2>


<?php
$numeros = [6,19,12,7,11,9,3];

    /*
        Para cualquier tipo de array tenemos el bucle for...each
        foreach( $array as [$clave =>] $valor ) {
        
        }
    */

foreach( $numeros as $numero ) {
    echo "El número es {$numero}.<br>";
};

$alumno = [];
$alumno['nombre'] = "Juan Gómez";
$alumno[0] = 4;
$alumno[1] = 6;
$alumno[2] = 5;
$alumno['media'] = 5;

foreach( $alumno as $key => $value ) {
    echo "Elemento con clave $key y valor $value.<br>";
};
?>

    <h3>Recorrido de arrays multidimensionales</h3>

<?php
foreach( $notas as $alumno => $trimestres ) {
    echo "<h4>Notas de $alumno: </h4>";
    foreach( $trimestres as $trimestre => $modulos ) {
        echo "<h5>Notas del trimestre $trimestre: </h5>";
        foreach( $modulos as $modulo => $nota ) {
            echo "<p>Nota de $modulo: $nota</p>";
        };
    };
};


foreach( $coches as $matricula => $coche ) {
    echo "Coche con matrícula: $matricula.<br>";
    foreach( $coche as $key => $value ) {
        echo "$key => $value<br>";
    };
    echo "--------------------<br>";
};


?>

</body>
</html>