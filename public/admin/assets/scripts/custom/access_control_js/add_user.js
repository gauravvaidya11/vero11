// Add user validation section here
var access = {
    init: function () {
        this.validation();
        this.events();
    },
    events : function () {
        /* Start ----> To show and hide password on add/edit admin user view */
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
        /* End ----> To show and hide password on add/edit admin user view */
        
        /* Start ----> To check an admin user can register only for unique country */
        $("#country_id").change(function(){
            var country_id = $(this).val();
            var admin_user_id = $('input[name="user_id"]').val();
            var user_data = [{'name':csrf_token_name,'value':csrf_token},{'name':'country_id','value':country_id},{'name': 'admin_user_id' , 'value':admin_user_id}];
            $.post(BASE_URL+'access_control/admin/checkUserForUniqueCountry',user_data,function(resp){
                if(resp){
                    bootbox.alert("This country is already registered");
                    $("#country_id").val('Select');
                }
            },"json");
        });
        /* End ----> To check an admin user can register only for unique country */
    },
    validation: function () {
        var _that = this;
        
        $("#add_user").click(function () {
            _that.addUserValidation();
        });

        $('#user_form input').keypress(function (e) {
            if (e.which == 13) {
                _that.addUserValidation();
            }
        });

    },
    
    // start add user validation and ajax
    addUserValidation: function () {
        
        var user_data = [{'name':csrf_token_name,'value':csrf_token},{'name' : 'email_id', 'value' : function() {return $('#user_form :input[name="email"]').val(); } }];
                
        $('#user_form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                first_name: {
                    required: true,
                    maxlength: 50 
                },
                last_name: {
                    maxlength: 50 
                },
                email: {
                    required: true,
                    maxlength: 100,
                    email: true,
                    remote : {
                                url: BASE_URL + "access_control/admin/checkEmailExist",
                                type: "post",
                                data: user_data,
                                async: false
                            }
                },
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
                },
                country_id:{
                    required : true,
                    min: 1,
                },
                'roles[]':{
                    required:true
                }
            },
            messages: {
                first_name: {
                    required: "First Name is required",
                    maxlength: "First Name must be of less than 50 characters" 
                },
                last_name: {
                    maxlength: "Last Name must be of less than 50 characters" 
                },
                email: {
                    required: "Email is required",
                    maxlength: "Email must be of less than 100 characters",
                    remote:   "Email already registered."
                },
                password: {
                    required: "Password is required",
                    maxlength: "Password must be of less than 20 characters",
                    minlength: "Password must be of greater than 6 characters"
                },
                confirm_password: {
                    required: "Password is required",
                    maxlength: "Password must be of less than 20 characters",
                    minlength: "Password must be of greater than 6 characters",
                    equalTo : "Passwords doesn't match"
                },
                country_id:{
                    required : "Country is required",
                    min : "Please Select a Country"
                },
                roles:{
                    required: "User Roles is required",
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#user_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }
        });
        
        var result = $("#user_form").valid();
                
        if (result == true) {
            $("#user_form").submit();
            return true;
        } else {
            return false;
        }
        
        
    }
};

$(function () {
    access.init();
});







