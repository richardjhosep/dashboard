<?php
	require_once __DIR__ . '/clase_util.php';

	$parametros = array(
        "agrupador" => "Preguntas"
      );

	$rest      = new restWS;
	try {
		$respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.parametros";
        $resultado = $rest->get($urlWS, $parametros);
		echo $resultado;
	} catch (Exception $e) {
        echo "hubo un error";
    }
?>