<?php
  setlocale(LC_MONETARY, 'es_CL');
  //setlocale(LC_ALL, "es_CO.UTF-8");
  /*session_start();*/
  require __DIR__ . '/include/php/functions.php';

  $parametros = array(
    "agrupador" => "valor_minimo_simulador"
  );
  $rest   = new restWS;
  try {
    $respWS = $rest->ws();      
    $urlWS = $respWS . "/clientes.simulacion.parametros";
    $jsonReg = $rest->get($urlWS, $parametros);
    $arrReg = json_decode($jsonReg, true);
    $valor_minimo_inicial=0;
    $valor_minimo_mensual=0;
    foreach($arrReg as $data)
    {
      if ( $data['nombre'] == 'valor_minimo_inicial'  )
      {   $valor_minimo_inicial= $data['valor']; }
      if ( $data['nombre'] == 'valor_minimo_mensual'  )
      {   $valor_minimo_mensual= $data['valor']; } 
    }
    
  } catch (Exception $e) {
    echo "hubo un error";
  }
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
  <body >
    <main>
      <header class="header">
        <div class="header__container"><a class="header__container__item header__container__item--logo" href=""><img src="./img/logo.svg"/></a>
          <div class="header__container__text oculto-xs block-md"></div>
          <div id="menu__session"  class="menu__session" style="display:none;">
            <a href="#;" class="menu__session-logout" title="Cerrar Sesión"><img src="./img/user-logout.svg"/></a>
          </div>
        </div>
      </header>
      <section class="section section__pasos pasos">
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
                    <p id="nombclient"><span class="destacado">, <span class="doble-linea">estás en el paso 2 de 4</span></p>
                    <p><span class="doble-linea">estás en el paso 2 de 4</span></p>
                    <br>
                    <p><small>Hemos recibido correctamente toda la información para poder determinar tu perfil del inversionista. 
