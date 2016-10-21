// Add user validation section here
var access = {
    init: function () {
        this.validation();
    },
    validation: function () {
        var _that = this;
        
        
//        $(".show-pass").mousedown(function(){
//                        $(this).closest(".form-group").find("input[type='password']").attr('type','text');  //$("#password").attr('type','text');
//                    }).mouseup(function(){
//                        $(this).closest(".form-group").find("input[type='text']").attr('type','password');  //$("#password").attr('type','password');
//                    }).mouseout(function(){
//                        $(this).closest(".form-group").find("input[type='text']").attr('type','password');  //$("#password").attr('type','password');
//                    });
        
        /* Start ----> To show and hide password on change password admin user view */
        $(".show-pass").click(function(){
            var type = $(this).closest(".form-group").find("input").attr('type');
            switch(type){
                case 'password' : $(this).closest(".form-group").find("input[type='password']").attr('type','text');
                                  $(this).html("<i class='fa fa-eye-slash'><i>");
                                    break;
                case 'text' : $(this).closest(".form-group").find("input[type='text']").attr('type','password');
                              $(this).html("<i class='fa fa-eye'><i>");
                                    break;
                default : alert("error"); 
            }
        });
        /* End ----> To show and hide password on change password admin user view */
        
        $("#submit_password").click(function () {
            _that.addPasswordValidation();
        });

        $('#password_form input').keypress(function (e) {
            if (e.which == 13) {
                _that.addPasswordValidation();
            }
        });

    },
    
    // start change password validation and password & confirm password equality match
    addPasswordValidation: function () {
                
        $('#password_form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                password: {
                    required: true,
                    maxlength: 20,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    maxlength: 20,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Password is required",
                    maxlength: "Password must be of less than 20 characters",
                    minlength: "Password must be of greater than 6 characters"
                },
                confirm_password: {
                    required: "Confirm Password is required",
                    maxlength: "Confirm Password must be of less than 20 characters",
                    minlength: "Confirm Password must be of greater than 6 characters",
                    equalTo: "Passwords doesn't match"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#password_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }
        });
        
        var result = $("#password_form").valid();
        
        //For equality of password and confirm password
        var pass = ($('#password').val() == $('#confirm_password').val()) ? true : false ; 
 
        
        if (result == true && pass == true) {
            $("#password_form").submit();
            return true;
        } else {
            return false;
        }
        
        
    }
};

$(function () {
    access.init();
});







