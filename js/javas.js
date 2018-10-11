
var custID;
function custInfo(val1){;
custID = val1;
var tableC = document.getElementById('tab');
    $.ajax({

      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c1:"searchCustomer",
        c2:val1
       
      },
      success:function(data){
        // tableC.rows[1].cells[0].innerHTML = data[0];
        tableC.rows[1].cells[1].innerHTML = data[1];
        tableC.rows[1].cells[2].innerHTML = data[2];
        tableC.rows[1].cells[3].innerHTML = data[3];
        tableC.rows[1].cells[4].innerHTML = data[4];
        tableC.rows[1].cells[5].innerHTML = data[5];
        tableC.rows[1].cells[6].innerHTML = data[6]; 
         $('#content').load("table.php",{var: custID});
      },
          dataType:"json"
    });  
}
function getJSessionId(){
    var jsId = document.cookie.match(/JSESSIONID=[^;]+/);
    if(jsId != null) {
        if (jsId instanceof Array)
            jsId = jsId[0].substring(11);
        else
            jsId = jsId.substring(11);
    }
    return jsId;
}
var pval;
function changeAction(val,val2){;
alert(val2);
  pval = val;
var table = document.getElementById('myTable');
// alert(table.rows.length);
if(val2 == 1){
var quan = table.rows[table.rows.length-1].cells[5].innerHTML;
}else{
  var quan = table.rows[table.rows.length-1].cells[4].innerHTML;
}
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
    $.ajax({

      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c1:"searchProduct",
        c2:val
       
      },
      success:function(data){
        table.rows[table.rows.length-1].cells[0].innerHTML = "";
        table.rows[table.rows.length-1].cells[1].innerHTML = custID;
        table.rows[table.rows.length-1].cells[2].innerHTML = utc;
        if(val2 == 1){
        table.rows[table.rows.length-1].cells[3].innerHTML = "SalesPerson";
        // table.rows[table.rows.length-1].cells[4].innerHTML = val;
        table.rows[table.rows.length-1].cells[6].innerHTML = data[5];
        table.rows[table.rows.length-1].cells[7].innerHTML = data[5]*quan; 
      }else{
           table.rows[table.rows.length-1].cells[4].innerHTML = quan;
        table.rows[table.rows.length-1].cells[5].innerHTML = data[5]
        // table.rows[table.rows.length-1].cells[6].innerHTML = data[5];
        table.rows[table.rows.length-1].cells[6].innerHTML = data[5]*quan; 


      }
      },
          dataType:"json"
    });  
}

function javafunction(){
    alert("fd");
var table = document.getElementById('myTable');
var row = table.rows[table.rows.length-1];
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
alert(row.cells[5].value);
    $.ajax({
      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c1: "add",
        c2: custID,
        c3: row.cells[2].innerHTML,
        c4: row.cells[3].innerHTML,
        c5: pval,
        c6: row.cells[5].innerHTML,
        c7: row.cells[6].innerHTML,
        c8:row.cells[5].innerHTML * row.cells[6].innerHTML
      },
      success:function(data){
              $('#content').load("table.php",{var: custID});},
          
    });
};

function delOrder(orderNo) {
var c2 = orderNo;
    $.ajax({
      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c1:"delete",
        c2:c2
      },
      success:function(data,status){
$('#content').load("table.php",{var: custID});
         // $( "#myTable" ).load( " #myTable" );
             // location.reload();
      },

    });
  
};
function editOrder(){
  
  $('#content').load("table.php",{var: custID});
}

// $('.table-edit').click(function () {
// var row = $(this).closest("tr");

// var c1 = row.find('td:eq(0)').text();
// alert(row.cells[4]);
//     $.ajax({
//       url:"salesOrderOperation.php",
//       type:"POST",
//       data:{
//         c1:"delete",
//         c2:c1
//       },
//       success:function(data,status){
//          // $( "#myTable" ).load( " #myTable" );
//              location.reload();
//       },

//     });
  
// });
// $('.table-up').click(function () {
// var $row = $(this).parents('tr');
// if ($row.index() === 1) return; // Don't go above the header
// $row.prev().before($row.get(0));
// });

// $('.table-down').click(function () {
// var $row = $(this).parents('tr');
// $row.next().after($row.get(0));
// });

// // A few jQuery helpers for exporting only
// jQuery.fn.pop = [].pop;
// jQuery.fn.shift = [].shift;

// $BTN.click(function () {
//   alert("lkdjsf");
// var $rows = $TABLE.find('tr:not(:hidden)');
// var headers = [];
// var data = [];

// // Get the headers (add special header logic here)
// $($rows.shift()).find('th:not(:empty)').each(function () {
// headers.push($(this).text().toLowerCase());
// });

// // Turn all existing rows into a loopable array
// $rows.each(function () {
// var $td = $(this).find('td');
// var h = {};

// // Use the headers from earlier to name our hash keys
// headers.forEach(function (header, i) {
// h[header] = $td.eq(i).text();
// });

// data.push(h);
// });

// // Output the result
// $EXPORT.text(JSON.stringify(data));
// });
  