<?php
    require_once __DIR__ . '/clase_util.php';
    require_once __DIR__ . '/../include/php/email_.php'; 
    $mail = new email;
    $rest   = new restWS;
    try {
        
          global $mail;
          print_r($_POST['correo']);  
          $mensaje= '<style type="text/css">
          body,html{margin:0 auto!important;padding:0!important;height:100%!important;width:100%!important}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}div[style*="margin: 16px 0"]{margin:0!important}table,td{mso-table-lspace:0!important;mso-table-rspace:0!important}table{border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;Margin:0 auto!important}table table table{table-layout:auto}img{-ms-interpolation-mode:bicubic}.mobile-link--footer a,a[x-apple-data-detectors]{color:inherit!important;text-decoration:underline!important}  
          </style>
          <center style="width: 100%; background: #f4f4f4;padding-top:20px;">
      
          <!-- Visually Hidden Preheader Text : BEGIN -->
          <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
              
          </div>
          <!-- Visually Hidden Preheader Text : END -->
      
          <!--    
              Set the email width. Defined in two places:
              1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
              2. MSO tags for Desktop Windows Outlook enforce a 600px width.
          -->
          <div style="max-width: 600px; margin: auto;">
              <!--[if (gte mso 9)|(IE)]>
              <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
              <tr>
              <td>
              <![endif]-->
      
              <!-- Email Header : BEGIN -->
              <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
                  <tr style="background:white;">
                      <td style="padding: 20px 0; text-align: center">
                          <img src="https://www.sartormas.com/correo/img/logo-agf.png" width="200" height="42" alt="alt_text" border="0">
                      </td>
                  </tr>
              </table>
              <!-- Email Header : END -->
              
              <!-- Email Body : BEGIN -->
              <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="max-width: 600px;">
                  
                  <!-- Hero Image, Flush : BEGIN -->
                  <tr>
                      <td>
                          <img src="https://www.sartormas.com/correo/img/nueva-contrasena.jpg" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px;">
                      </td>
                  </tr>
                  <!-- Hero Image, Flush : END -->
      
                  <!-- 1 Column Text + Button : BEGIN -->
                  <tr>
                      <td>
                          <table cellspacing="0" cellpadding="0" border="0" width="100%">
                              <tr>
                                  <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                                      <p style="text-align:center;">Hola <strong>'.$_POST['nombre'].'</strong>,<br> Esta es tu nueva contraseña para que puedas ingresar<br> al simulador:</p>
                                      <br>
                                      <!-- Button : Begin -->
                                      <table cellspacing="0" cellpadding="0" border="0" align="center" style="Margin: auto;">
                                          <tr>
                                              <td style="text-align: center;">
                                                  <p style="display:block; font-size:28px; font-family:Open Sans,sans-serif; font-weight: bold; margin-block:0; margin-inline:0; margin:0; color:#2A3A47; text-align:center;">
                                                  '.$_POST['pass'].'
                                                  </p>
                                              </td>
                                          </tr>
                                      </table>
                                      <!-- Button : END -->
                                      <br>
                                      <p style="text-align:center;">
                                      Finalmente, si necesitas más información o asesoría, no dudes en <br>contactarte escribiendo al correo electrónico <a href="mailto:contacto@sartor.cl" style="color:#ec7700;">contacto@sartor.cl</a> o <br>llamando al teléfono <a href="tel:+56225781400" style="color:#ec7700;">(+562) 25781400</a>.
                                      <br><br>Atentamente,<br><br>                            
                                      Sartor Administradora General de Fondos
                                      </p>
                                  </td>
                                  </tr>
                          </table>
                      </td>
                  </tr>
                  <!-- 1 Column Text + Button : BEGIN -->
              
                  <!-- 2 Even Columns : BEGIN -->
                  <tr>
                      <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%" style="padding-bottom: 40px">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:440px;">
                            <tr>
                                <td align="center" valign="top" width="20%">
                                <a href="https://www.sartor.cl/" target="_blank" style="display:inline-block;margin-bottom:3px;">
                                    <img src="https://www.sartormas.com/correo/img/mail-1.png" alt="">
                                </a>
                                <p style="font-size:9px;font-weight:300;margin:0;color:#2A3A47;">www.sartor.cl</p>
                                </td>
                                <td align="center" valign="top" width="20%">
                                    <a href="tel:+56226791400" style="display:inline-block;margin-bottom:3px;">
                                        <img src="https://www.sartormas.com/correo/img/mail-2.png" alt="">
                                    </a>
                                    <p style="font-size:9px;font-weight:300;margin:0;color:#2A3A47;">+562 2679 1400</p>
                                </td>
                                <td align="center" valign="top" width="20%">
                                    <a href="mailto:contacto@sartor.cl" target="_blank" style="display:inline-block;margin-bottom:3px;">
                                        <img src="https://www.sartormas.com/correo/img/mail-3.png" alt="">
                                    </a>
                                    <p style="font-size:9px;font-weight:300;margin:0;color:#2A3A47;">Contacto</p>
                                </td>
                                <td align="center" valign="top" width="20%">
                                    <a href="https://www.linkedin.com/company/sartor-investments/" target="_blank" style="display:inline-block;margin-bottom:3px;">
                                        <img src="https://www.sartormas.com/correo/img/mail-4.png" alt="">
                                    </a>
                                    <p style="font-size:9px;font-weight:300;margin:0;color:#2A3A47;">Linkedin</p>
                                </td>
                                <td align="center" valign="top" width="20%">
                                    <a href="https://www.instagram.com/sartorfinancegroup/" target="_blank" style="display:inline-block;margin-bottom:3px;">
                                        <img src="https://www.sartormas.com/correo/img/mail-5.png" alt="">
                                    </a>
                                    <p style="font-size:9px;font-weight:300;margin:0;color:#2A3A47;">Instagram</p>
                                </td>
                            </tr>
                        </table>
                      </td>
                  </tr>
                  <!-- Two Even Columns : END -->
      
              </table>
              <!-- Email Body : END -->
          
              <!-- Email Footer : BEGIN -->
              <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
                  <tr>
                      <td style="padding: 20px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                          La información contenida en este mensaje y/o en los archivos adjuntos es de carácter confidencial y está destinada al uso exclusivo del emisor y/o de la persona o entidad a quien va dirigida. Si usted no es el destinatario, cualquier almacenamiento, divulgación, distribución o copia de esta información está estrictamente prohibida y sancionada por la Ley. Si recibió este mensaje por error, por favor infórmenos inmediatamente respondiendo este mismo mensaje y borre éste y todos los archivos adjuntos. Considerando que no existe certidumbre de que el presente mensaje no será modificado como resultado de su transmisión por correo electrónico, Sartor Finance group no será responsable si el contenido del mismo ha sido modificado. La rentabilidad o ganancia obtenida en el pasado por este fondo, no garantiza que ella se repita en el futuro. Los valores de las cuotas de los fondos son variables. Infórmese de las características esenciales de la inversión en este fondo, las que se encuentran contenidas en su reglamento interno y contrato general de fondos. La información es provista por Sartor en base a datos publicados en www.cmfchile.cl y por la administradora. Sartor no ofrece garantías, y no asume responsabilidades sobre la información o por las decisiones de inversión adoptadas por terceros.                        <br><br>
                      </td>
                  </tr>
              </table>
              <!-- Email Footer : END -->
      
              <!--[if (gte mso 9)|(IE)]>
              </td>
              </tr>
              </table>
              <![endif]-->
          </div>
          </center>
      '; 
          $mail->enviar($_POST['subject'], utf8_decode($mensaje), $_POST['correo']);
          return true;

    } catch (Exception $e) {
        echo "hubo un error";
    }
?>