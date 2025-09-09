<?php
// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $radio = isset($_POST['radio']) ? floatval($_POST['radio']) : 0;
    $altura = isset($_POST['altura']) ? floatval($_POST['altura']) : 0;
    $volumen = round((1/3) * pi() * pow($radio, 2) * $altura, 2);
}

// Mostrar el formulario y el resultado
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Volumen de un Cono</title>
</head>
<body>
    <h2>Calculadora de Volumen de un Cono</h2>
    <form method="post">
        <label for="radio">Radio (r):</label>
        <input type="number" step="0.01" name="radio" id="radio" required><br><br>
        <label for="altura">Altura (h):</label>
        <input type="number" step="0.01" name="altura" id="altura" required><br><br>
        <input type="submit" value="Calcular Volumen">
    </form>';

if (isset($volumen)) {
    echo "<p>Volumen del cono: <strong>$volumen unidades cúbicas</strong></p>";
}

echo '</body>
</html>';
?>

