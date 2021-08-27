<?php
    require_once __DIR__ . '/clase_util.php';
    $rest   = new restWS;
    try {
        $parametros = array(
            "rut" => $_POST['rut'],
            "id_perfil" => $_POST['id_perfil'],
            "total_ponderacion" => $_POST['total_ponderacion'],
            "rut_rl" => $_POST['rut_rl']
        );
        
        $respWS = $rest->ws();      
        $urlWS = $respWS . "/clientes.perfil.inversionista.post.php";
        $jsonReg = $rest->post($urlWS, $parametros);
        echo $jsonReg;
    } catch (Exception $e) {
        echo "hubo un error";
    }
?>