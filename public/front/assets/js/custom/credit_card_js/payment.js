var payment = {        
        init:function() {
            this.validation();
        },       
        
        validation:function(){
                var _that = this;

                // start change password validation and ajax
                $(document).on("click", "#btnPayNow", function(){
                    _that.signupPaymentValidation();
                });  
              
        },


        signupPaymentValidation:function(){

            $("#clubPaymentForm").validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block', // default input error message class
                    focusInvalid: true, // do not focus the last invalid input
                    rules: {
                    number: {
                        required : true,
                        maxlength: 25
                    },
                    name: {
                        required : true,
                        maxlength: 40
                    },
                    expiry: {
                        required : true
                    },
                    cvc: {
                        required : true,
                        maxlength: 4
                    },
                    
                 },
                  messages: {
                    number :{
                        required : lang_js.common_please_enter_credit_card_number_required,
                    },
                    name :{
                        required : lang_js.common_please_enter_card_holder_name_required,
                    },
                    expiry :{
                        required : lang_js.common_please_enter_expiry_required,
                    },
                    cvc :{
                        required : lang_js.common_please_enter_cvc_required,
                    }
                  },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#change-profile')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                }
            });
            var result=$("#clubPaymentForm").valid();           
            if(result==true){
                $('#loading').show();
                $("#clubPaymentForm").submit();
               return true;
            }else{
               return false;
            }
        },
       
        // start change profile validation and ajax
        changeProfileValidation:function(){
            
            var change_profile_data = [{'name':"email",'value':function(){return $('#change-profile :input[name="email"]').val();}},{'name':csrf_name,'value':csrf_token}];
            $('#change-profile').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                                email: {
                                    required: true,
                                    email: true,
                                    remote:
                                            {
                                                url: BASE_URL + "profiles/checkEmailExist",
                                                type: "post",
                                                data: change_profile_data
                                                        // {   
                                                        //     csrf_monofood_name: csrf_token,
                                                        //     email: function()
                                                        //     {
                                                        //         return $('#change-profile :input[name="email"]').val();
                                                        //     }
                                                        // }
                                            }
                                },
                                first_name: {
                                    required: true
                                },
                                phone: {
                                    required: true
                                },
                                address: {
                                    required: true
                                },
                                country:{
                                    required:true
                                },
                                latitude: {
                                  required: true,  
                                  number: true    
                                },
                                longitude: {
                                  required: true,
                                  number: true
                                }
                            },

                            messages: {
                                email: {
                                    required: "Email is required.",
                                    remote: "Email already registered."
                                },
                                first_name: {
                                    required: "Firstname is required."
                                },
                                phone: {
                                    required: "Phone is required."
                                },
                                address: {
                                    required: "Address is required."
                                },
                                country: {
                                    required: "Country is required."
                                },
                                latitude: {
                                  required: "Latitude Code is required."    
                                },
                                longitude: {
                                  required: "Longitude Code is required."  
                                }
                            },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#change-profile')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#change-profile").valid();           
                        if(result==true){
                           $('.error').hide();
                           $("#change-profile").ajaxForm({
                                success: function(xhr){
                                    var obj = $.parseJSON(xhr);
                                    if(obj.type=="error"){
                                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="success"){
                                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="info"){
                                        $('.comm-message').html('<div class="alert alert-info hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Info! </strong>'+obj.msg+'</div>');                                        
                                    }
                                }
                            }).submit();
                           return true;
                        }
                        else
                           return false;
        },

       

};

$(function(){
    payment.init();


});

