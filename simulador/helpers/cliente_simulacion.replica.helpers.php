<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_clientes_simulacion_registro" => $_POST['id_cliente_simulacion']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.replica";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>