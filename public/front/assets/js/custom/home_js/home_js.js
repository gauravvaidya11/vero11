$(function () {

    $(document).on('click', '#sendContact', function () {
        contactUsValidation();
    });

    function contactUsValidation(){
            $('#contactUsForm').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                            name: {
                                required: true
                            },
                            email: {
                                required: true,
                                email:true
                            },
                            message: {
                                required: true,
                                maxlength:500 
                            }
                        },

                        messages: {
                            name: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            email: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            message: {
                                required: lang_js.common_required_this_field_is_required
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#contactUsForm')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#contactUsForm").valid();           
                        if(result==true){
                           $('#loading').show();
                        }
        }

});
    
//END openVideo()

 