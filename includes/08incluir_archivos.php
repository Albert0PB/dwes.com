<?php

    /*
        Para incluir archivos hay 4 funciones que funcionan casi igual:
            - include(): incluye el contenido del documento en el lugar donde se invoque.
            Si el archivo no existe, se emite un aviso y el script continúa. 

            - require(): incluye el contenido del argumento en el lugar donde se invoca. 
            Si el archivo no existe, se genera un error fatal y termina la ejecución del script.

            ¿Qué ocurre si incluyo el mismo archivo más de una vez? Error por duplicidad de 
            definición de funciones. Para evitarlo:

            - include_once(): igual que include() pero si el archivo había sido previamente 
            incluido, no lo incluye.

            - require_one(): igual que require() pero si el archivo ya había sido previamente 
            incluido, no lo incluye.



    */

include("/includes/funciones.php");

inicio_html( "Inclusión de archivos", ["/styles/general.css"] );
echo "<h1>Inclusión de archivos PHP en scripts PHP</h1>";


fin_html();

?>