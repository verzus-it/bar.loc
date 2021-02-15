$('.updateProductCompositionButton').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        success: function(data) {
            $('#updateProductComposition .modal-body').html(data);
            $('#updateProductComposition').modal('show')

        }
    });
});
$('#saveProductComposition').on('click', function() {
    $.ajax({
        url: '../product/save-product-composition',
        data: $('#updateProductComposition select, #updateProductComposition input').serialize(),
        success: function(data) {
            console.log(data)

        }
    });
});