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

    // ===== [[Add To Favorites START]]
    var keyPressTimeout, jqxhr = {
        abort: function () { }
    };
    let addToFavBtns = document.querySelectorAll('.add-to-fav');
    addToFavBtns?.forEach((addToFavBtn) => {

        addToFavBtn.addEventListener('click', function () {
            this.classList.toggle("is-fav");
            let campaign_id = this.getAttribute('data-id');
            // AJax
            (function ($) {
                jqxhr.abort();
                clearTimeout(keyPressTimeout);
                keyPressTimeout = setTimeout(function () {
                    jqxhr = $.ajax({
                        dataType: "json",
                        method: "POST",
                        url: ajax_script_object.ajaxurl,
                        data: {
                            action: "add_to_fav",
                            nonce: ajax_script_object.nonce,
                            user_id: ajax_script_object.user_id,
                            campaign_id: campaign_id,
                        },
                        statusCode: {
                            400: function (data) {

                            },
                            200: function (data) {

                            },
                        },
                    });
                }, 300);

            })(jQuery);



        });

    });


    // ===== [[Add To Favorites END]]

    $("#quick_donate_now_btn").on("click", function () {
        $("#give_form_container").remove();
        let form_id = $(this).attr("data-giveformid");
        let amount = $(this).attr("data-amount");
        let tag_name = $(this).attr("data-tagName");
        if ((form_id == null || form_id == "") || (amount == null || amount == "") || (tag_name == null || tag_name == "")) {
            alert("missing")
            return;
        }
        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "show_donate_form",
                nonce: ajax_script_object.nonce,
                type: "quick_donation",
                form_id: form_id,
                amount: amount,
                charity_type: tag_name,
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

    $("#charity_select").on("change", function () {
        if ($(this).val() == "") {
            $("#quick_donate_now_btn").attr('data-tagName', ""); // reset
            alert("No Campaign In This Charity")
            return;
        }
        $("#quick_donate_now_btn").attr('data-tagName', ""); // reset
        $("#quick_donate_now_btn").attr('data-tagName', $("#charity_select option:selected").text()); // set new value
        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "get_campaigns_by_tag_is",
                nonce: ajax_script_object.nonce,
                tag_id: $(this).val(),
            },
            statusCode: {
                400: function (data) {

                },
                200: function (data) {
                    $('#program_select').empty();
                    $.each(data.campaigns, function (i, item) {
                        if (i === 0) {
                            $("#quick_donate_now_btn").attr('data-giveformid', item.give_form_id);
                        }
                        $('#program_select').append($('<option>', {
                            value: item.give_form_id,
                            text: item.campaign_title
                        }));
                    });
                },
            },

        });
    });

    $('#program_select').on("change", function () {
        $("#quick_donate_now_btn").attr('data-giveformid', $(this).val());

    });



})(jQuery);