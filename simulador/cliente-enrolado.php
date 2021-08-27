<?php
session_start();
$tmpToken = $_SESSION['token'];
session_unset();
$_SESSION['token'] = $tmpToken;
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
                </div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <div class="respuestas__item observar">
                  <div class="respuestas__icon"><span class="fln-alerta-exito-light"></span></div>
                  <div class="respuestas__texto">
                    <h2>Ya eres cliente</h2>
                  </div>
                  <div class="respuestas__buttons"><a class="btn btn--secundario" href="https://www.sartoragf.cl">Ir a mi Sitio Privado</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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