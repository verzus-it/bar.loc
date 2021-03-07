$('.updateProductCompositionButton').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        success: function(data) {
            $('#updateProductComposition .modal-body').html(data);
            $('#updateProductComposition').modal('show')

        }
    });
});
$('.updateProductOptionButton').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        success: function(data) {
            $('#updateProductOption .modal-body').html(data);
            $('#updateProductOption').modal('show')

        }
    });
});

$('#saveProductComposition').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        data: $('#updateProductComposition select, #updateProductComposition input').serialize(),
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if(response.status){
                location.reload();
            }else{
                alert('Косяк');
            }
        }
    });
});

$('#saveProductOption').on('click', function() {
    $.ajax({
        url: $(this).attr('data-url'),
        data: $('#updateProductOption input').serialize(),
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if(response.status){
                location.reload();
            }else{
                alert('Косяк');
            }
        }
    });
});