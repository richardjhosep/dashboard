<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_simulacion" => $_GET['id_simulacion'],
            "id_perfil" => $_GET['id_perfil'],
            "monto_inicial" =>  $_GET['monto_inicial'],
            "monto_mensual" => $_GET['monto_mensual'],
            "tiempo" => $_GET['tiempo']
        );

        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.recalcularsimulacion";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>