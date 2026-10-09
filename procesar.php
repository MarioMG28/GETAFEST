<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
} else {
    echo "<div class='card'><p>Acceso no permitido.</p><a href='index.php'>Volver al formulario</a></div>";
}



$edad = $_POST['edad'];

if ($edad < 18) {
    echo "<div class='card'>";
    echo "<h2>¡Acceso denegado!</h2>";
    echo "<p>Lo sentimos, el evento es exclusivo para mayores de edad.</p>";
    echo "<a href='index.php' class='btn'>Volver al formulario</a>";
    echo "</div>";
} else {
}


if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $nombreFoto = $_FILES['foto']['name'];
    $rutaTemporal = $_FILES['foto']['tmp_name'];

    $rutaDestino = "images/" . $nombreFoto;

    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
    } else {
        echo "<p>Error al mover la imagen a la carpeta.</p>";
    }
} else {
    echo "<p>No se ha subido ninguna foto o ha ocurrido un error.</p>";
}



$precioBase = 0;
$tipoEntrada = $_POST['tipo_entrada'];

if ($tipoEntrada == "General" || $tipoEntrada == "50") {
    $precioBase = 50;
} elseif ($tipoEntrada == "VIP" || $tipoEntrada == "120") {
    $precioBase = 120;
} elseif ($tipoEntrada == "SuperVIP" || $tipoEntrada == "180") {
    $precioBase = 180;
}

$suplementoDias = 0;
$diasSeleccionados = [];

if (isset($_POST['dias'])) {
    $diasSeleccionados = $_POST['dias'];

    foreach ($diasSeleccionados as $dia) {
        $suplementoDias += 10;
    }
}

$precioTotal = $precioBase + $suplementoDias;



echo "<div class='card'>";
echo "<h2>🎉 Acreditación Generada 🎉</h2>";

echo "<img src='$rutaDestino' alt='Foto de perfil' style='width:150px; height:150px; object-fit:cover; border-radius:50%;'>";

echo "<p><strong>Nombre:</strong> " . $_POST['nombre'] . "</p>";
echo "<p><strong>Correo:</strong> " . $_POST['email'] . "</p>";
echo "<p><strong>Tipo de Entrada:</strong> " . $tipoEntrada . "</p>";

echo "<p><strong>Días de asistencia:</strong> ";
if (!empty($diasSeleccionados)) {
    echo implode(", ", $diasSeleccionados);
} else {
    echo "Ninguno extra";
}
echo "</p>";

echo "<p><strong>Método de pago:</strong> " . $_POST['metodoPago'] . "</p>";

echo "<hr>";
echo "<p>Precio Base: " . $precioBase . " €</p>";
echo "<p>Suplemento Días: " . $suplementoDias . " €</p>";
echo "<h3>Precio Total a Pagar: " . $precioTotal . " €</h3>";

echo "<br><a href='index.php' class='btn'>Volver al inicio</a>";
echo "</div>";