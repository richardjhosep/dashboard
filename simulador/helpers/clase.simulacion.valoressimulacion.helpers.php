<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_simulacion" => $_GET['id_simulacion']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.valoressimulacion";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>