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

$(document).on('change','select#room-type',function () {
    changeRoom();
    getCalendar();
})

$(document).on('change','#schedule-date',function () {
    getCalendar();
})

function getCalendar() {
    var roomId = $('select#room-type').val();
    var date = $('#schedule-date').val();
    var formData = {room_id:roomId, date:date};
    var target = $('div#schedule-calendar');
    sendAjax('get_calendar',formData,target)
}

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
}


function changeService(element) {
    var value = element.val();
    var type = element.attr('id');

    //costs
    $('.'+type+'-cost').hide();
    $('#'+type+'-cost-'+value).show();

    //descriptions
    $('.'+type+'-description').hide();
    $('#'+type+'-description-'+value).show();

    //final cost
    var count = $('#'+type+'-count').val();
    var base = element.find(":selected").attr('data-cost');
    $('#'+type+'-final-cost').val(count*base);
}

function changeCount(element) {
    var type = element.attr('data-type');
    var count = element.val();
    var base = $('select#'+type).find(":selected").attr('data-cost');
    $('#'+type+'-final-cost').val(count*base);
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
