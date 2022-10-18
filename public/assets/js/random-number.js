// get random lottery number
$(document).on('click','.random_number',function(event) {
    // prevent default action
    event.preventDefault();

    // make an ajax call
    $.ajax({
        url: "/random_number",
        success:function(res)
        {
            $('.lottery_number').val(res); // add random lottery number
        }
    });
})