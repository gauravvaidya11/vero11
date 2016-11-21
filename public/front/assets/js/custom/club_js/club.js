// This script is use for change common change status
var handleStatus = {
    init: function () {
        this.commonstatus();
        this.cancel();
        this.copyLink();
        this.mobileMastk();
        this.editPlayerProfile();
        this.showHidehandel();
        this.updateProfileValidation();
    },

    
    commonstatus: function () {
        // for common set status
        var _that = this;
        
        $(document).on("click", ".set-status", function () {
            var id = $(this).attr('rel');
            bootbox.confirm(lang_js.common_change_status_confirmation_message_are_you_sure, function (result) {
                if (result) {
                    if ($("#status_" + id).hasClass("green")) {
                        $("#status_" + id).removeClass("green");
                        $("#status_" + id).addClass("red");
                        $("#status_" + id).attr('title', 'Deactivate');
                        status = 0;
                    } else if ($("#status_" + id).hasClass("red")) {
                        $("#status_" + id).removeClass("red");
                        $("#status_" + id).addClass("green");
                        $("#status_" + id).attr('title', 'Activate');
                        status = 1;
                    }
                    _that.changeStatus(id, status, set_status_path);
                }
            });
        });

        // for common delete status
        $(document).on("click", ".delete-status", function () {
            var id = $(this).attr('rel');
            bootbox.confirm(lang_js.common_detele_confirmation_message_are_you_sure, function (result) {
                if (result) {
                   _that.deleteStatus(id, delete_status_path); 
                }
            });
        });
    },
    // This function is use for set common status
    changeStatus: function (id, status, set_status_path) {
        var change_status_data = [{'name': "id", 'value': id}, {'name': "status", 'value': status}, {'name': csrf_name, 'value': csrf_token}];
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: set_status_path,
            data: change_status_data,
            success: function (xhr) {
                if (xhr.type == "error") {
                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>' + xhr.msg + '</div>');
                } else {
                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>' + xhr.msg + '</div>');
                }
                
            }

        });

    },
    // This function is use for delete common status 
    deleteStatus: function (id, delete_status_path) {
        var delete_status_data = [{'name': "id", 'value': id}, {'name': csrf_name, 'value': csrf_token}];
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: delete_status_path,
            data: delete_status_data,
            success: function (xhr) {
                if (xhr.type == "error") {
                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>' + xhr.msg + '</div>');
                } else {
                    $("#delete_status_" + id).parent().parent().hide();
                    $("#delete_status_" + id).delay(800);
                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>' + xhr.msg + '</div>');
                }
                
            },
        });
    },
    cancel: function () {
        $('.cancel').click(function () {
            if (confirm("Do you realy want to cancel ?")) {
                $(this).closest("form").find("input[type=text], textarea").val("");
            }
        });
    },
    
    copyLink:function(){
        $(document).on('click', '#copy_url', function(){     
             var id = $(this).attr('rel');
             $.get('auth/admin/getUrlData',{uid:id},function(resp){
                 if(resp != ''){
                        var data = $.parseJSON(resp);
                        $("#life_id,#name").text('');
                        $("#refer_url").val('');
                        $("#life_id").text(data.life_id);
                        $("#name").text(data.fullname);
                        $("#refer_url").val(data.refer_url);
                        $("#copy_link_model").modal();
                 }
             });

             $(document).on('click', '#copy_link', function(){ 
                 bootbox.alert('Refer url copied successfully.');
             });
            
             $('#copy_link_model').on('hidden.bs.modal', function () {
                    $("#life_id,#name").text('');
                    $("#refer_url").val('');
             });
        });
    },  

    mobileMastk:function() {
        $(document).on("focus", "#mobile", function(){
            $('#mobile').inputmask('+99 99 99999 9999');    
        });
        
        $(document).on("focus", "#cpf", function(){
            $('#cpf').inputmask('999.999.999-99');
        });
    },

    editPlayerProfile:function(){
        $(document).on('click', '.editPlayerProfile', function(){ 
            var player_id = $(this).attr("rel");
            $('#loading').show();    
            $.ajax({
                url: BASE_URL + 'clubs/club/get_player_info',
                type: 'POST',
                data: [{name:"player_id", value:player_id}, {name: csrf_name, value: csrf_token}],
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $('#playerId').val(data.user_id);
                    $('#fname').val(data.first_name);
                    $('#lname').val(data.last_name);
                    $('#nickname').val(data.nick_name);
                    $('#birthday').val(data.birthday);
                    $('#age').val(data.age);
                    $('#gender').val(data.gender);
                    $('#gender').selectpicker('refresh');

                    if(data.height!=null){
                        var explode_height = data.height.split('.');

                        $('#height_m').val(explode_height[0]);
                        $('#height_m').selectpicker('refresh');
                        $('#height_cm').val(explode_height[1]); 
                        $('#height_cm').selectpicker('refresh'); 
                    }else{
                        $('#height_m').val();
                        $('#height_m').selectpicker('refresh');
                        $('#height_cm').val();
                        $('#height_cm').selectpicker('refresh');
                    }

                    $('#weight').val(data.weight);
                    $('#laterality').val(data.laterality);
                    $('#laterality').selectpicker('refresh');
                    $('#country').val(data.country);
                    $('#country').selectpicker('refresh');
                    $('#cpf').val(data.cpf);
                    $('#pos1').val(data.position_1);
                    $('#pos1').selectpicker('refresh');
                    $('#pos2').val(data.position_2);
                    $('#pos2').selectpicker('refresh');
                    $('#pos3').val(data.position_3);
                    $('#pos3').selectpicker('refresh');
                    //$('#player_type').html(data.position_3);
                    $('#mobile').val(data.mobile);
                    $('#email').val(data.email);
                    $('#facebook').val(data.facebook);
                    $('#instagram').val(data.instagram);
                    $('#twitter').val(data.twitter);
                    $('#player_type').val(data.player_type);
                    $('#player_type').selectpicker('refresh');

                    if(data.player_type==1){
                        $('.show_hide_club').show();
                        $('#clubname').val(data.hire_club_name);    
                    }else{
                        $('#clubname').val("");    
                        $('.show_hide_club').hide();
                    }
                    
                    $("#hidden_profile_image").val(data.profile_image);
                    if(data.profile_image && data.profile_image!='0') {
                        
                        $('#profileImage').attr('src', BASE_URL + PROFILE_IMAGE + data.profile_image);
                    }
                    else {
                        $('#profileImage').attr('src', AVATAR_IMAGE);
                    }

                    
                    $('#loading').hide();
                    $("#editPlayerProfileModel").modal("show");
                }
            });
        });
    }, 

    showHidehandel:function(){
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

            
    },


    updateProfileValidation:function(){ 
        $(document).on('click', '#updateProfile', function () {

            $('#editPlayerProfileForm12').validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block', // default input error message class
                    focusInvalid: true, // do not focus the last invalid input
                    rules: {
                        fname: {
                            required: true
                        },
                        lname: {
                            required: true
                        },
                        age: {
                            required: true
                        },

                        birthday: {
                             required: true
                        },

                        height_m: {
                            required: true
                        },
                        heightCm: {
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
                        },
                        position_1: {
                            required: true
                        },
                        player_type: {
                            required: true
                        },
                        hire_club_name: {
                            required: true
                        }
                    },

                    messages: {
                        fname: {
                            required: lang_js.common_required_this_field_is_required
                        },
                        lname: {
                            required: lang_js.common_required_this_field_is_required
                        },
                        age: {
                            required: lang_js.common_required_this_field_is_required
                        },

                        birthday: {
                            required: lang_js.common_required_this_field_is_required
                        },

                        height_m: {
                            required: lang_js.common_required_this_field_is_required
                        },
                        heightCm: {
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
                       
                        hire_club_name: {
                            required: lang_js.common_required_this_field_is_required
                        }
                    },

                    invalidHandler: function (event, validator) { //display error alert on form submit   
                        $('.alert-danger', $('#editPlayerProfileForm12')).show();
                    },

                    highlight: function (element) { // hightlight error inputs
                        $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                    },
                    success: function (label) {
                        label.closest('.form-group').removeClass('has-error');
                        label.remove();
                    }
                });
                var result1=$("#editPlayerProfileForm12").valid();           
                    if(result1==true){
                       $('#loading').show();
                       $('.error').hide();
                       $("#editPlayerProfileForm12").ajaxForm({
                            success: function(xhr){
                                var obj = $.parseJSON(xhr);
                                if(obj.type=="error"){
                                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong> <span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>'+obj.msg+'</div>');
                                }else{
                                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>'+obj.msg+'</div>');
                                   
                                }

                                setTimeout(function(){
                                   $('.hideauto').fadeOut('slow');
                                }, 5000);

                                $("#editPlayerProfileModel").modal("hide");
                                //loadPreloadedProfileForm();
                                $('#loading').hide();
                            }
                        }).submit();
                    }
                    else{
                       return false;
                    }
            });
        }



};




$(function () {
    handleStatus.init();
    App.init(); // initlayout and core plugins  
});
