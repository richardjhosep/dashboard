<?php
	require_once __DIR__ . '/clase_util.php';
	$rest      = new restWS;
	try {
        $parametros = array(
            "id_perfil" => $_GET['id_perfil']
        );
		$respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.distribucionxperfil";
        $resultado = $rest->get($urlWS, $parametros);
		echo $resultado;
	} catch (Exception $e) {
        echo "hubo un error";
    }
?>