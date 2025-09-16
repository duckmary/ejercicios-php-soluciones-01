<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Multiplicar</title>
</head>
<body>
  <h1>9. Tabla de Multiplicar</h1>
  <p>Introduce un número entero para ver su tabla de multiplicar del 1 al 10</p>

<?php
$muestraFormulario = true;
$resultado = "";

if (isset($_POST["numero"])) {
    $num = (int)$_POST["numero"];
    $resultado = "<h3>Tabla del $num</h3>";
    $resultado .= "<table border='1' cellpadding='15' cellspacing='0'>";
    $resultado .= "<tr><th>Multiplicación</th><th>Resultado</th></tr>";
//bucler para multiplicar de 1 a 10
    for ($i = 1; $i <= 10; $i++) {
        $resultado .= "<tr><td>$num × $i</td><td>" . ($num * $i) . "</td></tr>";
    }

    $resultado .= "</table>";
    $muestraFormulario = false;
}
?>

<?php if ($muestraFormulario): ?>
  <form action="index.php" method="post">
    <label for="numero">Número:</label>
    <input type="number" name="numero" id="numero" required>
    <br><br>
    <input type="submit" value="Mostrar tabla">
  </form>
<?php else: ?>
  <?= $resultado ?>
  <br>
  <a href="index.php"><button>Volver a intentar</button></a>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
