<?php
	require_once __DIR__ . '/clase_util.php';

	$parametros = array(
        "id_simulacion" => $_POST['id_simulacion'],
        "monto_mensual" => $_POST['monto_mensual'],
        "arrValoresGraf" => $_POST['arrValoresGraf'],
        "arrFechaGraf" => $_POST['arrFechaGraf']
      );

	$rest      = new restWS;
	try {
		$respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.datosgraficos";
        $resultado = $rest->post($urlWS, $parametros);
		echo $resultado;
	} catch (Exception $e) {
        echo "hubo un error";
    }
?>