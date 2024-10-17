<?php
/* 
 * Script que presenta un formulario donde se introduce un número entero
 * y se devuelve una respuesta mostrando el mismo número en binario, octal, 
 * hexadecimal y decimal.
 */


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 1</title>
	<meta name="author" content="Alberto Pérez Bernabeu">
</head>
<body>
	<h1>Formularios. Ejercicio 1</h1>

	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">

		<fieldset>
			<legend>Indique un número para mostrarlo en diferentes bases.</legend>
			
			<label for="numero_introducido">Su número</label>
			<input type="number" name="numero_introducido" id="numero_introducido" 
				value="<?=$numero_elegido?>" >
			</fieldset>
			<input type="submit" value="operacion" name="Enviar">
	</form>
<?php
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$numero_elegido = $_POST['numero_introducido'];
	$numero_binario = decbin($numero_elegido);
	$numero_octal = decoct($numero_elegido);
	$numero_hexadecimal = dechex($numero_elegido);
?>	
	<table>
	<tr>
	<th>Número introducido</th>
	<th>Binario</th>
	<th>Octal</th>
	<th>Hexadecimal</th>
	</tr>
	<tr>
	<td><?=$numero_elegido?></td>
	<td><?=$numero_binario?></td>
	<td><?=$numero_octal?></td>
	<td><?=$numero_hexadecimal?></td>
	</tr>
	</table>
<?php
};
?>
</body>
</html>