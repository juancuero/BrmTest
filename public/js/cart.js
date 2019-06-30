$(document).ready(function(){   
 	total();  

 	$( ".totalProduct" ).keyup(function() {
        $('#div_error').hide();
        $("#checkout").attr("disabled", false);
  		var quantity = $(this).val();
	var total = $(this).data('total');
	if (quantity > total) {
		var error = "Sorry, only we have "+total+" units available.";
        $("#checkout").attr("disabled", true);
        $('#div_error').show();
        $('#error').text(error);
		return false;
	}else{
		$(this).trigger("change");
	}
});

});


function total(){
        var total=0;
        $('.totalProduct').each(function(i,e){
        	var price = $(this).data('price');
            var totalProduct=$(this).val() * price ;
        total += totalProduct;
    });
    $('#total').html("$"+total);    
    $('#totalAux').val(total); 
    if (total ==0) {
        $("#checkout").attr("disabled", true);
    }   
}


