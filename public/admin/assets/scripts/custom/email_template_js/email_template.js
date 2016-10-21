// Add Email Template validation section here
var email_template = {        
        init:function() {
                this.validation();
        },       
        
        validation:function(){
                var _that = this;

                // validate email template form
                $("#email_temp_submit").click(function(){ 
                    _that.addEmailTempValidation();
                });
    
               
                $('#frm_email_template input').keypress(function (e) {
                    if (e.which == 13) {
                        _that.addEmailTempValidation();
                    }
                });

        },

        // start email template validation and ajax
        addEmailTempValidation:function(){
            $('#frm_email_template').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                                name: {
                                    required: true,
                                    maxlength: 64
                                },
                                html_content: {
                                    required:true                                 
                                    
                                }                            
                            },

                            messages: {
                                name: {
                                    required: "Email Template Name is required.",
                                    maxlength: "Name not more than 64 character."
                                },
                                html_content: {   
                                   required: "Email Template Name is required."                                 
                                }
                            },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#frm_email_template')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#frm_email_template").valid();           
                        if(result==true){
                           $("#frm_email_template").submit(); 
                           return true;
                        }else{
                           return false;
                        }
        }
};

$(function(){
    email_template.init();
    
    CKEDITOR.replace( 'html_content',{
        fullPage: true,
        allowedContent: true,
        filebrowserUploadUrl : 'email_templates/admin/uploadCkeditorImage'
    });

});


