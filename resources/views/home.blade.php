@extends('adminlte::page')

@section('title', 'AdminLTE')
<!--
//<?ph
//use GuzzleHttp\Client;
//
//$userid=Auth::user()->id;
//$client = new Client();
//$response = $client->get('http://192.168.109.1/~nanostima/relationuser.php?idUserProfessional='.$userid);
////$response = $client->get('http://192.168.109.1/~nanostima/relationuser.php?'.$userid);
// 
//$code = $response->getStatusCode();
//$message = $response->getBody();
//
//$obj = json_decode($response->getBody());
//   echo $obj->alldata->status->status;
//if( $obj->alldata->status->status!=7)
//    { 
//       echo "This user has no patient";
//       $usersPatients=0;
//   }
//  else
//    {
//      
//      
//      $usersPatients= count($obj->alldata->data->result);
////      foreach ($obj->alldata->data->result as $row)
////          {
////            print $row->idUserProfessional;
////          }
//   }
//?>-->


          
            
   


@section('content_header')
    <h1>Welcome {{Auth::user()->name}}</h1>
@stop

@section('content')
 
   <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>  <?php $usersPatients=10;
                      echo $usersPatients; ?> </h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Tasks Accomplished</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Warnings</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
   </div>



               
              

                <!-- Flot Charts based on user statistics -->
               
                  <div class="row">
                   
                  
                    <div class="col-md-12">
                          <h3>Top 5 highest distance walked by users this week</h3>
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
                          <div id="bar-chart2" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                    </div>
                      <!-- /.box -->
  <div class="col-md-12">
                     <h3>Top 5 lowest distance walked by users this week</h3>
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
                          <div id="bar-chart1" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                      </div>
                      <!-- /.box -->
                    
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
   <h3>Latests Warnings</h3>
                  
<div class="box box-primary">
     <div class="box-header with-border">
    
              <i class="ion ion-alert-circled"></i>
       
        

       <h3 class="box-title">Warnings</h3>

       <div class="box-tools pull-right">
         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
         </button>
         <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
       </div>
     </div>
     <div class="box-body">
<!-- Table row -->
        
            <table class="table table-striped" >
              <thead>
              <tr>
                <th width="80%">Content</th>
                <th width="13%">Date</th>
                <th >Action</th>
              </tr>
              </thead>
              <tbody>
                
               <tr >
               
                    <td width="80%" style="color:orange" > The user with the id 1 missed his objective of walking 1 hour  </td>
                    <td width="13%">03/02/2017</td>
                    <td style>{{Form::button('Send Message',['onClick'=>'#'])}}</td>
              </tr>
               <tr>
               
                    <td width="80%" style="color:red"> The user with the id 4 send an emergency notification at 18:07 01/02/2017 on location  long : -4.09224 lat: 31.029382.  <br> Click to see on the map.   </td>
                    <td width="13%">03/02/2017</td>
                    <td >{{Form::button('Send Message',['onClick'=>'#'])}}</td>
              </tr>
             
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
    </div>
</div>
                  
    
  
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
<!-- Page script -->
    <script> console.log('Hi!'); </script>
    <!-- jQuery 2.2.3 -->

<!-- Page script -->
<script>
  $(function () {


    var bar_data = {
      data: [["Manel", 10], ["Zé Carlos", 8], ["Meireles", 4], ["Lopes da Silva", 13], ["Aguiar Mota", 17]],
      color: "#00BB00"
    };
    $.plot("#bar-chart2", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#00BB00",
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

var bar_data = {
      data: [["Paulino", 3], ["Lourenço", 3], ["Dennis", 2], ["Mourinho", 1], ["JJ", 02]],
      color: "#FF0000"
    };
    $.plot("#bar-chart1", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#FF0000",
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



  });

  
</script>
   
@stop






