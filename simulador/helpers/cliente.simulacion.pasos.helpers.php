<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "idsimulacion" => $_POST['id_simulacion'],
            "pasos" => $_POST['paso']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.paso";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>