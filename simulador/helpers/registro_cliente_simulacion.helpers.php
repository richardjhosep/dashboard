<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "nombres" => $_POST['nombres'],
            "apellido1" => $_POST['apellido1'],
            "apellido2" => $_POST['apellido2'],
            "registro" => $_POST['registro'],
            "clave" => $_POST['clave'],
            "numero_de_telefono" => $_POST['numero_de_telefono'],
            "token" => $rest->crearToken($_POST['registro']),
            "id_origen" => $_POST['id_origen'],
            "rut" => $_POST['rut'],
        );
        
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.simulacion.registro";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>