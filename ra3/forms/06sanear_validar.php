<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Saneamiento y validación de datos", ['/styles/general.css', '/styles/formulario.css']);

echo "<header>Saneamiento y validación de datos</header>";
if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    /*
        SANEAMIENTO DE DATOS
        ====================
        1ª Opción: uso de htmlspecialchars();
    */
$dni = htmlspecialchars($_POST['dni']);
$nombre = htmlspecialchars($_POST['nombre']);
$email = htmlspecialchars($_POST['email']);
$clave = htmlspecialchars($_POST['clave']);
$suscripcion = isset($_POST['suscripcion']);
$sitio = htmlspecialchars($_POST['sitio']);
$peso = htmlspecialchars($_POST['peso']);
$edad = htmlspecialchars($_POST['edad']);
foreach( $_POST['patologias_previas'] as $patologia ) {
    $patologias[] = htmlspecialchars($patologia);
}
$comentarios = htmlspecialchars($_POST['comentarios']);
$operacion = htmlspecialchars($_POST['operacion']);

echo "<h3>Datos filtrados con htmlspecialchars()</h3>";
echo "<p>DNI: $dni<br>";
echo "Nombre: $nombre<br>";
echo "Email: $email<br>";
echo "Clave: $clave<br>";
echo "Suscripcion: $suscripcion<br>";
echo "Sitio: $sition<br>";
echo "Peso: $peso<br>";
echo "Edad: $edad<br>";
echo "Patologías: " . implode(", ", $patologias) . "<br>";
echo "Comentarios: $comentarios<br>";
echo "Operación: $operacion<br>";

    /*
        2ª Opción: Uso de de la función filter_input()

    */
$dni2 = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre2 = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$email2 = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_EMAIL);
$clave2 = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_SPECIAL_CHARS);
$suscripcion2 = isset($_POST['suscripcion']);
$sitio2 = filter_input(INPUT_POST, 'sitio', FILTER_SANITIZE_URL);
$peso2 = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$edad2 = filter_input(INPUT_POST, 'edad', FILTER_SANITIZE_NUMBER_INT);
$patologias2 = filter_input(INPUT_POST, 'patologias_previas', 
    FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

$comentarios2 = filter_input(INPUT_POST, 'comentarios', FILTER_SANITIZE_SPECIAL_CHARS);
$operacion2 = filter_input(INPUT_POST, 'operacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

echo "<h3>Datos filtrados con filter_input()</h3>";
echo "<p>DNI: $dni2<br>";
echo "Nombre: $nombre2<br>";
echo "Email: $email2<br>";
echo "Clave: $clave2<br>";
echo "Suscripcion: $suscripcion2<br>";
echo "Sitio: $sition2<br>";
echo "Peso: $peso2<br>";
echo "Edad: $edad2<br>";
echo "Patologías: " . implode(", ", $patologias2) . "<br>";
echo "Comentarios: $comentarios2<br>";
echo "Operación: $operacion2<br>";


    /*
        3ª Opción: Uso de la función filter_input_array()
    */

$opciones_filtrado = [
    'dni'                   =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'nombre'                =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email'                 =>  FILTER_SANITIZE_EMAIL,
    'clave'                 =>  FILTER_DEFAULT,
    'suscripcion'           =>  FILTER_DEFAULT,
    'sitio'                 =>  FILTER_SANITIZE_URL,
    'peso'                  =>  [
        'filter'    =>  FILTER_SANITIZE_NUMBER_FLOAT,
        'options'   =>  FILTER_FLAG_ALLOW_FRACTION
    ],
    'edad'                  =>  FILTER_SANITIZE_NUMBER_INT,
    'patologias_previas'    =>  [
        'filter'    =>  FILTER_SANITIZE_SPECIAL_CHARS,
        'options'   =>  FILTER_REQUIRE_ARRAY
    ],
    'comentarios'           =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'operacion'             =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS   
];
$datos_saneados = filter_input_array(INPUT_POST, $opciones_filtrado);

echo "<h3>Resultados del saneamiento con filter_input_array()</h3>";

echo "<p>";
foreach( $datos_saneados as $key => $value ) {
    if( is_array($value) ){
        echo "$clave: " . implode(", ", $valor) . "<br>";
    }
    else{
        echo "$key: $value<br>";
    }
}
echo "</p>";

    /*
        VALIDACIÓN DE FORMATO DE DATOS
        ==============================

        Usos de las funciones filter_input() y filter_input_arra()
    */
// Por lo general, las cadenas de texto genéricas sólo se sanean, no se valida su formato
$dni3 = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre3 = filter_input(INPUT_POST, 'nombre', FILTER_DEFAULT);
$clave3 = filter_input(INPUT_POST, 'clave', FILTER_DEFAULT);
$comentarios3 = filter_input(INPUT_POST, 'ccomentarios', FILTER_DEFAULT);
$operacion3 = filter_input(INPUT_POST, 'operacion', FILTER_DEFAULT);

// Validación de formato de email
$email3 = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);

// Validación de dato booleano
$suscripcion3 = filter_input(INPUT_POST, 'suscripcion'. FILTER_VALIDATE_BOOLEAN);

// Validación de URL
$sitio3 = filter_input(INPUT_POST, 'sitio', FILTER_VALIDATE_URL);

// Validación de float e int con rango incluido
$peso3 = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT,
                                          ['options' => [
                                            'min_range' => 40,
                                            'max_range' => 150],
                                            'flags' => FILTER_NULL_ON_FAILURE
                                        ]);

