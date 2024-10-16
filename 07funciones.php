<?php
    /*
        Una función es un conjunto de sentencias con un nombre asociado 
        que se ejecutan a discreción del desarrollador, cuando es necesario.

        Invocación o llamada de la función: sentencia que solicita la ejecución 
        de la función, momento en el cuál el flujo del programa se desvía a la 
        primera línea de la función y comienza su ejecución.

        Las funciones pueden necesitar datos. Estos datos se pasan como parámetros o 
        argumentos de la función en el momento de su invocación. Pueden devolver uno o 
        varios valores al punto de invocación, que puede posteriormente utilizarse 
        en cualquier expresión.

        Tipos:
            - Internas, integradas o predefinidas -> las propias del lenguaje.
            - Métodos -> funciones de clases de objetos.
            - De usuario -> las que el desarrollador define.


        3.1 Definición de la función

        - Se pueden definir en cualquier parte del script (puede invocarse antes de ser definidas).
        - Tiene una cabecera y un cuerpo.
        - Sintaxis:

                function nombre_función( [arg1, arg2,...] ) {
                
                BLOQUE DE SENTENCIAS
                
                };

                - Nombre: cualquier identificador válido sin $.
                - Lista de parámetros o argumentos, separados por comas.
                - El cuerpo de la función es el conjunto de sentencias entre llaves.


        3.3 Paso de parámetros
            - Parámetro: dato que la función necesita para su ejecución.
            - Permite que las funciones se ejecuten múltiples veces con diferentes datos. 
              El objetivo de las funciones es evitar código repetitivo.
            - Tipos de parámetros:
                - Parámetro formal: el que se define en la cabecera de la función. Es equivalente 
                                    a una variable. Conocido simplemente como PARÁMETRO.
                - Parámetro real: el que se emplea en la invocación. Puede ser una expresión 
                                  cualquiera que arroje un valor. Conocido como ARGUMENTO.
            
            - Los argumentos y los parámetros tienen una correspondencia por su posición en 
              la definición y en la invocación. El primer argumento corresponde al primer 
              parámetro, el segundo argumento al segundo parámetro,...

        3.3.1 Paso de parámetros pro valor y por referencia.

        - Paso por valor: consiste en copiar el valor del argumento en el parámetro. 
                          Hay dos entidades: el parámetro de la función y el argumento de 
                          la llamada, que son independientes.

        - Paso por referencia: consiste en pasar al parámetro la referencia (dirección de memoria) 
          del argumento, por tanto sólo hay una entidad y si el parámetro dentro de la función se 
          modifica, el nuevo valor es visible en el script principal.

        3.3.3 Tipos de datos
        En cada parámetro podemos definir su tipo de dato, de forma tal que si en la invocación 
        no pasamos un argumento del mismo tipo, habrá una excepción TypeError.

        Primero intenta una conversión implícita al tipo definido en el parámetro. Si no puede, 
        dispara TypeError. Si puede, la hace y la función continúa.
        
        3.3.5 Parámetros con nombre
        En la invocación de la función paso el argumento con el nombre del parámetro.
        Esto permite utilizar un orden diferente en los argumentos al de los parámetros 
        definidos en la cabecera de la función.

        3.3.6 Parámetros con valor por defecto
        En la cabecera de la función los parámetros pueden tener un valor por defecto (sólo 
        literales). Pueden ser arrays y null. Permite invocar la función sin esos parámetros, 
        los cuales adquieren como valor el valor por defecto definido en la función.

        Si la función combina parámetros obligatorios con parámetros con valor por defecto, 
        los obligatorios se definen antes que los de por defecto, salvo que en la invocación 
        usemos argumentos con nombre.


        3.4 Valor de devolución
        ¿Cómo se devuelve más de un valor? Con un array. Luego se recoge con list() o con un array.

        3.5 Ámbito y visibilidad de una variable
        - Ámbito -> fragmento del programa donde una variable existe.
        - Visibilidad -> fragmento del programa donde una variable existe y es accesible.

        Resumen:
            - En una función no se accede a variables definidas fuera de la función, salvo las 
            declaradas globales (con global) o el array $GLOBALS.
            - Si se modifica el valor de una variable global, su nuevo valor persiste. 
            - Las variables estáticas (static) conservan su valor entre invocaciones de la función 
            pero son locales a ésta.
            - Los parámetros de una función son como variables locales de ésta.

        
        
            3.7 Recursividad
            Una función se invoca a sí misma. 
    */

define("PI", 3.14159);

