

var custID;
var ordNo;
function custInfo(val1){;

custID = val1;

var tableC = document.getElementById('tab');
$.ajax({

      url:"salesOrderOperation1.php",
      type:"POST",
      data:{
        c1:"addorder",
        c3:val1
       
      },
      success:function(data){
        ordNo=data;
          $.ajax({

      url:"salesOrderOperation1.php",
      type:"POST",
      data:{
        c1:"searchCustomer",
        c2:val1
       
      },
      success:function(data){
        tableC.rows[1].cells[1].innerHTML = data[1];
        tableC.rows[1].cells[2].innerHTML = data[2];
        tableC.rows[1].cells[3].innerHTML = data[3];
        tableC.rows[1].cells[4].innerHTML = data[4];
        tableC.rows[1].cells[5].innerHTML = data[5];
        tableC.rows[1].cells[6].innerHTML = data[6]; 
         $('#content1').load("table1.php",{var: custID, var1: ordNo});
      },
          dataType:"json"
    });  
      },
         
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

      url:"salesOrderOperation1.php",
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
// var count=0;
function javafunction(val3,count){
  alert(count);
  count++;
var table = document.getElementById('myTable');
var row = table.rows[table.rows.length-1];
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');

var party_id = custID;
var inv_id = ordNo;
var qty =  row.cells[4].innerHTML;
var rate = row.cells[5].innerHTML;
var amount = row.cells[4 ].innerHTML * row.cells[5].innerHTML;
var pid = pval; 
if(val3 ==1 )
{

  var qty =  row.cells[5].innerHTML;
var rate = row.cells[6].innerHTML;
var amount = row.cells[5].innerHTML * row.cells[6].innerHTML;
} else{
  var qty =  row.cells[4].innerHTML;
var rate = row.cells[5].innerHTML;
var amount = row.cells[4 ].innerHTML * row.cells[5].innerHTML;
}
  $.ajax({

      url:"salesOrderOperation1.php",
      type:"POST",
      data:{
        c1: "add",
        c2: party_id,
        c3: inv_id,
        c4: qty,
        c5: rate,
        c6: amount,
        c7: pid
      },
      success:function(data){

              $('#content1').load("table1.php",{var: custID, var1: ordNo});},
          
    });
};

function delOrder(orderNo) {
var c2 = orderNo;
    $.ajax({
      url:"salesOrderOperation1.php",
      type:"POST",
      data:{
        c1:"delete",
        c2:c2
      },
          success:function(data,status){
          $('#content1').load("table1.php",{var: custID, var1: ordNo});
      },

    });
  
};
function editOrder(){
  
  $('#content1').load("table1.php",{var: custID, var1: ordNo});
}