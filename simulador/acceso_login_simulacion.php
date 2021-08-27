<?php
  require __DIR__ . '/include/php/functions.php';
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
  <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
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
                <div class="separador">
                </div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <div class="respuestas__item observar">
                  <div class="respuestas__icon"><span class="fln-alerta-exito-light"></span></div>
                  <div class="respuestas__texto">
                    <h2>Ya estas Registrado en el sitio de Simulación</h2>
                  </div>
                  <div class="col xs6 lg6">
                        <div class="form__grupo">
                          <input class="text tipo_email" type="text" name="email" id="email" value="" disabled/>
                          <label for="email" class="loginsimulador">Rut</label>
                        </div>
                  </div>
                  
                  <div class="col xs6 lg6" style="margin-bottom: 14px;">
                        <div class="form__grupo form__grupo--pass">
                          <input class="text tipo_password requerido" type="password" name="password" id="password" minlength="6" maxlength="12" onkeyup="validarPass();" autocomplete="new-password">
                          <label for="password" class="loginsimulador">Contraseña</label><span class="show-pass fln-vista-light" onclick="mostrarPass();"></span>
                        </div>
                        <span class="form__adicional">Debe tener un mínimo de 6 carácteres y un máximo de 12.</span>
                   </div>
                   <div class="col xs6 lg6"  style="margin-bottom: 14px;">
                            <div class="alerta alerta--error" id="errores_pass2" style="display:none;">Las contraseña debe tener un mínimo de 6 y un máximo de 12 caracteres</div>
                            <div class="alerta alerta--error" id="errores_contraseña" style="display:none;" >Debe ingresar la contraseña</div>  
                            <div class="alerta alerta--error" id="errores_pass3" style="display:none;" >Contraseña Incorrecta</div>  
                   </div> 
                   <button type="submit" class="btn btn--secundario" id="registro_cliente_simulacion" >Ir a tus simulaciones </button><a href="#" onclick="resetPassword();"><span class="loginclave">¿Olvidaste tu contraseña?</span></a>
                   
                 </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
    <a href="#ultimo-perfil" id="ultimoperfil-inversion" class="popup-with-form"></a>
    <div id="ultimo-perfil" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <p>Hemos enviado un correo a <span id="emailreg"></span> con tu nueva clave.</p>  
      <button type="submit" class="btn btn--secundario" id="cerrarModal" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>
    <a href="#error-recaptcha" id="error-recaptcha" class="popup-with-form"></a>
    <div id="error-recaptcha" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <p>No es posible ingresar en estos momentos, favor intentelo más tarde.</p>  
      <button type="submit" class="btn btn--secundario" id="errorrecaptcha" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    
    <script>
      $('.popup-with-form').magnificPopup();
      $('#cerrarModal').click(function(){
        $('.mfp-close').click();
      });
      
      $('#errorrecaptcha').click(function(){
        $('.mfp-close').click();
      });
      $(document).ready( function(){
            setTimeout(function(){$("#email").val(sessionStorage.getItem('rut'));}, 10);
          });
        //document.getElementById("email").value = sessionStorage.getItem('email');
      $('#emailreg').text(sessionStorage.getItem('email')); 

       $("#registro_cliente_simulacion").click(function()
       {
        if ($('#password').val() === "")
            {
              var x = document.getElementById("errores_contraseña");
              x.style.display = "block";
              return false;
            }
            if ( $('#password').val().length < 6 || $('#password').val().length > 12  )
            {
                var x = document.getElementById("errores_pass2");
                x.style.display = "block";
                return false;
            }
            var mail = "";
            
             
            
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo SITE_KEY ?>', {action: 'submit'}).then(function(token) {
                    $.ajax({
                            url: 'helpers/cliente.simulacion.recaptcha.php',
                            type: 'POST',
                            dataType: 'json',
                            data:"google-token-recaptcha=" + token,
                            success: function(data,xhr)
                            {
                              $.ajax({
                                      url: 'helpers/cliente_simulacion_registro_clave.helpers.php',
                                      type: 'GET',
                                      dataType: 'json',
                                      data:"registro=" + $('#email').val()
                                          +"&clave=" + $('#password').val(),
                                          success: function(data,xhr){
                                                    var arrreg=[];
                                                    
                                                  $.each(data, function(key, val)
                                                      { 
                                                          arrreg.push(val.nombres);
                                                          arrreg.push(val.apellido1);
                                                          arrreg.push(val.apellido2);
                                                          arrreg.push(val.registro);
                                                          arrreg.push(val.clave);
                                                          arrreg.push('+' + val.numero_de_telefono.trim()); 
                                                          arrreg.push(val.rut);                                  
                                                          mail = val.registro;
                                                          if(mail != "")
                                                          {
                                                              sessionStorage.setItem('mailencontrado',"si");
                                                              var id = val.id;
                                                              var nombres = val.nombres;
                                                              var apellido1 = val.apellido1;
                                                              var apellido2 = val.apellido2;
                                                              var nombrecompleto = "";

                                                              sessionStorage.setItem('id_cliente_simulacion',id);
                                                              nombrecompleto= nombres + ' ' + apellido1 + ' ' + apellido2;
                                                              sessionStorage.setItem('nombre_cliente',nombrecompleto);
                                                              sessionStorage.setItem('logeado',1);
                                                              
                                                              siguientePasoEncontradoContrana();
                                                          }
                                                      });
                                                  if(mail == "")
                                                  {
                                                      sessionStorage.setItem('id_cliente_simulacion',0);
                                                      nombrecompleto= "";
                                                      sessionStorage.setItem('nombre_cliente',nombrecompleto);
                                                      var x = document.getElementById("errores_pass3");
                                                      x.style.display = "block";
                                                      return false;
                                                  }
                                                  sessionStorage.setItem('arrreg',btoa(arrreg));
                                          },
                                          error: function(xhr){
                                              console.log('Debe ingresar la contraseña');
                                              console.log(xhr.responseText);
                                          }
                                          
                                  });
                            },
                            error: function(xhr){
                                  //alert('No es posible registrase en este momento, favor intentelo más tarde.')
                                  $('#error-recaptcha').trigger('click');
                                  
                                  console.log(xhr.responseText);
                            }                   
                      });


                });
              });

       });

       function siguientePasoEncontradoContrana(){
            window.location.href = '/simulador/visor_simulaciones_realizadas.php?id='+sessionStorage.getItem('id_cliente_simulacion');
        } 

        function resetPassword(){
                      
                      var correo = sessionStorage.getItem('email');
                      $('#ultimoperfil-inversion').trigger('click');
                      //alert('Hemos enviado un correo con tu nueva clave');
                      $.ajax({
                        url: 'helpers/cliente_simulacion_registro.email.helpers.php',
                        type: 'GET',
                        dataType: 'json',
                        data:"registro=" + sessionStorage.getItem('email') +
                             "&rut=" + sessionStorage.getItem('rut') ,
                        success: function(data,xhr){
                            $.each(data, function(key, val)
                                {
                                  var subject = 'Sartor - Nueva Clave';
                                    
                                    
                                    $.ajax({
                                        url: 'helpers/clase.simulacion.emailpassword.helpers.php',
                                        type: 'POST',
                                        dataType: 'json',
                                        data:"correo=" + correo 
                                            + "&subject=" + subject
                                            + "&nombre=" + val.nombres + ' ' +  val.apellido1 + ' ' + val.apellido2
                                            + "&pass=" + val.clave, 
                                        success: function(data,xhr){
                                          
                                          console.log(data);
                                          //siguientePaso();
                                        },
                                        error: function(xhr){
                                          
                                          console.log(xhr.responseText);
                                        }
                                      });
                                }
                            );
                        },
                        error: function(xhr){
                            //paginaError();
                            console.log(xhr.responseText);
                        }
                    });

            
        }

        $('#password').change(function(){
                var x = document.getElementById("errores_pass2");
                x.style.display = "none"; 
                var x = document.getElementById("errores_contraseña");
                x.style.display = "none"; 
                var x = document.getElementById("errores_pass3");
                x.style.display = "none";
                 
                
        });
    </script>

  </body>
</html>
<?php 

require './include/footer.php';

?>