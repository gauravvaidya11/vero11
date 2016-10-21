(function() {
    /*Start of the contact_message object.*/
    var contact_message = {
        init: function() {

            this.messageForm();

        },
        messageForm: function() {
            $("#send_contact_message").validate({
                errorElement: 'span', //default input error message container
                errorClass: 'text-danger', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                rules: {
                    receiver_email_id: {
                        required: true
                    },
                    cc_email_id: {
                    },
                    email_subject: {
                        required: true
                    }
                    ,
                    email_body: {
                        required: true
                    }
                },
                messages: {
                    receiver_email_id: {
                        required: "Receiver email id is required"
                    },
                    cc_email_id: {
                    },
                    email_subject: {
                        required: "Subject is required."
                    },
                    email_body: {
                        required: "Email body is required"
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#send_contact_message')).show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                }
            });
        }
    };
    /*End of the contact_message object.*/
    /*Start of the message_attachment object.*/
    var message_attachment = {
        init: function() {
            this.setHandlers();
        },
        setHandlers: function() {
            var _that = this;
            $("body").on("click", ".message-attachment-button", function() {
                var id = $(this).attr("data-id");
                $("#msg-attc-input-" + id).click();

            });
            $(".msg-attc-input").change(function(evt) {
                var id = $(this).attr("data-id");
                var files = this.files; // FileList object.
                // files is a FileList of File objects. List some properties.
                var output = [];
                $('#msg-attc-list-' + id).html("");
                if (files.length > 5) {
                    this.value="";
                    bootbox.alert("Maximum email attachment is 5.", function() {
                     return;
                    });
                    return;
                }
                for (var i = 0, f; f = files[i]; i++) {
                    $('#msg-attc-list-' + id).append('<tr class="template-download fade in"><td class="size" width="40%" >' + f.name + '</td>' +
                            '<td class="size" width="40%">' + _that.formatSize(f.size) + '</td><td colspan="2"></td><td class="delete" width="10%" align="right">\n\
                     </td></tr>');
                }
                $("#message-attachment-button-" + id).find("span").html("Change Files");
            });
        },
        formatSize: function(bytes)
        {

            if ((bytes >> 30) & 0x3FF)
                bytes = (bytes >>> 30) + '.' + (bytes & (3 * 0x3FF)) + 'GB';
            else if ((bytes >> 20) & 0x3FF)
                bytes = (bytes >>> 20) + '.' + (bytes & (2 * 0x3FF)) + 'MB';
            else if ((bytes >> 10) & 0x3FF)
                bytes = (bytes >>> 10) + '.' + (bytes & (0x3FF)) + 'KB';
            else if ((bytes >> 1) & 0x3FF)
                bytes = (bytes >>> 1) + 'Bytes';
            else
                bytes = bytes + 'Byte';
            return bytes;

        }
    };
    /*End of the addpaypal object.*/

//========Functions Calling========
//call of addpaypal object's init function.
    $(function() {
        contact_message.init();
        message_attachment.init();//for attachment handling on client side

    })


}());

