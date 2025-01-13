<?php
$alumnos = [
    ['id' => 1, 'nombre' => 'Nicolás', 'apellido' => 'Ruiz'],
    ['id' => 2, 'nombre' => 'Israel', 'apellido' => 'Valderrama'],
    ['id' => 3, 'nombre' => 'Alejandro', 'apellido' => 'Seoana'],
    ['id' => 4, 'nombre' => 'Alejandro', 'apellido' => 'Díaz'],
    ['id' => 5, 'nombre' => 'Victor', 'apellido' => 'Jimenez'],
    ['id' => 6, 'nombre' => 'Alejandro', 'apellido' => 'González'],
    ['id' => 7, 'nombre' => 'Alvaro', 'apellido' => 'Caro'],
    ['id' => 8, 'nombre' => 'Angel', 'apellido' => 'Martinez'],
    ['id' => 9, 'nombre' => 'Gonzalo', 'apellido' => 'Pulido'],
    ['id' => 10, 'nombre' => 'Yeray', 'apellido' => 'Almoguera'],
    ['id' => 11, 'nombre' => 'Javier', 'apellido' => 'Rodriguez'],
    ['id' => 12, 'nombre' => 'Santiago', 'apellido' => 'Dominguez'],
    ['id' => 13, 'nombre' => 'Carlos', 'apellido' => 'Cordero'],
    ['id' => 14, 'nombre' => 'Lucía', 'apellido' => 'Espinosa'],
    ['id' => 15, 'nombre' => 'Felix', 'apellido' => 'Sánchez'],
    ['id' => 16, 'nombre' => 'Pablo', 'apellido' => 'Olvera'],
    ['id' => 17, 'nombre' => 'Isaac', 'apellido' => 'Vallet']
];

$busqueda = $_GET['nombre'] ?? '';

$resultados = array_filter($alumnos, fn($alumno) => stripos($alumno['nombre'], $busqueda) !== false);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Alumnos</title>
</head>
<body>
    <h1>Búsqueda de Alumnos</h1>
    <form method="get">
        <input type="text" name="nombre" value="<?= htmlspecialchars($busqueda); ?>" placeholder="Buscar por nombre">
        <button type="submit">Buscar</button>
    </form>

    <h2>Resultados:</h2>
    <?php if ($resultados): ?>
        <ul>
            <?php foreach ($resultados as $alumno): ?>
                <li><?= htmlspecialchars($alumno['nombre'] . ' ' . $alumno['apellido']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron resultados.</p>
    <?php endif; ?>

    <p>

</body>
</html>

