<?php
  setlocale(LC_MONETARY, 'es_CL');
  //setlocale(LC_ALL, "es_CO.UTF-8");
  /*session_start();*/
  require __DIR__ . '/include/php/functions.php';
  $id_cliente_simulacion = 0;  
  $nombreCompleto = "";
  $rest   = new restWS;
  $arrSimulacion=null;
  $email ="";
  $otrossuenos='';
  $othersdreamstrue=0;
  $rut = '';

  $parametros = array(
    "agrupador" => "DiasExpiracionSimulador"
  );
  try {

    $respWS = $rest->ws();      
    $urlWS = $respWS . "/clientes.simulacion.parametros";
    $jsonReg = $rest->get($urlWS, $parametros);
    $arrDias = json_decode($jsonReg, true);
    $diasexpiracion=null;
    foreach($arrDias as $data)
    {
        $diasexpiracion=  $data['valor'];  
    }
  } catch (Exception $e) {
    echo "hubo un error";
  }





  if(isset($_GET['id']))
  {
    $id_cliente_simulacion = $_GET['id'];

    $parametros = array(
      "campo_consulta" => "id_clientes_simulacion_registro",
      "id_cliente_simulacion" => $id_cliente_simulacion
    );
  
    try 
    {
      $respWS = $rest->ws();      
      $urlWS = $respWS . "/clientes.simulacion";
      $jsonSimulacion = $rest->get($urlWS, $parametros);
      $arrSimulacion = json_decode($jsonSimulacion, true);  
      
    } 
    catch (Exception $e)
    {
      echo "hubo un error";
    }
    $paso2=0;
    $id_perfil=0;
    $id_cliente_simulacion = 0;
  }
  else if(isset($_GET['sitioprivado']) && $_GET['sitioprivado'] == true)  
  {
    $rut = $_GET['rut'];
    $nombre = $_GET['nombre'];
    $apellidopaterno = $_GET['apellidopaterno'];
    $apellidomaterno = $_GET['apellidomaterno'];
    $email = $_GET['correo'];
    $id_cliente_simulacion = 0;
    $nombreCompleto = $nombre . " " . $apellidopaterno . " " . $apellidomaterno;
    //servico 
    try 
    {
      $parametros = array(
          "nombres" => $nombre,
          "apellido1" => $apellidopaterno,
          "apellido2" => $apellidomaterno,
          "rut" => $rut,
          "registroEmail" => $email
      );
      $nombre_cliente = $nombre.' '.$apellidopaterno.' '.$apellidomaterno;
      $respWS = $rest->ws();      
      $urlWS = $respWS . "/clientes.simulacion.integracion.sitioprivado";
      $id_cliente_simulacion = $rest->post($urlWS, $parametros);
      if( $id_cliente_simulacion == 500)
      {
        header('Location: paginaErrorSP.php ');
      }
      //echo $id_cliente_simulacion;
    } 
    catch (Exception $e) 
    {
      echo "hubo un error";
    }
    try 
    {  
      $parametros = array(
        "campo_consulta" => "id_clientes_simulacion_registro",
        "id_cliente_simulacion" => $id_cliente_simulacion
      );
  
      $respWS = $rest->ws();
      $urlWS = $respWS . "/clientes.simulacion";
      $jsonSimulacion = $rest->get($urlWS, $parametros);
      $arrSimulacion = json_decode($jsonSimulacion, true);  
    } 
    catch (Exception $e)
    {
      echo "hubo un error";
    }
    $paso2=0;
    $id_perfil=0;
  }
