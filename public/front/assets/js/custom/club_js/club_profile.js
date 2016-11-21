$(function () {

    $(document).on('click', '.changePassword', function () {
        $("#change-pass").modal('show');
    });


    $(document).on('click', '#changePassBtn', function () {
        $('#loading').show();
        changePasswordValidation();
    });


    $(document).on('click', '#uploadClubImage', function () {
        $('#loading').show();
        changePasswordValidation();
    });


    function handelActiveDeactive(){ 
        $(document).on("click", ".clbPrfLft ul li", function(){
            $('.clbPrfLft ul li').removeClass("active");
            $(this).addClass("active");
        });
    }

    function updateProfileImage(){
        $("#updateProfileImageForm").ajaxForm({
            success: function(xhr){
                var obj = $.parseJSON(xhr);
                if(obj.type=="error"){
                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                }else{
                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                }
                setTimeout(function(){
                   $('.hideauto').fadeOut('slow');
                }, 5000);
                $('#loading').hide();
            }
        }).submit();
    }

    function changePasswordValidation(){ 
            $('#change-password-form').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                            old_password: {
                                required: true
                            },
                            new_password: {
                                required: true
                            },
                            confirm_password: {
                                required: true,
                                equalTo: "#new_password"
                            }
                        },

                        messages: {
                            old_password: {
                                required: lang_js.current_password_is_required
                            },
                            new_password: {
                                required: lang_js.new_password_is_required
                            },
                            confirm_password: {
                                required: lang_js.confirm_password_is_required
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#change-password-form')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#change-password-form").valid();           
                        if(result==true){
                           $('#loading').show();
                           $('.error').hide();
                           $("#change-password-form").ajaxForm({
                                success: function(xhr){
                                    var obj = $.parseJSON(xhr);
                                    if(obj.type=="error"){
                                        $('.change-pass-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                    }else{
                                        $('.change-pass-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                                    }
                                    setTimeout(function(){
                                       $('.hideauto').fadeOut('slow');
                                    }, 5000);
                                    $("#change-pass").modal("hide");
                                    $('#loading').hide();
                                }
                            }).submit();
                           return true;
                        }else{
                           return false;
                        }
        }


    $(document).on('click', '#editProfile', function () { //alert("askfda"); return false;
        updateProfileValidation();
    });

   
    function updateProfileValidation(){
            $('#editProfileForm').validate({
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block', // default input error message class
                        focusInvalid: true, // do not focus the last invalid input
                        rules: {
                            club_name: {
                                required: true
                            },
                            club_manager_name: {
                                required: true
                            },
                            age: {
                                required: true
                            },
                            birthday: {
                                required: true
                            },
                            weight: {
                                required: true
                            },
                            height_m: {
                                required: true
                            },
                            height_cm: {
                                required: true
                            },
                            laterality: {
                                required: true
                            },
                            country: {
                                required: true
                            },
                            cpf: {
                                required: true
                                // remote: {
                                //     url: BASE_URL + "athlete/athlete/cpf_check",
                                //     type: "post",
                                //     data: [{name: csrf_name, value: csrf_token}, { name: 'cpf_field', value: function(){ return $("#cpf").val();} }]
                                // }
                            },
                            position_1: {
                                required: true
                            },
                            player_type: {
                                required: true
                            },
                            // mobile: {
                            //     required: true
                            // },

                            hire_club_name: {
                                required: true
                            }
                        },

                        messages: {
                            club_name: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            club_manager_name: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            age: {
                                required: lang_js.common_required_this_field_is_required
                            },

                            birthday: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            weight: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            height_m: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            height_cm: {
                                required: lang_js.common_required_this_field_is_required
                            },

                            laterality: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            country: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            cpf: {
                                required: lang_js.common_required_this_field_is_required
                                //remote: lang_js.please_enter_valid_cpf_no
                            },
                            
                            position_1: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            player_type: {
                                required: lang_js.common_required_this_field_is_required
                            },
                            // mobile: {
                            //     required: lang_js.common_required_this_field_is_required
                            // }

                            hire_club_name: {
                                required: lang_js.common_required_this_field_is_required
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit   
                            $('.alert-danger', $('#editProfileForm')).show();
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        }
                    });
                    var result=$("#editProfileForm").valid();           
                        if(result==true){ 
                           $('#loading').show();
                           $('.error').hide();
                           $("#editProfileForm").ajaxForm({
                                success: function(xhr){
                                    var obj = $.parseJSON(xhr);
                                    if(obj.type=="error"){
                                        $('.comm_profile-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong> <span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                    }else{
                                        $('.comm_profile-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                                       
                                    }

                                    setTimeout(function(){
                                       $('.hideauto').fadeOut('slow');
                                    }, 5000);

                                    $("#player-profile").modal("hide");
                                    loadPreloadedProfileForm();
                                    $('#loading').hide();
                                }
                            }).submit();
                        }
                        else
                           return false;
        }
         

    $('#edit_btn').click(function () {
        $('#loading').show();
        $.ajax({
            url: BASE_URL + 'get_club_info',
            type: 'POST', 
            data: [{name: csrf_name, value: csrf_token}],
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                $('.club_name').val(data.club_name);
                $('.club_manager_name').val(data.club_manager_name);
                $('#nickname').val(data.nick_name);
                $('.birthday').val(data.birthday);
                $('#age').val(data.age);
                // $('#gender').val(data.gender);
                // $('#gender').selectpicker('refresh');

                // if(data.height!=null){
                //     var explode_height = data.height.split('.');

                //     $('#height_m').val(explode_height[0]);
                //     $('#height_m').selectpicker('refresh');
                //     $('#height_cm').val(explode_height[1]); 
                //     $('#height_cm').selectpicker('refresh'); 
                // }else{
                //     $('#height_m').val();
                //     $('#height_m').selectpicker('refresh');
                //     $('#height_cm').val();
                //     $('#height_cm').selectpicker('refresh');
                // }

                // $('.clubWeight').val(data.weight);
                // $('#laterality').val(data.laterality);
                // $('#laterality').selectpicker('refresh');

                $('#country').val(data.country);
                $('#country').selectpicker('refresh');

                // $('#cpf').val(data.cpf);
                // $('#pos1').val(data.position_1);
                // $('#pos1').selectpicker('refresh');
                // $('#pos2').val(data.position_2);
                // $('#pos2').selectpicker('refresh');
                // $('#pos3').val(data.position_3);
                // $('#pos3').selectpicker('refresh');
                //$('#player_type').html(data.position_3);
                $('#mobile').val(data.mobile);
                $('#email').val(data.email);
                $('#facebook').val(data.facebook);
                $('#instagram').val(data.instagram);
                $('#twitter').val(data.twitter);
                
                // $('#player_type').val(data.player_type);
                // $('#player_type').selectpicker('refresh');

                // if(data.player_type==1){
                //     $('.show_hide_club').show();
                //     $('#clubname').val(data.hire_club_name);    
                // }else{
                //     $('#clubname').val("");    
                //     $('.show_hide_club').hide();
                // }
                
                // $("#hidden_profile_image").val(data.profile_image);
                // if(data.profile_image && data.profile_image!='0') {
                    
                //     $('#profileImage').attr('src', BASE_URL + PROFILE_IMAGE + data.profile_image);
                // }
                // else {
                //     $('#profileImage').attr('src', AVATAR_IMAGE);
                // }

                
                $('#loading').hide();
                $("#player-profile").modal("show");
            }
        });
    });

    // $(document).on('focus',"#birthday", function(){
    //     $(this).datepicker();
    // });

    $('#birthday').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
    });

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

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profileImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '#img', function () {
        var explode_wm_image = $("#img").val().split('.').pop().toLowerCase();
        if($.inArray(explode_wm_image, ['gif','jpg', 'png', 'jpeg', 'GIF', 'JPG', 'PNG', 'JPEG']) == -1) { 
            $(this).val('');
            $(".profileImage").attr("src", AVATAR_IMAGE);
            bootbox.alert(lang_js.invalid_file_type_support_only_gif_jpg_jpeg_png_file_type);
            //$(".gal_js_error").text(lang_js.invalid_file_type_support_only_gif_jpg_jpeg_png_file_type);
            return false;
        }else{
        	$('#loading').show();
            //$(".gal_js_error").text('');
            readURL(this);
            updateProfileImage();
            return true;
        } 
    });
  
  

    //populateCountries("country");

    $("#video-form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            video_url: {
                required: true,
                url: false,
                remote: {
                    url: BASE_URL+"athlete/url_check",
                    type: "post",
                    data: [{'name': csrf_name, 'value': csrf_token}, { 'name':'video_url', 'value': function(){ return $("#video_url").val();} }]
                }
            },
            video_title: {
                required: true
            },
            upload_video: {
                required: true
            }
            
        },
        messages: {// custom messages for radio buttons and checkboxes
            video_url: {
                remote : lang_js.video_accept_url,
                url: lang_js.video_valid_url,
                required: lang_js.video_required_url
            },
            video_title: {
                required: lang_js.title_required
            },
            upload_video: {
                required: lang_js.common_required_this_field_is_required
            }
            
        }
    });

   
    $("#update-video-form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            video_url: {
                required: true,
                url: true,
                remote: {
                    url: BASE_URL+"athlete/url_check",
                    type: "post",
                    data: [{'name': csrf_name, 'value': csrf_token}, { 'name':'video_url', 'value': function(){ return $("#update_video_url").val();} }]
                }
            },
            upload_video: {
                required: false
            },

            video_title: {
                required: true,

            }
        },
        messages: {// custom messages for radio buttons and checkboxes
            video_url: {
                remote : lang_js.video_accept_url,
                url: lang_js.video_valid_url,
                required: lang_js.video_required_url
            },

            upload_video: {
                required: lang_js.common_required_this_field_is_required
            },

            video_title: {
                required: lang_js.title_required
            }

        }
    });


    $("#imageform").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            image_title: {
                required: true,
            },
            image: {
                required: true,
                
            }
        },
        messages: {// custom messages for radio buttons and checkboxes
            image_title: {
                required : lang_js.title_required
            },
            image : {
                required : lang_js.file_select_required
            }
        },     
    });

    $("#update-image-form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        rules: {
            image_title: {
                required: true,
            },
            image: {
                required: true,
                
            }
        },
        messages: {// custom messages for radio buttons and checkboxes
            image_title: {
                required : lang_js.title_required
            },
            image : {
                required : lang_js.file_select_required
            }
        },     
    });

    handelActiveDeactive(); 
    
    addImages();

    //validateURLWhileUpdate();

    updateImage();

    //validateURL();

    addVideos();

    playVideo();

    loadPreUploadedVideos();

    loadPreUploadedImages();

    updatePlayerVideo();

    //updateProfileForm();

    updateBiograpghyForm();

    loadPreloadedProfileForm();

    editBiography();

    loadPreloadedBioForm();
    //deleteImage();
    showHidehandel();

    mobileMastk();
    uploadVideo();

    if(isLogin){
        setInterval(function(){ 
            $.ajax({
                url: BASE_URL + 'athlete/getTotalPlayers',
                type: 'POST',
                data: [{name: csrf_name, value: csrf_token}],
                dataType: 'json',
                success: function (data) {
                    $('#total-players').text(lang_js.total_players+'-' + data);
                }
            });
        }, 70000);
    }
   
});

    var imageCount = 0;
    var videoCount = 0;

