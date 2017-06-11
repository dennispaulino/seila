{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'NanoSTIMA')

@section('content_header')
    <h1>NanoSTIMA - BackOffice</h1>
@stop

@section('content')
      

<!--                    //**************************************************************************************************************************************
                    //**********inicialização das variáveis com a informAção daily record dos utilizadores associados ao professional logado***************************
                    //**************************************************************************************************************************************
-->
  
                   
      
                    


<!--//<?ph
        $array_o=array() ;

        foreach ( $data['usersPatientsAllDailyRec'] as $user)
                    {
                        foreach ( $user as $dailyrec)
                            { 
                                $array_o []= $dailyrec;
                            }
                    }
                   
       ?>-->

<!--                Debugbar::info($array_o)        -->
                    
                    {{ Debugbar::info($data['usersPatientsAllDailyRec'] )}}        
                    
    <div id="idUserPatientSelected"></div>
   <div class="row">
       
       <!--***********************************************************-->
       <!--***************INICIO - Lista dos Utilizadores*************-->
       <!--***********************************************************-->
        <div class=" col-sm-5 col-lg-3"> 
            
                     
            <h3 >Users  </h3>
            
            
                <div id="list" >
                    
                    <ul style="width: 200px; height: 400px; overflow-x: hidden;overflow-y: auto;" >
                    @foreach ( $data['usersPatients'] as $user)
                  
                    
                    <li>  
                        <a id="statistics_{{$user->idUserPatient}}" title="Click on user list to change statistics information" class="list-group-item"
                       
                           href="#" onclick="statisticsUserSelected({{$user->idUserPatient}}) ;return false;">{{$user->idUserPatient}}</a>
                    </li>
                    
              
                    
                    
                    @endforeach
                    {{ Debugbar::info($data['usersPatients'])}}
                    {{Debugbar::info($data['usersPatientsAllDailyRec'])}}

                   </ul> 
                </div>
                
            {{Form::button('Add user',['onClick'=>'addUser()'])}}
            
            
        </div>
       <!--***********************************************************-->
       <!--***************FIM - Lista dos Utilizadores*************-->
       <!--***********************************************************-->
       
       
       
       <!--********************************************************************************************************************************-->
       <!--***************INICIO - Detalhes (dados, estatisticas - gráficos, avisos, histórico sobre os  Utilizadores)************************************-->
       <!--********************************************************************************************************************************-->
       
       <div id="userContent" class="col-sm-7 col-lg-9">
            
           <h3 id ="userIdH3"> User : </h3>
           <p id="one"></p>
           <p id="two"></p>
           <p id="three"></p>
           <p id="four"></p>
            <p id="five"></p>
           <p id="six"></p>
           <p id="seven"></p>


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#statistic">Statistics</a></li>
                <li><a data-toggle="tab" href="#personalinformation">Personal Information</a></li>
                <li><a data-toggle="tab" href="#warning">Warnings</a></li>
                <li><a data-toggle="tab" href="#history">History</a></li>
            </ul>

            <div class="tab-content">
              
                
            <!--***********************************************************-->
            <!--***************INICIO - Dados dos Utilizadores*************-->
            <!--***********************************************************-->
            
                <div id="personalinformation" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
                </div>
            
             <!--***********************************************************-->
            <!--***************FIM - Dados dos Utilizadores*************-->
            <!--***********************************************************-->
            
             <!--***********************************************************-->
            <!--***************INICIO - Estatísticas dos Utilizadores*************-->
            <!--***********************************************************-->
            
                <div id="statistic" class="tab-pane fade in active">
                <h3>Information</h3>
                <p>Some content.</p>

                <!-- Flot Charts based on user statistics -->
               
                  
                                <!--
                ************************************************************
                ******************************INICIO************************
                **************Calendar about user´s tasks*******************
                ************************************************************-->
                
                
                
                
                  
         
                      <!-- Line chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Calendar</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div id='calendar'></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                   
                                <!--
                ************************************************************
                ******************************FIM************************
                **************Calendar about user´s tasks*******************
                ************************************************************-->


                
                
                

                  <div class="row">
                    <div class="col-md-6">
                      <!-- Line chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Line Chart</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div id="line-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                      <!-- /.box -->

                      <!-- Area chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Full Width Area Chart</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                      <!-- /.box -->

                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                      <!-- Bar chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Bar Chart</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div id="bar-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                      <!-- /.box -->

                      <!-- Donut chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Donut Chart</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div id="donut-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                      <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
             

                </div>
    <!-- /.content -->

                <!--***********************************************************-->
            <!--***************FIM - Estatísticas do Utilizador*************-->
            <!--***********************************************************-->

            <!--***********************************************************-->
            <!--***************Inicio - Warning do Utilizador*************-->
            <!--***********************************************************-->
            <div id="warning" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Some content in menu 2.</p>
            </div>
              <!--***********************************************************-->
            <!--***************FIM - Warning do Utilizador*************-->
            <!--***********************************************************-->

              <!--***********************************************************-->
            <!--***************Inicio - Histórico do Utilizador*************-->
            <!--***********************************************************-->
             <div id="history" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Some content in menu 2.</p>
            </div>
             <!--***********************************************************-->
            <!--***************FIM - Histórico do Utilizador*************-->
            <!--***********************************************************-->
        </div>

            
        </div>
       
   
       <!--********************************************************************************************************************************-->
       <!--*************** FIM - Detalhes (dados, estatisticas - gráficos, avisos sobre os  Utilizadores)************************************-->
       <!--********************************************************************************************************************************-->
       
   </div>
   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>  
    
  <footer class="main-footer">
    <div>
        <b>Version 1.0</b>
    </div>
    <strong>NanoSTIMA 2017</strong>
  </footer>

