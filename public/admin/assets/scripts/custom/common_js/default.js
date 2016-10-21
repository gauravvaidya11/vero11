var Tasks = function () {
    return {
        //main function to initiate the module
        initDashboardWidget: function () {
            $('input.liChild').change(function () {
                if ($(this).is(':checked')) {
                    $(this).parents('li').addClass("task-done");
                } else {
                    $(this).parents('li').removeClass("task-done");
                }
            });
        }
    };

}();


// This script is use for change common change status
var handleStatus = {
    init: function () {
        this.commonstatus();
        this.cancel();
        this.hideMessage();
        this.isLogin();
        this.copyLink();
    },
    isLogin: function (param) {//common login check
        if (typeof param === 'object') {
          //  var param = JSON.parse(param);
            if (param === 'logout') {
                alert(lang_js.common_message_session_expried);
                location.reload(BASE_URL);
            }
        } else {
            if (param === 'logout') {
                alert(lang_js.common_message_session_expried);
                location.reload(BASE_URL);
            }
        }

    },
    commonstatus: function () {
        // for common set status
        var _that = this;
        $(document).on("click", ".set-status", function () {
            var id = $(this).attr('rel');
            bootbox.confirm("Are you sure, do you want to change status?", function (result) {
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
            bootbox.confirm("Are you sure, do you want to delete?", function (result) {
                if (result) {
                    _that.deleteStatus(id, delete_status_path);
                }
            });
        });
    },
    // This function is use for set common status
    changeStatus: function (id, status, set_status_path) {
        var change_status_data = [{'name': "id", 'value': id}, {'name': "status", 'value': status}, {'name': csrf_token_name, 'value': csrf_token}];
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
                handleStatus.hideMessage();
            }

        });

    },
    // This function is use for delete common status 
    deleteStatus: function (id, delete_status_path) {
        var delete_status_data = [{'name': "id", 'value': id}, {'name': csrf_token_name, 'value': csrf_token}];
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
                handleStatus.hideMessage();
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
    hideMessage: function () {
        setTimeout(function () {
            $('.hideauto').fadeOut('slow');
        }, 7000);

    },
    goTop: function () {
       $("html").animate({scrollTop: 0}, "slow");
    },
    checkUID: function () {
        var myObject = new Object();
        if ($('#not_uid').is(':checked')) {
            var doc = $('#uid_document').attr('class');
            if (doc == '') {
              var doc = $('#uid_document').val();
            }
            if (doc == undefined || doc == null || doc == '') {
                myObject.msg = 'Company Uid certificate is required.';
                myObject.result = false;
            } else {
                myObject.msg = '';
                myObject.result = true;
            }
        } else {
            var uid = $('#uid').val();
            if (uid == undefined || uid == null || uid == '') {
                myObject.msg = 'Company UID is required.';
                myObject.result = false;
            } else {
                myObject.msg = '';
                myObject.result = true;
            }
        }
        return jsonString = JSON.stringify(myObject);
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

};




$(function () {
    handleStatus.init();
    App.init(); // initlayout and core plugins  
});
