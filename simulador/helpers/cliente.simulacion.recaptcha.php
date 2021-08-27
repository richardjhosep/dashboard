<?php
    require_once __DIR__ . '/clase_util.php';
    if($_POST['google-token-recaptcha'])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => SECRET_KEY, 'response' => $_POST['google-token-recaptcha'])));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        if ( $arrResponse['success'] == '1'  && $arrResponse['score'] >= 0.5 )
        {   echo http_response_code(200);    }
        else
        {   echo  http_response_code(500);    }

    }
?>