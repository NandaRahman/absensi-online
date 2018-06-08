@extends('layouts.master')

@section('content')
        <div id="container"></div>
        <div class="row" id="row">
        </div>

        <script type="text/javascript">
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container'
            },
            yAxis: [{
                min: 0,
                max: 100,
                allowDecimals: false,
                title: {
                    text: null
                }}],
            xAxis: [{
                type: "datetime",
                labels: {
                    formatter: function() {
                        return Highcharts.dateFormat("%b %e", this.value)
                    }
                }
            }],

            rangeSelector: {
                selected: 1
            },
            scrollbar: {
                enabled:true,
                barBackgroundColor: 'gray',
                barBorderRadius: 7,
                barBorderWidth: 0,
                buttonBackgroundColor: 'gray',
                buttonBorderWidth: 0,
                buttonBorderRadius: 7,
                trackBackgroundColor: 'none',
                trackBorderWidth: 1,
                trackBorderRadius: 8,
                trackBorderColor: '#CCC'
            },
            plotOptions:{
                series:{
                    allowPointSelect: true,
                    point:{
                        events:{
                            click: function(){
                                $.get("{{asset("")}}chart_table/"+this.category,function (data, status) {
                                    console.log(data);
                                    document.getElementById("row").innerHTML= data;
                                    $('#table').DataTable();

                                });
//                                alert(this.category);
                            }
                        }
                    }
                }
            },

        });
        $(document).ready(function(){
            $.get("{{route('chart.all')}}",function (data, status) {
                var array = [[1528033103,"0"]];
                $.each(data.alpha,function (index,value) {
                    array = Array.from(value);
                });
                console.log(Array.from(data.alpha[0]));
                chart.addSeries({
                    name: "Alpha",
                    data: data.alpha[0]
                });

            });
        });
    </script>

@endsection
