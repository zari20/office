$(document).ready(function () {
    $('[title]').tooltip();
    $('[data-toggle="popover"]').popover();
    $('[data-calendar="persian"]').persianDatepicker();
    $('.select2').select2({
       width: '100%',
    });
});

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
