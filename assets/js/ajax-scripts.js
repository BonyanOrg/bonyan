(function ($) {
    $("#donate_now_btn").on("click", function () {
        $("#give_form_container").remove();
        let form_id = $(this).attr("data-form_id");
        let amount = $(this).attr("data-amount");
        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "show_donate_form",
                form_id: form_id,
                amount: amount,
            },
            statusCode: {
                400: function (data) {

                },
                200: function (data) {
                    // $("#give_form_container").remove();
                    // $(".give-wp-container").append(`<div id="give_form_container"> ${data.give_form} </div>`);
                    $("body").append(`<div id="give_form_container"> ${data.give_form} </div>`);

                },
            },

        });
    });

})(jQuery);