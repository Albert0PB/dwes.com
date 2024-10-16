<?php
    /*
        Páginas autoprocesadas
            - Si se recibe una petición GET, se genera el formulario.
              El atributo action tiene el valor

            - Si se recibe una petición POST, se recogen los datos del formulario y se 
            procesa la petición, generando la salida.
    
    
    
    */
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Páginas autoprocesadas", ["/styles/general.css", "/styles/formulario.css"]);


if( $_SERVER['REQUEST_METHOD'] == "GET" ) {
    // Genero formulario
?>
        <header>Solicitud de empleo</header>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <!-- Información personal -->

        <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" size="50" required 
                placeholder="Indique su nombre completo aquí: ">

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" size="40" required
                placeholder="sucorreo@gmail.com">

            <label for="clave">Contraseña</label>
            <input type="password" name="clave" id="clave" size="10" required>
        </fieldset>
        <input type="submit" name="operacion" value="Enviar">
    </form>
<?php
}

    /*
        Formas de comprobar si un formulario se ha enviado
            - Comprobar el método en $_SERVER['REQUEST_METHOD']
            Si el formulario se envía con POST, funciona, pero si se envía con GET, 
            no funciona.

            - Comprobar si hay datos en $_POST o $_GET. Con la función isset() me 
            dice si una variable está definida.

            - Acceder a una variable de $_POST o $_GET y comprobar que no sea nula.
            No es recomendable usarla porque provoca un warning al intentar comprobar 
            una variable que aún no está asignada.
    */

// if( $_SERVER['REQUEST_METHOD'] == "POST" ) {

if( isset($_POST['nombre']) ) {

// if( !(is_null($_POST['nombre'])) ) {    ----- POCO RECOMENDABLE

    // Recoger datos del formulario y procesar respuesta

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$clave = $_POST["clave"];
$operacion = $_POST["operacion"];

echo "Nombre: $nombre<br>";
echo "Email: $email<br>";
echo "Clave: $clave<br>";
echo "Operación: $operacion<br>";
};

fin_html();

?>