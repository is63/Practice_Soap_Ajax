<?php
/*
ini_set('log_errors', 1);
ini_set('error_log', '/ruta/del/archivo/php_errors.log');
error_reporting(E_ALL);

*/
include "Coches.php";
$server = new SoapServer(null, array('uri' => 'http://undominiomas.free.nf/Server/serverSoap.php'));

$server->setClass('Coche');
$server->handle();
?>