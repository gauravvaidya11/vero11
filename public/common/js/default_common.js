var coreJS = function () {
    var ajx;
    var coreJS = {
        init: function () {
            this.numericOnly();
            this.alphabatOnly();
            this.blockSpace();
            this.hideMessage();
            this.multiLanguage();
            this.blockDot();
            this.singleSpaceONly();
            this.copyInit();
            this.checkCookie();
        },
        isLogin: function (param) {//common login check
            if (typeof param === 'object') {
                //    var param = JSON.parse(param);
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
        // this function is use for auto hide alert message in 7 min
        hideMessage: function () {
            setTimeout(function () {
                $('.hideauto').fadeOut('slow');
            }, 7000);

        },
        message: function (msg, type) {
            var cls = '';
            var title = '';
            switch (type) {
                case 'success':
                    cls = 'alert-success';
                    title = lang_js.common_message_success_title;
                    break;
                case 'error':
                    cls = 'alert-danger';
                    title = lang_js.common_message_error_title;
                    break;
                case 'warning':
                    cls = 'alert-warning';
                    title = lang_js.common_message_warning_title;
                    break;
                default:
                    cls = 'alert-info';
                    title = lang_js.common_message_info_title;
                    break;
            }
            var html = '';
            html = '<div class="alert ' + cls + ' hideauto">';
            html += '<button type="button"   class="pull-right" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>';
            html += '<strong>' + title + '</strong>';
            html += msg;
            html += '</div>';
            $("#common_msg_js").html(html);
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
        blockDot: function () {
            $(document).on("keydown", ".vdotBlock", function (event) {
                if (event.which == 46) {
                    event.preventDefault();
                }
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
        multiLanguage: function () {
            $('.sel_c').click(function () {

                $('#loading').show();
                var html = $(this).html();
                $('#select_bx').html(html);
                var id = $(this).attr('rel');
                try {
                    ajx.abort();
                } catch (e) {

                }
                $("loading").show();
                ajx = $.ajax({
                    url: BASE_URL + 'setLanguage',
                    type: "POST",
                    data: [{'name': csrf_name, 'value': csrf_token}, {'name': 'language', 'value': id}],
                    async: false,
                    success: function (data) {
                        if (data == 1) {
                            location.reload();
                        } else {
                            $("loading").hide();
                        }
                    }
                });
            });
        }, goTop: function () {
            $("html").animate({scrollTop: 0}, "slow");
        },
        copyToClipboard: function (elementId) {
            // Create a "hidden" input

            var aux = document.createElement("input");

            // Assign it the value of the specified element
            aux.setAttribute("value", document.getElementById(elementId).value);


            // Append it to the body
            document.body.appendChild(aux);

            // Highlight its content
            aux.select();

            // Copy the highlighted text
            document.execCommand("copy");

            // Remove it from the body
            document.body.removeChild(aux);
        },
        copyInit: function () {
            var _that = this;

            //$(".copy_to_clipboard").click(function(){
            $(document).on('click', '.copy_to_clipboard', function () {
                var id = $(this).attr("data-copy-id");

                if (id) {

                    _that.copyToClipboard(id);
                }
            });
        },
        checkCookie: function () {
            if (!navigator.cookieEnabled) {
                window.location.href = BASE_URL + "cookie";
            }
        }

    };
    $(function () {
        coreJS.init();
    });
    return coreJS;
}();

function copyToClipboard(elementId) {

    // Create a "hidden" input
    var aux = document.createElement("input");

    // Assign it the value of the specified element
    aux.setAttribute("value", document.getElementById(elementId).innerHTML);

    // Append it to the body
    document.body.appendChild(aux);

    // Highlight its content
    aux.select();

    // Copy the highlighted text
    document.execCommand("copy");

    // Remove it from the body
    document.body.removeChild(aux);

}