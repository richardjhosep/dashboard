<?php
  /*session_start();*/
  require __DIR__ . '/include/php/functions.php';
  require_once __DIR__ . '/include/php/email_.php'; $mail = new email;

  $phpVariable = $_REQUEST['id_perfil_cliente'];
  $parametros = array(
    "id" => $phpVariable
  );
  $rest   = new restWS;
  try {

    $respWS = $rest->ws();      
    //$urlWS = $respWS . "/clientes.simulacion.perfildistribucionall";
    
    $urlWS = $respWS . "/clientes.simulacion.perfildistribucion";
    $jsonReg = $rest->get($urlWS, $parametros);
    $arrReg = json_decode($jsonReg, true);
  } catch (Exception $e) {
    echo "hubo un error";
  }
  $tabla_fondos='';
  $arrdistfondos = '';

?>
<?php 
  //Datos sitio privado
  $sitioPrivado = 'false';
  if(isset($_SESSION['okSitioPrivado']))
  {
    $sitioPrivado = $_SESSION['okSitioPrivado'];
  }


?>
<!DOCTYPE html>
<html lang="es">
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <meta name="format-detection" content="telephone=no"/>
  <title>Sartor - Simulador</title>
  <link rel="icon" href="favicon.png"/>
  <!-- - let _css = `css/allcss.min.css?version=${FLN_CONFIG.version_css}`-->
  <link rel="stylesheet" href="css/allcss.min.css"/>
  <link rel="stylesheet" href="css/jquery-ui.min.css"/>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      animate: 200,
      active: 20,
      collapsible: true
    });
  } );
  </script>
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
  <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
  <!--<script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/4eHYAlZEVyrAlR9UNnRUmNcL/recaptcha__es_419.js" crossorigin="anonymous" integrity="sha384-Kcf5q1m3pCoN+POxVgRvpSBPcGVxNrGSI1WDuzutnQ9Eq2XHOC8l7ly5NmMHJXHk"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js" type="text/javascript" async=""></script>

  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-83884804-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-83884804-1');
  </script>
