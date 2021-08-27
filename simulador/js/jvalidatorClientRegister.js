  
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
          }
      }