$(document).ready(function(){   
 	total();  

 	$( ".totalProduct" ).keyup(function() {
  		var quantity = $(this).val();
	var total = $(this).data('total');
	if (quantity > total) {
		console.log("Sorry, only we have "+total+" units available.");
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
    $('#total').html("$"+ total);    
}


