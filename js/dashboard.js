$( document ).ready(function() {
    edit(0,'ordertobrand',0);
    edit(0,'topCustomers',0);
    edit(0,'amountReceived',0);

});

var year = 2014;

function edit(va,type,state) {
  
  
  var temp = year + va;
  if (temp < 2019 && temp >= 2004) {
    dr(temp, state,type);
    google.charts.load('current', { packages: ['corechart'] });
    year = temp;
  } else {
    alert("no Data available for year: " + temp);
  }
}
$(document).ready(function () {  
});

function dr(va, state, place) {

  $.ajax({
    url: "dashboarddata.php",
    type: "POST",
    data: {
      c1: place,
      c2: va,
      c3: state
    },
    success: function (data) {
      arr = data;
      var arrayLength = data.length;
      var x = new Array(arrayLength);
      for (var i = 0; i < arrayLength; i++) {
        x[i] = [data[i][0], Number(data[i][1])];
      }
      chart(x, state,place);
    },
    dataType: "json"
  });
}

function chart(x, state,place) {
  function drawChart() {
    var datas = new google.visualization.DataTable();
    datas.addColumn('string', 'Year');
    datas.addColumn('number', 'Orders');
    for (var i = 0; i < x.length; i++) {
      datas.addRow(x[i]);

    }
    var options = { title: output(state,place) };
   
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
  google.charts.setOnLoadCallback(drawChart);
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

