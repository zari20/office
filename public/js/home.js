$(document).ready(function () {
    //flash messages
    $('.flash').delay(5000).fadeOut(1000);

    //commo
    $(document).on('keyup','input.commo',function(event) {
        if(event.which >= 37 && event.which <= 40 && event.which != 8) return;
        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
        });
    });

    //attempt to delete or do something denagerous
   $('button.delete, button.dangerous').click(function () {
       var form = $(this).parent();
       form.addClass('formToBeSubmitted');
       $('.areYouSure').slideDown();
   });
   //yes
   $(document).on('click','button#yes',function () {
       $('.formToBeSubmitted').submit();
   });
   $(document).on('click','button#no',function () {
       $('form').removeClass('formToBeSubmitted');
       $('.areYouSure').slideUp();
   });

    //clone links
    $('#addLink').click(function () {
        $('.link:first').clone().removeClass('hidden').appendTo('div.update');
    });

    //clone
    $('.cloner').click(function () {
        $('.to-be-cloned:first').clone().appendTo('.clone-box');
    });
    $('.cloner-2').click(function () {
        $('.to-be-cloned-2:first').clone().appendTo('.clone-box-2');
    });

    //color dashboard buttons
    $('.dashbaord-button').click(function () {
        $('.dashbaord-button').removeClass('bg-yellow').addClass('bg-blue');
        $(this).removeClass('bg-blue').addClass('bg-yellow');
    });

    //color input type
    $('input[type=color]').change(function () {
        var color = $(this).val();
        $(this).css('background-color',color);
    });
});


// commo
function commo(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function rc(x) {
    return parseInt(x.replace(/,/g , ''));
}

//helper functions
function isInt(value) {
  return !isNaN(value) &&
         parseInt(Number(value)) == value &&
         !isNaN(parseInt(value, 10));
}

function remove(element) {
    element.remove();
}

$(document).on('click','.delete-cloned',function () {
    $(this).parents('.to-be-cloned').remove();
});
$(document).on('click','.delete-cloned-2',function () {
    $(this).parents('.to-be-cloned-2').remove();
});
