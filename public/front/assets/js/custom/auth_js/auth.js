
var login = (function() {
    var action = {
        init: function() {
            this.regSteps();
            $("form").bind("keypress", function(e) {
                if (e.keyCode == 13) {
                    return false;
                }
            });
        },
        regSteps: function() {
            var _that = this;
            $("#reg-first-step").click(function() {
                _that.firstStepValidation();
            });

            $('#reg-step-first-form input').keypress(function(e) {
                if (e.which == 13) {
                    // _that.firstStepValidation();
                }
            });

            //second step validation here
            $("#reg-second-step").click(function() {
                _that.secondStepValidation();
            });

            $('#reg-step-second-form input').keypress(function(e) {
                if (e.which == 13) {
                    // _that.secondStepValidation();
                }
            });

            // dealer login validation here
            $("#dealer_login").click(function() {
                _that.frontLogin();
            });

            $('.login-form input').keypress(function(e) {
                if (e.which == 13) {
                    _that.frontLogin();
                }
            });

            // dealer forgot password validation here
            $("#dealer_forgot_password").click(function() {
                _that.forgotPassword();
            });

            $('.forgot-password').keypress(function(e) {
                if (e.which == 13) {
                    _that.forgotPassword();
                }
            });

            // dealer reset password validation here
            $("#reset_password").click(function() {
                _that.dealerResetPassword();
            });

            $('.dealer-reset-password input').keypress(function(e) {
                if (e.which == 13) {
                    _that.dealerResetPassword();
                }
            });

            // dealer forgot password validation here
            $("#resend_recovery_email").click(function() {
                _that.resendRecoveryEmail();
            });

            $('#resend_recovery_email_form').keypress(function(e) {
                if (e.which == 13) {
                    _that.resendRecoveryEmail();
                }
            });

            // dealer genrate password validation here
            $("#genrate_password").click(function() {
                _that.dealerGenratePassword();
            });

            $('.dealer-genrate-password').keypress(function(e) {
                if (e.which == 13) {
                    _that.dealerGenratePassword();
                }
            });

           


        },
        firstStepValidation: function() {
            $('#reg-step-first-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    }
                },
                messages: {
                    email: {
                        required: lang_js.customer_registration_email_required,
                        email: lang_js.customer_registration_email_valid,
                        maxlength: lang_js.customer_registration_email_max
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#reg-step-first-form')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            $('#reg-step-first-form input').keypress(function(e) {
                if (e.which == 13) {
                    if ($('#reg-step-first-form').validate().form()) {
                        $('#reg-step-first-form').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        secondStepLatLongMsg: function() {
            $("#reg-second-step").click(function() {
                if ($("#longitude").val().trim() == "" || $("#latitude").val().trim() == "") {
                    $("#lat_long_link_div").removeClass("hide");
                }

            });
        },
        //second steps validaton here
        secondStepValidation: function() {
            var _that = this;
            var username_data = [{'name': "username", 'value': function() {
                        return $('#reg-step-second-form :input[name="username"]').val();
                    }}, {'name': csrf_name, 'value': csrf_token}];
            $.validator.addMethod("check_username", function(value, element) {
                if (value.length > 50) {
                    return false;
                } else if (value.search(/[a-zA-Z]/) == -1) {
                    return false;
                } else if (value.search(/[^a-zA-Z0-9\_\.\-]/) != -1) {
                    return false;
                }

                return true;
            }, lang_js.user_second_step_username_valid);
            $.validator.addMethod("check_lat", function(value, element) {
                if (value <= 90 && value >= -90) {
                    return true;
                }
                return false;
            }, lang_js.user_second_step_latitude_valid);
            $.validator.addMethod("check_long", function(value, element) {
                if (value <= 180 && value >= -180) {
                    return true;
                }
                return false;
            }, lang_js.user_second_step_longitude_valid);

            $('#reg-step-second-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                rules: {
                    username: {
                        required: true,
                        check_username: true
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 30
                    },
                    first_name: {
                        required: true,
                        maxlength: 40
                    },
                    last_name: {
                        maxlength: 40
                    },
                    gender: {
                        maxlength: 1,
                        required: true
                    },
                    country_dailing_code: {
                        maxlength: 15,
                        required: true
                    },
                    mobile: {
                        minlength: 9,
                        maxlength: 15,
                        number: true,
                        required: true
                    },
                    area: {
                        number: true
                    },
                    street_address: {
                        required: true,
                        maxlength: 200

                    },
                    street_number: {
                        required: true,
                        maxlength: 200
                    },
                    address: {
                        maxlength: 700
                    },
                    country: {
                        required: true,
                        number: true
                    },
                    city: {
                        required: true,
                        maxlength: 60
                    },
                    post_code: {
                        required: true,
                        maxlength: 9
                    },
                    state: {
                        required: true,
                        number: true
                    },
                    latitude: {
                        required: true,
                        number: true,
                        maxlength: 45,
                        check_lat: true
                    },
                    longitude: {
                        required: true,
                        number: true,
                        maxlength: 45,
                        check_long: true

                    },
                    birth_day: {
                        required: true,
                        maxlength: 25,
                    },
                    current_weight: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    target_weight: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    height: {
                        required: true,
                        maxlength: 10,
                        number: true
                    },
                    activity_level: {
                        required: true,
                        maxlength: 3,
                        number: true
                    }
                },
                messages: {
                    username: {
                        required: lang_js.user_second_step_username_required
                    },
                    password: {
                        required: lang_js.user_second_step_password_required,
                        minlength: lang_js.user_second_step_password_min,
                        maxlength: lang_js.user_second_step_password_max
                    },
                    first_name: {
                        required: lang_js.user_second_step_firstname_required,
                        maxlength: lang_js.user_second_step_firstname_max
                    },
                    last_name: {
                        maxlength: lang_js.user_second_step_lastname_max
                    },
                    gender: {
                        maxlength: lang_js.user_second_step_gender_max,
                        required: lang_js.user_second_step_gender_required
                    },
                    country_dailing_code: {
                        maxlength: lang_js.user_second_step_dailing_code_max,
                        required: lang_js.user_second_step_mobile_required
                    },
                    mobile: {
                        minlength: lang_js.user_second_step_mobile_min,
                        maxlength: lang_js.user_second_step_mobile_max,
                        number: lang_js.user_second_step_mobile_number,
                        required: lang_js.user_second_step_mobile_required
                    },
                    street_address: {
                        required: lang_js.user_second_step_street_address_required,
                        maxlength: lang_js.user_second_step_street_address_max

                    },
                    street_number: {
                        required: lang_js.user_second_step_street_number_required,
                        maxlength: lang_js.user_second_step_street_number_max
                    },
                    address: {
                        maxlength: lang_js.user_second_step_address_max
                    },
                    country: {
                        required: lang_js.user_second_step_country_required
                    },
                    city: {
                        required: lang_js.user_second_step_city_required,
                        maxlength: lang_js.user_second_step_city_max
                    },
                    post_code: {
                        required: lang_js.user_second_step_postal_code_required,
                        maxlength: lang_js.user_second_step_postal_code_max
                    },
                    state: {
                        required: lang_js.user_second_step_state_required,
                        number: lang_js.user_second_step_state_number
                    },
                    latitude: {
                        required: lang_js.user_second_step_latitude_required,
                        number: lang_js.user_second_step_latitude_number,
                        maxlength: lang_js.user_second_step_latitude_max
                    },
                    longitude: {
                        required: lang_js.user_second_step_longitude_required,
                        number: lang_js.user_second_step_longitude_number,
                        maxlength: lang_js.user_second_step_longitude_max

                    },
                    birth_day: {
                        required: lang_js.user_second_step_birth_day_required,
                        maxlength: lang_js.user_second_step_birth_day_max
                    },
                    current_weight: {
                        required: lang_js.user_second_step_current_weight_required,
                        maxlength: lang_js.user_second_step_current_weight_max,
                        number: lang_js.user_second_step_current_weight_numeric,
                    },
                    target_weight: {
                        required: lang_js.user_second_step_target_weight_required,
                        maxlength: lang_js.user_second_step_target_weight_max,
                        number: lang_js.user_second_step_target_weight_numeric,
                    },
                    height: {
                        required: lang_js.user_second_step_height_required,
                        maxlength: lang_js.user_second_step_height_max,
                        number: lang_js.user_second_step_height_numeric,
                    },
                    activity_level: {
                        required: lang_js.user_second_step_activity_level_required
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#reg-step-second-form')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            var result = $("#reg-step-second-form").valid();
            if (result == true) {
                if ($(".custom_error_username_error").length) {
                    _that.showValidationErrorMsg();
                    return false;
                }
                $("#reg-step-second-form").submit();
                return true;
            } else {
                _that.showValidationErrorMsg();
                return false;
            }
        },
        showValidationErrorMsg: function() {
            commonJS.message(lang_js.common_message_validation_error, "error");
            $("html, body").animate({
                scrollTop: $('.inner-img').offset().top
            }, 1000);
        },
        // Front Login validation here
        frontLogin: function() {
            $('.login-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: lang_js.login_username_required
                    },
                    password: {
                        required: lang_js.login_password_required
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.login-form')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
                submitHandler: function(form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

            $('.login-form input').keypress(function(e) {
                if (e.which == 13) {
                    if ($('.login-form').validate().form()) {
                        $('.login-form').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        // this is forgot password validation here
        forgotPassword: function() {
            var password_data = [{'name': "email", 'value': function() {
                        return $('#forgot-password :input[name="email"]').val();
                    }}, {'name': csrf_name, 'value': csrf_token}];
            $('.forgot-password').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: BASE_URL + "auth/sendPassword",
                            type: "post",
                            data: password_data
                        }
                    }
                },
                messages: {
                    email: {
                        required: lang_js.forgot_password_email_required,
                        remote: lang_js.forgot_password_email_notregistered_msg,
                        email: lang_js.forgot_password_email_valid
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.forgot-password')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            $('.forgot-password input').keypress(function(e) {
                if (e.which == 13) {
                    if ($('.forgot-password').validate().form()) {
                        $('.forgot-password').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        // this function is use for reset password form validation
        dealerResetPassword: function() {
            $('.dealer-reset-password').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 30
                    },
                    confirm_pass: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    password: {
                        required: lang_js.reset_password_password_required,
                        minlength: lang_js.reset_password_password_min,
                        maxlength: lang_js.reset_password_password_max
                    },
                    confirm_pass: {
                        required: lang_js.reset_password_confpassword_required,
                        equalTo: lang_js.reset_password_confpassword_match
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.dealer-genrate-password')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            $('.dealer-reset-password input').keypress(function(e) {
                if (e.which == 13) {
                    if ($('.dealer-reset-password').validate().form()) {
                        $('.dealer-reset-password').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        // this function is use for genrate password form validation
        dealerGenratePassword: function() {
            $('#dealer-genrate-password').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_pass: {
                        required: true,
                        minlength: 5,
                        equalTo: "#dealer_new_password"
                    }
                },
                messages: {
                    password: {
                        required: lang_js.genrate_password_dealer_password_required,
                        minlength: lang_js.genrate_password_dealer_password_min
                    },
                    confirm_pass: {
                        required: lang_js.genrate_password_dealer_cnfmpassword_required,
                        minlength: lang_js.genrate_password_dealer_cnfmpassword_min,
                        equalTo: lang_js.genrate_password_dealer_confpassword_match
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#dealer-genrate-password')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            $('#dealer-genrate-password input').keypress(function(e) {
                if (e.which == 13) {
                    if ($('#dealer-genrate-password').validate().form()) {
                        $('#dealer-genrate-password').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        // this is resend recovery email validation here
        resendRecoveryEmail: function() {
            var recovery_data = [{'name': "email", 'value': function() {
                        return $('#resend_recovery_email_form :input[name="email"]').val();
                    }}, {'name': csrf_name, 'value': csrf_token}];
            $('#resend_recovery_email_form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: BASE_URL + "auth/sendPassword",
                            type: "post",
                            data: recovery_data
                        }
                    }
                },
                messages: {
                    email: {
                        required: lang_js.resend_email_verification_required,
                        remote: lang_js.resend_email_verification_notregistered,
                        email: lang_js.resend_email_verification_valid
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#resend_recovery_email_form')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.login-input').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.login-input').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest('.login-input'));
                },
            });

            $('#resend_recovery_email_form').keypress(function(e) {
                if (e.which == 13) {
                    if ($('#resend_recovery_email_form').validate().form()) {
                        $('#resend_recovery_email_form').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });
        },
        
        checkUsernameValidation: function() {
            $("#valid_username").on("change keyup keydown", function() {
                var _that = this;
                var username = $(this).val().trim();

                $.ajax({
                    url: BASE_URL + "auth/checkUniqueUsername",
                    type: "post",
                    data: [{name: 'username', value: $(this).val().trim()}, {name: csrf_name, value: csrf_token}],
                    success: function(data) {

                        if (username == "") {
                            $(".custom_error_username").remove();
                            return;
                        }
                        if (username.length > 50) {
                            $(".custom_error_username").remove();
                            return;
                        } else if (username.search(/[a-zA-Z]/) == -1) {
                            $(".custom_error_username").remove();
                            return;
                        } else if (username.search(/[^a-zA-Z0-9\_\.\-]/) != -1) {
                            $(".custom_error_username").remove();
                            return;
                        }

                        if (($(_that).parent().next('span').length && $(_that).parent().next('span').hasClass("help-block"))) {
                            $(".custom_error_username").remove();
                            return;
                        }
                        if (data == "false") {
                            if (($(_that).parent().next('span').length && !$(_that).parent().next('span').hasClass("help-block")) || !$(_that).parent().next('span').length) {
                                $(".custom_error_username").remove();
                                $(_that).parent().parent().append("<span class='custom_error_username custom_error_username_error'>" + lang_js.user_second_step_username_registered + "</span>");
                            }
                        } else {
                            if (($(_that).parent().next('span').length && !$(_that).parent().next('span').hasClass("help-block")) || !$(_that).parent().next('span').length) {
                                $(".custom_error_username").remove();
                                $(_that).parent().parent().append("<span class='custom_error_username custom_error_username_success'>" + lang_js.user_second_step_username_available + "</span>");
                            }
                        }
                    }
                });
            });
        }
    }

    $(function() {
        action.checkUsernameValidation();
        action.init();

    })
    return action;
})();