function editBiography() {
    $(document).on('click', '#edit-bioBtn', function (event) {
        if (CKEDITOR.instances['edi']) { CKEDITOR.instances['edi'].destroy(); }

        CKEDITOR.replace('edi', {
          uiColor: '#79bc49',
          toolbar: [
            [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-' ],
          ]
        });

        $('#loading').show();        
        
        $.ajax({
            url: BASE_URL + 'clubs/club/get_club_biography',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token}],
            dataType: 'json',
            success: function (data) {
                $('#bio-title').val(data.title);
                CKEDITOR.instances['edi'].setData(data.content);
                $('#loading').hide();
                $("#player-biography").modal("show");
                // if(CKEDITOR.instances['edi'].setData(data.content)){
                //     alert("done");
                // }
            }
        });
    });
}


//to delete player image

function deleteVideo() {
    $(document).on('click', '.deleteVideoBtn', function () {
        var video_id = $(this).attr('video_id');
        bootbox.confirm({
        message: lang_js.message_are_you_sure_you_want_to_delete_this,
        
            callback: function (result) {
              if(result) {

                $.ajax({
                        url: BASE_URL + 'clubs/club/deleteClubVideo',
                        type: 'POST',
                        data: [{name: csrf_name, value: csrf_token}, {name: 'video_id', value: video_id}],
                        dataType: 'json',
                        success: function (data) {
                            $('#'+video_id).remove();
                            videoCount--; 
                            
                            if(videoCount < 3){
                                $("#add-more-video").parent(".add_more").parent("li").remove();
                                $('#video-list').append('<li><div class="add_more custom-add-more"> <a id="add-more-video" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i></span> '+lang_js.add_more_button+'</a> </div></li>');
                            }
                            addVideos();
                            //location.reload();
                        }
                    });
                }
            }
        });

    });
}



