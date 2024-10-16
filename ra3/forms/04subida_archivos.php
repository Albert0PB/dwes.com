<?php
/*
Script:         04subida_archivos.php
Descripción:    ejemplo de formulario para subida de archivos al servidor desde los clientes.


SUBIDA DE ARCHIVOS
==================

    * Un formulario permite subir archivos si el elemento form tiene el atributo
    enctype="multipart/form-data". Además, tendrá al menos un elemento input con 
    type="file".

    * Directivas php.ini que regulan la subida de archivos:
        - file_uploads <bool>           -> Indica si la subida de archivos está activada. Por defecto On.
        - upload_max_filesize <int>     -> Límite del tamaño del archivo a subir en bytes.
                                        Por defecto 2 MB.
        - max_file_uploads <int>        -> Nº máximo de archivos que se pueden subir en una petición.
                                        Por defecto son 20.
        - post_max_size <int>           -> Tamaño máximo de la petición POST. Por defecto 8 MB.
        - upload_tmp_dir <dir>          -> Directorio temporal donde se almacenan los archivos subidos.
                                        Por defecto, según SO: /tmp (Linux); C:\TEMP (Windows).
    
    * Todos estos parámetros en php.ini son configurables con la función ini_set().

    * Además, podemos poner limite del tamaño de archivo subido:
        - Duro          -> Directiva upload_max_filesize en php.ini
        - Blando        -> Campo oculto de formulario MAX_FILE_SIZE 
        - De usuario    -> El desarrollador puede establecer limites en campos ocultos. 
                           Viene bien cuando quiero poner un límite para diferentes tipos de archivo.
                           El propio desarrollador lo controla.
            
    * Cuando se sube un archivo, el script que procesa el formulario tiene que hacer 
    varias comprobaciones antes de guardarlo o procesarlo.
    1º Existe el archivo en el array $_FILES (que haya un control de formulario para subida).
    2º El usuario ha incluido en el formulario el archivo a subir. En el script PHP.
    3º El tamaño de archivo está dentro de los límites de PHP. Automáticamente por PHP.
    4º El tamaño de archivo está dentro de los límites establecidos por el desarrollador. En el script. 
    5º El tipo de archivo es el requerido.

    * Si vamos a guardar el archivo, comprobar si existe el directorio de subida. Si no está creado, 
    hay que crearlo.

    * Si el archivo subido guarda todos los requisitos, se guarda en el directorio de subida o se 
    procesa.

    Enfoque del script: 
        - Página autogenerada.
        - Se suben archivos de forma cíclica.
        - Petición GET: se presenta el formulario.
        - Petición POST:
            - Procesamos la subida del archivo.
            - Si hay error, se presenta la salida producida hasta el momento. 
              Presentar mensaje de error y el formulario de subida.
            - Si no tenemos creado el directorio de subida, lo creamos.
            - Si no hay error, se guarda el archivo en un directorio y se presenta 
              el formulario de subida de nuevo.

*/
define("DIRECTORIO_PDF", $_SERVER["DOCUMENT_ROOT"] . "/documentos/archivos_cv/");
require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/funciones.php");

inicio_html("Subida de archivos", ["/styles/general.css", "/styles/formulario.css"]);


if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];

$limite_pdf = $_POST["limite_pdf"];

echo "<h3>Datos recibidos en la petición</h3>";
echo "<p>El DNI es $dni y el nombre es $nombre</p>";
echo "<p>El límite para archivos pdf es $limite_pdf B</p>";

    /*
        Creación del directorio de subida.
        ----------------------------------
            - El usuario que ejecuta el servicio web (Apache) en el servidor, necesita tener permisos
              de escritura sobre el directorio padre del directorio de subida.

            - 1º: Creamos el directorio desde el SO y le asignamos propietario o permisos.
              Si el usuario no es propietario del directorio de subida, tiene que tener permisos.
              777: rwx rwx rwx - NO recomendable, cualquier usuario puede acceder al directorio y 
              hacer lo que quiera.

            - 2º: Modificar la ACL del directorio de subida (si está creado previamente) o del 
              directorio padre (si queremos crearlo en el script PHP).

              Empleamos la 2ª forma y asignamos rwx al usuario que ejecuta Apache (www-data) sobre el 
              directorio padre del directorio de subida, y éste se crea en el script PHP.

              setfacl -m u:www-data:rwx /var/www/dwes.com
              ** setfacl -m u:www-data:rwx /var/www/dwes.com/documentos
    */

    if( ! is_dir(DIRECTORIO_PDF) ) {                // Si no existe el directorio, se crea
        if( ! mkdir(DIRECTORIO_PDF, 0750) ) {       // Si intenta crearlo y hay error
            echo "<h3>Error. No se ha podido crear el directorio de subida.</h3>";
        }
        else{                                       // Se crea sin error
            echo "<p>El directorio de subida se ha creado con éxito.</p>";
        };
    };

    /* 
        ACCESO A LOS ARCHIVOS SUBIDOS
        -----------------------------

        Array global $_FILES contiene la información de los archivos que se han subido.
        Es un array asociativo cuya clave es e nombre del campo file del formulario.
        Cada elemento es, a su vez, otro array asociativo con los siguientes elementos:

            - name          ->      Nombre del archivo subido. Con la convención de nombres 
                                    del SO del cliente.
            - type          ->      Tipo MIME del archivo.
            - size          ->      Tamaño en bytes del archivo.
            - tmp_name      ->      Nombre del archivo subido temporalmente.
            - error         ->      Código de error si hubo alguno.
    */

    /*
        1ª Comprobación. Existe el control del formulario para subir un archivo y la 
        petición ha llegado al servidor.
    */

