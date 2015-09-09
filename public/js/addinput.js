$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".fields1"); //Fields wrapper
    var wrapper2         = $(".moreForms"); //Fields wrapper
    var wrapper3         = $(".aaa"); //Fields wrapper
    var add_button      = $(".addButton"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();

        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper2).append(wrapper.clone()); //add input box
            $('.addButton').last().remove();
            $('.aaa').last().append('<button class="btn btn-danger fa fa-minus remove_field" type="button" name="button"></button>'); //add input box
$('.selectpicker').selectpicker('refresh');
$('.bootstrap-select').last().remove();
        }
    });
/**    $(wrapper3).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })**/
    $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
