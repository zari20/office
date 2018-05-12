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

$(document).on('change','select#room-type',function () {
    changeRoom();
    getCalendar('current');
});

$(document).on('click','.show-password',function () {
    $(this).toggleClass('fa-eye fa-eye-slash');
    var input = $(this).siblings('input');
    var attr = input.attr('type');
    if (attr == 'text') {
        input.attr('type','password')
    }else {
        input.attr('type','text')
    }
});

function changeRoom() {
    var id = $('select#room-type').val();
    $('.room-cost').hide(); $('.room-capacity').hide(); $('.room-description').hide();
    $('#room-cost-'+id).show(); $('#room-capacity-'+id).show(); $('#room-description-'+id).show();
    roomCost();
}

function roomCost() {
    var cost = $('select#room-type').find(":selected").attr('data-cost');
    var hours = $('#room-hours').val();
    $('#room-final-cost').val(hours*cost);
    pricingBox();
}


function changeService(element) {

    var rowNumber = element.parents('[data-row]').attr('data-row');

    var value = element.val();
    var type = element.attr('id');

    //costs
    $('.'+type+'-cost').hide();
    $('#'+type+'-cost-'+value).show();

    //descriptions
    $('.'+type+'-description').hide();
    $('#'+type+'-description-'+value).show();

    //final cost
    var count = $('[data-service-type='+type+'][data-row='+rowNumber+']').find('#'+type+'-count').val();
    var base = element.find(":selected").attr('data-cost');
    $('[data-service-type='+type+'][data-row='+rowNumber+']').find('#'+type+'-final-cost').val(count*base);

    //pricing box
    pricingBox();
}

function changeCount(element) {
    var type = element.attr('data-type');
    var count = element.val();
    var rowNumber = element.parents('[data-row]').attr('data-row');
    var base = $('select#'+type).find(":selected").attr('data-cost');
    $('[data-service-type='+type+'][data-row='+rowNumber+']').find('#'+type+'-final-cost').val(count*base);
    pricingBox();
}


function newServiceRow(type) {
    var element = $('[data-service-type='+type+']').last();
    var rowNumber = element.attr('data-row');
    element.clone().attr('data-row',parseInt(rowNumber)+1).appendTo('#'+type+'-service-rows');
    $('#'+type+'-trash-icon').show();
    pricingBox();
}

function removeServiceRow(type) {
    var element = $('[data-service-type='+type+']').last();
    if(element.attr('data-row') != 1){
        element.remove();
    }
    if ($('[data-service-type='+type+']').length < 2) {
        $('#'+type+'-trash-icon').hide();
    }
}

function pricingBox() {

    //styling changes
    $('#reserve-submit-box').css('padding-bottom','100px');
    $('#pricing-box').removeClass('d-none');


    //rooms
    var cost = $('select#room-type').find(":selected").attr('data-cost');
    var hours = $('#room-hours').val();
    var roomsCost = hours*cost;

    //caterings
    var cateringsCost = 0;
    $('.catering-final-cost').each(function () {
        cateringsCost += parseInt($(this).val());
    });

    //media
    var mediaCost = 0;
    $('.medium-final-cost').each(function () {
        mediaCost += parseInt($(this).val());
    });

    //graphics
    var graphicsCost = 0;
    $('.graphic-final-cost').each(function () {
        graphicsCost += parseInt($(this).val());
    });

    //informings
    var informingsCost = 0;
    $('.informing-final-cost').each(function () {
        informingsCost += parseInt($(this).val());
    });

    //total
    var totalCost = roomsCost + cateringsCost + mediaCost + graphicsCost + informingsCost;

    //update html
    $('#pricing-room').html(roomsCost.toLocaleString());
    $('#pricing-catering').html(cateringsCost.toLocaleString());
    $('#pricing-medium').html(mediaCost.toLocaleString());
    $('#pricing-graphic').html(graphicsCost.toLocaleString());
    $('#pricing-informing').html(informingsCost.toLocaleString());
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
