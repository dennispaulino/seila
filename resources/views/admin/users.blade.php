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
                    
                      
                    {{Debugbar::info($data['usersPatientsAllDailyRec'])}}     
                    
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
                       
                       <?php echo(' <a id="statistics_{{$user->idUserPatient}}" title="Click on user list to change statistics information" class="list-group-item"                      
                           href="#"   onClick="statisticsUserSelected(\''.str_replace("'", "\\'", $user->idUserPatient).'\', \''.str_replace("'", "\\'", $data['usersPatientsEmail'][$user->idUserPatient]).'\')">'.$user->idUserPatient.'</a>');
 
                   ?>
                    </li>
                    
              
                   
                    
                    @endforeach
                

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
        


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#statistic">Statistics</a></li>
<!--                <li><a data-toggle="tab" href="#personalinformation">Personal Information</a></li>-->
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
                          
                          </div>
                        </div>
                        <div class="box-body">
                            <div id='calendar'> 
                           
                                               </div>
                        
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
                    

                   
                      <!-- Bar chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Distance walked chart</h3>

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
                    </div>
                     
                      
                      <div class="col-md-6">
                    <!-- Donut chart -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <i class="fa fa-bar-chart-o"></i>

                          <h3 class="box-title">Tasks success chart</h3>

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
              
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#dailyrec">Daily Records</a></li>
                       <li><a data-toggle="tab" href="#walkrec">WalkRecords</a></li>

                </ul>

                <div class="tab-content">
                    <div id="dailyrec" class="tab-pane fade  active in">
                       <div class="list-group">
                            <input type="text" id="inputDailyRecordSearch" onkeyup="SearchInHistoryTab('inputDailyRecordSearch','dailyrecUL')" placeholder="Search for daily records...">

                                <ul id="dailyrecUL" class="historylist">
                               
                                  <li><a href="#">Adele</a></li>
                                  <li><a href="#">Agnes</a></li>

                               
                                  <li><a href="#">Billy</a></li>
                                  <li><a href="#">Bob</a></li>

                               
                                  <li><a href="#">Calvin</a></li>
                                  <li><a href="#">Christina</a></li>
                                  <li><a href="#">Cindy</a></li>
                                </ul> 
                       
                        </div>
                        
                    </div>
                    
                    <div id="walkrec" class="tab-pane fade">
                        <div class="list-group">
                             <input type="text" id="inputWalkRecordSearch" onkeyup="SearchInHistoryTab('inputWalkRecordSearch','walkrecUL')" placeholder="Search for walk records...">
                          <ul id="walkrecUL" class="historylist">
                               
                                  
                                </ul> 
                        </div>
                        
                    </div>
                </div>
                 
            </div>
             <!--***********************************************************-->
            <!--***************FIM - Histórico do Utilizador*************-->
            <!--***********************************************************-->
        </div>

     </div>
 </div>
       
   
       <!--********************************************************************************************************************************-->
       <!--*************** FIM - Detalhes (dados, estatisticas - gráficos, avisos sobre os  Utilizadores)************************************-->
       <!--********************************************************************************************************************************-->
       
  
   
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

#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

.historylist {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.historylist  li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

.historylist  li a.header {
    background-color: #e2e2e2; /* Add a darker background color for headers */
    cursor: default; /* Change cursor style */
}

.historylist  li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
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
<script src='/lib-full_calendar/gcal.js'></script>
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
  
  
  
        function statisticsUserSelected(idUser,email)
        {
            var idUserPatientSelected=idUser;

         
         if(idUserPatientSelected!==0)
         {
            
      


       document.getElementById("userIdH3").innerHTML ="User : "+ idUserPatientSelected;
        
    
    
    
    
    //HISTORY TAB -> É MELHOR POR NUMA FUNÇÃO À PARTE
    
         var arrayWalkRec=<?php  echo json_encode($data['usersPatientsAllWalkRec']);?>;
        
    alert(arrayWalkRec);
         var ulHTMLCode="";

 if(arrayWalkRec.hasOwnProperty(idUserPatientSelected))
                {

          for(var i=0;i<arrayWalkRec[idUserPatientSelected].length;i++)
          {
              ulHTMLCode += "<li> Date : " + arrayWalkRec[idUserPatientSelected][i].dateStart+"</li>";
        }   
                
    
        
    
    
                }
    
     document.getElementById("walkrecUL").innerHTML =ulHTMLCode;
    
    
     
        if(~email.indexOf('@gmail.com'))// verifica se o email que o utilizador possui pertence à google, senão pertencer não é possível utilizar o google calendar
        { 
         document.getElementById("calendar").innerHTML  ='<iframe src="https://calendar.google.com/calendar/embed?src='+email+'&ctz=Europe/Lisbon" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>';
        }
        else
        {
          document.getElementById("calendar").innerHTML  ="<h3>It is not possible to access this user 'Google Calendar' account, because this user doesn´t have an gmail account associated!</h3>";
          }
    
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


             //alert(js_array[idUserPatientSelected][i].date);


          /*
           * BAR CHART
           * ---------
           */


          var todayDate = new Date();
              var todayYear = todayDate.getFullYear();


          //Present in the graph the 7 seven days before in the following format ("dd/mm"), full format is ("dd/MM/yyyy)
          var actualDay= returnDateBeforeDays(0);
          var actualDayFullFormat=returnDateBeforeDaysFormatYYYYMMDD(0);
          var oneDayBefore = returnDateBeforeDays(1);
          var oneDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(1);
          var twoDayBefore = returnDateBeforeDays(2);
          var twoDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(2);
          var threeDayBefore = returnDateBeforeDays(3);
          var threeDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(3);
          var fourDayBefore = returnDateBeforeDays(4);
          var fourDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(4);
          var fiveDayBefore = returnDateBeforeDays(5);
          var fiveDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(5);
          var sixDayBefore = returnDateBeforeDays(6);
          var sixDayBeforeFullFormat=returnDateBeforeDaysFormatYYYYMMDD(6);



           var actualDayDistance = 0 ;
          var oneDayBeforeDistance = 0 ;
          var twoDayBeforeDistance  = 0 ;
          var threeDayBeforeDistance =0 ;
          var fourDayBeforeDistance  = 0 ;
          var fiveDayBeforeDistance  = 0 ;
          var sixDayBeforeDistance  = 0 ;


            var arrayDailyRec=<?php  echo json_encode($data['usersPatientsAllDailyRec']);?>;
            var arrayStep=<?php  echo json_encode($data['usersPatientsAllStep']);?>;

                if(arrayDailyRec.hasOwnProperty(idUserPatientSelected))
                {

          for(var i=0;i<arrayDailyRec[idUserPatientSelected].length;i++)
          {

              var idDailyRecAux=arrayDailyRec[idUserPatientSelected][i].idDailyRec;

               if(arrayStep[idUserPatientSelected]!=null ) 
               {
                    if(arrayStep[idUserPatientSelected][idDailyRecAux]!=null)
                       {


                             switch(arrayDailyRec[idUserPatientSelected][i].date) 
                                 {
                              case actualDayFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  actualDayDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              case oneDayBeforeFullFormat:
                               for(var j=0;j<arrayStep[idUserPatientSelected][idDailyRecAux].length;j++)
                                  {
                                  oneDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }

                                  break;
                              case twoDayBeforeFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  twoDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              case threeDayBeforeFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  threeDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              case fourDayBeforeFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  fourDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              case fiveDayBeforeFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  fiveDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              case sixDayBeforeFullFormat:
                              for(var j=0;j<arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec].length;j++)
                                  {
                                  sixDayBeforeDistance+=arrayStep[idUserPatientSelected][arrayDailyRec[idUserPatientSelected][i].idDailyRec][j].distance;
                                  }
                                  break;
                              default:

                                } 
                        }





              }
          }
      }
          var bar_data = {
            data: [[sixDayBefore, sixDayBeforeDistance], [fiveDayBefore, fiveDayBeforeDistance], [fourDayBefore, fourDayBeforeDistance], [threeDayBefore, threeDayBeforeDistance], [twoDayBefore, twoDayBeforeDistance], [oneDayBefore, oneDayBeforeDistance],[actualDay, actualDayDistance]],
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
              tickLength: 0,
              min:0
            
            },
            yaxis: {
              min:0
               }
          });
          /* END BAR CHART */



          /*
           * DONUT CHART - Gráfico que mostra as tarefas cumpridas do utilizador
           * -----------
           */

          var donutData = [
            {label: "Accomplished", data: 30, color: "#00DD00"},
            {label: "Not Done", data: 20, color: "#ffff4d"},
            {label: "Failed", data: 50, color: "#FF4500"}
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


            function returnDateBeforeDaysFormatYYYYMMDD( days){ 
              var date = new Date();
              var last = new Date(date.getTime() - (days * 1000 * 24 * 60 * 60 ));
              var day =last.getDate();
              var month=last.getMonth()+1;
                var year=last.getFullYear();
              if(day<10) {
                 day='0'+day;
             } 

             if(month<10) {
                 month='0'+month;
             } 

            var  finaldate = year+'-'+month+'-'+day;
             return finaldate;
           }



           function stringToDate(_date,_format,_delimiter)
        {
          var formatLowerCase=_format.toLowerCase();
          var formatItems=formatLowerCase.split(_delimiter);
          var dateItems=_date.split(_delimiter);
          var monthIndex=formatItems.indexOf("mm");
          var dayIndex=formatItems.indexOf("dd");
          var yearIndex=formatItems.indexOf("yyyy");
          var month=parseInt(dateItems[monthIndex]);
          month-=1;
          var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
          return formatedDate;
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
    
<!--    <script>
    
   

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
         googleCalendarApiKey: 'AIzaSyDC1q37t61SJT8SUcbeboAYV1L6z39tCew',
        events: {
            googleCalendarId: 'dennispaulino08@gmail.com'
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

</script>-->





<!--
************************************************************
******************************FIM************************
**************Calendar about user´s tasks*******************
************************************************************-->



<!--
************************************************************
******************************INICIO************************
**************Function for Search Bar in History Tab*******************
************************************************************-->

<script>
function SearchInHistoryTab(inputID,ulistID) {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById(inputID);
    filter = input.value.toUpperCase();
    ul = document.getElementById(ulistID);
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>






@stop