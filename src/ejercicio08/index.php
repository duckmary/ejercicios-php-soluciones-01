<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ordena los números</title>
</head>
<body>
  <h1>8. Números ordenados</h1>
  <p>Ordena de menor a mayor los tres números enteros indicados</p>

<?php
$muestraFormulario = true;
$resultado = "";

if (isset($_POST["primerValor"]) && isset($_POST["segundoValor"]) && isset($_POST["tercerValor"])) {
    $a = (int)$_POST["primerValor"];
    $b = (int)$_POST["segundoValor"];
    $c = (int)$_POST["tercerValor"];

    // Reordenar manualmente usando intercambios
    if ($a > $b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    if ($a > $c) {
        $temp = $a;
        $a = $c;
        $c = $temp;
    }

    if ($b > $c) {
        $temp = $b;
        $b = $c;
        $c = $temp;
    }

    $resultado = "<h3>Valores ordenados de menor a mayor:</h3><p>$a, $b, $c</p>";
    $muestraFormulario = false;
}
?>

<?php if ($muestraFormulario): ?>
  <form action="index.php" method="post">
    <label for="primerValor">Introduce el primer número:</label>
    <input type="number" name="primerValor" id="primerValor" required>
    <br><br>

    <label for="segundoValor">Introduce el segundo número:</label>
    <input type="number" name="segundoValor" id="segundoValor" required>
    <br><br>

    <label for="tercerValor">Introduce el tercer número:</label>
    <input type="number" name="tercerValor" id="tercerValor" required>
    <br><br>

    <input type="submit" value="Aceptar">
  </form>
<?php else: ?>
  <?= $resultado ?>
  <a href="index.php"><button>Limpiar Formulario</button></a>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
