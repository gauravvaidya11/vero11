// Add claim validation section here

var claim = {        
        init:function() {
                this.validation();
        },       
        
        validation:function(){
                var _that = this;
                
                //start send claim form validation and ajax
                $("#send-claim").click(function(){
                    _that.sendClaimFeedback();
                });

                $('#comment-form input').keypress(function (e) {
                    if (e.which == 13) {
                        _that.sendClaimFeedback();
                    }
                });


        },

        
        // start send claim for dealer validation
        sendClaimFeedback:function(){
            $('#comment-form').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                                admin_comment: {
                                    required: true,
                                    maxlength:100,
                                },
                                business_cat_id:{
                                    required: true,
                                }
                            },

                            messages: {
                                admin_comment: {
                                    required: "Claim Note is required.",
                                    maxlength:jQuery.validator.format("Please enter no more than {0} characters."),
                                },
                                business_cat_id:{
                                    required: "Business Category is required"
                                }
                            },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#comment-form')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        },
                        // errorPlacement: function (error, element) {
                        //     error.insertAfter(element.closest('.form-group'));
                        // },
                    });
                    var result=$("#comment-form").valid();           
                        if(result==true){
                           $("#comment-form").submit(); 
                           return true;
                        }else{
                           return false;
                        }
        }
};

$(function(){
    claim.init();
    // end geolocation code here 
});
