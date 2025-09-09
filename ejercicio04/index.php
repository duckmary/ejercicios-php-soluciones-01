<?php
// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hora = isset($_POST['hora']) ? intval($_POST['hora']) : -1;

    if ($hora >= 0 && $hora <= 24) {
        if ($hora >= 6 && $hora <= 12) {
            $saludo = "Buenos días ☀️";
        } elseif ($hora >= 13 && $hora <= 20) {
            $saludo = "Buenas tardes 🌇";
        } else {
            // Horas de 21 a 24 y de 0 a 5
            $saludo = "Buenas noches 🌙";
        }
    } else {
        $saludo = "Por favor, introduce una hora válida entre 0 y 24.";
    }
}

// Mostrar el formulario y el resultado
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo según la hora</title>
</head>
<body>
    <h2>¿Qué saludo corresponde a esta hora?</h2>
    <form method="post">
        <label for="hora">Introduce la hora (0–24):</label>
        <input type="number" name="hora"  min="0" max="24" required>
        <input type="submit" value="Mostrar saludo">
    </form>';

if (isset($saludo)) {
    echo "<p><strong>$saludo</strong></p>";
}

echo '</body>
</html>';
?>