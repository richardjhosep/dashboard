$(function() {
    "use strict";
     
	 // chart 1
   var $fecha_inicial = null;
  var $fecha_final  = null;
  var total_enrolados=[];

  $.ajax({
    url: '../helpers/dashboard.servicio.totalizadores.xmes.helpers.php',
    type:'GET',
    dataType:'json',
    data:"fecha_inicial=" + $fecha_inicial
      +  "&fecha_final=" + $fecha_final
      +  "&tipo=" + 'total_enrolados',
    success: function(data, xhr){
      console.log(data); 
      $.each(data, function(key, val){
        total_enrolados.push(val.total);
        
      });
      // chart 1
      $('#chart1').sparkline(total_enrolados, {
        type: 'bar',
        height: '35',
        barWidth: '3',
        resize: true,
        barSpacing: '3',
        barColor: '#fff'
        });
     if (total_enrolados.length == 1 )
     { $("#desglose_total_enrolados").text("+100% respecto al último mes"); }
     if (total_enrolados.length > 1 )
     { 
       var signo=''; var porcentaje=null; var glosa='% respecto al último mes';
       var penultimo=parseFloat(total_enrolados[total_enrolados.length - 2]);
       var ultimo=parseFloat(total_enrolados[total_enrolados.length - 1]);
       if( penultimo > ultimo )
       { 
          signo='-'; 
          var resta=parseFloat(penultimo - ultimo);
          porcentaje=calculoporcentaje(penultimo,resta);
       }
       else
       {  
           signo='+';
           porcentaje=calculoporcentaje(penultimo,ultimo); 
       }
       $("#desglose_total_enrolados").text(signo + porcentaje + glosa); 
     }
     
  },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  }); 
     
    
    
  var $fecha_inicial = null;
  var $fecha_final  = null;
  var total_clientes_por_firmar=[];

  $.ajax({
    url: '../helpers/dashboard.servicio.totalizadores.xmes.helpers.php',
    type:'GET',
    dataType:'json',
    data:"fecha_inicial=" + $fecha_inicial
      +  "&fecha_final=" + $fecha_final
      +  "&tipo=" + 'total_prospectos',
    success: function(data, xhr){
      console.log(data); 
      $.each(data, function(key, val){
        total_clientes_por_firmar.push(val.total);
        
      });
      // chart 2
        $("#chart2").sparkline(total_clientes_por_firmar, {
          type: 'line',
          width: '80',
          height: '40',
          lineWidth: '2',
          lineColor: '#fff',
          fillColor: 'transparent',
          spotColor: '#fff',
      });
     if (total_clientes_por_firmar.length == 1 )
     { $("#desglose_total_clientes_por_firmar").text("+100% respecto al último mes"); }
     if (total_clientes_por_firmar.length > 1 )
     { 
       var signo=''; var porcentaje=null; var glosa='% respecto al último mes';
       var penultimo=parseFloat(total_clientes_por_firmar[total_clientes_por_firmar.length - 2]);
       var ultimo=parseFloat(total_clientes_por_firmar[total_clientes_por_firmar.length - 1]);
       if( penultimo > ultimo )
       { 
          signo='-'; 
          var resta=parseFloat(penultimo - ultimo);
          porcentaje=calculoporcentaje(penultimo,resta);
       }
       else
       {  
           signo='+';
           porcentaje=calculoporcentaje(penultimo,ultimo); 
       }
       $("#desglose_total_clientes_por_firmar").text(signo + porcentaje + glosa); 
     }
     
  },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  }); 
    
		
  var $fecha_inicial = null;
  var $fecha_final  = null;
  var total_clientes=[];
	// chart 3
  $.ajax({
    url: '../helpers/dashboard.serv_clientes.totalxmes.helpers.php',
    type:'GET',
    dataType:'json',
    data:"fecha_inicial=" + $fecha_inicial
      +  "&fecha_final=" + $fecha_final,
    success: function(data, xhr){
      console.log(data); 
      $.each(data, function(key, val){
        total_clientes.push(val.total);
        
      });
      $("#chart3").sparkline(total_clientes, {
        type: 'discrete',
        width: '75',
        height: '40',
        lineColor: '#fff',
        lineHeight: 22

     });
     if (total_clientes.length == 1 )
     { $("#desglose_total_clientes").text("+100% respecto al último mes"); }
     if (total_clientes.length > 1 )
     { 
       var signo=''; var porcentaje=null; var glosa='% respecto al último mes';
       var penultimo=parseFloat(total_clientes[total_clientes.length - 2]);
       var ultimo=parseFloat(total_clientes[total_clientes.length - 1]);
       if( penultimo > ultimo )
       { 
          signo='-'; 
          var resta=parseFloat(penultimo - ultimo);
          porcentaje=calculoporcentaje(penultimo,resta);
       }
       else
       {  
           signo='+';
           porcentaje=calculoporcentaje(penultimo,ultimo); 
       }
       $("#desglose_total_clientes").text(signo + porcentaje + glosa); 
     }
     
  },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });    


     
     var $fecha_inicial = null;
     var $fecha_final  = null;
     var total_participes=[]; 
       $.ajax({
         url: '../helpers/dashboard.serv_participes.totalxmes.helpers.php',
         type:'GET',
         dataType:'json',
         data:"fecha_inicial=" + $fecha_inicial
           +  "&fecha_final=" + $fecha_final,
         success: function(data, xhr){
           console.log(data); 
           $.each(data, function(key, val){
             total_participes.push(val.total);
             
           });
           // chart 4	
          $("#chart4").sparkline(total_participes, {
            type: 'line',
            width: '100',
            height: '25',
            lineWidth: '2',
            lineColor: '#ffffff',
            fillColor: 'transparent'
            
          });
          if (total_participes.length == 1 )
          { $("#desglose_total_participes").text("+100% respecto al último mes"); }
          if (total_participes.length > 1 )
          { 
            var signo=''; var porcentaje=null; var glosa='% respecto al último mes';
            var penultimo=parseFloat(total_participes[total_participes.length - 2]);
            var ultimo=parseFloat(total_participes[total_participes.length - 1]);
            if( penultimo > ultimo )
            { 
               signo='-'; 
               var resta=parseFloat(penultimo - ultimo);
               porcentaje=calculoporcentaje(penultimo,resta);
            }
            else
            {  
                signo='+';
                porcentaje=calculoporcentaje(penultimo,ultimo); 
            }
            $("#desglose_total_participes").text(signo + porcentaje + glosa); 
          }
          
       },
         error: function(xhr){
           console.log(xhr.responseText);
         }
       }); 
	 
       function calculoporcentaje(valor1,valor2){
          var calulo = Math.round((parseFloat(valor2)*100)/parseFloat(valor1));
          return calulo;
       };
	/////// Movimientos
       var $fecha_inicial = null;
       var $fecha_final  = null;
       var total_aportes=[];
       var total_rescates=[]; 
       var arreglo_agno=[]; 
       var today = new Date();
       var agno = today.getFullYear();
       for (var i = 0; i < 12; i++) {
          var mes =null;
          if ((i+1) < 10){ mes = '0'+(i+1);}else{mes = (i+1);}
          var fecha=agno + '-' + mes;
          arreglo_agno.push(fecha);
          total_aportes.push(0);
          total_rescates.push(0);
       }
       
       $.ajax({
        url: '../helpers/dashboard.servicio.totalizadores.xmes.helpers.php',
        type:'GET',
        dataType:'json',
        data:"fecha_inicial=" + $fecha_inicial
          +  "&fecha_final=" + $fecha_final
          +  "&tipo=" + 'total_aportes',
        success: function(data, xhr){
          console.log(data); 
          $.each(data, function(key, val){
             var pos = arreglo_agno.indexOf(val.Fecha);
             if ( pos > -1)
             {  total_aportes[pos]= val.total;  }
          });
          $.ajax({
            url: '../helpers/dashboard.servicio.totalizadores.xmes.helpers.php',
            type:'GET',
            dataType:'json',
            data:"fecha_inicial=" + $fecha_inicial
              +  "&fecha_final=" + $fecha_final
              +  "&tipo=" + 'total_rescates',
            success: function(data, xhr){
              console.log(data); 
              $.each(data, function(key, val){
                var pos = arreglo_agno.indexOf(val.Fecha);
                if ( pos > -1)
                {  total_rescates[pos]= val.total;  }
              });
            },
              error: function(xhr){
                console.log(xhr.responseText);
              }
            });   
          // chart 5
          var ctx = document.getElementById('chart5').getContext('2d');

          var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
          gradientStroke1.addColorStop(0, '#f6ac79');
          gradientStroke1.addColorStop(1, '#fcd5bb');

          var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
          gradientStroke2.addColorStop(0, '#a7b6c5');
          gradientStroke2.addColorStop(1, '#d3dae2');

          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: arreglo_agno,
              datasets: [{
                label: 'Rescates',
                data: total_rescates,
                pointBorderWidth: 2,
                pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: gradientStroke1,
                backgroundColor: gradientStroke1,
                borderColor: gradientStroke1,
                borderWidth: 2
              }, {
                label: 'Aportes',
                data: total_aportes,
                pointBorderWidth: 2,
                pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: gradientStroke2,
                backgroundColor: gradientStroke2,
                borderColor: gradientStroke2,
                borderWidth: 2
              }]
            },
            options: {
              maintainAspectRatio: false,
                legend: {
                  display: false,
            labels: {
                    boxWidth:40
                  }
                },
                tooltips: {
            displayColors:false
                }

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
          });    
      },
        error: function(xhr){
          console.log(xhr.responseText);
        }
      }); 

  



   // chart 6
   /* var ctx = document.getElementById("chart6").getContext('2d');
   
      var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke3.addColorStop(0, '#42e695');
      gradientStroke3.addColorStop(1, '#3bb2b8');

      var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke4.addColorStop(0, ' #7f00ff');
      gradientStroke4.addColorStop(0.5, '#e100ff');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          datasets: [{
            label: 'Laptops',
            data: [40, 30, 60, 35, 60, 25, 50, 40],
            borderColor: gradientStroke3,
            backgroundColor: gradientStroke3,
            hoverBackgroundColor: gradientStroke3,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, {
            label: 'Mobiles',
            data: [50, 60, 40, 70, 35, 75, 30, 20],
            borderColor: gradientStroke4,
            backgroundColor: gradientStroke4,
            hoverBackgroundColor: gradientStroke4,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }]
        },
		options:{
      maintainAspectRatio: false,
		  legend: {
			  position: 'bottom',
              display: true,
			  labels: {
                boxWidth:12
              }
            },
			tooltips: {
			  displayColors:false,
			},	
		  scales: {
			  xAxes: [{
				barPercentage: .5
			  }]
		     }
		}
      });
	  */
	  
	  
	  
  // chart 7
 /*var ctx = document.getElementById('chart7').getContext('2d');

  var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, '#ee0979');
      gradientStroke1.addColorStop(1, '#ff6a00');

      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7],
          datasets: [{
            label: 'Views',
            data: [3, 30, 10, 10, 22, 12, 5],
            pointBorderWidth: 2,
            pointHoverBackgroundColor: gradientStroke1,
            backgroundColor: gradientStroke1,
            borderColor: 'transparent',
            borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
            legend: {
			  position: 'bottom',
              display:false
            },
            tooltips: {
			  displayColors:false,	
              mode: 'nearest',
              intersect: false,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10
            },
			scales: {
			  xAxes: [{
				ticks: {
                    beginAtZero:true
                },
				gridLines: {
				  display: true 
				},
			  }],
			   yAxes: [{
				ticks: {
                    beginAtZero:true
                },
				gridLines: {
				  display: true 
				},
			  }]
		     }

         }
      });  
	  */
	  
	  

