<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pirámide con imágenes</title>
</head>
<body>
  <h1>12. Pirámide con imágenes</h1>
  <p>Introduce la altura y elige una figura para construir la pirámide.</p>

<?php
$muestraFormulario = true;
$resultado = "";

// Lista blanca de imágenes permitidas
$figurasPermitidas = [
    "bola.png",
    "ladrillo.png",
    "estrella.png",
    "flor.png",
    "corazon.png"
];

// Procesar el formulario
if (isset($_POST["altura"]) && isset($_POST["figura"])) {
    $altura = (int)$_POST["altura"];
    $figura = $_POST["figura"];

    if ($altura > 0 && in_array($figura, $figurasPermitidas)) {
        $rutaImagen = "../../img/" . $figura;
        $resultado = "<h3>Pirámide de altura $altura</h3>";
        for ($i = 1; $i <= $altura; $i++) {
            $espacios = $altura - $i;
            $resultado .= str_repeat("&nbsp;&nbsp;", $espacios); // centrar
            $resultado .= str_repeat("<img src='$rutaImagen' width='30'>", $i) . "<br>";
        }
        $muestraFormulario = false;
    } else {
        $resultado = "<p style='color:red;'>Datos inválidos. Verifica la altura y la figura seleccionada.</p>";
    }
}
?>

<?php if ($muestraFormulario): ?>
  <form method="post" action="">
    <label for="altura">Altura:</label>
    <input type="number" name="altura" id="altura" min="1" max="20" required><br><br>

    <label>Elige figura:</label><br>
    <input type="radio" name="figura" value="bola.png" required> Bolita<br>
    <input type="radio" name="figura" value="ladrillo.png"> Ladrillo<br>
    <input type="radio" name="figura" value="estrella.png"> Estrella<br>
    <input type="radio" name="figura" value="flor.png"> Flor<br>
    <input type="radio" name="figura" value="corazon.png"> Corazón<br><br>

    <input type="submit" value="Construir pirámide">
  </form>
<?php else: ?>
  <?= $resultado ?>
  <br><br>
  <form method="post" action="">
    <input type="submit" value="Volver a intentar">
  </form>
<?php endif; ?>

<!-- Botón para volver a index.php -->
<br><br>
<form action="../index.php" method="get">
  <input type="submit" value="Página principal..." style="background-color: blue; color: white; padding: 8px 16px; border: none; cursor: pointer;">
</form>

</body>
</html>
