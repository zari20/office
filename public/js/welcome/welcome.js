$(document).ready(function () {

    $('[data-toggle=tooltip]').tooltip();

    hideOrShowSectionInputs('five_col');

    //english inputs
    $('input[lang=en]').keypress(function(event){
        var ew = event.which;
        if(ew == 32)
            return true;
        if(48 <= ew && ew <= 57)
            return true;
        if(65 <= ew && ew <= 90)
            return true;
        if(97 <= ew && ew <= 122)
            return true;
        return false;
    });

    //color input type
    $('input[type=color]').change(function () {
        var color = $(this).val();
        $(this).css('background-color',color);
    });


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

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-tooltip="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
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

function changeSectionPhoto(type) {
    $('#section-img').attr('src','welcome_images/'+type+'.png');
    hideOrShowSectionInputs(type);
}

function hideOrShowSectionInputs(type) {
    if(type=='slider'){
        $('.section-title').hide();
        $('.section-cols').hide();
    } else if(type=='five_col' || type=='blog') {
        $('.section-title').show();
        $('.section-cols').hide();
    }else {
        $('.section-title').show();
        $('.section-cols').show();
    }
}

$(document).on('click','.delete-cloned',function () {
    $(this).parents('.to-be-cloned').remove();
});
$(document).on('click','.delete-cloned-2',function () {
    $(this).parents('.to-be-cloned-2').remove();
});
