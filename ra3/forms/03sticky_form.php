<?php
    /*
        Sticky form
        Formularios que presentan por defecto los valores de un envío previo del mismo formulario.
        Al generar el formulario se añaden:
            - Para los input, el atributo value con el valor por defecto, añadido mediante 
            sentencia echo abreviada.
            - Para los checkbox o radio se añade el atribute checked si en el envío previo el campo 
            se activó. 
            - Para select/option se añade selected al option que se eligió en el envío previo.
        */
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Sticky form", ["/styles/general.css", "/styles/formulario.css"]);

$email = isset($_POST['email']) ? $_POST['email'] : "";
$tema = isset($_POST['tema']) ? $_POST['tema'] : "";
$dpto = isset($_POST['dpto']) ? $_POST['dpto'] : "";
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
$sugerencias = isset($_POST['sugerencias']) ? $_POST['sugerencias'] : "";

$mensaje = $_SERVER['REQUEST_METHOD'] == "POST" ? "Sugerencia recibida y registrada" : "";


?>
    <header>Sugerencias del ciudadano</header>
    <?=$mensaje != "" ? "<p>$mensaje</p>" : ""?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
        <fieldset>
            <legend>Indique su sugerencia</legend>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$email?>">
            
            <label for="tema">Tema</label>
            <select name="tema" id="tema" size="1">
                <option value="" <?=$tema == "" ? "selected" : ""?>>Elija un tema</option>
                <option value="in" <?=$tema == "in" ? "selected" : ""?>>Infraestructura</option>
                <option value="lc" <?=$tema == "lc" ? "selected" : ""?>>Limpieza de calles</option>
                <option value="fe" <?=$tema == "fe" ? "selected" : ""?>>Feria</option>
                <option value="re" <?=$tema == "re" ? "selected" : ""?>>Recogida de enseres</option>
            </select>

            <label for="departamento">Departamento</label>
            <div>
                <input type="radio" name="dpto" id="dpto1" value="op"
                    <?=$dpto == "op" ? "checked" : ""?>>Obra pública<br>
                <input type="radio" name="dpto" id="dpto2" value="cf"
                    <?=$dpto == "cf" ? "checked" : ""?>>Concejalía de festejos<br>
                <input type="radio" name="dpto" id="dpto3" value="sa"
                    <?=$dpto == "sa" ? "checked" : ""?>>Saneamiento<br>
            </div>

            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" size="40" 
                value="<?=$titulo?>">

            <label for="sugerencias">Sugerencias</label>
            <textarea name="sugerencias" id="sugerencias" rows="3" cols="30"><?=$sugerencias?></textarea>
        </fieldset>
        <input type="submit" value="Registrar" name="operacion" id="operacion">
            
    </form>

<?php

fin_html();
?>