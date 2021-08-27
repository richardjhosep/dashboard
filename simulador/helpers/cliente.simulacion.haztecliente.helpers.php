<?php
//session_destroy();
session_start();
//require_once __DIR__ . '/clase_util.php';
try {
    $_SESSION['nombres'] = $_POST['nombres'];
    $_SESSION['apellido_paterno'] = $_POST['apellido_paterno'];
    $_SESSION['apellido_materno'] = $_POST['apellido_materno'];
    $_SESSION['correo_electronico'] = $_POST['correo_electronico'];
    $_SESSION['password'] = $_POST['password'];
    //$_SESSION['toc_nationality'] = $obj["information from document"]["mrz"]["data"]["nationality"];
    //$_SESSION['toc_birth'] = $obj["information from document"]["mrz"]["data"]["date of birth"];
    //$_SESSION['toc_expire'] = $obj["information from document"]["mrz"]["data"]["expiration date"];
    //$_SESSION['toc_done'] = true;d
    if ($_SESSION['nombres']){
      echo   http_response_code(200);
    }
    else{
       echo  http_response_code(500);
    }
} catch (Exception $e) {
    echo "hubo un error";
}    

?>