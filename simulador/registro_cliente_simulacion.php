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
  <meta name="description" content="En base a tu sueño podemos planificarnos con un plazo establecido y lograrlo.">
  <meta property="og:title" content="Sartor - Simulador">
  <meta property="og:type" content="article">
  <meta property="og:description" content="En base a tu sueño podemos planificarnos con un plazo establecido y lograrlo." />
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
    sessionStorage.clear();
  </script>
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
  <body>
    <main>
      <header class="header">
        <div class="header__container"><a class="header__container__item header__container__item--logo" href=""><img src="./img/logo.svg"/></a>
          <div class="header__container__text oculto-xs block-md"></div>
        </div>
      </header>
      <br>
      <br>
      <br>
      <br>
      <section class="section section__pasos pasos">
        <div class="contenedor-fluido">
          <div class="marco">
            <div class="fila">
              <!--<div class="col xs12">
                <div class="pasos__cabecera observar">
                  <div class="pasos__icon"><img src="./img/logo-persona-natural.svg" alt="Icono Persona Natural"/></div>
                  <div class="pasos__titulo">
                    <h1>Hazte Cliente <span>Persona Natural</span></h1>
                  </div>
                </div>
              </div>-->
              <div class="col xs12 lg10 offset-lg1">
				        <h3 class="pasos__subtitle observar observar--activo">¡Comencemos!</h3>
                <div class="pasos__form observar">
                  <form class="form needs-validation" id="form-registro-cliente-simulacion" method="post" action="javascript://" novalidate>
				            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token'] ?>">
                    <div class="fila"> 
                    <div class="col xs12 lg6">
                      <div class="form__grupo form__grupo--pass" data-animacion="placeholder">
                                <input class="text rut requerido" type="text" name="rut" id="rut" autocomplete="off" value=""/>
                                <label for="rut">RUT</label><span class="show-pass fln-buscar" onclick="buscarMail();"></span>
                            </div><span class="form__adicional">Sin puntos ni guión. Ej 12345678k</span>
                      </div>                             
                      <div class="col xs12 lg6" >
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_texto requerido" type="text" name="nombres" id="nombres" value="" maxlength="30"/>
                          <label for="nombres">Nombres</label>
                        </div>
                      </div>
                      <div class="col xs12 lg6">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_texto requerido" type="text" name="apellido_primero" id="apellido_primero" value="" maxlength="30"/>
                          <label for="apellido_paterno">Apellido Paterno</label>
                        </div>
                      </div>
                      <div class="col xs12 lg6">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_texto requerido" type="text" name="apellido_segundo" id="apellido_segundo" value="" maxlength="30"/>
                          <label for="apellido_paterno">Apellido Materno</label>
                        </div>
                      </div>
                      <div class="col xs12 lg6">
                        <div class="form__grupo form__grupo--pass" data-animacion="placeholder" form__grupo--pass>
                          <input class="text tipo_email requerido" type="text" name="email" id="email" value="" />
                          <label for="email">Email</label><span class="show-pass fln-mail-full" ></span>
                        </div>
                        <!--<span class="form__adicional">Si ya estas registrado selecciona la lupa.</span>-->
                      </div>

                      <div class="col xs12 lg6">
                        <div class="form__grupo form__grupo--pass" data-animacion="placeholder">
                          <input class="text tipo_numerico tipo_fono requerido" type="text" name="fono" id="fono" data-prefijo="+56" data-prefijo-tipo="fijo" maxlength="12"/>
                          <label for="numero_de_telefono">Número de teléfono o celular</label><span class="show-pass fln-telefono-full" ></span>
                        </div>
                      </div> 

                      <div class="col xs12 lg6" style="margin-bottom: 14px;">
                        <div class="form__grupo form__grupo--pass" data-animacion="placeholder">
                          <input class="text tipo_password requerido" type="password" name="password" id="password" minlength="6" maxlength="12" onkeyup="validarPass();" autocomplete="new-password">
                          <label for="password" class="">Contraseña</label><span class="show-pass fln-vista-light" onclick="mostrarPass();"></span>
                        </div>
                        <span class="form__adicional">Debe tener un mínimo de 6 carácteres y un máximo de 12.</span>
                      </div>

                      <div class="col xs12">
                        <div class="alerta alerta--error" id="errores_pass2" style="display:none;">Las contraseña debe tener un mínimo de 6 y un máximo de 12 caracteres</div>
                        <div class="alerta alerta--error" id="errores_form-previo" style="display:none;"></div>
                        <div class="alerta alerta--error" id="errores_email" style="display:none;">Debe ingresar el email</div>
                        <div class="alerta alerta--error" id="errores_format_email" style="display:none;">El formato del email no es el correcto, vuelva a ingresar el email</div>
                        <div class="alerta alerta--error" id="errores_nombres" style="display:none;">Debe ingresar sus nombres</div>
                        <div class="alerta alerta--error" id="errores_apellido1" style="display:none;">Debe ingresar su primer apellido</div>
                        <div class="alerta alerta--error" id="errores_apellido2" style="display:none;">Debe ingresar su segundo apellido</div>
                        <div class="alerta alerta--error" id="errores_contraseña" style="display:none;">Debe ingresar la contraseña</div>
                        <div class="alerta alerta--error" id="errores_fono" style="display:none;">El número telefónico debe ser sólo números</div>
                        <div class="alerta alerta--error" id="errores_form-rut-persona" style="display:none;">El Rut debe corresponder a una Persona Natural.</div>
                        <div class="alerta alerta--error" id="errores_form-rut" style="display:none;">El RUT debe ser válido.</div>
                        <!--<div class="form__buttons"><a class="form__volver" href="#" onclick="window.history.back();"><span><</span> Volver</a><a class="btn btn--secundario submit" 
                        href="paso1-1.php" onclick="validarRutPrevio(); return false;">Continuar</a></div>-->
                        <div class="form__buttons">
                          <a class="form__volver" href="http://www.sartormas.com" ><span><<</span> Volver</a>
                          <!--<a class="btn btn--secundario submit"
                             onclick="validarFormulario();" 
                          >Continuar</a>-->
                          <button type="submit" class="btn btn--secundario submit " id="registro_cliente_simulacion" >Continuar </button>
                        </div>
                        <p style="text-align:center; margin:24px 0 0 0;">¿Ya eres cliente? <a href="https://www.sartoragf.cl">ingresa aquí</a></p>
                        
                        <div class="separador" id="div1"></div>
                        <div class="separador" id="div12"></div>
                        
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
      <p>El Rut ingresado esta registrado y no coincide con la contraseña ingresada.</p>  
      <button type="submit" class="btn btn--secundario" id="cerrarModal" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>
    <a href="#error-recaptcha" id="error-recaptcha" class="popup-with-form"></a>
    <div id="error-recaptcha" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <p>No es posible registrase en estos momentos, favor intentelo más tarde.</p>  
      <button type="submit" class="btn btn--secundario" id="errorrecaptcha" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>
    <a href="#msgclientereg" id="msgclientereghref" class="popup-with-form"></a>
    <div id="msgclientereg" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <style>.mfp-close{display:none!important;}</style>
      <p>Ya estas registrado en SARTOR. Serás redireccionado al Sitio Privado para que hagas login.</p>  
      <button type="submit" class="btn btn--secundario" id="msgclientreg" style="padding: 8px 16px;min-width:inherit;">OK</button>   
    </div>
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script src="js/jquery.rut.js"></script>
    <script>
          $('.popup-with-form').magnificPopup();
          $('#cerrarModal').click(function(){
            $('.mfp-close').click();
          });
          $('#errorrecaptcha').click(function(){
            $('.mfp-close').click();
          });
          $('#msgclientreg').click(function(){
            //$('.mfp-close').click();
            clienteEnrolado();
          });
          

        	$("#registro_cliente_simulacion").click(function(){
              grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo SITE_KEY ?>', {action: 'submit'}).then(function(token) {
                    $.ajax({
                            url: 'helpers/cliente.simulacion.recaptcha.php',
                            type: 'POST',
                            dataType: 'json',
                            data:"google-token-recaptcha=" + token,
                            success: function(data,xhr)
                            {
                                
                                var mailencontrado = sessionStorage.getItem('mailencontrado');
                                var existe = -1;             
                                if (validarFormulario()){
                                    if(mailencontrado == "no")
                                    {    
                                        var mail = "";
                                        $.ajax({
                                            url: 'helpers/cliente_simulacion_registro_clave_validar.helpers.php',
                                            type: 'GET',
                                            dataType: 'json',
                                            data:"registro=" + $('#rut').val()
                                                +"&clave=" + $('#password').val(),
                                                success: function(data,xhr){
                                                  console.log(data);
                                                        $.each(data, function(key, val)
                                                            {                                  
                                                                existe = val.existe;              
                                                                if(existe == "1")
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
                                                            
                                                                    //alert("El Mail ingresado esta registrado....");
                                                                    sessionStorage.setItem('logeado',1);
                                                                    var arrreg=[];
                                                                    arrreg.push($('#nombres').val());
                                                                    arrreg.push($('#apellido_primero').val());
                                                                    arrreg.push($('#apellido_segundo').val());
                                                                    arrreg.push($('#email').val());
                                                                    arrreg.push($('#password').val());
                                                                    arrreg.push($('#fono').val());
                                                                    arrreg.push($('#rut').val());
                                                                  
                                                                    sessionStorage.setItem('arrreg',btoa(arrreg));
                                                                    sessionStorage.setItem('email',$('#email').val());
                                                                    siguientePasoEncontradoContrana();
                                                                }
                                                                else if(existe == "2")
                                                                {
                                                                  //alert("El Mail ingresado esta registrado y no coincide con la contraseña ingresada....");
                                                                  $('#ultimoperfil-inversion').trigger('click');
                                                                }
                                                                else if(existe == "0")
                                                                {
                                                                  $.ajax({
                                                                  url: 'helpers/registro_cliente_simulacion.helpers.php',
                                                                  type: 'POST',
                                                                  dataType: 'json',
                                                                  data:"nombres=" + $('#nombres').val()
                                                                      + "&apellido1=" + $('#apellido_primero').val()
                                                                      +"&apellido2=" + $('#apellido_segundo').val()
                                                                      +"&registro=" + $('#email').val()
                                                                      +"&clave=" + $('#password').val()
                                                                      +"&numero_de_telefono=" + $('#fono').val()
                                                                      +"&id_origen=" + sessionStorage.getItem('id_origen')
                                                                      +"&rut=" + $('#rut').val(),
                                                                          success: function(data,xhr)
                                                                          {
                                                                            console.log(data);
                                                                          var json = data.result.id;
                                                                                if (data.result.id)
                                                                                {
                                                                                    var arrreg=[];
                                                                                    arrreg.push($('#nombres').val());
                                                                                    arrreg.push($('#apellido_primero').val());
                                                                                    arrreg.push($('#apellido_segundo').val());
                                                                                    arrreg.push($('#email').val());
                                                                                    arrreg.push($('#password').val());
                                                                                    arrreg.push($('#fono').val());
                                                                                    arrreg.push($('#rut').val());
                                                                                    sessionStorage.setItem('arrreg',btoa(arrreg));
                                                                                    sessionStorage.setItem('id_cliente_simulacion',json);
                                                                                    nombrecompleto= $('#nombres').val() + ' ' + $('#apellido_primero').val() + ' ' + $('#apellido_segundo').val();
                                                                                    sessionStorage.setItem('nombre_cliente',nombrecompleto);
                                                                                    sessionStorage.setItem('email',$('#email').val());
                                                                                    id_cliente_simulacion = sessionStorage.getItem('id_cliente_simulacion');
                                                                    
                                                                                    $.ajax({
                                                                                        url: 'helpers/cliente_simulacion.helpers.php',
                                                                                        type: 'POST',
                                                                                        dataType: 'json',
                                                                                        data:"id_cliente_simulacion=" + id_cliente_simulacion,
                                                                                        success: function(data,xhr){
                                                                                        console.log(data);
                                                                                            var json = data.result.id;
                                                                                            sessionStorage.setItem('id_simulacion',json);
                                                                                            sessionStorage.setItem('login',0);
                                                                                            siguientePaso();
                                                                                        },
                                                                                        error: function(xhr){
                                                                                            paginaError();
                                                                                            console.log(xhr.responseText);
                                                                                        }
                                                                                    });    
                                                                                }
                                                                                else
                                                                                {
                                                                                    console.log(xhr.responseText);
                                                                                    paginaError();  
                                                                                }
                                                                          },
                                                                          error: function(xhr){
                                                                              paginaError();
                                                                              console.log(xhr.responseText);
                                                                          }                   
                                                                    });
                                                                }//ultima llave                                              
                                                            });
                                                },
                                                error: function(xhr){
                                                     paginaError();
                                                    console.log(xhr.responseText);
                                                }
                                        }); 
                                                                          
                                          if(existe == 0)
                                          {
                                            
                                          }
                                    }
                                    else
                                    {
                                      var mail = "";
                                      $.ajax({
                                          url: 'helpers/cliente_simulacion_registro_clave.helpers.php',
                                          type: 'GET',
                                          dataType: 'json',
                                          data:"registro=" + $('#rut').val()
                                              +"&clave=" + $('#password').val(),
                                              success: function(data,xhr){
                                              $.each(data, function(key, val)
                                                  {                                    
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
                                                  
                                                          //alert("Contraseña Encontrada....")  
                                                          siguientePasoEncontradoContrana();
                                                      }
                                                  }
                                              );
                                              if(mail == "")
                                              {
                                                  sessionStorage.setItem('id_cliente_simulacion',0);
                                                  nombrecompleto= "";
                                                  sessionStorage.setItem('nombre_cliente',nombrecompleto);
                                                  
                                                  $('#ultimoperfil-inversion').trigger('click');
                                              }
                                          },
                                          error: function(xhr){
                                              paginaError();
                                              console.log(xhr.responseText);
                                          }
                                      }); 
                                    }
                                }
                            },
                            error: function(xhr){
                                  $('#error-recaptcha').trigger('click');
                                  console.log(xhr.responseText);
                            }                   
                      });


                });
              });
              
            });

	  </script>	
