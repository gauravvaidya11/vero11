$(function () {
    $("#register-form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            fname: {
                required: true,
                maxlength: 50
            },
            lname: {
                required: true,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: BASE_URL+"auths/auth/username_check",
                    type: "post",
                    data: [{name: csrf_name, value: csrf_token}, { name:'email', value: function(){ return $("#username").val();} }]
                }
            },
            birthday: {
                required: true,
                remote: {
                    url: BASE_URL + "auths/auth/age_check",
                    type: "post",
                    data: [{name: csrf_name, value: csrf_token}, { name: 'age', value: function(){ return $("#age").val();} }]
                }
            },
            // age: {
            //     range: [18, 100]
            // },
            gender: {
                required: true
            },
            tnc: {
                required: true
            }

        },
        messages: {// custom messages for radio buttons and checkboxes
             fname: {
                required: lang_js.register_firstname_required,
                maxlength: lang_js.register_firstname_maxlength
            },
            lname: {
                required: lang_js.register_lastname_required,
                maxlength: lang_js.register_last_maxlength,
            },
            email: {
                required: lang_js.register_email_required,
                email: lang_js.common_valid_email,
                remote: lang_js.username_taken
            },
            birthday: {
                required: lang_js.register_dob_required,
                remote: lang_js.minimun_age
            },
            gender: {
                required: lang_js.register_gender_required
            },
            tnc: {
                required: lang_js.register_terms_and_condition_required
            }
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




    

    
    /* for date picker */
    var date_input = $('input[name="birthday"]');
    date_input.datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
    })

    $('#birthday').datepicker().on("changeDate", function (e) {
        var currentDate = new Date();
        var selectedDate = new Date(e.date.toString());
        var age = currentDate.getFullYear() - selectedDate.getFullYear();
        var m = currentDate.getMonth() - selectedDate.getMonth();

        if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
            age--;
        }

        $('#age').val(age);
    });

    $(':checkbox').on('change', function () {
        var th = $(this), name = th.prop('name');
        if (th.is(':checked')) {
            $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
        }
    });




});


