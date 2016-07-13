$(function() {

    $('body').delegate('.product-buy', 'click', function(event) {
        var productId= $(this).data('product');
        productBuy(productId, this);
        return false;
    });

    function productBuy(productId, el) {

        $(el).attr('disabled', 'disabled');

        $.ajax({
            url: '/product/buy?id='+ productId,
            type: 'POST',
            dataType: 'json',
        })
        .success(function(data) {
            console.log("success");
        })
        .error(function() {
            alert("error");
        })
        .always(function() {
            $(el).removeAttr('disabled');
        })
    }
});