<!-- buscamos por correo si existe registro -->
    <script>
        	function buscarMail(){
                if (1==1)
                {   
                    if ( $('#rut').val() == "" ) 
                    {
                      $('#errores_form-rut').show();
                      setTimeout(function(){
                      $('#errores_form-rut').slideUp();
                      $("#rut").val('');
                      $("#rut").addClass("invalido").removeClass("valido");
                      }, 3000);
                      return false;
                    }
                   var existe = true;
                   var rut = '';
                    $.ajax({
                            url: 'helpers/cliente.helpers.php',
                            type: 'GET',
                            dataType: 'json',
                            data:"rut=" + $('#rut').val(),
                            success: function(data,xhr){
                              $.each(data, function(key, val)
                                  {
                                    rut = val.rut;
                                    sessionStorage.setItem('rut',rut);
                                    //alert("Usted es cliente de SARTOR....");
                                    $('#msgclientereghref').trigger('click');
                                    return;
                                  }
                              );   
                              if(rut == '')
                              {                                
                                var mail = "";
                                $.ajax({
                                    url: 'helpers/cliente_simulacion_registro.helpers.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data:"registro=" + $('#rut').val(),
                                    success: function(data,xhr){
                                        $.each(data, function(key, val)
                                            {
                                                sessionStorage.setItem('mailencontrado',"si");
                                                mail = val.registro;
                                                sessionStorage.setItem('email',mail);
                                                sessionStorage.setItem('rut',$('#rut').val());
                                                siguientePasoEncontrado();
                                                //alert("Datos Encontrados, ingrese su contrase√±a para revisar el estado de las simulaciones....")  
                                            }
                                        );
                                        if(mail == "")
                                        {
                                            sessionStorage.setItem('mailencontrado',"no");
                                            document.getElementById("nombres").value = "";
                                            document.getElementById("apellido_primero").value = "";
                                            document.getElementById("apellido_segundo").value = "";
                                            document.getElementById("fono").value = "";
                                            //alert("Correo no registrado debe registrarse para continuar....")
                                        }
                                    },
                                    error: function(xhr){
                                        paginaError();
                                        console.log(xhr.responseText);
                                    }
                                });



                              }                
                            }
                    });                     
                }
            }

            function validarCliente()
            {
              var existe = true;
              var rut = '';
              $.ajax({
                          url: 'helpers/cliente.helpers.php',
                          type: 'GET',
                          dataType: 'json',
                          data:"rut=" + $('#rut').val(),
                          success: function(data,xhr){
                            console.log(data);
                            $.each(data, function(key, val)
                                {
                                  rut = val.rut;
                                  sessionStorage.setItem('rut',rut);
                                  //alert("Usted es cliente de SARTOR....");
                                  $('#msgclientereghref').trigger('click');
                                   

                                  
                                }
                            );                 
                          },
                          error: function(xhr){
                          console.log(xhr.responseText);
                          }
                      }); 
            }
            function paginaError(){
              window.location.href = '/simulador/paginaError.php';
            }

    </script>
    <script>
      //Correccion de contraseña para que no aparezca en cada keyup de la comprobacion
      $('#errores_pass').addClass('forzar-ocultar');
      $('input#re-password').focusout(function() {
          if($('#errores_pass').css('display') !== 'none'){
              $('#errores_pass').addClass('forzar-ocultar');
          }else{
              $('#errores_pass').removeClass('forzar-ocultar');
          }

          });
      $('input#re-password').focusin(function() {
          $('#errores_pass').addClass('forzar-ocultar');

      });
      $('#nombres,#apellido_primero,#apellido_segundo').keyup(function(){
        var $t = $(this);
        $t.val(toTitleCase($t.val()));
      });       
      function toTitleCase( str ) {
        return str.split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " );
      }
  </script>
  <script>     
          $("#rut").focusout(function() {
          var rutPersona = $(this).val();
          var rutSinPuntos = rutPersona.split(".").join("").slice(0,-2);
          //console.log(rutSinPuntos);
          if(rutSinPuntos > 49000000){ 
            $('#errores_form-rut-persona').show();
              setTimeout(function(){
              $('#errores_form-rut-persona').slideUp();
              $("#rut").val('');
              $("#rut").addClass("invalido").removeClass("valido");
              }, 3000);
              return false;
          }

          if($("#rut").hasClass('invalido')){ 
              $('#errores_form-rut').show();
              setTimeout(function(){
              $('#errores_form-rut').slideUp();
              $("#rut").val('');
              $("#rut").addClass("invalido").removeClass("valido");
              }, 3000);
              return false;
          }else{
              $('#errores_form-rut').hide();
              
          }
          validarCliente();
      });
        //Fix RUT
      $("#rut")
        .rut({validateOn: 'keyup change'})
        .on('rutInvalido', function(){ 
        $('#errores_form-rut').hide();
        $(this).addClass("invalido");
        $(this).removeClass("valido");
        })
      .on('rutValido', function(){ 
        $('#errores_form-rut').hide();
        $(this).removeClass("invalido");
        $(this).addClass("valido");
      });

    //Igualar correo
        $('#email,#confirmar-email').keyup(function(){
        $('#errores_mail').hide();
        this.value = this.value.toLowerCase();
        });

        $('#email').change(function(){
        $('#errores_email').hide(); 
        $('#errores_format_email').hide(); 
        });

        $('#nombres').change(function(){
        $('#errores_nombres').hide(); 
        });  

        $('#apellido_primero').change(function(){
        $('#errores_apellido1').hide(); 
        });

        $('#apellido_segundo').change(function(){
        $('#errores_apellido2').hide(); 
        });

        $('#password').change(function(){
        $('#errores_contraseña').hide(); 
        });

        $('#fono').change(function(){
        $('#errores_fono').hide();  
        });

        $('#password').change(function(){
        $('#errores_pass2').hide();  
        });

        function validarFormulario(){
            if ( $('#email').val() === "" ) 
            {
              $('#errores_email').show();
              return false;
            }else if ($('#nombres').val() === "")
            {
              $('#errores_nombres').show();
              return false;
            }else if ($('#apellido_primero').val() === "")
            {
              $('#errores_apellido1').show();
              return false;
            }else if ($('#apellido_segundo').val() === "")
            {
              $('#errores_apellido2').show();
              return false;
            }else if ($('#password').val() === "")
            {
              $('#errores_contraseña').show();
              return false;
            }else if ( $('#rut').val() === "" )
            {
              $('#errores_form-rut').show();
              setTimeout(function(){
              $('#errores_form-rut').slideUp();
              $("#rut").val('');
              $("#rut").addClass("invalido").removeClass("valido");
              }, 3000);
              return false;
            }else if ( $('#rut').val() != "" )
            {
              var rutPersona = $('#rut').val();
              var rutSinPuntos = rutPersona.split(".").join("").slice(0,-2);
              //console.log(rutSinPuntos);
              if(rutSinPuntos > 49000000){ 
                $('#errores_form-rut-persona').show();
                setTimeout(function(){
                $('#errores_form-rut-persona').slideUp();
                $("#rut").val('');
                $("#rut").addClass("invalido").removeClass("valido");
                }, 3000);
                return false;
              }
            }


            if($("#rut").hasClass('invalido')){ 
                $('#errores_form-rut').show();
                setTimeout(function(){
                $('#errores_form-rut').slideUp();
                $("#rut").val('');
                $("#rut").addClass("invalido").removeClass("valido");
                }, 3000);
                return false;
            }

              var reextend = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
            if ( ! reextend.test($('#email').val() ) )
            {
              $('#errores_format_email').show();
              return false;
            }
            
            var renumeric = /[0-9]/;
            if ( ! renumeric.test($('#fono').val())  )
            {
              $('#errores_fono').show();
              return false;
            }

            if ( $('#password').val().length < 6 || $('#password').val().length > 12  )
            {
              $('#errores_pass2').show();
              return false;
            }
            return true;
        }

        function validarFormularioMail(){
            if ( $('#email').val() == "" ) 
            {
                $('#errores_email').show();
                return false;
            }

            var reextend = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
            if ( ! reextend.test($('#email').val() ) )
            {
                $('#errores_format_email').show();
                return false;
            }     
            return true;
        }      

        function siguientePasoEncontradoContrana(){
        window.location.href = '/simulador/visor_simulaciones_realizadas.php?id='+sessionStorage.getItem('id_cliente_simulacion');
        }  

        function siguientePaso(){
        window.location.href = '/simulador/paso1-simulador-perfil.php';
        }    

        function siguientePasoEncontrado(){
        window.location.href = '/simulador/acceso_login_simulacion.php';
        } 

        function clienteEnrolado(){
        window.location.href = 'https://www.sartoragf.cl';
        }
        $.ajax({
                url: 'helpers/cliente.simulacion.parametros.helpers.php',
                method:'get',
                dataType:'json',
                data:"agrupador=" + 'origen',
                success: function(data, xhr){
                console.log(data);
                $.each(data, function(key, val){
                    if ( val.nombre == 'sitio_publico')
                    {
                    sessionStorage.setItem('id_origen',val.id);  
                    sessionStorage.setItem('mailencontrado',"no");
                    }

                });

            },
                error: function(xhr){
                console.log(xhr.responseText);
                }
        });
    </script>
  </body>
</html>
<?php 

	require './include/footer.php';

?>