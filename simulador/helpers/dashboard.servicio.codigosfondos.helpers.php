<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/dashboard.servicio.codigosfondos";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>