// world map

jQuery('#dashboard-map').vectorMap(
{
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: '#009efb',
    regionStyle : {
        initial : {
          fill : '#15ca20'
        }
      },
    markerStyle: {
      initial: {
                    r: 9,
                    'fill': '#fff',
                    'fill-opacity':1,
                    'stroke': '#000',
                    'stroke-width' : 5,
                    'stroke-opacity': 0.4
                },
                },
    enableZoom: true,
    hoverColor: '#009efb',
    markers : [{
        latLng : [21.00, 78.00],
        name : 'I Love My India'
      
      }],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: [],
    showTooltip: true
});



  // chart 8
  $("#chart8").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#dd4b39',
            fillColor: 'rgba(221, 75, 57, 0.5)',
            spotColor: '#dd4b39',
    }); 
	
	// chart 9
	$("#chart9").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#3b5998',
            fillColor: 'rgba(59, 89, 152, 0.5)',
            spotColor: '#3b5998',
    });
	
	
	// chart 10
	$("#chart10").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#55acee',
            fillColor: 'rgba(85, 172, 238, 0.5)',
            spotColor: '#55acee',
    });
	
	
	// chart 11
	$("#chart11").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#0976b4',
            fillColor: 'rgba(9, 118, 180, 0.5)',
            spotColor: '#0976b4',
    });
	
	
	// chart 12
	$("#chart12").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#1769ff',
            fillColor: 'rgba(23, 105, 255, 0.5)',
            spotColor: '#1769ff',
    });
	
	
	// chart 13
	$("#chart13").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#ea4c89',
            fillColor: 'rgba(234, 76, 137, 0.5)',
            spotColor: '#ea4c89',
    });
	
	
	// chart 14
	$("#chart14").sparkline([3,5,3,7,5,10,3,6,5,0], {
            type: 'line',
            width: '150',
            height: '45',
            lineWidth: '2',
            lineColor: '#333333',
            fillColor: 'rgba(51, 51, 51, 0.5)',
            spotColor: '#333333',
    });

	
   // chart 15
   $('#chart15').sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,10,8,6,0], {
            type: 'bar',
            width: '150',
            height: '45',
            barWidth: '3',
            resize: true,
            barSpacing: '5',
            barColor: '#fff'
        });	
	

  // chart 16
  var ctx = document.getElementById("chart16").getContext('2d');

    var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke5.addColorStop(0, '#7f00ff');
      gradientStroke5.addColorStop(1, '#e100ff');

      var gradientStroke6 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke6.addColorStop(0, '#fc4a1a');
      gradientStroke6.addColorStop(1, '#f7b733');


      var gradientStroke7 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke7.addColorStop(0, '#283c86');
      gradientStroke7.addColorStop(1, '#45a247');

      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Samsung", "Apple", "Nokia"],
          datasets: [{
            backgroundColor: [
              gradientStroke5,
              gradientStroke6,
              gradientStroke7
            ],

             hoverBackgroundColor: [
              gradientStroke5,
              gradientStroke6,
              gradientStroke7
            ],

            data: [50, 50, 50]
          }]
        },
        options: {
          maintainAspectRatio: false,
            legend: {
              display: false
            },
            tooltips: {
			  displayColors:false
            }
        }
      });


	  
