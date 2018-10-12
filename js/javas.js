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
var pval;
function changeAction(val,val2){;
  pval = val;
var table = document.getElementById('myTable');
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
        table.rows[table.rows.length-1].cells[3].innerHTML = "  ";
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

function javafunction(val3){
var table = document.getElementById('myTable');
var row = table.rows[table.rows.length-1];
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
if(val3 ==1 )
{
  var c4 = row.cells[3].innerHTML;
  // var c5 =
  var c6 =row.cells[5].innerHTML;
  var c7 =row.cells[6].innerHTML;
  var c8 =row.cells[5].innerHTML * row.cells[6].innerHTML;
} else{
       var c4 = val3;
  // var c5 =
  var c6 =row.cells[4].innerHTML;
  var c7 =row.cells[5].innerHTML;
  var c8 =row.cells[4 ].innerHTML * row.cells[5].innerHTML;
} 
  $.ajax({
      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c1: "add",
        c2: custID,
        c3: row.cells[2].innerHTML,
        c4: c4,
        c5: pval,
        c6: c6,
        c7: c7,
        c8:c8
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