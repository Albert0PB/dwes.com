<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Subida de archivos. Importación de datos", 
    ["/styles/general.css", "/styles/formulario.css", "/styles/tablas.css"]);

echo "<header>Importación de datos</header>";
    
    
    
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    if( isset($_FILES['archivo_csv']) && $_FILES['archivo_csv']['error'] == UPLOAD_ERR_OK ) {
        $fila_cabecera = isset( $_POST['fila_cabecera']);
        
        echo "<table>";
        echo "<caption>Importación de " . $_FILES['archivo_csv']['name'] . "</caption>";
        $archivo = fopen($_FILES['archivo_csv']['tmp_name'], "r");
        if( $archivo ){
            // El archivo está abierto y lo leemos.
            if( $fila_cabecera ) {
                
                $cabecera = fgetcsv($archivo);
                echo "<thead>";
                echo "<tr>";
                foreach( $cabecera as $columna ) {
                    echo "<th>$columna</th>";
                };
                echo "</tr>";
                echo "</thead>";
            }
            echo "<tbody>";
            $cabecera_insertada = False;
            while ( $fila = fgetcsv($archivo)) {
                if( !$fila_cabecera && !$cabecera_insertada ){
                    echo "<tr>";
                    for( $i = 0; $i < count($fila); $i++ ) {
                        echo "<th>Campo_{$i}</th>";
                    };
                    echo "</tr>";
                    $cabecera_insertada = True;
                }

                echo "<tr>";
                foreach( $fila as $campo ) {
                    echo "<td>$campo</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
        };
        fclose($archivo);
        echo "</table>";
        echo "<a href='{$_SERVER['PHP_SELF']}'> Importar otro archivo </a>";

    }
    else{
        echo "<h3>Error. El archivo no se ha subido.</h3>";
    };
}
else{
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

    <fieldset>
        <legend>Introduzca el archivo con los datos a importar</legend>
        
        <label for="file_cabecera">Fila de cabecera</label>
        <input type="checkbox" name="fila_cabecera" id="fila_cabecera" checked>

        <label for="archivo_csv">Archivo con los datos</label>
        <input type="file" name="archivo_csv" id="archivo_csv" accept="text/csv">


    </fieldset>
    <!-- <input type="submit" value="Importar" name="operacion" id="operacion"> -->
    
    <input type="hidden" name="operacion" value="importar" id="op1">
    <button type="submit" name="operacion" id="operacion">Importar</button>



</form>
<?php
}

fin_html();
?>