<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var data;
        var options;
        let chart;
        var stndDev = 1;
        var mean = 0;
        let xMin = -4.1;
        let xMax = 4.1;
        let xLeft = -2;
        let xRight = 2;

        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(prepareChart);

        function prepareChart() {
            data = new google.visualization.DataTable();
            setChartOptions();
            addColumns();
            addData();
            drawChart();
        }
        function setChartOptions() {
            options = { legend: "none" };
            options.hAxis = {};
            options.hAxis.minorGridlines = {};
            options.hAxis.minorGridlines.count = 5;
            return options;
        }
        function addColumns() {
            data.addColumn("number", "X Value");
            data.addColumn("number", "Y Value");
            data.addColumn({ type: "boolean", role: "scope" });
            data.addColumn({ type: "string", role: "style" });
        }
        function addData() {
            data.addRows(createArray(xMin, xMax, xLeft, xRight, mean, stndDev));
        }
        function createArray(xMin, xMax, xLeft, xRight, mean, stndDev) {
            let chartData = new Array([]);
            let index = 0;
            for (var i = xMin; i <= xMax; i += 0.1) {
                chartData[index] = new Array(4);
                chartData[index][0] = i;
                chartData[index][1] = jStat.normal.pdf(i, mean, stndDev);

                if (i < xLeft || i > xRight) {
                chartData[index][2] = false;
                }
                chartData[index][3] =
                "opacity: 1; + color: #105196; + stroke-color: black; ";

                index++;
            }
            return chartData;
        }
        function drawChart() {
            chart = new google.visualization.AreaChart(
            document.getElementById("chart_div")
        );
        chart.draw(data, options);
        }
    </script>
  </head>
  <body>
    <style>
        #chart_div{
            width: 1200px;
            height: 600px;
            margin: 5px;
        }

        .result{
            /* display:none; */
        }
    </style>

    <form class="main-form">
        <div class="form-group">
            <label>Media (Mu)</label>
            <input type="text" class="form-control" placeholder="Media Poblacional">
        </div>
        <div class="form-group">
            <label>X barra</label>
            <input type="text" class="form-control" placeholder="X barra">
        </div>
        <div class="form-group">
            <label>Numero de datos (n)</label>
            <input type="text" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Generar</button>
    </form>
    
    <div class="result  col-md-12">
        <h1>Bell Curve with Google Charts API</h1>
        <div id="chart_div"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script type="text/javascript">
        $(document).ready(function(){
            $( ".main-form" ).submit(function( event ) {
                event.preventDefault();
                $('.result').show('slow');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>