<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Factorial</title>
</head>
<body>
  <h1>13. Calcular el Factorial de un número.</h1>

<?php
$muestraFormulario = true;
$resultado = "";

// Si se pulsa "Limpiar"
if (isset($_POST["limpiar"])) {
    $_POST = [];
    $resultado = "";
}

// Si se envía el formulario
if (isset($_POST["numero"]) && isset($_POST["calcular"])) {
    $n = (int)$_POST["numero"];

    if ($n >= 0) {
        $factorial = 1;
        $calculo = "";

        for ($i = $n; $i >= 1; $i--) {
            $factorial *= $i;
            $calculo .= $i;
            if ($i > 1) {
                $calculo .= " × ";
            }
        }

        $resultado = "<h3>$n! = $calculo = $factorial</h3>";
        $muestraFormulario = false;
    } else {
        $resultado = "<p style='color:red;'>Introduce un número entero no negativo.</p>";
    }
}
?>

<?php if ($muestraFormulario): ?>
  <form method="post" action="">
    <label for="numero">Número:</label>
    <input type="number" name="numero" id="numero" min="0" required>
    <br><br>
    <input type="submit" name="calcular" value="Calcular factorial">
  </form>
<?php endif; ?>

<?= $resultado ?>

<?php if (!$muestraFormulario): ?>
  <br><br>
  <form method="post" action="">
    <input type="submit" name="limpiar" value="Volver a intentar">
  </form>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>

