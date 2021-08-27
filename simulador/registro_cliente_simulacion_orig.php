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
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                          <label for="email">Email</label><span class="show-pass fln-buscar" onclick="buscarMail();"></span>
                        </div>
                        <span class="form__adicional">Si ya estas registrado selecciona la lupa.</span>
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

                      <!--



                      <div class="col xs12 lg6">
                        <div class="form__grupo form__grupo--pass" data-animacion="placeholder">
                          <input class="text tipo_password requerido" type="password" name="password" id="password" maxlength="20" onkeyup="validarPass();" autocomplete="new-password"/>
                          <label for="password">Contraseña</label><span class="show-pass fln-vista-light" onclick="mostrarPass();"></span>
                        </div>
                      </div>-->
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
                        <!--<div class="form__buttons"><a class="form__volver" href="#" onclick="window.history.back();"><span><</span> Volver</a><a class="btn btn--secundario submit" 
                        href="paso1-1.php" onclick="validarRutPrevio(); return false;">Continuar</a></div>-->
                        <div class="form__buttons">
                          <a class="form__volver" href="index.php" ><span><<</span> Volver</a>
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
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script src="js/jquery.rut.js"></script>
    <script>
        	$("#registro_cliente_simulacion").click(function(){
              if (validarFormulario()){
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
                      +"&id_origen=" + sessionStorage.getItem('id_origen'),
                  success: function(data,xhr){
                    var json = data.result.id;
                    var existe = ""
                    var id_cliente_simulacion = 0;
                    var id_simulacion = 0;
                    var nombrecompleto = "";

                    for (var i in json) {
                           existe = json[i].existe;
                           id_cliente_simulacion = json[i].id;
                    }   

                    if(existe != "si")
                    {
                      console.log(existe);
                      console.log("no existe");
                            if (data.result.id)
                            {
                              sessionStorage.setItem('id_cliente_simulacion',json);
                              nombrecompleto= $('#nombres').val() + ' ' + $('#apellido_primero').val() + ' ' + $('#apellido_segundo').val();
                              sessionStorage.setItem('nombre_cliente',nombrecompleto);
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
                            }else{
                              console.log(xhr.responseText);
                              paginaError();  
                            }

                    }
                    else
                    {
                      var existeRegistroSimulacionPendiente = 0;
                      var id_perfil_cliente = 0;
                      var desc_perfil_cliente = "";

                      var id_simulacion = 0;
                      var paso1 = 0;
                      var paso2 = 0;
                      var paso3 = 0;
                      var paso4 = 0;
                      var otro_sueno = "";
                      var inversion = 0;
                      var id_sueno = 0;
                      var inversion_mensual = 0;
                      var tiempo = 0; 
                      var descripcion_sueno = "";
                      nombrecompleto= $('#nombres').val() + ' ' + $('#apellido_primero').val() + ' ' + $('#apellido_segundo').val();
                      
                      $.ajax({
                          url: 'helpers/cliente_simulacion.simulacionregistroidcliente.helpers.php',
                          type: 'GET',
                          dataType: 'json',
                          data:"id_cliente_simulacion=" + id_cliente_simulacion,
                          success: function(data,xhr){
                            //console.log(data);
                            $.each(data, function(key, val)
                            {
                              id_simulacion = val.id;
                              if(id_simulacion != null)
                              {                                
                                existeRegistroSimulacionPendiente = 1;
                              }
                              paso1 = val.paso1;
                              paso2 = val.paso2;
                              paso3 = val.paso3;
                              paso4 = val.paso4;
                              otro_sueno = val.otro_sueno;
                              inversion = val.inversion;
                              id_sueno = val.id_clientes_param_suenos;
                              inversion_mensual = val.inversion_mensual;
                              tiempo = val.tiempo; 
                              descripcion_sueno = val.descripcion_sueno;
                            });

                            $.ajax({
                              url: 'helpers/cliente.simulacion.perfil.helpers.php',
                              method:'get',
                              dataType:'json',
                              data:"id_simulacion=" + id_simulacion,
                              success: function(data, xhr){
                                console.log(data);
                                $.each(data, function(key, val){
                                  id_perfil_cliente = val.id;
                                  desc_perfil_cliente = val.valor;
                                  sessionStorage.setItem('id_perfil_cliente',id_perfil_cliente);
                                  sessionStorage.setItem('desc_perfil_cliente',desc_perfil_cliente);
                                });
                                
                              },
                              error: function(xhr){
                                console.log(xhr.responseText);
                              }
                            });	
                            
                            if(existeRegistroSimulacionPendiente == 1)
                            {
                              alert("Tienes una simulación pediente!");
                              //console.log("valor " + valor);
                              //Swal.fire('Usuario Registrado y con simulación pendiente.....')
                              //alert("Usuario Registrado y con simulación pendiente.....");
                              console.log("existe simulacion");
                              console.log("nombre " + nombrecompleto);
                              console.log("id_cliente_simulacion " + id_cliente_simulacion); 
                              console.log("id_simulacion " + id_simulacion); 
                              console.log("paso1 " + paso1); 
                              console.log("paso2 " + paso2); 
                              console.log("paso3 " + paso3); 
                              console.log("paso4 " + paso4); 
                              console.log("otro_sueno " + otro_sueno);
                              console.log("inversion " + inversion);
                              console.log("inversion_mensual " + inversion_mensual);
                              console.log("tiempo " + tiempo);
                              console.log("id_sueno " + id_sueno); 
                              console.log("id_perfil_cliente " + id_perfil_cliente); 
                              console.log("desc_perfil_cliente " + desc_perfil_cliente); 
                              console.log("descripcion_sueno " + descripcion_sueno); 

                              sessionStorage.setItem('id_cliente_simulacion',id_cliente_simulacion);
                              sessionStorage.setItem('nombre_cliente',nombrecompleto);
                              sessionStorage.setItem('id_simulacion',id_simulacion);

                              sessionStorage.setItem('aporte_inicial',inversion);
                              sessionStorage.setItem('aporte_mensual',inversion_mensual);
                              sessionStorage.setItem('tiempo_inversion',tiempo);

                              sessionStorage.setItem('login',1);
                              if(otro_sueno != "")
                              {
                                sessionStorage.setItem('suenoselect',otro_sueno);
                              } 
                              else
                              {
                                sessionStorage.setItem('suenoselect',descripcion_sueno);
                              }                                                           
                              sessionStorage.setItem('id_sueno', id_sueno);

                              if(paso4 == 1)
                              {
                                siguientePaso4();
                              }
                              else if(paso4 == 0 && paso3 == 1)
                              {
                                siguientePaso3();
                              }
                              else if(paso3 == 0 && paso2 == 1)
                              {
                                siguientePaso2();
                              }
                              else if(paso2 == 0 && paso1 == 1)
                              {
                                siguientePaso1();
                              }

                            }
                            else
                            {
                              //Swal.fire('Usuario Registrado sin sumalación pendiente.....')
                              //alert("Usuario Registrado sin sumalación pendiente.....");
                              console.log("no existe simulacion");
                              $.ajax({
                                    url: 'helpers/cliente_simulacion.helpers.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:"id_cliente_simulacion=" + id_cliente_simulacion,
                                    success: function(data,xhr){
                                      console.log(data);
                                      var json = data.result.id;
                                      sessionStorage.setItem('id_simulacion',json);
                                      //siguientePaso();
                                    },
                                    error: function(xhr){
                                      paginaError();
                                      console.log(xhr.responseText);
                                    }
                                  });    
                            }
                            
                          //aqui se termina toda la logica de que si existe la simulacion
                          },
                          error: function(xhr){
                            paginaError();
                            console.log(xhr.responseText);
                          }
                      }); 
                    //aqui se termina el else de que si existe un registro de clientes registrado 
                    }
                    
                  },
                  error: function(xhr){
                    console.log(xhr.responseText);
                    paginaError();
                    
                  }
                });

                   

              }
          });


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
	</script>
    <script>
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

      function validarRutPrevio(){
        
        if($('#email').val() == $('#confirmar-email').val()){

          $('#nombres').click();
          if($("#rut").hasClass('invalido')){ 
            $('#errores_form-rut').show();
          }else{
            $('#errores_form-rut').hide();
            validarPasoPrevio();
          }

        }else{
          $('#errores_mail').show();
        }


      }

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

      function siguientePaso1(){
        window.location.href = '/simulador/paso1-simulador-perfil.php';
      }

      function siguientePaso2(){
        window.location.href = '/simulador/paso2-simulador-objetivo.php';
      }

      function siguientePaso3(){
        window.location.href = '/simulador/paso3-simulador-simulacion.php';
      }

      function siguientePaso4(){
        window.location.href = '/simulador/paso4-simulador-cartera.php';
      }
      function paginaError(){
        window.location.href = '/simulador/paginaError.php';
      }

      function siguientePasoEncontrado(){
        window.location.href = '/simulador/acceso_login_simulacion.php';
      }
      function confirmarCancelacion(){
        var valor = 0;
        swal("Tienes una simulación pendiente ¿ Qué deseas hacer ? .", {
          buttons: {
            cancel: "Ir a la  Simulación",
            catch: {
              text: "Nueva Simulación",
              value: "Continuar Simulación",
            }
          },
        })
        .then((value) => {
            switch (value) {          
              case "defeat":
                //swal("Simulación fue cancelada.");
                valor = 3;
                break;
          
              case "catch":
                //swal("Continua Simulación", "success");
                valor = 2;
                break;
          
              default:
                //swal("Operación Cancelada.");
                valor = 1;
            }
        });
        return valor;
      }

      function formatStrMonto(valor)
      {
        return '$' + parseInt(valor).toLocaleString('es-ES');
      }

      $('#nombres,#apellido_primero,#apellido_segundo').keyup(function(){
        var $t = $(this);
        $t.val(toTitleCase($t.val()));
      });       
      function toTitleCase( str ) {
        return str.split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " );
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
    <script>
        	function buscarMail(){
                if (validarFormularioMail())
                {    
                    var mail = "";
                    $.ajax({
                        url: 'helpers/cliente_simulacion_registro.helpers.php',
                        type: 'GET',
                        dataType: 'json',
                        data:"registro=" + $('#email').val(),
                        success: function(data,xhr){
                            $.each(data, function(key, val)
                                {
                                    sessionStorage.setItem('mailencontrado',"si");
                                    mail = val.registro;
                                    sessionStorage.setItem('email',mail)
                                    siguientePasoEncontrado();
                                    // document.getElementById("nombres").value = val.nombres;
                                    // document.getElementById("apellido_primero").value = val.apellido1;
                                    // document.getElementById("apellido_segundo").value = val.apellido2;
                                    // document.getElementById("fono").value = "+" + val.numero_de_telefono;
                                    
                                }
                            );
                            if(mail == "")
                            {
                                sessionStorage.setItem('mailencontrado',"no");
                                document.getElementById("nombres").value = "";
                                document.getElementById("apellido_primero").value = "";
                                document.getElementById("apellido_segundo").value = "";
                                document.getElementById("fono").value = "";
                                alert("Correo no registrado debe registrarse para continuar....")
                            }
                        },
                        error: function(xhr){
                            paginaError();
                            console.log(xhr.responseText);
                        }
                    }); 
                 }
            }


</script>  
  </body>
</html>
<?php 

	require './include/footer.php';

?>