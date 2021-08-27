<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "agrupador" => $_GET['agrupador']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.parametros";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>