<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "campo_consulta" => "id",
            "id" => $_GET['id']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>