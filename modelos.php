<!DOCTYPE html>
<html>
<head>
    <style>
        figure {
            border: 1px #cccccc solid;
            padding: 4px;
            margin: auto;
        }

        figcaption {
            background-color: navy;
            color: white;
            font-weight: bolder;
            font-style: italic;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include "Client/clientSoap.php";

$marca = isset($_GET["marca"]) ? $_GET["marca"] : "Ford";

try {
    $modelos = $client->getModels($marca);
    $modelos = json_decode($modelos, true);

    // Validar si la respuesta JSON es válida
    if (!is_array($modelos)) {
        throw new Exception("Respuesta inválida del servidor SOAP.");
    }

} catch (SoapFault $e) {
    echo "SOAP Fault: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<h1>Modelos disponibles marca: <?= $marca ?></h1>

<?php
if (is_array($modelos) && !empty($modelos)) {
    foreach ($modelos as $modelo) {
        ?>
        <figure>
            <img src="img/<?= strtolower($marca) ?>.png" alt="logo <?= $marca ?>" height="57" width="100"/>
            <figcaption><?= $modelo["modelo"] ?></figcaption>
        </figure>
        <?php

    }
} else {
    echo "<p>No se encontraron modelos para la marca seleccionada.</p>";
}

?>

</body>
</html>