?>
<?php 
  //Datos sitio privado
  $sitioPrivado = 'false';
  if(isset($_GET['sitioprivado']))
  {
    $_SESSION['okSitioPrivado'] = $_GET['sitioprivado'];
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
                                <?php
                                 if($nombreCompleto != '')
                                 {
                                ?>
                                    <p id="nombclient" class="destacado"><?php echo $nombreCompleto ?><span class="destacado"></p>
                                    <p id="rut" class="destacado" hidden ><?php echo $rut ?><span class="destacado"></p>
                                <?php
                                 }
                                 else
                                  {   
                                ?>
                                    <p id="nombclient"><span class="destacado">, <span class="doble-linea">estás en tu historial de simulaciones</span></p>
                                <?php
                                 }
                                ?> 
                                    <p><span class="doble-linea">estás en tu historial de simulaciones</span></p>
                                </div>
                            </div>

                            <div class="col xs12 lg12">
                                    <?php
                                        if ( $arrSimulacion == null)
                                        {
                                    ?>
                                        <p class="textocentrado">En esta sección podrás ver tus simulaciones. </br>
                                          Por el momento nos hemos percatado que no tienes ninguna.</br> Para realizar una y estar cada vez más cerca de cumplir tus objetivos, 
                                          </br>¡No lo dudes y comienza hoy mismo!
                                        </p>
                                    <?php
                                        }else{
                                    ?>
                                        <h3 class="pasos__subtitle observar">Tus Simulaciones</h3>
                                    <?php } ?>
                                    <div class="pasos__form observar">
                                    <form class="form needs-validation" id="form-paso3" method="post" action="javascript://" novalidate>
                                            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token'] ?>">
                                            
                                            <div class="container">  
                                                <div id="notificaciones" class="page__notifications">
                                                    <?php
                                                        $contador = 0;
                                                      
                                                        foreach($arrSimulacion as $data)
                                                        {
                                                            if ( $contador == 0)
                                                            {
                                                              
                                                              $id_perfil = $data['id_perfil'];
                                                            }
                                                            $contador = $contador + 1;

                                                    ?>
                                                        <a href="javascript:simulacion(<?php echo $data['id_simulacion'] ?>);" class="page__notifications-links">                                                    
                                                            <div class="row">
                                                                <?php 
                                                                    $date = new DateTime('now');
                                                                    $datesim =  new DateTime($data['fecha_simulacion']);
                                                                    $diff = $date->diff($datesim);
                                                                    
                                                                    if ( $diff->days <=  $diasexpiracion   ) 
                                                                    { 
                                                                ?>
                                                                      <div class="col-2 page__notifications-date"><span><?php echo date("d-m-Y", strtotime($data['fecha_simulacion']))?> </span>
                                                                <?php
                                                                    }else{
                                                                ?>
                                                                      <div class="col-2 page__notifications-date-vencida " > 
                                                                      
                                                                          <span><?php echo date("d-m-Y", strtotime($data['fecha_simulacion']))?></span>
                                                                          <div class="tooltip"> La Simulación tiene más de <?php echo $diasexpiracion ?> días, se recomienda volver a simular o tomar como referencia esta simulación</div>
                                                                          
                                                                       
                                                                        
                                                                      
                                                                <?php
                                                                    }
                                                                ?>      
                                                                <input type="text"  id="<?php echo 'idperfil'.$contador ?>"  name="<?php echo 'idperfil'.$contador ?>"
                                                                                            value="<?php echo $data['id_perfil']?>"
                                                                                            style="display: none"
                                                                                          >
                                                                </div>
                                                                <?php 
                                                                    if ( $data['otro_sueno'] != ''  )
                                                                    {
                                                                      
                                                                      $othersdreamstrue=1;
                                                                      $otrossuenos=$otrossuenos.$data['otro_sueno'].';';
                                                                      
                                                                ?>
                                                                          <div class="col-8">
                                                                              <div class="row">
                                                                                <div class="col-3">
                                                                                  <small>Objetivo:</small>
                                                                                  <p><?php echo $data['otro_sueno']?></p>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <small>Monto Esperado:</small>
                                                                                    <p>$<?php 
                                                                                              setlocale(LC_MONETARY, 'es_CL');                                    
                                                                                              echo number_format($data['resultado_esperado'], 0, ',', '.')
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <p><small>Tiempo (años) </small>
                                                                                      <?php echo $data['tiempo']?>
                                                                                    </p>
                                                                                </div>  
                                                                                <div class="col-3">
                                                                                    <small>Invertido</small>
                                                                                    <?php 
                                                                                        if ( strtoupper($data['descripcion_estado']) == strtoupper('INVERTIDO'))
                                                                                        {
                                                                                    ?>
                                                                                      <p><img src="./img/estado-ok.svg" style="max-width:30px;" title="Simulación invertida" /></p>
                                                                                    <?php 
                                                                                        }else{
                                                                                    ?>
                                                                                      <p><img src="./img/estado-not.svg" style="max-width:30px;" title="Simulación sin invertir" /></p>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </div>                                                                                
                                                                              </div>  
                                                                          </div>
                                                                <?php
                                                                    } else {
                                                                ?>
                                                                          <div class="col-8">
                                                                            <div class="row">
                                                                              <div class="col-3">
                                                                                    <p><small>Objetivo:</small>
                                                                                    <p><?php 
                                                                                          if ( strtoupper($data['descripcion_sueno']) == strtoupper('Sin Sueno'))
                                                                                          {
                                                                                                echo 'Sin Objetivo';   
                                                                                          }else{
                                                                                                echo $data['descripcion_sueno'];     
                                                                                          }
                                                                                    ?></p>
                                                                              </div>  
                                                                              <div class="col-3">
                                                                                    <small>Monto Esperado:</small>
                                                                                    <p>$<?php 
                                                                                                                              setlocale(LC_MONETARY, 'es_CL');
                                                                                                                              echo number_format($data['resultado_esperado'], 0, ',', '.')
                                                                                                                          ?>
                                                                                    </p>
                                                                              </div>
                                                                              <div class="col-3">
                                                                                    <small>Tiempo (años) </small>
                                                                                    <p>  <?php echo $data['tiempo']?>
                                                                                    </p>
                                                                              </div> 
                                                                              <div class="col-3">
                                                                              <small>Invertido</small>
                                                                                    <?php 
                                                                                        if ( strtoupper($data['descripcion_estado']) == strtoupper('INVERTIDO'))
                                                                                        {
                                                                                    ?>
                                                                                      <p><img src="./img/estado-ok.svg" style="max-width:30px;vertical-align:middle;" title="Simulación invertida" /></p>
                                                                                    <?php 
                                                                                        }else{
                                                                                    ?>
                                                                                      <p><img src="./img/estado-not.svg" style="max-width:30px;vertical-align:middle;" title="Simulación sin invertir" /></p>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </div>   
                                                                            </div>
                                                                          </div>
                                                                <?php } ?>      
                                                                <div class="col-2 "><span class="fln-buscar" ></span></div>
                                                            </div>
                                                        </a>
                                                    <?php
                                                        }
                                                    ?>   
                                                </div>
                                            </div>

                                            <div class="fila">
                                                <div class="col xs12">
                                                    <div class="form__buttons">
                                                        <a class="form__volver" href="#" onclick=""><span></span></a>
                                                        <?php 
                                                           if($id_cliente_simulacion != "0")
                                                           {
                                                        ?>
                                                               <button type="submit" class="btn btn--secundario submit " id="btn_simulacion" onclick='simular(<?php echo $id_cliente_simulacion ?>)' >Simular </button>
                                                        <?php 
                                                           }
                                                           else
                                                           {
                                                        ?> 
                                                            <button type="submit" class="btn btn--secundario submit " id="btn_simulacion" onclick='simular(0)' >Simular </button>
                                                        <?php
                                                           } 
                                                        ?>
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
    <!--Modales-->
    <a href="#perfil-origen" id="selperfil-inversion" class="popup-with-form"></a>
    <a href="#ultimo-perfil" id="ultimoperfil-inversion" class="popup-with-form"></a>
    <div id="perfil-origen" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
      <p>¿Quieres simular con tu perfil de inversión Sartor?</p>  
      <button type="submit" class="btn btn--secundario" id="" onclick="perfilSartor();" style="padding: 8px 16px;min-width:inherit;">Si</button>
      <button type="submit" class="btn btn--secundario" id="" onclick="sinultimoperfil();" style="padding: 8px 16px;min-width:inherit;">No</button>     
    </div>
    <div id="ultimo-perfil" class="modal modal--home zoom-anim-dialog mfp-hide text-center" style="max-width:500px;">
    <p>¿Quieres simular con tu último perfil de inversión Sartor?</p>
      <button type="submit" class="btn btn--secundario en__ultimo-perfil" id="" onclick="ultimoPerfilSartor();" style="padding: 8px 16px;min-width:inherit;">Si</button>
      <button type="submit" class="btn btn--secundario en__ultimo-perfil" id="" onclick="sinultimoperfil();" style="padding: 8px 16px;min-width:inherit;">No</button>      
    </div>
    <div class="btn-subir fln-arriba"></div>
    <div class="preloader-general" id="preloader-general" data-tipo="screen" style="display:none"></div>
    <script src="js/alljs.min.js"></script>
    <script>
      $('.popup-with-form').magnificPopup();
        if( <?php echo $othersdreamstrue ?> == 1)
        {
              var aux='<?php echo substr($otrossuenos,0,strlen($otrossuenos)-1) ?>'
              sessionStorage.setItem('arrotherdreams', aux);
        }
                                                                      
          

        if ( <?php echo $sitioPrivado ?> == true)
        {
            sessionStorage.clear();
            if( <?php echo $othersdreamstrue ?> == 1)
            {
              var aux='<?php echo substr($otrossuenos,0,strlen($otrossuenos)-1) ?>'
              sessionStorage.setItem('arrotherdreams', aux);
            }
            sessionStorage.setItem('email','<?php echo $email ?>');
            sessionStorage.setItem('clientesartoractivo', 1);
            sessionStorage.setItem('rutcli','<?php echo $rut ?>');
            $.ajax({
                      url: 'helpers/cliente_simulacion.perfilderiesgo.helpers.php',
                      type: 'POST',
                      dataType: 'json',
                      data:"rut=" + '<?php echo $rut ?>',
                      success: function(data,xhr){
                      var json = data;
                      var idprefil = json.split('#')[0];
                      var descprefil = json.split('#')[1];
                      sessionStorage.setItem('id_perfil',idprefil);
                      sessionStorage.setItem('desc_perfil',descprefil);
                      },
                      error: function(xhr){
                      // paginaError();
                      console.log(xhr.responseText);
                      }
            });
        }
        if(sessionStorage.getItem('nombre_cliente') != null)
        {
             $("#nombclient").text(sessionStorage.getItem('nombre_cliente'));
        }
        function simulacion(id)
        {
            var id_perfil_cliente = 0;
            var desc_perfil_cliente = "";
            var id_cartera = 0;
            var descripcion_cartera = "";
            var id_cliente_simulacion = 0;
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

            $.ajax({
            url: 'helpers/cliente_simulacion.simulacionregistroidsimulacion.helpers.php',
            type: 'GET',
            dataType: 'json',
            data:"id=" + id,
                success: function(data,xhr){
                    console.log(data);
                    $.each(data, function(key, val)
                    {
                        id_simulacion = val.id;
                        id_cliente_simulacion = val.id_clientes_simulacion_registro;
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
                        id_perfil_cliente = val.id_perfil;
                        desc_perfil_cliente = val.descripcion_perfil;
                        id_cartera = val.id_cartera;
                        descripcion_cartera = val.descripcion_cartera;
                      });
                            sessionStorage.setItem('nombre_cliente', $('#nombclient').text());
                            sessionStorage.setItem('id_cliente_simulacion',id_cliente_simulacion);
                            sessionStorage.setItem('id_simulacion',id_simulacion);

                            sessionStorage.setItem('aporte_inicial',inversion);
                            sessionStorage.setItem('aporte_mensual',inversion_mensual);
                            sessionStorage.setItem('tiempo_inversion',tiempo);

                            sessionStorage.setItem('aporte_inicial_local',formatStrMonto(inversion));
                            sessionStorage.setItem('aporte_mensual_local',formatStrMonto(inversion_mensual));
                            sessionStorage.setItem('tiempo_inversion_local',tiempo);

                            sessionStorage.setItem('id_perfil_cliente',id_perfil_cliente);
                            sessionStorage.setItem('desc_perfil_cliente',desc_perfil_cliente);

                            sessionStorage.setItem('cartera',descripcion_cartera);
                            sessionStorage.setItem('id_cartera',id_cartera);

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

                  },
                  error: function(xhr){
                      console.log(xhr.responseText);
                  }
              });
         }

         function simular(id)
         {        
              sessionStorage.setItem('nombre_cliente', $('#nombclient').text());
              var id_cliente_simulacion = 0;
              var rut = '';
              var id_perfil = sessionStorage.getItem('id_perfil');
              if(id == 0)
              {                
                id_cliente_simulacion = sessionStorage.getItem("id_cliente_simulacion");
              }
              else
              {
                sessionStorage.setItem("id_cliente_simulacion", id);
                id_cliente_simulacion = id;
                rut = $('#rut').text();

              }
              
              var opcion = false;              
              var opcionPerfilSartor = false;
              var datosDiv = $("#notificaciones").children().length; 
              if(datosDiv == '' && (id_perfil != 0 && id_perfil != null ))
              {
                  sessionStorage.setItem('noperfil','SI');
                  var id_cliente_simulacion = sessionStorage.getItem('id_cliente_simulacion');
                  $.ajax({
                    url: 'helpers/cliente_simulacion.perfilderiesgo_simulacion.helpers.php',
                    type: 'POST',
                    dataType: 'json',
                    data:"id_cliente_simulacion=" + id_cliente_simulacion
                          +"&id_perfil=" + id_perfil,
                    success: function(data,xhr){
                    console.log(data);
                    var json = data.result.id;
                    sessionStorage.setItem('id_simulacion',json);
                    sessionStorage.setItem('login',0);
                    sessionStorage.setItem('id_perfil_cliente', id_perfil);
                    siguientePaso2();
                    },
                    error: function(xhr){
                    //paginaError();
                    console.log(xhr.responseText);
                    }
                  });
                
              } 
              else if(datosDiv != '')
              {
                console.log('ultimo perfil')
                $('#ultimoperfil-inversion').trigger('click');
                $('.en__ultimo-perfil').attr('data-idcliente',id_cliente_simulacion)

              }else if(datosDiv == '' && $('#rut').text() != ''){
                
                  var name=$("#nombclient").text();
                  sessionStorage.setItem('nombre_cliente',name);
                  if( sessionStorage.getItem('clientesartoractivo') )
                  {
                      sessionStorage.setItem('clientesinperfil','1');
                  }
                  sinultimoperfil($('.en__ultimo-perfil').attr('data-idcliente',id_cliente_simulacion));
                
              }

          }

                function perfilSartor(){
                  sessionStorage.setItem('noperfil','SI');
                  var id_cliente_simulacion = sessionStorage.getItem('id_cliente_simulacion');
                  $.ajax({
                    url: 'helpers/cliente_simulacion.perfilderiesgo_simulacion.helpers.php',
                    type: 'POST',
                    dataType: 'json',
                    data:"id_cliente_simulacion=" + id_cliente_simulacion
                          +"&id_perfil=" + id_perfil,
                    success: function(data,xhr){
                    console.log(data);
                    var json = data.result.id;
                    sessionStorage.setItem('id_simulacion',json);
                    sessionStorage.setItem('login',0);
                    siguientePaso2();
                    },
                    error: function(xhr){
                    //paginaError();
                    console.log(xhr.responseText);
                    }
                  }); 
                }

                function ultimoPerfilSartor(){
                  
                  sessionStorage.setItem('noperfil','SI');
                  var idCli = $('.en__ultimo-perfil').attr('data-idcliente');
                  console.log(idCli);
                  $.ajax({
                    url: 'helpers/cliente_simulacion.replica.helpers.php',
                    type: 'POST',
                    dataType: 'json',
                    data:"id_cliente_simulacion=" + idCli,
                    success: function(data,xhr){
                    console.log(data);
                    var json = data.result.id;
                    var id_simulacion = json.split('-')[0];
                    var perfil_simulador= json.split('-')[1];
                    var desc_simulador= json.split('-')[2];
                    sessionStorage.setItem('perfil_simulador',perfil_simulador);
                    sessionStorage.setItem('desc_simulador',desc_simulador);
                    sessionStorage.setItem('id_simulacion',id_simulacion);
                    sessionStorage.setItem('login',0);
                    siguientePaso2();
                    },
                    error: function(xhr){
                    paginaError();
                    console.log(xhr.responseText);
                    }
                  }); 
                } 

                function opcionPerfilSartor(){
                }               
                function NoperfilSartor(){
                   sinultimoperfil();
                   sessionStorage.setItem('noperfil','NO');
                   siguientePaso1();
                }
                function NoultimoPerfilSartor(){
                  sinultimoperfil();
                   
                }

                function sinultimoperfil(id){
                  $.ajax({
                          url: 'helpers/cliente_simulacion.helpers.php',
                          type: 'POST',
                          dataType: 'json',
                          data:"id_cliente_simulacion=" + $('.en__ultimo-perfil').attr('data-idcliente'),
                          success: function(data,xhr){
                          console.log(data);
                          var json = data.result.id;
                          sessionStorage.setItem('id_simulacion',json);
                          sessionStorage.setItem('login',0);
                          sessionStorage.setItem('noperfil','NO');
                          siguientePaso1();
                          },
                          error: function(xhr){
                          paginaError();
                          console.log(xhr.responseText);
                          }
                      }); 
                }

                function paginaError(){
                    window.location.href = '/simulador/paginaError.php';
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
                    perfil_cliente = sessionStorage.getItem('id_perfil_cliente');
                    window.location.href = '/simulador/paso4-simulador-cartera.php?id_perfil_cliente=' + perfil_cliente;
                }

                function paginaError(){
                    window.location.href = '/simulador/paginaError.php';
                }

                function formatStrMonto(valor)
                {
                  return parseInt(valor).toLocaleString('es-ES');
                };

    </script>
    <script>

      //Formatear hora
      $(".page__notifications-date span").each(function(index, value){
              var x = $(this).text();
              console.log(x);
              var mesFecha = x.substring(3, 5);
              
              var mesDia = x.substring(0, 2);
              
              if (mesFecha=='01') {
              $(this).html('<div class="mes-form">Ene</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='02'){
              $(this).html('<div class="mes-form">Feb</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='03'){
              $(this).html('<div class="mes-form">Mar</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='04'){
              $(this).html('<div class="mes-form">Abr</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='05'){
              $(this).html('<div class="mes-form">May</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='06'){
              $(this).html('<div class="mes-form">Jun</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='07'){
              $(this).html('<div class="mes-form">Jul</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='08'){
              $(this).html('<div class="mes-form">Ago</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='09'){
              $(this).html('<div class="mes-form">Sep</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='10'){
              $(this).html('<div class="mes-form">Oct</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='11'){
              $(this).html('<div class="mes-form">Nov</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='12'){
              $(this).html('<div class="mes-form">Dic</div><div class="dia-form">'+mesDia+'</div>');
              } 
      });

      $(".page__notifications-date-vencida span").each(function(index, value){
              var x = $(this).text();
              console.log(x);
              var mesFecha = x.substring(3, 5);
              
              var mesDia = x.substring(0, 2);
              
              if (mesFecha=='01') {
              $(this).html('<div class="mes-form">Ene</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='02'){
              $(this).html('<div class="mes-form">Feb</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='03'){
              $(this).html('<div class="mes-form">Mar</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='04'){
              $(this).html('<div class="mes-form">Abr</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='05'){
              $(this).html('<div class="mes-form">May</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='06'){
              $(this).html('<div class="mes-form">Jun</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='07'){
              $(this).html('<div class="mes-form">Jul</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='08'){
              $(this).html('<div class="mes-form">Ago</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='09'){
              $(this).html('<div class="mes-form">Sep</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='10'){
              $(this).html('<div class="mes-form">Oct</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='11'){
              $(this).html('<div class="mes-form">Nov</div><div class="dia-form">'+mesDia+'</div>');
              }else if(mesFecha=='12'){
              $(this).html('<div class="mes-form">Dic</div><div class="dia-form">'+mesDia+'</div>');
              } 
      });

      $(".menu__session-logout").click(function(){
        console.log('click cerrar sesion');
        sessionStorage.clear();
        $('body').fadeOut( "slow", function() {
                    window.location.href = "http://www.sartormas.com/";
        });       
      });

      $(document).ready( function(){
        if ( sessionStorage.getItem('logeado') == 1)
        {
          
            var x = document.getElementById('menu__session');
            x.style.display = "block";
            
        }
      });

      



  </script>	      
  </body>
  
</html>

<?php 

require './include/footer.php';

?>
