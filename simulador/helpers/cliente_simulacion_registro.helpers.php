<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "registro" => $_GET['registro'],
            "consulta" => "registro"
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.registro";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>