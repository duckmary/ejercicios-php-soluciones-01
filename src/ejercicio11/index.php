<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Serie de Fibonacci</title>
</head>
<body>
  <h1>11. Serie de Fibonacci</h1>
  <p>Introduce un número <strong>n</strong> para ver los primeros términos de la serie de Fibonacci.</p>

<?php
$muestraFormulario = true;
$resultado = "";

// Verificar si se ha enviado el formulario
if (isset($_POST["n"])) {
    $n = (int)$_POST["n"];

    if ($n > 0) {
        $a = 0;
        $b = 1;
        $resultado = "<h3>Los primeros $n términos de la serie:</h3><p>";

        for ($i = 0; $i < $n; $i++) {
            $resultado .= $a . " ";
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }

        $resultado .= "</p>";
        $muestraFormulario = false;
    } else {
        $resultado = "<p style='color:red;'>Por favor, introduce un número mayor que cero.</p>";
    }
}
?>

<?php if ($muestraFormulario): ?>
  <form method="post" action="">
    <label for="n">Cantidad de términos:</label>
    <input type="number" name="n" id="n" min="1" required>
    <input type="submit" value="Mostrar serie">
  </form>
  <?= $resultado ?>
<?php else: ?>
  <?= $resultado ?>
  <br><br>
  <form method="post" action="">
    <input type="submit" value="Limpiar formulario">
  </form>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
