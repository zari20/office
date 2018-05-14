function modelChange(element) {

    //find div
    var div = element.parents('#model-row');

    //necessary variables
    var countable = div.find('option:selected').attr('data-countable');
    var cost = div.find('option:selected').attr('data-cost');
    var value = div.find('select').val();
    var count = countable == 1 ? div.find('.model-count').val() : 1;

    //countable or not
    if (!value || countable == 1) {
        div.find('#model-count-field').show();
    }else {
        div.find('#model-count-field').hide();
    }

    //update cost
    var total = value ? count*cost : 0;
    div.find('.model-row-cost').val(total);

    //pricing box
    pricingBox();
}

function changeCount(element) {
    var div = element.parents('#model-row');
    var count = div.find('.model-count').val();
    var cost = div.find('option:selected').attr('data-cost');
    var value = div.find('select').val();
    var total = value ? count*cost : 0;
    div.find('.model-row-cost').val(total);
    //pricing box
    pricingBox();
}

function newModelRow(serviceId) {
    var div = $('[data-service-type='+serviceId+']').last();
    var rowNumber = div.attr('data-row');
    div.clone().attr('data-row',parseInt(rowNumber)+1).appendTo('#model-rows-'+serviceId);
    $('#trash-icon-'+serviceId).show();
    //pricing box
    pricingBox();
}

function removeModelRow(serviceId) {
    var div = $('[data-service-type='+serviceId+']').last();
    if(div.attr('data-row') != 1){
        div.remove();
    }
    if ($('[data-service-type='+serviceId+']').length < 2) {
        $('#trash-icon-'+serviceId).hide();
    }
    //pricing box
    pricingBox();
}