// chart 17
var ctx = document.getElementById("chart17").getContext('2d');

  var gradientStroke8 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke8.addColorStop(0, '#42e695');
      gradientStroke8.addColorStop(1, '#3bb2b8');

      var gradientStroke9 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke9.addColorStop(0, '#4776e6');
      gradientStroke9.addColorStop(1, '#8e54e9');


      var gradientStroke10 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke10.addColorStop(0, '#ee0979');
      gradientStroke10.addColorStop(1, '#ff6a00');

      var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          labels: ["Gross Profit", "Revenue", "Expense"],
          datasets: [{
            backgroundColor: [
              gradientStroke8,
              gradientStroke9,
              gradientStroke10
            ],

             hoverBackgroundColor: [
              gradientStroke8,
              gradientStroke9,
              gradientStroke10
            ],
            data: [5, 8, 7]
          }]
        },
        options: {
          maintainAspectRatio: false,
            legend: {
              display: false
            },
            tooltips: {
			  displayColors:false
            }
        }
      });


/****** Chart18 ********/
      var $fecha_inicial = null;
      var $fecha_final  = null;
      var nombre_fondos=[]; 
      var valor_fondos=[];
        $.ajax({
          url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
          type:'GET',
          dataType:'json',
          data:"fecha_inicial=" + $fecha_inicial
            +  "&fecha_final=" + $fecha_final
            +  "&tipo=" + 'total_fondos' 
            +  "&nombre_totalizador=" + 'CFIPROYA' ,
          success: function(data, xhr){
            console.log(data); 
            $.each(data, function(key, val){

              /********/
              var lv_nomb_fondo=null;
                $.ajax({
                  url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                  type:'GET',
                  dataType:'json',
                  data:"nemo_fdo_bcs=" + val.nombre,
                  success: function(data, xhr){
                    console.log(data);
                    lv_nomb_fondo = data[0].Nombre_Fdo;
                    $("#fondo1").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                    nombre_fondos.push(lv_nomb_fondo);
                    var x = document.getElementById("fondo1F");
                    x.style.display = "block"; 
                },
                  error: function(xhr){
                    console.log(xhr.responseText);
                  }
                });
              /********/

              
              valor_fondos.push(val.total);
            });
           /******/
           $.ajax({
            url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
            type:'GET',
            dataType:'json',
            data:"fecha_inicial=" + $fecha_inicial
              +  "&fecha_final=" + $fecha_final
              +  "&tipo=" + 'total_fondos' 
              +  "&nombre_totalizador=" + 'CFITAINA' ,
            success: function(data, xhr){
              console.log(data); 
              $.each(data, function(key, val){
                /********/
                  var lv_nomb_fondo=null;
                  $.ajax({
                    url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                    type:'GET',
                    dataType:'json',
                    data:"nemo_fdo_bcs=" + val.nombre,
                    success: function(data, xhr){
                      console.log(data);
                      lv_nomb_fondo = data[0].Nombre_Fdo;
                      $("#fondo2").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                      nombre_fondos.push(lv_nomb_fondo);
                      var x = document.getElementById("fondo2F");
                      x.style.display = "block"; 
                  },
                    error: function(xhr){
                      console.log(xhr.responseText);
                    }
                  });
                /********/
                valor_fondos.push(val.total);
              });
                  /******/
                  $.ajax({
                          url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
                          type:'GET',
                          dataType:'json',
                          data:"fecha_inicial=" + $fecha_inicial
                            +  "&fecha_final=" + $fecha_final
                            +  "&tipo=" + 'total_fondos' 
                            +  "&nombre_totalizador=" + 'CFITACTI-A' ,
                          success: function(data, xhr){
                            console.log(data); 
                            $.each(data, function(key, val){
                              /********/
                                var lv_nomb_fondo=null;
                                $.ajax({
                                  url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                                  type:'GET',
                                  dataType:'json',
                                  data:"nemo_fdo_bcs=" + val.nombre,
                                  success: function(data, xhr){
                                    console.log(data);
                                    lv_nomb_fondo = data[0].Nombre_Fdo;
                                    $("#fondo3").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                                    nombre_fondos.push(lv_nomb_fondo);
                                    var x = document.getElementById("fondo3F");
                                    x.style.display = "block"; 
                                },
                                  error: function(xhr){
                                    console.log(xhr.responseText);
                                  }
                                });
                              /********/
                              valor_fondos.push(val.total);
                            });
                                  /******/
                                  $.ajax({
                                    url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
                                    type:'GET',
                                    dataType:'json',
                                    data:"fecha_inicial=" + $fecha_inicial
                                      +  "&fecha_final=" + $fecha_final
                                      +  "&tipo=" + 'total_fondos' 
                                      +  "&nombre_totalizador=" + 'CFILEASA' ,
                                    success: function(data, xhr){
                                      console.log(data); 
                                      $.each(data, function(key, val){
                                        /********/
                                          var lv_nomb_fondo=null;
                                          $.ajax({
                                            url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                                            type:'GET',
                                            dataType:'json',
                                            data:"nemo_fdo_bcs=" + val.nombre,
                                            success: function(data, xhr){
                                              console.log(data);
                                              lv_nomb_fondo = data[0].Nombre_Fdo;
                                              $("#fondo4").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                                              nombre_fondos.push(lv_nomb_fondo);
                                              var x = document.getElementById("fondo4F");
                                              x.style.display = "block"; 
                                          },
                                            error: function(xhr){
                                              console.log(xhr.responseText);
                                            }
                                          });
                                        /********/
                                        valor_fondos.push(val.total);
                                      });

                                      // chart 18
                                      var ctx = document.getElementById("chart18").getContext('2d');

                                      var gradientStroke11 = ctx.createLinearGradient(0, 0, 0, 300);
                                        gradientStroke11.addColorStop(0, '#2b3642');
                                        gradientStroke11.addColorStop(1, '#d3dae2');

                                        var gradientStroke12 = ctx.createLinearGradient(0, 0, 0, 300);
                                        gradientStroke12.addColorStop(0, '#ec7700');
                                        gradientStroke12.addColorStop(1, '#fcd5bb');


                                        var gradientStroke13 = ctx.createLinearGradient(0, 0, 0, 300);
                                        gradientStroke13.addColorStop(0, '#532610');
                                        gradientStroke13.addColorStop(1, '#fee4ca');

                                        var gradientStroke14 = ctx.createLinearGradient(0, 0, 0, 300);
                                        gradientStroke14.addColorStop(0, '#7f7f7f');
                                        gradientStroke14.addColorStop(1, '#f2f2f2');

                                        var myChart = new Chart(ctx, {
                                          type: 'doughnut',
                                          data: {
                                            labels: nombre_fondos,
                                            datasets: [{
                                              backgroundColor: [
                                                gradientStroke11,
                                                gradientStroke12,
                                                gradientStroke13,
                                                gradientStroke14
                                              ],
                                              hoverBackgroundColor: [
                                                gradientStroke11,
                                                gradientStroke12,
                                                gradientStroke13,
                                                gradientStroke14
                                              ],
                                              data: valor_fondos
                                            }]
                                          },
                                          options: {
                                            maintainAspectRatio: false,
                                              legend: {
                                                display: false
                                              },
                                              tooltips: {
                                          displayColors:false
                                              }
                                          }
                                        });  

                                  },
                                    error: function(xhr){
                                      console.log(xhr.responseText);
                                    }
                                  });
                                  /*****/
                        },
                          error: function(xhr){
                            console.log(xhr.responseText);
                          }
                  });
                  /*****/
          },
            error: function(xhr){
              console.log(xhr.responseText);
            }
          });
           /*****/
        },
          error: function(xhr){
            console.log(xhr.responseText);
          }
        });
        
 /******** Chart19 ***********/
 var $fecha_inicial = null;
 var $fecha_final  = null;
 var nombre_fondosR=[]; 
 var valor_fondosR=[];
 console.log('paso 19');
   $.ajax({
     url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
     type:'GET',
     dataType:'json',
     data:"fecha_inicial=" + $fecha_inicial
       +  "&fecha_final=" + $fecha_final
       +  "&tipo=" + 'total_fondos_rescate' 
       +  "&nombre_totalizador=" + 'CFIPROYA' ,
     success: function(data, xhr){
       console.log(data); 
       $.each(data, function(key, val){

         /********/
         var lv_nomb_fondo=null;
           $.ajax({
             url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
             type:'GET',
             dataType:'json',
             data:"nemo_fdo_bcs=" + val.nombre,
             success: function(data, xhr){
               console.log(data);
               lv_nomb_fondo = data[0].Nombre_Fdo;
               $("#fondo1R").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
               nombre_fondosR.push(lv_nomb_fondo);
               var x = document.getElementById("fondo1SR");
               x.style.display = "block"; 
           },
             error: function(xhr){
               console.log(xhr.responseText);
             }
           });
         /********/

         
         valor_fondosR.push(val.total);
       });
      /******/
      $.ajax({
       url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
       type:'GET',
       dataType:'json',
       data:"fecha_inicial=" + $fecha_inicial
         +  "&fecha_final=" + $fecha_final
         +  "&tipo=" + 'total_fondos_rescate' 
         +  "&nombre_totalizador=" + 'CFITAINA' ,
       success: function(data, xhr){
         console.log(data); 
         $.each(data, function(key, val){
           /********/
             var lv_nomb_fondo=null;
             $.ajax({
               url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
               type:'GET',
               dataType:'json',
               data:"nemo_fdo_bcs=" + val.nombre,
               success: function(data, xhr){
                 console.log(data);
                 lv_nomb_fondo = data[0].Nombre_Fdo;
                 $("#fondo2R").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                 nombre_fondosR.push(lv_nomb_fondo);
                 var x = document.getElementById("fondo2SR");
                 x.style.display = "block";
             },
               error: function(xhr){
                 console.log(xhr.responseText);
               }
             });
           /********/
           valor_fondosR.push(val.total);
         });
             /******/
             $.ajax({
                     url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
                     type:'GET',
                     dataType:'json',
                     data:"fecha_inicial=" + $fecha_inicial
                       +  "&fecha_final=" + $fecha_final
                       +  "&tipo=" + 'total_fondos_rescate' 
                       +  "&nombre_totalizador=" + 'CFITACTI-A' ,
                     success: function(data, xhr){
                       console.log(data); 
                       $.each(data, function(key, val){
                         /********/
                           var lv_nomb_fondo=null;
                           $.ajax({
                             url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                             type:'GET',
                             dataType:'json',
                             data:"nemo_fdo_bcs=" + val.nombre,
                             success: function(data, xhr){
                               console.log(data);
                               lv_nomb_fondo = data[0].Nombre_Fdo;
                               $("#fondo3R").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                               nombre_fondosR.push(lv_nomb_fondo);
                               var x = document.getElementById("fondo3SR");
                               x.style.display = "block"; 
                           },
                             error: function(xhr){
                               console.log(xhr.responseText);
                             }
                           });
                         /********/
                         valor_fondosR.push(val.total);
                       });
                             /******/
                             $.ajax({
                               url: '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php',
                               type:'GET',
                               dataType:'json',
                               data:"fecha_inicial=" + $fecha_inicial
                                 +  "&fecha_final=" + $fecha_final
                                 +  "&tipo=" + 'total_fondos_rescate' 
                                 +  "&nombre_totalizador=" + 'CFILEASA' ,
                               success: function(data, xhr){
                                 console.log(data); 
                                 $.each(data, function(key, val){
                                   /********/
                                     var lv_nomb_fondo=null;
                                     $.ajax({
                                       url: '../helpers/dashboard.servicio.nombrefondo.helpers.php',
                                       type:'GET',
                                       dataType:'json',
                                       data:"nemo_fdo_bcs=" + val.nombre,
                                       success: function(data, xhr){
                                         console.log(data);
                                         lv_nomb_fondo = data[0].Nombre_Fdo;
                                         $("#fondo4R").text(lv_nomb_fondo + '$'.padStart(100) + parseInt(val.total).toLocaleString('es-ES'));
                                         nombre_fondosR.push(lv_nomb_fondo);
                                         var x = document.getElementById("fondo4SR");
                                         x.style.display = "block"; 
                                     },
                                       error: function(xhr){
                                         console.log(xhr.responseText);
                                       }
                                     });
                                   /********/
                                   valor_fondosR.push(val.total);
                                 });

                                 // chart 19
                                 var ctx = document.getElementById("chart19").getContext('2d');

                                 var gradientStroke11 = ctx.createLinearGradient(0, 0, 0, 300);
                                   gradientStroke11.addColorStop(0, '#2b3642');
                                   gradientStroke11.addColorStop(1, '#d3dae2');

                                   var gradientStroke12 = ctx.createLinearGradient(0, 0, 0, 300);
                                   gradientStroke12.addColorStop(0, '#ec7700');
                                   gradientStroke12.addColorStop(1, '#fcd5bb');


                                   var gradientStroke13 = ctx.createLinearGradient(0, 0, 0, 300);
                                   gradientStroke13.addColorStop(0, '#532610');
                                   gradientStroke13.addColorStop(1, '#fee4ca');

                                   var gradientStroke14 = ctx.createLinearGradient(0, 0, 0, 300);
                                   gradientStroke14.addColorStop(0, '#7f7f7f');
                                   gradientStroke14.addColorStop(1, '#f2f2f2');

                                   var myChart = new Chart(ctx, {
                                     type: 'doughnut',
                                     data: {
                                       labels: nombre_fondosR,
                                       datasets: [{
                                         backgroundColor: [
                                           gradientStroke11,
                                           gradientStroke12,
                                           gradientStroke13,
                                           gradientStroke14
                                         ],
                                         hoverBackgroundColor: [
                                           gradientStroke11,
                                           gradientStroke12,
                                           gradientStroke13,
                                           gradientStroke14
                                         ],
                                         data: valor_fondosR
                                       }]
                                     },
                                     options: {
                                       maintainAspectRatio: false,
                                         legend: {
                                           display: false
                                         },
                                         tooltips: {
                                     displayColors:false
                                         }
                                     }
                                   });  

                             },
                               error: function(xhr){
                                 console.log(xhr.responseText);
                               }
                             });
                             /*****/
                   },
                     error: function(xhr){
                       console.log(xhr.responseText);
                     }
             });
             /*****/
     },
       error: function(xhr){
         console.log(xhr.responseText);
       }
     });
      /*****/
   },
     error: function(xhr){
       console.log(xhr.responseText);
     }
   });       

   drawChar();    
	  

});
/***************** Funcion *******************/
// chart 4
var options = {
  series: [{
    name: 'Net Profit',
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
  }, {
    name: 'Revenue',
    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
  }, {
    name: 'Free Cash Flow',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  },
  {
    name: 'Free Cash Flow 2',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  }
  ],
  chart: {
    foreColor: '#9ba7b2',
    type: 'bar',
    height: 360
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  title: {
    text: 'Column Chart',
    align: 'left',
    style: {
      fontSize: '14px'
    }
  },
  colors: ["#212529", '#0d6efd', '#ffc107'],
  xaxis: {
    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
  },
  yaxis: {
    title: {
      text: '$ (thousands)'
    }
  },
  fill: {
    opacity: 1
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  }
};
var chart = new ApexCharts(document.querySelector("#aportesAbonos"), options);
chart.render();

async function doAjax(ajaxurl,args) {
  let result;
  console.log(ajaxurl);
  console.log(args);
  try {
      result = await $.ajax({
          url: ajaxurl,
          type: 'GET',
          dataType:'json',
          data: args
      });

      return result;
  } catch (error) {
      console.error(error);
  }
};

function drawChar()
{
  var fondos_ondemand=[];
  $.ajax({
    url: '../helpers/dashboard.servicio.codigosfondos.helpers.php',
    type:'GET',
    dataType:'json',
    data:"",
    success: function(data, xhr){
      console.log(data);
      $.each(data, function(key, val){                             
        fondos_ondemand.push(getValues('total_fondos_ondemand',val.nombre_totalizador)); 
      });
      console.log(fondos_ondemand);
  },
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });

};
async function getValues(tipo, nombre_totalizador )
{
   var url= '../helpers/dashboard.servicio.totalizadores.xnombretotalizador.helpers.php';
   var data = "fecha_inicial=" + $fecha_inicial
       +  "&fecha_final=" + $fecha_final
       +  "&tipo=" + tipo
       +  "&nombre_totalizador=" + nombre_totalizador;
   const stuff = await doAjax(url, data);
   return stuff[0].total;
};






// chart 2
var ctx = document.getElementById("chartAportesSimuladorvsOndemand").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
    datasets: [{
      label: 'On Demand',
      data: [13, 8, 20, 4, 18, 29, 25],
      barPercentage: .5,
      backgroundColor: "#0d6efd"
    }, {
      label: 'Simulador',
      data: [31, 20, 6, 16, 21, 4, 11],
      barPercentage: .5,
      backgroundColor: "#f41127"
    }]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: true,
      labels: {
        fontColor: '#585757',
        boxWidth: 40
      }
    },
    tooltips: {
      enabled: true
    },
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true,
          fontColor: '#585757'
        },
        gridLines: {
          display: true,
          color: "rgba(0, 0, 0, 0.07)"
        },
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          fontColor: '#585757'
        },
        gridLines: {
          display: true,
          color: "rgba(0, 0, 0, 0.07)"
        },
      }]
    }
  }
});


 // Index Notification
	 
	 function info_noti(){
		Lobibox.notify('default', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		size: 'mini',
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: 'This is Gradient Color Dashboard'
		});
	  } 