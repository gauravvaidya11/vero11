var profile = {        
        init:function() {
                this.validation();
        },       
        

        validation:function(){
                var _that = this;

                // start change password validation and ajax
                $(".chngPass").click(function(){
                    _that.changePasswordValidation();
                });
    
               
                $('#change-pass input').keypress(function (e) {
                    if (e.which == 13) {
                        _that.changePasswordValidation();
                    }
                });


                // change profile  validation and ajaxs
                $(".chngProfile").click(function(){
                    _that.changeProfileValidation();
                });
    
               
                $('#change-profile input').keypress(function (e) {
                    if (e.which == 13) {
                        _that.changeProfileValidation();
                    }
                });

                // change avatar validation and ajaxs
                $(".chngAvatar").click(function(){
                    _that.changeAvatarValidation();
                });
    
               
                $('#avatar-iamge input').keypress(function (e) {
                    if (e.which == 13) {
                        _that.changeAvatarValidation();
                    }
                });
        },

        changePasswordValidation:function(){ 
            var _that = this;
            $('#change-pass').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                            currentpass: {
                                required: true

                            },
                            new_password: {
                                required: true,
                                minlength:6,
                                maxlength:16
                            },
                            retry_password: {
                                required: true,
                                equalTo: "#new_password",
                                minlength:6,
                                maxlength:16
                            }
                        },

                        messages: {
                            currentpass: {
                                required: "Current password is required."
                            },
                            new_password: {
                                required: "New password is required."
                            },
                            retry_password: {
                                required: "Retry-Password is required."
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#change-pass')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#change-pass").valid();           
                        if(result==true){
                           $('.error').hide();
                           $("#change-pass").ajaxForm({
                                success: function(xhr){
                                    var obj = $.parseJSON(xhr);
                                    if(obj.type=="error"){
                                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="success"){
                                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="info"){
                                        $('.comm-message').html('<div class="alert alert-info hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-notice" style="float:left"></span> Info! </strong>'+obj.msg+'</div>');                                        
                                    }
                                    
                                }
                            }).submit();
                           return true;
                        }
                        else
                           return false;
        },

        // start change profile validation and ajax
        changeProfileValidation:function(){
            $('#change-profile').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                                username: {
                                    required: true,
                                    minlength:8
                                },
                                firstname: {
                                    required: true
                                },
                                lastname: {
                                    required: true
                                },
                                email: {
                                    required: true,
                                    email: true
                                }
                            },

                            messages: {
                                username:{
                                    required: "Username is required."
                                },
                                firstname: {
                                    required: "Firstname is required."
                                },
                                lastname: {
                                    required: "Lastname is required."
                                },
                                email: {
                                    required: "Email is required."
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
                                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="success"){
                                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                                    }else if(obj.type=="info"){
                                        $('.comm-message').html('<div class="alert alert-info hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-notice" style="float:left"></span> Info! </strong>'+obj.msg+'</div>');                                        
                                    }
                                   
                                }
                            }).submit();
                           return true;
                        }
                        else
                           return false;
        },

        //Change avatar validation and ajax
        changeAvatarValidation:function(){
            $('#avatar-iamge').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                                avtarimage: {
                                    required: true
                                }
                            },

                            messages: {
                                avtarimage: {
                                    required: "Image is required."
                                }
                            },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#avatar-iamge')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#avatar-iamge").valid();           
                        if(result==true){
                           $('.error').hide();
                           $("#avatar-iamge").ajaxForm({
                                success: function(xhr){
                                    var obj = $.parseJSON(xhr);
                                    if(obj.type=="error"){
                                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                    }else{
                                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
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
    profile.init();
});

