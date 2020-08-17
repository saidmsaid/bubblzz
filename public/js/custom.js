$(document).ready(function(){

    if($('#offer').attr('checked') === 'checked'){
        $('.offer-none').slideToggle();
    }


    $('#offer').on('click', function () {
        $('.offer-none').slideToggle();
    });

    $('.toggle-password i').on('click', function () {
        var $this = $(this);
        if($this.hasClass('fa-eye')){
            $('.password-parent input').attr('type', 'text');
            $this.removeClass('fa-eye').addClass('fa-eye-slash');
        }else{
            $('.password-parent input').attr('type', 'password');
            $this.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

     $('.deleteCat').on('click', function () {
        var catId = $(this).data('catid'),
            model = $('#'+catId);
        model.find('.modal-footer #catID').val(catId);
    });

    $('.changeOrderStatus').on('click', function () {
                    // console.log("here");
        var orderID = $(this).data('orderid'),
            orderStatus = $(this).data('orderstatus'),
            model = $('#m_modal_2');

        model.find('.modal-footer #orderID').val(orderID);
        model.find('.modal-footer #orderStatus').val(orderStatus);
        // console.log(orderID + '=> ' + orderStatus );
    });


    $('body').on('click','.deleteProduct', function() {
        var productRow = $(this).data('row'),
            model = $('#m_modal_1'),
            productID = $(this).parent().parent().find('#productID').val();
        //
        model.find('.modal-footer #productRow').attr('data-delete-row', productRow);
        model.find('.modal-footer #productRow').attr('data-productID', productID);
    });

    $('body').on('click','#productRow', function() {
        var  rowCount = $(this).attr('data-delete-row'),
            button = $('#table-data ').find('button[data-row='+ rowCount +']'),
            productID = $(this).attr('data-productID');
        button.parent().parent().remove();
        $.ajax({
            url: '/deleteSession',
            type: 'GET',
            data: {productID: productID},
            dataType: 'json',
            success: function (data) {
                $('#totalPrice #outputPrice').text(data.totalPrice + ' L.E' );
                $('#totalPrice #outputPrice').next().val(data.totalPrice);
            }
        })
    });

    $('#find-customer').on('click', function () {
       var customerName = $('#customerName').val(),
           customerNumber = $('#customerNumber').val();
        var form = $(this).closest('form');
// console.log(customerName + ' ' +customerNumber);
       $.ajax({
           url: 'findCustomer',
           type: 'GET',
           data: {customerName: customerName, customerNumber: customerNumber},
           dataType: 'json',
           success: function(data){
               form.find('#customerGetId').val(data.id);
               form.find('#customerGetName').val(data.name);
               form.find('#testName').val(data.name);
               form.find('#customerGetEmail').val(data.email);
               form.find('#customerGetMobile').val('0' + data.mobile);
               form.find('#customerGetAddress').val(data.address);
               form.find('#customerGetCountry').val(data.country);
               form.find('#customerGetCity').val(data.city);
               if(data.id == null){
                   form.find('#customerGetMobile').val('');
                   $('#customerNotFound').html(data.error).parent().removeClass('hidden');
               }else {
                   $('#customerNotFound').html('').parent().addClass('hidden');
               }
           }
       });
    });

    $('#find-product').on('click', function () {
        var productName = $('#search-product').val(),
            orderID = $('#order-id').val(),
            rowCountInTable = 0,
            totalPriceValue = $('#totalPriceValue').val();
            if($('#table-data tbody ').find('.dataTables_empty').length === 0){
                console.log('no it isn');
                rowCountInTable = $('#table-data tbody ').children().length;
            }else {
                console.log('yes');
            }

            // console.log($('#table-data tbody ').find('.dataTables_empty'));

        $.ajax({
            url: 'findProduct',
            type: 'GET',
            data: {productName: productName, orderID: orderID, rowCountInTable: rowCountInTable, totalPriceValue: totalPriceValue},
            dataType: 'json',
            success: function(data){
                $('.dataTables_empty').parent().remove();
                $('#table-data tbody ').append(data.table_data);
                $('#totalPrice #outputPrice').text(data.totalPrice + ' L.E' );
                $('#totalPrice #outputPrice').next().val(data.totalPrice);
                // alert(data);
                // console.log(data)
            }
        });
    });

    $('body').on('input', '#editQuantity', function () {
        var $that = $(this),
            $quantity = $that.val(),
            $productID = $that.next().val(),
            $rows = $('#table-data tbody tr'),
            $count = $rows.length,
            $values = [],
            totalPriceValue = $('#totalPriceValue').val();
        for(var i =0 ; i < $count; i++){
            $getValues = [
                $rows.eq(i).children().eq(2).children().eq(0).val(),
                $rows.eq(i).children().eq(2).children().eq(1).val(),
            ];
            $values.push($getValues);
        }


        $.ajax({
            url: '/updatePrice',
            type: 'GET',
            data: {quantity: $quantity, productID: $productID, values: $values, totalPriceValue: totalPriceValue},
            dataType: 'json',
            success: function(data){
                $that.parent().next().html(data.price);
                $('#totalPrice #outputPrice').html(data.totalPrice + ' L.E' );
                $('#totalPrice #outputPrice').next().val(data.totalPrice);
                // console.log(data)
            }
        });
        // console.log($values);
    });


    $('#cartQuantityMinus').on('click', function () {
        alert('cartQuantityMinus');
    });

    $('#cartQuantityPlus').on('click', function () {
        alert('cartQuantityPlus');
    });

});
// (function ($) {
//   $(document).ready(function($){ 
//       $('.changeOrderStatus').on('click', function () {
//                     console.log("here");
//         var orderID = $(this).data('orderid'),
//             orderStatus = $(this).data('orderstatus'),
//             model = $('#m_modal_2');

//         model.find('.modal-footer #orderID').val(orderID);
//         model.find('.modal-footer #orderStatus').val(orderStatus);
//         // console.log(orderID + '=> ' + orderStatus );
//     });
// });
// })(jQuery);