</script><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" media="all">
<?php
      //Sacamos el header si viene del sitio privado
      if($sitioPrivado=='true'){

    ?>
    <style>
      .header{
        display:none!important;
      }
      body{
        padding-top:0;
      }
    </style>
    <?php
      }
    ?>
  <body>
  <main>
      <header class="header">
        <div class="header__container"><a class="header__container__item header__container__item--logo" href=""><img src="./img/logo.svg"/></a>
          <div class="header__container__text oculto-xs block-md"></div>
          <div id="menu__session"  class="menu__session" style="display:none;">
            <a href="#;" class="menu__session-logout" title="Cerrar Sesión"><img src="./img/user-logout.svg"/></a>
          </div>
        </div>
      </header>
      <section class="section section__pasos pasos pasos_simulacion">
        <div class="contenedor-fluido">
          <div class="marco">
            <div class="fila">
              <div class="col xs12">
                <div class="pasos__cabecera observar">
                  <div class="pasos__icon"><img src="./img/bar-chart.svg" alt="Icono Persona Natural"/></div>
                  <div class="pasos__titulo">
                    <h1>Simulador <span>Fondos Sartor</span></h1>
                  </div>
                </div>
              </div>
              <div class="col xs12">
                  <div class="pasos__indicador observar">
                        <p id="nombclient"><span class="destacado">, <span class="doble-linea">estás en el paso 4 de 4</span></p>
                        <p><span class="doble-linea">estás en el paso 4 de 4</span></p>
                        <br>
                        <p><small>¡Ya estamos casi listos! De acuerdo a tu simulación, te presentamos el resumen de <span class="textcolor">tu inversión</span>.
                    </small></p>
                  </div>
              </div>
              <div class="col xs12 lg8 offset-lg2">
                <div class="pasos__pasos numbers observar">
                  <div class="numbers__numbers">
                          <span class="numbers__item">1</span>
                          <span class="numbers__item">2</span>
                          <span class="numbers__item">3</span>
                          <span class="numbers__item activo">4</span>
                          
                  </div>
                  <span class="numbers__linea"></span>
                </div>
                <div class="numbers__movil"><span class="numbers__item activo">4</span></div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <h3 class="pasos__subtitle observar">Tu inversión</h3>
                <div class="separador"></div>
                <div class="pasos__form observar observar--activo">
                  <form class="form" id="form-paso5" method="post" action="javascript://" enctype="multipart/form-data">
				            <div class="fila">
                        <div class="col xs12 lg3">
                            <div class="pasos__contenedor col__ajuste-resp"> 
                                <div class="form__group ">
                                  <div class="row">
                                        <label for="form__text">Tu inversión:  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <p id="cartera" class="txt-label negrita"></p>                                   
                                  </div>  
                                  <div class="row">
                                    <div class="form__group">
                                          <label for="form__text">Tu objetivo:</label>
                                          <p id="suenoclient" class="new_label" >$0</p>
                                    </div>   
                                  </div>  
                                  <div class="row">
                                    <div class="form__group">
                                          <label for="form__text">Aporte Inicial:</label>
                                          <p id="aporte_inicial" class="new_label">$0</p>
                                    </div>   
                                  </div>  
                                  <div class="row">
                                      <div class="form__group">
                                        <label for="form__text">Aporte Mensual:</label>
                                        <p id="aporte_mensual" class="new_label">$0</p>
                                        
                                      </div>  
                                  </div>
                                  <div class="row">
                                      <div class="form__group">
                                        <label for="form__text">Tiempo de inversión (años):</label>
                                        <p id="tiempo_inversion" class="new_label">$0</p>                                        
                                      </div>  
                                  </div>                  
                                </div>
                            </div>
                        </div>
                        <div class="col xs12 lg9">
                            <div class="fila resultados__estimados">
                                <div class="col xs12 lg12">
                                    <div class="pasos__contenedor"> 
                                        <div class="form__group">
                                            <div id="accordion" >
                                            <?php
                                                    $ind = 0;
                                                    foreach($arrReg as $data)
                                                    {
                                                      $tabla_fondos=$tabla_fondos.'<tr style="border-bottom:2px solid #ccc;"><td align="left" valign="top" width="50%" style="padding:14px;"><p style="font-size:14px;font-weight:bold;margin:0;color:#2A3A47;">'.$data['distribucion'].' '.$data['fondo'] .'</p></td><td align="right" valign="top" width="50%" style="padding:14px;"><p style="font-size:14px;font-weight:bold;margin:0;color:#2A3A47;"><a style="color:#ec7700;" href="'. $data['link_detalle'].'">Ver más</a></p></td></tr>';
                                                      /*$aux = explode( '.', $data['descripcion_fondo'] );
                                                      
                                                      $tabla_fondos=$tabla_fondos.'<tr><p>';
                                                      $texto=""; 
                                                      for($i = 0; $i < count($aux)-1; ++$i) {
                                                        $aux2 = explode( ':', $aux[$i] );
                                                        if ( count($aux2) > 1)
                                                        {
                                                          $texto=$texto.$aux2[0].$aux2[1];   
                                                        }else{
                                                          $texto=$texto.$aux[$i];    
                                                        }  
                                                        
                                                      }
                                                      print_r($texto);*/ 
                                                      //$tabla_fondos=$tabla_fondos.'<tr><p>'.$data['descripcion_fondo'].'</p></tr>'; 
                                            ?>
                                                  <h3><?php echo $data['distribucion'].' '.$data['fondo'] ?></h3>
                                                  <div>
                                                      
                                                      <?php
                                                          $arrdistfondos =$arrdistfondos.$data['distribucion'].'-'.$data['id_serie'].'-'.$data['fondo'].',';
                                                          $parametros = array(
                                                            "id_fondo" => $data['id']
                                                          );
                                                          $rest   = new restWS;
                                                          try {

                                                            $respWS = $rest->ws();      
                                                            $urlWS = $respWS . "/clientes_simulacion_fondos_documentos";
                                                            $jsonReg = $rest->get($urlWS, $parametros);
                                                            $arrRegdoc = json_decode($jsonReg, true);

                                                          } catch (Exception $e) {
                                                            echo "hubo un error";
                                                          }
                                                            
                                                          
                                                        ?>   
                                                            <div class="desc__fondo-paso4">
                                                               
                                                                <p><?php echo $data['descripcion_fondo']  ?><a class="intro-tooltip intro-tooltip--interior" data-tippy-placement="bottom" data-tippy-arrow="true" data-tippy-content="Si quieres saber más información sobre el Fondo <?php echo $data['fondo'];?>, click en el icono." href="<?php echo $data['link_detalle'];?>" target="_blank" rel="noopener">?</a><!--a class="tabla__icon fln-alerta-info-full-light" href="#"></a--></p>
                                                                
                                                            </div>
                                                        <?php
                                                                $contarClase = 0;
                                                                foreach($arrRegdoc as $data2)
                                                                {   
                                                                  //$tabla_fondos=$tabla_fondos.'<tr style="border: 0px solid #ebebeb;'.(++$contarClase%2 ? 'background:#efefef;':' ').'"><td style="width:80%;border: 0px solid #ebebeb;padding: 6px 10px;"><p style="font-size: 14px;">'. $data2['nombre_documento'] .'</p></td><td style="width:20%;border: 0px solid #ebebeb; text-align: center;padding: 6px;"><a href="'. $data2['url_documento'].'" target="_blank" ><img src="https://staticcl1.fidelizador.com/sartor/factsheet/general/factsheet_icono.png" style="width:60px;"></a></td></tr>';

                                                        ?> 
                                                            <div class="row">  
                                                              <tr>  
                                                                  <td style="width: 90%;"><p><?php  echo $data2['nombre_documento']  ?></p></td>
                                                                  <td style="width: 10%; text-align: center;"><a class="tabla__icon fln-pdf-light" href="<?php  echo $data2['url_documento']  ?>" target="_blank" rel="noopener">&nbsp;</a></td>
                                                              </tr>
                                                              <tr>
                                                              </tr>
                                                            </div>
                                                        <?php
                                                                }
                                                                //$tabla_fondos=$tabla_fondos.'<tr style="background:#efefef;"><td style="padding: 6px 10px;"><p>Si quieres saber más información sobre el Fondo presiona el <a href="'.$data['link_detalle'].'" target="_blank" rel="noopener" >link</a></p></td><td style="width:20%;border:0px solid #ebebeb;text-align:center;padding:6px"></td></tr>'; 
                                                                
                                                        ?>   
                                                      <!--<div class="row">
                                                          <tr>
                                                              <td style="width: 90%;"><p>Documento 2</p></td>
                                                              <td style="width: 10%; text-align: center;"><a class="tabla__icon fln-pdf-light" href="/Upload/Avalúo El Manzano.pdf" target="_blank" rel="noopener">&nbsp;</a></td>
                                                          </tr>
                                                      </div>-->
                                                  </div>
                                            <?php
                                                    //$tabla_fondos=$tabla_fondos.'<tr height="30"></tr></table></td></tr>';

                                                  }
                                            ?>   
                                            </div>
                                                </br>
                                                </br>
                                                </br>
                                                </br>
                                        </div> 
                                        <div class="fila resultados__check">                        
                                                <div class="col xs12 lg12">
                                                    <!--<div class="row">
                                                        <p><small>  
                                                            <a class="observar" href="#">Presiona aquí</a></small></p>
                                                    </div>-->
                                                    <!--div class="row">
                                                        <div class="form__checkbox">
                                                            <input class="check-style" type="checkbox" name="check-ciudadano-usa" id="check-ciudadano-usa"/>
                                                            <label for="check-ciudadano-usa"><small>Sabemos que en un principio puedes no entender todo esto en detalle, pero de todas formas queríamos mostrarte en qué se invierte tu dinero. 
                                                                                                    La composición de estos fondos puede tener cambios. 
                                                                                                    Puedes revisar más sobre nuestros fondos en el
                                                                                                    <a href="https://www.sartor.cl/es/areas-de-negocio/asset-management" target="_blank"> siguiente link</a>
                                                                                                    .
                                                                                            </small>
                                                              </label>
                                                        </div>
                                                    </div-->
                                                    <div class="row">
                                                        <div class="form__checkbox">
                                                            <input class="check-style" type="checkbox" name="check-ciudadano-usa" id="check-ciudadano-usa"/>
                                                            <label for="check-ciudadano-usa"><small>Quiero invertir en este objetivo mis próximos transferencias.</small></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form__checkbox">
                                                            <input class="check-style" type="checkbox" name="check-email" id="check-email" onclick="clickcheck();"/>
                                                            <label for="check-ciudadano-usa"><small>Quiero que se me envíe a mi correo electrónico información sobre los Fondos Sartor y la simulación que acabo de realizar.</small></label>
                            
                                                        </div>
                                                    </div>
                                                    <div id="disclamer" class="row" style="display:none;">
                                                        <div class="form__text">
                                                            <p>Para llevar a cabo esta simulación es necesario que seas cliente de Sartor Administradora General de Fondos, por lo que a continuación comenzarás el proceso de Hazte Cliente.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col xs12">
                                                        <div class="alerta alerta--error" id="errores_check1" style="display:none;">Debe seleccionar el checkbox de "Entiendo mi perfil.." </div>
                                                        <div class="alerta alerta--error" id="errores_check2" style="display:none;">Debe seleccionar el checkbox de "Entiendo que estoy invirtiendo.." </div>
                                                        <div class="form__buttons">
                                                            <a class="form__volver" href="#" onclick="volver();"><span><<</span> Volver</a>
                                                            <!--<a class="btn btn--secundario submit"
                                                                onclick="validarFormulario();" 
                                                            >Continuar</a>-->
                                                            <button type="submit" class="btn btn--secundario submit " id="paso4_haztecliente" style="display:none;">Hazte Cliente </button>
                                                            <button type="submit" class="btn btn--secundario submit " id="paso4_invertir" style="display:none;">Invertir</button>
                                                            <button type="submit" class="btn btn--secundario submit " id="paso4_visor" style="display:none;">Volver al Visor</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>     
                                    </div>
                                </div>                                                       
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <a href="#ultimo-perfil" id="ultimoperfil-inversion" class="popup-with-form"></a>
    <div id="ultimo-perfil" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <p>Hemos enviado un correo con la información de la Simulación y los fondos propuestos.</p>  
      <button type="submit" class="btn btn--secundario" id="cerrarModal" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>

    <!--div class="btn-subir fln-arriba"></div-->
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/utils.js"></script>
    <script>
      $('.popup-with-form').magnificPopup();
      $('#cerrarModal').click(function(){
        $('.mfp-close').click();
      });
      if (sessionStorage.getItem('clientesartoractivo') && sessionStorage.getItem('clientesartoractivo')==1 )
      {
          //Se debe validar el estado (4: activo puede invertir; distinto de 4 solo puede simular)
          var x = document.getElementById('paso4_invertir');
          x.style.display = "block";
      }else{         
          var x = document.getElementById('paso4_haztecliente');
          x.style.display = "block";
          var x = document.getElementById('disclamer');
          x.style.display = "block";
      }                               
      if ( sessionStorage.getItem('logeado') == 1)
      {
          var x = document.getElementById('menu__session');
          x.style.display = "block";
      }
      if ( sessionStorage.getItem('login') == 1)
      {
          $(document).ready( function(){
          setTimeout(function(){$("#cartera").text(sessionStorage.getItem('cartera').toUpperCase());}, 10);
          setTimeout(function(){$("#nombclient").text(sessionStorage.getItem('nombre_cliente'));}, 10);
          setTimeout(function(){$("#suenoclient").text(sessionStorage.getItem('suenoselect'));}, 10);
          setTimeout(function(){$("#aporte_inicial").text("$" + sessionStorage.getItem('aporte_inicial_local'));}, 10);
          setTimeout(function(){$("#aporte_mensual").text("$" + sessionStorage.getItem('aporte_mensual_local'));}, 10);
          setTimeout(function(){$("#tiempo_inversion").text(sessionStorage.getItem('tiempo_inversion_local'));}, 10);
          });
        
      }else{
          $("#cartera").text( sessionStorage.getItem('cartera').toUpperCase());
          $("#nombclient").text(sessionStorage.getItem('nombre_cliente'));
          $("#suenoclient").text(sessionStorage.getItem('suenoselect'));
          $("#aporte_inicial").text('$' + sessionStorage.getItem('aporte_inicial_local'));
          $("#aporte_mensual").text('$' + sessionStorage.getItem('aporte_mensual_local'));
          $("#tiempo_inversion").text(sessionStorage.getItem('tiempo_inversion_local'));
      }
      if ( sessionStorage.getItem('clientesinperfil') )
      {
        var id_perfil =sessionStorage.getItem('id_perfil_cliente');
        if ( sessionStorage.getItem('id_perfil_local') && sessionStorage.getItem('id_perfil_local') != sessionStorage.getItem('id_perfil_cliente'))
        {
          id_perfil = sessionStorage.getItem('id_perfil_local');
        }
        var rutCli = sessionStorage.getItem('rutcli').replace('.','').trim() 
        $.ajax({
                url: 'helpers/clientes.perfil.inversionista.post.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"rut=" + rutCli.replace('.','').trim() 
                    + "&id_perfil=" + id_perfil 
                    + "&total_ponderacion=" + '0'
                    + "&rut_rl=" + '', 
                success: function(data,xhr){
                  console.log(data);
                  //siguientePaso();
                },
                error: function(xhr){
                  //paginaError();
                  console.log(xhr.responseText);
                }
              });
      }
      
      
       
    </script>

    <!--<script>
      var _captcha = document.getElementById('captcha')
      var onloadCallback = function() {
        if (_captcha) {
          grecaptcha.render(_captcha, {
            'sitekey': '6LdDQtgUAAAAAJ8yQWc9jS64Fz_me-uIiCLnDjpm',
            'callback': recaptchaCallback,
          })
        }
      }
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&amp;render=explicit"></script>-->
    <script>
          $(document).ready( function(){
            console.log('<?php echo substr($arrdistfondos,0,strlen($arrdistfondos)-1) ?>');
            sessionStorage.setItem('correoenviado','0');
            var id_perfil_cliente=sessionStorage.getItem('id_perfil_cliente');
            setTimeout(function(){$("#id_perfil_cliente").val(id_perfil_cliente);}, 0);
          });
          /*window.onload = function() {
            var perfil = sessionStorage.getItem('id_perfil_local');
            var x = document.getElementById(perfil);
            x.style.display = "block";
          };*/

          function clickcheck(){
            if ( sessionStorage.getItem('correoenviado') == '1')
            {
              return false;
            }
            var respcheck = document.getElementById("check-email").checked;          
              if (! respcheck)
              {
                //$('#errores_check1').show();
                  return false;
              }
            var tabla_fondos = '<?php echo $tabla_fondos?>';
            var correo = sessionStorage.getItem('email');
            var subject= 'Tu simulación';
            $('#ultimoperfil-inversion').trigger('click');
            //alert('Hemos enviado un correo con la información de la Simulación y los fondos propuestos');  
            $.ajax({
                url: 'helpers/clase.simulacion.emailsimulacion.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"correo=" + correo 
                    + "&subject=" + subject 
                    + "&nombre=" + sessionStorage.getItem('nombre_cliente')
                    + "&objetivo=" + sessionStorage.getItem('suenoselect')
                    + "&aporte_inicial=" + sessionStorage.getItem('aporte_inicial_local')
                    + "&aporte_mensual=" + sessionStorage.getItem('aporte_mensual_local')
                    + "&tiempo=" + sessionStorage.getItem('tiempo_inversion_local')
                    + "&cartera=" + sessionStorage.getItem('cartera').toUpperCase()
                    + "&tabla_fondos=" + tabla_fondos, 
                success: function(data,xhr){
                  console.log(data);
                  //siguientePaso();
                },
                error: function(xhr){
                  //paginaError();
                  console.log(xhr.responseText);
                }
              });
              sessionStorage.setItem('correoenviado','1');
          }

          function volver(){
            if ( sessionStorage.getItem('login') == 1)
            {
                window.location.href = '/simulador/visor_simulaciones_realizadas.php?id='+sessionStorage.getItem('id_cliente_simulacion');    
            }else{
                window.location.href = '/simulador/paso3-simulador-simulacion.php';
            }
            
          }
          $(".menu__session-logout").click(function(){
            console.log('click cerrar sesion');
            sessionStorage.clear();
            $('body').fadeOut( "slow", function() {
                        window.location.href = "http://www.sartormas.com/";
            });       
          });
          $('#paso4_haztecliente').click(function(){
            $.ajax({
                url: 'helpers/cliente.simulacion.update.seleccionada.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"id_simulacion=" + sessionStorage.getItem('id_simulacion'), 
                success: function(data,xhr){
                  window.location.href = '../haztecliente/paso-toc-select.php';
                },
                error: function(xhr){
                  //paginaError();
                  console.log(xhr.responseText);
                }
              });

            
          });
          $('#paso4_invertir').click(function(){
            //enviarAporte()
              var monto_inicial_local = sessionStorage.getItem('aporte_inicial_local').split(".");
              var monto_inicial="";
              for ( i=0; i < monto_inicial_local.length; i++  )
              {
                monto_inicial += monto_inicial_local[i];
              }
              //sessionStorage.setItem('aporte_inicial_invertir',monto_inicial);
              
              var id_simulacion = sessionStorage.getItem('id_simulacion');
              parent.enviarAporte(monto_inicial,'<?php echo substr($arrdistfondos,0,strlen($arrdistfondos)-1) ?>', id_simulacion);
          });
          $('#paso4_visor').click(function(){
            window.location.href = 'visor_simulaciones_realizadas.php';
          });


        //tooltip descripcion
        $('#accordion .ui-accordion-content').each(function(){
            var getInfo = $(this).find('.intro-tooltip').attr('data-tippy-content');
            $(this).find('.intro-tooltip').parent().append('<div class="data-declaraciones">'+getInfo+'</div>');
        }); 
        
    </script>  

  </body>
</html>
<?php 

require './include/footer.php';

?>