jQuery(document).ready(function($) {
    $('.compare-btn').click(function() {
        const productId = $(this).data('product-id');
        $.post(compareData.ajaxurl, {
            action: 'add_to_compare',
            product_id: productId
        }, function(response) {
            if (response.success) {
                alert('Added to compare!');
            }
        });
    });
});