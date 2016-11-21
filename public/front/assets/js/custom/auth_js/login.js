$(function () {
   
    $("#login-form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            password: {
                required: true,
                maxlength: 30,
                minlength: 6
            }
        },
           messages: {
                email: {
                    required: lang_js.register_email_required,
                    maxlength: lang_js.login_email_maxlength, 
                    email: lang_js.common_valid_email
                },
                password: {
                    required: lang_js.login_password_required,
                    maxlength: lang_js.login_password_maxlength,
                    minlength: lang_js.login_password_minlength
                }
           },
        invalidHandler: function (event, validator) { //display error alert on form submit   

        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function (error, element) {
            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                error.insertAfter($('#register_tnc_error'));
            } else if (element.closest('.input-icon').size() === 1) {
                error.insertAfter(element.closest('.input-icon'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#forgot-btn').click(function () {
       // alert();
       // $('#forgot-form').hide();
       // $('#reset-form').show();
        
    });


    $("#forgot-password").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            email: {
                required: true,
                email: true
            }

        },
        messages: {// custom messages for radio buttons and checkboxes
            email: {
                required: lang_js.register_email_required,
                email: lang_js.common_valid_email
            }
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   

        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function (error, element) {
            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                error.insertAfter($('#register_tnc_error'));
            } else if (element.closest('.input-icon').size() === 1) {
                error.insertAfter(element.closest('.input-icon'));
            } else {
                error.insertAfter(element);
            }
        },
    });


    $("#reset-password").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            otp: {
                required: true
            },
            newpass: {
                required: true,
                maxlength: 30,
                minlength: 6
            },
            email: {
                required: true
            }

        },
        messages: {// custom messages for radio buttons and checkboxes
            otp: {
                required: lang_js.otp_required
            },
            newpass:{
              required: lang_js.login_password_required  
            },

            email:{
              required: lang_js.register_email_required
            }
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   

        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function (error, element) {
            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                error.insertAfter($('#register_tnc_error'));
            } else if (element.closest('.input-icon').size() === 1) {
                error.insertAfter(element.closest('.input-icon'));
            } else {
                error.insertAfter(element);
            }
        },
    });



});


