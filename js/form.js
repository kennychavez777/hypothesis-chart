var data;
var options;
let chart;
var stndDev = 4;
var mean = 0;
let xMin = -4.1;
let xMax = 4.1;
let xLeft = -10;
let xRight = -2;

var tables = {
    "t": { 
        "0.95": ["6.314","2.920","2.353","2.132","2.015","1.943","1.895","1.860","1.833","1.812","1.796","1.782","1.771","1.761","1.753","1.746","1.740","1.734","1.729","1.725","1.721","1.717","1.714","1.711","1.708","1.706","1.703","1.701","1.699","1.697",],
        "0.975": ["12.706","4.303","3.182","2.776","2.571","2.447","2.365","2.306","2.262","2.228","2.201","2.179","2.160","2.145","2.131","2.120","2.110","2.101","2.093","2.086","2.080","2.074","2.069","2.064","2.060","2.056","2.052","2.048","2.045","2.042",],
        "0.99": ["31.821","6.965","4.541","3.747","3.365","3.143","2.998","2.896","2.821","2.764","2.718","2.681","2.650","2.624","2.602","2.583","2.567","2.552","2.539","2.528","2.518","2.508","2.500","2.492","2.485","2.479","2.473","2.467","2.462","2.457",],
        "0.05": ["6.3137","2.9200","2.3534","2.1318","2.0150","1.9432","1.8946","1.8595","1.8331","1.8125","1.7959","1.7823","1.7709","1.7613","1.7531","1.7459","1.7396","1.7341","1.7291","1.7247","1.7207","1.7171","1.7139","1.7109","1.7081","1.7056","1.7033","1.7011","1.6991","1.6973",],
        "0.01": ["31.8210","6.9645","4.5407","3.7469","3.3649","3.1427","2.9979","2.8965","2.8214","2.7638","2.7181","2.6810","2.6503","2.6245","2.6025","2.5835","2.5669","2.5524","2.5395","2.5280","2.5176","2.5083","2.4999","2.4922","2.4851","2.4786","2.4727","2.4671","2.4620","2.4573",]
    },
    "z": {
        "0.01": "-2.33",
        "0.05": "-1.645",
    }
};

$(document).ready(function(){
    $( ".main-form" ).submit(function( e ) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var value = $('input[name=grados_libertad]:checked').val()
        var situation = $('#situation_id').attr('value');
        var confidence = 1 - (value);
        var dc = 0;
        var n = $('.nd').val();

        if(situation != 2){
            var confidence = 1 - (value);
        }

        confidence = confidence.toFixed(2);

        if(n > 30){
            dc = tables['z'][confidence];
            // console.log('Z: ',dc)
        }else{
            dc = tables['t'][value][n-2];
            // console.log('T: ', dc)
        }

        if(situation == 1){
            xLeft = -10;
            xRight = dc;
            mean = 4;
        }else if(situation == 2){
            xLeft = dc * -1;
            xRight = dc;
            mean = 0;
        }else if(situation == 3){
            xRight = 10;
            xLeft = dc;
            mean = -4
        }

        console.log(xRight, xLeft);

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                $('.main-1').hide('slow');
                $('.main-2').hide('slow');
                $('.main-3').show('slow');

                myDraw();
            }
        });
    });

    $('.btn-s').click(function(){
        var situation = $(this).attr('value');
        $('#situation_id').attr('value', situation)

        $('.main-1').hide('slow');
        $('.main-2').show('slow');

    });
});

function myDraw(){
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(prepareChart);
}

function prepareChart() {
    data = new google.visualization.DataTable();
    setChartOptions();
    addColumns();
    addData();
    drawChart();
}
function setChartOptions() {
    options = { legend: "none", "width":"100%"};
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
        // "opacity: 1; + color: #10519600; + stroke-color: black; ";

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