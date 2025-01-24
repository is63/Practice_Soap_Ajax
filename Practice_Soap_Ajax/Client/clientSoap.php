<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $client = new SoapClient(null, array(
        'uri' => 'http://undominiomas.free.f/Server/',
        'location' => 'http://undominiomas.free.nf/Server/serverSoap.php',
        'trace' => 1
    ));

    $params = array(
        'username' => 'ies',
        'password' => 'daw'
    );

    $header_params = new SoapVar($params, SOAP_ENC_OBJECT);
    $header = new SoapHeader('http://undominiomas.free.nf/Server/serverSoap.php', 'authenticate', $header_params, false);
    $client->__setSoapHeaders($header);

    $marcas = $client->getVideos();
    $marcas = json_decode($marcas, true);

    $modelos = $client->getModels();
    $modelos = json_decode($modelos, true);

    /*
    echo "<pre>";
    var_dump($result);
    echo "</pre>";

    foreach ($result as $coche) {
        echo $coche['marca'] . "<br>";
        echo $coche['url'] . "<br>";
    }
*/
} catch (SoapFault $e) {
    echo "SOAP Fault: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}