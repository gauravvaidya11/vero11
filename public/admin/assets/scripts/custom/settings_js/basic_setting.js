var basic_setting = {        
        init:function() {
                this.validation();
                this.numericOnly();
                this.alphabatOnly();
                this.blockSpace();
                this.singleSpaceONly();
                this.hideMessage();

        },       
        

        validation:function(){
                var _that = this;
                $(document).on("change", ".basic-setting-value",function () { 
                    var setting_name = $(this).attr('name');
                    var required_field = $(this).attr('valid-data');
                    var setting_value = $(this).val();
                    _that.basicSettings(required_field, setting_name, setting_value);
                });
               
        },

        basicSettings:function(required_field, setting_name, setting_value){
                if(setting_value=="" && required_field=='required'){
                    $("#"+ setting_name).css("border", "1px solid #b94a48");
                    $("#setting-message_"+setting_name).html('<strong><span class="ui-icon ui-icon-alert custom-error hideauto" style="float:left"></span></strong>');
                    return false;
                }else{
                    $("#"+ setting_name).css("border", "1px solid #468847");
                    $("#loading").show();
                    var setting_data = [{'name':"required_field",'value':required_field},{'name':"setting_name",'value':setting_name},{'name':"setting_value",'value':setting_value},{'name':csrf_token_name,'value':csrf_token}];
                    $("#setting-message_"+setting_name).html('');
                    $.ajax({
                        url: BASE_URL + 'settings/admin/saveBasicSetting',
                        data: setting_data,
                        type: "POST",
                        dataType: 'JSON',
                        async: false,
                        success: function (response) { 
                            if (response.type=='error') {
                                $("#setting-message_"+setting_name).html('<strong><span class="ui-icon ui-icon-alert custom-error hideauto" style="float:left"></span></strong>');
                            }else if(response.type=="success"){
                                $("#setting-message_"+setting_name).html('<strong><span class="ui-icon ui-icon-check custom-check hideauto" style="float:left"></span> </strong>');
                            }else if(response.type=="info"){
                                $("#setting-message_"+setting_name).html('<strong><span class="ui-icon ui-icon-notice custom-info hideauto" style="float:left"></span></strong>');                                        
                            }
                            $("#loading").hide();
                            $("#"+ setting_name).css("border", "1px solid #e5e5e5");
                            basic_setting.hideMessage();
                        }
                    });   
                }
        },

        hideMessage: function () {
            setTimeout(function () {
                $('.hideauto').fadeOut('slow');
            }, 8000);
        },

        // start block alphabates only
        numericOnly: function () {
            $(document).on('keydown', '.vNumericOnly', function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

        },
        // end block alphabates only
        alphabatOnly: function () {

            $(document).on('keyup blur', '.vAlphabetsOnly', function () {
                var node = $(this);
                node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
            });
        },
        blockSpace: function () {
            $(document).on('keydown', '.vNoSpace', function (e) {
                return e.which !== 32;
            });
        },
        
        singleSpaceONly: function () {
            $('.vSingleSpace').on('keyup keypress', function () {
                var cat = $(this).val();
                cat = cat.replace(/ +(?= )/g, '');
                if (cat != " ") {
                    $(this).val(cat);
                } else {
                    $(this).val($.trim(cat));
                }
            });
        },


};

$(function(){
    basic_setting.init();
});

