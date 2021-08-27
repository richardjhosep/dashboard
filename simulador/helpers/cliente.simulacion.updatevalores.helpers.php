<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "id_simulacion" => $_POST['id_simulacion'],
            "id_perfil" => $_POST['id_perfil'],
            "inversion" => $_POST['inversion'],
            "inversion_mensual" => $_POST['inversion_mensual'],
            "tiempo" => $_POST['tiempo'],
            "monto_invertido" => $_POST['monto_invertido'],
            "resultado_esperado" => $_POST['resultado_esperado'],
            "resultado_optimista" => $_POST['resultado_optimista'],
            "resultado_pesimista" => $_POST['resultado_pesimista'],
            "id_cartera" => $_POST['id_cartera']
        );
        
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.updatevalores";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>