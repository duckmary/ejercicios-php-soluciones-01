<?php
// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $horas = isset($_POST['horas']) ? intval($_POST['horas']) : 0;

    if ($horas <= 40) {
        $salario = $horas * 12;
    } else {
        $horas_extra = $horas - 40;
        $salario = (40 * 12) + ($horas_extra * 16);
    }
}

// Mostrar el formulario y el resultado
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Salario Semanal</title>
    <style>
        body {
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        h2 {
            font-size: 16px;
        }
        label, input, p {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <h2>5. Calculadora de Salario Semanal</h2>
    <form method="post">
        <label for="horas">Horas trabajadas esta semana:</label>
        <input type="number" name="horas" id="horas" min="0" required>
        <input type="submit" value="Calcular salario">
    </form>';

if (isset($salario)) {
    echo "<p>Horas trabajadas: <strong>$horas</strong></p>";
    echo "<p>Salario semanal: <strong>$salario €</strong></p>";
}

echo '</body>
</html>';
?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>
