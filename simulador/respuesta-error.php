<?php
session_start();
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <meta name="format-detection" content="telephone=no"/>
  <title>Sartor - Hazte Cliente</title>
  <link rel="icon" href="favicon.png"/>
  <!-- - let _css = `css/allcss.min.css?version=${FLN_CONFIG.version_css}`-->
  <link rel="stylesheet" href="css/allcss.min.css"/>
  <script>
    WebFontConfig = {
    	google: {
    		//- families: ["Open+Sans:300,400,600,700"]
    		families: ["Open+Sans:300,400,600,700"]
    	}
    };
    (function () {
    	var wf = document.createElement('script');
    	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    		'://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    	wf.type = 'text/javascript';
    	wf.async = 'true';
    	var s = document.getElementsByTagName('script')[0];
    	s.parentNode.insertBefore(wf, s);
    })();
  </script>
  <body>
    <main>
      <header class="header">
        <div class="header__container"><a class="header__container__item header__container__item--logo" href=""><img src="./img/logo.svg"/></a>
          <div class="header__container__text oculto-xs block-md"></div>
        </div>
      </header>
      <section class="section section__respuestas respuestas pasos">
        <div class="contenedor-fluido">
          <div class="marco">
            <div class="fila">
              <div class="col xs12">
                <div class="pasos__cabecera observar">
                  <div class="pasos__icon"><img src="./img/logo-persona-natural.svg" alt="Icono Persona Natural"/></div>
                  <div class="pasos__titulo">
                    <h1>Hazte Cliente <span>Persona Natural</span></h1>
                  </div>
                </div>
              </div>
              <div class="col xs12">
                <div class="respuestas__item observar">
                  <div class="respuestas__icon"><span class="fln-alerta-error-light"></span></div>
                  <div class="respuestas__texto">
                    <h2>Error</h2>
                    <p>Haz finalizado el proceso para ser cliente de Sartor, pero ha ocurrido un error. </p>
                    <p>Tus datos no se han enviado de manera correcta.</p>
                  </div>
                  <div class="respuestas__buttons"><a class="btn btn--secundario" href="paso6-1.php">Reintentar</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="prefooter">
        <div class="modal zoom-anim-dialog mfp-hide" id="info-uno">
          <h4>Título modal Persona Natural</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
          <ul>
            <li>Tener a mano tu cédula de identidad.</li>
            <li>Si eres casado, de tu cónyuge necesitas: RUT, número de celular, correo electrónico.</li>
            <li>Si tu actividad laboral es  Dependiente, necesitarás: número de RUN y dirección de tu empleador. </li>
            <li>Número de cuenta bancaria.</li>
          </ul>
        </div>
        <div class="modal zoom-anim-dialog mfp-hide" id="info-dos">
          <h4>Título modal Persona Jurídica</h4>
          <p>Sugerimos realizar este proceso en un computador, debido a que deberás subir antecedentes legales de la sociedad, así como documentos de identificación de los representantes legales. Los representantes legales podrán firmar los contratos con cualquier dispositivo.</p>
          <p>Para esto necesitarás:</p>
          <ul>
            <li>Ser mayor de 18 años y persona natural.</li>
            <li>Tus datos personales.</li>
            <li>Cédula de Identidad en formato digital por ambos lados.</li>
            <li>Cuenta Corriente bancaria asociada a tu RUT.</li>
            <li>Datos de tu cónyuge en caso de estar casado.</li>
            <li>RUT y razón social de tu empleador en caso de ser trabajador dependiente.</li>
          </ul>
        </div>
      </div>
      <footer class="footer">
        <div class="footer__top">
          <div class="contenedor-fluido">
            <div class="marco">
              <div class="fila">
                <div class="col xs12 md4 lg6"><img class="footer__logo" src="./img/logo.svg" alt="Hazte Cliente - Sartor"/></div>
                <div class="col xs12 md8 lg6">
                  <div class="footer__fonos">
                    <p>¿Necesitas ayuda?</p>
                    <div class="footer__fonos__interior">
                      <p>Llámanos al</p><a class="footer__call" href="tel:+562 28699000">+562 28699000</a><span class="footer__symbol">|</span><a class="footer__call" href="tel:+562 25781400">+562 25781400</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__bottom">
          <div class="contenedor-fluido">
            <div class="marco">
              <div class="fila">
                <div class="col xs12">
                  <div class="footer__bottom__legal">
                    <p>Cerro el Plomo 5420 Oficina 1301, Las Condes, Santiago, Chile.</p>
                    <p>Todos los Derechos Reservados Sartor <span>©Copyright <?php echo date("Y"); ?></span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </main>
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
  </body>
</html>
