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
    options = { legend: "none"};
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