Ahora bien en una segunda instancia necesitamos detalles de <span class="textcolor">tus objetivos</span> para poder brindarte una simulación personalizada para este.
                    </small></p>
                </div>
              </div>
              <div class="col xs12 lg8 offset-lg2">
                <div class="pasos__pasos numbers observar">
                  <div class="numbers__numbers">
                      <span class="numbers__item">1</span>
                      <span class="numbers__item activo">2</span>
                      <span class="numbers__item ">3</span>
                      <span class="numbers__item ">4</span>
                      </div><span class="numbers__linea"></span>
                </div>
                <div class="numbers__movil"><span class="numbers__item activo">2</span></div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <h3 class="pasos__subtitle observar">Tus Objetivos</h3>
                <div class="pasos__form observar">
                  <form class="form needs-validation" id="form-paso3" method="post" action="javascript://" novalidate>
		                <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token'] ?>">
                    <div class="fila">
                      <div class="col xs12 lg6" id="div_suenos_selected">
                        <div class="form__grupo form__grupo--select" data-animacion="placeholder"><span class="icono fln-abajo"></span>
                        
                          <select name="all_fund" id="all_fund" class="form-control" required>
                            <option value="0"> — Seleccione un Objetivo — </option>
                          </select>
                          <div class="invalid-feedback" style="display:none;">Seleccione un Objetivo</div>
                          <label for="monto" class="focus">Seleccione un Objetivo</label>
                        </div>
                      </div>
                      <div class="col xs12 lg6" style="display: none" id="div_suenos_otros">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_text requerido" type="text" name="sueno_otros" id="sueno_otros" maxlength="20" value=""/>
                          <label for="sueno_otros">Igresa tu Objetivo</label>
                        </div>
                      </div>
                      <div class="col xs12 lg6">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_numerico requerido" type="text" name="aporte_inicial" id="aporte_inicial" maxlength="20" 
                                 value="" placeholder="$ 100.000" autocomplete="off" 
                                 onkeyup="format(this)"/>
                          <label for="numero_de_cuenta" class="focus">Aporte Inicial</label>
                        </div>
                        <!--<span class="form_adicional" id="minimo_inicial"></span>-->
                      </div>
                      <div class="col xs12 lg6">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_numerico requerido" type="text" name="aporte_mensual" id="aporte_mensual" maxlength="20" value="" 
                          placeholder="$ 10.000" autocomplete="off"
                          onkeyup="format(this)" />
                          <label for="numero_de_cuenta" class="focus">Aporte Mensual</label>
                        </div>
                        <!--<span class="form_adicional" id="minimo_mensual"></span>-->
                      </div>
                      <div class="col xs12 lg6" style="margin-bottom: 14px;">
                        <div class="form__grupo" data-animacion="placeholder">
                          <input class="text tipo_numerico requerido" type="text" name="tiempo_inversion" id="tiempo_inversion" maxlength="20" min="12" value=""/>
                          <label for="numero_de_cuenta">Tiempo de Inversión</label>
                        </div>
                        <span class="form__adicional">Tiempo en años</span>
                      </div>


                      <!--<div class="col xs12 lg6" style="margin-bottom: 14px;">
                        <div class="form__grupo form__grupo--pass" data-animacion="placeholder">
                          <input class="text tipo_password requerido" type="password" name="password" id="password" minlength="6" maxlength="12" onkeyup="validarPass();" autocomplete="new-password">
                          <label for="password" class="">Contraseña</label><span class="show-pass fln-vista-light" onclick="mostrarPass();"></span>
                        </div>
                        <span class="form__adicional">Debe tener un mínimo de 6 carácteres y un máximo de 12.</span>
                      </div>-->



                      <div class="col xs12">
                        <div class="alerta alerta--error" id="errores_form-paso3" style="display:none;"></div>
                        <div class="alerta alerta--error" id="errores_aporte_inicial" style="display:none;">Debe ingresar el Aporte Inicial </div>
                        <div class="alerta alerta--error" id="errores_aporte_mensual" style="display:none;">Debe ingresar el Aporte Mensual</div>
                        <div class="alerta alerta--error" id="errores_tiempo_inversion" style="display:none;">Debe ingresar el Tiempo de Inversión </div>
                        <div class="alerta alerta--error" id="errores_suenos" style="display:none;">Debe seleccionar un objetivo  </div>
                        <div class="alerta alerta--error" id="errores_suenos_otros" style="display:none;">Debe ingresar un objetivo  </div>
                        <div class="alerta alerta--error" id="errores_numeric_aporte_inicial" style="display:none;">El Aporte Inicial debe ser númerico</div>
                        <div class="alerta alerta--error" id="errores_numeric_aporte_mensual" style="display:none;">El Aporte Mensual debe ser númerico</div>
                        <div class="alerta alerta--error" id="errores_numeric_tiempo_inversion" style="display:none;">El Tiempo de Inversión debe ser númerico</div>
                        <div class="alerta alerta--error" id="errores_min_tiempo_inversion" style="display:none;">El Tiempo de Inversión debe ser mayor a cero</div>
                        <div class="alerta alerta--error" id="errores_min_aporte_inicial" style="display:none;"></div>
                        <div class="alerta alerta--error" id="errores_min_aporte_mensual" style="display:none;"></div>                        
                        <!--<div class="form__buttons"><a class="form__volver" href="paso2-simulacion.php"><span><</span> Volver</a>
                        <a class="btn btn--secundario submit" >Siguiente</a></div>-->
                        <div class="form__buttons">
                          <a class="form__volver" href="#" onclick="volver();"><span><<</span> Volver</a>
                          <!--<a class="btn btn--secundario submit"
                             onclick="validarFormulario();" 
                          >Continuar</a>-->
                          <button type="submit" class="btn btn--secundario submit " id="paso3_simulacion" >Simular </button>
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
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script>
          function volver(){
            if (sessionStorage.getItem('noperfil') == 'NO')
            {
              window.location.href = '/simulador/paso1-simulador-perfil.php';  
            }else{
              window.location.href = '/simulador/visor_simulaciones_realizadas.php?id='+ sessionStorage.getItem('id_cliente_simulacion');
            }
          }
          var arrobjetivosid=[];
          var arrobjetivosdesc=[];
          var idothers=0;
          if ( sessionStorage.getItem('logeado') == 1)
          {
              var x = document.getElementById('menu__session');
              x.style.display = "block";
          }
          $("#nombclient").text(sessionStorage.getItem('nombre_cliente'));
          var valor_min_ini = <?php echo $valor_minimo_inicial ?>;
          var valor_min_men = <?php echo $valor_minimo_mensual ?>;

          //$("#minimo_inicial").text('Aporte Inicial mínimo $' + formatStrMonto(valor_min_ini));
          //$("#minimo_mensual").text('Aporte Mensual mínimo $' + formatStrMonto(valor_min_men));
        //Traer fondos
            $.ajax({
              url: 'helpers/clientes_suenosget.helpers.php',
              method:'get',
              dataType:'json',
              success: function(data, xhr){
                console.log(data);
                var text = '';
                text+='<option value="0" data-mount="0"> — Seleccione Objetivo — </option>';
                idothers=0;
                $.each(data, function(key, val){
                  if ( val.valor.toUpperCase() !='SIN SUENO'  )
                  {
                    text+='<option value="'+ val.id +'" data-mount="'+ val.valor +'">'+val.valor+'</option>'; 
                    arrobjetivosid.push(val.id);
                    arrobjetivosdesc.push(val.valor);
                    if ( val.valor.toUpperCase() == 'OTROS' )
                    {
                      idothers=val.id;
                      arrobjetivosid.push(idothers);
                      arrobjetivosdesc.push(val.valor);
                    } 
                  }
                });
                if ( sessionStorage.getItem('arrotherdreams')  )
                    {
                        var arrotherdreams = sessionStorage.getItem('arrotherdreams');
                        arraux = arrotherdreams.split(';');
                        for ( i=0; i < arraux.length; i++  )
                        {   
                            if ( arrobjetivosdesc.indexOf(arraux[i]) < 0 )
                            {
                              arrobjetivosid.push(idothers);
                              arrobjetivosdesc.push(arraux[i]);
                              text+='<option value="'+ idothers +'" data-mount="'+ arraux[i] +'">'+arraux[i]+'</option>';    
                            }
                            
                        } 
                        
                    }
                $('#all_fund').html(text);
            },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            });	
            function formatStrMonto(valor)
            {
            return parseInt(valor).toLocaleString('es-ES');
            };
            var id_simulacion = sessionStorage.getItem('id_simulacion'); 
            $.ajax({
              url: 'helpers/cliente.simulacion.perfil.helpers.php',
              method:'get',
              dataType:'json',
              data:"id_simulacion=" + id_simulacion,
              success: function(data, xhr){
                console.log(data);
                $.each(data, function(key, val){
                  sessionStorage.setItem('id_perfil_cliente',val.id);
                  sessionStorage.setItem('desc_perfil_cliente',val.valor);
                });
                
            },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            });	
            function formatStrMonto(valor)
            {
            return parseInt(valor).toLocaleString('es-ES');
            };
      </script>
      <script>
        var valor_min_ini = <?php echo $valor_minimo_inicial ?>;
        var valor_min_men = <?php echo $valor_minimo_mensual ?>;
        $("#paso3_simulacion").click(function(){
            if (validarFormulario() ) { 
                  var id_simulacion = sessionStorage.getItem('id_simulacion');  
                  var id_sueno = sessionStorage.getItem('id_sueno');
                  sessionStorage.setItem('aporte_inicial',$('#aporte_inicial').val());
                  sessionStorage.setItem('aporte_mensual',$('#aporte_mensual').val());
                  sessionStorage.setItem('tiempo_inversion',$('#tiempo_inversion').val());
                  if( $('#sueno_otros').val() != '')
                  {
                    sessionStorage.setItem('suenoselect',$('#sueno_otros').val());
                  }
                  
                  var id_perfil = sessionStorage.getItem('id_perfil_cliente');
                  if (sessionStorage.getItem('id_perfil'))
                  {
                      sessionStorage.setItem('id_perfil_cliente',sessionStorage.getItem('id_perfil'));
                      sessionStorage.setItem('desc_perfil_cliente',sessionStorage.getItem('desc_perfil'));
                      id_perfil = sessionStorage.getItem('id_perfil');
                  }
                  if (sessionStorage.getItem('perfil_simulador'))
                  {
                    if(sessionStorage.getItem('perfil_simulador') != sessionStorage.getItem('id_perfil_cliente'))
                    {
                      sessionStorage.setItem('id_perfil_cliente',sessionStorage.getItem('perfil_simulador'));
                      sessionStorage.setItem('desc_perfil_cliente',sessionStorage.getItem('desc_simulador'));
                      id_perfil = sessionStorage.getItem('id_perfil');
                    }
                  }
                  $.ajax({
                    url: 'helpers/cliente_simulacion_update.helpers.php',
                    type: 'POST',
                    dataType: 'json',
                    data:"id=" + id_simulacion
                        +"&id_clientes_param_suenos=" + id_sueno 
                        +"&otro_sueno=" + $('#sueno_otros').val()
                        +"&aporte_inicial=" + splitmonto($('#aporte_inicial').val().split("."))
                        +"&aporte_mensual=" + splitmonto($('#aporte_mensual').val().split("."))
                        +"&tiempo=" + $('#tiempo_inversion').val()*12
                        +"&id_perfil=" + id_perfil,
                    success: function(data,xhr){
                      var json = data.result.id;
                      console.log(data);
                      //cleanElements();
                      siguientePaso();
                    },
                    error: function(xhr){
                      console.log(xhr.responseText);
                      paginaError();
                    }
                  });
            }
        });
        function validarFormulario(){
          if ( $('#aporte_inicial').val() === "" ) 
          {
            $('#errores_aporte_inicial').show();
            return false;
          }else if ($('#aporte_mensual').val() === "")
          {
            $('#errores_aporte_mensual').show();
            return false;
          }else if ($('#tiempo_inversion').val() === "")
          {
            $('#errores_tiempo_inversion').show();
            return false;
          }else if ($('#all_fund').val() === "0" )
          {
            $('#errores_suenos').show();
            return false;
          }else if (  $('#div_suenos_otros').is(":visible") &&    $('#sueno_otros').val() ==='' ){
            $('#errores_suenos_otros').show();
            return false; 
          }
          var renumeric = /[0-9]/;
          if ( ! renumeric.test($('#aporte_inicial').val())  )
          {
            $('#errores_numeric_aporte_inicial').show();
            return false;
          }
          if ( ! renumeric.test($('#aporte_mensual').val())  )
          {
            $('#errores_numeric_aporte_mensual').show();
            return false;
          }
          if ( ! renumeric.test($('#tiempo_inversion').val())  )
          {
            $('#errores_numeric_tiempo_inversion').show();
            return false;
          }

          if ( splitmonto($('#aporte_inicial').val().split(".")) < valor_min_ini )
          {
            $('#errores_min_aporte_inicial').text('El Aporte Inicial no debe ser menor al monto $' + parseInt(valor_min_ini).toLocaleString('es-ES'));
            $('#errores_min_aporte_inicial').show();
            return false;
          }  

          if ( splitmonto($('#aporte_mensual').val().split(".")) < valor_min_men )
          {
            $('#errores_min_aporte_mensual').text('El Aporte Mensual no debe ser menor al monto $' + parseInt(valor_min_men).toLocaleString('es-ES'));
            $('#errores_min_aporte_mensual').show();
            return false;
          }
          if ( $('#tiempo_inversion').val() < 1  )
          {
            $('#errores_min_tiempo_inversion').show();
            return false;
          }

          return true;
        }

        $( "#aporte_inicial" ).keyup(function() {
          if ( $('#aporte_inicial').val() < 1 )
          {
            $('#aporte_inicial').val(""); 
          }
        });

        $( "#aporte_mensual" ).keyup(function() {
          if ( $('#aporte_mensual').val() < 1 )
          {
            $('#aporte_mensual').val(""); 
          }
        });

        $('#aporte_inicial').change(function(){
          //$('#aporte_inicial').val($('#aporte_inicial').val().formatter);
          $('#errores_aporte_inicial').hide(); 
          $('#errores_numeric_aporte_inicial').hide(); 
          $('#errores_min_aporte_inicial').hide();
        });  
        $('#aporte_mensual').change(function(){
          $('#errores_aporte_mensual').hide(); 
          $('#errores_numeric_aporte_mensual').hide(); 
          $('#errores_min_aporte_mensual').hide();
        });
        $('#tiempo_inversion').change(function(){
          $('#errores_tiempo_inversion').hide(); 
          $('#errores_numeric_tiempo_inversion').hide(); 
          $('#errores_min_tiempo_inversion').hide();
        });
        $('#sueno_otros').change(function(){
          $('#errores_suenos_otros').hide();
        });
        function siguientePaso(){
          window.location.href = '/simulador/paso3-simulador-simulacion.php';
        }
        function paginaError(){
          window.location.href = '/simulador/paginaError.php';
        }
        $('#aporte_inicial').focusout(function(){
          if ( $('#aporte_inicial').val() == "")
          {
            $('#aporte_inicial').val(" ");
          }
        });

        $('#aporte_mensual').focusout(function(){
          if ( $('#aporte_mensual').val() == "")
          {
            $('#aporte_mensual').val(" ");
          }
        });

        //$('#all_fund')
        $('#all_fund').on('change', function() {
          
          var  datoMonto= $(this).find(':selected').attr('value');
          var  datotexto= $(this).find(':selected').attr('data-mount');
          sessionStorage.setItem('suenoselect',datotexto);
          sessionStorage.setItem('id_sueno',datoMonto);
          var aux = datotexto.toUpperCase();
          if ( aux === 'OTROS'   )
          {
            var divsuenoselect = document.getElementById('div_suenos_selected');
            divsuenoselect.style.display = "none";
            var divsuenoothers= document.getElementById('div_suenos_otros');
            divsuenoothers.style.display = "block";
          }else{
            if ( idothers == datoMonto  )
            {
              $('#sueno_otros').val(datotexto);
            }
          }
          $('#errores_suenos').hide(); 
        });
        function cleanElements(){
            $('#sueno_otros').val('');
            $('#aporte_inicial').val('');
            $('#aporte_mensual').val('');
            $('#tiempo_inversion').val('');
          };
          function format(input)
          {
              var num = input.value.replace(/\./g,'');
              if(!isNaN(num)){
                  num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                  num2 = num.split('').reverse().join('').replace(/^[\.]/,'');
                  input.value = num2;
                  //console.log(num2.split('.').join(''));
                  //from_south(num2);
              }
              else{ 
                  //alert('Solo se permiten numeros');
                  input.value = input.value.replace(/[^\d\.]*/g,'');
              }
          }
          function splitmonto(arreglo)
          {
            var i;
            var str="";
            for (i = 0; i < arreglo.length; i++) {
                  str += arreglo[i] ;
            }
            return str;
          }
          $(".menu__session-logout").click(function(){
            console.log('click cerrar sesion');
            sessionStorage.clear();
            $('body').fadeOut( "slow", function() {
                        window.location.href = "http://www.sartormas.com/";
            });       
          });
      </script>	
      
  </body>
  
</html>

<?php 

require './include/footer.php';

?>
