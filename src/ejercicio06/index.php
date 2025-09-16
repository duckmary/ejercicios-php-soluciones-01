<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta tu Horóscopo</title>
</head>
<body>
    <h2>6. Descubre tu signo del horóscopo</h2>

    <form method="post">
        <label for="dia">Día:</label>
        <input type="number" name="dia" min="1" max="31" required><br><br>

        <label for="mes">Mes:</label>
        <input type="number" name="mes" min="1" max="12" required><br><br>

        <input type="submit" value="Consultar">
    </form>

    <?php
    function obtenerHoroscopo($dia, $mes) {
        if (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) {
            return "Acuario";
        } elseif (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
            return "Piscis";
        } elseif (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) {
            return "Aries";
        } elseif (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) {
            return "Tauro";
        } elseif (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
            return "Géminis";
        } elseif (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) {
            return "Cáncer";
        } elseif (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
            return "Leo";
        } elseif (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
            return "Virgo";
        } elseif (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) {
            return "Libra";
        } elseif (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) {
            return "Escorpio";
        } elseif (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) {
            return "Sagitario";
        } elseif (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19)) {
            return "Capricornio";
        } else {
            return "Fecha inválida";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dia = $_POST["dia"];
        $mes = $_POST["mes"];
        $signo = obtenerHoroscopo($dia, $mes);
        echo "<h3>Tu signo del horóscopo es: <strong>$signo</strong></h3>";
    }
    ?>

    <!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