<!-- ./wrapper -->





@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
   <style type="text/css">
  #list ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
 
 #list li {
  font: 200 15px/1.5 Helvetica, Verdana, sans-serif;
  border-bottom: 1px solid #ccc;
}
 
 #list li:last-child {
  border: none;
}
 
 #list li a {
  text-decoration: none;
  color: #000;
  display: block;
  width: 200px;
 
  -webkit-transition: font-size 0.3s ease, background-color 0.3s ease;
  -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
  -o-transition: font-size 0.3s ease, background-color 0.3s ease;
  -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
  transition: font-size 0.3s ease, background-color 0.3s ease;
}
 
 #list li a:hover {
  font-size: 30px;
  background: #f6f6f6;
}
    </style>
    
<link rel='stylesheet' href='/fullcalendar.css' />
@stop

@section('js')

    <!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="/plugins/flot/jquery.flot.min.js "></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="/plugins/flot/jquery.flot.categories.min.js"></script>

<script src='/lib-full_calendar/moment.min.js'></script>
<script src='/dist/js/fullcalendar.min.js'></script>

<!-- Page script -->
    <script> console.log('Hi!'); </script>
    <!-- jQuery 2.2.3 -->

    
      
<!-- Page script -->
<script>
  


  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }


         function addUser(){
                document.getElementById("idUserPatientSelected").innerHTML =2;
                $('#userContent').toggle().toggle();
                         document.getElementById("userIdH3").innerHTML = "User : 5 + 6";     

            statisticsUserSelected(2);
    
        }
  
  
  
  function statisticsUserSelected(idUser,jsonArrayDailyRec)
  {
      
    
      var idUserPatientSelected=idUser;
      

      
   if(idUserPatientSelected!==0)
   {
        
   
 document.getElementById("idUserPatientSelected").innerHTML =idUserPatientSelected;
  document.getElementById("idUserPatientSelected").innerHTML ="Hello";
  
  /*
   * 
   *    *********************************
            *
            * *********************************
            *  *********************************
            *   **************
            *      *********************************
            *
            * *********************************
            *  *********************************
            *   **************
            *      *********************************
            *
            * *********************************
            *  *********************************
            *   **************
            *   
  
  AQUI É QUE VOU "PUXAR" A INFORMAÇÃO DO ARRAY DATA[ALLDATAUSER] PASSADA NO CONTROLLER
            DEPOIS VOU APRESENTAR ESSA INFORMAÇÃO DAS ESTATISTICAS
            *********************************
            *
            * *********************************
            *  *********************************
            *   ********************************* ********************************* *********************************
           
           
           
  
  */
 
 
var js_array=<?php  echo json_encode($data['usersPatientsAllDailyRec']);?>;

    for(var i=0;i<js_array[idUserPatientSelected].length;i++){
        alert(js_array[idUserPatientSelected][i].date);
    }
       
       
       
    /*
     * BAR CHART
     * ---------
     */
    
    
    
    
    //Present in the graph the 7 seven days before in the following format ("dd/mm")
    var actualDay= returnDateBeforeDays(0);
    var oneDayBefore = returnDateBeforeDays(1);
    var twoDayBefore = returnDateBeforeDays(2);
    var threeDayBefore = returnDateBeforeDays(3);
    var fourDayBefore = returnDateBeforeDays(4);
    var fiveDayBefore = returnDateBeforeDays(5);
    var sixDayBefore = returnDateBeforeDays(6);
    

    var bar_data = {
      data: [[sixDayBefore, 10], [fiveDayBefore, 8], [fourDayBefore, 4], [threeDayBefore, 13], [twoDayBefore, 17], [oneDayBefore, 9],[actualDay, 4]],
      color: "#3c8dbc"
    };
    
    
  
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART */



    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = [],dor=[];
  
 
    for (var i = 0; i < 14; i += 0.5) {
      sin.push([i, Math.sin(i)]);
      cos.push([i, Math.cos(i)]);
      dor.push([i, 0.1*i]);
    }
    
    var line_data1 = {
      data: sin,
      color: "#3c8dbc"
    };
    var line_data2 = {
      data: cos,
      color: "#00c0ef"
    };
  var $hello=  $.plot("#line-chart", [line_data1, line_data2], {
      grid: {
        hoverable: true,
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      series: {
        shadowSize: 0,
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      lines: {
        fill: false,
        color: ["#3c8dbc", "#f56954"]
      },
      yaxis: {
        show: true
      },
      xaxis: {
        show: true
      }
    });
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: "absolute",
      display: "none",
      opacity: 0.8
    }).appendTo("body");
    $("#line-chart").bind("plothover", function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);

        $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
            .css({top: item.pageY + 5, left: item.pageX + 5})
            .fadeIn(200);
      } else {
        $("#line-chart-tooltip").hide();
      }

    });
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
      [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
      [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]];
    $.plot("#area-chart", [areaData], {
      grid: {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color: "#00c0ef"
      },
      lines: {
        fill: true //Converts the line chart to area chart
      },
      yaxis: {
        show: false
      },
      xaxis: {
        show: false
      }
    });

    /* END AREA CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {label: "Series2", data: 30, color: "#3c8dbc"},
      {label: "Series3", data: 20, color: "#0073b7"},
      {label: "Series4", data: 50, color: "#00c0ef"}
    ];
    
    
    
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    /*
     * END DONUT CHART
     */

   }
    
    
  }
  
  
  
  
  
              function returnDateBeforeDays( days){ 
                var date = new Date();
                var last = new Date(date.getTime() - (days * 1000 * 24 * 60 * 60 ));
                var day =last.getDate();
                var month=last.getMonth()+1;
                if(day<10) {
                   day='0'+day;
               } 

               if(month<10) {
                   month='0'+month;
               } 

              var  finaldate = day+'/'+month;
               return finaldate;
             }
              </script>
      