function area_of_triangle( $base, $height ) {
    return $base * $height / 2;
};


function area_of_triangle2( &$base, &$height ) {
    echo "Dentro de la función: $base, $height.<br>";
    
    $base = 10;
    $height = 20;
    $area = $base * $height / 2;
    
    echo "2- Dentro de la función: $base, $height.<br>";

    return $area;
};

function volume_of_cilinder( $radius, $height = 10 ) {
    $area_of_base = PI * $radius ** 2;
    return $area_of_base * $height;
};

function area_of_rectangle( float $base, float $height ) {
    echo "Función a_o_f: " . gettype($base) . ".<br>";
    echo "Función a_o_f: " . gettype($height) . ".<br>";
    return $base * $height;
};

function average( ...$values ) {
    $sum = 0;
    foreach( $values as $value ) {
        $sum += $value;
    };
    return $sum / count($values);
};

function circle_and_circunference( $radius ): array {
    $result[] = PI * $radius ** 2;
    $result[] = 2 * PI * $radius;

    return $result;

};

function area_of_rectangle2( $base, $height ): ?float {
    if ( $base < 0 OR $height < 0 ) {
        $area = null;
    }
    else{
        $area = $base * $height;
    };
    return $area;
};

function addition() {
    global $a, $b;

    // $resultado = $a + $b;

    $resultado = $GLOBALS['a'] + $GLOBALS['b'];

    return $resultado;
};

function times_executed() {
    static $executions = 0;
    $executions++;
    echo "La función se ha ejecutado $executions veces.<br>";
};

function factorial( $number ) {
    if( $number == 1 OR $number == 0 ) {
        $result = 1;
    }
    elseif( $number == 2 ) {
        $result = 2;
    }
    else{
        $result = $number * factorial( $number - 1 );
    };

    return $result;
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <h1>Funciones en PHP</h1>

<?php
$base = 8;
$height = 3;

    // Invocación de la función.
$area = area_of_triangle( $base, $height );

echo "El triángulo de base $base y altura $height tiene un área de $area.<br>";


    // Paso por valor.

$area = area_of_triangle2( $base, $height);
echo "El triángulo de base $base y altura $height tiene un área de $area.<br>";

    /*
        El paso por valor permite que el argumento sea una expresión cualquiera, 
        ya que simplemente se copia su valor, sin realizar ninguna modificación 
        sobre él.
    */

    /*
        Paso por referencia
        En la llamada a la función usamos & antes del argumento.
        En este caso, el argumento es obligatoriamente una variable.
    */

$base = 8;
$height = 3;

$area = area_of_triangle2( $base, $height);
echo "El triángulo de base $base y altura $height tiene un área de $area.<br>";

    /*
        Paso de parámetros por nombre.
    */

$area = area_of_triangle( $height = 10, $base = 5 );
echo "El triángulo de base $base y altura $height tiene un área de $area.<br>";


    /*
        Parámetros por defecto.
    */

$volume = volume_of_cilinder($radius=8);
echo "El cilindro de radio 8 y altura por defecto tiene un volumen de $volume.<br>";


    /*
        Tipos de datos en los parámetros.
    */

$area = area_of_rectangle("8", 9);
echo "El área del rectángulo es $area.<br>";

    /*
        Número de argumentos variable.
    */

$mean = average(3, $area, 9, 8, 2.5, $volume);
echo "La media de los números anteriores es $mean.<br>";


$circle_and_circunference = circle_and_circunference(5);

echo "Con radio = 5, el área del círculo es {$circle_and_circunference[0]} 
y la longitud de su circunferencia es {$circle_and_circunference[1]}.<br>";

list( $v1, $v2 ) = circle_and_circunference(6);
echo "R=6; el área es $v1 y la circunferencia es $v2.<br>";

    /*
        Valor null en devolución.
    */

$area = area_of_rectangle2(-3, 9);
echo $area ? "El área es $area.<br>" : "Algún parámetro es negativo.<br>";


    /*
        Ámbito y visibilidad de las variables.
    */

$a = 3;
$b = 8;

$resultado = addition();
echo "El valor de a es $a, el de b es $b y la suma es $resultado-.<br>";

times_executed();
times_executed();
times_executed();
times_executed();
times_executed();

    /*
        Función recursiva
    */

$numeros = [6, 4, 9, 2];
foreach( $numeros as $numero ){
    $factorial = factorial($numero);
    echo "El factorial de $numero es $factorial.<br>";
};
?>
</body>
</html>