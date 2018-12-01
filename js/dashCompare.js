$( document ).ready(function() {
    // edit(-1,'ordertobrand',0);
    edit(-1,'topCustomers',0);

});

var year = 2015;

function edits(place,brand1,brand2) {
  
    drs(place,brand1,brand2);
    google.charts.load('current', { packages: ['corechart'] });
   
}
$(document).ready(function () {  
});

function drs(va, brand1, brand2) {

  $.ajax({
    url: "dashboarddata.php",
    type: "POST",
    data: {
      c1: va,
      c2: brand1,
      c3: brand2
    },
    success: function (data) {
      arr = data;
      var arrayLength = data.length;
      var x = new Array(arrayLength);
      for (var i = 0; i < arrayLength; i++) {
        x[i] = [data[i][0], Number(data[i][1]),Number(data[i][2])];
      }
      charts(x, va);
    },
    dataType: "json"
  });
}

function charts(x, place) {
  function drawCharts() {
    var datas = new google.visualization.DataTable();
    datas.addColumn('string', 'Year');
    datas.addColumn('number', 'Customer A orders');
    datas.addColumn('number', 'Customer B orders');
    for (var i = 0; i < x.length; i++) {
      datas.addRow(x[i]);

    }
    var options = { title: "Customer Comparison in terms of No of orders" };
    var ctype = $("input[name="+place+"]:checked").val();
  if(ctype == 'Pie Chart'){
    var chart = new google.visualization.PieChart(document.getElementById(place));
  }else if(ctype == 'Column Chart'){
    var chart = new google.visualization.ColumnChart(document.getElementById(place));
  }else if(ctype == 'Bar Chart'){
    var chart = new google.visualization.BarChart(document.getElementById(place));
  }else if(ctype == 'Line Chart'){
    var chart = new google.visualization.LineChart(document.getElementById(place));
  }else if(ctype == 'Histogram'){
    var chart = new google.visualization.Histogram(document.getElementById(place));
  }
    
    chart.draw(datas, options);
  }
  google.charts.setOnLoadCallback(drawCharts);
}

function output(state,place){
  var opt="";
  if(place == 'ordertobrand'){
      if(state == 1){
          opt = 'No of order per brand in year '+year;
      }else{
          opt = 'No of order per brand till '+2018;
      }
  }else if(place == 'topCustomers'){
      if(state == 1){
          opt = 'Top 10 Customers Order Wise till in  '+year;
      }else{
          opt = 'Top 10 Customers Order Wise till '+2018;
      }
  }else if(place == 'amountReceived'){
      if(state == 1){
          opt = 'Amount Received till 2018';
      }else{
          opt = 'Amount Received till 2018';
      }
  }
  return opt;
}

