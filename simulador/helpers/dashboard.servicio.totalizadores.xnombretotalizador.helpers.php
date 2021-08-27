<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "fecha_inicial" => $_GET['fecha_inicial'],
            "fecha_final" => $_GET['fecha_final'],
            "tipo" => $_GET['tipo'],
            "nombre_totalizador" => $_GET['nombre_totalizador']
        );
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/dashboard.servicio.totalizadores.xnombretotalizador";
        $jsonReg = $rest->get($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>