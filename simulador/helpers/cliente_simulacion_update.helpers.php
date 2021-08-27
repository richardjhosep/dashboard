<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "idsimulacion" => $_POST['id'],
            "pasos" => "3",
            "id_clientes_param_suenos" => $_POST['id_clientes_param_suenos'],
            "otro_sueno" => $_POST['otro_sueno'],
            "inversion" => $_POST['aporte_inicial'],
            "inversion_mensual" => $_POST['aporte_mensual'],
            "tiempo" => $_POST['tiempo'],
            "id_perfil" => $_POST['id_perfil']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.update";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>