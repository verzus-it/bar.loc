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
        url: $(this).attr('data-url'),
        data: $('#updateProductComposition select, #updateProductComposition input').serialize(),
        type: 'POST',
        success: function(data) {
            console.log(data)
        }
    });
});