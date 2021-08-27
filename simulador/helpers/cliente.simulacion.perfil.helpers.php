<?php
	require_once __DIR__ . '/clase_util.php';
	$rest      = new restWS;
	try {
        $parametros = array(
            "id_simulacion" => $_GET['id_simulacion']
        );

		$respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.perfil";
        $resultado = $rest->get($urlWS, $parametros);
		echo $resultado;
	} catch (Exception $e) {
        echo "hubo un error";
    }
?>