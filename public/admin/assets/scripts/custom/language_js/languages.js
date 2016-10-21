// Add dealer validation section here
var language = {
    init: function () {
        this.validation();
        this.updateLanguageData();
        this.languageList();
    },
    validation: function () {
        var _that = this;

        // change profile  validation and ajaxs
        $("#add-lang-btn").click(function () {
            _that.addLanguageValidation();
        });


        $('#add-lang-form input').keypress(function (e) {
            if (e.which == 13) {
                _that.addLanguageValidation();
            }
        });
    },
    // start add dealer validation and ajax
    addLanguageValidation: function () {
        $('#add-lang-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                lang_name: {
                    required: true,
                    remote:
                            {
                                url: BASE_URL + "languages/checkLangName",
                                type: "post",
                                data:
                                        [
                                            {name: csrf_name, value: csrf_token},
                                            {name: 'lang_name', value: function ()
                                                {
                                                    return $('#add-lang-form :input[name="lang_name"]').val();
                                                }
                                            }
                                        ]
                            }
                },
                lang_code: {
                    required: true,
                    remote:
                            {
                                url: BASE_URL + "languages/checkLangCode",
                                type: "post",
                                data:
                                        [
                                            {name: csrf_name, value: csrf_token},
                                            {name: 'lang_code', value: function ()
                                                {
                                                    return $('#add-lang-form :input[name="lang_code"]').val();
                                                }
                                            }
                                        ]
                            }
                }
            },
            messages: {
                lang_name: {
                    required: "Language Name is required.",
                    remote: "This language is already exist."
                },
                lang_code: {
                    required: "Language code is required.",
                    remote: "This Code is already exist."
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#add-lang-form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }
        });
        var result = $("#add-lang-form").valid();
        if (result == true) {
            $("#add-lang-form").ajaxForm({
                success: function (xhr) {
                    var obj = $.parseJSON(xhr);
                    if (obj.type == "error") {
                        $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>' + obj.msg + '</div>');
                    } else {
                        $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>' + obj.msg + '</div>');
                    }
                    $("#add-lang-form").find("input[type=text], textarea").val("");
                }
            }).submit();
            return true;
        } else {
            return false;
        }
    },
    updateLanguageData: function () {
        $(".save-lang").click(function () {
            if (confirm("Do you realy want to update language file ?")) {
               
                $("#update-lang-form").ajaxForm({
                    success: function (xhr) {
                        var obj = $.parseJSON(xhr);
                        if (obj.status == "error") {
                            $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error! </strong>' + obj.msg + '</div>');
                        } else {
                            $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Success! </strong>' + obj.msg + '</div>');
                            setTimeout(function () {
                                window.location.href = BASE_URL + "languages";
                            }, 500);
                        }
                    }
                }).submit();
            }
        });
    },
    paginationLimit: 0,
    languageList: function () {
        var _that = this;
        $.post(BASE_URL + "languages/languageListing", [{'name':csrf_token_name,'value': csrf_token}], function (xhr) {
            var obj = $.parseJSON(xhr);
            _that.paginationLimit = obj.length;
            var HTML ='<table class="table table-bordered table-hover"><thead>\
                                    <tr>\
                                        <th>#</th>\
                                        <th>Language</th>\
                                        <th>Flag</th>\
                                        <th>Code</th>\
                                        <th>Status</th>\
                                    </tr>\
                                    </thead><tbody>';
            if (_that.paginationLimit > 0) {
                var j = 1;
                var page = 0;
                for (var i = 0; i < _that.paginationLimit; i++) {
                    var stColr = (obj[i].status == 1) ? "label-success" : "label-danger";
                    if (i % 5 == 0) {
                        page++;
                    }
                    HTML += '<tr class="lang-list lang-list-hide page-' + page + '"><td>' + j + '</td>\
                                            <td class="text-capitalize">' + obj[i].lang_name + '</td><td>';
                    if (obj[i].lang_flag != null && obj[i].lang_flag !='') {
                        HTML += '<img alt="" src="' + BASE_URL + 'public/uploads/language/flag/thumb/' + obj[i].lang_flag + '" />';
                    }
                    HTML += '</td>\
                                            <td>' + obj[i].lang_code + '</td>\
                                            <td><span class="label label-sm lang-status ' + stColr + '" rel="' + obj[i].status + '" id="' + obj[i].id + '">';
                    if (obj[i].status == 1) {
                        var status = 'Approved';
                    } else {
                        var status = 'Block';
                    }
                    HTML += status;
                    HTML += '</span></td></tr>';
                    j++;
                }
            }
            HTML += '<tr>\
                                        <th colspan="2"><a href="javascript:void(0);" id="prev" style="float:right;" class="btn btn-default">Prev</a></th>\
                                        <th colspan="2"><a href="javascript:void(0);" id="next" class="btn btn-default">Next</a></th>\
                                    </tr>';
            HTML += '</tbody></table>';
           $("#language-listing").html(HTML);
            _that.pagination();
            _that.changeLangStatus();
        });
    },
    pagination: function () {
        var _that = this;
        var pageLimit = Math.ceil(_that.paginationLimit / 5);
        page = 1;
        $('.page-' + page).removeClass("lang-list-hide").show();
        $("#next").click(function () {
            if (page < pageLimit) {
                page++;
                $(".lang-list").addClass("lang-list-hide");
                $('.page-' + page).removeClass("lang-list-hide").show();
            }
        });

        $("#prev").click(function () {
            if (page > 1) {
                page--;
                $(".lang-list").addClass("lang-list-hide");
                $('.page-' + page).removeClass("lang-list-hide").show();
            }
        });
    },
    changeLangStatus: function () {
        $(".lang-status").click(function () {
            var STATUS = $(this).attr("rel");
            var ID = $(this).attr("id");
            if (confirm("Do you really want to change status ?")) {
                var finalStatus = (STATUS == 1) ? 0 : 1;
                $.post(BASE_URL + "languages/changeStatus", [{name:csrf_token_name, value: csrf_token}, {name: 'status', value: finalStatus}, {name: 'id', value: ID}], function (xhr) {
                    var obj = $.parseJSON(xhr);
                    if (obj.status == "success") {
                        if (finalStatus == 1) {
                            $("#" + ID).removeClass("label-danger").addClass("label-success").attr('rel', "1").text("Approved");
                        } else {
                            $("#" + ID).removeClass("label-success").addClass("label-danger").attr('rel', "0").text("Block");
                        }
                    }
                });
            }
        });
    }
};

$(function () {
    language.init();
});
