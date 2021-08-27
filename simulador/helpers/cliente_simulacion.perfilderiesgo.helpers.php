<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "rut" => $_POST['rut']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.perfilderiesgo";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>