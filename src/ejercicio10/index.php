<?php
session_start();

$muestraFormulario = true;
$resultado = "";

// Inicializar el array si no existe o no es array
if (!isset($_SESSION["numeros"]) || !is_array($_SESSION["numeros"])) {
    $_SESSION["numeros"] = [];
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Si se pulsa "Limpiar formulario"
    if (isset($_POST["limpiar"])) {
        $_SESSION["numeros"] = [];
        $resultado = "";
    }

    // Si se pulsa "Agregar número"
    elseif (isset($_POST["agregar"])) {
        if (isset($_POST["numero"]) && $_POST["numero"] !== "") {
            $num = floatval($_POST["numero"]);
            if ($num >= 0) {
                $_SESSION["numeros"][] = $num;
            } else {
                $resultado = "<p style='color:red;'>Solo se permiten números positivos.</p>";
            }
        } else {
            $resultado = "<p style='color:red;'>Introduce un número.</p>";
        }
    }

    // Si se pulsa "Calcular media"
    elseif (isset($_POST["calcular"])) {
        if (count($_SESSION["numeros"]) > 0) {
            $suma = array_sum($_SESSION["numeros"]);
            $media = $suma / count($_SESSION["numeros"]);
            $mediaFormateada = number_format($media, 2, ',', '.');
            $resultado = "<h3>Media: $mediaFormateada</h3>";
        } else {
            $resultado = "<h3>Los números no son válido.</h3>";
        }
        $_SESSION["numeros"] = [];
        $muestraFormulario = false;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Calcular Media</title>
</head>
<body>

  <h1>10. Media de números positivos</h1>
  <p>Introduce números positivos y pulsa “Calcular media”.</p>

  <?php if ($muestraFormulario): ?>
    <form method="post" action="">
      Número: <input type="number" name="numero" step="any" min="0">
      <br><br>
      <button type="submit" name="agregar">Agregar número</button>
      <button type="submit" name="calcular">Calcular media</button>
      <button type="submit" name="limpiar">Limpiar formulario</button>
    </form>

    <?php
      if (!empty($_SESSION["numeros"])) {
          echo "<p><strong>Números introducidos:</strong> " . implode(", ", $_SESSION["numeros"]) . "</p>";
      }
      echo $resultado;
    ?>

  <?php else: ?>

    <?php echo $resultado; ?>
    <br><br>
    <form method="post" action="">
      <button type="submit" name="limpiar">Volver a empezar</button>
    </form>

  <?php endif; ?>

  <!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>

