function modelChange(serviceId,rowNumber) {

    //find div
    var div = $('[data-service-type='+serviceId+'][data-row='+rowNumber+']');

    //necessary variables
    var countable = div.find('option:selected').attr('data-countable');
    var cost = div.find('option:selected').attr('data-cost');
    var value = div.find('select').val();
    var count = countable == 1 ? div.find('#model-count').val() : 1;

    //countable or not
    if (!value || countable == 1) {
        div.find('#model-count-field').show();
        console.log('show');
    }else {
        div.find('#model-count-field').hide();
        console.log('hide');
    }

    //update cost
    var total = value ? count*cost : 0;
    div.find('#model-row-cost').val(total);
}

function changeCount(serviceId,rowNumber) {
    var div = $('[data-service-type='+serviceId+'][data-row='+rowNumber+']');
    var count = div.find('#model-count').val();
    var cost = div.find('option:selected').attr('data-cost');
    div.find('#model-row-cost').val(count*cost);
}

function newModelRow(serviceId) {
    var div = $('[data-service-type='+serviceId+']').last();
    var rowNumber = div.attr('data-row');
    console.log(rowNumber);
    div.clone().attr('data-row',parseInt(rowNumber)+1).appendTo('#model-rows-'+serviceId);
    $('#trash-icon-'+serviceId).show();
}

function removeModelRow(serviceId) {

}