if( isset($_FILES["archivos_cv"]) ) {
    // Existe el campo de formulario archivo_cv
    // Puede existir incluso si el usuario no ha enviado ningún archivo.

    echo "<h3>Datos del archivo</h3>";
    echo "<p>";
    echo "Nombre: {$_FILES['archivo_cv']['name']}<br>";
    echo "Tipo: {$_FILES['archivo_cv']['type']}<br>";
    echo "Tamaño: {$_FILES['archivo_cv']['type']}<br>";
    echo "Directorio temporal: {$_FILES['archivo_cv']['tmp_name']}<br>";
    echo "Error: {$_FILES['archivo_cv']['error']}";
    echo "</p>";
    
    /*
        2ª Comprobación. El usuario ha enviado el formulario pero sin un archivo. 
        El usuario no rellena el campo para el archivo.
    */
}
else if( $_FILES['archivo_cv']['error'] == UPLOAD_ERR_NO_FILE ) {
// if( empty($_FILES['archivo_cv']['name']) ){
// Maneras de comprobar que no se ha subido el archivo.
        
echo "<h3>Error. No se ha subido el archivo.</h3>";
}
else if( $_FILES['archivo_cv']['error'] == UPLOAD_ERR_INI_SIZE ) {
// El archivo excede lo inicado por la directiva upload_max_filesize
echo "<h3>Error. El tamaño del archivo supera a upload_max_filesize.</h3>";
}
else if( $_FILES['archivo_cv']['error'] == UPLOAD_ERR_FORM_SIZE ) {
// El archivo excede lo indicado por MAX_FILE_SIZE
echo "<h3>Error. El tamaño del archivo supera a MAX_FILE_SIZE.</h3>";
}
/* 
4ª Comprobación. El tamaño de archivo está dentro del límite 
establecido por el desarrollador.
*/
elseif( $_FILES['archivo_cv']['size'] > $limite_pdf ) {
echo "<h3>Error. El tamaño del archivo supera a $limite_pdf bytes</h3>";
}

/*
5ª Comprobación. El tipo de archivo es el requerido.

- Si comprobamos $_FILE['archivo_cv]['type'] podemos añadir alguna vulnerabilidad.
- Comprobar el tipo MIME del contenido del archivo.
- Como es posible que se admitan varios tipos de archivo, es recomendable un array 
  con los tipos admitidos.
*/
else{
$tipos_permitidos = ["application/pdf"];
$tipo_mime1 = mime_content_type($_FILES['archivo_cv']['tmp_name']);
$finfo = finfo_open(FILEINFO_MIME_TYPE);    // Abre el fileinfo en modo tipo MIME
$tipo_mime2 = finfo_file($finfo, $_FILES['archivo_cv']['tmp_name']) ;
finfo_close($finfo);
$tipo_mime3 = $_FILES['archivo_cv']['type'];

if( $tipo_mime1 == $tipo_mime2 AND $tipo_mime2 == $tipo_mime3 && 
in_array($tipo_mime1, $tipos_permitidos)) {
// El tipo es el permitido 

// Se han pasado todas las comprobaciones y guardamos el archivo
$nombre_archivo = DIRECTORIO_PDF . $_FILES['archivo_cv']['name'];
if( move_uploaded_file($_FILES['archivo_cv']['tmp_name'], $nombre_archivo) ) {
echo "<h3>Archivo subido con éxito. Si quiere puede subir más archivos</h3>";
}
else{
echo "<h3>Error al guardar el archivo</h3>";
};
}
else{
    echo "<h3>El tipo del archivo $tipo_mime2 no es correcto</h3>";
};
}
else{
    echo "<h3>El formulario no contiene el campo archivo_cv.</h3>";
}

?>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
        <!-- Límite blando de PHP. Si el archivo tiene un tamaño superior a 1 MB, PHP lo descarga. -->
        <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="<?=1024*1024?>">
        <!-- Límite blando del usuario. El script comprueba que el archivo subido no supera este 
         tamaño: 100 KB -->
        <input type="hidden" name="limite_pdf" id="limite_pdf" value="<?=100*1024?>">
        <fieldset>
            <legend>Introduzca sus datos y su Curriculum Vitae</legend>

            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" size="10">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" size="40">

            <!-- Atributo accept. Se emplea para poner un filtro al campo file. -->
            <label for="archivo_cv">Archivo CV (solo pdf)</label>
            <input type="file" name="archivo_cv" id="archivo_cv" accept="application/pdf">

            <label for="archivo.png">Foto</label>
            <input type="file" name="archivo.png" id="archivo.png" accept="image/png">

        </fieldset>
        <input type="submit" id="operacion" name="operacion" value="Enviar">

    </form>

<?php
fin_html();


?>