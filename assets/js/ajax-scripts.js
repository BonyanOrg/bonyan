(function ($) {
    var getLang = document.documentElement.lang;
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
                saved_successfully: "تم حفظ المعلومات بنجاح",
                adding_to_fav: "جاري أضافة الحملة إلى المفضلة",
                removing_from_fav: "جاري ازالة الحملة من المفضلة...",
                Choose_the_program: "اختر برنامج",
                subscription_cancel_alert_title: 'هل أنت متأكد؟',
                subscription_cancel_alert_text: 'سيتم إلغاء الاشتراك بشكل نهائي !',
                subscription_cancel_alert_confirm_btn_text: 'نعم، إلغاء !',
                subscription_cancel_alert_cancel_btn_text: 'لا تهتم',
                subscription_cancel_alert_cancel_success_mesg: 'تم إلغاء الاشتراك بنجاح',

            }
            break;

        // Turkish
        case 'es':
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
                saved_successfully: "Bilgiler başarıyla kaydedildi",
                adding_to_fav: "",
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
                saved_successfully: "Information saved successfully",
                adding_to_fav: "Adding the campaign from favorites...",
                removing_from_fav: "Removing the campaign from favorites...",
                Choose_the_program: "Choose the program",
                subscription_cancel_alert_title: 'Are you sure?',
                subscription_cancel_alert_text: 'Subscription will be permanently cancelled !',
                subscription_cancel_alert_confirm_btn_text: 'Yes, cancel it!',
                subscription_cancel_alert_cancel_btn_text: 'Nevermind',
                subscription_cancel_alert_cancel_success_mesg: 'Subscription canceled successfully',

            }
        }
    }

    // ===== [[START Add To Favorites]]
    function addEventlistenerToFavIcons() {
        var keyPressTimeout, jqxhr = {
            abort: function () { }
        };
        let addToFavBtns = document.querySelectorAll('.add-to-fav');
        addToFavBtns?.forEach((addToFavBtn) => {

            addToFavBtn.addEventListener('click', function () {
                if (this.classList.contains("is-fav")) {
                    if (this.getAttribute('data-isDonorDashboard') == "true") {
                        this.parentElement.style.transition = '.3s all ease-in-out';
                        this.parentElement.style.opacity = '0';
                        setTimeout(() => {
                            this.parentElement.style.display = "none";
                        }, 300);
                    }
                    toastr.info(generalMsgs.removing_from_fav);
                } else {
                    toastr.info(generalMsgs.adding_to_fav);
                }
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
                                    toastr.success(data.message);
                                },
                            },
                        });
                    }, 300);

                })(jQuery);



            });

        });
    }
    addEventlistenerToFavIcons();
    // ===== [[END Add To Favorites]]

    // ===== [[Start Add Event Listener for Modals]]
    /* ___Start Handle Modal___ */
    function handleModals() {
        let modalBtns = document.querySelectorAll('.user-action-btn');

        if (modalBtns !== null) {
            let targetedModalName;
            let targetedModal;
            let giveFormId;
            let amount;
            let charityTagName;

            modalBtns.forEach((modalBtn) => {
                modalBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    targetedModalName = modalBtn.getAttribute('data-target');
                    targetedModal = document.getElementById(targetedModalName);
                    giveFormId = this.getAttribute('data-giveformid');
                    amount = this.getAttribute('data-amount');
                    charityTagName = this.getAttribute('data-tagName');

                    // Check if this is donation button then check if the giveFormId not exist so don't open modal
                    if (modalBtn.classList.contains('donation-action') || modalBtn.classList.contains('donation-btn')) {
                        if (!giveFormId) {
                            toastr.warning('No form ID was found');
                            return;
                        }

                        let continueAsGuest = document.querySelector('.continue-as-guest');
                        continueAsGuest.setAttribute('data-giveformid', giveFormId);
                        continueAsGuest.setAttribute('data-amount', amount === null ? 50 : amount);
                        continueAsGuest.setAttribute('data-tagName', charityTagName);
                    }

                    if (targetedModal !== null) {
                        // If already a modal opened
                        if (document.body.classList.contains('modal-active')) {
                            document.querySelectorAll('.user-action-modal').forEach((userActionModal) => {
                                userActionModal.classList.remove('opened');
                                userActionModal.closest('body').classList.remove('modal-active');
                                userActionModal.style.display = 'none';
                                userActionModal.style.opacity = '0';
                                continueAsGuest.setAttribute('data-qurbandetails', " "); // Reset Qurban Details (for normal donations)
                            });
                        }

                        // Open
                        targetedModal.classList.add('opened');
                        targetedModal.closest('body').classList.add('modal-active');
                        targetedModal.style.display = 'flex';

                        setTimeout(() => {
                            targetedModal.style.opacity = '1';
                        }, 100);
                    }

                    // Close
                    if (targetedModal !== null) {
                        targetedModal.addEventListener('click', function (e) {
                            if (e.target.classList.contains(targetedModalName) || e.target.classList.contains('back-btn')) {
                                targetedModal.classList.remove('opened');
                                targetedModal.closest('body').classList.remove('modal-active');
                                targetedModal.style.opacity = '0';
                                document.querySelector('.continue-as-guest').setAttribute('data-qurbandetails', ""); // Reset Qurban Details (for normal donations on guest Mod)

                                setTimeout(() => {
                                    targetedModal.style.display = 'none';
                                }, 300);
                            }
                        });
                    }
                });
            });
        }
    }
    /* ___End Handle Modal___ */
    // ===== [[End Add Event Listener for Modals]]

    /* __Start Open Give Modal Confirmation  */
    $(document).ready(function () {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const donationAction = urlParams.get('giveDonationAction');

        if (donationAction !== null) {
            document.body.classList.add('modal-active');
            document.getElementById('givewp-modal-confirmation').style.display = "flex";
            document.getElementById('givewp-modal-confirmation').style.opacity = 1;
        }

        let giveModalConfirmation = document.getElementById('givewp-modal-confirmation');

        if (giveModalConfirmation !== null) {
            giveModalConfirmation.addEventListener('click', function () {
                if (document.body.classList.contains('modal-active')) {
                    giveModalConfirmation.style.opacity = 0;
                    giveModalConfirmation.style.display = "none";
                    document.body.classList.remove('modal-active');
                }
            });
        }
    });
    /* __End Open Give Modal Confirmation  */

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

        $('.loader').css('display', 'flex');

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
        //let registration_user_age = $("#registration_user_age").val();
        let registration_user_birth_date = $("#registration_user_birth_date").val();
        let registration_user_password = $("#registration_user_password").val();
        let registration_user_password_confirm = $("#registration_user_password_confirm").val();
        if (
            registration_user_first_name == "" ||
            registration_user_last_name == "" ||
            registration_user_email == "" ||
            registration_user_gender == "" ||
            //registration_user_age == "" ||
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
                //registration_user_age: registration_user_age,
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
                                order: [[2, 'desc']],

                                responsive: isResponsive,

                                "language": {
                                    ...arLang,
                                    "paginate": {
                                        "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                                        "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
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
                                        var recurringDataTable = recurringDonationTable.DataTable({
                                            "dom": 'rtip',
                                            "paging": true,
                                            "pageLength": 5,
                                            "searching": false,
                                            order: [[5, 'ASC']],

                                            responsive: isResponsive,

                                            "language": {
                                                ...arLang,
                                                "paginate": {
                                                    "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                                                    "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
                                                }
                                            },

                                            columnDefs: [{
                                                targets: 4,
                                                render: function (data) {
                                                    var status = '';

                                                    if (data.includes('Active') || data.includes('مفعل') || data.includes('başarılı')) {
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
                                            }],
                                            "initComplete": function (settings, json) { // For Desktop
                                                addEventListenerToCancelSubscription(recurringDataTable);
                                            }
                                        });
                                        $('#recurring-donation-table tbody').on('click', 'tr', function () { // For mobile And Responsive
                                            addEventListenerToCancelSubscription(recurringDataTable);

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

    //=====[Give Cancel Subscription Satart]=====//
    function addEventListenerToCancelSubscription(recurringDataTable) {
        $(".give-subscription-cancel").on('click', function () {
            var current_btn = $(this);
            var paymament_id = $(this).attr('data-payid'); // Get Payment ID

            Swal.fire({
                title: generalMsgs.subscription_cancel_alert_title,
                text: generalMsgs.subscription_cancel_alert_text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: generalMsgs.subscription_cancel_alert_confirm_btn_text,
                cancelButtonText: generalMsgs.subscription_cancel_alert_cancel_btn_text
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.loader').css('display', 'flex');
                    $.ajax({
                        dataType: "json",
                        method: "POST",
                        url: ajax_script_object.ajaxurl,
                        data: {
                            action: "cancel_give_sub",
                            nonce: ajax_script_object.nonce,
                            id: paymament_id
                        },
                        statusCode: {
                            400: function (data) {
                                $('.loader').css('display', 'none');
                                Swal.fire(
                                    "Something Wrong",
                                    data.responseJSON.error_massage,
                                    'error'
                                )
                            },
                            200: function (data) {
                                // Remove the Row From the Table
                                var row;
                                if ($(current_btn).closest('table').hasClass("collapsed")) {
                                    var child = $(current_btn).parents("tr.child");
                                    row = $(child).prevAll(".parent");
                                } else {
                                    row = $(current_btn).parents('tr');
                                }
                                if (row.length > 0) {
                                    recurringDataTable.row(row).remove().draw();
                                }

                                current_btn.remove(); // Remove Button From Mobile Responsive Table 
                                $("#cancel-sub-btn-" + paymament_id).remove(); // Remove Button From Desktop Table
                                $('.loader').css('display', 'none'); // Hide Loader
                                Swal.fire(
                                    generalMsgs.subscription_cancel_alert_cancel_success_mesg,
                                    '',
                                    'success'
                                )
                            },
                        },

                    });
                }
            });

        });
    }
    //=====[Give Cancel Subscription END]=====//

    // Show Give From From Ajax
    function giveWpGetter() {
        $(".donation-btn").on('click', function () {
            $("#givewp-modal").empty();
            let form_id = $(this).attr("data-giveformid");
            let amount = $(this).attr("data-amount");
            let tag_name = $(this).attr("data-tagName");
            let qurbanDetails = $(this).attr("data-qurbandetails");
            let continueAsGuest = document.querySelector('.continue-as-guest');

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
                    type: (tag_name != 'null' && tag_name != undefined) ? "quick_donation" : "",
                    form_id: form_id,
                    amount: (amount != null) ? amount : 50,
                    charity_type: tag_name,
                    groups_details: (qurbanDetails != "" && typeof qurbanDetails !== "undefined") ? JSON.parse(qurbanDetails) : "",
                },
                statusCode: {
                    400: function (data) {
                        toastr.error(data.responseJSON.error_message);
                        continueAsGuest.setAttribute('data-qurbandetails', ""); // reset qurbandetails (for normal donations)
                    },
                    200: function (data) {
                        $("#give_form_container").remove();
                        $("#givewp-modal").append(`<div id="give_form_container"> ${data.give_form} </div>`);
                        continueAsGuest.setAttribute('data-qurbandetails', ""); // reset qurbandetails (for normal donations)
                    },
                },

            });

        });
    }
    giveWpGetter();

    $("#charity_select").on("change", function () {
        if ($(this).val() == "") {
            $("#quick_donate_now_btn").attr('data-tagName', ""); // reset
            $('#program_select').empty();
            $('#program_select').append($('<option>', {
                value: "",
                text: generalMsgs.Choose_the_program
            }));
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

    let ajaxSearchInput = document.getElementById('ajax-search-input');
    // AJax
    (function ($) {
        var keyPressTimeout, jqxhr = {
            abort: function () { }
        };
        if (ajaxSearchInput !== null) {
            ajaxSearchInput.addEventListener('input', function () {
                //var page = 2;
                let taxonomyOfSearch = this.getAttribute('data-taxonomy');
                let termOfSearch = this.getAttribute('data-term');
                let CPTOfSearch = this.getAttribute('data-postType');
                let paged = this.getAttribute('data-paged');
                let searchWord = this.value;
                $('.cards-container').empty();
                $('.cards-container').append('<div class="loader" style="display: flex;"></div>');
                $('.cards-container').css('padding', '2rem 0');
                $('.pagination').hide();
                jqxhr.abort();
                clearTimeout(keyPressTimeout);
                keyPressTimeout = setTimeout(function () {
                    jqxhr = $.ajax({
                        dataType: "json",
                        method: "POST",
                        url: ajax_script_object.ajaxurl,
                        data: {
                            action: "get_search_result",
                            nonce: ajax_script_object.nonce,
                            paged: paged,
                            postType: CPTOfSearch,
                            taxonomy: taxonomyOfSearch,
                            term: termOfSearch,
                            s: searchWord,
                        },
                        statusCode: {
                            400: function (data) {
                                $('.cards-container').append(`<p style="font-size: 20px;" class="primary-color">${data.responseJSON.error_message}</p>`);
                                $('.loader').remove();
                            },
                            200: function (data) {
                                $('.cards-container').append(data.HTML_Output);
                                $('.loader').remove();
                                $('.cards-container').css('padding', '0');
                                addEventlistenerToFavIcons();
                                if (ajax_script_object.user_id != '') { // if user logged in
                                    giveWpGetter();
                                }
                                handleModals();
                                if (data.No_Search_Word) {
                                    $('.pagination').show();
                                }
                            },
                        },
                    });
                }, 300);

            });
        }
    })(jQuery);




    //=====[Modern Dashboard Satart]=====//
    let modern_DontionHistory_isOpened = false;
    let modern_DontionReacurring_isOpened = false;
    let modern_arLang;
    $("#donations-history-tab-btn").on("click", function () {

        let windowWidth = $(window).innerWidth();
        let isResponsive = false;


        if (windowWidth <= 992) {
            isResponsive = true;
        }
        if (getDir) {
            modern_arLang = {
                lengthMenu: "عرض _MENU_ مدخلات في كل صفحة",
                zeroRecords: "لايوجد شيء - عذراً",
                info: "اظهار صفحة _PAGE_ من _PAGES_",
                infoEmpty: "لايوجد شيء",
                infoFiltered: "(تمت تصفيته من _MAX_ إجمالي السجلات)",
                search: "بحث عن: ",
                zeroRecords: "لم يتم العثور على سجلات مطابقة",
            };
        }

        if (!modern_DontionHistory_isOpened) {

            $('.loader').css('display', 'flex');
            $('.loader').css('position', 'fixed');
            $.ajax({
                dataType: "json",
                method: "POST",
                url: ajax_script_object.ajaxurl,
                data: {
                    action: "get_user_modern_donations",
                },
                statusCode: {
                    400: function (data) {
                        toastr.error(data.responseJSON.error_message);

                        $('.loader').css('position', 'absolute');
                        $('.loader').css('height', '100%');
                        $('.loader').css('display', 'none');
                    },
                    200: function (data) {
                        $('.loader').css('display', 'none');
                        $(".donation-history-datatable").append($(data.HTML_Output));
                        let DonationHistoryTable = $('#donation-history-table-in-history-tab');
                        let donationHistoryTable = DonationHistoryTable.DataTable({
                            "dom": 'rtip',
                            "paging": true,
                            "pageLength": 10,//pageLength,
                            "searching": true,
                            "scrollX": true,
                            "pagingType": "simple",
                            "order": [[3, 'desc']],

                            responsive: isResponsive,

                            columnDefs: [
                                { responsivePriority: 1, targets: 2 },
                                // { responsivePriority: 2, targets: -2 }
                            ],

                            "language": {
                                ...arLang,
                                paginate: {
                                    "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                                    "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
                                }
                            },

                            "rowCallback": function (row, data) {
                                if (!isResponsive) {
                                    $('td:eq(4)', row).css({
                                        display: "flex",
                                        alignItems: "center",
                                        gap: "0.5rem",
                                        grdiGap: "0.5rem"
                                    });

                                    $('td:eq(4) .status', row).css({
                                        width: "10px",
                                        height: "10px",
                                        borderRadius: "50%",
                                    });

                                    switch ($('td:eq(4) span', row).text()) {
                                        case "Complete":
                                            $('td:eq(4) .status', row).css({
                                                background: "#38C2CF"
                                            });

                                            break;

                                        case "Pending":
                                            $('td:eq(4) .status', row).css({
                                                background: "#E8B21F"
                                            });

                                            break;

                                        case "Abandoned":
                                            $('td:eq(4) .status', row).css({
                                                background: "#f42020"
                                            });

                                            break;

                                        default:
                                            $('td:eq(4) .status', row).css({
                                                background: "transparent"
                                            });
                                            break;
                                    }
                                }
                            }
                        });
                        setTimeout(() => {
                            donationHistoryTable.columns.adjust();
                            donationHistoryTable.draw();
                        }, 300);
                    }
                },

            });
        }
        modern_DontionHistory_isOpened = true;
    });

    $("#recurring-donations-tab-btn").on("click", function () {

        if (modern_DontionReacurring_isOpened) { return; }
        modern_DontionReacurring_isOpened = true;
        $('.loader').css('display', 'flex');
        $('.loader').css('position', 'fixed');



        let windowWidth = $(window).innerWidth();
        let isResponsive = false;


        if (windowWidth <= 992) {
            isResponsive = true;
        }
        $.ajax({
            dataType: "json",
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                action: "get_user_modern_recurring_donations",
            },
            statusCode: {
                400: function (data) {
                    // Return text with no recurring found
                    $('.loader').css('display', 'none');
                },
                200: function (data) {
                    $('.loader').css('display', 'none');


                    $(".recurring-donations-datatable").append($(data.HTML_Output));
                    let recurringDonationTable = $('#recurring-donations-table');


                    if (recurringDonationTable.length > 0) {

                        var modernRecurringDataTable = recurringDonationTable.DataTable({
                            "dom": 'rtip',
                            "paging": true,
                            "pageLength": 10,
                            "searching": true,
                            "scrollX": true,
                            "pagingType": "simple",
                            "order": [[2, 'desc']],

                            responsive: isResponsive,

                            "language": {
                                ...arLang,
                                paginate: {
                                    "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                                    "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
                                }
                            },

                            columnDefs: [
                                { responsivePriority: 1, targets: 2 },
                                // { responsivePriority: 2, targets: -2 }
                            ],

                            "rowCallback": function (row, data) {
                                if (!isResponsive) {
                                    $('td:eq(4)', row).css({
                                        display: "flex",
                                        alignItems: "center",
                                        gap: "0.5rem",
                                        grdiGap: "0.5rem"
                                    });

                                    $('td:eq(4) .status', row).css({
                                        width: "10px",
                                        height: "10px",
                                        borderRadius: "50%",
                                    });

                                    switch ($('td:eq(4) span', row).text().trim()) {
                                        case "Active":
                                            $('td:eq(4) .status', row).css({
                                                background: "#38C2CF"
                                            });

                                            break;

                                        case "Pending":
                                            $('td:eq(4) .status', row).css({
                                                background: "#E8B21F"
                                            });

                                            break;

                                        case "Abandoned":
                                            $('td:eq(4) .status', row).css({
                                                background: "#f42020"
                                            });

                                            break;

                                        case "Failed":
                                            $('td:eq(4) .status', row).css({
                                                background: "#f42020"
                                            });

                                            break;

                                        case "Cancelled":
                                            $('td:eq(4) .status', row).css({
                                                background: "#b9b9b9"
                                            });

                                            break;

                                        default:
                                            $('td:eq(4) .status', row).css({
                                                background: "transparent"
                                            });
                                            break;
                                    }
                                }
                            },
                            "initComplete": function (settings, json) { // For Desktop
                                addEventListenerToCancelSubscription(modernRecurringDataTable);
                            }
                        });

                        // setTimeout(() => {
                        //     recurringDataTable.columns.adjust();
                        //     recurringDataTable.draw();
                        // }, 300);

                        $('#recurring-donations-table tbody').on('click', 'tr', function () { // For mobile And Responsive
                            addEventListenerToCancelSubscription(modernRecurringDataTable);

                        });
                    }

                }

            }


        });


    });

    //=====[Save User Account Details]=====//
    const modern_fileInput = document?.getElementById('dashboard-upload-avatar');
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
        document.getElementById('dashboard-upload-avatar').value = "";
        document.getElementById('user-avatar').src = "https://via.placeholder.com/180x180";
    }


    if (modern_fileInput != null) {
        modern_fileInput.addEventListener("change", function () {
            const file = modern_fileInput.files;
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
                //document.getElementById('user-avatar').src = URL.createObjectURL(file[0]);
            }

        });
    }

    $("#edit-save-user-information").on("click", function () {
        $('.loader').css('display', 'flex');
        $('.loader').css('position', 'fixed');


        var formData = new FormData();
        const modern_fileInput = document.getElementById('dashboard-upload-avatar');
        const file = modern_fileInput.files;
        let user_FirstName = document.getElementById('edit_user_info_first_name');
        let user_LastName = document.getElementById('edit_user_info_last_name');
        let user_gender = document.getElementById('prefix');
        let user_company = document.getElementById('edit_user_info_company');
        let user_Email = document.getElementById('edit_user_info_email');


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
        formData.append("user_gender", user_gender.value);
        formData.append("user_company", user_company.value);
        formData.append("user_Email", user_Email.value);
        // formData.append("user_mobile_number", user_mobile_number.value);
        // formData.append("user_Website", user_Website.value);
        // formData.append("user_birth_date", user_birth_date.value);
        // formData.append("user_age", user_age.value);
        // formData.append("user_country", user_country.value);
        // formData.append("user_city", user_city.value);
        // formData.append("user_address", user_address.value);
        // formData.append("user_facebook_url", user_facebook.value);
        // formData.append("user_instagram_url", user_instagram.value);
        // formData.append("user_twitter_url", user_twitter.value);
        formData.append("nonce", ajax_script_object.nonce);
        formData.append("action", 'save_user_account_details');

        $('.loader').css('display', 'flex');
        $('.loader').css('position', 'fixed');

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
                    user_FirstName = data.user_FirstName;
                    user_LastName = data.user_LastName;
                    user_company = data.user_company;
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


                    // document.querySelector('.user-first-name p').textContent = user_FirstName;
                    // document.querySelector('.user-last-name p').textContent = user_LastName;
                    // document.querySelector('.user-mobile-number p').textContent = user_mobile_number;
                    // document.querySelector('.user-email-address p').textContent = user_Email;
                    // document.querySelector('.user-website p').textContent = user_Website;
                    // document.querySelector('.user-birth-date p').textContent = user_birth_date;
                    // document.querySelector('.user-age p').textContent = user_age;
                    // // document.querySelector('.user-country p').textContent = user_country;
                    // // document.querySelector('.user-city p').textContent = user_city;
                    // // document.querySelector('.user-address p').textContent = user_address;
                    // document.querySelector('.user-social-facebook a').href = user_facebook_url;
                    // document.querySelector('.user-social-instagram a').href = user_instagram_url;
                    // document.querySelector('.user-social-twitter a').href = user_twitter_url;
                },
            },

        });
    });
    //=====[Save User Account Details END]=====//

    //=====[Modern Dashboard End]=====//



    $('#adv-post-type').on('change', function () {
        const postType = $(this).val();

        $.ajax({
            dataType: 'json',
            method: "POST",
            url: ajax_script_object.ajaxurl,
            data: {
                'action': 'adv_categories',
                'nonce': ajax_script_object.nonce,
                'post_type': postType,
            },
            success: function (data) {
                $('#adv-cats').find('option').remove().end();
                $('#adv-cats').html(data.output);
            }
        });
    });


})(jQuery);