<?php
session_start();
 /*session_start();*/
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
                        <p id="nombclient"><span class="destacado">, <span class="doble-linea">estás en el paso 3 de 4</span></p>
                        <p><span class="doble-linea">estás en el paso 3 de 4</span></p>
                        <br>
                        <p><small>A continuación te presentamos <span class="textcolor">tu simulación</span> la cual fue personalizada a partir de tus respuestas previas.Puedes cambiar los rangos aquí mismo e ir adecuándola a lo que más prefieras.
                    </small></p>
                  </div>
              </div>
              <div class="col xs12 lg8 offset-lg2">
                <div class="pasos__pasos numbers observar">
                  <div class="numbers__numbers">
                          <span class="numbers__item">1</span>
                          <span class="numbers__item">2</span>
                          <span class="numbers__item activo">3</span>
                          <span class="numbers__item">4</span>
                  </div>
                  <span class="numbers__linea"></span>
                </div>
                <div class="numbers__movil"><span class="numbers__item activo">3</span></div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <h3 class="pasos__subtitle observar">Tu simulación</h3>
                <div class="separador"></div>

                <div class="pasos__form observar observar--activo">
                  <form class="form needs-validation" id="form-paso5" method="post" action="javascript://">
				            <!--<input type="hidden" id="token" name="token" value="9acbcb09961ab69c9a78f4dffcc169bc04b99e7daaa26e2e2e1de832bb8b2a45">-->
                    <div class="fila">
                        <div class="col xs12 lg4">
                            <div class="pasos__contenedor col__ajuste-resp"> 
                                <div class="form__group ">
                                  <div class="row">
                                    <label for="form__text">Tu objetivo:  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <p id="suenoclient" class="txt-label negrita"></p>                                   
                                  </div>
                                  <!--<div class="row">
                                      <label for="form__text">Tu Perfil:</label>
                                      <p id="perfil" class="txt-label"></p>
                                  </div>-->
                                  <div class="row">
                                          
                                            <label for="form__text" class="perfil">Tu perfil:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          
                                          
                                              <div class="form__grupo form__grupo--select" data-animacion="placeholder"><span class="icono fln-abajo"></span>
                                              <label for="monto" class=""><small>Simula con otro perfil</small></label>
                                                <select name="all_fund" id="all_fund" class="form-control " >
                                                  <option value="0"> — Seleccione Perfil — </option>
                                                </select>
                                              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <p><small>Según tus respuestas tu perfil es <i><span id="iperfil"></span></i>, no obstante esto puedes acceder a otras alternativas de inversión al seleccionar otro perfil, Para saber más 
                                                <a class="popup-with-form" data-backdrop="static" href="#info-do">Presiona aquí</a></small></p>
                                          
                                          
                                    </div>
                                    <div style="display: none">
                                            <input id="id_perfil_cliente" class="text tipo_numerico requerido" type="text" name="id_perfil_cliente" 
                                                    value="" />
                                    </div>
                                   <!--<div class="row" style=”text-align: justify;” >
                                    
                                  </div>   
                                 <div class="row">
                                    <div class="form__group">
                                          <label for="form__text">Aporte Inicial:</label>
                                          <p id="aporte_inicial" class="col__shadow">$0</p>
                                    </div>   
                                  </div> --> 
                                  <div class="row">
                                      
                                        <div class="form__grupo" data-animacion="placeholder">
                                              <input id="aporte_inicial" class="text tipo_numerico requerido txt-bold" type="text" name="aporte_inicial" maxlength="20" 
                                                    value="0" 
                                                    onkeyup="format(this)"/>
                                              <label for="form__text" class="focus">Aporte Inicial</label>
                                        </div>
                                        <!--<span class="form_adicional" id="minimo_inicial"></span>-->
                                     
                                  </div>
                                  <div class="row">
                                      <!--<div class="form__group">
                                        <label for="form__text">Aporte Mensual:</label>
                                        <p id="aporte_mensual" class="col__shadow">$0</p>
                                      </div>-->  
                                      <div class="form__grupo" data-animacion="placeholder">
                                        <input class="text tipo_numerico requerido txt-bold" type="text" name="aporte_mensual" id="aporte_mensual" maxlength="20" value="0" 
                                        placeholder="$" autocomplete="off"
                                        onkeyup="format(this)" />
                                        <label for="form__text" class="focus">Aporte Mensual</label>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form__group">
                                      
                                        <label for="form__text">Tiempo de inversión (años):</label>
                                        <h6 class="negrita">Años: <span id="amount" class="txt-bold"></span></h6>
                                        <div id="slider-range"></div>
                                        <p id="tiempo_inversion" class="negrita"></p>
                                        
                                      </div>  
                                  </div>    
                                  <div class="row">
                                    <div class="box box__blue">
                                      <div class="form__group">
                                        <p>Te recomendamos la cartera:</p>
                                        <h4 id="perfilh4">Moderada</h4>
                                        <label for="form__text" id="fondo1" style="display: none">40% Fondo Sartor Táctivo</label>
                                        <label for="form__text" id="fondo2" style="display: none">40% Fondo Sartor Leasing</label>
                                        <label for="form__text" id="fondo3" style="display: none">10% Fondo Sartor Táctico Internacional</label>
                                        <label for="form__text" id="fondo4" style="display: none">10% Fondo Sartor Proyección</label>
                                        <label for="form__text" id="fondo5" style="display: none">40% Fondo Sartor Táctivo</label>
                                        <label for="form__text" id="fondo6" style="display: none">40% Fondo Sartor Leasing</label>
                                        <label for="form__text" id="fondo7" style="display: none">10% Fondo Sartor Táctico Internacional</label>
                                        <label for="form__text" id="fondo8" style="display: none">10% Fondo Sartor Proyección</label>
                                        <label for="form__text" id="fondo9" style="display: none">40% Fondo Sartor Táctivo</label>
                                        <label for="form__text" id="fondo10" style="display: none">40% Fondo Sartor Leasing</label>
                                        
                                      </div>  
                                    </div>
                                  </div>                  
                                </div>
                            </div>
                        </div>
                        <div class="col xs12 lg8">
                            <div class="fila resultados__estimados">
                              <div class="col xs12 lg4">
                                  <!--<div class="pasos__contenedor">--> 
                                    <div class="form__group">
                                        <label for="form__text">Monto Invertido:</label>
                                        <p id="montoinvertido" class="col__border col__border-xl txt-bold negrita">$ 0</p>
                                    </div>
                                  <!-- </div> -->
                              </div>
                              <div class="col xs12 lg4">
                                <div class="pasos__contenedor"> 
                                  <div class="form__group">
                                      <label for="form__text">Resultado Esperado:</label>
                                      <p id="resultadoesperado" class="col__border col__border-xl txt-bold negrita">$ 0</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col xs12 lg4">
                                <div class="pasos__contenedor"> 
                                      <div class="form__group">
                                          <label for="form__text">Resultado Optimista:</label>
                                          <p id="resultadooptimista" class="col__borderoptimista txt-bold negrita" >$ 0</p>
                                      </div>   
                                      <div class="form__group">
                                        <label for="form__text">Resultado Pesimista:</label>
                                        <p id="resultadopesimista" class="col__borderpesimista txt-bold negrita">$ 0</p>
                                      </div>
                                </div> 
                              </div>
                            </div>
                            <div class="fila fila resultados__graficos">
                              <div class="col xs12 lg12">
                                <div class="pasos__contenedor">
                                  <!--div class="select__icon"><img src="./img/icon-biometric.svg" alt="Icono Persona Natural"></div-->
                                  <canvas id="simulador"></canvas>
                                </div>
                              </div>
                              <!--<a class="btn btn--secundario " href="#" onclick="Allgetdetalle(); return false;">Comparar Gráficos</a>-->
                            </div>  
                            <!--<div class="fila fila resultados__graficos">
                              <div class="col xs12 lg12">
                                <div class="pasos__contenedor" >
                                  
                                  <canvas id="simulador1"></canvas>
                                </div>
                              </div>
                            </div> -->
                            <div class="fila resultados__check">                        
                              <div class="col xs12 lg12">
                                <div class="row" style="display:none;" id="divcheck1">
                                  <div class="form__checkbox" >
                                    <input class="check-style" type="checkbox" name="check1" id="check1" onclick="clickcheck(1);"/>
                                    <label for="check-ciudadano-usa"><small>Entiendo que mi perfil de inversión es <span id="iperfil2"></span>. Además estoy eligiendo una cartera correspondiente a un perfil <span id="iperfilactual"></span> llamada <span id="iperfil3"></span>.</small></label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form__checkbox">
                                    <input class="check-style" type="checkbox" name="check2" id="check2" onclick="clickcheck(2);"/>
                                    <label for="check-ciudadano-usa"><small>Entiendo que estoy invirtiendo en Activos Alternativos, por lo que su plazo de rescate será en 45 días. 
                                    Para saber más Haz <a class="popup-with-form" data-backdrop="static" href="#info-uno">click</a>  aquí.</small></label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form__checkbox">
                                    <input class="check-style" type="checkbox" name="check3" id="check3" onclick="clickcheck(3);"/>
                                    <label for="check-ciudadano-usa"><small>Entiendo que es un cálculo orientativo obtenido con las rentabilidades medias 
                                    anuales ponderadas ofrecidas por Sartor. Rentabilidades pasadas no garantizan rentabilidades futuras. 
                                    Las rentabilidades utilizadas para simular son netas (no incluye gastos no reflejados en el valor liquidativo) y 
                                    las puedes consultar en las landing de cada fondo,
                                    <a href="https://www.sartor.cl/es/areas-de-negocio/asset-management" target="_blank"> aquí</a> .</small></label>
                                  </div>
                                </div>
                                <div class="alerta alerta--error" id="errores_check1" style="display:none;">Debe hacer click en los cuadros para aceptar la información entregada.</div>
                                <!--<div class="alerta alerta--error" id="errores_check2" style="display:none;">Debe hacer click en los cuadros para aceptar la información entregada.</div>
                                <div class="alerta alerta--error" id="errores_check3" style="display:none;">Debe hacer click en los cuadros para aceptar la información entregada.</div>-->
                                <div class="form__buttons">
                                  <a class="form__volver" href="paso2-simulador-objetivo.php" onclick=""><span><<</span> Volver</a>
                                  <button type="submit" class="btn btn--neutro submit " id="paso4_simulador" style="text-transform:inherit;" disabled>Aceptar </button>
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
    <div class="modal modal--home zoom-anim-dialog mfp-hide" id="info-uno">
      <h2>¿Porqué no puedo retirar mi dinero de forma inmediata?</h2>
      <p>En general, cuando un grupo de inversionistas apuesta por empresas que están en un fondo de deuda privada, lo que éstas hacen es usar ese capital, principalmente, para crecer (puede ser para abastecerse de energías limpias, contratar gente, entre otros destinos).</p>
      <p>Cuando un inversionista quiere desinvertir o rescatar su dinero (que es el término financiero), se debe aplicar los términos acordados para liquidar las cuotas que quiera retirar. Todo, siempre, buscando las mejores condiciones para todos los inversionistas. </p>
      <p>Por esta razón es que pasan varios días entre que comunicas tu intención de rescate y que éste llega a los partícipes del fondo. </p>
      <img src="img/invertir.png" />
    </div> 
    <div class="modal modal--home zoom-anim-dialog mfp-hide" id="info-do">
      <h6><p class="textModal2">La inversión adecuada para otros, puede no serlo para ti.</br>
            Identifica tus necesidades para luego formar tu cartera de inversiones.</p></h6>
      <p>El perfil del inversionista se refiere a las características de una persona que guían cómo debiera tomar sus decisiones de inversión, incluido su nivel de tolerancia al riesgo, en relación a los diversos instrumentos de inversión que existen en el mercado.</p>
      <p>A medida que conozcas qué tipo de inversionista eres, podrás elegir mejor forma entre las alternativas de inversión a las que puedes optar o crear una mezcla que se adapten a tu perfil.</p>
      <p>Saber las necesidades y objetivos de inversión actuales,  el horizonte de inversión, la disponibilidad con la que necesitarás el dinero, el nivel de riesgo con el que te sientes cómodo, ayuda a definir el perfil del inversionista.</p>
      <div>         
        <!--div class="box box__gris_opacidad col xs12 lg4" style="width:33%">
            <div class="row">
              <div class="col">
                <div class="pasos__icon"><img src="./img/user-bar1.svg" alt="Icono Persona Natural"/></div>
              </div>
              <div class="col">
                  <p>Conservador</p>    
              </div> 
            </div>
            </br>        
            <p>
              <small>
                Es menos tolerante al riesgo y valora la seguridad. Escoge instrumentos de inversión que den certeza que no perderá parte o todo el dinero que invertirá (su capital). No le importan las ganancias (rendimiento) bajas.</br></br>
                Invierte en instrumentos de deuda, como títulos de deuda, depósitos a plazo o cuentas de ahorros, porque sabe la rentabilidad que tendrán al adquirirlos.</br></br>
                Dentro de este perfil hay desde jóvenes con primeros ingresos que no quieren arriesgar sus ahorros; hasta aquellos con familias por mantener, deudas por cubrir, o personas retiradas o por jubilar que no quieren mayores preocupaciones.</br></br>
                No es la estrategia que maximiza la rentabilidad de las inversiones, pero sí puede ser una alternativa de ahorro a largo plazo sin mayores preocupaciones sobre el movimiento de los instrumentos.
              </small>      
            </p>
        </div> 
        <div class="box box__gris col xs12 lg4 pad" style="width:33%">
            <div class="row">    
                <div class="col">
                  <div class="pasos__icon"><img src="./img/user-bar2.svg" alt="Icono Persona Natural"/></div> 
                </div>
                <div class="col">    
                  <p>Moderado</p>
                  </div>      
            </div>
            </br>
            <p>
              <small>
                Cauteloso con sus decisiones pero dispuesto a tolerar un riesgo moderado para aumentar sus ganancias. Procura mantener un balance entre rentabilidad y seguridad.</br></br>
                Buscar la creación de un portafolio o cartera de inversión que combine inversiones en instrumentos de deuda y capitalización.</br></br>
                Inversionistas de este tipo hay de distintas edades. Generalmente se trata de personas con ingresos estables, que pueden ser entre moderados y altos, padres de familia con capacidad de ahorro.
              </br></br></br></br></br></br></br></br></br></br>    
              </small>
            </p>
        </div>
        <div class="box box box__gris_opacidad col xs12 lg4" style="width:33%">
            <div class="row">
                  <div class="col">
                    <div class="pasos__icon"><img src="./img/user-bar3.svg" alt="Icono Persona Natural"/></div>
                  </div>
                  <div class="col">
                      <p>Agresivo</p>    
                  </div> 
            </div>
              </br>
              <p>
                <small>
                  Busca el mejor rendimiento posible y está dispuesto a asumir el riesgo que implica. Se trata por ejemplo, de inversionistas jóvenes, que cuentan con solidez económica y con ingresos de moderados a altos y personas solteras o aún sin hijos, entre los 30 y los 40 años de edad.</br></br>
                  Corre riesgos en los mercados y opta por los instrumentos que prometen las ganancias más elevadas, sin importar si en un momento dado se arriesga a perder la mayor parte de la inversión.</br></br>
                  Opta por portafolios de inversión que combinen fondos de capitalización, deuda a corto plazo y deuda a largo plazo. Ser un inversionista agresivo puede dar buenos resultados, siempre que no se esté invirtiendo el dinero de los gastos cotidianos. No se recomienda esta actitud cuando no se cuenta con la suficiente solvencia, o si se tienen compromisos familiares importantes.
                  </br></br></br>  
                </small>
              </p>
        </div-->
        <div class="row">
          <div class="col-4">
            <div class="box_in-content">
              <p><strong>Perfil de inversionista:</strong></p>
              <h3>Conservador</h3>
              <div class="box_in-data-normal">
                <div class="pasos__icon"><img src="./img/user-bar1.svg" alt="Icono Persona Natural"/></div>
                <p>Es menos tolerante al riesgo y valora la seguridad. Escoge instrumentos de inversión que den certeza que no perderá parte o todo el dinero que invertirá (su capital). No le importan las ganancias (rendimiento) bajas.</p>
                <p>Invierte en instrumentos de deuda, como títulos de deuda, depósitos a plazo o cuentas de ahorros, porque sabe la rentabilidad que tendrán al adquirirlos.</p>
                <p>Dentro de este perfil hay desde jóvenes con primeros ingresos que no quieren arriesgar sus ahorros; hasta aquellos con familias por mantener, deudas por cubrir, o personas retiradas o por jubilar que no quieren mayores preocupaciones.</p>
                <p>No es la estrategia que maximiza la rentabilidad de las inversiones, pero sí puede ser una alternativa de ahorro a largo plazo sin mayores preocupaciones sobre el movimiento de los instrumentos.</p>
                </p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="box_in-content">
              <p><strong>Perfil de inversionista:</strong></p>
              <h3>Moderado</h3>
              <div class="box_in-data-normal">
                <div class="pasos__icon"><img src="./img/user-bar2.svg" alt="Icono Persona Natural"/></div>
                <p>Cauteloso con sus decisiones pero dispuesto a tolerar un riesgo moderado para aumentar sus ganancias. Procura mantener un balance entre rentabilidad y seguridad.</p>
                <p>Buscar la creación de un portafolio o cartera de inversión que combine inversiones en instrumentos de deuda y capitalización.</p>
                <p>Inversionistas de este tipo hay de distintas edades. Generalmente se trata de personas con ingresos estables, que pueden ser entre moderados y altos, padres de familia con capacidad de ahorro.</p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="box_in-content">
              <p><strong>Perfil de inversionista:</strong></p>
              <h3>Agresivo</h3>
              <div class="box_in-data-normal">
                <div class="pasos__icon"><img src="./img/user-bar3.svg" alt="Icono Persona Natural"/></div>
                <p>Busca el mejor rendimiento posible y está dispuesto a asumir el riesgo que implica. Se trata por ejemplo, de inversionistas jóvenes, que cuentan con solidez económica y con ingresos de moderados a altos y personas solteras o aún sin hijos, entre los 30 y los 40 años de edad.</p>
                <p>Corre riesgos en los mercados y opta por los instrumentos que prometen las ganancias más elevadas, sin importar si en un momento dado se arriesga a perder la mayor parte de la inversión.</p>
                <p>Opta por portafolios de inversión que combinen fondos de capitalización, deuda a corto plazo y deuda a largo plazo. Ser un inversionista agresivo puede dar buenos resultados, siempre que no se esté invirtiendo el dinero de los gastos cotidianos. No se recomienda esta actitud cuando no se cuenta con la suficiente solvencia, o si se tienen compromisos familiares importantes.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--<img src="img/invertir.png" />-->
    </div>    
    <!--div class="btn-subir fln-arriba"></div-->
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/utils.js"></script>
    
    <script>
        if ( sessionStorage.getItem('logeado') == 1)
        {
            var x = document.getElementById('menu__session');
            x.style.display = "block";
        }
        var id_perfil = sessionStorage.getItem('id_perfil_cliente');
        var desc_perfil = sessionStorage.getItem('desc_perfil_cliente');
        
        sessionStorage.setItem('id_perfil_local',id_perfil);
        sessionStorage.setItem('desc_perfil_local',desc_perfil);          

        $("#nombclient").text(sessionStorage.getItem('nombre_cliente'));
        $("#suenoclient").text(sessionStorage.getItem('suenoselect'));
        $("#aporte_inicial").text('$' + formatStrMonto(sessionStorage.getItem('aporte_inicial')));
        $("#aporte_mensual").text('$' + formatStrMonto(sessionStorage.getItem('aporte_mensual')));
        $("#tiempo_inversion").text(sessionStorage.getItem('tiempo_inversion'));
        
        pintaDescPerfil(sessionStorage.getItem('desc_perfil_cliente'));
        
        getDistribucion(id_perfil);

        var agrupador = 'Perfil';
        var perfiles=[];
        var perfilesdesc=[];
        $.ajax({
              url: 'helpers/cliente.simulacion.parametros.helpers.php',
              method:'get',
              dataType:'json',
              data:"agrupador=" + agrupador,
              success: function(data, xhr){
                console.log(data);
                var text = '';
                text+='<option value="'+ id_perfil +'" data-mount="'+ desc_perfil +'">'+desc_perfil+'</option>';
                $.each(data, function(key, val){
                  if ( val.id != id_perfil )
                  {
                      text+='<option value="'+ val.id +'" data-mount="'+ val.valor +'">'+val.valor+'</option>';       
                  }
                  
                  perfiles.push(val.id);
                  perfilesdesc.push(val.valor);
                });
                $('#all_fund').html(text);
                sessionStorage.setItem('perfiles', perfiles);
                sessionStorage.setItem('perfilesdesc', perfilesdesc);
            },
              error: function(xhr){
                console.log(xhr.responseText);
              }
        });
        
        function getDistribucion(id_perfil)
        {
            $.ajax({
              url: 'helpers/cliente_simulacion_perfildistribucion.helpers.php',
              type:'GET',
              dataType:'json',
              data:"id_perfil=" + id_perfil,
              success: function(data, xhr){
                console.log(data);

                for (i = 1; i < 11; i++) {
                  var x = document.getElementById('fondo'+i);
                  x.style.display = "none";
                }  

                var ind=1;
                $.each(data, function(key, val){
                  var text = '';
                  text+= val.distribucion +' '+ val.fondo;
                  $('#fondo'+ind).html(text);
                  var x = document.getElementById('fondo'+ind);
                  x.style.display = "block";
                  $("#perfilh4").text(toTitleCase(val.cartera));
                  $("#iperfil3").text(toTitleCase(val.cartera)); 
                  sessionStorage.setItem('cartera',val.cartera);
                  sessionStorage.setItem('id_cartera',val.id_cartera);
                  ind++;
                });
                
            },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            });
            function toTitleCase( str ) {
                  return str.split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " );
            }
        }

        var id_simulacion=sessionStorage.getItem('id_simulacion');
        
        /*$.ajax({
              url: 'helpers/clase.simulacion.valoressimulacion.helpers.php',
              type:'GET',
              dataType:'json',
              data:"id_simulacion=" + id_simulacion,
              success: function(data, xhr2){
                console.log(data);
                
                $.each(data, function(key, val){
                  if ( val.descripcion.toUpperCase() == "MONTO INVERTIDO")
                  {
                    $('#montoinvertido').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "ESPERADO")
                  {
                    $('#resultadoesperado').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "OPTIMISTA")
                  {
                    $('#resultadooptimista').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "PESIMISTA")
                  {
                    $('#resultadopesimista').html((formatStrMonto(val.valor)));
                  }
                });
                getdetalle();
            },
              error: function(xhr2){
                console.log(xhr2.responseText);
              }
            });
        */    
        
        
        
        $("#amount").text( sessionStorage.getItem('tiempo_inversion') );    
        //Slide
      	$("#slider-range").slider({
          range: true,
          min: 1,
          max:50,
          values: [ sessionStorage.getItem('tiempo_inversion'), 50 ],
          animate:"slow",
          slide: function( event, ui ) {
            $("#amount").text( ui.values[ 0 ] );
            var id_simulacion=sessionStorage.getItem('id_simulacion');
            var monto_inicial_local = $('#aporte_inicial').val().split(".");
            var monto_inicial="";
            for ( i=0; i < monto_inicial_local.length; i++  )
            {
              monto_inicial += monto_inicial_local[i];
            }
            var monto_mensual_local = $('#aporte_mensual').val().split(".");
            var monto_mensual="";
            for ( i=0; i < monto_mensual_local.length; i++  )
            {
              monto_mensual += monto_mensual_local[i];
            }
            //var monto_inicial = $('#aporte_inicial').val().split(".", 2)[0]+$('#aporte_inicial').val().split(".", 2)[1];
            //var monto_mensual = $('#aporte_mensual').val().split(".", 2)[0]+$('#aporte_mensual').val().split(".", 2)[1];

            var id_perfil;
            if (sessionStorage.getItem('id_perfil_local'))
            {
              id_perfil = sessionStorage.getItem('id_perfil_local');
            }else{
              id_perfil = sessionStorage.getItem('id_perfil_cliente');
            }
            var tiempo = ui.values[ 0 ] * 12;
            /*recalcular(id_simulacion,
                      id_perfil,
                      monto_inicial,
                      monto_mensual,
                      tiempo); */ 
            //getdetalle();
            sessionStorage.setItem('tiempo_inversion_local',ui.values[ 0 ]);
            rerecalculo();
            }
           
           
        });

        function formatStrMonto(valor)
        {
          return '$' + parseInt(valor).toLocaleString('es-ES');
        };

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

        $('#aporte_inicial').focusout(function(){
          var id_simulacion=sessionStorage.getItem('id_simulacion');
          var monto_inicial_local = $('#aporte_inicial').val().split(".");
            var monto_inicial="";
            for ( i=0; i < monto_inicial_local.length; i++  )
            {
              monto_inicial += monto_inicial_local[i];
            }
            var monto_mensual_local = $('#aporte_mensual').val().split(".");
            var monto_mensual="";
            for ( i=0; i < monto_mensual_local.length; i++  )
            {
              monto_mensual += monto_mensual_local[i];
            }
          var id_perfil = sessionStorage.getItem('id_perfil_local');
          var tiempo_ ;
          if (sessionStorage.getItem('tiempo_inversion_local'))
            {
              tiempo_ = sessionStorage.getItem('tiempo_inversion_local') ;
            }else{
              tiempo_ = sessionStorage.getItem('tiempo_inversion');
            }
          var tiempo = tiempo_ * 12;
            /*recalcular(id_simulacion,
                      id_perfil,
                      monto_inicial,
                      monto_mensual,
                      tiempo);  
            getdetalle();*/
            rerecalculo();
        });

        $('#aporte_mensual').focusout(function(){
          var id_simulacion=sessionStorage.getItem('id_simulacion');
          var monto_inicial_local = $('#aporte_inicial').val().split(".");
            var monto_inicial="";
            for ( i=0; i < monto_inicial_local.length; i++  )
            {
              monto_inicial += monto_inicial_local[i];
            }
            var monto_mensual_local = $('#aporte_mensual').val().split(".");
            var monto_mensual="";
            for ( i=0; i < monto_mensual_local.length; i++  )
            {
              monto_mensual += monto_mensual_local[i];
            }
          var id_perfil = sessionStorage.getItem('id_perfil_local');
          var tiempo_ ;
          if (sessionStorage.getItem('tiempo_inversion_local'))
            {
              tiempo_ = sessionStorage.getItem('tiempo_inversion_local') ;
            }else{
              tiempo_ = sessionStorage.getItem('tiempo_inversion');
            }
          var tiempo = tiempo_ * 12;
          /*recalcular(id_simulacion,
                    id_perfil,
                    monto_inicial,
                    monto_mensual,
                    tiempo);  
          getdetalle();*/
          rerecalculo();
        });

        $('#all_fund').on('change', function() {
          var  datoMonto= $(this).find(':selected').attr('value');
          var  datotexto= $(this).find(':selected').attr('data-mount');
          sessionStorage.setItem('id_perfil_local',datoMonto);
          sessionStorage.setItem('desc_perfil_local',datotexto); 
          setTimeout(function(){$("#id_perfil_cliente").val(datoMonto);}, 0);
          var monto_inicial_local = $('#aporte_inicial').val().split(".");
            var monto_inicial="";
            for ( i=0; i < monto_inicial_local.length; i++  )
            {
              monto_inicial += monto_inicial_local[i];
            }
            var monto_mensual_local = $('#aporte_mensual').val().split(".");
            var monto_mensual="";
            for ( i=0; i < monto_mensual_local.length; i++  )
            {
              monto_mensual += monto_mensual_local[i];
            }
          var tiempo_ ;
          if (sessionStorage.getItem('tiempo_inversion_local'))
            {
              tiempo_ = sessionStorage.getItem('tiempo_inversion_local') ;
            }else{
              tiempo_ = sessionStorage.getItem('tiempo_inversion');
            }
          var tiempo = tiempo_ * 12;
          var id_simulacion=sessionStorage.getItem('id_simulacion');
            
          /*recalcular(id_simulacion,
                            datoMonto,
                            monto_inicial,
                            monto_mensual,
                            tiempo);  
          getdetalle();*/

          getDistribucion(datoMonto);
          pintaDescPerfil(datotexto);
          $('#divcheck1').show();
          if (sessionStorage.getItem('id_perfil_local') == sessionStorage.getItem('id_perfil_cliente') )
          {
            $('#divcheck1').hide();
          }
          rerecalculo();  
        });

        function recalcular(id_simulacion,
                            datotexto,
                            monto_inicial,
                            monto_mensual,
                            tiempo){
          $.ajax({
              url: 'helpers/cliente.simulacion.recalcularsimulacion.helpers.php',
              type:'GET',
              dataType:'json',
              data:"id_simulacion=" + id_simulacion
                   + "&id_perfil=" + datotexto
                   + "&monto_inicial=" + monto_inicial
                   + "&monto_mensual=" + monto_mensual
                   + "&tiempo=" + tiempo, 
              success: function(data, xhr2){
                console.log(data);
                
                $.each(data, function(key, val){
                  if ( val.descripcion.toUpperCase() == "MONTO INVERTIDO")
                  {
                    $('#montoinvertido').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "ESPERADO")
                  {
                    $('#resultadoesperado').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "OPTIMISTA")
                  {
                    $('#resultadooptimista').html(formatStrMonto(val.valor));
                  }

                  if ( val.descripcion.toUpperCase() == "PESIMISTA")
                  {
                    $('#resultadopesimista').html((formatStrMonto(val.valor)));
                  }
                });
                
            },
              error: function(xhr2){
                console.log(xhr2.responseText);
              }
            });
          }
          function formatStrMonto(valor)
          {
            return '$' + parseInt(valor).toLocaleString('es-ES');
          };

          
        function getdetalle(){   
            var arrvalores=[];
            var arrfechas=[]; 
            var id_simulacion=sessionStorage.getItem('id_simulacion');
            $.ajax({
                url: 'helpers/clase.simulacion.detalle.helpers.php',
                type:'GET',
                dataType:'json',
                data:"id_simulacion=" + id_simulacion,
                success: function(data, xhr2){
                  console.log(data);
                  $.each(data, function(key, val){
                    arrvalores.push(val.total);
                    arrfechas.push(val.agno);
                  });
                  graficar(arrfechas, arrvalores);
                  
              },
                error: function(xhr2){
                  console.log(xhr2.responseText);
                }
              }); 
        }
        function graficar(arrfechas, arrvalores,  arrvalores1, arrvalores3){
          
          var MONTHS = ['hoy', '1 año'];
                  var config = {
                    type: 'line',
                    data: {
                      labels: arrfechas,
                      datasets: [
                      {
                        label: 'Pesimista',
                        fill: false,
                        backgroundColor: '#243746',
                        borderColor: '#243746',
                        data: arrvalores1,
                      },
                      {
                        backgroundColor: 'rgba(236, 99, 0, 1)',
                        borderColor: 'rgba(236, 99, 0, 1)',
                        data: arrvalores,
                        fill: false,
                        label: 'Esperado'
                      },
                      {
                        label: 'Optimista',
                        fill: false,
                        backgroundColor: '#7B92A8',
                        borderColor: '#7B92A8',
                        data: arrvalores3,
                      }
                      
                      ]
                    },
                    options: {
                      responsive: true,
                      plugins: {
                        title: {
                          display: true,
                          text: 'Chart.js Line Chart'
                        },
                        tooltip: {
                          mode: 'index',
                          intersect: false,
                        }
                      },
                      hover: {
                        mode: 'nearest',
                        intersect: true
                      },
                      scales: {
                        x: {
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Month'
                          }
                        },
                        yAxes: [{
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '$ ' + parseInt(value).toLocaleString('es-ES');
                                }
                            }
                        }]
                      }
                    }
                  };

                  if ( window.myLine !== undefined && window.myLine !== null) {
                        window.myLine.destroy();
                    }
                  var ctx = document.getElementById('simulador').getContext('2d');
                  window.myLine = new Chart(ctx, config);
        }

        function graficarTodos(arrvalores,arrfechas, perfiles){
          var MONTHS = ['hoy', '1 año'];
                  var config = {
                    type: 'line',
                    data: {
                      labels: arrfechas[0],
                      datasets: [{
                        label: perfiles[0],
                        backgroundColor: 'rgba(255,0,0)',
                        borderColor: 'rgba(255,0,0)',
                        data: arrvalores[0],
                        fill: false,
                      }, {
                        label: perfiles[1],
                        fill: false,
                        backgroundColor: 'rgba(0,128,0)',
                        borderColor: 'rgba(0,128,0)',
                        data: arrvalores[1],
                      }/*,
                      {
                        label: perfiles[2],
                        fill: false,
                        backgroundColor: 'rgba(255,255,0)',
                        borderColor: 'rgba(255,255,0)',
                        data: arrvalores[2],
                      }*/
                      ]
                    },
                    options: {
                      responsive: true,
                      plugins: {
                        title: {
                          display: true,
                          text: 'Chart.js Line Chart'
                        },
                        tooltip: {
                          mode: 'index',
                          intersect: false,
                        }
                      },
                      hover: {
                        mode: 'nearest',
                        intersect: true
                      },
                      scales: {
                        x: {
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Month'
                          }
                        },
                        y: {
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Value'
                          }
                        }
                      }
                    }
                  };

                  var ctx = document.getElementById('simulador1').getContext('2d');
                  window.myLine = new Chart(ctx, config);
        }
        function pintaDescPerfil(desc_perfil)
        {
          $("#perfil").text(desc_perfil);
          $("#iperfil").text(desc_perfil);
          $("#iperfilactual").text(sessionStorage.getItem('desc_perfil_local'));
          $("#iperfil2").text(sessionStorage.getItem('desc_perfil_cliente'));
        }
        
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
          
          function Allgetdetalle(){ 
            var id_simulacion=sessionStorage.getItem('id_simulacion');
            if ( sessionStorage.getItem('perfiles'))
            {
              var perfiles = sessionStorage.getItem('perfiles');
              var arrdatavalores=[];
              var arrdatafechas=[];
              var id_simulacion=sessionStorage.getItem('id_simulacion');
              var monto_inicial_local = $('#aporte_inicial').val().split(".");
              var monto_inicial="";
              for ( i=0; i < monto_inicial_local.length; i++  )
              {
                monto_inicial += monto_inicial_local[i];
              }
              var monto_mensual_local = $('#aporte_mensual').val().split(".");
              var monto_mensual="";
              for ( i=0; i < monto_mensual_local.length; i++  )
              {
                monto_mensual += monto_mensual_local[i];
              }
              var tiempo_ ;
                if (sessionStorage.getItem('tiempo_inversion_local'))
                  {
                    tiempo_ = sessionStorage.getItem('tiempo_inversion_local') ;
                  }else{
                    tiempo_ = sessionStorage.getItem('tiempo_inversion');
                  }
              var tiempo = tiempo_ * 12;
              var perfiles_local= perfiles.split(',');
               
              var arrValorestotal= [];
              for (i = 0; i < perfiles_local.length ; i++) {
                var perfil = perfiles_local[i];
                if ( perfil != sessionStorage.getItem('id_perfil_local'))
                {
                  updatesimuxperfil(id_simulacion, perfil);
                  recaluloxperfil(id_simulacion,
                                  perfil,
                                  monto_inicial,
                                  monto_mensual,
                                  tiempo);
                  var aaaaa = detallexperfil();
                  aaaaa.forEach(element => console.log(element));
                  arrValorestotal.push(detallexperfil());  
                }
                  
              }
              var arrvalores=[];
              var arrfechas=[];
              for ( i=0; i < arrValorestotal.length; i++  )
              {
                
                var arrlocalval=[];
                var arrlocalfech=[];
                var arrtotalv=arrValorestotal[i];
                console.log(arrtotalv.length);
                for ( x=0; x < arrtotalv.length; x ++)
                {
                  console.log('paso');
                  console.log(arrtotalv[x]);
                  arrlocalval.push(arrValorestotal[i][x].split('-')[0]);
                  arrlocalfech.push(arrValorestotal[i][x].split('-')[1]);
                }
                arrvalores.push(arrlocalval);
                arrfechas.push(arrlocalfech);
              }
              var arrperfiles=[];
              arrperfiles = sessionStorage.getItem('perfilesdesc');
              graficarTodos(arrvalores, arrfechas, arrperfiles); 
              function updatesimuxperfil(id_simulacion, perfil)
              {
                $.ajax({
                  url: 'helpers/clientes.simulacion.perfilupdate.helpers.php',
                  type:'POST',
                  dataType:'json',
                  data:"id_simulacion=" + id_simulacion
                   + "&id_perfil=" + perfil,
                  success: function(data, xhr2){
                    console.log(data);
                  },
                  error: function(xhr2){
                      console.log(xhr2.responseText);
                  }    
                });
              };
              function recaluloxperfil(id_simulacion,
                                perfil,
                                monto_inicial,
                                monto_mensual,
                                tiempo_){
                $.ajax({
                        url: 'helpers/cliente.simulacion.recalcularsimulacion.helpers.php',
                        type:'GET',
                        dataType:'json',
                        data:"id_simulacion=" + id_simulacion
                            + "&id_perfil=" + perfil
                            + "&monto_inicial=" + monto_inicial
                            + "&monto_mensual=" + monto_mensual
                            + "&tiempo=" + tiempo_, 
                      success: function(data, xhr2){
                        console.log(data);
                        //callback2();
                      }
                    });
              };
              function detallexperfil()
              {
                var id_simulacion=sessionStorage.getItem('id_simulacion');
                var arrValores=[];
                $.ajax({
                    url: 'helpers/clase.simulacion.detalle.helpers.php',
                    type:'GET',
                    dataType:'json',
                    data:"id_simulacion=" + id_simulacion,
                    success: function(data, xhr2){
                              
                              $.each(data, function(key, val){
                                arrValores.push(val.agno + '-' + val.total);
                                for ( i=0; i < 3; i++)
                                {
                                  console.log(arrValores[i]);
                                  console.log('i');
                                }
                              });
                    }   
                });
                console.log(arrValores.length); 
                return arrValores;
              }
              
              
            }
          }

          $("#paso4_simulador").click(function(){
              var respcheck = document.getElementById("check1").checked;          
              if (! respcheck)
              {
                if ( sessionStorage.getItem('id_perfil_cliente') != sessionStorage.getItem('id_perfil_local') )
                {
                  $('#errores_check1').show();
                  return false;
                } 
              }
              var respcheck = document.getElementById("check2").checked;          
              if (! respcheck)
              {
                $('#errores_check1').show();
                return false;
              }
              var respcheck = document.getElementById("check3").checked;          
              if (! respcheck)
              {
                $('#errores_check1').show();
                return false;
              }
              $.ajax({
                url: 'helpers/cliente.simulacion.pasos.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"id_simulacion=" + id_simulacion
                      +  "&paso=4" , 
                success: function(data,xhr){
                  console.log(data);
                  //siguientePaso();
                },
                error: function(xhr){
                  //paginaError();
                  console.log(xhr.responseText);
                }
              });
              
              var monto_inicial_local = $('#aporte_inicial').val().split(".");
              var monto_inicial="";
              for ( i=0; i < monto_inicial_local.length; i++  )
              {
                monto_inicial += monto_inicial_local[i];
              }
              var monto_mensual_local = $('#aporte_mensual').val().split(".");
              var monto_mensual="";
              for ( i=0; i < monto_mensual_local.length; i++  )
              {
                monto_mensual += monto_mensual_local[i];
              }

              console.log("id_simulacion=" + id_simulacion
                     + "$id_perfil=" + sessionStorage.getItem('id_perfil_local')
                     + "&inversion=" + monto_inicial
                     + "&inversion_mensual=" + monto_mensual
                     + "&tiempo=" + sessionStorage.getItem('tiempo_inversion_local')
                     + "&monto_invertido=" + sessionStorage.getItem('montoinvertido')
                     + "&resultado_esperado=" + sessionStorage.getItem('resultadoesperado')
                     + "&resultado_optimista=" + sessionStorage.getItem('resultadooptimista')
                     + "&resultado_pesimista=" + sessionStorage.getItem('resultadopesimista')
                     + "&id_cartera=" + sessionStorage.getItem('id_cartera'));
              
              sessionStorage.setItem('aporte_inicial_local',$('#aporte_inicial').val());
              sessionStorage.setItem('aporte_mensual_local',$('#aporte_mensual').val());

              $.ajax({
                url: 'helpers/cliente.simulacion.updatevalores.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"id_simulacion=" + id_simulacion
                     + "&id_perfil=" + sessionStorage.getItem('id_perfil_local')
                     + "&inversion=" + monto_inicial
                     + "&inversion_mensual=" + monto_mensual
                     + "&tiempo=" + sessionStorage.getItem('tiempo_inversion_local')
                     + "&monto_invertido=" + sessionStorage.getItem('montoinvertido')
                     + "&resultado_esperado=" + sessionStorage.getItem('resultadoesperado')
                     + "&resultado_optimista=" + sessionStorage.getItem('resultadooptimista')
                     + "&resultado_pesimista=" + sessionStorage.getItem('resultadopesimista')
                     + "&id_cartera=" + sessionStorage.getItem('id_cartera'),

                success: function(data,xhr){
                  console.log(data);
                  siguientePaso();
                },
                error: function(xhr){
                  paginaError();
                  console.log(xhr.responseText);
                }
              });
              
              $.ajax({
                url: 'helpers/clientes.simulacion.datosgraficos.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"id_simulacion=" + id_simulacion
                     + "&monto_mensual=" + monto_mensual
                     + "&arrValoresGraf=" + sessionStorage.getItem('arrValoresGraf')
                     + "&arrFechaGraf=" + sessionStorage.getItem('arrFechaGraf')
                     ,

                success: function(data,xhr){
                  console.log(data);
                  //siguientePaso();
                },
                error: function(xhr){
                  console.log(xhr.responseText);
                  //paginaError();
                  
                }
              });

          });
          function siguientePaso(){
            var perfil_cliente ;
            if (sessionStorage.getItem('id_perfil_local'))
            {
              perfil_cliente = sessionStorage.getItem('id_perfil_local') ;
            }else{
              perfil_cliente = sessionStorage.getItem('id_perfil_cliente');
            }
            window.location.href = '/simulador/paso4-simulador-cartera.php?id_perfil_cliente=' + perfil_cliente;
            $.ajax({
                url: 'helpers/paso5-simulador-cartera.php',
                type: 'POST',
                dataType: 'json',
                data:"id_perfil_cliente=" + perfil_cliente , 
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
          function paginaError(){
            window.location.href = '/simulador/paginaError.php';
          }
          function clickcheck(id){
            var idlocal = '#errores_check' + 1;
            //alert(idlocal);
            $(idlocal).hide(); 
            
          }

          function rerecalculo(){
            var id_perfil =  sessionStorage.getItem('id_perfil_local');
            var valorgraf=[];
            var fechagraf=[];
            var valorgraf1=[];
            var fechagraf1=[];
            var valorgraf3=[];
            var fechagraf3=[];
            var valorgraf2="";
            var fechagraf2="";
            
            $.ajax({
                  url: 'helpers/clientes.simulacion.distribucionxperfil.helpers.php',
                  method:'get',
                  dataType:'json',
                  data:"id_perfil=" + id_perfil,
                  success: function(data, xhr){
                    console.log(data);
                    var inversion_mensual=$("#aporte_mensual").val();
                    var tiempo = sessionStorage.getItem('tiempo_inversion_local');
                    var vl_pesimista=0;
                    var vl_optimista=0;
                    var vl_esperado=0;
                
                    $.each(data, function(key, val){
                        var aporte_inicial_local = $('#aporte_inicial').val().split(".");
                        var aporte_inicial="";
                        for ( i=0; i < aporte_inicial_local.length; i++  )
                        {
                          aporte_inicial += aporte_inicial_local[i];
                        }
                        
                        var monto_mensual_local = $('#aporte_mensual').val().split(".");
                        var monto_mensual="";
                        for ( i=0; i < monto_mensual_local.length; i++  )
                        {
                          monto_mensual += monto_mensual_local[i];
                        }
                        var vfa=parseFloat(aporte_inicial);
                        var formula=0;
                        var exponencial = 1 + parseFloat(val.valor_distribucion);
                        var v12=1;

                        var f = new Date();
                        var mesprimeragno = 12 - (f.getMonth() +1) ;
                        var pasoprimeragno =0;  
                        var tiempoaux =tiempo*12;
                        var contagno=1;
                        var ultimoagno=0;
                        formula=vfa*exponencial;
                        for (i = 1 ; i <= tiempoaux ; i++) {
                            //formula=vfa*exponencial;
                            vfa = parseFloat(formula) + parseFloat(monto_mensual);
                            formula=vfa*exponencial;//se agrego 10-07-2021
                            if( i == mesprimeragno  )
                            {
                              if ( val.valor.toUpperCase() == "ESPERADO")
                              {
                                valorgraf.push(Math.round(formula,0));
                  
                                fechagraf.push(f.getFullYear());
                                valorgraf2 += Math.round(formula,0) + ",";
                                fechagraf2 += f.getFullYear() + ",";
                                pasoprimeragno=1; 
                              }
                              if ( val.valor.toUpperCase() == "PESIMISTA")
                              {
                                valorgraf1.push(Math.round(formula,0));
                    
                                fechagraf1.push(f.getFullYear());
                                pasoprimeragno=1; 
                              }
                              if ( val.valor.toUpperCase() == "OPTIMISTA")
                              {
                                valorgraf3.push(Math.round(formula,0));
                                console.log(Math.round(formula,0));
                                fechagraf3.push(f.getFullYear());
                                pasoprimeragno=1; 
                              }
                              
                            }
                            if ( i > mesprimeragno )
                            {
                                  if ( val.valor.toUpperCase() == "ESPERADO"){
                                    if ( contagno == 12)
                                    {
                                        valorgraf.push(Math.round(formula,0));
                      
                                        f.setMonth(f.getMonth() + 12); 
                                        fechagraf.push(f.getFullYear());
                                        valorgraf2 += Math.round(formula,0) + ",";
                                        fechagraf2 += f.getFullYear() + ",";
                                        contagno=1;
                                    }else{
                                      contagno ++;
                                      
                                    }
                                  }
                                  if ( val.valor.toUpperCase() == "PESIMISTA"){
                                    if ( contagno == 12)
                                    {
                                        valorgraf1.push(Math.round(formula,0));
                        
                                        f.setMonth(f.getMonth() + 12); 
                                        fechagraf1.push(f.getFullYear());
                                        contagno=1;
                                    }else{
                                      contagno ++;
                                      
                                    }
                                  }
                                  if ( val.valor.toUpperCase() == "OPTIMISTA"){
                                    if ( contagno == 12)
                                    {
                                        valorgraf3.push(Math.round(formula,0));
                        
                                        f.setMonth(f.getMonth() + 12); 
                                        fechagraf3.push(f.getFullYear());
                                        contagno=1;
                                    }else{
                                      contagno ++;
                                      
                                    }
                                  }
                            }
                            
                        }
                        if ( val.valor.toUpperCase() == "ESPERADO"){
                          if ( contagno >= 1)
                          {
                              
                            valorgraf.push(Math.round(formula,0) + parseFloat(0));
              
                            f.setMonth(f.getMonth() + 12); 
                            fechagraf.push(f.getFullYear());
                            valorgraf2 += Math.round(formula,0) ;
                            fechagraf2 += f.getFullYear();
                          }
                        }
                        if ( val.valor.toUpperCase() == "PESIMISTA"){
                          if ( contagno >= 1)
                          {
                              
                            valorgraf1.push(Math.round(formula,0) + parseFloat(0));
              
                            f.setMonth(f.getMonth() + 12); 
                            fechagraf1.push(f.getFullYear());
                          }
                        }  
                        if ( val.valor.toUpperCase() == "OPTIMISTA"){
                          if ( contagno >= 1)
                          {
                              
                            valorgraf3.push(Math.round(formula,0) + parseFloat(0));
                
                            f.setMonth(f.getMonth() + 12); 
                            fechagraf3.push(f.getFullYear());
                          }
                        }  




                        if ( val.valor.toUpperCase() == "PESIMISTA" )
                        {  
                          vl_pesimista =  Math.round(formula,0) + parseFloat(0); 
                
                          $('#resultadopesimista').html((formatStrMonto(vl_pesimista)));
                          sessionStorage.setItem('resultadopesimista',vl_pesimista);
                        }

                        if ( val.valor.toUpperCase()  == "OPTIMISTA" )
                        {  
                          vl_optimista =  Math.round(formula,0) + parseFloat(0);
                          $('#resultadooptimista').html(formatStrMonto(vl_optimista));
                
                          sessionStorage.setItem('resultadooptimista',vl_optimista); 
                        }

                        if ( val.valor.toUpperCase() == "ESPERADO" )
                        {  
                          vl_esperado =  Math.round(formula,0) + parseFloat(0);
                
                          $('#resultadoesperado').html(formatStrMonto(vl_esperado));
                          sessionStorage.setItem('resultadoesperado',vl_esperado);
                        }
                        
                        var montoinvertido = parseFloat(aporte_inicial) + parseFloat(monto_mensual*tiempoaux);
                        $('#montoinvertido').html(formatStrMonto(montoinvertido));
                        sessionStorage.setItem('montoinvertido',montoinvertido);
                    });
                    sessionStorage.setItem('arrValoresGraf',valorgraf2);
                    sessionStorage.setItem('arrFechaGraf', fechagraf2);
              
                    graficar(fechagraf, valorgraf, valorgraf1, valorgraf3);
                },
                  error: function(xhr){
                    console.log(xhr.responseText);
                  }
            });                
          }
    </script>
    <script>
          $(document).ready( function(){
            if(sessionStorage.getItem('login') == 1)
            {
              var aporte_inicial= parseInt(sessionStorage.getItem('aporte_inicial')).toLocaleString('es-ES');
              var aporte_mensual= parseInt(sessionStorage.getItem('aporte_mensual')).toLocaleString('es-ES');
            }
            else
            {
              var aporte_inicial=sessionStorage.getItem('aporte_inicial');
              var aporte_mensual=sessionStorage.getItem('aporte_mensual');
            } 
            setTimeout(function(){$("#aporte_inicial").val(aporte_inicial);}, 10);
            setTimeout(function(){$("#aporte_mensual").val(aporte_mensual);}, 10);
            var id_perfil_cliente=sessionStorage.getItem('id_perfil_cliente');
            setTimeout(function(){$("#id_perfil_cliente").val(id_perfil_cliente);}, 0);
          });
          window.onload = function() {
            //removeItem('image');
            $("#aporte_inicial").text('$' + formatStrMonto(sessionStorage.getItem('aporte_inicial')));
            $("#aporte_mensual").text('$' + formatStrMonto(sessionStorage.getItem('aporte_mensual')));
            $("#tiempo_inversion").text(sessionStorage.getItem('tiempo_inversion'));
            sessionStorage.setItem('tiempo_inversion_local',sessionStorage.getItem('tiempo_inversion'));
            sessionStorage.setItem('aporte_inicial_local',sessionStorage.getItem('aporte_inicial'));
            sessionStorage.setItem('aporte_mensual_local',sessionStorage.getItem('aporte_mensual'));
            rerecalculo();
          };

          //Modal
          $('.popup-with-form').magnificPopup();
          //$(".popup-with-move-anim").fancybox();
          $(".menu__session-logout").click(function(){
            console.log('click cerrar sesion');
            sessionStorage.clear();
            $('body').fadeOut( "slow", function() {
                        window.location.href = "http://www.sartormas.com/";
            });       
          });

          $("#check2,#check3").click(function() {
            var checked_status2 = $('#check2').is(':checked');
            var checked_status3 = $('#check3').is(':checked');
            if (checked_status2 == true && checked_status3 == true) {
                $("#paso4_simulador").removeAttr("disabled");
                $("#paso4_simulador").addClass('btn--secundario');
                $("#paso4_simulador").removeClass('btn--neutro');
            } else {
                $("#paso4_simulador").attr("disabled", "disabled");
                $("#paso4_simulador").addClass('btn--neutro');
                $("#paso4_simulador").removeClass('btn--secundario');
            }
          });          
    </script>
  </body>
</html>
<?php 

require './include/footer.php';

?>




