 $(document).ready(function(){   
    $('tbody').delegate('.quantity,.price','keyup',function(){
        var tr=$(this).parent().parent();
        var quantity=tr.find('.quantity').val();
        var price=tr.find('.price').val();
        var totalProduct=(quantity*price);
        tr.find('.totalProduct').val(totalProduct);
        total();
    });
    



    
   $(document).on("click", ".remove", function() {
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
     
    });

    $('.este').on('click',function(){
        alert("llega");
    });
 });


 function addRow()
    {

        var tr='<tr>'+
        '<td><input type="text" name="product_id[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="lot[]" class="form-control"></td>'+
        '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td><input type="text" name="price[]" class="form-control price"></td>'+
        '<td><input type="date" name="expiration[]" class="form-control"></td>'+
        ' <td><input type="text" name="totalProduct[]" class="form-control totalProduct"></td>'+
        '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };


function total(){
        var total=0;
        $('.totalProduct').each(function(i,e){
            var totalProduct=$(this).val()-0;
        total +=totalProduct;
    });
    $('.total').html("$"+ total+" COP");    
    }