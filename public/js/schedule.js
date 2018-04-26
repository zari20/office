function book(peridId) {

    var periodDiv = $('#period-'+peridId);
    var icon = periodDiv.find('i');
    var time = periodDiv.attr('data-time');

    if (periodDiv.hasClass('alert-primary')) {
        $('#schedule-inputs').append('<input type="hidden" name="periods[]" value="'+peridId+'" data-time="'+time+'" id="period-input-'+peridId+'">');
    }else {
        $('#schedule-inputs').find('#period-input-'+peridId).remove();
    }

    icon.toggleClass('fa-square-o fa-check-square-o');
    periodDiv.toggleClass('alert-primary alert-success');

    setHours();
}

function setHours() {
    var inputs = $('#schedule-inputs input');
    var total = 0;
    inputs.each(function () {
        total += parseInt($(this).attr('data-time'));
    });
    $('input[name=hours]').val(total);
    calculateRoomMoney();
}

function calculateRoomMoney() {
    var count = $('input[name=hours]').val();
    var base = $('select#room').find(":selected").attr('data-cost');
    $('#room-final-cost').val(count*base);
}