<!--
************************************************************
******************************INICIO************************
**************Calendar about user´s tasks*******************
************************************************************-->
<!--<script>
    $('#calendar').fullCalendar({
    dayClick: function() {
       event.backgroundColor = 'yellow';
    },
    
    eventClick: function(event) {
        event.backgroundColor = 'yellow';
        $('#calendar').fullCalendar( 'rerenderEvents' );
    },


    
})
    </script>-->
    
    <script>
    
   

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var events_array = [
        {
        title: 'Test1',
        start: new Date(2012, 8, 20),
        tip: 'Personal tip 1'},
    {
        title: 'Test2',
        start: new Date(2012, 8, 21),
        tip: 'Personal tip 2'}
    ];

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        events: events_array,
        eventRender: function(event, element) {
            element.attr('title', event.tip);
        },
        
           select: function(start, end, jsEvent, view) {
         // start contains the date you have selected
         // end contains the end date. 
         // Caution: the end date is exclusive (new since v2).
         var allDay = !start.hasTime && !end.hasTime;
         alert(["Event Start date: " + moment(start).format(),
                "Event End date: " + moment(end).format(),
                "AllDay: " + allDay].join("\n"));
    }
           });

</script>



<!--
************************************************************
******************************FIM************************
**************Calendar about user´s tasks*******************
************************************************************-->

@stop