$(document).ready(function () {

    //inits
    $('[title]').tooltip();
    $('[data-toggle="popover"]').popover();
    $('[data-calendar="persian"]').persianDatepicker();
    $('.select2').select2({
       width: '100%',
    });

    //card-number autofocus
    $(".card-numbers input").keyup(function () {
        var length = $(this).val().length;
        if (length==4) {
            if ($(this).is(':last-child')) {
                $('#owner-name').focus();
            }else {
                $(this).next('.card-numbers input').focus();
            }
        }
    });
});

$(document).on('click','#jq-print',function () {
    var element = $('<div dir="rtl"></div>');
    $('.jqprint').each(function () {
        element.append($(this).clone());
    });
    element.print();
});

function pricingBox() {

    //styling changes
    $('#reserve-submit-box').css('padding-bottom','100px');
    $('#pricing-box').removeClass('d-none');


    //rooms
    var cost = $('select#room-type').find(":selected").attr('data-cost');
    var hours = $('#room-hours').val();
    var roomsCost = hours*cost;

    //services

    //total
    var totalCost = roomsCost + 0;

    //update html
    $('#pricing-room').html(roomsCost.toLocaleString());
    for (var i = 0; i < services.length; i++) {
        $('#pricing-service-'+services[i]).html(0);
    }
    $('#pricing-total').html(totalCost.toLocaleString());
}

function sendAjax(method,formData,target){

    var token = $('input[name="_token"]').val();
    formData._token = token;

    var url = documentRoot+'/ajax/'+method;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data) {
            if(target && data) target.html(data);
            $('[data-calendar="persian"]').persianDatepicker();
            $('.select2').select2({
                width: '100%',
            });
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("این فیلد نمیتواند خالی باشد");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
