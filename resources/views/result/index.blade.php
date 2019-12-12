@extends('layouts.layout')

@section('title')
    Report
@endsection

@section('content')
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);  
        function drawChart1() {
            var states = {!!json_encode($states) !!};
            
            for(var i=1; i<states.length;i++) 
                states[i][1] = parseInt(states[i][1], 10);
            
            var data = google.visualization.arrayToDataTable(states);
            
            var options = {
            title: 'User Percentage By State',
            is3D: true,
            width:900,
            height:700
            };

            

            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            
            google.visualization.events.addListener(chart, 'select', function() {
                var selection = chart.getSelection();
                var state = data.getValue(chart.getSelection()[0].row, 0);
                window.location = 'http://127.0.0.1:8000/user?state=' + state;
            });
            
            chart.draw(data, options);
            
        }
        function drawChart2 (){
            var years = {!!json_encode($years) !!};
            for(var i=1; i<years.length;i++) 
                years[i][1] = parseInt(years[i][1], 10);
            var data2 = google.visualization.arrayToDataTable(years);
            var options2 = {
            title: 'User Percentage By Year',
            is3D: true,
            width:900,
            height:700
            };
            var chart2 = new google.visualization.PieChart(document.getElementById('pie_chart2'));
            google.visualization.events.addListener(chart2, 'select', function() {
                var selection = chart2.getSelection();
                var year = data2.getValue(chart2.getSelection()[0].row, 0);
                window.location = 'http://127.0.0.1:8000/user?year=' + year;
            });
            chart2.draw(data2, options2);
        }
    </script>

    <br />
  <div class="container">

   <div class="panel panel-default d-inline">
    <div class="panel-heading d-inline">
     <center><h3 class="panel-title">Report Demographic</h3></center>
    </div>
    <hr>
    
    {{-- <div class="panel-body d-inline" align="center">
     <div class="d-inline" id="pie_chart">
    
     </div>
     <div class="d-inline" id="pie_chart2"> --}}
    
     </div>
    </div>
   </div>
    <center><table class="columns">
      <tr>
        <td><div id="pie_chart" style="border: 1px solid #ccc"></div></td>
        <td><div id="pie_chart2" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table></center>

  </div>
@endsection

@section('specificJS')
    <script src="{{ asset('/js/auto_filter.js') }}"></script>
    <script src="{{ asset('/js/auto_sort.js') }}"></script>
@endsection