$(document).ready(function(){
    //Change quantity
    $(".qty").change(function(){
        var id = $(this).attr('data-id');
        var qty = $(this).val();

        $.ajax({
            url: '?mod=cart&act=update',
            method: 'POST',
            data: {id:id, qty:qty},
            dataType: 'json',
            success: function (data) {
               $("#sub-total-"+id).text(data.sub_total);
               $("#total").text(data.total);
            },
            error: function (xhr, ajaxOptions, thrownError) {
               alert(xhr.status);
               alert(thrownError);
            }
        });
    });

    //Delete product
    $(".delete").on('click', function(){
        var id = $(this).attr('data-id');

        $.ajax({
            url: '?mod=cart&act=delete',
            method: 'POST',
            data: {id: id},
            dataType: 'json',
            success: function (data) {
               alert(data.message);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    // Add product to cart
    $('.add-cart').on('click',function(){
        var id = $(this).attr('data-id');

        $.ajax({
            url: '?mod=cart&act=add',
            method: 'POST',
            data: {id: id},
            dataType: 'json',
            success: function (data) {
                $('#num_cart').text(data.num_cart);
                alert(data.meesage);
            },
            error: function (xhr, ajaxOptions, thrownError) {
               alert(xhr.status);
               alert(thrownError);
            }
        });
    });
});