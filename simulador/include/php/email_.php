<?php
require_once __DIR__ . '/../../lib/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../../lib/PHPMailer/src/SMTP.php';

class email
{

	public function enviar($subject, $mensaje, $email)
	{

		$mail           = new PHPMailer\PHPMailer\PHPMailer();
		/* Outlook Office */
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host     = "smtp.office365.com";
		$mail->Username = "service@sartor.cl";
		$mail->Password = "Hat63402";
		$mail->Port     = 587;
		$mail->From     = "service@sartor.cl";
		$mail->FromName = "Sartor Administradora General de Fondos";
		$mail->AddAddress($email);
		//$mail->AddCC("rmanriquez@vetcom.cl");
		$mail->IsHTML(true);
		$mail->Subject  = utf8_decode("$subject"); 
		$body           = "";
		$body          .= "$mensaje";
		$mail->Body     = $body;
		$mail->AltBody  = $mensaje;
		//$exito = $mail->Send();

		/* GMail */
		//$mail->IsSMTP();
		////$mail->SMTPDebug   = 2;
		////$mail->Debugoutput = "html";
		//$mail->Host        = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
		//$mail->Port        = 587; // Puerto a utilizar
		//$mail->SMTPSecute  = "tls";
		//$mail->SMTPAuth    = true;
		//$mail->Username    = "ivangcb@gmail.com"; // Correo completo a utilizar
		//$mail->Password    = "dni1fio8669606"; // Contraseña
		//$mail->From        = "ivangcb@gmail.com"; // Desde donde enviamos (Para mostrar)
		//$mail->FromName    = "Ivan GCB";
		//$mail->AddAddress($email); // Esta es la dirección a donde enviamos
		////$mail->IsHTML(true); // El correo se envía como HTML
		//$mail->Subject  = utf8_decode("$subject"); // Este es el titulo del email.
		//$body           = "Nueva contraseña: </br>";
		//$body          .= $mensaje;
		//$mail->Body     = $body; // Mensaje a enviar
		//$mail->AltBody = "Texto SIN html"; // Texto sin html

		if(!$mail->Send()){
			print_r("se cayo");
			return "ERROR";
		}else{
			return "OK";
		}

	}


}


?>
