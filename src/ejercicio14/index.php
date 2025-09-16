<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Brisca - Cartas y Puntos</title>
</head>
<body>
  <h1>14. Cartas de la baraja española</h1>

<?php
// Puntos por figura
$puntos = [
  "As" => 11,
  "3" => 10,
  "Rey" => 4,
  "Caballo" => 3,
  "Sota" => 2,
  "2" => 0,
  "4" => 0,
  "5" => 0,
  "6" => 0,
  "7" => 0
];

// Palos
$palos = ["Oros", "Copas", "Espadas", "Bastos"];

// Crear baraja
$baraja = [];
foreach ($palos as $palo) {
  foreach ($puntos as $figura => $valor) {
    $baraja[] = [$figura, $palo, $valor];
  }
}

// Mezclar baraja manualmente
for ($i = 0; $i < count($baraja); $i++) {
  $j = rand(0, count($baraja) - 1);
  $temp = $baraja[$i];
  $baraja[$i] = $baraja[$j];
  $baraja[$j] = $temp;
}

// Seleccionar 10 cartas sin repetir
$mano = [];
for ($i = 0; $i < 10; $i++) {
  $mano[] = $baraja[$i];
}

// Mostrar cartas y sumar puntos
$total = 0;
echo "<ul>";
for ($i = 0; $i < count($mano); $i++) {
  $figura = $mano[$i][0];
  $palo = $mano[$i][1];
  $valor = $mano[$i][2];
  echo "<li>$figura de $palo (puntos: $valor)</li>";
  $total += $valor;
}
echo "</ul>";
echo "<h3>Total de puntos: $total</h3>";
?>

<form method="post" action="">
  <input type="submit" value="Volver a intentar">
</form>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>


