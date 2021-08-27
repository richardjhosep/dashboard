<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "nemo_fdo_bcs" => $_GET['nemo_fdo_bcs']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/dashboard.servicio.nombrefondo";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>