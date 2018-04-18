$(document).ready(function () {
    $('[title]').tooltip();
    $('[data-toggle="popover"]').popover();
    $('[data-calendar="persian"]').persianDatepicker();
    $('.select2').select2({
       width: '100%',
    });
});


function changeService(element) {
    var value = element.val();
    var type = element.attr('id');

    //costs
    $('.'+type+'-cost').hide();
    $('#'+type+'-cost-'+value).show();

    //descriptions
    $('.'+type+'-description').hide();
    $('#'+type+'-description-'+value).show();

    //capacity
    if (type=='room') {
        $('.'+type+'-capacity').hide();
        $('#'+type+'-capacity-'+value).show();
    }

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
