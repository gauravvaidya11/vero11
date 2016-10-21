// Add/Edit cms validation section here
var cms = { 
    init: function() {
        cms.validation();
        cms.handleDatePickers();
        cms.handimageValidation();
    },

    validation: function() {
        cms.handelshowhide();
        $(".addAboutUsBtn").click(function() {
            var video_url = $("#video_url").val();
            cms.addAboutUsValidation();
        });

        $(document).on("change", "#video_url", function(){
            var video_url = $("#video_url").val();
            cms.validateVideoURL(video_url);
        });

        cms.replyContactValidation();
        cms.viewContactUsInfo();
        cms.replyContactusInfo();
        
    },

    viewContactUsInfo: function() {
        $(document).on("click", ".viewContact_mail", function(){
            $("#loading").show();
            var id = $(this).attr('rel');
            $.ajax({
                url: BASE_URL + 'cms/admin/getEmailInfo',
                type: 'POST',
                data: [{name: csrf_name, value: csrf_token}, {name: 'id', value: id}],
                dataType: 'json',
                success: function (data) {
                    $("#loading").hide();
                    $("#replyId").val(data.id);
                    $("#emailName").val(data.name);
                    $("#emailEmail").val(data.email);
                    $("#emailSubject").val(data.title);
                    $("#emailMessage").val(data.message);
                    $("#showMailModal").modal('show');
                }
            });

        });
    },

    replyContactusInfo: function() {
        $(document).on("click", ".reply_mail", function(){
            $("#loading").show();
            var id = $(this).attr('rel');
            $.ajax({
                url: BASE_URL + 'cms/admin/getReplyEmailInfo',
                type: 'POST',
                data: [{name: csrf_name, value: csrf_token}, {name: 'id', value: id}],
                dataType: 'json',
                success: function (data) {
                    $("#loading").hide();
                    $("#replyId").val(data.id);
                    $("#replyName").val(data.name);
                    $("#replyEmail").val(data.email);
                    $("#showReplymailModal").modal('show');
                }
            });

        });

    },

    // start about us validation and ajax
    addAboutUsValidation: function() {
        $('#addAboutUsForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            //ignore: [],
            //debug: false,
            rules: {
                about_us_heading: {
                    required: true,
                    maxlength: 80
                },
                play_date: {
                    required: true
                },
                facebook_url: {
                    required: true
                },
                twitter_url: {
                    required: true
                },
                google_plus_url: {
                    required: true
                },
                player_image: {
                    required: false
                },
                video_url: {
                    required: true,
                    remote: {
                        url: BASE_URL+"cms/admin/check_video_url",
                        type: "post",
                        data: [{name: csrf_name, value: csrf_token}, {name:"video_type", value :$('input:hidden[name=video_type]').val()},{ name:'video_url', value: function(){ return $("#video_url").val();}}]
                    }
                },
                about_content: {
                    required: function() 
                        {
                         CKEDITOR.instances.about_content.updateElement();
                        },
                }
            },
            messages: {
                about_us_heading: {
                    required: "This field is required."
                    //remote:"Username already registered."
                },

                play_date: {
                    required: "This field is required."
                },

                facebook_url: {
                    required: "This field is required."
                },
                
                twitter_url: {
                    required: "This field is required."
                },
                google_plus_url: {
                    required: "This field is required."
                },
                player_image: {
                    required: "This field is required."
                },
                video_url: {
                    required: "This field is required.",
                    remote:"Please enter valid url."
                },
                about_content: {
                    required:"This field is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#addAboutUsForm')).show();
                var errors = validator.numberOfInvalids();
                if (errors) {
                    validator.errorList[0].element.focus();
                }
            },
            highlight: function(element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }
        });

        var result=$("#addAboutUsForm").valid();           
            if(result==true){
               $('.error').hide();
               $("#addAboutUsForm").submit();
               return true;
            }else{
                return false;
            }
    },


    validateVideoURL:function(url) {
        //alert(url);
           if(url.indexOf("https://vine.co/") == -1 && url.indexOf("https://www.youtube.com/") == -1 && url.indexOf("https://vimeo.com/") == -1) {
                $('#video_type').val('invalid');
                $('#video-type').val('invalid');
            }

            else {
                if (url != undefined || url != '') {        

                    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                    var match = url.match(regExp);
                    if (match && match[2].length == 11) {
                            $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');
                            $('#video_type').val('youtube');
                            $('#video-type').val('youtube');
                        }
                }

                if (/https:\/\/vimeo.com\/\d{8}(?=\b|\/)/.test(url)) { 
                    $('#video_type').val('vimeo');
                    $('#video-type').val('vimeo');
                }

                if(url.indexOf("https://vine.co/") > -1){
                    $('#video_type').val('vine');
                    $('#video-type').val('vine');
                }

             
            }
    },


    handelshowhide:function(){
        var image_video = $("input[name='image_video_type']:checked").val();
        
        if(image_video==1){
            $(".show_image").show();
            $(".show_video").hide();
        }else{
            $(".show_video").show();
            $(".show_image").hide();
        }

        $(document).on("click", ".setPlayerImage", function(){
            var image_video = $(this).val();
            
            if(image_video==1){
                $(".show_image").show();
                $(".show_video").hide();
            }else{
                $(".show_video").show();
                $(".show_image").hide();
            }
        });
    },

    handimageValidation: function () {
        $(document).on('change', '#player_image', function () {
            var explode_player_image = $("#player_image").val().split('.').pop().toLowerCase();
            if($.inArray(explode_player_image, ['jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG']) == -1) { 
                $(this).val('');
                $(".gal_js_error").text('Invalid file type! supports only jpg, jpeg & png file type');
                return false;
            }else{
                $(".gal_js_error").text('');
                return true;
            } 
        });
    },

    handleDatePickers: function () {
        $('#play_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    },

    replyContactValidation: function () {
        $('#replyContactUsForm').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                //ignore: [],
                //debug: false,
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    subject: {
                        required: true
                    },
                    message: {
                        required: true,
                        maxlength: 500
                    }
                },
                messages: {
                    name: {
                        required: "This field is required."
                    },

                    email: {
                        required: "This field is required."
                    },
                    subject: {
                        required: "This field is required."
                    },

                    message: {
                        required: "This field is required."
                    }
                },

                invalidHandler: function(event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('#replyContactUsForm')).show();
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                }
            });
        },



};

$(function() {
    cms.init();
});