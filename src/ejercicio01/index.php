<?php
// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $euros = isset($_POST['euros']) ? floatval($_POST['euros']) : 0;
    $pesetas = round($euros * 166.386, 2);
}

// Mostrar el formulario y el resultado
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Euros a Pesetas</title>
</head>
<body>
    <h2>1. Conversor de Euros a Pesetas</h2>
    <form method="post">
        <label for="euros">Introduce la cantidad en euros:</label>
        <input type="number" step="0.01" name="euros" id="euros" required>
        <input type="submit" value="Convertir">
    </form>';

if (isset($pesetas)) {
    echo "<p><strong>$euros €</strong> son <strong>$pesetas pesetas</strong>.</p>";
}

echo '</body>
</html>';
?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

