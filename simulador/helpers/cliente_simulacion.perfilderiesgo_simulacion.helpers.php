<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_clientes_simulacion_registro" => $_POST['id_cliente_simulacion'],
            "id_perfil" => $_POST['id_perfil']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.perfilderiesgo";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>