function deleteImage() {
    $('.deleteBtn').click(function () { 
    var image_id = $(this).attr('image_id');
        bootbox.confirm({
        message: lang_js.message_are_you_sure_you_want_to_delete_this,
        
        callback: function (result) {
          if(result) {

                $.ajax({
                    url: BASE_URL + 'clubs/club/deleteClubImage',
                    type: 'POST',
                    data: [{name: csrf_name, value: csrf_token}, {name: 'image_id', value: image_id}],
                    dataType: 'json',
                    success: function (data) {
                        $('#'+image_id).remove();
                        imageCount--;
                        //alert(imageCount);
                        if(imageCount < 3){
                            $("#add-more-image").parent(".add_more").parent("li").remove();
                            $('#image-list').append('<li><div class="add_more custom-add-more"> <a data-toggle="modal" role="button" href="javascript:void(0)" id="add-more-image"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
                        }
                        // if(imageCount < 3){
                        //     $('#image-list').append('<li><d1iv class="add_more custom-add-more"> <a data-toggle="modal" role="button" href="javascript:void(0)" id="add-more-image"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
                        // }
                       //location.reload();
                       addImages();
                    }
                });
            }

        }
    });


    });
}// close deleteImage()



function addImages() {

    $('#add-more-image').bind("click",function(e) {
        //$('#loading').show();
        if(imageCount < 3){
            $('#imageform')[0].reset();
            $("#myModal").modal("show");
            $("#imageform").ajaxForm({
                success: function(xhr){
                    var obj = $.parseJSON(xhr);
                    if(obj.type=="error"){
                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                    }else{
                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                       
                        $("#myModal").modal("hide");
                        showResponse(obj.insert_id);
                    }
                    setTimeout(function(){
                       $('.hideauto').fadeOut('slow');
                    }, 5000);
                    //$('#loading').hide();
                }
            });

            // var options = { 
            //     target: '#title',
            //     success: showResponse
            // }; 

            // $('#imageform').ajaxForm(options); 
        }
    });
   
}


function showResponse(id)  {
    //alert(id);
    imageCount++;
    $.ajax({
        url: BASE_URL + 'clubs/club/getImageData',
        type: 'POST',
        data: [{name: csrf_name, value: csrf_token}, {name: 'image_id', value: id}],
        dataType: 'json',
        success: function (data) {
            $("#add-more-image").parent(".add_more").parent("li").animate({
                opacity: 0,
            }, 2000, function() {
                $("#add-more-image").parent(".add_more").parent("li").remove();
                if(data.filename=="" || data.filename==null || data.filename=='0'){
                    var playerIamge = AVATAR_IMAGE;
                }else{
                    var playerIamge = BASE_URL+ 'public/uploads/player_image/'+ data.filename;
                }
                $("#image-list").append('<li id="'+data.id+'"><div class="my_image"><a href=""><img src="' + playerIamge + '"/></a></div>\
                <div class="profile_edit"><p>'+data.title+'</p>\
                <div class="edit_delet"> <a class="editImageBtn" href="javascript:void(0)" image_id="'+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteBtn" image_id="'+data.id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
                <div class="clearfix"></div></div></li>');

                if(imageCount < 3){
                    $('#image-list').append('<li><div class="add_more custom-add-more"> <a data-toggle="modal" role="button" href="javascript:void(0)" id="add-more-image"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
                }else{
                    $("#add-more-image").parent(".add_more").parent("li").remove();
                }
                addImages();
                deleteImage();
                showImage();
            });
            $('#myModal').modal('hide');
        }
    });
} 


function showImage() {
    $('.editImageBtn').click(function () {
        $('#loading').show();
        var image_id = $(this).attr('image_id');
        
        $.ajax({
            url: BASE_URL + 'clubs/club/getImageData',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token}, {name: 'image_id', value: image_id}],
            dataType: 'json',
            success: function (data) {
                
                $('#imageid').val(data.id);
                $('#image_title').val(data.title);
                if(data.filename=="" || data.filename==null || data.filename=='0'){
                    var playerIamge = AVATAR_IMAGE;
                }else{
                    var playerIamge = BASE_URL+ 'public/uploads/player_image/'+ data.filename;
                }
                $('#player-image').attr('src', playerIamge );
                $('#playerImg').val(data.filename);
                $('#editImage').modal('show');
                $('#loading').hide();
            }
        });
        

    });
}

function playVideo() {
    $('.playVideo').click(function () {
        $('#loading').show();
        var video_id = $(this).attr('video_id');
    
        $.ajax({
            url: BASE_URL + 'clubs/club/getVideoData',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token}, {name: 'video_id', value: video_id}],
            dataType: 'json',
            success: function (data) {
                $('#vid_title').val(data.title);
                $('#video1').attr('src', data.filename);
                $('#loading').hide();
            }
        });
        

    });
}

