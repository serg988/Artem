// $('.cart').on('click', function (){
//     $('#cart').modal('show');
// });
function UpdateCartQty() {
    $.ajax({
        url: '/cart/cart-qty',
        type: 'get',
        success: function (res) {
            $('#cart-qty').text(res);
        },
        error: function () {
            alert('error');
        }
    })

}
function showCart(cart){
    $('#cart .modal-content').html(cart);
    $('#cart').modal();
    UpdateCartQty()
}
function hideCart(){
    $('#cart').modal("hide");
    UpdateCartQty()
}

function openCart(event)
{
    event.preventDefault();
    $.ajax({
        url: '/cart/open',
        type: 'get',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
            UpdateCartQty()
        },
        error: function () {
            alert('error');
        }
    })
}

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
        $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'get',
        success: function (res) {
            $('#cart .modal-content').html(res);
            UpdateCartQty()
        },
        error: function () {
            alert('error');
        }
    })
})

$('#cart .modal-content').on('click', '.delete-good', function () {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete-good',
        data: {id: id},
        type: 'get',
        success: function (res) {
            UpdateCartQty();
            showCart(res);
        },
        error: function (res) {
            alert('error');
        }
    })
})

function clearCart(){
    if (confirm('Точно очистить корзину?')) {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (res) {
                if (!res) {
                    alert('Error!');
                }
                UpdateCartQty();
                showCart(res);
            },
            error: function () {
                alert('ERROR');
            }
        });
    }
}
$('.modal-content').on('click', '.btn-close', function () {
    $('#cart').modal('hide');
})


