$(document).ready(function () {
    $(document).on('change', 'input[name="quantity"]', function () {
        const quantity_value = +$(this).val();
        const product_id = +$(this).attr('data-id');

        $.ajax({
            method: 'get',
            data: { id: product_id, quantity: quantity_value },
            url: this.baseURI + '/updateQuantity',
            dataType: 'json',
            success: (response) => {
                console.log(response);

                

                $('.num_order').empty();
                $('.total').empty();
                $('.num_order').text('x' + response.num_order);
                $('.total').text(response.total.toLocaleString('it-IT', { style: 'currency', currency: 'VND' }));

            },
            error: (error) => console.log(error)
        })
    })
})