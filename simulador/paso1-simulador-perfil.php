<?php
  /*session_start();*/
  require __DIR__ . '/include/php/functions.php';

  $parametros = array(
    "agrupador" => "Preguntas"
  );
  $rest   = new restWS;
  try {

    $respWS = $rest->ws();      
    $urlWS = $respWS . "/clientes.simulacion.parametros";
    $jsonReg = $rest->get($urlWS, $parametros);
    $arrReg = json_decode($jsonReg, true);

    $parametrosresp = array(
      "agrupador" => "Respuestas"
    );
    $jsonRegResp = $jsonReg = $rest->get($urlWS, $parametrosresp);
    $arrRegResp = json_decode($jsonRegResp, true);

  } catch (Exception $e) {
    echo "hubo un error";
  }

  //print_r($_SESSION);
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
				    
				                       <!--<p><span class="destacado"><?php echo $_SESSION['nombreSitioPrivado']; ?>, </span><span class="doble-linea">estás en el paso 1 de 4</span></p>-->              
				               
				                       <p id="nombclient">
				                         <!--<span class="destacado"><?php echo $sitioPrivadoNombre; echo "hols";  ?>, </span>-->
				                         <span class="doble-linea">estás en el paso 1 de 4</span></p>
				                       <p><span class="doble-linea">estás en el paso 1 de 4</span></p>
				                  
                           <br> 
                          <p><small>Primero necesitamos que respondas unas preguntas para determinar <span class="textcolor">tu perfil de inversionista</span>. Esto nos permite brindarte un 
                                    mejor servicio especializado para ti.
                           </small></p>
                </div>
              </div>
              <div class="col xs12 lg8 offset-lg2">
                <div class="pasos__pasos numbers observar">
                  <div class="numbers__numbers">
                        <span class="numbers__item activo">1</span>
                        <span class="numbers__item ">2</span>
                        <span class="numbers__item">3</span>
                        <span class="numbers__item">4</span>
                  </div>
                  <span class="numbers__linea"></span>
                </div>
                <div class="numbers__movil"><span class="numbers__item activo">1</span></div>
              </div>
              <div class="col xs12 lg10 offset-lg1">
                <h3 class="pasos__subtitle observar">Tu Perfil de Inversionista</h3>
              </div>
              
              <?php
                    $idx=0;
                    $totalcant=count($arrReg );
                    foreach($arrReg as $data)
                    {
                      $idx +=1;
                      $question_name=  $data['valor'];  
                      $questionid = 'question'.$idx;
                      $answerid='';
                      if ( $idx == 1 )
                      {
              ?>
                        <div id="<?php echo $questionid ?>" class="col xs12 lg10 offset-lg1 borderpregunta">
                            <div class="row">
                              <div class="observar divPreguntas">
                                <p><span class="destacado"><?php echo $question_name?></span> 
                              </div>
                            </div>  
                            <div class="row">                        
                              <div class="col xs12 lg12">
                                <div class="form__group ">  
                                      <div class="txt-bold divRespuestas">           
                                                <?php
                                                                $idxresp=0;
                                                                foreach($arrRegResp as $datoresp)
                                                                {
                                                                  if ( $data['id'] == $datoresp['id_relacion'] )
                                                                      {
                                                                        $idxresp +=1;
                                                                        $answerid = 'answer'.$questionid ;
                                                                        $idresp=$datoresp['id_relacion'].'-'.$datoresp['id'];

                                                  ?>                         
                                                                                  <div class="row labelresp">
                                                                                    <div class="col">
                                                                                        <input type="radio"  id="<?php echo $idresp ?>"  name="<?php echo $answerid ?>"
                                                                                            value="<?php echo $datoresp['id_relacion'].'-'.$datoresp['id']?>"
                                                                                            onclick="clickbutton();"
                                                                                          >
																						   <label class="destacado labelresp" for="<?php echo $answerid ?>"><?php echo $datoresp['valor'] ?></label>
                                                                                      </div>
                                                                                      
                                                                                  </div>  
                                                                                  <row>
                                                                                  
                                                                                  
                                                                                
                                                                          
                                                  <?php
                                                                      }
                                                                }

                                                ?>     
                                      </div>       
                                </div>
                              </div>                
                            </div>  
                        </div>  
              <?php 
                      } else {
              ?>
                          <div id="<?php echo $questionid ?>" class="col xs12 lg10 offset-lg1 borderpregunta" style="display: none">
                            <div class="row">
                              <div class="observar divPreguntas">
                                <p><span class="destacado"><?php echo $question_name?></span> 
                              </div>
                            </div>
                            <div class="row">
                                <div class="col xs12 lg12">
                                  <div class="form__group">  
                                      <div class="txt-bold divRespuestas">            
                                            <?php
                                                            $idxresp=0;
                                                            foreach($arrRegResp as $datoresp)
                                                            {
                                                              if ( $data['id'] == $datoresp['id_relacion'] )
                                                                  {
                                                                    $idxresp +=1;
                                                                    $answerid = 'answer'.$questionid ;
                                                                    $idresp=$datoresp['id_relacion'].'-'.$datoresp['id'];
                                              ?>
                                                                      
                                                                            <div class="row labelresp">  
                                                                              <div class="col">
                                                                                  <input class="radiobutton" type="radio" id="<?php echo $idresp ?>" name="<?php echo $answerid ?>" 
                                                                                    value="<?php echo $data['id'].'-'.$datoresp['id']?>"
                                                                                    onclick="clickbutton(<?php echo $data['id'].'-'.$datoresp['id']?> );"
                                                                                    >
																					<label class="destacado " for="<?php echo $answerid ?>"><?php echo $datoresp['valor'] ?></label>
                                                                              </div>  
                                                                              
                                                                            </div>
                                                                      
                                              <?php
                                                                  }
                                                            }

                                            ?>           
                                      </div>
                                  </div>
                                </div>
                            </div>
                            
                          </div>
              <?php         
                      }             
                    }
              ?>
              <?php
                    $idx=0;
                    $totalcant=count($arrReg );
                    foreach($arrReg as $data)
                    {
                      $idx +=1;
                      $iderrorquestion="errores_question".$idx;
              ?>
                    <div class="col xs12 lg8 offset-lg2"> 
                        <div class="fila" id="<?php echo $iderrorquestion ?>" style="display:none;">       
                                <div class="alerta alerta--error" >Debe seleccionar una respuesta</div> 
                        </div>       
                    </div>
              <?php } ?>      
                     
              <div class="col xs12 lg8 offset-lg2">        
    					  <div class="col xs12 form__buttons">
                        <div>
                            <a class="form__volver" href="#">
                            <span></span></a>
                        </div>
                        <a class="btn btn--secundario submit" href="#" onclick="letDisplayQuestion(); return false;">Siguiente</a>
                </div>  
                <div></br></div>       
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
      if ( sessionStorage.getItem('logeado') == 1)
      {
          var x = document.getElementById('menu__session');
          x.style.display = "block";
      }
      $("#nombclient").text(sessionStorage.getItem('nombre_cliente'));
      var idq=1;
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


      //Fix - Corrige select que bloquea el paso en caso de seleccionar dependiente y luego cambiarlo
      $('#actividad-laboral').on('change', function() {
        var estadoLaboral = $(this).val();
        if(estadoLaboral=="independiente"){
          $("#rut").removeClass('invalido'); 
        }
      });

      function validarRutPrevio(){
        $('#nombres').click();
        if($("#rut").hasClass('invalido')){ 
          $('#errores_form-rut').show();
        }else{
          $('#errores_form-rut').hide();
          validarPaso2();
        }

      }

      function letDisplayQuestion(){
        //if ( idq == 1 )
        //{
          var arrelementos = document.getElementsByName('answerquestion'+idq);
          var checked = false;
          for (i=0; i < arrelementos.length; i++ )
          { 
            if(arrelementos[i].checked)
            {
              checked = true;
              var id_simulacion = sessionStorage.getItem('id_simulacion');
              var id_respuesta = arrelementos[i].id.split('-')[1];
              var id_pregunta = arrelementos[i].id.split('-')[0];
              $.ajax({
                url: 'helpers/clientes.simulacion.detalle.respuesta.helpers.php',
                type: 'POST',
                dataType: 'json',
                data:"id_simulacion=" + id_simulacion
                    + "&id_respuesta=" + id_respuesta
                    + "&id_pregunta="  + id_pregunta,
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
              
            
              
          }
          if (!checked){
            var x = document.getElementById('errores_question'+idq);
              x.style.display = "block";
              return false;
          }
        //}
        

        idq = idq + 1;
        if(idq > <?php echo $totalcant; ?>)
        {
          
          $.ajax({
            url: 'helpers/cliente.simulacion.pasos.helpers.php',
            type: 'POST',
            dataType: 'json',
            data:"id_simulacion=" + id_simulacion
                +  "&paso=2" ,
            success: function(data,xhr){
              console.log(data);
              siguientePaso();
            },
            error: function(xhr){
              paginaError();
              console.log(xhr.responseText);
            }
          });
          
          
          
        }else{
          for (i = 1; i <= <?php echo $totalcant; ?>; i++) {
            var strquestion = "question" + i;
            if ( i == idq )
            {
              var x = document.getElementById(strquestion);
              x.style.display = "block";
            }else{
              var x = document.getElementById(strquestion);
              x.style.display = "none";
            }
          }
        }
        /*if(idq >=3)
        {
          loadDisplayQuestionDefault("div6");
          loadDisplayQuestionDefault("div7"); 
          loadDisplayQuestionDefault("div8"); 
          loadDisplayQuestionDefault("div9");
          loadDisplayQuestionDefault("div10"); 
          loadDisplayQuestionDefault("div11");
          loadDisplayQuestionDefault("div12");
        } */
        
      }


      function loadDisplayQuestionDefault(iddiv) {
        var x = document.getElementById(iddiv);
            x.style.display = "block";
      }

      function selectradio(seleccionado)
      {
          alert(seleccionado);
      };

      function clickradio(idresp)
      {
        var rad = document.getElementById(idresp);//document.myForm.myRadios;
        var prev = null;
        for (var i = 0; i < rad.length; i++) {
            alert(i);
            /*rad[i].addEventListener('change', function() {
                (prev) ? console.log(prev.value): null;
                if (this !== prev) {
                    prev = this;
                }
                console.log(this.value)
            });*/
        }
      };

      function clickbutton(indice)
      {
          var x = document.getElementById("errores_question1");
          x.style.display = "none";
          var x = document.getElementById("errores_question2");
          x.style.display = "none";
          var x = document.getElementById("errores_question3");
          x.style.display = "none";
          var x = document.getElementById("errores_question4");
          x.style.display = "none";
          var x = document.getElementById("errores_question5");
          x.style.display = "none"; 
          var x = document.getElementById("errores_question6");
          x.style.display = "none";
          var x = document.getElementById("errores_question7");
          x.style.display = "none";
          var x = document.getElementById("errores_question8");
          x.style.display = "none";
          
      }
      function siguientePaso(){
        window.location.href = '/simulador/paso2-simulador-objetivo.php';
      }
      function paginaError(){
        window.location.href = '/simulador/paginaError.php';
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
  <div></br></div> 
</html>
<?php 

	require './include/footer.php';

?>
