<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Media noche</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>7. ¿Cuánto falta hasta medianoche?</h1>

  <p>Vamos a calcular cuántos segundos faltan hasta medianoche.</p>

<?php
$muestraFormulario = true;

// Si se ha enviado el formulario
if (isset($_POST["horaIntroducida"]) && isset($_POST["minutosIntroducido"])) {
  $horaIntroducida = (int)$_POST["horaIntroducida"];
  $minutosIntroducido = (int)$_POST["minutosIntroducido"];

  // Validación básica
  if ($horaIntroducida >= 0 && $horaIntroducida <= 23 && $minutosIntroducido >= 0 && $minutosIntroducido <= 59) {
    $horaSegundos = $horaIntroducida * 3600;
    $minutosSegundos = $minutosIntroducido * 60;
    $resultadoSegundos = 86400 - ($horaSegundos + $minutosSegundos);

    echo "<p>Faltan <strong>$resultadoSegundos segundos</strong> hasta medianoche.</p>";
    $muestraFormulario = false;
  } else {
    echo "<p style='color:red;'>Por favor, introduce una hora entre 0 y 23 y minutos entre 0 y 59.</p>";
  }
}
?>

<?php if ($muestraFormulario): ?>
  <form action="index.php" method="post">
    <label for="horaIntroducida">Introduce la hora (0–23):</label>
    <input type="number" name="horaIntroducida" id="horaIntroducida" min="0" max="23" required>
    
    <br><br>
    
    <label for="minutosIntroducido">Introduce los minutos (0–59):</label>
    <input type="number" name="minutosIntroducido" id="minutosIntroducido" min="0" max="59" required>
    
    <br><br>
    
    <input type="submit" value="Aceptar">
  </form>
<?php else: ?>
  <a href="index.php"><button>Limpiar Formulario</button></a>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