function updateImage() {
    $("#update-image-form").ajaxForm({
        success: function(xhr){
            var obj = $.parseJSON(xhr);
            if(obj.type=="error"){
                $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong> <span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                showUpdatedImage(xhr);
                //showResponse();
            }else{
                $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                
                showUpdatedImage(xhr);
            }
            setTimeout(function(){
               $('.hideauto').fadeOut('slow');
            }, 4000);
            //location.reload();
            //$('#loading').hide();
        }
    });

}

function showUpdatedImage(responseText)  { 
    var data = $.parseJSON(responseText);
    
    if(data.type=='success'){
        var id = data.id;
        //$('#' + id).remove();

        if(data.filename=="" || data.filename==null || data.filename=='0'){
            var playerIamge = TIMTHUMB + AVATAR_IMAGE +'&w=200&h=200';
        }else{
            var playerIamge = TIMTHUMB + BASE_URL+ 'public/uploads/player_image/'+ data[i].filename+ '&w=200&h=200';
        }

        if($("#"+id).length == 0){
            $("#add-more-image").parent(".add_more").parent("li").animate({
                opacity: 0,
            }, 2000, function() {
            
                $("#add-more-image").parent(".add_more").parent("li").remove();
                if(imageCount < 3){
                    $('#image-list').append('<li><div class="add_more custom-add-more"> <a data-toggle="modal" role="button" href="javascript:void(0)" id="add-more-image"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
                }else{
                    $("#add-more-image").parent(".add_more").parent("li").remove();
                }
                
            });
        }

        if($("#"+id).length > 0){
            $("#"+id+" > .my_image").find("img").attr("src",playerIamge);
            $("#"+id+" > .profile_edit").find("p").text(data.title);
            
        }

        addImages();
        deleteImage();
        showImage();

    }
    $('#editImage').modal('hide');
}






function updateBiograpghyForm() {
    $("#editBio").bind("click",function(){
        $('#loading').show();
        var content = CKEDITOR.instances['edi'].getData();
        var title = $("#bio-title").val();

        $.ajax({
            url: BASE_URL + 'clubs/club/save_biography',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token}, {name:'bio_title', value:title}, {name:'content', value:content}],
            dataType: 'json',
            success: function (xhr) {
                if(xhr.type=="error"){
                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+xhr.msg+'</div>');
                }else{
                    $("#player-biography").modal("hide");
                    loadPreloadedBioForm();
                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+xhr.msg+'</div>');
                }

                setTimeout(function(){
                   $('.hideauto').fadeOut('slow');
                }, 5000);
                $('#loading').hide();
            }
        });
    });
}

