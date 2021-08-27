<?php
session_start();
require __DIR__ . '/include/php/functions.php';

$parametros = array();

try {
	$rest   = new restWS;
	$result = $rest->get("/documentos/".$_GET['idt']."/".$_GET['idd'],$parametros);
} catch (Exception $e) {
	echo "hubo un error";
}

header('Content-type: application/pdf');
echo $result;

?>