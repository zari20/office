function book(periodId) {

    var periodDiv = $('#period-'+periodId);
    var icon = periodDiv.find('i');
    var time = periodDiv.attr('data-time');
    var date = periodDiv.attr('data-date');

    if (periodDiv.hasClass('alert-primary')) {
        $('#schedule-inputs').append('<input type="hidden" name="period[id][]" value="'+periodId+'" id="period-id-input-'+periodId+'">');
        $('#schedule-inputs').append('<input type="hidden" name="period[date][]" value="'+date+'" id="period-date-input-'+periodId+'">');
        $('#schedule-inputs').append('<input type="hidden" name="period[hours][]" class="hidden-hours" value="'+time+'" id="period-time-input-'+periodId+'">');
    }else {
        $('#schedule-inputs').find('#period-id-input-'+periodId).remove();
        $('#schedule-inputs').find('#period-date-input-'+periodId).remove();
        $('#schedule-inputs').find('#period-time-input-'+periodId).remove();
    }

    icon.toggleClass('fa-square-o fa-check-square-o');
    periodDiv.toggleClass('alert-primary alert-success');

    setHours();
}

function getCalendar(type) {
    var roomId = $('select#room-type').val();
    var date = $('#schedule-date').val();
    var formData = {room_id:roomId, date:date, type:type};
    var target = $('div#schedule-section');
    sendAjax('get_calendar',formData,target);
}

function setHours() {
    var inputs = $('#schedule-inputs .hidden-hours');
    var total = 0;
    inputs.each(function () {
        total += parseInt($(this).val());
    });
    $('input#room-hours').val(total);
    roomCost();
}

function roomCost() {
    var cost = $('select#room-type').find(":selected").attr('data-cost');
    var hours = $('#room-hours').val();
    $('#room-final-cost').val(hours*cost);
    pricingBox();
}