function showUpdatedBiography(responseText)  { 
    var data = $.parseJSON(responseText);
    
    $('#biotitle').text(data.title);
    if(data.content) {
        $('#bio_content').text(data.content);
    }
    else{
        $('#bio_content').text(lang_js.heading_please_enter_biography);
    }
    
    //$('#player-biography').modal('hide');
}





// uncomment this after apply video
// function addVideos() {
//     $('#add-more-video').bind("click",function(e) {
//         if(videoCount < 3){
//             $('#video-form')[0].reset();
//             $("#modal-video").modal("show");
//             // var options = { 
//             //     target:  '#video_title',   // target element(s) to be updated with server response 
//             //     success: showVideos
//             // };
//             // $('#video-form').ajaxForm(options); 
//         }
//     });
   
// }


function addVideos() {
	$(document).on('click', '#add-more-video', function () { 
        if(videoCount < 3){
            $('#video-form')[0].reset();
            $("#modal-video").modal("show");
            var options = { 
                target:  '#video_title',   // target element(s) to be updated with server response 
                success: showVideos
            };
            $('#video-form').ajaxForm(options); 
        }
    });
   
}//END addVideos()

function uploadVideo(){
	$(document).on('click', '#uploadVideo', function () {
        if(videoCount <= 3){
        	$('#loading').show();
        	beforeSubmitVideo();
        	setTimeout(function(){
	        	var options = { 
	                target:  '#video_title',   // target element(s) to be updated with server response 
	                //beforeSubmit : beforeSubmitVideo,
	                success: showVideos
	            };
	            $('#video-form').ajaxForm(options); 
        	},200);
        }
    });
}//END uploadVideo()


function beforeSubmitVideo(){
	var url = $('#video_url').val();

    if(url =="" || url ==null || url == undefined){ 
        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+lang_js.common_required_this_field_is_required+'</div>');
    
    }else{
        if(url.indexOf("https://vine.co/") == -1 && url.indexOf("https://www.youtube.com/") == -1 && url.indexOf("https://vimeo.com/") == -1 ) {
            $('#video_type').val('invalid');
            $('#video-type').val('invalid');
        }else {

            if (url != undefined || url != '') {        

                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length == 11) {
                        $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');
                        $('#video_type').val('youtube');
                        $('#video-type').val('youtube');
                }

                var regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;

				var match = url.match(regExp);
				if(match){
                //if (/https:\/\/vimeo.com\/\d{8}(?=\b|\/)/.test(url)) { 
                    $('#video_type').val('vimeo');
                    $('#video-type').val('vimeo');
                }

                if(url.indexOf("https://vine.co/") > -1){
                    $('#video_type').val('vine');
                    $('#video-type').val('vine');
                }
        	}
         
        }
    }    
}


function updatePlayerVideo() {
	$(document).on('click', '#updateVideo', function () { 
		$('#loading').show();
		beforeSubmitVideoForUpdate();

		var options = { 
                target:  '#video_title',   // target element(s) to be updated with server response 
                success: showUpdatedVideo
            };
            $('#update-video-form').ajaxForm(options); 

	});
}



function showUpdatedVideo(responseText)  { 
    var data = $.parseJSON(responseText);
    
    if(data.type=='error'){
        $('.upd-comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+data.msg+'</div>');
    	$('#loading').hide();
    }else{
        var id = data.id;

        if($("#"+id).length == 0){
            $("#add-more-video").parent(".add_more").parent("li").animate({
                opacity: 0,
            }, 2000, function() {
                $("#add-more-video").parent(".add_more").parent("li").remove();
               
                $('#video1').attr('src', data.filename);
                
                if(videoCount < 3){
                    $('#video-list').append('<li><div class="add_more custom-add-more"> <a id="add-more-video" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i></span> '+lang_js.add_more_button+'</a> </div></li>');
                }else{
                    $("#add-more-video").parent(".add_more").parent("li").remove();
                }

                
            });

        }
        
        if($("#"+id).length > 0){
        	setTimeout(function(){
	            $("#"+id+" .my_vedio").find("img").attr("src",data.thumbnail_image);
	            $("#"+id+" .profile_edit").find("p").text(data.title);
            },200);
        }
        $('#loading').hide();
        // this function is use for dynamin action when user add dynamic action
        openVideo();
        addVideos();
        $('#edit-video').modal('hide');
    }
    

}



function beforeSubmitVideoForUpdate(){
	var url = $('#update_video_url').val();

    if(url =="" || url ==null || url == undefined){ 
        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+lang_js.common_required_this_field_is_required+'</div>');
    
    }else{
        if(url.indexOf("https://vine.co/") == -1 && url.indexOf("https://www.youtube.com/") == -1 && url.indexOf("https://vimeo.com/") == -1 ) {
            $('#video_type').val('invalid');
            $('#video-type').val('invalid');
        }else {

            if (url != undefined || url != '') {        

                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length == 11) {
                        $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');
                        $('#video_type').val('youtube');
                        $('#video-type').val('youtube');
                }

                var regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;

				var match = url.match(regExp);
				if(match){
                //if (/https:\/\/vimeo.com\/\d{8}(?=\b|\/)/.test(url)) { 
                    $('#video_type').val('vimeo');
                    $('#video-type').val('vimeo');
                }

                if(url.indexOf("https://vine.co/") > -1){
                    $('#video_type').val('vine');
                    $('#video-type').val('vine');
                }
        	}
         
        }
    }    
}


