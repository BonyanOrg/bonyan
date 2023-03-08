(function ($) {
    var getLang;
    switch (getLang) {
        // Arabic
        case 'ar':
            datatableLang = {
                lengthMenu: "عرض _MENU_ مدخلات في كل صفحة",
                zeroRecords: "لايوجد شيء - عذراً",
                info: "اظهار صفحة _PAGE_ من _PAGES_",
                infoEmpty: "لايوجد شيء",
                infoFiltered: "(تمت تصفيته من _MAX_ إجمالي السجلات)",
                search: "بحث عن: ",
                zeroRecords: "لم يتم العثور على سجلات مطابقة",
            };

            generalMsgs = {
                invalidNumber: "الرقم غير صالح",
                onlyEnglishNumbers: "يمكنك إدخال ارقام انجليزية فقط",
                wrong_password: "كلمة المرور غير متطابقة",
                successful_login: "تم تسجيل الدخول بنجاح",
                successful_register: "تم تسجيل الدخول بنجاح",
                fill_inputs: "الرجاء تعبئة جميع الحقول",
                saved_successfully: "تم حفظ المعلومات بنجاح"
            }
            break;

        // Turkish
        case 'tr-TR':
            datatableLang = {
                lengthMenu: "Sayfa başına _MENU_ kaydı görüntüle",
                zeroRecords: "Affedersin - gösterilecek bir şey yok",
                info: "_PAGES_ sayfadan _PAGE_ sayfası gösteriliyor",
                infoEmpty: "Kayıt yok",
                infoFiltered: "(_MAX_ toplam kayıttan filtrelendi)",
                search: "Ara: ",
                zeroRecords: "Eşleşen kayıt bulunamadı",
            }

            generalMsgs = {
                invalidNumber: "Geçersiz numara",
                onlyEnglishNumbers: "Yalnızca İngilizce sayıları girebilirsiniz",
                wrong_password: "Parola eşleşmiyor!",
                successful_login: "Giriş başarıyla yapıldı",
                successful_register: "Hesap başarıyla kaydedildi",
                fill_inputs: "Lütfen alanları doldurun",
                saved_successfully: "Bilgiler başarıyla kaydedildi"
            }
            break;

        // English (Default)
        default: {
            generalMsgs = {
                invalidNumber: "Invalid Number",
                onlyEnglishNumbers: "You can enter English numbers only",
                wrong_password: "Password Doesn't Match!",
                successful_login: "Logged in successfully",
                successful_register: "Registered successfully",
                fill_inputs: "Please fill the fields",
                saved_successfully: "Information saved successfully"
            }
        }
    }





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



    //=====[Save User Account Details]=====//
    const fileInput = document?.getElementById('user-avatar-input');
    function returnFileSize(number) {
        if (number < 1024) {
            return `${number} bytes`;
        } else if (number >= 1024 && number < 1048576) {
            return `${(number / 1024).toFixed(1)} KB`;
        } else if (number >= 1048576) {
            return `${(number / 1048576).toFixed(1)} MB`;
        }
    }
    function reset_user_avatar() {
        document.getElementById('user-avatar-input').value = "";
        document.getElementById('user-avatar').src = "https://via.placeholder.com/180x180";
    }


    if (fileInput != null) {
        fileInput.addEventListener("change", function () {
            const file = fileInput.files;
            // alert
            if (file.length > 1) {
                alert("Please select just one image");
                reset_user_avatar();
            }
            // alert
            if (file[0].size > 2000000) {
                alert("Max size is 2 MB" + ", your image size is " + returnFileSize(file[0].size));
                reset_user_avatar();

            }

            // On success
            if (file.length == 1 && file[0].size < 2000000) {
                document.getElementById('user-avatar').src = URL.createObjectURL(file[0]);
            }

        });
    }

    $("#save-user-information-edit").on("click", function () {
        var formData = new FormData();
        const fileInput = document.getElementById('user-avatar-input');
        const file = fileInput.files;
        let user_FirstName = document.getElementById('first-name-input');
        let user_LastName = document.getElementById('last-name-input');
        let user_mobile_number = document.getElementById('phone-input');
        let user_Email = document.getElementById('email-input');
        let user_Website = document.getElementById('website-input');
        let user_birth_date = document.getElementById('birth-date-input');
        let user_age = document.getElementById('age-input');
        // let user_country = document.getElementById('country-input');
        // let user_city = document.getElementById('city-input');
        // let user_address = document.getElementById('address-input');
        let user_facebook = document.getElementById('facebook-input');
        let user_instagram = document.getElementById('instagram-input');
        let user_twitter = document.getElementById('twitter-input');

        if (file.length == 1) {
            if (file.length > 1) {
                alert("Please select just one image");
                reset_user_avatar();
            }
            if (file[0].size > 2000000) {
                alert("Max size is 2 MB" + ", your image size is " + returnFileSize(file[0].size));
                reset_user_avatar();
            }
            formData.append("user_image", file[0]);
        }
        // Fill Form Data
        formData.append("user_FirstName", user_FirstName.value);
        formData.append("user_LastName", user_LastName.value);
        formData.append("user_mobile_number", user_mobile_number.value);
        formData.append("user_Email", user_Email.value);
        formData.append("user_Website", user_Website.value);
        formData.append("user_birth_date", user_birth_date.value);
        formData.append("user_age", user_age.value);
        // formData.append("user_country", user_country.value);
        // formData.append("user_city", user_city.value);
        // formData.append("user_address", user_address.value);
        formData.append("user_facebook_url", user_facebook.value);
        formData.append("user_instagram_url", user_instagram.value);
        formData.append("user_twitter_url", user_twitter.value);
        formData.append("nonce", ajax_script_object.nonce);
        formData.append("action", 'save_user_account_details');

        $('.loader').css('display', 'flex');

        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            processData: false,
            contentType: false,
            data: formData,
            statusCode: {
                400: function (data) {
                    toastr.error(data.responseJSON.error_message);
                    $('.loader').css('display', 'none');
                },

                200: function (data) {
                    $('.loader').css('display', 'none');
                    toastr.success(generalMsgs.saved_successfully);
                    $('#my-account').removeClass('edit-mode-active');
                    user_FirstName = data.user_FirstName;
                    user_LastName = data.user_LastName;
                    user_mobile_number = data.user_mobile_number;
                    user_Email = data.user_Email;
                    user_Website = data.user_Website;
                    user_birth_date = data.user_birth_date;
                    user_age = data.user_age;
                    // user_country = data.user_country;
                    // user_city = data.user_city;
                    // user_address = data.user_address;
                    user_facebook_url = data.user_facebook_url;
                    user_instagram_url = data.user_instagram_url;
                    user_twitter_url = data.user_twitter_url;


                    document.querySelector('.user-first-name p').textContent = user_FirstName;
                    document.querySelector('.user-last-name p').textContent = user_LastName;
                    document.querySelector('.user-mobile-number p').textContent = user_mobile_number;
                    document.querySelector('.user-email-address p').textContent = user_Email;
                    document.querySelector('.user-website p').textContent = user_Website;
                    document.querySelector('.user-birth-date p').textContent = user_birth_date;
                    document.querySelector('.user-age p').textContent = user_age;
                    // document.querySelector('.user-country p').textContent = user_country;
                    // document.querySelector('.user-city p').textContent = user_city;
                    // document.querySelector('.user-address p').textContent = user_address;
                    document.querySelector('.user-social-facebook a').href = user_facebook_url;
                    document.querySelector('.user-social-instagram a').href = user_instagram_url;
                    document.querySelector('.user-social-twitter a').href = user_twitter_url;
                },
            },

        });
    });
    //=====[Save User Account Details END]=====//



    //=====[Login & Registration Process START]=====//
    $("#login_form").on("submit", function (e) {
        e.preventDefault();


        let user_email = $("#user_email").val();
        let user_password = $("#user_password").val();
        if (user_email == "" || user_password == "") {
            toastr.warning(generalMsgs.fill_inputs);
            return;
        }


        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "custom_login",
                nonce: ajax_script_object.nonce,
                user_email: user_email,
                user_password: user_password,
            },
            statusCode: {
                400: function (data) {
                    toastr.error(data.responseJSON.error_message);
                    $('.loader').css('display', 'none');
                },

                200: function (data) {
                    toastr.success(generalMsgs.successful_login);
                    window.location = data.return_url;
                },
            },
        });
    });

    $("#registration_form").on("submit", function (e) {
        e.preventDefault();
        // $('input').blur();

        // $(this).find('button').prop("disable", true);
        let registration_user_first_name = $("#registration_user_first_name").val();
        let registration_user_last_name = $("#registration_user_last_name").val();
        let registration_user_email = $("#registration_user_email").val();
        let registration_user_gender = document.querySelector('input[name="gender"]:checked').id;
        let registration_user_age = $("#registration_user_age").val();
        let registration_user_birth_date = $("#registration_user_birth_date").val();
        let registration_user_password = $("#registration_user_password").val();
        let registration_user_password_confirm = $("#registration_user_password_confirm").val();
        if (
            registration_user_first_name == "" ||
            registration_user_last_name == "" ||
            registration_user_email == "" ||
            registration_user_gender == "" ||
            registration_user_age == "" ||
            registration_user_birth_date == "" ||
            registration_user_password == "" ||
            registration_user_password_confirm == ""
        ) {
            toastr.warning(generalMsgs.fill_inputs);
            return;
        }
        if (registration_user_password !== registration_user_password_confirm) {
            toastr.warning(generalMsgs.wrong_password);
            return;
        }

        $('.loader').css('display', 'flex');

        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "custom_registration",
                nonce: ajax_script_object.nonce,
                registration_user_first_name: registration_user_first_name,
                registration_user_last_name: registration_user_last_name,
                registration_user_email: registration_user_email,
                registration_user_gender: registration_user_gender,
                registration_user_age: registration_user_age,
                registration_user_birth_date: registration_user_birth_date,
                registration_user_password: registration_user_password,
                registration_user_password_confirm: registration_user_password_confirm,
            },
            statusCode: {
                400: function (data) {
                    $('.loader').css('display', 'none');
                    toastr.error(data.responseJSON.error_message);
                },
                200: function (data) {
                    $('.loader').css('display', 'flex');
                    toastr.success(generalMsgs.successful_register);
                    window.location = data.return_url;
                },
            },
        });
    });

    //=====[Login & Registration Process END]=====//


    //=====[Give Donations Getter START]=====//

    let dataTableInit = false;
    let recurringDataTableInit = false;
    let isOpened = false;
    let arLang;
    $("#user-donations-tab").on("click", function () {
        if (dataTableInit == true) { return; }

        if (getDir) {
            arLang = {
                lengthMenu: "عرض _MENU_ مدخلات في كل صفحة",
                zeroRecords: "لايوجد شيء - عذراً",
                info: "اظهار صفحة _PAGE_ من _PAGES_",
                infoEmpty: "لايوجد شيء",
                infoFiltered: "(تمت تصفيته من _MAX_ إجمالي السجلات)",
                search: "بحث عن: ",
                zeroRecords: "لم يتم العثور على سجلات مطابقة",
            };
        }

        if (!isOpened) {
            $('.loader').css('position', 'relative');
            $('.loader').css('height', '200px');
            $('.loader').css('display', 'flex');
            $.ajax({
                dataType: "json",
                method: "POST",
                url: ajax_script_object.ajaxurl,
                data: {
                    action: "get_user_donations",
                },
                statusCode: {
                    400: function (data) {
                        toastr.error(data.responseJSON.error_message);

                        $('.loader').css('position', 'absolute');
                        $('.loader').css('height', '100%');
                        $('.loader').css('display', 'none');
                    },
                    200: function (data) {
                        $('.loader').css('position', 'absolute');
                        $('.loader').css('height', '100%');
                        $('.loader').css('display', 'none');

                        $('.loading-recurring').css('position', 'relative');
                        $('.loading-recurring').css('height', '200px');
                        $('.loading-recurring').css('display', 'flex');

                        dataTableInit = true;
                        $(".donations-container").append($(data.HTML_Output));
                        let donationTable = $('#donations-table');

                        let windowWidth = $(window).innerWidth();
                        let isResponsive = false;


                        if (windowWidth <= 992) {
                            isResponsive = true;
                        }

                        if (donationTable.length > 0) {
                            donationTable.DataTable({
                                "dom": 'rtip',
                                "paging": true,
                                "pageLength": 5,
                                "searching": false,
                                order: [[3, 'desc']],

                                responsive: isResponsive,

                                "language": {
                                    ...arLang,
                                    "paginate": {
                                        "next": "<div></div>",
                                        "previous": "<div></div>"
                                    }
                                },

                                columnDefs: [{
                                    targets: 3,
                                    render: function (data) {

                                        var status = '';

                                        if (data.includes('Complete') || data.includes('مكتمل') || data.includes('başarılı')) {
                                            status = 'publish';
                                        }

                                        if (data.includes('Pending') || data.includes('بالانتظار') || data.includes('beklemekte')) {
                                            status = 'pending';
                                        }

                                        if (data.includes('Cancelled') || data.includes('ملغي') || data.includes('iptal')) {
                                            status = 'cancel';
                                        }

                                        if (data.includes('Failed') || data.includes('فشل') || data.includes('başarılı')) {
                                            status = 'failed';
                                        }

                                        if (data.includes('Abandoned') || data.includes('غير مكتمل') || data.includes('eksik')) {
                                            status = 'abandon';
                                        }

                                        return `<span class=${status}>${data}</span>`;
                                    }
                                }]
                            });
                        }

                        // Get Recurring Payments If Payments
                        if (recurringDataTableInit == true) { return; }
                        $.ajax({
                            dataType: "json",
                            method: "POST",
                            url: ajax_script_object.ajaxurl,
                            data: {
                                action: "get_user_recurring_donations",
                            },
                            statusCode: {
                                400: function (data) {
                                    // Return text with no recurring found
                                    $('.loading-recurring').css('position', 'absolute');
                                    $('.loading-recurring').css('height', '100%');
                                    $('.loading-recurring').css('display', 'none');
                                },
                                200: function (data) {
                                    recurringDataTableInit = true;
                                    $('.loading-recurring').css('position', 'absolute');
                                    $('.loading-recurring').css('height', '100%');
                                    $('.loading-recurring').css('display', 'none');

                                    $(".recurring-donations-container").append($(data.HTML_Output));
                                    let recurringDonationTable = $('#recurring-donation-table');

                                    if (recurringDonationTable.length > 0) {
                                        recurringDonationTable.DataTable({
                                            "dom": 'rtip',
                                            "paging": true,
                                            "pageLength": 5,
                                            "searching": false,

                                            responsive: isResponsive,

                                            "language": {
                                                ...arLang,
                                                "paginate": {
                                                    "next": "<div></div>",
                                                    "previous": "<div></div>"
                                                }
                                            },

                                            columnDefs: [{
                                                targets: 4,
                                                render: function (data) {
                                                    var status = '';

                                                    if (data.includes('Complete') || data.includes('مكتمل') || data.includes('başarılı')) {
                                                        status = 'publish';
                                                    }

                                                    if (data.includes('Pending') || data.includes('بالانتظار') || data.includes('beklemekte')) {
                                                        status = 'pending';
                                                    }

                                                    if (data.includes('Cancelled') || data.includes('ملغي') || data.includes('iptal')) {
                                                        status = 'cancel';
                                                    }

                                                    if (data.includes('Failed') || data.includes('فشل') || data.includes('başarılı')) {
                                                        status = 'failed';
                                                    }

                                                    if (data.includes('Abandoned') || data.includes('غير مكتمل') || data.includes('eksik')) {
                                                        status = 'abandon';
                                                    }

                                                    return `<span class=${status}>${data}</span>`;
                                                }
                                            }]
                                        });
                                    }

                                }
                            }


                        });


                    },
                },

            });
        }
        isOpened = true;

    });
    //=====[Give Donations Getter END]=====//


    // NEW
    $(".donation-btn").on('click', function () {
        $("#give_form_container").remove();
        let form_id = $(this).attr("data-giveformid");
        let amount = $(this).attr("data-amount");
        let tag_name = $(this).attr("data-tagName");


        if ((form_id == null || form_id == "")) {
            return;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "show_donate_form",
                nonce: ajax_script_object.nonce,
                type: (tag_name != null) ? "quick_donation" : "",
                form_id: form_id,
                amount: (amount != null) ? amount : 50,
                charity_type: tag_name,
            },
            statusCode: {
                400: function (data) {
                    toastr.error(data.responseJSON.error_message);

                },
                200: function (data) {
                    // $("#give_form_container").remove();
                    // $(".give-wp-container").append(`<div id="give_form_container"> ${data.give_form} </div>`);
                    $("#givewp-modal").append(`<div id="give_form_container"> ${data.give_form} </div>`);

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