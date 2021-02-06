$('.updateProductCompositionButton').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        success: function(data) {
            $('#updateProductComposition .modal-body').html(data);
            $('#updateProductComposition').modal('show')
        }
    });
});