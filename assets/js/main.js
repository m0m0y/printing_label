$(function(){
    $('#submit').on('click', function(){
        var order_referenceNo = $('#order_referenceNo').val();
        var our_referenceNo = $('#our_referenceNo').val();
        var ship_address = $('#ship_address').val();
        var order_date = $('#order_date').val();
        var package = $('#package').val();
        var print_date = $('#print_date').val();
        var ship_via = $('#ship_via').val();
        var remarks = $('#remarks').val();
        var customer_name = $('#customer_name').val();
    
        if (order_referenceNo == "" || our_referenceNo == "" || ship_address == "" || order_date == "" || package == "" || print_date == "" || ship_via == "" || customer_name == "") {
            toastAlert();
        } else {
            var url = "tcpdf/examples/shipping_label.php?a="+order_referenceNo+"&b="+our_referenceNo+"&c="+ship_address+"&d="+order_date+"&e="+package+"&f="+print_date+"&g="+ship_via+"&h="+remarks+"&i="+customer_name;
    
            window.open(url);
        }
    
    });

    submitWatsonStickerLabel();
});

function submitWatsonStickerLabel() {
    $('#submitt').on('click', function() {
        var supplier_name = $('#supplier_name').val();
        var po_number = $('#po_number').val();
        var si_number = $('#si_number').val();
        var date = $('#date').val();
        var quantity = $('#quantity').val();
        var description = $('#description').val();

        if (supplier_name == "" || po_number == "" || si_number == "" || date == "" || quantity == "" || description == "") {
            toastAlert();
        } else {
            var url = "tcpdf/examples/watsonStickerLabel.php?a="+supplier_name+"&b="+po_number+"&c="+si_number+"&d="+date+"&e="+quantity+"&f="+description;

            window.open(url);
        }
    });
}

function toastAlert() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
    })
    
    Toast.fire({
        icon: 'info',
        title: 'Please double check the required fields!'
    })
}
