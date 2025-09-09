<?php
// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = isset($_POST['base']) ? floatval($_POST['base']) : 0;
    $iva = round($base * 0.21, 2);
    $total = round($base + $iva, 2);
}

// Mostrar el formulario y el resultado
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Factura con IVA</title>
</head>
<body>
    <h2>Calculadora de Factura (IVA 21%)</h2>
    <form method="post">
        <label for="base">Base imponible (€):</label>
        <input type="number" step="0.01" name="base" id="base" required>
        <input type="submit" value="Calcular">
    </form>';

if (isset($total)) {
    echo "<p>Base imponible: <strong>$base €</strong></p>";
    echo "<p>IVA (21%): <strong>$iva €</strong></p>";
    echo "<p>Total factura: <strong>$total €</strong></p>";
}

echo '</body>
</html>';
?>
