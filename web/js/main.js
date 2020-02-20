$('.cart').on('click', function (){
    $('#cart').modal('show');
});

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);
    $.ajax({
        url: 'cart/add',
        data: {name: name},
        type: 'get',
        success: function (res) {
            $('#cart .modal-content').html(res);
        },
        error: function () {
            alert('error');
        }

    })

})

