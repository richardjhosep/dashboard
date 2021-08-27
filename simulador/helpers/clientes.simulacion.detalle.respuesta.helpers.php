<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_clientes_simulacion_registro" => $_POST['id_simulacion'],
            "id_clientes_param_respuesta" => $_POST['id_respuesta'],
            "id_clientes_param_preguntas" => $_POST['id_pregunta']
        );

        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.detalle.respuesta";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>