// uncomment when apply video
// function showVideoToUpdate() {
//     $('.editVideoBtn').click(function () {
//         $('#loading').show();
//         var video_id = $(this).attr('video_id');
        
//         $.ajax({
//             url: BASE_URL + 'athlete/getVideoData',
//             type: 'POST',
//             data: [{name: csrf_name, value: csrf_token}, {name: 'video_id', value: video_id}],
//             dataType: 'json',
//             success: function (data) {
//                 if(data.upload_video_type==1){
//                     $('#upload_videoType1').attr('checked', 'checked');    
//                     //$('#upload_videoType2').attr('checked', '');
//                     $(".show_upload_video").hide();
//                     $(".show_video_url").show();
//                     $('#video-type').val(data.video_type);
//                     $('#update_video_url').val(data.filename);
//                 }else{
//                     $(".show_upload_video").show();
//                     $(".show_video_url").hide();
//                     $("#upload_hidden_thumb_image").val(data.thumbnail_image);
//                     //$('#upload_videoType1').attr('checked','');    
//                     $('#upload_videoType2').attr('checked','checked');
//                     $("#hidden_player_video").val(data.filename);
//                     $("#upload_video_type").val(data.video_type);
//                 }
//                     $('#loading').hide();
//                     $('#videoid').val(data.id);
//                     $('#video-title').val(data.title);
//                     $('#edit-video').modal('show');
//             }
//         });        
//     });
// }




function showVideoToUpdate() {
    $(document).on('click', '.editVideoBtn', function () {
        $('#loading').show();
        var video_id = $(this).attr('video_id');

        var options = { 
                target:  '#video_title',   // target element(s) to be updated with server response 
                success: showUpdatedVideo
            };
            $('#update-video-form').ajaxForm(options); 
        
        $.ajax({
            url: BASE_URL + 'clubs/club/getVideoData',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token}, {name: 'video_id', value: video_id}],
            dataType: 'json',
            success: function (data) {
                $('#video-type').val(data.video_type);
                $('#videoid').val(data.id);
                $('#video-title').val(data.title);
                $('#update_video_url').val(data.orignal_video_url);
                $('#edit-video').modal('show');
                 $('#loading').hide();
            }
        });        
    });
}