$edad3 = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT, [
                                          'options' => [
                                            'min_range' => 18,
                                            'max_range' => 65],
                                          'flags' => FILTER_NULL_ON_FAILURE
                                          ]);

$patologias3 = filter_input(INPUT_POST, 'patologias_previas', 
FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

echo "<h3>Datos filtrados con filter_input()</h3>";
echo "<p>DNI: $dni3<br>";
echo "Nombre: $nombre3<br>";
echo "Email: $email3<br>";
echo "Clave: $clave3<br>";
echo "Suscripcion: $suscripcion3<br>";
echo "Sitio: $sition3<br>";
echo "Peso: $peso3<br>";
echo "Edad: $edad3<br>";
echo "Patologías: " . implode(", ", $patologias3) . "<br>";
echo "Comentarios: $comentarios3<br>";
echo "Operación: $operacion3<br>";

    /*
        Validación de datos con lógica de datos
    */

echo "<h3>Validación con lógica de datos</h3>";
echo "<p>";
// Formato DNI: 8 dígitos y una letra mayúscula ( sin cálculo)
$dni4 = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$regexp = "/[0-9]{7,8}[A-Z]/";
if( preg_match($regexp, $dni4)) {
    echo "DNI: $dni4<br>";
}
else{
    echo "DNI: No tiene el formato adecuado<br>";
    $dni4 = null;
};


// Nombres de usuario sólo con caractéres alfabéticos y dígitos
// Longitud mínima de 4 y máximo 8
$nombre4 = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if( ctype_alnum($nombre4) && strlen($nombre4) >= 4 && mb_strlen($nombre4) <= 8 ) {
    echo "Nombre: $nombre4<br>";
}
else{
    echo "Nombre: No tiene el formato adecuado";
};

/* 
    Clave: Requisitos de complejidad
    Tipos de caracteres: mayúsculas y minúsculas, dígitos y símbolos gráficos.
    Longitud mínima: 6
*/
$clave4 = htmlspecialchars($_POST['clave']);
$letras_minusculas = preg_match('/[a-z]/', $clave4);
$letras_mayúsculas = preg_match('/[A-Z]/', $clave4);
$digitos_numericos = preg_match('/[0-9]/', $clave4);
$simbolos_graficos = preg_match('/[,.-;:_\+\*!\$%&\/()=\?\#@|\]/', $clave4);

if( $letras_minusculas && $letras_mayúsculas && $digitos_numericos && $simbolos_graficos 
&& strlen($clave4) >= 6 ) {
    echo "Clave: La clave es $clave4<br>";
}
else{
    echo "Clave: No cumple los requisitos de complejidad<br>";
};

$peso4 = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if( is_numeric($peso4) ) {
    echo "Peso: $peso4<br>";
}
else{
    echo "Peso: no tiene formato adecuado<br>";
}
$peso_float = floatval($peso4);


echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'></p>";
}
else{

?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    
    <fieldset>
        <legend>Introduzca sus datos</legend>
        
        <label for="dni">DNI</label>
        <input type="text" name="dni" id="dni" size="10">
        
        <label for="nombre">Nombre</label>
        <input type="text" name="" id="nombre" size="40">
        
        <label for="email">Email</label>
        <input type="text" name="email" id="email" size="30">

        <label for="clave">Clave</label>
        <input type="password" name="clave" id="clave" size="10">

        <label for="suscripcion">Suscripción</label>
        <input type="checkbox" name="suscripcion" id="suscripcion">
        
        <label for="sition">Web personal</label>
        <input type="text" name="sitio" id="sitio" size="30">

        <label for="peso">Peso</label>
        <input type="text" name="peso" id="peso" size="3">
        
        <label for="edad">Edad (entre 18 y 65)</label>
        <input type="text" name="edad" id="edad" size="3">
        
        <label for="patologias_previas[]">Patologías previas</label>
        <select name="patologias_previas[]" id="patologias_previas" multiple size="5">
            <option value="osteoporosis">Osteoporosis</option>
            <option value="diabetes">Diabetes</option>
            <option value="colesterol">Hipercolesterolemia</option>
            <option value="anemia">Anemia</option>
            <option value="arterioesclerosis">Arterioesclerosis</option>
        </select>

        <label for="comentarios">Comentarios</label>
        <textarea name="comentarios" id="comentarios" rows="4" cols="30" placeholder="Escribe sobre ti...">
            </textarea>
        </fieldset>
        <input type="submit" value="Enviar" id="operacion" name="operacion">
        
    </form>
      
<?php


};
fin_html();
?>