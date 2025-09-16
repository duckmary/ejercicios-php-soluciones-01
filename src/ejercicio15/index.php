<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Movimientos del Alfil</title>
  <style>
    table { border-collapse: collapse; margin-top: 20px; }
    td {
      width: 50px; height: 50px;
      text-align: center; vertical-align: middle;
      font-size: 24px;
    }
    .blanco { background: white; }
    .negro { background: black; }
    .movimiento { background: blue; }
    .alfil { background: green; color: white; font-weight: bold; }
  </style>
</head>
<body>
  <h1>Posibles movimientos del alfil</h1>

<?php
$muestraFormulario = true;

if (isset($_POST["posicion"])) {
    $posicion = strtolower($_POST["posicion"]);

    // Validar formato correcto
    if (preg_match("/^[a-h][1-8]$/", $posicion)) {
        $columna = ord($posicion[0]) - ord("a");        // columna: 'a' → 0, ..., 'h' → 7
        $fila = 8 - (int)$posicion[1];              // fila: '1' → 7, ..., '8' → 0

        echo "<h3>Posibles movimientos desde $posicion </h3>";
        echo "<table border='1'>";
        for ($i = 0; $i < 8; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 8; $j++) {
                $clase = (($i + $j) % 2 == 0) ? "blanco" : "negro";

                if ($i == $fila && $j == $columna) {
                    echo "<td class='alfil'>♗</td>";
                } elseif (abs($fila - $i) == abs($columna - $j)) {
                    echo "<td class='movimiento'></td>";
                } else {
                    echo "<td class='$clase'></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        $muestraFormulario = false;
    } else {
        echo "<p style='color:red;'>La posición debe estar entre a1 y h8.</p>";
    }
}
?>

<?php if ($muestraFormulario): ?>
  <form method="post" action="">
    <label for="posicion">Posición (ej: b7):</label>
    <input type="text" name="posicion" id="posicion" pattern="[a-h][1-8]" required>
    <input type="submit" value="Mostrar movimientos">
  </form>
<?php else: ?>
  <br><br>
  <form method="post" action="">
    <input type="submit" value="Volver a intentar">
  </form>
<?php endif; ?>

<!-- Imagen del tablero al final -->
<br><br>
<h3>Vista del tablero:</h3>
<img src="../../img/tablero.png" alt="Tablero de ajedrez" width="400">

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>