function showVideos(responseText)  { 
    videoCount++;
    var data = $.parseJSON(responseText);
    if(data.type=='error'){
        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+data.msg+'</div>');
        $('#loading').hide();
    }else{
        $("#add-more-video").parent(".add_more").parent("li").animate({
            opacity: 0,
        }, 2000, function() {
            $("#add-more-video").parent(".add_more").parent("li").remove();
                   
            $("#video-list").append('<li id="'+data.id+'"><a href="javascript:void(0)" class="open-video" video_title= "'+data.title+'" video_url="'+data.filename+'" role="button" data-toggle="modal"><div class="my_vedio"><img src="' + data.thumbnail_image + '"/></div></a></div>\
                <div class="profile_edit"><p>'+data.title+'</p>\
                <div class="edit_delet"><a class="editVideoBtn" data-toggle="modal" role="button" href="javascript:void(0)" video_id="'+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteVideoBtn" video_id="'+data.id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
                <div class="clearfix"></div></div></li>');
            $('#video1').attr('src', data.filename);
            
            if(videoCount < 3){
                $('#video-list').append('<li><div class="add_more custom-add-more"> <a id="add-more-video" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
            }else{
                $("#add-more-video").parent(".add_more").parent("li").remove();
            }

        });
		$("#loading").hide();
		openVideo();
		addVideos();
        deleteVideo();
        showVideoToUpdate(); 
        $('#modal-video').modal('hide');
    }
    
}


// uncomment when video apply
// function showVideos(responseText)  { 
//     videoCount++;

//     var data = $.parseJSON(responseText);
    
//     if(data.type=='error'){
//         $('#loading').hide();
//         $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+data.msg+'</div>');
//     }else{
//         $('#loading').hide();
//         $("#add-more-video").parent(".add_more").parent("li").animate({
//             opacity: 0,
//         }, 2000, function() {
//             $("#add-more-video").parent(".add_more").parent("li").remove();
             
//             if(data.upload_video_type==2){
//                 $("#video-list").append('<li id="'+data.id+'><a href="javascript:void(0)" class="open-video" video_title= "'+data.title+'" video_url="' +BASE_URL +'public/uploads/player_video/'+ data.filename+'" role="button" data-toggle="modal"><div class="my_vedio"><img src="'+BASE_URL +'public/uploads/video_thumb/'+ data.thumbnail_image + '"/></div></a></div>\
//                 <div class="profile_edit"><p>'+data.title+'</p>\
//                 <div class="edit_delet"><a class="editVideoBtn" data-toggle="modal" role="button" href="javascript:void(0)" video_id="'+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteVideoBtn" video_id="'+data.id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
//                 <div class="clearfix"></div></div></li>');
//             }else{
//                 $("#video-list").append('<li id="'+data.id+'><a href="javascript:void(0)" class="open-video" video_title= "'+data.title+'" video_url="'+data.filename+'" role="button" data-toggle="modal"><div class="my_vedio"><img src="' + data.thumbnail_image + '"/></div></a></div>\
//                 <div class="profile_edit"><p>'+data.title+'</p>\
//                 <div class="edit_delet"><a class="editVideoBtn" data-toggle="modal" role="button" href="javascript:void(0)" video_id="'+data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteVideoBtn" video_id="'+data.id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
//                 <div class="clearfix"></div></div></li>');
//             }       
//             $('#video1').attr('src', data.filename);
//             openVideo();
//             location.reload();
//             if(videoCount < 3){
//                 $('#video-list').append('<li><div class="add_more custom-add-more"> <a id="add-more-video" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
//             }else{
//                 $("#add-more-video").parent(".add_more").parent("li").remove();
//             }

//             addVideos();
//             deleteVideo();

//         });
//         $('#modal-video').modal('hide');
//     }
    
// }

function loadPreloadedProfileForm() {
    var positions = {1:lang_js.goalkeeper,
                    2:lang_js.right_wing,
                    3:lang_js.center_back,
                    4:lang_js.left_back,
                    5:lang_js.left_wing,
                    6:lang_js.defensive_mid_fielder,
                    7:lang_js.right_mid_fielder,
                    8:lang_js.left_mid_fielder,
                    9:lang_js.right_forward,
                    10:lang_js.striker,
                    11:lang_js.left_forward};
                    //console.log(positions);

    var laterality = {1:lang_js.right_footed,2:lang_js.left_footed,3:lang_js.two_footed};

    var playertype = {1:lang_js.hired,2:lang_js.free};
    var gendertype = {1:lang_js.common_male_gender_select_option,2:lang_js.common_female_gender_select_option};

    $.ajax({
        url: BASE_URL + 'get_club_info',
        type: 'POST',
        data: [{name: csrf_name, value: csrf_token}],
        dataType: 'json',
        success: function (data) {
            
            if(data.club_name && data.club_name!=null){
                $('.profileName').text(data.club_name);
            }

            
            $('#email-address').text(data.email);


            if(data.club_name=="0" || data.club_name==null || data.club_name==""){
                $('#club_name').text("N/A");    
            }else{
                $('#club_name').text(data.club_name);
            }

            if(data.club_manager_name=="0" || data.club_manager_name==null || data.club_manager_name==""){
                $('#club-manager-name').text("N/A");    
            }else{
                $('#club-manager-name').text(data.club_manager_name);
            }


            if(data.nick_name=="0" || data.nick_name==null || data.nick_name==""){
                $('#nick-name').text("N/A");    
            }else{
                $('#nick-name').text(data.nick_name);
            }

            if(data.birthday=="0" || data.birthday==null || data.birthday==""){
                $('#birth-day').text("N/A");    
            }else{
                $('#birth-day').text(data.birthday);
            }

            if(data.age=="0" || data.age==null || data.age==""){
                $('#ag').text("N/A");    
            }else{
                $('#ag').text(data.age);
            }

            

            if(data.country=="0" || data.country==null || data.country==""){
                $('#cout').text("N/A");    
            }else{
                $('#cout').text(data.country);
            }

           

            if(data.mobile=="0" || data.mobile==null || data.mobile==""){
                $('#contact_mobile').text("N/A");    
            }else{
                $('#contact_mobile').text(data.mobile);
            }

            if(data.email=="0" || data.email==null || data.email==""){
                $('#contact_email').text("N/A");    
            }else{
                $('#contact_email').text(data.email);
            }

            if(data.facebook=="0" || data.facebook==null || data.facebook==""){
                $('#contact_fb').text("N/A");    
            }else{
                $('#contact_fb').text(data.facebook);
            }

            if(data.instagram=="0" || data.instagram==null || data.instagram==""){
                $('#contact_insta').text("N/A");    
            }else{
                $('#contact_insta').text(data.instagram);
            }

            if(data.twitter=="0" || data.twitter==null || data.twitter==""){
                $('#contact_twitter').text("N/A");    
            }else{
                $('#contact_twitter').text(data.twitter);
            }

           

            $('#player-profile').modal('hide');

        }
    });
}

function loadPreloadedBioForm() { 
    $.ajax({
        url: BASE_URL + 'athlete/getPlayerBioInfo',
        type: 'POST',
        data: [{name: csrf_name, value: csrf_token}],
        dataType: 'json',
        success: function (data) {
            
            if(data.title) {
                $('#biotitle').text(data.title);
            }
            else {
                $('#biotitle').text(lang_js.heading_please_enter_biography_title);
            }
            if(data.content && data.content!='0' && data.content!='null') {
                $('#bio_content').html(data.content);
            }
            else {
                $('#bio_content').text(lang_js.heading_please_enter_biography);
            }
            
        }
    });
}

function loadPreUploadedImages(){ 
    $.ajax({
        url: BASE_URL + 'athlete/getAllImageData',
        type: 'POST',
        data: [{name: csrf_name, value: csrf_token}],
        dataType: 'json',
        success: function (data) {
            for (var i in data) {
                if(data[i].filename=="" || data[i].filename==null || data[i].filename=='0'){
                    var playerIamge = TIMTHUMB + AVATAR_IMAGE + '&w=200&h=200';
                }else{
                    var playerIamge = TIMTHUMB + BASE_URL+ 'public/uploads/player_image/'+ data[i].filename+ '&w=200&h=200';
                }

                $("#image-list").append('<li id="'+data[i].id+'"><div class="my_image"><a href="javascript:void(0)"><img src="' + playerIamge + '"/></a></div>\
                <div class="profile_edit"><p>'+data[i].title+'</p>\
                <div class="edit_delet"><a class="editImageBtn" data-toggle="modal" role="button" href="javascript:void(0)" image_id="'+data[i].id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteBtn" image_id="'+data[i].id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
                <div class="clearfix"></div></div></li>');
                imageCount++;
            }
            if(imageCount < 3){
                $('#image-list').append('<li><div class="add_more custom-add-more"> <a data-toggle="modal" role="button" href="javascript:void(0)" id="add-more-image"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
            }
            $('#myModal').modal('hide');
            addImages();
            showImage();
            deleteImage();
        }
    });
}

function loadPreUploadedVideos(){
    $.ajax({
        url: BASE_URL + 'athlete/getAllVideoData',
        type: 'POST',
        data: [{name: csrf_name, value: csrf_token}],
        dataType: 'json',
        success: function (data) {
            for (var i in data) {
                if(data[i].upload_video_type==2){
                    $("#video-list").append('<li id="'+data[i].id+'"><a href="javascript:void(0)" class="open-video" video_title= "'+data[i].title+'" video_url="' +BASE_URL +'public/uploads/player_video/'+ data[i].filename+'" role="button" data-toggle="modal"><div class="my_vedio"><img src="' +BASE_URL +'public/uploads/video_thumb/'+ data[i].thumbnail_image + '"/></div></a></div>\
                    <div class="profile_edit"><p>'+data[i].title+'</p>\
                    <div class="edit_delet"> <a class="editVideoBtn" data-toggle="modal" role="button" href="javascript:void(0)" video_id="'+data[i].id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteVideoBtn" video_id="'+data[i].id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
                    <div class="clearfix"></div></div></li>');
                }else{
                    $("#video-list").append('<li id="'+data[i].id+'"><a href="javascript:void(0)" class="open-video" video_title= "'+data[i].title+'" video_url="'+data[i].filename+'" role="button" data-toggle="modal"><div class="my_vedio"><img src="' + data[i].thumbnail_image + '"/></div></a></div>\
                    <div class="profile_edit"><p>'+data[i].title+'</p>\
                    <div class="edit_delet"> <a class="editVideoBtn" data-toggle="modal" role="button" href="javascript:void(0)" video_id="'+data[i].id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="deleteVideoBtn" video_id="'+data[i].id+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div>\
                    <div class="clearfix"></div></div></li>');
                }
                

                
                videoCount++;
            }
            if(videoCount < 3){
                $('#video-list').append('<li><div class="add_more custom-add-more"> <a id="add-more-video" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i></span>'+lang_js.add_more_button+'</a> </div></li>');
            }
                $('#modal-video').modal('hide');
                openVideo();
                addVideos();
                showVideoToUpdate();
                deleteVideo();
        }
    });
}

function openVideo(){
    $(document).on("click",".open-video", function(){
        $('#video1').attr('src', $(this).attr("video_url"));
        $('#vid_title').text($(this).attr("video_title"));
        $("#play-video").modal("show");
    });
}


function showHidehandel(){
    var image_video = $("input[name='videoType']:checked").val();
        
        if(image_video==1){
            $(".show_video_url").show();
            $(".show_upload_video").hide();
        }else{
            $(".show_upload_video").show();
            $(".show_image").hide();
        }

        $(document).on("click", ".setPlayerVideo", function(){
            var image_video = $(this).val();
            
            if(image_video==1){
                $(".show_video_url").show();
                $(".show_upload_video").hide();
            }else{
                $(".show_upload_video").show();
                $(".show_video_url").hide();
            }
        });

        var upload_videoType = $("input[name='upload_videoType']:checked").val();
        
        if(upload_videoType==1){
            $(".show_video_url").show();
            $(".show_upload_video").hide();
        }else{
            $(".show_upload_video").show();
            $(".show_image").hide();
        }

        $(document).on("click", ".setPlayerVideo", function(){
            var upload_videoType = $(this).val();
            
            if(upload_videoType==1){
                $(".show_video_url").show();
                $(".show_upload_video").hide();
            }else{
                $(".show_upload_video").show();
                $(".show_video_url").hide();
            }
        });

         var player_type = $("#player_type").val();
        
        if(player_type==1){
            $(".show_hide_club").show();
        }else{
            $(".show_hide_club").hide();
        }

        $(document).on("change", "#player_type", function(){
            var player_type = $(this).val();
            
            if(player_type==1){
                $(".show_hide_club").show();
            }else{
                $(".show_hide_club").hide();
            }
        });

        
}


function mobileMastk() {
    $(document).on("focus", "#mobile", function(){
        $('#mobile').inputmask('+99 99 99999 9999');    
    });
    
    $(document).on("focus", "#cpf", function(){
        $('#cpf').inputmask('999.999.999-99');
    });
}


// jQuery(function($) {
//     $('#mobile').inputmask('+99 99 99999 9999');
// });



 