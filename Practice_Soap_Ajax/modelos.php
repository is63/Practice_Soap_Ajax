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

switch ($_GET["marca"]) {
    case "Ford":
        $numMarca = 1;
        $marca = "Ford";
        break;
    case 'Seat':
        $numMarca = 2;
        $marca = "Seat";
        break;
    case "Nissan":
        $numMarca = 3;
        $marca = "Nissan";
        break;
    case "Audi":
        $numMarca = 4;
        $marca = "Audi";
        break;
    case "BMW":
        $numMarca = 5;
        $marca = "BMW";
        break;
    case "Citroen":
        $numMarca = 6;
        $marca = "Citroen";
        break;
}
?>
<h1>Modelos disponibles marca: <?= $marca ?></h1>

<?php
if (is_array($modelos) && !empty($modelos)) {
    foreach ($modelos as $modelo) {
        if ($modelo["marca"] == $numMarca) {
            ?>
            <figure>
                <img src="img/<?= strtolower($marca) ?>.png" alt="logo <?= $marca ?>" height="57" width="100"/>
                <figcaption><?= $modelo["modelo"] ?></figcaption>
            </figure>
            <?php
        }
    }
} else {
    echo "<p>No se encontraron modelos para la marca seleccionada.</p>";
}
?>

</body>
</html>

