$("#sub").click( function() {
 $.post( $("#myform").attr("action"), 
         $("#myform :input").serializeArray(), 
         function(info){ $().html(info);

  });
 clearInput();
});
$("#myform").submit( function() {
  return false;	
});

function clearInput() {
	$("#myform :input").each( function() {
	   $(this).val('');
	});
}
